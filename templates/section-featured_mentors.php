<?php
  $featured_mentors_copy = get_sub_field('featured_mentors_copy');
  $show_button = get_sub_field('show_button');
  $button_link = get_sub_field('link');
?>

<div class="content-block section-<?php echo get_row_layout(); ?>">

  <?php
    if ($featured_mentors_copy['vertical_title']) :
      printf(__('<h2 class="title-vertical">%s</h2>', 'ntsp'), $featured_mentors_copy['vertical_title']);
    endif;
  ?>

  <div class="content-inner">
    <?php
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
            $company = get_field('company');

            echo '<li>';
              if ($name) printf(__('<h3>%s</h3>', 'ntsp'), $name);
              if ($title) printf(__('<h4>%s</h4>', 'ntsp'), $title);
              if ($company) printf(__('<h4>%s</h4>', 'ntsp'), $company);
              the_content();
            echo '</li>';

          endwhile;
          wp_reset_postdata();
        echo '</ul>';
      endif;
    ?>

    <?php if ($featured_mentors_copy) : ?>
      <div class="copy">
        <?php
          if ($featured_mentors_copy['title']) :
            printf(__('<h2 class="title-featured">%s</h2>', 'ntsp'), $featured_mentors_copy['title']);
          endif;

          if ($featured_mentors_copy['copy']) :
            printf(__('<p>%s</p>', 'ntsp'), $featured_mentors_copy['copy']);
          endif;
        ?>
      </div>
    <?php endif; ?>
  </div>

</div>
