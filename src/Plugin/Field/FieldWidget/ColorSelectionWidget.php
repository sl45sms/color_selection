<?php

/**
 * @file
 * Contains \Drupal\color_selection\Plugin\Field\FieldWidget\ColorSelectionWidget.
 */

namespace Drupal\color_selection\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;


/**
 * Plugin implemetation for ColorSelection widget
 *
 * @FieldWidget(
 *   id = "field_color_selection_widget",
 *   label = @Translation("Color Selection Widget"),
 *   field_types = {
 *     "field_color_selection_color"
 *   }
 * )
 *
 */

class ColorSelectionWidget extends WidgetBase { //implements WidgetInterface 
    
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
   
   $value = isset($items[$delta]->value) ? $items[$delta]->value : ''; 

   $element += array(
      '#type' => 'textfield',
      '#id' => 'color_selection_picker',
      '#allowed_tags' =>array('input'),
       
      '#default_value' => $value,
      '#size' => 22,
      '#maxlength' => 22,
      '#element_validate' => array(
        array($this, 'validate'),
      ),
      '#attached' => array(
        'library' => array(
          'color_selection/color_selection',
        ),
      ),
     '#attributes' => array(
        'id' => 'color_selection_picker',
        'style' => 'display:inline-block',
        'class' => array('edit-field-color-selection'),
     ), 
    );
    
    return array('value' => $element);
  }

  /**
   * Validate the color_selection text field.
   */
  public function validate($element, FormStateInterface $form_state) {
   
   //check if is hex color
   
    $value = $element['#value'];
    if (strlen($value) == 0) {
      $form_state->setValueForElement($element, '');
      return;
    }
   
    if (!preg_match('/^#(?:[0-9a-fA-F]{3}){1,2}$/iD', strtolower($value))) {//TODO 
      $form_state->setError($element, t("Color Selection must be a hex color value ie #063100"));
    }
  
  }

}

