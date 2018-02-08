<?php
/**
 * Default Content Template
 * Looks for ACF Section Repeaters
 *
 */

  if (have_rows('sections')) while (have_rows('sections')) : the_row();
    get_template_part('templates/section', get_row_layout());
  endwhile;
?>
