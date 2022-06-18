<?php
/*
* Template Name: Guitars
* Template Post Type: Guitars  
*/
get_header();

// start the loop
if (have_posts()) : while (have_posts()) : the_post();

        $args = array(
            'post_type' => 'guitars', // your post type,
            'orderby' => 'post_date',
            'order' => 'DESC',
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