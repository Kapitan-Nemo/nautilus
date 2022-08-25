<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
	<div class="header__menu container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img class="" src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/img/nautilus-logo.png">
		</a>
		<?php echo wp_nav_menu(); ?>
	</div>
</header>
<main>
