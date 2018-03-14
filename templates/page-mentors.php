<?php
/**
 * Mentors Content Template
 * Looks for ACF Section Repeaters
 *
 */

  if (have_rows('sections')) while (have_rows('sections')) : the_row();
    get_template_part('templates/section', get_row_layout());
  endwhile;
?>

<div class="content-block section-mentors">
  <div class="content-inner">

    <?php
      $mentor_args = array(
        'post_type' => 'mentor',
        'posts_per_page' => -1
      );
      $mentors = new WP_Query($mentor_args);

      if ($mentors->have_posts()) :

        echo '<ul class="mentors">';

          while ($mentors->have_posts()) : $mentors->the_post();

            $name = get_the_title();
            $title = get_field('title');
            $company = get_field('company') ? ' @ ' . get_field('company') : '';
            $photo = get_field('photo');
            $description = get_field('description');

            echo '<li>';

              printf('<figure class="photo"><img src="%s" alt="" /></figure>',
                $photo['sizes']['medium']
              );

              printf('<div class="details">%s%s%s</div>',
                sprintf('<h3>%s</h3>', $name),
                sprintf('<h4>%s%s</h4>', $title, $company),
                $description
              );

            echo '</li>';

          endwhile;
          wp_reset_postdata();

        echo '</ul>';

      endif;
    ?>
  </div>
</div>