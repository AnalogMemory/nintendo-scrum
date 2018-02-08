<?php
/**
 * The main template file.
 *
 */

get_header();

$postTypeClass = 'content-' . get_post_type();
$postNameClass = 'content-' . $post->post_name;
?>

<main id="main" class="content-default <?php echo $postTypeClass . ' ' . $postNameClass; ?>" role="main">

<?php

  if (have_posts()) :

    while (have_posts() ) : the_post();

      if (get_post_type() == 'page') :

        // Attempts to get a page-postName.php if it exists
        // Gets template page.php if nothing matches
        get_template_part('templates/page', $post->post_name);

      elseif (is_archive()) :

        // Use page-postType.php if is archive of custom posts
        get_template_part('templates/page', get_post_type());

      else :

        // Attempts to get a post-postType.php if it exists
        // Gets template post.php if nothing matches
        get_template_part('templates/post', get_post_type());

      endif;

    endwhile;

  else :

    // Gets error template for post error or post does not exist
    get_template_part('templates/404');

  endif;

?>

</main>

<?php get_footer();
