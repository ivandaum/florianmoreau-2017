<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />

    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png" />

    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192" />
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />

    <link rel="manifest" href="/manifest.json" />
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />

    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="msapplication-TileImage" content="/mstile-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= get_option('blogname') ?>" />
    <meta name="twitter:description" content="<?= get_option('blogdescription') ?>" />
    <meta name="twitter:image:src" content="apple-touch-icon-180x180.png" />

    <meta property="og:url" content="<?= URL ?>" />
    <meta property="og:type" content="company" />
    <meta property="og:title" content="<?= get_option('blogname') ?>" />
    <meta property="og:image" content="apple-touch-icon-180x180.png" />
    <meta property="og:description" content="<?= get_option('blogdescription') ?>" />
    <meta property="og:site_name" content="<?= get_option('blogname') ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />

    <meta name="description" content="<?= get_option('blogdescription') ?>" />
    <meta name="keywords" content="portfolio, graphism, motion" />

    <title><?= get_option('blogname') ?></title>
    <link href="<?= PUBLIC_PATH ?>compressed/main.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="navbar-primary if-you-click-on-it-you-will-loose-your-mind">
    <p class="close-nav"><?= svg('close'); ?></p>
    <ul>
        <li><a href="<?= home_url() ?>" cat-id="-1">All</a></li>
        <?php foreach($categories as $cat): ?>
            <li><a href="<?= home_url($cat->slug) ?>" cat-id="<?= $cat->cat_ID ?>"><?= $cat->name ?></a></li>
        <?php endforeach; ?>
        <li><a href="<?= home_url('contact') ?>" cat-id="-1">Contact</a></li>
    </ul>
</nav>
<div id="app" class="container">
    <button class="open-nav moved-by-navbar"><?= svg('burger'); ?></button>
    <a href="<?= home_url() ?>" class="logo-home moved-by-navbar"><?= svg('logo'); ?></a>

    <div class="bottom-nav moved-by-navbar">
        <ul class="networks">
            <li><a href="https://www.linkedin.com/in/florianmoreau/" target="_blank"><?= svg('in'); ?></a></li>
            <li><a href="#" target="_blank"><?= svg('pin'); ?></a></li>
            <li><a href="https://vimeo.com/florianmoreau" target="_blank"><?= svg('vimeo'); ?></a></li>
            <li><a href="https://soundcloud.com/florian614" target="_blank"><?= svg('sound'); ?></a></li>
        </ul>
    </div>