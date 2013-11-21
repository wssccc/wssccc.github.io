<?php

/*
 *  wssccc all rights reserved
 */

/**
 * Description of Post
 *
 * @author wssccc <wssccc@qq.com>
 */
class Post {

    public $title;
    public $time;
    public $tags;
    public $html;
    public $dir;

    function __construct($title, $time, $tags, $html, $dir) {
        $this->title = $title;
        $this->time = $time;
        $this->tags = $tags;
        $this->html = $html;
        $this->dir = $dir;
    }

    /**
     * create an post instance from a file
     * @param string $file
     * @return Post post instance
     */
    public static function create($path, $dir) {

        $file = fopen($path . $dir . 'index.txt', 'r');
        if (!$file) {
            return null;
        }
        $title = trim(fgets($file));
        $time = trim(fgets($file));
        $tags = explode(' ', trim(fgets($file)));

        $html = '<p>';
        //read contents
        while (!feof($file)) {
            $line = fgets($file);

            if (trim($line) == '') {
                $html = $html . '</p><p>';
                continue;
            }

            if (strlen($line) > 3 && substr($line, 0, 3) == '###') {
                $html = $html . '<h3>' . substr($line, 3) . '</h3>';
                continue;
            }
            if (strlen($line) > 2 && substr($line, 0, 2) == '##') {
                $html = $html . '<h2>' . substr($line, 2) . '</h2>';
                continue;
            }
            if (strlen($line) > 1 && substr($line, 0, 1) == '#') {
                $html = $html . '<h1>' . substr($line, 1) . '</h1>';
                continue;
            }
            $html = $html . $line . '<br/>';
        }

        fclose($file);
        $html = $html . '</p>';
        return new Post($title, $time, $tags, $html, $dir);
    }

    public function __toString() {
        //for sort
        return $this->time;
    }

}
