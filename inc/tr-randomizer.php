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

        if ( $param['history'] == 'history' ) {
            
            $arr2 = $this->get_history( $arr, $param );

            if ( $arr2 ) return $arr2;
            
        }
        

        if ( $param['choice'] == 'random' ) {

            shuffle( $arr );
            $arr2 = array_slice( $arr, 0, $param['num'] );

            if ( $param['history'] == 'history' ) $this->set_history( $arr2 );

        }

        return $arr2;
    }
    

    
    // 
    // Извлечь задачи из истории
    // 

    public function get_history( $arr, $param )
    {
        global $post;
        
        if ( ! is_user_logged_in() ) return false;

        $user_id = get_current_user_id();

        $arr2 = get_post_meta( $post->ID, 'task-history-' . $user_id );

        $ret = false;

        foreach ( $arr2 as $item ) {

            $arr3 = array_intersect( $arr, $item );
            if ( count( $arr3 ) == $param['num'] ) $ret = $arr3;

        }

        return $ret;
    }



    // 
    // Записать в историю выбора
    // 

    public function set_history( $arr )
    {
        global $post;
        
        if ( ! is_user_logged_in() ) return false;

        $user_id = get_current_user_id();

        $ret = add_post_meta( $post->ID, 'task-history-' . $user_id, $arr );
        
        return $ret;
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
