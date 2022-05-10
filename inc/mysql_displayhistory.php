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

  $device = isset( $_GET['id'] ) ? $_GET['id'] : $deveui[0];

  $sql = "select device_id from " . $device . " limit 1";
  $result = $conn->query($sql);

  $devicename = isset($result->num_rows) ? : 'error';
  $row = $result->fetch_array();
  $devicename = $row[0];


  echo "<div class=\"card-header\">";
  echo "<h3 class=\"card-title\">" . $devicename . "</h3>";
  echo "</div>";
  echo "<!-- /.card-header -->";
  echo "<div class=\"card-body\">";
  echo "<table id=\"example2\" class=\"table table-bordered table-hover\">";

      
  


  // Wyświetlanie nazw kolumn tabeli

  $sql = "select column_name from information_schema.columns where table_schema = '" . $db . "' and table_name = '" . $device . "'";
  $result = $conn->query($sql);



    // Pierwsze dwie kolumny: 1) device_id, 2) timestamp

  if ($result->num_rows) {
    // output data of each row

    echo "<thead>";
    echo "<tr>";


    while ($row = $result->fetch_array()) {
      $columns[] = $row[0];
      echo "<th>" . $row[0] . "</th>";
    }
    echo "</tr>";
    echo "</thead>";
  }




  // Wyświetlanie danych tabeli
  $sql = "select * from " . $device . " order by timestamp desc";
  $result = $conn->query($sql);

  if ($result->num_rows) {
    // output data of each row
    while ($row = $result->fetch_array()) {
      echo "<tbody>";
      echo "<tr>";
      for ($i = 0; $i < count($columns); $i++) {
        echo "<td>" . $row[$i] . "</td>";
      }
      echo "</tr>";
      echo "</tbody>";
      
    }
  } else {
    echo "0 results";
  }

  echo "</table>";
  $conn->close();
}
