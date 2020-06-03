<?php


// Авторизован ли пользователь?

is_user_logged_in()


// ID текущего пользователя

get_current_user_id()


// Добавить значение метаполя

add_post_meta( $post_id, $meta_key, $meta_value );


// Получить массив значения метаполя

get_post_meta( $post_id, $meta_key );


// Пересечение массивов

array_intersect ( array $array1 , array $array2 [, array $... ] ) : array

?>