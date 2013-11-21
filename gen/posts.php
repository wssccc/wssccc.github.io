<?php

/*
 *  wssccc all rights reserved
 */
include './Post.class.php';

function cmp($p1, $p2) {
    return -strcmp($p1->time, $p2->time);
}

function list_posts() {
    $posts = list_dir(INPUT_PATH . POST_PATH);
    return $posts;
}

function init_post($post) {
    $input_path = INPUT_PATH . POST_PATH . $post . '/';
    $output_path = OUTPUT_PATH . POST_PATH . $post . '/';
    $files = list_file($input_path);
    if (!file_exists($output_path)) {
        mkdir($output_path);
    }
    foreach ($files as $file) {
        copy($input_path . $file, $output_path . $file);
        dolog('copy ' . $input_path . $file . ' to ' . $output_path . $file);
    }
}

/**
 * load all the posts
 * @return array
 */
function load_posts() {
    $posts = array();
    $post_entries = list_posts();
    foreach ($post_entries as $post_entry) {
        init_post($post_entry);
        $post = Post::create(INPUT_PATH . POST_PATH, $post_entry . '/');
        array_push($posts, $post);
    }
    usort($posts, 'cmp');
    return $posts;
}
