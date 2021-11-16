<?php
/**
 * Facebook Catalog Product Feed Pro plugin for Craft CMS 3.x
 *
 * @link      https://github.com/kerosin
 * @copyright Copyright (c) 2021 kerosin
 */

namespace kerosin\facebookcatalogproductfeedpro\variables;

use kerosin\facebookcatalogproductfeedpro\FacebookCatalogProductFeedPro;

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
        FacebookCatalogProductFeedPro::$plugin
            ->facebookCatalogProductFeedProService
            ->generateFeed($elements);
    }

    /**
     * @param Element $element
     * @param string $field
     * @return mixed
     * @throws Exception
     */
    public function elementFieldValue(Element $element, string $field)
    {
        return FacebookCatalogProductFeedPro::$plugin
            ->facebookCatalogProductFeedProService
            ->getElementFieldValue($element, $field);
    }

    /**
     * @param Element $element
     * @return DateTime|null
     * @since 1.2.0
     */
    public function elementSalesMinStartDate(Element $element): ?DateTime
    {
        return FacebookCatalogProductFeedPro::$plugin
            ->facebookCatalogProductFeedProService
            ->getElementSalesMinStartDate($element);
    }

    /**
     * @param Element $element
     * @return DateTime|null
     * @since 1.2.0
     */
    public function elementSalesMaxEndDate(Element $element): ?DateTime
    {
        return FacebookCatalogProductFeedPro::$plugin
            ->facebookCatalogProductFeedProService
            ->getElementSalesMaxEndDate($element);
    }

    /**
     * @param string $value
     * @return bool
     */
    public function isCustomValue(?string $value): bool
    {
        return FacebookCatalogProductFeedPro::$plugin
            ->facebookCatalogProductFeedProService
            ->isCustomValue($value);
    }

    /**
     * @param string $value
     * @return bool
     * @since 1.1.0
     */
    public function isUseProductId(?string $value): bool
    {
        return FacebookCatalogProductFeedPro::$plugin
            ->facebookCatalogProductFeedProService
            ->isUseProductId($value);
    }

    /**
     * @param string $value
     * @return bool
     * @since 1.2.0
     */
    public function isUseSaleStartDate(?string $value): bool
    {
        return FacebookCatalogProductFeedPro::$plugin
            ->facebookCatalogProductFeedProService
            ->isUseSaleStartDate($value);
    }

    /**
     * @param string $value
     * @return bool
     * @since 1.2.0
     */
    public function isUseSaleEndDate(?string $value): bool
    {
        return FacebookCatalogProductFeedPro::$plugin
            ->facebookCatalogProductFeedProService
            ->isUseSaleEndDate($value);
    }
}
