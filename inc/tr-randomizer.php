<?php

//
// Рандомайзер
// 
//

defined( 'ABSPATH' ) || exit;

class tr_randomizer extends tr_core { 

    private $arr = array();
    
    function __construct( $arr, $param )
    {
        parent::__construct();

        $this->arr = $this->arr_init( $arr, $param );
        
    }

    

    // 
    // Инициализация массива выбранных заданий
    // 

    private function arr_init( $arr, $param )
    {
        $arr2 = array();

        if ( $param['choice'] == 'random' ) {

            shuffle( $arr );
            $arr2 = array_slice( $arr, 0, $param['num'] );


        }

        return $arr2;
    }
    

    // 
    // Выводит выбранные задачи в виде массива
    // 

    public function get_arr()
    {
        return $this->arr;
    }


    // 
    // Выводит выбранные задачи
    // 

    public function get_text()
    {
        $arr = $this->get_arr();

        foreach ( $arr as $key => $item ) {

            $arr[$key] = '<div class="bg-light p-3 mt-3 mb-3">' . $item . '</div>';

        }

        $out = implode( "\n", $arr );

        return $out;
    }

}

?>
