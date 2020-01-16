<?php if( $accounts = get_field('social_accounts', 'option') ):?>

<ul class="social-list clear">
	<?php 
        		
        $social = explode("\n", $accounts);
        
        foreach( $social as $link )
        {
           $account = array_filter( explode('/', $link) );
           $account = str_ireplace( array('www.','.com','.co.uk'), '', $account[2]);
           echo '<li class="'.$account.'"><a href="'.$link.'" class="social_icons" target="_blank" uk-icon="'.trim($account).'"></a></li>';
        
        }
        
    ;?>

</ul>

<?php endif ;?>