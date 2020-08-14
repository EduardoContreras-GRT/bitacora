<?php

function buildArray ($post){
    $strItems = "{";
    foreach($post as $campo => $valor){
        if($campo != "action"){
            $strItems .= '"' . $campo . '":"' . $valor . '",';
        }
    }
    $strItems = substr($strItems, 0, -1);
    $strItems .= "}";
    return json_decode($strItems);
}

function buildArrayUpdate ($post, $key){

    $strItems = "{";
    foreach($post as $campo => $valor){
        if($campo != $key && $campo != "action"){
            $strItems .= '"' . $campo . '":"' . $valor . '",';
        }
    }
    $strItems = substr($strItems, 0, -1);
    $strItems .= "}";
    return json_decode($strItems);
}