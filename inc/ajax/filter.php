<?php

add_action('wp_ajax_nopriv_filter', 'filter_ajax');
add_action('wp_ajax_filter', 'filter_ajax');


function filter_ajax()
{
    $product_cat = $_POST['product-category'];
    $product_color = $_POST['product-colors'];
    $product_price = $_POST['product-price'];
    $product_brand = $_POST['product-brand'];

    $args = array(
        'post_type'        => 'products',
        'posts_per_page'   => -1,
        'cat' => $product_cat,
    );

    if (!empty($product_brand)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'brands',
                'field' => 'term_id',
                'terms' => array($product_brand)
            )

        );
    }

    if (!empty($product_price)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'price',
                'field' => 'term_id',
                'terms' => array($product_price)
            )

        );
    }

    if (!empty($product_color)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'color',
                'field' => 'term_id',
                'terms' => $product_color
            )

        );
    }



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
    else : ?>
        <div>
            <p>No items found</p>
        </div><?php
            endif; ?>
<?php wp_reset_query();

    die();
}
