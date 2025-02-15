<?php
namespace Selistore\PrintfulApi\V2;

/**
 * Trait Localisation
 * 
 * This trait provides methods to handle locale settings.
 */
trait Localisation
{
  /**
   * Returns the list of supported locales.
   *
   * @return array The array of supported locale strings.
   */
  public function getSupported(): array {
    return [
      'en_US',
      'en_GB',
      'en_CA',
      'es_ES',
      'fr_FR',
      'de_DE',
      'it_IT',
      'ja_JP'
    ];
  }

  /**
   * Sets the locale if it is supported by Printful, otherwise defaults to 'en_US'.
   *
   * @param string $locale The locale to be set.
   */
  public function setLocale(string $locale = 'en_US') {
    $this->locale = in_array($locale, $this->getSupported()) ? $locale : 'en_US';
  }

  /**
   * Gets the current locale.
   *
   * @return string The current locale.
   */
  public function getLocale() {
    return $this->locale;
  }
}