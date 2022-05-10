

<?php

if ($connected){
    $sql = "select * from sensors";
    $result = $conn->query($sql);

    if ($result->num_rows) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $deveui[]=$row['dev_eui'];
          $devid[]=$row['device_id'];
          $lastheard[]=$row['last_heard'];
        }
      } else {
        echo "0 results";
      }
    
      //$conn->close();

}

?>
