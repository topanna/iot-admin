import paho.mqtt.client as mqtt
import pymysql
import sys
import json

# User variable for Gateway ID
myGatewayID = "30:AE:A4:DA:3F:BC"

#User variable for database name
dbName = "office"

# it is expected that this Database will already contain one table called sensors.  Create that table inside the Database with this command:
# CREATE TABLE sensors(device_id char(23) NOT NULL, transmission_count INT NOT NULL, battery_level FLOAT NOT NULL, type INT NOT NULL, node_id INT NOT NULL, rssi INT NOT NULL, last_heard TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);

# User variables for MQTT Broker connection
mqttBroker = "eu1.cloud.thethings.network"
#mqttBroker = "localhost"
mqttBrokerPort = 1883
mqttUser = "0636fc66c7572d46@ttn"
#mqttUser = "mqtt"
mqttPassword = "NNSXS.3XJ6NBSYKZX5QAW3ALURERA3B3DHQJOMJLICVFI.RIMC5WAV5KWBXHUFWPDGBDIJKWEFAE2RV5EMPJIPNIDIPQIJFQBQ"
#mqttPassword = "vvXH2aRqr8"

mysqlHost = "localhost"
mysqlUser = "test"
mysqlPassword = "test"

# This callback function fires when the MQTT Broker conneciton is established.  At this point a connection to MySQL server will be attempted.
def on_connect(client, userdata, flags, rc):
    print("MQTT Client Connected")
    client.subscribe("#")
    try:
        db = pymysql.connect(host=mysqlHost, user=mysqlUser, password=mysqlPassword, db=dbName, charset='utf8mb4', cursorclass=pymysql.cursors.DictCursor)
        db.close()
        print("MySQL Client Connected")
    except Exception as e: 
        print(e)
        sys.exit("Connection to MySQL failed")


# This function determines if there is a table for the sensor telemetry, if not it creates one, then it logs sensor telemetry to the appropriate table
def log_telemetry(db, payload):
    cursor = db.cursor()
    # See if a table already exists for this sensor type, if not then create one
    tableExistsQuery = "SHOW TABLES LIKE 'eui_%s'" % payload['end_device_ids']['dev_eui']
    cursor.execute(tableExistsQuery)
    data = cursor.fetchone()

    if(data == None):
        # No table for that sensor type yet so create one
        createTableRequest = "CREATE TABLE eui_%s(device_id char(23) NOT NULL, timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP," % payload['end_device_ids']['dev_eui']

        for key in payload['uplink_message']['decoded_payload']:
            
            if type(payload['uplink_message']['decoded_payload'][key]) == int:
                newColumn = key+" INT,"
                createTableRequest += newColumn
            if type(payload['uplink_message']['decoded_payload'][key]) == float:
                newColumn = key+" FLOAT,"
                createTableRequest += newColumn
            if type(payload['uplink_message']['decoded_payload'][key]) == str:
                newColumn = key+" VARCHAR(50),"
                createTableRequest += newColumn
        # remove last comma from string
        createTableRequest = createTableRequest[:-1]
        # close the command with parenthases
        createTableRequest += ')'
        #print(createTableRequest)
        cursor.execute(createTableRequest)
        db.commit()
    # Log sensor data

    

    logInsertRequest = "INSERT INTO eui_%s(device_id, timestamp," % payload['end_device_ids']['dev_eui']
    if 'decoded_payload' in payload['uplink_message']:
        for key in payload['uplink_message']['decoded_payload']:
            columnKey = key+","
            logInsertRequest+=columnKey

            # if table exists, but column doesn't
            columnExistsQuery = "select column_name from information_schema.columns where table_name = 'eui_%s' and column_name like '%s'" % (payload['end_device_ids']['dev_eui'], key)
            print(columnExistsQuery)
            cursor.execute(columnExistsQuery)
            
            data = cursor.fetchone()
            if(data == None):
                if type(payload['uplink_message']['decoded_payload'][key]) == int:
                    newColumn = key+" INT"
                    
                if type(payload['uplink_message']['decoded_payload'][key]) == float:
                    newColumn = key+" FLOAT"

                if type(payload['uplink_message']['decoded_payload'][key]) == str:
                    newColumn = key+" VARCHAR(50)"

                addColumnRequest="alter table eui_%s add column %s" % (payload['end_device_ids']['dev_eui'], newColumn)
                print(addColumnRequest)
                cursor.execute(addColumnRequest)
                print("Device %s: New column %s has been added to 'eui_%s' table" % (payload['end_device_ids']['device_id'], newColumn, payload['end_device_ids']['dev_eui']))

        # remove last comma from string
        logInsertRequest = logInsertRequest[:-1]

        logInsertRequest += ") VALUES('" + payload['end_device_ids']['device_id'] +"', CURRENT_TIMESTAMP,"

        for key in payload['uplink_message']['decoded_payload']:
            if type(payload['uplink_message']['decoded_payload'][key]) == str:
                columnData="'%s'," % payload['uplink_message']['decoded_payload'][key]
            else:
                columnData = str(payload['uplink_message']['decoded_payload'][key])+","
            logInsertRequest += columnData
        # remove last comma from string
        logInsertRequest = logInsertRequest[:-1]
        logInsertRequest += ')'
        #print(logInsertRequest)
        cursor.execute(logInsertRequest)
        print("Device " + payload['end_device_ids']['device_id'] + ": " + "Data has been inserted")
        db.commit()
    else:
        print("Device " + payload['end_device_ids']['device_id'] + ": Payload is invalid or has not been decoded correctly")
        


# This function updates the sensor's information in the sensor index table
def sensor_update(db, payload):
    cursor = db.cursor()
    # See if sensor already exists in sensors table, if not insert it, if so update it with latest information.
    deviceQuery = "EXISTS(SELECT * FROM sensors WHERE device_id = '%s')"%(payload['end_device_ids']['device_id'])
    cursor.execute("SELECT "+deviceQuery)
    data = cursor.fetchone()
    if(data[deviceQuery] >= 1):
        updateRequest = "UPDATE sensors SET rssi = %i, last_heard = CURRENT_TIMESTAMP WHERE device_id = '%s'" % (payload['uplink_message']['rx_metadata'][0]['rssi'], payload['end_device_ids']['device_id'])
        cursor.execute(updateRequest)
        print("Device " + payload['end_device_ids']['device_id'] + ": " + "Transmission received")
        db.commit()
    else:
        insertRequest = "INSERT INTO sensors(device_id, dev_eui, rssi, last_heard) VALUES('%s','%s', %i, CURRENT_TIMESTAMP)" % (payload['end_device_ids']['device_id'], payload['end_device_ids']['dev_eui'], payload['uplink_message']['rx_metadata'][0]['rssi'])
        cursor.execute(insertRequest)
        print("Device " + payload['end_device_ids']['device_id'] + ": " + "Transmission received")
        db.commit()


# The callback for when a PUBLISH message is received from the MQTT Broker.
def on_message(client, userdata, msg):
    #print("Transmission received")
    payload = json.loads((msg.payload).decode("utf-8"))
    print(payload)
    if 'end_device_ids' in payload and 'uplink_message' in payload:
        if 'device_id' in payload['end_device_ids'] and 'rx_metadata' in payload['uplink_message']:
            if payload['uplink_message']['rx_metadata']:
                #print(payload['uplink_message']['rx_metadata'][0])
                if 'rssi' in payload['uplink_message']['rx_metadata'][0]:
                    db = pymysql.connect(host="localhost", user=mysqlUser, password=mysqlPassword, db=dbName,charset='utf8mb4',cursorclass=pymysql.cursors.DictCursor)
                    sensor_update(db,payload)
                    log_telemetry(db,payload)
                    
                    db.close()



# Connect the MQTT Client
client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message
client.username_pw_set(username=mqttUser, password=mqttPassword)
try:
    client.connect(mqttBroker, mqttBrokerPort, 60)
except:
    sys.exit("Connection to MQTT Broker failed")
# Stay connected to the MQTT Broker indefinitely
client.loop_forever()
