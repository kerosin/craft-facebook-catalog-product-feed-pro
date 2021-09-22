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
        $response = Craft::$app->getResponse();
        $response->format = Response::FORMAT_RAW;
        $response->getHeaders()->set('Content-Type', 'application/xml; charset=UTF-8');

        /** @var FacebookCatalogProductFeedProService $facebookCatalogProductFeedProService */
        $facebookCatalogProductFeedProService = FacebookCatalogProductFeedPro::$plugin->facebookCatalogProductFeedProService;

        return $facebookCatalogProductFeedProService->getEntriesFeedXml();
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function actionProducts()
    {
        $response = Craft::$app->getResponse();
        $response->format = Response::FORMAT_RAW;
        $response->getHeaders()->set('Content-Type', 'application/xml; charset=UTF-8');

        /** @var FacebookCatalogProductFeedProService $facebookCatalogProductFeedProService */
        $facebookCatalogProductFeedProService = FacebookCatalogProductFeedPro::$plugin->facebookCatalogProductFeedProService;

        return $facebookCatalogProductFeedProService->getProductsFeedXml();
    }
}
