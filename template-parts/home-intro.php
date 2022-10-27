<section class="home-intro__container">

    <?php if (have_rows('header_slider')) : ?>

        <div class="home-intro__left">

            <div class="home-intro__slides">

                <?php while (have_rows('header_slider')) : the_row(); ?>

                    <?php $image = get_sub_field('image'); ?>

                    <?php $link = get_sub_field('link'); ?>

                    <div class="home-intro__slide">

                        <img src="<?php echo esc_url($image['url']) ?>" alt="<?php the_sub_field('title'); ?>">

                        <div class="home-intro__slide-content">

                            <h3><?php the_sub_field('title'); ?></h3>

                            <div class="home-intro__slide-content-text">

                                <?php the_sub_field('text'); ?>

                            </div>

                            <div class="home-intro__slide-cta">

                                <a class="cta cta--primary" href="<?php echo esc_url($link['url']) ?>"><?php echo $link['title'] ?></a>

                            </div>

                        </div>

                        <div class="overlay"></div>

                    </div>

                <?php endwhile; ?>

            </div>

            <span id="home-intro-slider-prev" class="chevron chevron-prev"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-left.svg') ?></span>
            <span id="home-intro-slider-next" class="chevron chevron-next"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-right.svg') ?></span>

        </div>

    <?php endif; ?>


    <?php if (have_rows('banners')) : ?>

        <div class="home-intro__right">

            <?php while (have_rows('banners')) : the_row(); ?>

                <?php $image = get_sub_field('image'); ?>

                <?php $video_url = get_sub_field('video_url'); ?>

                <?php $link = get_sub_field('link'); ?>

                <div class="home-intro__right-single">

                    <img src="<?php echo esc_url($image['url']) ?>" alt="<?php the_sub_field('title'); ?>">

                    <?php if (!$video_url) : ?>

                        <div class="home-intro__right-single-content">

                            <h3><?php the_sub_field('title'); ?></h3>

                            <div class="home-intro__right-single-text">

                                <?php the_sub_field('text'); ?>

                            </div>

                            <div class="home-intro__right-single-cta">

                                <a class="cta cta--primary" href="<?php echo esc_url($link['url']) ?>"><?php echo $link['title'] ?></a>

                            </div>


                        </div>

                    <?php endif; ?>

                    <?php if ($video_url) : ?>

                        <a href="javascript:void(0);" id="play-video" class="video-indicator">

                            <?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/play.svg'); ?>

                        </a>

                    <?php endif; ?>

                    <div class="overlay"></div>

                </div>

            <?php endwhile; ?>

        </div>

    <?php endif; ?>

</section>