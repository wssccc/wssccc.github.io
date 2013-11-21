<?php

include './defines.php';
include './functions.php';
include './posts.php';
include './template/post/post_page.php';
include './template/archive_page.php';
include './template/index_page.php';
/*
 *  wssccc all rights reserved
 */
initOutputDir();

$posts = load_posts();
//render 
$total_pages = ceil(count($posts) / 3);
$cur_page = 1;

for ($index = 0; $index < count($posts); $index++) {
    //write post
    write_contents(OUTPUT_PATH . 'posts/' . $posts[$index]->dir . 'index.html', post_page($posts[$index], ($index > 0 ? $posts[$index - 1] : null), ($index < count($posts) - 1 ? $posts[$index + 1] : null)));
    //
    if ($index % 3 == 2 || $index == count($posts) - 1) {
        //write 
        write_contents(OUTPUT_PATH . 'archives/' . $cur_page . '.html', archive_page($posts, ($index - 3 + 1) > 0 ? ($index - 3 + 1) : 0, $index, ($cur_page > 1 ? $cur_page - 1 : null), ($cur_page < $total_pages ? $cur_page + 1 : null)));
        ++$cur_page;
    }
}

//gen index
write_contents(OUTPUT_PATH . 'index.html', index_page());
