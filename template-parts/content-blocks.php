<?php if( have_rows('block') ):;?>

    <?php while( have_rows('block') ): the_row();

        $bgcolor     = get_sub_field('background_color');
        $columns     = get_sub_field('cols');
        $padding_all = get_sub_field('remove_padding');
        $block_class = get_sub_field('block_class');
        $layout      = get_row_layout(); ?>
        
        
        <?php if( $layout == 'full_width_image' ): ;?>
        
            <section class="uk-section  uk-padding-remove <?php echo $layout ;?>  <?php if($block_class) echo $block_class ;?>" <?php if( $bgcolor ) echo 'style="background-color:'.$bgcolor.'"' ;?>>
                <div class="uk-cover-container uk-height-large">
                    <?php $img =  get_sub_field('image');?>
                    <img src="<?php echo $img['url'] ;?>" alt="<?php echo $img['alt'] ;?>" uk-cover>
                </div>
            </section>
        
        <?php elseif( $layout == 'image_slider'): ;?>
        
            <?php
                $block_slides = get_sub_field('block_slides');
                //$slides = get_sub_field('image_slider');
                include( locate_template('support/partials/slideshow-uikit.php') );
                
                ;?>
            
        <?php else: ;?>
        
            <section class="uk-section <?php if($padding_all) echo 'uk-padding-remove' ;?> <?php echo $layout ;?> <?php if($block_class) echo $block_class ;?>" <?php if( $bgcolor ) echo 'style="background-color:'.$bgcolor.'"' ;?>>
                
                    <?php if( $span = get_sub_field('col_span') ):;?>
                            <div uk-grid>
                                <div class="uk-width-1-1 column-span"><?php echo $span;?></div>
                            </div>
                    <?php endif ;?>

                    
                    <?php if( !empty($columns['col1']) ):;?>
                            <div class="uk-container uk-section">
                                <div class="uk-child-width-expand@m" uk-grid>
                                <?php
                                    $c=1;
                                    foreach( $columns as $column){
                                        
                                        echo '<div class="col'.$c.'">';
                                        if( strpos($column,'map') || strpos($column,'site-plan') ){
                                            echo '<div uk-lightbox>'.$column.'</div>';
                                        }else{
                                            echo $column;
                                        }
                                        echo '</div>';
                                        $c++;
                                    };?>
                                </div>
                            </div>
                    <?php endif;?>
                
            </section>
        
        <?php endif ;?>

    <?php endwhile ;?>
    
<?php endif;?>



<?php //print_r( get_field('block') ) ;?>

