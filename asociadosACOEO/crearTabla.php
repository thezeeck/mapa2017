<?php

global $wpdb;


$nombre_tabla = $wpdb->prefix . 'ASOCIADOS';

//Crear tabla
$sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    fecha datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    nombre varchar(100) NOT NULL,
    descripcion varchar(1000) NOT NULL,
    telefono varchar(10) DEFAULT '' NOT NULL,
    PRIMARY KEY  (id)
);";

dbDelta( $sql );
?>