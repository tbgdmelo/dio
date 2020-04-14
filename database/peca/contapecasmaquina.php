<?php

require_once('../../config/config.php');
require_once(DBAPI);
function totalPecasMaquina($snum) {
    $database = open_database();
    $sql = "SELECT COUNT(serial_maquina) AS total FROM peca_maquina WHERE serial_maquina = "."'".$snum."';";

    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}