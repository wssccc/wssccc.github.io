<?php
/*
 *  wssccc all rights reserved
 */

/**
 * 
 * @param Post $post
 * @param Post $pre
 * @param Post $next
 * @return string
 */
function post_page($post, $pre, $next) {
    ob_start();
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>wssccc</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8">
            <!-- Bootstrap -->
            <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap-theme.min.css">
            <link rel="stylesheet" href="../../../assets/custom.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
                <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
        </head>
        <body style="padding-top: 20px">
            <div class="container">
                <div class="site-heading-container">
                    <a class="site-heading" href="../../">wssccc in action</a>
                </div>
                <div>
                    <ol class="breadcrumb">
                        <li><a href="../../">wssccc</a></li>
                        <li><a href="../../archives/1.html">archive</a></li>
                        <li><a href="#">post</a></li>
                    </ol>
                </div>
                <div id="posts" class="container">
                    <div class="post">
                        <div>
                            <a href="index.html" class="post-heading"><?php echo $post->title ?></a>
                            <span class="time"><?php echo $post->time ?></span>
                            <hr/>
                        </div>
                        <div class="post-content">
                            <?php echo $post->html ?>
                        </div>
                    </div>

                </div>
                <div class="">
                    <ul class="pager">
                        <li class="pull-left"><a href="<?php echo ($pre == null ? 'javascript:void(0)' : '../' . $pre->dir . 'index.html') ?>">上一篇： <?php echo ($pre == null ? '没有了' : $pre->title) ?></a></li>
                        <li class="pull-right"><a href="<?php echo ($next == null ? 'javascript:void(0)' : '../' . $next->dir . 'index.html') ?>">下一篇： <?php echo ($next == null ? '没有了' : $next->title) ?></a></li>
                    </ul>
                </div>
                <div style="margin-left: 0px;">
                    <!-- Duoshuo Comment BEGIN -->
                    <div class="ds-thread"></div>
                    <script type="text/javascript">
                        var duoshuoQuery = {short_name: "wssccc"};
                        (function() {
                            var ds = document.createElement('script');
                            ds.type = 'text/javascript';
                            ds.async = true;
                            ds.src = 'http://static.duoshuo.com/embed.js';
                            ds.charset = 'UTF-8';
                            (document.getElementsByTagName('head')[0]
                                    || document.getElementsByTagName('body')[0]).appendChild(ds);
                        })();
                    </script>
                    <!-- Duoshuo Comment END -->
                </div>
                <hr/>
                <div class="footer">
                    <p>Copyright &COPY;wssccc 2013 using wsc_blog_generator </p>
                </div>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
        </body>
    </html>
    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
