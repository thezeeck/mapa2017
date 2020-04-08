<?php
/*
Plugin Name: Asociados ACOEO
Description: Administración de asociados ACOEO: registro, actualización, borrado y consulta.
Version: 1.0
Author: Ma Guadalupe Ascencio Escamilla
License: GPLv2 or later
*/

if(!function_exists('mgae_instalar')){

    function mgae_instalar(){

        //Incluir archivo para crear tabla de asociados
       // include 'crearTabla.php'; 
    }
}

if(!function_exists('mgae_agregar_menu')){

    add_action('admin_menu', 'mgae_agregar_menu');

    function mgae_agregar_menu(){

        add_menu_page(
            'Asociados', 
            'Asociados', 
            'manage_option', 
            'mgae_menu_asociados', 
            '', 
            '', 
            ''
        );
    }
}

register_activation_hook(__FILE__, 'mgae_agregar_menu');
register_activation_hook(__FILE__, 'mgae_instalar');
?>