<?php
/**
 * Show array in pretty form.
 * 
 * @param array $array
 * @return string 
 */
function buildKeywords($array): string {

    $query = null;

    foreach($array as $value) {
        if ( next($array) ) {
            $query = $query . "(" . $value . ") OR ";
        } else {
            $query = $query . "(" . $value . ")";
        }
    }

    return $query;
    
}
?>