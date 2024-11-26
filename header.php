<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part('template-parts/pre-loader') ?>

<!-- ##### Header Area Start ##### -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="banner">
    <div class="container">
        <!-- Brand -->
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span><?php bloginfo('name'); ?></span>
            <?php endif; ?>

        <!-- Toggler/collapsible Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => 'navbar-nav ml-auto',
                'fallback_cb'    => false,
                'depth'          => 2,
                'walker'         => new WP_Bootstrap_Navwalker(),
            ));
            ?>
            <a href="#" class="btn copy-btn v2 ml-50 mb-md-2">Get Started</a>
        </div>
    </div>
</nav>
<!-- ##### Header Area End ##### -->

