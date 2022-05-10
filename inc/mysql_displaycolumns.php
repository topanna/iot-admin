<?php

if ($connected) {

  $sql = "show tables like 'eui%'";
  $result = $conn->query($sql);

  if ($result->num_rows) {
    // output data of each row
    while ($row = $result->fetch_array()) {
      $deveui[] = $row[0];
    }
  }


  for ($i = 0; $i < count($deveui); $i++) {

    $sql = "select column_name from information_schema.columns where table_schema = '" . $db . "' and table_name = '" . $deveui[0] . "'";
    $result = $conn->query($sql);


    if ($result->num_rows) {
      // output data of each row
      while ($row = $result->fetch_array()) {
        $deveui[] = $row[0];
      }
    }
    <thead>
    <tr>
      <th>Rendering engine</th>
      <th>Browser</th>
      <th>Platform(s)</th>
      <th>Engine version</th>
      <th>CSS grade</th>
    </tr>
  </thead>

    $sql = "select * from " . $deveui[0] . " order by timestamp desc";
    $result = $conn->query($sql);

    if ($result->num_rows) {
      // output data of each row
      $row = $result->fetch_array();
      echo "<tr>";
      echo "<td>" . $row['device_id'] . "</td>";
      echo "<td>" . $row['timestamp'] . "</td>";
      echo "</tr>";
    } else {
      echo "0 results";
    }
  }

  $conn->close();
}
