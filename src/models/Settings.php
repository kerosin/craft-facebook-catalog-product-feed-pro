<?php
/**
 * Facebook Catalog Product Feed Pro plugin for Craft CMS 3.x
 *
 * @link      https://github.com/kerosin
 * @copyright Copyright (c) 2021 kerosin
 */

namespace kerosin\facebookcatalogproductfeedpro\models;

use Craft;
use craft\base\Model;

/**
 * @author    kerosin
 * @package   FacebookCatalogProductFeedPro
 * @since     1.0.0
 */
class Settings extends Model
{
    // Constants
    // =========================================================================

    const OPTION_CUSTOM_VALUE = '__custom_value__';

    const AVAILABILITY_IN_STOCK = 'in stock';
    const AVAILABILITY_OUT_OF_STOCK = 'out of stock';

    // Public Properties
    // =========================================================================

    /**
     * ID [id] field.
     *
     * @var string
     */
    public $idField;

    /**
     * Title [title] field.
     *
     * @var string
     */
    public $titleField;

    /**
     * Description [description] field.
     *
     * @var string
     */
    public $descriptionField;

    /**
     * Availability [availability] field.
     *
     * @var string
     */
    public $availabilityField;

    /**
     * Availability custom value.
     *
     * @var string
     */
    public $availabilityCustomValue;

    /**
     * Condition [condition] field.
     *
     * @var string
     */
    public $conditionField;

    /**
     * Condition custom value.
     *
     * @var string
     */
    public $conditionCustomValue;

    /**
     * Price [price] field.
     *
     * @var string
     */
    public $priceField;

    /**
     * Currency field.
     *
     * @var string
     */
    public $currencyField;

    /**
     * Currency custom value.
     *
     * @var string
     */
    public $currencyCustomValue;

    /**
     * Image link [image_link] field.
     *
     * @var string
     */
    public $imageLinkField;

    /**
     * Brand [brand] field.
     *
     * @var string
     */
    public $brandField;

    /**
     * Brand custom value.
     *
     * @var string
     */
    public $brandCustomValue;

    /**
     * Quantity to sell on facebook [quantity_to_sell_on_facebook] field.
     *
     * @var string
     */
    public $quantityToSellOnFacebookField;

    /**
     * FB product category [fb_product_category] field.
     *
     * @var string
     */
    public $fbProductCategoryField;

    /**
     * FB product category custom value.
     *
     * @var string
     */
    public $fbProductCategoryCustomValue;

    /**
     * Google product category [google_product_category] field.
     *
     * @var string
     */
    public $googleProductCategoryField;

    /**
     * Google product category custom value.
     *
     * @var string
     */
    public $googleProductCategoryCustomValue;

    /**
     * Sale price [sale_price] field.
     *
     * @var string
     */
    public $salePriceField;

    /**
     * Sale price effective date [sale_price_effective_date] field.
     *
     * @var string
     */
    public $salePriceEffectiveDateFromField;

    /**
     * Sale price effective date [sale_price_effective_date] field.
     *
     * @var string
     */
    public $salePriceEffectiveDateToField;

    /**
     * Item group ID [item_group_id] field.
     *
     * @var string
     */
    public $itemGroupIdField;

    /**
     * Status [status] field.
     *
     * @var string
     */
    public $statusField;

    /**
     * Status custom value.
     *
     * @var string
     */
    public $statusCustomValue;

    /**
     * Additional image link [additional_image_link] field.
     *
     * @var string
     */
    public $additionalImageLinkField;

    /**
     * Color [color] field.
     *
     * @var string
     */
    public $colorField;

    /**
     * Color custom value.
     *
     * @var string
     */
    public $colorCustomValue;

    /**
     * Gender [gender] field.
     *
     * @var string
     */
    public $genderField;

    /**
     * Gender custom value.
     *
     * @var string
     */
    public $genderCustomValue;

    /**
     * Size [size] field.
     *
     * @var string
     */
    public $sizeField;

    /**
     * Size custom value.
     *
     * @var string
     */
    public $sizeCustomValue;

    /**
     * Age group [age_group] field.
     *
     * @var string
     */
    public $ageGroupField;

    /**
     * Age group custom value.
     *
     * @var string
     */
    public $ageGroupCustomValue;

    /**
     * Material [material] field.
     *
     * @var string
     */
    public $materialField;

    /**
     * Material custom value.
     *
     * @var string
     */
    public $materialCustomValue;

    /**
     * Pattern [pattern] field.
     *
     * @var string
     */
    public $patternField;

    /**
     * Pattern custom value.
     *
     * @var string
     */
    public $patternCustomValue;
    
    /**
     * Shipping weight [shipping_weight] field.
     *
     * @var string
     */
    public $shippingWeightField;

    /**
     * Shipping weight unit field.
     *
     * @var string
     */
    public $shippingWeightUnitField;

    /**
     * Shipping weight unit custom value.
     *
     * @var string
     */
    public $shippingWeightUnitCustomValue;

    /**
     * Custom label 0 [custom_label_0] field.
     *
     * @var string
     */
    public $customLabel0Field;

    /**
     * Custom label 1 [custom_label_1] field.
     *
     * @var string
     */
    public $customLabel1Field;

    /**
     * Custom label 2 [custom_label_2] field.
     *
     * @var string
     */
    public $customLabel2Field;

    /**
     * Custom label 3 [custom_label_3] field.
     *
     * @var string
     */
    public $customLabel3Field;

    /**
     * Custom label 4 [custom_label_4] field.
     *
     * @var string
     */
    public $customLabel4Field;

    /**
     * Product type [product_type] field.
     *
     * @var string
     */
    public $productTypeField;

    /**
     * GTIN [gtin] field.
     *
     * @var string
     */
    public $gtinField;

    /**
     * MPN [mpn] field.
     *
     * @var string
     */
    public $mpnField;

    /**
     * Expiration date [expiration_date] field.
     *
     * @var string
     */
    public $expirationDateField;

    // Public Methods
    // =========================================================================

    /**
     * @return array
     */
    public static function getCmsStandardFields(): array
    {
        return [
            'id' => Craft::t('facebook-catalog-product-feed-pro', 'ID'),
            'title' => Craft::t('facebook-catalog-product-feed-pro', 'Title'),
            'expiryDate' => Craft::t('facebook-catalog-product-feed-pro', 'Expiry Date'),
        ];
    }

    /**
     * @return array
     */
    public static function getCommerceStandardFields(): array
    {
        return [
            'sku' => Craft::t('facebook-catalog-product-feed-pro', 'SKU'),
            'price' => Craft::t('facebook-catalog-product-feed-pro', 'Price'),
            'stock' => Craft::t('facebook-catalog-product-feed-pro', 'Stock'),
            'length' => Craft::t('facebook-catalog-product-feed-pro', 'Dimensions (L)'),
            'width' => Craft::t('facebook-catalog-product-feed-pro', 'Dimensions (W)'),
            'height' => Craft::t('facebook-catalog-product-feed-pro', 'Dimensions (H)'),
            'weight' => Craft::t('facebook-catalog-product-feed-pro', 'Weight'),
        ];
    }

    /**
     * @return array
     */
    public function getStandardFields(): array
    {
        $result = self::getCmsStandardFields();

        if (Craft::$app->getPlugins()->isPluginInstalled('commerce')) {
            $result = array_merge($result, self::getCommerceStandardFields());
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getCustomFields(): array
    {
        $result = [];

        foreach (Craft::$app->getFields()->getAllFields() as $field) {
            $result[$field->handle] = $field->name;
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getFieldOptions(): array
    {
        $result = [];
        $fields = $this->getStandardFields();

        if (count($fields)) {
            $result[] = ['optgroup' => Craft::t('facebook-catalog-product-feed-pro', 'Standard Fields')];

            foreach ($fields as $handle => $name) {
                $result[] = [
                    'value' => $handle,
                    'label' => $name,
                ];
            }
        }

        $fields = $this->getCustomFields();

        if (count($fields)) {
            $result[] = ['optgroup' => Craft::t('facebook-catalog-product-feed-pro', 'Custom Fields')];

            foreach ($fields as $handle => $name) {
                $result[] = [
                    'value' => $handle,
                    'label' => $name,
                ];
            }
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $fieldOptions = array_merge(
            array_keys([
                self::OPTION_CUSTOM_VALUE => Craft::t('facebook-catalog-product-feed-pro', 'Custom Value'),
            ]),
            array_keys($this->getStandardFields()),
            array_keys($this->getCustomFields())
        );

        return [
            ['idField', 'in', 'range' => $fieldOptions],
            ['titleField', 'in', 'range' => $fieldOptions],
            ['descriptionField', 'in', 'range' => $fieldOptions],
            ['availabilityField', 'in', 'range' => $fieldOptions],
            ['conditionField', 'in', 'range' => $fieldOptions],
            ['priceField', 'in', 'range' => $fieldOptions],
            ['currencyField', 'in', 'range' => $fieldOptions],
            ['imageLinkField', 'in', 'range' => $fieldOptions],
            ['brandField', 'in', 'range' => $fieldOptions],
            ['quantityToSellOnFacebookField', 'in', 'range' => $fieldOptions],
            ['fbProductCategoryField', 'in', 'range' => $fieldOptions],
            ['googleProductCategoryField', 'in', 'range' => $fieldOptions],
            ['salePriceField', 'in', 'range' => $fieldOptions],
            ['salePriceEffectiveDateFromField', 'in', 'range' => $fieldOptions],
            ['salePriceEffectiveDateToField', 'in', 'range' => $fieldOptions],
            ['itemGroupIdField', 'in', 'range' => $fieldOptions],
            ['statusField', 'in', 'range' => $fieldOptions],
            ['additionalImageLinkField', 'in', 'range' => $fieldOptions],
            ['colorField', 'in', 'range' => $fieldOptions],
            ['genderField', 'in', 'range' => $fieldOptions],
            ['sizeField', 'in', 'range' => $fieldOptions],
            ['ageGroupField', 'in', 'range' => $fieldOptions],
            ['materialField', 'in', 'range' => $fieldOptions],
            ['patternField', 'in', 'range' => $fieldOptions],
            ['shippingWeightField', 'in', 'range' => $fieldOptions],
            ['shippingWeightUnitField', 'in', 'range' => $fieldOptions],
            ['customLabel0Field', 'in', 'range' => $fieldOptions],
            ['customLabel1Field', 'in', 'range' => $fieldOptions],
            ['customLabel2Field', 'in', 'range' => $fieldOptions],
            ['customLabel3Field', 'in', 'range' => $fieldOptions],
            ['customLabel4Field', 'in', 'range' => $fieldOptions],
            ['productTypeField', 'in', 'range' => $fieldOptions],
            ['expirationDateField', 'in', 'range' => $fieldOptions],
            ['gtinField', 'in', 'range' => $fieldOptions],
            ['mpnField', 'in', 'range' => $fieldOptions],
        ];
    }
}
