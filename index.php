<?php
/**
 * The main template file
 *
 * @package Memecoin_Master
 */
get_header();
?>

<main>
    <!-- Content sections will go here -->
    <?php
    // Example: Include template parts
    get_template_part('template-parts/hero');
    get_template_part('template-parts/about');
    get_template_part('template-parts/tokenomics');
//    get_template_part('template-parts/section-services');
//    get_template_part('template-parts/section-contact');
    ?>
</main>

<?php get_footer(); ?>
