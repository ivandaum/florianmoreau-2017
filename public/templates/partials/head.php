<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <link rel="icon" type="image/png" href="/wp-content/themes/florianmoreau-2017/favicon.png" sizes="32x32" />
    <meta name="theme-color" content="#000000" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= get_option('blogname') ?>" />
    <meta name="twitter:description" content="<?= get_option('blogdescription') ?>" />

    <meta property="og:url" content="<?= URL ?>" />
    <meta property="og:title" content="<?= get_option('blogname') ?>" />
    <meta property="og:description" content="<?= get_option('blogdescription') ?>" />
    <meta property="og:site_name" content="<?= get_option('blogname') ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />

    <meta name="description" content="<?= get_option('blogdescription') ?>" />
    <meta name="keywords" content="portfolio, graphism, motion" />

    <title><?= get_option('blogname') ?></title>
    <link href="<?= PUBLIC_PATH ?>compressed/main.min.css" rel="stylesheet" type="text/css" />


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-49671786-1', 'florianmoreau.fr');
      ga('send', 'pageview');
    </script>

</head>
<?php global $bodyClass ?>
<body class="<?= $bodyClass ?>">
<nav class="navbar-primary if-you-click-on-it-you-will-loose-your-mind ">
    <p class="close-nav"><?= svg('close'); ?></p>
    <ul>
        <li><a href="<?= home_url() ?>" cat-id="-1" class="ajax-link"><?= svg('small-arrow'); ?> All</a></li>
        <?php foreach($categories as $cat): ?>
            <li><a href="<?= home_url($cat->slug) ?>" cat-id="<?= $cat->cat_ID ?>" class="ajax-link"><?= svg('small-arrow'); ?><?= $cat->name ?></a></li>
        <?php endforeach; ?>
        <li><a href="<?= home_url('contact') ?>" cat-id="-1" class="ajax-link"><?= svg('small-arrow'); ?> Contact</a></li>
    </ul>
</nav>
<button class="open-nav moved-by-navbar moved-by-navbar"><?= svg('burger'); ?></button>
<a href="<?= home_url() ?>" class="ajax-link logo-home moved-by-navbar"><?= svg('logo'); ?></a>

<div class="bottom-nav moved-by-navbar">
    <ul class="networks">
        <li><a href="https://www.linkedin.com/in/florianmoreau/" target="_blank"><?= svg('in'); ?></a></li>
        <li><a href="https://fr.pinterest.com/florian614/" target="_blank"><?= svg('pin'); ?></a></li>
        <li><a href="https://vimeo.com/florianmoreau" target="_blank"><?= svg('vimeo'); ?></a></li>
        <li><a href="https://soundcloud.com/florian614" target="_blank"><?= svg('sound'); ?></a></li>
    </ul>
</div>
<div class="scroll-hacking moved-by-navbar">
    <div class="scroll-dragging"></div>
</div>
<div class="temporary-DOM"></div>
<div id="app" class="container">
