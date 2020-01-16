<?php
    
    if( $address = get_field('office_address', 'option') ) echo '<h3>Address</h3>'.$address;

    if( $phone = get_field('phone_number', 'option') ) echo '<h3>Telephone</h3><p>'.  $phone .'</p>';
    
    echo '<h3>Email</h3><p>'. do_shortcode('[email]') .'</p>';




;?>