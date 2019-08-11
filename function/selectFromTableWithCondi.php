<?php
    function selectColFromTableWitdCondi($conn, $table, $column, $condiColumn, $check) {
        $select = $conn->prepare("SELECT $column FROM $table WHERE $condiColumn = '"   .$check.   "'");
        $select->execute();
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $columnWithCondi = $select->fetchAll();
        return $columnWithCondi;
    }
?>