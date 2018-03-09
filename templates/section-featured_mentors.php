<?php
  $featured_mentors_copy = get_sub_field('featured_mentors_copy');
  $show_button = get_sub_field('show_button');
  $button_link = get_sub_field('link');
  $featured_logo = get_sub_field('logo');
?>

<div class="content-block section-<?php echo get_row_layout(); ?>">
  <div class="content-inner">

    <?php
      if ($featured_mentors_copy) :
        echo '<div class="copy">';

        if ($featured_logo) :
          printf('<figure class="featured-logo"><img src="%s" alt="" /></figure>',
            $featured_logo['sizes']['medium']);
        endif;

        if ($featured_mentors_copy['title']) :
          printf(__('<h2 class="title-featured">%s</h2>', 'ntsp'), $featured_mentors_copy['title']);
        endif;

        if ($featured_mentors_copy['copy']) :
          printf(__('<p>%s</p>', 'ntsp'), $featured_mentors_copy['copy']);
        endif;

        if ($show_button) :
          printf('<a href="%s" target="%s" class="link">%s</a>',
            $button_link['url'],
            $button_link['target'],
            $button_link['title']
          );
        endif;

      echo '<div class="gradient-bg"></div>';
      echo '</div>';
      endif;

      $mentor_ids = [];
      if (have_rows('featured_mentors')) while (have_rows('featured_mentors')) : the_row();
        array_push($mentor_ids, get_sub_field('mentor'));
      endwhile;

      $mentor_args = array('post_type' => 'mentor', 'post__in' => $mentor_ids);
      $mentors = new WP_Query($mentor_args);

      if ($mentors->have_posts()) :

        echo '<ul class="featured-mentors">';

          while ($mentors->have_posts()) : $mentors->the_post();

            $name = get_the_title();
            $title = get_field('title');
            $company = get_field('company') ? ' @ ' . get_field('company') : '';
            $photo = get_field('photo');

            echo '<li><div class="inner-frame">';

              printf('<div class="details">%s%s</div>',
                sprintf('<h3>%s</h3>', $name),
                sprintf('<h4>%s%s</h4>', $title, $company)
              );

              printf('<figure class="photo"><img src="%s" alt="" /></figure>',
                $photo['sizes']['medium']
              );

            echo '</div></li>';

          endwhile;
          wp_reset_postdata();

        echo '</ul>';

      endif;

      if ($featured_mentors_copy['vertical_title']) :
        printf(__('<h2 class="title-vertical"><span>%s</span></h2>', 'ntsp'), $featured_mentors_copy['vertical_title']);
      endif;
    ?>

  </div>
</div>
