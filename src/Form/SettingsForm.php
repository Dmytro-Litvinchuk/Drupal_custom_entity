<?php

namespace Drupal\my_entity\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm
 *
 * @package Drupal\my_entity\Form
 */
class SettingsForm extends FormBase {

  /**
   * @inheritDoc
   */
  public function getFormId() {
    return 'smile_settings_form';
  }

  /**
   * @inheritDoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['smile_settings_form']['#markup'] = 'Settings form for Smile Test. Manage field settings here.';
    return $form;
  }

  /**
   * @inheritDoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // TODO: Implement submitForm() method.
  }

}
