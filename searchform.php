<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="search-field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
	<div class="submit-wrapper">
    	<input type="submit" class="submit" name="submit" id="searchsubmit" value="" alt="Search" />
    	<span class="uk-form-icon" uk-icon="icon: search"></span>
	</div>
</form>