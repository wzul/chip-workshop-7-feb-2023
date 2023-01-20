<?php

require 'mysql.php';
require 'function.php';

$id = 1;

echo 'Initial Vote Value: ' . get_vote($id) . PHP_EOL;

increment_vote_nts($id, 1);

echo  'Post Vote Value: ' . get_vote($id) . PHP_EOL;
