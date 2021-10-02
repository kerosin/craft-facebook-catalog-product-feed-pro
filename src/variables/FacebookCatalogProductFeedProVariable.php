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
use craft\commerce\elements\Variant;

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
     * @throws Exception
     */
    public function elementFieldValue(Element $element, string $field)
    {
        $settings = FacebookCatalogProductFeedPro::$plugin->getSettings();
        $object = $element;

        if (Craft::$app->getPlugins()->isPluginInstalled('commerce')) {
            if ($element instanceof Product) {
                if (isset($element->getDefaultVariant()->$field)) {
                    $object = $element->getDefaultVariant();
                }
            } elseif ($element instanceof Variant) {
                $product = $element->getProduct();

                if (
                    !isset($element->$field) &&
                    $settings->useProductData &&
                    $product != null &&
                    isset($product->$field)
                ) {
                    $object = $element->getProduct();
                }
            }
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
     * @param string $value
     * @return bool
     * @since 1.1.0
     */
    public function isUseProductId(?string $value): bool
    {
        $settings = FacebookCatalogProductFeedPro::$plugin->getSettings();

        return $value == $settings::OPTION_USE_PRODUCT_ID;
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
