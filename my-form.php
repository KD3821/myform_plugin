<?php

/*
 * Plugin Name: My-Form
 * Author:      Denis
 */


if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'MY_FORM_VERSION', '1.0.0' );

function activate_my_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-my-form-activator.php';
	My_Form_Activator::activate();
}

function deactivate_my_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-my-form-deactivator.php';
	My_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_my_form' );
register_deactivation_hook( __FILE__, 'deactivate_my_form' );

require plugin_dir_path( __FILE__ ) . 'includes/class-my-form.php';

function run_my_form() {

	$plugin = new My_Form();
	$plugin->run();

}
run_my_form();


// ниже логика

add_shortcode('myform', 'my_form_reg');

function my_form_reg(){
    ob_start();
    ?>
    <form action="?page_id=69" method="post" name="reg" onsubmit="return ConfirmReg()"> <!--action="" прописать свой url-->
        <H3>Форма регистрации</H3>
        
        <p><input type="text" name="user_name" id="user_name" placeholder="Имя"></p>
        <p><input type="text" name="user_email" id="user_email" placeholder="Email"></p>
        <p><input type="password" name="user_pass" id="user_pass" placeholder="Пароль"></p>
        <p><input type="password" name="user_pass2" id="user_pass2" placeholder="Пароль еще раз"></p>
        <button type="submit" name="submit">Зарегистрироваться</button>
    </form>
    <?php
    return ob_get_clean();

}?>