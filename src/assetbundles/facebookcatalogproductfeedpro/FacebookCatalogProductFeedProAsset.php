<?php
/**
 * Facebook Catalog Product Feed Pro plugin for Craft CMS 3.x
 *
 * @link      https://github.com/kerosin
 * @copyright Copyright (c) 2021 kerosin
 */

namespace kerosin\facebookcatalogproductfeedpro\assetbundles\facebookcatalogproductfeedpro;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    kerosin
 * @package   FacebookCatalogProductFeedPro
 * @since     1.2.1
 */
class FacebookCatalogProductFeedProAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        $this->sourcePath = '@kerosin/facebookcatalogproductfeedpro/assetbundles/facebookcatalogproductfeedpro/dist';

        $this->depends = [
            CpAsset::class,
        ];

        $this->css = [
            'css/app.css',
        ];

        parent::init();
    }
}
