<?php

if ($connected) {
  $tables = $conn->query("show tables like 'eui%'");

  if ($tables->num_rows) {
    // output data of each row
    while ($row = $tables->fetch_array()) {
      $tablename_def[] = $row[0];
    }
  }

  $tablename = isset($_GET['id']) ? $_GET['id'] : $tablename_def[0];

  $deviceid = $conn->query("select device_id from " . $tablename . " limit 1");

  $devicename = isset($deviceid->num_rows) ?: 'error';
  $row = $deviceid->fetch_array();
  $devicename = $row[0];

  // Pagination
  $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 30;
  $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
  $paginationStart = ($page - 1) * $limit;

  $prev = $page - 1;
  $next = $page + 1;

  $column_names = $conn->query("select column_name from information_schema.columns where table_schema = '" . $db . "' and table_name = '" . $tablename . "'");

  $data = $conn->query("select * from " . $tablename . " order by timestamp desc");
  $totoalPages = ceil($data->num_rows / $limit);
  $one_page_data = $conn->query("select * from " . $tablename . " order by timestamp desc LIMIT $paginationStart, $limit");
}

?>