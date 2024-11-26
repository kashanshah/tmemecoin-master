<?php
if (get_theme_mod('about_enabled', true)) :
    $bgImg = get_theme_mod('about_background_image', '');
    $bgColor = get_theme_mod('about_bg_color', '');
    ?>
<section
        class="about-sec section-padding-100"
        id="about"
        style="
        <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
        <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
                "
>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                <div class="welcome-meter about-image">
                    <img draggable="false" class="comp-img floating-anim" src="<?php echo esc_url(get_theme_mod('about_image', get_template_directory_uri() . '/assets/img/core-img/about.png')); ?>" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6 offset-lg-0 mt-s">
                <div class="who-we-contant wavy-border">
                    <div class="dream-dots text-left fadeInUp about-subtitle" data-wow-delay="0.2s">
                        <span class="gradient-text"><?php echo esc_html(get_theme_mod('about_subtitle', 'Read More About our Memecoin')); ?></span>
                    </div>
                    <h4 class="fadeInUp fadeInUp about-title" data-wow-delay="0.3s">
                        <?php echo esc_html(get_theme_mod('about_title', 'About Our Memecoin')); ?>
                    </h4>
                    <div class="about-description">
                        <p class="fadeInUp" data-wow-delay="0.4s">
                            <?php echo esc_html(get_theme_mod('about_description_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at dictum risus, non suscipit arcu.')); ?>
                        </p>
                        <p class="fadeInUp" data-wow-delay="0.5s">
                            <?php echo esc_html(get_theme_mod('about_description_2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ipsa ut quasi adipisci voluptates, voluptatibus.')); ?>
                        </p>
                    </div>
                    <a class="btn copy-btn v2 mt-15 fadeInUp" data-wow-delay="0.6s" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
endif;

