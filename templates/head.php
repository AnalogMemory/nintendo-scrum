<?php
/**
 * HTML Head & Opening Body Elements
 *
 */

global $images;

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <link rel="shortcut icon" href="<?php echo $images->imagePath('favicon.png'); ?>" />

  <?php wp_head(); ?>

  <?php get_template_part('templates/partial', 'google-analytics'); ?>

</head>
<body <?php body_class(); ?>>
