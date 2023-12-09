<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset=<?php bloginfo('charset') ?>>
    <title><?php
            wp_title('|', true, 'right');
            bloginfo('name');
            ?></title>
    <link rel="pingback" hrefs=<?php bloginfo('pingback_url'); ?>>
</head>
<?php wp_head(); ?>

<body>
    <nav class="navbar  navbar-expand-lg bg-dark " data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <?php khalil_bootstrap_menu(); ?>
            </div>
        </div>
    </nav>