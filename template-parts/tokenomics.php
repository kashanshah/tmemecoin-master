<!-- ##### Token Info Start ##### -->
<div class="section-padding-100-70 dotted-bg relative" id="features">
    <div class="container">
        <div class="section-heading text-center">
            <?php
            $features_sub_title = get_theme_mod('features_sub_title', 'Our Tokenomics');
            $features_title = get_theme_mod('features_title', 'Our Tokenomics');
            $features_description = get_theme_mod('features_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.');

            if (!empty($features_sub_title)) {
                ?>
                <div class="dream-dots justify-content-center fadeInUp features-sub-title" data-wow-delay="0.2s">
                    <span class="gradient-t green"><?php echo esc_html($features_sub_title); ?></span>
                </div>
                <?php
            }
            ?>

            <?php
            if (!empty($features_title)) {
                ?>
                <h2 class="features-title fadeInUp" data-wow-delay="0.3s"><?php echo esc_html($features_title); ?></h2>
                <?php
            }
            ?>
            <?php
            if (!empty($features_description)) {
                ?>
                <p class="features-description fadeInUp" data-wow-delay="0.4s"><?php echo esc_html($features_description); ?></p>
                <?php
            }
            ?>
        </div>
        <?php
        $features_list = get_theme_mod('features_list', []);
        if (!empty($features_list)) {
            $features_list = json_decode($features_list, true);
            ?>
        <div class="row align-items-center">

            <div class="col-lg-4 col-md-6">
                <div class="who-we-contant mt-s">
                    <ul class="token-information">
                        <?php
                        foreach ($features_list as $feature) {
                            $title = !empty($feature['title']) ? $feature['title'] : '';
                            $description = !empty($feature['description']) ? $feature['description'] : '';
                            $image = !empty($feature['image']) ? $feature['image'] : '';
                            ?>
                            <li>
                                <img src="<?php echo esc_url($image); ?>" class="mon-img1" alt="">
                                <h6><span class="gradient-t green mr-1">30%</span> Liquidity</h6>
                            </li>
                            <li>
                                <img src="<?php echo esc_url($image); ?>" class="mon-img1" alt="">
                                <h6><span class="gradient-t green mr-1">5%</span> dex</h6>
                                <img src="<?php echo esc_url($image); ?>" class="mon-img2" alt="">
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="who-we-contant mt-s">
                    <ul class="token-information">
                        <li>
                            <img src="img/icons/t2.png" class="mon-img1" alt="">
                            <h6><span class="gradient-t green mr-1">5%</span> donation</h6>
                        </li>
                        <li>
                            <img src="img/icons/t6.png" class="mon-img1" alt="">
                            <h6><span class="gradient-t green mr-1">5%</span> marketing</h6>
                            <img src="img/icons/t5.png" class="mon-img2" alt="">
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="who-we-contant mt-s">
                    <ul class="token-information">
                        <li>
                            <img src="img/icons/t4.png" class="mon-img1" alt="">
                            <h6><span class="gradient-t green mr-1">50%</span> presale</h6>
                        </li>
                        <li>
                            <img src="img/icons/t7.png" class="mon-img1" alt="">
                            <h6><span class="gradient-t green mr-1">0%</span> tax</h6>
                            <img src="img/icons/t8.png" class="mon-img2" alt="">
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4 offset-md-4 col-md-6">
                <div class="who-we-contant mt-s">
                    <ul class="token-information">
                        <li>
                            <img src="img/icons/t9.png" class="mon-img1" alt="">
                            <h6><span class="gradient-t green mr-1">5%</span> Burn Tokens</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>

