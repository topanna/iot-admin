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

  // superset range of pages
  $superset_range = range(1, $totoalPages);
  // subset range of pages to display
  $subset_range = range($page - 3, $page + 3);

  // adjust the range(if required)
  foreach ($subset_range as $p) {
    if ($p < 1) {
      array_shift($subset_range);
      if (in_array($subset_range[count($subset_range) - 1] + 1, $superset_range)) {
        $subset_range[] = $subset_range[count($subset_range) - 1] + 1;
      }
    } elseif ($p > $totoalPages) {
      array_pop($subset_range);
      if (in_array($subset_range[0] - 1, $superset_range)) {
        array_unshift($subset_range, $subset_range[0] - 1);
      }
    }
  }
}
