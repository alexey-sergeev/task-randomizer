<?php

//
// Контроллер
// 
//

defined( 'ABSPATH' ) || exit;

include_once dirname( __FILE__ ) . '/tr-core.php';
include_once dirname( __FILE__ ) . '/tr-randomizer.php';
include_once dirname( __FILE__ ) . '/tr-screen.php';
include_once dirname( __FILE__ ) . '/tr-parser.php';
include_once dirname( __FILE__ ) . '/tr-members.php';



class tr_init extends tr_core { 

    
    function __construct()
    {
        parent::__construct();

        add_filter( 'the_content', array( $this, 'content' ) );

    }


    // 
    // Анализ страницы
    // 

    public function content( $content )
    {
        if ( is_admin() ) return $content;
        // if ( ! is_single() ) return $content;

        // p( esc_html($content) );
        
        while ( preg_match ( '/\[tasks\][\s\S]*?\[\/tasks\]/', $content, $arr ) ) {
            
            $task = ( is_single() ) ? 'Задача' : '';
            $content = str_replace( $arr[0], $task, $content );
            
            // p( $arr );
            
        }
        
        // p( esc_html($content) );
        
        return $content;
    }

}

?>


