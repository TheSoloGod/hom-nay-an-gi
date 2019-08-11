<?php
// lay thong tin cac mon an trong database history (mang 2 chieu)
$historyTinhBot = selectColFromTable($conn,"history", "tinhBot");
$historyDam = selectColFromTable($conn, "history", "dam");
$historyXo = selectColFromTable($conn, "history", "xo");
$historyMonPhu = selectColFromTable($conn, "history", "monPhu");

// lay thong tin moi mon xuat hien bao nhieu lan trong database history (mang 1 chieu): mon=>tan suat
$frequencyHistoryTinhBot = frequencyArray($historyTinhBot,"tinhBot");
$frequencyHistoryDam = frequencyArray($historyDam,"dam");
$frequencyHistoryXo = frequencyArray($historyXo,"xo");
$frequencyHistoryMonPhu = frequencyArray($historyMonPhu,"monPhu");

// lay thong tin cac mon an trong database foods (mang 2 chieu)
$foodTinhBot = selectColFromTableWitdCondi($conn, "foods", "foodName", "type", "TB");
$foodDam = selectColFromTableWitdCondi($conn, "foods", "foodName", "type", "D");
$foodXo = selectColFromTableWitdCondi($conn, "foods", "foodName", "type", "X");
$foodMonPhu = selectColFromTableWitdCondi($conn, "foods", "foodName", "type", "P");

// lay thong tin cac mon an trong database foods (mang 1 chieu)
$listTinhBot = frequencyArray($foodTinhBot, "foodName");
$listDam = frequencyArray($foodDam, "foodName");
$listXo = frequencyArray($foodXo, "foodName");
$listMonPhu = frequencyArray($foodMonPhu, "foodName");

// ket hop 2 array de xem tan suat moi mon an: mon=>tan suat
$frequencyTinhBot = $frequencyHistoryTinhBot + $listTinhBot;
$frequencyDam = $frequencyHistoryDam + $listDam;
$frequencyXo = $frequencyHistoryXo + $listXo;
$frequencyMonPhu = $frequencyHistoryMonPhu + $listMonPhu;

// goi y mon an
$suggestTinhBot = suggest($frequencyTinhBot);
$suggestDam = suggest($frequencyDam);
$suggestXo = suggest($frequencyXo);
$suggestMonPhu = suggest($frequencyMonPhu);