<?php

namespace Drupal\domain_config;

use Drupal\Core\Asset\LibraryDiscoveryCollector;
use Drupal\domain\DomainNegotiatorInterface;

/**
 * Class DomainConfigLibraryDiscoveryCollector
 *
 * @package Drupal\domain_config
 */
class DomainConfigLibraryDiscoveryCollector extends LibraryDiscoveryCollector {

  /**
   * @var \Drupal\domain\DomainInterface
   */
  protected $domain;

  /**
   * Set a domain.
   *
   * @param \Drupal\domain\DomainNegotiatorInterface $domainNegotiator
   */
  public function setDomainNegotiator(DomainNegotiatorInterface $domainNegotiator) {
    $this->domain = $domainNegotiator->getActiveDomain();
  }

  /**
   * {@inheritdoc}
   */
  protected function getCid() {
    if (!isset($this->cid)) {
      $this->cid = 'library_info:' . $this->domain->id() . ':' . $this->themeManager->getActiveTheme()->getName();
    }

    return $this->cid;
  }

}
