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

use Craft;
use craft\base\Element;
use craft\commerce\elements\Product;

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
     * @param Element $element
     * @param string $field
     * @return mixed
     */
    public function elementFieldValue(Element $element, string $field)
    {
        $settings = FacebookCatalogProductFeedPro::$plugin->getSettings();

        if (
            Craft::$app->getPlugins()->isPluginInstalled('commerce') &&
            $element instanceof Product &&
            in_array($field, array_keys($settings::getCommerceStandardFields()))
        ) {
            $object = $element->getDefaultVariant();
        } else {
            $object = $element;
        }

        return isset($object->$field) ? $object->$field : null;
    }

    /**
     * @param string $value
     * @return bool
     */
    public function isCustomValue(?string $value): bool
    {
        $settings = FacebookCatalogProductFeedPro::$plugin->getSettings();

        return $value == $settings::OPTION_CUSTOM_VALUE;
    }

    /**
     * @param Element[] $elements
     * @return void
     * @throws Exception
     */
    public function generateFeed(array $elements): void
    {
        $response = Craft::$app->getResponse();
        $response->getHeaders()->set('Content-Type', 'application/xml; charset=UTF-8');

        /** @var FacebookCatalogProductFeedProService $facebookCatalogProductFeedProService */
        $facebookCatalogProductFeedProService = FacebookCatalogProductFeedPro::$plugin->facebookCatalogProductFeedProService;

        echo $facebookCatalogProductFeedProService->getFeedXml($elements);
    }
}
