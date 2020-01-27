<?php

namespace Drupal\my_entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\Language;

class AddForm extends ContentEntityForm {

  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\my_entity\Entity\SmileTest */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    $form['langcode'] = [
      '#title' => $this->t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->getId(),
      '#languages' => Language::STATE_ALL,
    ];
    return $form;
  }

  public function save(array $form, FormStateInterface $form_state) {
    $form_state->setRedirect('entity.smile_test.collection');
    $entity = $this->getEntity();
    $entity->save();
  }

}
