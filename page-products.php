<?php

/**
 * Template Name: Products
 */

get_header();

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url)['path'];
$new_parts = str_replace('/', ' ', $parts);
$result = (explode(" ", $new_parts));
$type = $result[1];
$cat_id = get_cat_ID($type);
?>

<section>
    <div class="container">
        <h1><?php echo ucfirst($type); ?> Page</h1>
        <div class="d-flex pt-5">
            <div class="sidebar"><?php include(locate_template('components/sidebar.php', false, false, $type, $cat_id)); ?></div>
            <div class="d-flex flex-wrap filter-target" id="target">

                <?php
                $args = array(
                    'post_type'        => 'products',
                    'posts_per_page'   => -1,
                    'cat' => $cat_id,
                );
                $query = new WP_Query($args);
                // start the loop
                if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                        $no_img = get_field('no_image', 'options')['url'];
                ?>

                        <div class="card mx-4 mx-md-2 mx-xl-4">
                            <div class="card__inner">
                                <?php if (has_post_thumbnail()) { ?>
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
                                <?php } else {
                                ?>
                                    <img src="<?php echo $no_img ?>" alt="no-image" />
                                <?php } ?>

                                <h6 class="mt-3"><?php the_title(); ?></h6>
                                <p>$ <?php echo get_field('price'); ?></p>

                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
                <?php wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
