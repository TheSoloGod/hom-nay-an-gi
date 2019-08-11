<?php
    function selectColFromTable($conn, $table, $column) {
        $select = $conn->prepare("SELECT $column FROM $table");
        $select->execute();
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $history = $select->fetchAll();
        return $history;
    }
?>