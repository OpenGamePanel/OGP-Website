<?php
function suhosin_function_exists($func) {
    if (extension_loaded('suhosin')) {
        $suhosin = @ini_get("suhosin.executor.func.blacklist");
        if (empty($suhosin) == false) {
            $suhosin = explode(',', $suhosin);
            $suhosin = array_map('trim', $suhosin);
            $suhosin = array_map('strtolower', $suhosin);
            return (function_exists($func) == true && array_search($func, $suhosin) === false);
        }
    }
    return function_exists($func);
}
?>