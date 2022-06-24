
import json

class Rules:

    MQTT_TOPIC=""
    MQTT_MSG=""
    new_message=False

    def placepod_trigger_uc1114(sender_eui, payload_received):
        Rules.MQTT_TOPIC="v3/devices-mgmt@ttn/devices/uc1114/down/push"
        if sender_eui == "008000000400AEAA":
            if 'presence_21' in payload_received:
                # if placepod occupied dout1 on
                if payload_received['presence_21'] == 1:
                    Rules.new_message=True
                    Rules.MQTT_MSG=json.dumps({"downlinks": [{
                                            "f_port": 85,
                                            "frm_payload": "CQEA/w==",
                                            "priority": "NORMAL"
                                        }]
                                        })
                # if placepod vacant dout1 off
                if payload_received['presence_21'] == 0:
                    Rules.new_message=True
                    Rules.MQTT_MSG=json.dumps({"downlinks": [{
                                            "f_port": 85,
                                            "frm_payload": "CQAA/w==",
                                            "priority": "NORMAL"
                                        }]
                                        })
                    
    def am307_trigger_uc1114(sender_eui, payload_received):
        Rules.MQTT_TOPIC="v3/devices-mgmt@ttn/devices/uc1114/down/replace"
        if sender_eui == "24E124707B427586":
            if 'temperature' in payload_received:
                # if temp am307 > 28 - DOUT2 ON
                if payload_received['temperature'] > 28:
                    Rules.new_message=True
                    Rules.MQTT_MSG=json.dumps({"downlinks": [{
                                            "f_port": 85,
                                            "frm_payload": "CgEA/w==",
                                            "priority": "NORMAL"
                                        }]
                                        })
                # if temp am307 =< 28 - DOUT2 OFF
                if payload_received['temperature'] <= 28:
                    Rules.new_message=True
                    Rules.MQTT_MSG=json.dumps({"downlinks": [{
                                            "f_port": 85,
                                            "frm_payload": "CgAA/w==",
                                            "priority": "NORMAL"
                                        }]
                                        })
