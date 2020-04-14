<?php

require_once('../../config/config.php');
require_once(DBAPI);
function totalManutencao($snum) {
    $database = open_database();
    $sql = "SELECT COUNT(serial_maquina) AS total FROM plano_manutencao WHERE serial_maquina = "."'".$snum."';";

    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}