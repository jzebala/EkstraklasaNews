<?php
/**
 * Build Keywords to search news about clubs
 * 
 * @param array 
 * @return string 
 */
function buildKeywords($array): string {

    $keywords = null;

    foreach ( $array as $key => $value ) {

        foreach ( $value as $key_2 => $value_2 ) {
            
            if ( next($value) ) {
                $keywords = $keywords . "(" . $value_2 . ") OR ";
            } else {
                $keywords = $keywords . "(" . $value_2 . ")";
            }
            
        }
    }

    return $keywords;
}
?>