<?php

namespace Drupal\my_entity\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for name entities.
 */
class SmileTestViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
