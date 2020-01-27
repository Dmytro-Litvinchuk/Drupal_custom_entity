<?php

namespace Drupal\my_entity\Form;

use Composer\Util\Url;
use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *
 */
class DeleteForm extends ContentEntityConfirmFormBase {

  /**
   * @inheritDoc
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete entity %name?', ['%name' => $this->entity->label()]);
  }

  /**
   * @inheritDoc
   */
  public function getCancelUrl() {
    return new Url('my_entity.collection');
  }

  /**
   * @inheritDoc
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->delete();

    \Drupal::logger('manage_inventory')->notice('@type: deleted %title', [
      '@type' => $this->entity->bundle(),
      '%title' => $this->entity->label(),
    ]);
    $form_state->setRedirect('my_entity.collection');
  }

}
