<?php

/**
 * @file
 * Contains \Drupal\color_selection\Plugin\Field\FieldFormatter\ColorSelectionViewFormatter.
 */

namespace Drupal\color_selection\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'color_selection' formatter.
 *
 * @FieldFormatter(
 *   id = "field_color_selection_view_formatter",
 *   module = "color_selection",
 *   label = @Translation("View selected color formatter"),
 *   field_types = {
 *     "field_color_selection_color"
 *   }
 * )
 */
class ColorSelectionViewFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();


    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#attributes' => array(
          'style' => 'background-color: '.$item->value.';
                      display: inline-block;
                      width: 70px;
                      height: 60px;
                      line-height: 40px;
                      padding: 10px;
                      border: 1px solid #757575;
                      text-shadow: 1px 1px 0px rgba(255, 255, 255, 1);',
        ),
        '#value' => $this->t('@color', array('@color' => $item->value)),
      );
    }

    return $elements;
  }

}
