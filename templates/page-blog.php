<?php
/**
 * Blog Page Template
 *
 */

?>

<div class="content-block section-blog-index">
    
  <?php
    $blog_args = array('post_type' => 'post');
    $blog = new WP_Query($blog_args);

    if ($blog->have_posts()) :

      $count = 0;
      while ($blog->have_posts()) : $blog->the_post();

        $title = get_the_title();
        $description = get_field('description');
        $featured_image = get_field('featured_image');
        
        printf('<article class="post">%s%s</a></article>',
          sprintf('<figure class="featured-image"><img src="%s" class="%s" alt="" /></figure>', 
            $featured_image['sizes']['large'],
            $rellax = $count == 0 ? 'rellax' : ''
          ),
          sprintf('<a href="%s"><div class="copy"><h2 class="title">%s</h2><p>%s</p></div></a>', 
            get_the_permalink(),
            $title,
            $description
          )
        );
        $count++;
        
      endwhile;
      wp_reset_postdata();

    endif;
  ?>

</div>