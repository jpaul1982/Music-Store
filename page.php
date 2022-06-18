<?php
/**
 * Standard Page Template
 */

 get_header();

 // start the loop
 if ( have_posts() ) : while ( have_posts() ) : the_post();


the_content();

endwhile; endif;

get_footer();