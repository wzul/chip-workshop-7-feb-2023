<?php

require 'mysql.php';
require 'function.php';

$id = 2;

echo 'Initial Bank Account Balance: RM' . get_vote($id) . PHP_EOL;

$status = decrement_ts($id, 50);

if (!$status) {
  echo 'Failed to withdraw RM 50 cash!' . PHP_EOL;
}

echo  'After Bank Account Balance: RM' . get_vote($id) . PHP_EOL;
