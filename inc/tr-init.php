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

        add_filter( 'the_content', array( $this, 'helloworld' ) );

    }


    // 
    // Пример работы
    // 

    public function helloworld( $content )
    {
        $content .= $this->helloworld;
        return $content;
    }

}

?>


