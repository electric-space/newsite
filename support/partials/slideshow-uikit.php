<?php 
    
/**
 * Slider code for UiKit and custom fields    
 */
?>

<?php 
    
    if( $slider = get_field('slide') ): ;?>

    <section class="banner">
        
        <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="autoplay: false">
            
            <ul class="uk-slideshow-items uk-text-center">
    
            <?php 
        	    foreach( $slider as $slide )
        	    {
                    echo '<li class="slide">
                            
                            <img src="'.$slide['image']['url'].'" alt="'.$slide['image']['alt'].'" />';
                                    
                            if( $slide['caption'] )
                            {   
                                echo '<div class="uk-width-1-2@m uk-position-center  uk-text-center uk-overlay ">';
                                echo '<div class="caption-copy">'.$slide['caption'].'</div>';
                                echo '</div>';
                            };
                            
                    echo '</li>';
                    
                };?>
        
            </ul>
    
            <a class="uk-position-center-left uk-position-small uk-hidden-hover prev-pag" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover next-pag" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            
        </div>
            
        
    </section>
    
    <?php endif ;?>
    
    
    