<?php

if ($connected){

  $sql = "select * from sensors";
  $result = $conn->query($sql);

  if ($result->num_rows) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $deveui[]=$row['dev_eui'];
      }
    } 


  for ($i = 0; $i < count($deveui); $i++) {
    $sql = "select * from eui_" . $deveui[$i] . " order by timestamp desc";
    $result = $conn->query($sql);

    if ($result->num_rows) {
        // output data of each row
            $row = $result->fetch_assoc();
            echo "<tr>";
            echo "<td> <a class=\"nav-link\" href=\"history.php?id=eui_" . $deveui[$i] . "\">" . $row['device_id'] . "</a> </td>";

            echo "<td>" . $row['timestamp'] . "</td>";
            echo "</tr>";
        
      } else {
        echo "0 results";
      }
    
      
    }

    $conn->close();
}

?>
