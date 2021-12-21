<?php
/**
 * Facebook Catalog Product Feed Pro plugin for Craft CMS 3.x
 *
 * @link      https://github.com/kerosin
 * @copyright Copyright (c) 2021 kerosin
 */

namespace kerosin\facebookcatalogproductfeedpro\controllers;

use kerosin\facebookcatalogproductfeedpro\FacebookCatalogProductFeedPro;
use kerosin\facebookcatalogproductfeedpro\services\FacebookCatalogProductFeedProService;

use Craft;
use craft\helpers\FileHelper;
use craft\web\Controller;

use yii\web\Response;

use Exception;

/**
 * @author    kerosin
 * @package   FacebookCatalogProductFeedPro
 * @since     1.0.0
 */
class FeedController extends Controller
{
    // Protected Properties
    // =========================================================================

    /**
     * Allows anonymous access to this controller's actions.
     *
     * @var bool|array
     */
    protected $allowAnonymous = ['entries', 'products'];

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     * @throws Exception
     */
    public function actionEntries()
    {
        $this->setXmlResponseHeader();

        $output = $this->getService()->getEntriesFeedXml();

        if ($this->isSaveXmlToFile()) {
            $this->saveXmlToFile($output, 'entries');
        }

        return $output;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function actionProducts()
    {
        $this->setXmlResponseHeader();

        $output = $this->getService()->getProductsFeedXml();

        if ($this->isSaveXmlToFile()) {
            $this->saveXmlToFile($output, 'products');
        }

        return $output;
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

    /**
     * @return void
     * @since 1.5.0
     */
    protected function setXmlResponseHeader(): void
    {
        $response = Craft::$app->getResponse();
        $response->format = Response::FORMAT_RAW;
        $response->getHeaders()->set('Content-Type', 'application/xml; charset=UTF-8');
    }

    /**
     * @param string $xml
     * @param string|null $filePrefix
     * @return void
     * @throws Exception
     * @since 1.5.0
     */
    protected function saveXmlToFile(string $xml, ?string $filePrefix = null): void
    {
        $path = Craft::getAlias('@webroot') . '/facebook-catalog-product-feed-pro/';
        $path .= $filePrefix != null ? $filePrefix . '-' : '';
        $path .= Craft::$app->getSites()->getCurrentSite()->handle . '.xml';

        FileHelper::writeToFile($path, $xml);
    }

    /**
     * @return bool
     * @since 1.5.0
     */
    protected function isSaveXmlToFile(): bool
    {
        return Craft::$app->getRequest()->getQueryParam('save') !== null;
    }
}
