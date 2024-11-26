<?php
/**
 * The main template file.
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 * Template Name: Home Page
 */

get_header(); ?>


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

 <div class="moving-bg">
     <?php $count=1; if(get_field('marquee_box')): ?>
        <?php while(has_sub_field('marquee_box')): ?>
        <div class="marquee-block">
          <img src="<?php the_sub_field('marquee_image'); ?>">
          <p class="w-text"><?php the_sub_field('marquee_text'); ?></p>
        </div>
        <?php $count++; endwhile; ?>
        <?php endif; ?>
      </div>

    <!-- ##### About Us Area Start ##### -->
    <section class="section-padding-100 about-bg" id="about">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                    <div class="welcome-meter">
                        <img draggable="false" class="comp-img floating-anim" src="<?php the_field('about_image'); ?>"  alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 offset-lg-0 mt-s">
                    <div class="who-we-contant wavy-border">
                        <div class="dream-dots text-left fadeInUp" data-wow-delay="0.2s">
                            <span class="gradient-text"><?php the_field('read_more_sub_text'); ?></span>
                        </div>
                        <h4 class="fadeInUp" data-wow-delay="0.3s"><?php the_field('about_title'); ?></h4>
                        <p class="fadeInUp" data-wow-delay="0.4s"><?php the_field('about_content'); ?></p>
                        <?php
                        $link = get_field('about_button');
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn copy-btn v2 mt-15 fadeInUp" data-wow-delay="0.6s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

    <section class="darky how section-padding-100-50 dotted-bg">

        <div class="container">

            <div class="section-heading text-center">

                <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                    <span class="gradient-t green"><?php the_field('start_sub_title'); ?></span>
                </div>
                <h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php the_field('token_buy_title'); ?></h2>
                <p class="wow fadeInUp" data-wow-delay="0.4s"><?php the_field('token_content'); ?></p>
            </div>
            <div class="row">
                <?php if(get_field('how_to_steps')): ?>
                <?php while(has_sub_field('how_to_steps')): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Content -->
                    <div class="service_single_content box-shadow text-center mb-100 wow fadeInUp" data-wow-delay="0.2s">
                        <h6><?php the_sub_field('step_title'); ?></h6>
                        <p><?php the_sub_field('step_content'); ?></p>
                        <!-- Icon -->
                        <div class="service_icon">
                            <img draggable="false" src="<?php the_sub_field('step_image'); ?>" class="white-icon" alt="">
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="section-padding-100-70 about-bg relative">
        <div class="container">
            <div class="section-heading text-center">

                <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                    <span class="gradient-t green"><?php the_field('get_it_sub_title'); ?></span>
                </div>
                <h2 class="fadeInUp" data-wow-delay="0.3s"><?php the_field('get_title'); ?></h2>
                <p class="fadeInUp" data-wow-delay="0.4s"><?php the_field('get_content'); ?></p>
            </div>
            <div class="row align-items-center">
                <?php if(get_field('get_it_buttons')): ?>
                <?php while(has_sub_field('get_it_buttons')): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="who-we-contant mt-s">
                        <ul class="token-information">
                            <a href="<?php the_sub_field('get_link'); ?>">
                                <li>
                                    <h6><img src="<?php the_sub_field('get_image'); ?>" class="mr-1"> <?php the_sub_field('get_option'); ?></h6>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ##### Token Info Start ##### -->
    <div class="section-padding-100 relative counter-bg" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 col-md-12">

                    <div class="who-we-contant white-section has-shadow">
                        <h4 class="fadeInUp" data-wow-delay="0.3s"><?php the_field('buy_token_title'); ?></h4>
                        <p class="fadeInUp" data-wow-delay="0.4s"><?php the_field('buy_token_content'); ?></p>
                    </div>
                    <div class="mt-30">
                        <?php
                        $link = get_field('buy_token_button');
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn w-100 copy-btn v3 mt-15 fadeInUp" data-wow-delay="0.6s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-lg-5 offset-lg-1 col-md-12 mt-s">
                    <div class="creamy-section">
                        <div class="ico-counter">
                            <div class="counter-down">

                                <div class="content">
                                    <div class="conuter-header">
                                        <h3 class="w-text text-center"><?php the_field('token_sale_text'); ?></h3>
                                    </div>
                                    <div class="counterdown-content">
                                        <!-- Countdown  -->
                                        <div class="count-down titled circled text-center">
                                            <div class="simple_timer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ico-progress">
                            <ul class="list-unstyled list-inline clearfix mb-10">
                                <li class="title"><?php the_field('token_progress_min_number'); ?></li>
                                <li class="strength"><?php the_field('token_progress_max_number'); ?></li>
                            </ul>
                            <!-- skill strength -->
                            <div class="current-progress">
                                <div class="progress-bar has-gradient" style="width: 75%"></div>
                            </div>
                            <span class="pull-left"><?php the_field('token_progress_left_text'); ?></span>
                            <span class="pull-right"><?php the_field('token_progress_right_text'); ?></span>
                        </div>
                        <h4 class="pre-price"><?php the_field('token_value'); ?></h4>
                        <img src="<?php the_field('payemnt_modes'); ?>" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="roadmap section-padding-100" id="roadmap">
        <div class="section-heading text-center">

            <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                <span class="gradient-text green"><?php the_field('roadmap_sub_title'); ?></span>
            </div>
            <h2 class="fadeInUp" data-wow-delay="0.3s"><?php the_field('roadmap_title'); ?></h2>
            <p class="fadeInUp" data-wow-delay="0.4s"><?php the_field('roadmap_content'); ?></p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline">
                        <?php if(get_field('roadmap_box')): ?>
                        <?php while(has_sub_field('roadmap_box')): ?>
                        <div class="timeline">
                            <div class="icon"></div>
                            <div class="date-content">
                                <div class="date-outer"> <span class="date"> <span class="month"><?php the_sub_field('phase_title'); ?></span> <span class="year gradient-t green"><?php the_sub_field('phase_number'); ?></span> </span>
                                </div>
                            </div>
                            <div class="timeline-content">
                                <span class="arrowo"></span>
                                <h5 class="title"><?php the_sub_field('phase_detail_title'); ?></h5>
                                <p class="description text-light-gray"> <?php the_sub_field('phase_content'); ?></p>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ##### Token Info Start ##### -->
    <div class="section-padding-100-70 dotted-bg relative" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                    <span class="gradient-t green"><?php the_field('tokenomics_sub_title'); ?></span>
                </div>
                <h2 class="fadeInUp" data-wow-delay="0.3s"><?php the_field('tokenomics_title');  ?></h2>
                <p class="fadeInUp" data-wow-delay="0.4s"><?php the_field('tokenomics_content'); ?></p>
            </div>
            <div class="row align-items-center justify-content-center">
                <?php if(get_field('tokenomics_division')): ?>
                <?php while(has_sub_field('tokenomics_division')): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="who-we-contant mt-s">
                        <ul class="token-information">
                            <li>
                                <img src="<?php the_sub_field('image_one'); ?>" class="mon-img1" alt="">
                                <h6><span class="gradient-t green mr-1"><?php the_sub_field('percentage'); ?></span> <?php the_sub_field('segment'); ?></h6>
                                <img src="<?php the_sub_field('image_two'); ?>" class="mon-img2" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ##### FAQ & Timeline Area Start ##### -->
    <div class="faq-timeline-area section-padding-100-85" id="faq">
        <div class="container">
            <div class="section-heading text-center">

                <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                    <span class="gradient-t green"><?php the_field('faq_sub_title'); ?></span>
                </div>
                <h2 class="fadeInUp" data-wow-delay="0.3s">  <?php the_field('faq_title'); ?></h2>
                <p class="fadeInUp" data-wow-delay="0.4s"><?php the_field('faq_content'); ?></p>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 offset-lg-0 col-md-8 offset-md-2 col-sm-12">
                    <div class="welcome-meter">
                        <img draggable="false" class="comp-img" src="<?php the_field('faq_image'); ?>" alt="">
                        <img draggable="false" class="supportImg floating-anim" src="<?php the_field('faq_image_float_image'); ?>" alt="image">
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="dream-faq-area mt-s ">

                        <dl style="margin-bottom:0">
                            <?php $index_query = new WP_Query(array( 'post_type' => 'faq', 'posts_per_page' => -1,'order'=>'DESC' )); ?>
		                <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
                            <!-- Single FAQ Area -->
                            <dt class="wave fadeInUp" data-wow-delay="0.2s"><?php the_title(); ?></dt>
                            <dd class="fadeInUp" data-wow-delay="0.3s">
                                <p><?php the_content(); ?></p>
                            </dd>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </dl>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### FAQ & Timeline Area End ##### -->


    <section class="container" >
        <div class="subscribe section-padding-0-100">
            <div class="row">
                <div class="col-sm-12">
                    <div class="subscribe-wrapper">
                        <div class="section-heading text-center">
                            <h2 class="wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><?php the_field('newsletter_title'); ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;"><?php the_field('newsletter_content'); ?></p>
                        </div>
                        <div class="service-text text-center">

                            <div class="subscribe-section has-shadow">
                                <div class="input-wrapper">
                                    <i class="fa fa-home"></i>
                                    <input type="email" placeholder="Enter your Email">
                                </div>
                                <button class="btn copy-btn v2">Subscribe</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(img/core-img/pattern.png);">

        <!-- ##### Contact Area Start ##### -->
        <div class="contact_us_area section-padding-0-0" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-center">

                            <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                                <span class="gradient-text"><?php the_field('contact_us_sub_title'); ?></span>
                            </div>
                            <h2 class="fadeInUp" data-wow-delay="0.3s"><?php the_field('contact_us_title'); ?></h2>
                            <p class="fadeInUp" data-wow-delay="0.4s"><?php the_field('contact_us_content'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="contact_form">
                            <form action="#" method="post" id="main_contact_form">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="success_fail_info"></div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="group fadeInUp" data-wow-delay="0.2s">
                                            <input type="text" name="name" id="name" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group fadeInUp" data-wow-delay="0.3s">
                                            <input type="text" name="email" id="email" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group fadeInUp" data-wow-delay="0.4s">
                                            <input type="text" name="subject" id="subject" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group fadeInUp" data-wow-delay="0.5s">
                                            <textarea name="message" id="message" required></textarea>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center fadeInUp" data-wow-delay="0.6s">
                                        <button type="submit" class="btn copy-btn v2">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Contact Area End ##### -->



<?php // get_sidebar(); ?>
<?php get_footer(); ?>