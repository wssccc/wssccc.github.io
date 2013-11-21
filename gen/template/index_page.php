<?php
/*
 *  wssccc all rights reserved
 */

function index_page() {
    ob_start();
    ?>
    <html>
        <head>
            <script>
                window.location = 'archives/1.html';
            </script>
        </head>
    </html>
    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
