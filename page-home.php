<?php

/**
 * Template Name: Homepage
 */
get_header();

// start the loop
if (have_posts()) : while (have_posts()) : the_post();

?>
        <main>
            <?php
            if (have_rows('hero_fields')) :
                while (have_rows('hero_fields')) : the_row();
                    $hero_images = get_sub_field('hero_images');
                    $hero_header_top = get_sub_field('hero_header_top');
                    $hero_header_bottom = get_sub_field('hero_header_bottom');

            ?>
                    <section class='hero-section'>
                        <div class="hero-section__content">
                        <h1><?php echo $hero_header_top; ?></h1>
                        <img class='hero-section__logo' src="<?php echo get_field('site_logo','options')['url'];?>" alt="site logo">
                        <h1><?php echo $hero_header_bottom; ?></h1>
                        </div>
                        
                        <div class="hero-slider">
                            <?php if ($hero_images) :

                                foreach ($hero_images as $image) : ?>
                                    <div>
                                        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </section>
    <?php endwhile;
            endif;

        endwhile;
    endif; ?>
        </main>
        <?php
        get_footer();
