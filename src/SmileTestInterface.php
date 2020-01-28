<?php

namespace Drupal\my_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a Inventory entity.
 *
 * @ingroup my_entity
 */
interface SmileTestInterface extends
    ContentEntityInterface,
    EntityOwnerInterface,
    EntityChangedInterface {

}
