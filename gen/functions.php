<?php

/*
 *  wssccc all rights reserved
 */

function list_dir($path) {
    $result = array();
    $handle = opendir($path);
    while (false !== ($entry = readdir($handle))) {
        if (is_dir($path . $entry) && $entry != '.' && $entry != '..') {
            array_push($result, $entry);
        }
    }
    closedir($handle);
    return $result;
}

function list_file($path) {
    $result = array();
    $handle = opendir($path);
    while (false !== ($entry = readdir($handle))) {
        if (!is_dir($path . $entry)) {
            array_push($result, $entry);
        }
    }
    closedir($handle);
    return $result;
}

function initOutputDir() {
    $directories = array(
        OUTPUT_PATH . 'posts/',
        OUTPUT_PATH . 'tags/',
        OUTPUT_PATH . 'archives/'
    );
    foreach ($directories as $dir) {
        if (!file_exists($dir)) {
            mkdir($dir);
        }
    }
}

function dolog($str) {
    echo $str . "\r\n";
}

function head() {
    return file_get_contents('template/header.html');
}

function footer() {
    return file_get_contents('template/footer.html');
}

function write_contents($filepath, $content) {
    $file = fopen($filepath, 'w');
    fwrite($file, $content);
    fclose($file);
}
