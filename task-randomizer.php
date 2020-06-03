<?php
/**
 * Plugin Name: Task Randomizer
 * Description: Составление базы заданий и предъявление задания обучающемуся
 * Plugin URI:  https://github.com/alexey-sergeev/task-randomizer
 * Author:      Alexey N. Sergeev
 * Version:     0.5
 */


include_once dirname( __FILE__ ) . '/inc/tr-init.php';


add_action( 'init', 'tr_init' );

function tr_init()
{
    global $tr;

    $tr = new tr_init();

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