<?php
if(get_theme_mod('hero_enabled', true)) :
?>
<section class="hero-section version1 section-padding relative" id="home">
    <div class="hero-section-content">
        <div class="container">
            <div class="row align-items-center">
                <!-- Welcome Content -->
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="welcome-content">
                        <h1 class="hero-title fadeInUp" data-wow-delay="0.2s">
                            <?php echo get_theme_mod('hero_title', 'Creative Meme Coins Template'); ?>
                        </h1>
                        <div class="hero-description">
                            <p class="fadeInUp" data-wow-delay="0.3s">
                                <?php echo get_theme_mod('hero_description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet dolorem blanditiis ad, labore delectus dolor sit amet, adipisicing elit. Eveniet ipsum dolor sit amet.'); ?>
                            </p>
                        </div>
                        <div class="d-inline-block">
                            <div class="contract-add contract-border align-items-center">
                                <i class="fa fa-copy"></i>
                                <input type="text" value="<?php echo esc_html(get_theme_mod('global_contract_address', '0xe3c127466908c2ccdc43521c8315b87fd369d605')); ?>" id="myInput">
                                <span class="b-text bold"><?php echo esc_html(get_theme_mod('global_contract_address', '0xe3c127466908c2ccdc43521c8315b87fd369d605')); ?></span>
                                <div class="tooltipy">
                                    <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                    <button class="copy-btn ml-8" onclick="myFunction()" onmouseout="outFunc()">Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="hero-image hedo-wrapper floating-anim mt-50">
                        <img src="<?php echo get_theme_mod('hero_image', get_template_directory_uri() . '/assets/img/core-img/header-img2.png'); ?>" alt="Hero Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
endif;