<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package newsite
 */

get_header();?>

    <div class="uk-width-expand@m uk-align-center uk-margin-remove-bottom uk-flex-last@m">        
    
	    <section class="error-404 not-found">
    		<header class="page-header">
    			<h1 class="page-title"><?php esc_html_e( 'Sorry! That page can&rsquo;t be found.', 'newsite' ); ?></h1>
    		</header><!-- .page-header -->
    
    		<div class="page-content">
    			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'newsite' ); ?></p>
    
    			<?php
    			get_search_form();
    
    			the_widget( 'WP_Widget_Recent_Posts' );
    			?>
    
    			<div class="widget widget_categories">
    				<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'newsite' ); ?></h2>
    				<ul>
    					<?php
    					wp_list_categories( array(
    						'orderby'    => 'count',
    						'order'      => 'DESC',
    						'show_count' => 1,
    						'title_li'   => '',
    						'number'     => 10,
    					) );
    					?>
    				</ul>
    			</div><!-- .widget -->
    
    			<?php
    			/* translators: %1$s: smiley */
    			$newsite_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'newsite' ), convert_smilies( ':)' ) ) . '</p>';
    			the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$newsite_archive_content" );
    
    			the_widget( 'WP_Widget_Tag_Cloud' );
    			?>
    
    		</div><!-- .page-content -->
    	</section><!-- .error-404 -->
		    

    </div>
        
    <?php get_sidebar() ;?>
    
<?php get_footer();?>
