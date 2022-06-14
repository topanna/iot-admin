<?php

// Podzial na strony
$limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 200;

$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
// Offset
$paginationStart = ($page - 1) * $limit;

$prev = $page - 1;
$next = $page + 1;

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

  $totoalPages = ceil($result->num_rows / $limit);

  $history = "select * from " . $device . " order by timestamp desc LIMIT $paginationStart, $limit";
  $output = $conn->query($history);

  if ($output->num_rows) {
    // output data of each row
    while ($row = $output->fetch_array()) {
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

  ?>
