<?php
/**
 * Plugin Name: Task Randomizer
 * Description: Составление базы заданий и предъявление задания обучающемуся
 * Plugin URI:  https://github.com/alexey-sergeev/task-randomizer
 * Author:      Alexey N. Sergeev
 * Version:     1.0.0
 */


include_once dirname( __FILE__ ) . '/inc/tr-init.php';



add_action( 'init', 'tr_init' );

function tr_init()
{
    global $tr;

    $tr = new tr_init();

}




add_action( 'wp_enqueue_scripts', 'tr_customizer_styles' );

function tr_customizer_styles() 
{
	wp_enqueue_style( 'bootstrap', plugins_url( 'lib/bootstrap/css/bootstrap.min.css', __FILE__ ) );
}



// function helloworld( $content )
// {
    
//     // print_r('<pre>');
//     // print_r( esc_html( $content ) );
//     // print_r('</pre>');

//     $content .= 'Hello World!';

//     return $content;
// }

// add_filter( 'the_content', 'helloworld' );


function p( $txt )
{

    print_r( '<pre>' );
    print_r( $txt );
    print_r( '</pre>' );

}

?>