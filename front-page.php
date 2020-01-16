<?php
/**
 * The template for displaying homepage
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newsite
 */

get_header();?>



    <div class="uk-width-1-1">

        <?php
            if(have_posts()) :

                while(have_posts()) : the_post();

                    the_title('<h1>', '</h1>');
                    the_content();

                endwhile;

            else :?>

                Sorry there are no posts.

        <?php endif;?>

    </div>



<?php get_footer();?>

