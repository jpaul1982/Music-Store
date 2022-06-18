<?php

/**
 * The Header for our theme
 *
 * @package WordPress
 * @subpackage GLib
 * @since GLib 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8">
<![endif]-->
<!--[if gt IE 8]>
<html class="ie-modern">
<![endif]-->
<!--[if !IE]><!-->
<html class="not-ie" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php echo get_bloginfo(); ?></title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">


  <?php wp_head(); ?>

</head>

<body data-menu="inactive">
  <?php
  $nav_menu =
    wp_nav_menu(
      array(
        'theme_location'  => 'global',
        'sort_column'      => 'menu_order',
        'container'        => false,
        'echo'            => '0',
        'depth'            => 2,
        'menu_class'      => 'header-menu__nav'
      )
    );

  ?>

  <header>
    <div class="container-fluid">
      <div class="container d-flex justify-content-between">
        <div class='menu d-flex align-items-end'>
          <?php include(locate_template('components/logo.php', false, false)); ?>
          <?php include(locate_template('components/hamburger.php', false, false)); ?>
          <?php
          $nav_classes = 'header-menu';
          include(locate_template('components/nav.php', false, false));
          ?>
        </div>
        <div class="cart d-flex align-items-end">
          <a class='search mr-3 mr-lg-5' href="/"><i class="fa-solid fa-magnifying-glass"></i></a>
          <div class="sign-in mr-3 mr-lg-5">
            <a class="d-inline-block" href="">Login / </a>
            <a href="">SignUp</a>
          </div>
          <a class='cart-icon' href="/"><i class="fa-solid fa-cart-shopping-fast"></i></a>
        </div>
      </div>
    </div>

  </header>