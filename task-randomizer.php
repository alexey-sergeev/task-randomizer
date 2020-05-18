<?php
/**
 * Plugin Name: Task Randomizer
 * Description: Составление базы заданий и предъявление задания обучающемуся
 * Plugin URI:  https://github.com/alexey-sergeev/task-randomizer
 * Author:      Alexey N. Sergeev
 * Version:     0.1
 */



function helloworld( $content )
{
    
    // print_r('<pre>');
    // print_r( esc_html( $content ) );
    // print_r('</pre>');

    $content .= 'Hello World!';

    return $content;
}

add_filter( 'the_content', 'helloworld' );


?>