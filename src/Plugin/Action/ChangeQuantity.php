<?php

namespace Drupal\my_entity\Plugin\Action;

use Drupal\Core\Session\AccountInterface;
use Drupal\views_bulk_operations\Action\ViewsBulkOperationsActionBase;

/**
 * @Action(
 *   id = "smile_test_change_quantity",
 *   label = @Translation("Change quantity"),
 *   type = "smile_test"
 * )
 */
class ChangeQuantity extends ViewsBulkOperationsActionBase {

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
  public function execute($entity = NULL) {
    /** @var \Drupal\my_entity\Entity\SmileTest $entity */
    if ($entity->hasField('products_owned_count')) {
      $entity->products_owned_count->value = 0;
      $entity->save();
    }
    return $this->t('Quantity changed!');
  }

}
