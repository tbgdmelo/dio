<?php

require_once('../../config/config.php');
require_once(DBAPI);
function totalMaquina() {
    $database = open_database();
    $sql = "SELECT COUNT(snum) AS total FROM maquina";

    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}