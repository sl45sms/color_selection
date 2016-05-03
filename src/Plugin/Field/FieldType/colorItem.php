<?php

/**
 * @file
 * Contains Drupal\color_selection\Plugin\Field\FieldType\colorItem.
 */

namespace Drupal\color_selection\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'field_color_selection_color' field type.
 *
 * @FieldType(
 *   id = "field_color_selection_color",
 *   label = @Translation("Color Selection"),
 *   module = "color_selection",
 *   description = @Translation("Field composed of color selection."),
 *   default_widget = "field_color_selection_widget",
 *   default_formatter = "field_color_selection_formatter"
 * )
 */
class colorItem extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Color value'));

    return $properties;
  }

}
