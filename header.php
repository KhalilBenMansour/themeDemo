<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset=<?php bloginfo('charset') ?>>
    <title><?php bloginfo('name'); ?></title>
    <link rel="pingback" hrefs=<?php bloginfo('pingback_url'); ?>>
</head>
<?php wp_head(); ?>

<body>
    <nav class="navbar mb-2 navbar-expand-lg bg-dark " data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <?php khalil_bootstrap_menu(); ?>
            </div>
        </div>
    </nav>