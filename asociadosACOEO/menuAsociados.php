<?php


//if(!function_exists('mgae_agregar_menu')){

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
//}



if(!function_exists('mgae_menu_asociados_consultar')){

    function mgae_menu_asociados_consultar(){

        echo 'entro';
    }
}


register_activation_hook(__FILE__, 'mgae_agregar_menu');
register_activation_hook(__FILE__, 'mgae_menu_asociados_consultar');
?>