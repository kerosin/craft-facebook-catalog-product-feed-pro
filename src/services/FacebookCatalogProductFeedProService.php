<?php
/**
 * Facebook Catalog Product Feed Pro plugin for Craft CMS 3.x
 *
 * @link      https://github.com/kerosin
 * @copyright Copyright (c) 2021 kerosin
 */

namespace kerosin\facebookcatalogproductfeedpro\services;

use kerosin\facebookcatalogproductfeedpro\FacebookCatalogProductFeedPro;

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\elements\Entry;
use craft\commerce\elements\Product;
use craft\web\View;

use Exception;

/**
 * @author    kerosin
 * @package   FacebookCatalogProductFeedPro
 * @since     1.0.0
 */
class FacebookCatalogProductFeedProService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * @param mixed $criteria
     * @return Entry[]
     * @throws Exception
     */
    public function getFeedEntries($criteria = null): array
    {
        if (!empty($criteria)) {
            $result = Entry::findAll($criteria);
        } else {
            $result = Entry::find()
                ->site(Craft::$app->getSites()->getCurrentSite())
                ->status(Entry::STATUS_LIVE)
                ->all();
        }

        return $result;
    }

    /**
     * @param mixed $criteria
     * @return Product[]
     * @throws Exception
     */
    public function getFeedProducts($criteria = null): array
    {
        $result = [];

        if (!Craft::$app->getPlugins()->isPluginInstalled('commerce')) {
            return $result;
        }

        if (!empty($criteria)) {
            $result = Product::findAll($criteria);
        } else {
            $result = Product::find()
                ->site(Craft::$app->getSites()->getCurrentSite())
                ->status(Product::STATUS_LIVE)
                ->all();
        }

        return $result;
    }

    /**
     * @param Element[] $elements
     * @return string
     * @throws Exception
     */
    public function getFeedXml(array $elements): string
    {
        $settings = FacebookCatalogProductFeedPro::$plugin->getSettings();

        return Craft::$app->getView()->renderTemplate(
            'facebook-catalog-product-feed-pro/_feed',
            [
                'elements' => $elements,
                'settings' => $settings,
            ],
            View::TEMPLATE_MODE_CP
        );
    }

    /**
     * @param mixed $criteria
     * @return string
     * @throws Exception
     */
    public function getEntriesFeedXml($criteria = null): string
    {
        return $this->getFeedXml($this->getFeedEntries($criteria));
    }

    /**
     * @param mixed $criteria
     * @return string
     * @throws Exception
     */
    public function getProductsFeedXml($criteria = null): string
    {
        return $this->getFeedXml($this->getFeedProducts($criteria));
    }
}
