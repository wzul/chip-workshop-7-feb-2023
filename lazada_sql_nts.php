<?php

require 'mysql.php';
require 'function.php';

$id = 2;

echo 'Initial Bank Account Balance: RM' . get_vote($id) . PHP_EOL;

$status = decrement_by_sql_nts($id, 199);

if (!$status) {
  echo 'Failed to buy RM 199 Samsung Galaxy Buds!' . PHP_EOL;
}

echo  'After Bank Account Balance: RM' . get_vote($id) . PHP_EOL;
