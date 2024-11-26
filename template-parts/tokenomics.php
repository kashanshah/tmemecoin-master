<?php
if(get_theme_mod('tokenomics_enabled', true)) :
// Fetch tokenomics data from Customizer settings
$tokenomics_data = get_theme_mod('tokenomics_repeater', '[]');
$tokenomics_items = json_decode($tokenomics_data, true);

?>
<!-- ##### Token Info Start ##### -->
<div class="section-padding-100-70 dotted-bg relative" id="features">
    <div class="container">
        <div class="section-heading text-center">
            <div class="dream-dots justify-content-center fadeInUp tokenomics-subtitle" data-wow-delay="0.2s">
                <span class="gradient-t green"><?php echo get_theme_mod('tokenomics_subtitle', 'Our Tokenomics'); ?></span>
            </div>
            <h2 class="tokenomics-title fadeInUp"
                data-wow-delay="0.3s"><?php echo get_theme_mod('tokenomics_title', 'Our Tokenomics'); ?></h2>
            <p class="tokenomics-description fadeInUp" data-wow-delay="0.4s">
                <?php echo get_theme_mod('tokenomics_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.'); ?>
            </p>
        </div>
        <div class="row align-items-center justify-content-center">
            <?php
            if (empty($tokenomics_items)) {
                $tokenomics_items = [
                    ['subtitle' => 'Liquidity', 'title' => '30%', 'image_1' => get_template_directory_uri().'/assets/img/icons/t1.png', 'image_2' => ''],
                    ['subtitle' => 'Donation', 'title' => '5%', 'image_1' => get_template_directory_uri().'/assets/img/icons/t2.png', 'image_2' => ''],
                    ['subtitle' => 'Presale', 'title' => '50%', 'image_1' => get_template_directory_uri().'/assets/img/icons/t4.png', 'image_2' => ''],
                    ['subtitle' => 'Dex', 'title' => '5%', 'image_1' => get_template_directory_uri().'/assets/img/icons/t8.png', 'image_2' => get_template_directory_uri().'/assets/img/icons/t3.png'],
                    ['subtitle' => 'Marketing', 'title' => '5%', 'image_1' => get_template_directory_uri().'/assets/img/icons/t6.png', 'image_2' => get_template_directory_uri().'/assets/img/icons/t5.png'],
                    ['subtitle' => 'Tax', 'title' => '0%', 'image_1' => get_template_directory_uri().'/assets/img/icons/t7.png', 'image_2' => get_template_directory_uri().'/assets/img/icons/t8.png'],
                    ['subtitle' => 'Burn Tokens', 'title' => '5%', 'image_1' => get_template_directory_uri().'/assets/img/icons/t9.png', 'image_2' => ''],
                ];
            }
            // Split items into chunks for columns (3 items per column)
            $columns = array_chunk($tokenomics_items, 3);
            $index = 0;

            foreach ($columns as $column) : ?>
                <?php foreach ($column as $item) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="who-we-contant mt-s token-information-div">
                            <ul class="token-information">
                                <li>
                                    <?php if (!empty($item['image_1'])) : ?>
                                        <img src="<?php echo esc_url($item['image_1']); ?>"
                                             class="mon-img1 token-information-title-<?php echo $index; ?>-1"
                                             alt="">
                                    <?php endif; ?>
                                    <h6 class="token-information-title-<?php echo $index; ?>">
                                        <span class="gradient-t green mr-1"><?php echo esc_html($item['title']); ?></span>
                                        <?php echo esc_html($item['subtitle']); ?>
                                    </h6>
                                    <?php if (!empty($item['image_2'])) : ?>
                                        <img src="<?php echo esc_url($item['image_2']); ?>"
                                             class="mon-img2 token-information-image_2-<?php echo $index; ?>"
                                             alt="">
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php $index++; ?>
            <?php endforeach;
            ?>
        </div>
    </div>
</div>
<!-- ##### Token Info End ##### -->
<?php
endif;
?>
