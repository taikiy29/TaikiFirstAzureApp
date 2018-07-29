<?php
date_default_timezone_set( 'Asia/Tokyo' );
header( "Content-Type: application/json; charset=utf-8" );
 
if( isset( $_GET['id'] ) ){
    $id = htmlspecialchars( $_GET['id'] );
    if( !is_numeric( $id ) ){
        dispError( "Please set id numeric." );
    }
} else {
    dispError( "Please set id." );
}

switch( $id ) {
case 1:
    $name       = "鹿目 まどか";
    $imagecolor = "pink";
    break;
case 2:
    $name       = "美樹 さやか";
    $imagecolor = "blue";
    break;
case 3:
    $name       = "巴 マミ";
    $imagecolor = "yellow";
    break;
case 4:
    $name         = "佐倉 杏子";
    $imagecolor = "red";
    break;
case 5:
    $name       = "暁美 ほむら";
    $imagecolor = "purple";
    break;
}

$json_array = array( 
    'id'         => $id,
    'name'       => $name,
    'imagecolor' => $imagecolor,
 );
 
echo json_encode( $json_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );

// エラーメッセージ関数
function dispError( $msg ) {
    $json_array = array( 
        'error' => $msg,
    );
    echo json_encode( $json_array );
    exit;
}
?>