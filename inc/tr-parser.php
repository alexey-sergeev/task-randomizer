<?php

//
// Парсер
// 
//

defined( 'ABSPATH' ) || exit;

class tr_parser extends tr_core { 

    private $arr = array();
    private $param = array();

    function __construct( $text )
    {
        parent::__construct();

        $this->parse( $text );
        
    }


    // 
    // Парсинг
    // 

    private function parse( $text )
    {
        // p( $text );
        $arr = array();
        $arr = explode( "\n", $text );

        // p( $arr );

        $param_raw = array();
        $arr_raw = array();
        $n = 0;

        foreach ( $arr as $item ) {
            
            if ( preg_match( "/^#/", $item ) ) continue;
            if ( preg_match( "/\[tasks\]/", $item ) ) continue;
            if ( preg_match( "/\[\/tasks\]/", $item ) ) continue;
            
            if ( preg_match( "/^@/", $item ) ) {
                
                $param_raw[] = $item;
                continue;

            }
            
            if ( preg_match( "/^---/", $item ) ) {
                
                $n++;
                continue;

            }
            
            if ( ! isset( $arr_raw[$n] ) ) $arr_raw[$n] = '';

            $arr_raw[$n] .= trim( $item ) . "\n";
            
        }

        $this->param = $param_raw;
        $this->arr = $arr_raw;

    }




    // 
    // Вернуть массив
    // 

    public function get_arr()
    {
        return $this->arr;
    }


}

?>
