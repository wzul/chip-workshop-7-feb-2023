<?php

function get_vote(int $id) :int {
  global $mysqli;

  $sql = "SELECT * FROM `vote` WHERE id=$id LIMIT 1";

  $result = mysqli_query($mysqli, $sql);
  $fetch_result = mysqli_fetch_all($result, MYSQLI_ASSOC);

  return $fetch_result[0]['count'];
}

function increment_vote_nts(int $id, int $value) :void {
  global $mysqli;

  $current_vote = get_vote($id);
  $value = $current_vote + $value;
  sleep(4);

  $sql = "UPDATE `vote` SET `count` = $value WHERE `vote`.`id` = $id;";
  mysqli_query($mysqli, $sql);
}

function increment_vote_ts(int $id, int $value) :void {
  global $mysqli;

  mysqli_query($mysqli, "START TRANSACTION;");

  $sql = "SELECT * FROM `vote` WHERE id=$id LIMIT 1 FOR UPDATE";

  $result = mysqli_query($mysqli, $sql);
  $fetch_result = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $current_vote = $fetch_result[0]['count'];

  $value = $current_vote + $value;
  sleep(4);

  $sql = "UPDATE `vote` SET `count` = $value WHERE `vote`.`id` = $id;";
  mysqli_query($mysqli, $sql);

  mysqli_query($mysqli, "COMMIT");
}