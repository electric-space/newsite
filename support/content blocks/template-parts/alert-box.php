<?php 
    

    
    if( !$bg ) $bg  = 'taupe-dark';
    
    if( $title == 'when-will' ){

        $quote = get_field('alert_box', 9);
        
        $ar = str_ireplace( array('<p>', '</p>'), '', $quote[0]['alert_copy'] );
        
        //$ar = strip_tags( $quote[0]['alert_copy'], '<p>' );
        
        $ar = explode( " ", $ar );
        
        $c= 0;
        $split_alert = '';
        
        //print_r($ar);
        
        $split_alert .= '<p class="alert"><span>'.$ar[0].' ';
        
        for( $c=0; $c<count($ar); $c++){
            
            
            if( $c == 1 ){
                $split_alert .= $ar[1].' </span><span>';
            }
            
            if($c >= 2  ) {
                $split_alert .= $ar[$c].' ';
            }
            
            if( $c == 4 ){
                $split_alert .= '</span><span>';
            }
            

        }
        
        $split_alert .= '</span>';
        
    }
    
    
     ;?>



<div class="alert-box <?php echo $bg . ' '. strtolower( str_ireplace(' ' , '-', $title) );?>">
    <div class="uk-container">
        <div class="uk-width-1-1 uk-text-center">
            
            <?php if( $alert = get_field('alert_box', 9) ): ;?>
                <div class="notice">
                    <?php 
                        if( $title == 'when-will' )
                             echo $split_alert;
                        else
                            echo $alert[$item]['alert_copy'] ;?>
                </div>
            <?php endif ;?>
            
        </div>
    </div>
</div>



<?php //reset alert title 
    
    $title = '';
    
    
    ;?>


