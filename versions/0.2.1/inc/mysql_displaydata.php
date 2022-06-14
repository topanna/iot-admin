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
          echo "<tr>";
          echo "<td>" . $row['device_id'] . "</td>";
          echo "<td>" . $row['dev_eui'] . "</td>";
          echo "<td>" . $row['last_heard'] . "</td>";
          echo "<td><span class=\"badge bg-danger\">" . $row['battery_level'] . "%</span></td>";
          echo "<td>" . $row['rssi'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "0 results";
      }
    
      $conn->close();

}

?>