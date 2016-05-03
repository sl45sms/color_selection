<?php

/**
 * @file
 * Contains \Drupal\color_selection\Controller\ColorSelectionController.
 */

namespace Drupal\color_selection\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for dblog routes.
 */
class ColorSelectionController extends ControllerBase {

  /**
   * A simple page to explain to the developer what to do.
   */
  public function description() {
    return array(
      '#markup' => t(
        "The Field Color Celection provides a field composed of an color value, like #FF0631. To use it, add the field to a content type."),
    );
  }

}
