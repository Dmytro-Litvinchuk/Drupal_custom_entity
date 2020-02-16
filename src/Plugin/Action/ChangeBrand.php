<?php

namespace Drupal\my_entity\Plugin\Action;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\PluginFormInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\views_bulk_operations\Action\ViewsBulkOperationsActionBase;

/**
 * @Action(
 *   id = "smile_test_change_brand",
 *   label = @Translation("Change brand"),
 *   type = "smile_test"
 * )
 */
class ChangeBrand extends ViewsBulkOperationsActionBase implements PluginFormInterface {

  /**
   * @inheritDoc
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    if ($object->getEntityType() === 'smile_test') {
      $access = $object->access('update', $account, TRUE)
        ->andIf($object->status->access('edit', $account, TRUE));
      return $return_as_object ? $access : $access->isAllowed();
    }
    return TRUE;
  }

  /**
   * @inheritDoc
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form['brand_config_setting'] = [
      '#title' => t('Prefered brand'),
      '#type' => 'select',
      '#options' => [
        'adidas' => 'adidas',
        'puma' => 'puma',
        'nike' => 'nike',
      ],
      '#default_value' => $form_state->getValue('brand_config_setting'),
    ];
    return $form;
  }

  /**
   * @inheritDoc
   */
  public function execute($entity = NULL) {
    /** @var \Drupal\my_entity\Entity\SmileTest $entity */
    if ($entity->hasField('preferred_brand')) {
      $brand = $this->configuration['brand_config_setting'];
      $entity->preferred_brand->value = $brand;
      $entity->save();
    }
    return $this->t('Quantity changed!');
  }

}
