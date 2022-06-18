<?php

/**
 * Standard Post Template
 */

get_header();

// start the loop
if (have_posts()) : while (have_posts()) : the_post();

        $args = array(
            'post_type' => 'guitars', // your post type,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'cat' => '36' // current category ID
        );
        $postslist = get_posts($args);
        foreach ($postslist as $post) :  setup_postdata($post);
?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
<?php endforeach;

    endwhile;
endif;

get_footer();
