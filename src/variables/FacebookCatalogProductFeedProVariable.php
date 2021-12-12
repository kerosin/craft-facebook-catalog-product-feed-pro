<?php
/**
 * Facebook Catalog Product Feed Pro plugin for Craft CMS 3.x
 *
 * @link      https://github.com/kerosin
 * @copyright Copyright (c) 2021 kerosin
 */

namespace kerosin\facebookcatalogproductfeedpro\variables;

use kerosin\facebookcatalogproductfeedpro\FacebookCatalogProductFeedPro;
use kerosin\facebookcatalogproductfeedpro\services\FacebookCatalogProductFeedProService;

use craft\base\Element;

use DateTime;
use Exception;

/**
 * @author    kerosin
 * @package   FacebookCatalogProductFeedPro
 * @since     1.0.0
 */
class FacebookCatalogProductFeedProVariable
{
    // Public Methods
    // =========================================================================

    /**
     * @param Element[] $elements
     * @return void
     * @throws Exception
     */
    public function generateFeed(array $elements): void
    {
        $this->getService()->generateFeed($elements);
    }

    /**
     * @param Element $element
     * @param string|null $field
     * @param mixed $customValue
     * @return mixed
     * @throws Exception
     */
    public function elementFieldValue(Element $element, ?string $field, $customValue = null)
    {
        return $this->getService()->getElementFieldValue($element, $field, $customValue);
    }

    /**
     * @param Element $element
     * @return DateTime|null
     * @since 1.2.0
     */
    public function elementSalesMinStartDate(Element $element): ?DateTime
    {
        return $this->getService()->getElementSalesMinStartDate($element);
    }

    /**
     * @param Element $element
     * @return DateTime|null
     * @since 1.2.0
     */
    public function elementSalesMaxEndDate(Element $element): ?DateTime
    {
        return $this->getService()->getElementSalesMaxEndDate($element);
    }

    /**
     * @param Element $element
     * @return string|null
     * @throws Exception
     * @since 1.3.0
     */
    public function elementUrl(Element $element): ?string
    {
        return $this->getService()->getElementUrl($element);
    }

    /**
     * @param Element $element
     * @return mixed
     * @throws Exception
     * @since 1.3.0
     */
    public function elementAvailabilityFieldValue(Element $element)
    {
        return $this->getService()->getElementAvailabilityFieldValue($element);
    }

    /**
     * @param Element $element
     * @return mixed
     * @throws Exception
     * @since 1.3.0
     */
    public function elementItemGroupIdFieldValue(Element $element)
    {
        return $this->getService()->getElementItemGroupIdFieldValue($element);
    }

    /**
     * @param Element $element
     * @param string|null $field
     * @param mixed $customValue
     * @return string|null
     * @throws Exception
     * @since 1.3.0
     */
    public function elementCurrencyIso(Element $element, ?string $field, $customValue = null): ?string
    {
        return $this->getService()->getElementCurrencyIso($element, $field, $customValue);
    }

    /**
     * @param Element $element
     * @param string|null $field
     * @param mixed $customValue
     * @return string|null
     * @throws Exception
     * @since 1.3.0
     */
    public function elementWeightUnit(Element $element, ?string $field, $customValue = null): ?string
    {
        return $this->getService()->getElementWeightUnit($element, $field, $customValue);
    }

    /**
     * @param Element $element
     * @param string|null $field
     * @return string|null
     * @throws Exception
     * @since 1.3.0
     */
    public function elementSaleStartDate(Element $element, ?string $field): ?string
    {
        return $this->getService()->getElementSaleStartDate($element, $field);
    }

    /**
     * @param Element $element
     * @param string|null $field
     * @return string|null
     * @throws Exception
     * @since 1.3.0
     */
    public function elementSaleEndDate(Element $element, ?string $field): ?string
    {
        return $this->getService()->getElementSaleEndDate($element, $field);
    }

    /**
     * @param string|null $value
     * @return bool
     */
    public function isCustomValue(?string $value): bool
    {
        return $this->getService()->isCustomValue($value);
    }

    /**
     * @param string|null $value
     * @return bool
     * @since 1.1.0
     * @deprecated in 1.3.0
     */
    public function isUseProductId(?string $value): bool
    {
        return $this->getService()->isUseProductId($value);
    }

    /**
     * @param string|null $value
     * @return bool
     * @since 1.2.0
     * @deprecated in 1.3.0
     */
    public function isUseSaleStartDate(?string $value): bool
    {
        return $this->getService()->isUseSaleStartDate($value);
    }

    /**
     * @param string|null $value
     * @return bool
     * @since 1.2.0
     * @deprecated in 1.3.0
     */
    public function isUseSaleEndDate(?string $value): bool
    {
        return $this->getService()->isUseSaleEndDate($value);
    }

    // Protected Methods
    // =========================================================================

    /**
     * @return FacebookCatalogProductFeedProService
     * @since 1.4.0
     */
    protected function getService(): FacebookCatalogProductFeedProService
    {
        return FacebookCatalogProductFeedPro::$plugin->facebookCatalogProductFeedProService;
    }
}
