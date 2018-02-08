<?php
/**
 * Returning image path or inline svg
 *
 */

class NST_Images {
  /* Returns asset url */
  public function imagePath($name) {
      return get_template_directory_uri() . '/public/images/' . $name;
  }

  /* Returns inline svg content */
  public function inlineSvg($filename) {
      $svg_file = get_template_directory() . '/public/images/' . $filename;
      if (file_exists($svg_file)) return file_get_contents($svg_file);
  }
}

$images = new NST_Images();
