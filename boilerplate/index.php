<!DOCTYPE html>
<!--[if lt IE 7]>	  <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>		 <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>		 <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
	<head>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php get_header() ?>
		<?php
			// WordPress loop : select the current displayed post
			the_post();
		?>

		<!-- Add your site or application content here -->
		<h1><?php the_title() ?></h1>
		<?php the_content();?>

		<?php get_footer() ?>
		<?php wp_footer(); ?>
	</body>
</html>
