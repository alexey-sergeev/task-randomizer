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

        add_filter( 'the_content', array( $this, 'content' ), 5 );

    }

    

    // 
    // Анализ страницы
    // 

    public function content( $content )
    {
        if ( is_admin() ) return $content;
        // if ( ! is_single() ) return $content;

        // p( esc_html($content) );
        
        while ( preg_match ( '/\[tasks\][\s\S]*?\[\/tasks\]/', $content, $result ) ) {
            
            
            $parser = new tr_parser( $result[0] );
            $arr = $parser->get_arr();
            $param = $parser->get_param();

            if ( is_single() ) {

                $randomizer = new tr_randomizer( $arr, $param );
                $task = $randomizer->get_text();

            } else {

                $task = '';

            }

            $content = str_replace( $result[0], $task, $content );
            
            // p( $arr );
            
        }
        
        // p( esc_html($content) );
        
        return $content;
    }

}

?>


