<?php

/**
 * @file
 * Contains \Drupal\color_selection\Plugin\Field\FieldFormatter\ColorSelectionFormatter.
 */

namespace Drupal\color_selection\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'color_selection' formatter.
 *
 * @FieldFormatter(
 *   id = "field_color_selection_formatter",
 *   module = "color_selection",
 *   label = @Translation("Simple text-based color selection formatter"),
 *   field_types = {
 *     "field_color_selection_color"
 *   }
 * )
 */
class ColorSelectionFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();


    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $this->t('@color', array('@color' => $item->value)),
      );
    }

    return $elements;
  }

}
