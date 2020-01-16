<!-- This adds the copyright info, it breaks into 2 rows at small screens (min-width: 530px) -->

<ul class="copyright--wrapper">
	<li>&copy;<?php echo date('Y') ;?> | <?php bloginfo('site') ;?></li>
	<li><?php the_field('footer_attribution', 'option');?></li>
</ul>