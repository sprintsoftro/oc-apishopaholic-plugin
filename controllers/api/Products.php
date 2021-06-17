<?php namespace PlanetaDelEste\ApiShopaholic\Controllers\Api;

use Event;
use Lovata\Shopaholic\Classes\Store\ProductListStore;
use Lovata\Shopaholic\Models\Offer;
use Lovata\Shopaholic\Models\Product;
use PlanetaDelEste\ApiToolbox\Classes\Api\Base;
use PlanetaDelEste\ApiToolbox\Plugin;
use Lovata\FilterShopaholic\Classes\Event\ProductModelHandler;
use Lovata\Shopaholic\Models\Category;
use Lovata\PropertiesShopaholic\Classes\Collection\PropertySetCollection;

class Products extends Base
{
    public function init()
    {

        Event::subscribe(ProductModelHandler::class);

        $this->bindEvent(
            Plugin::EVENT_LOCAL_BEFORE_SAVE,
            function (Product $obModel, array &$arData) {
                array_forget($arData, 'category');
                if (!array_get($arData, 'brand_id')) {
                    array_forget($arData, 'brand_id');
                }
                if (array_get($arData, 'offers') && $obModel->exists) {
                    array_forget($arData, 'offers');
                }
            }
        );

        $this->bindEvent(
            Plugin::EVENT_LOCAL_AFTER_SAVE,
            function (Product $obModel, array $arData) {
                if ($arOffers = array_get($arData, 'offers')) {
                    foreach ($arOffers as $arOffer) {
                        $iOfferID = array_get($arOffer, 'id');
                        $obOffer = $iOfferID ? Offer::find($iOfferID) : new Offer();
                        if (!$obOffer) {
                            $obOffer = new Offer();
                        }
                        $obOffer->fill($arOffer);
                        if (!$iOfferID) {
                            $obModel->offer()->add($obOffer);
                        } else {
                            $obOffer->save();
                        }
                    }
                }
            }
        );
    }

    public function extendIndex()
    {
        $arAppliedPropertyList = input('property');

        if(input('category')){
            $category_id = input('category');
            $obCategory = Category::find($category_id);
        } else {
            $obCategory = $this->collection->first()->category;
            $category_id = $obCategory->id;
        }
        $obPropertySetList = PropertySetCollection::make()->sort()->code(['focare']);
        $obProductPropertyCollection = $obPropertySetList->getProductPropertyCollection($this->collection);
        $this->collection->filterByProperty($arAppliedPropertyList, $obProductPropertyCollection);
        if ($limit = input('filters.limit')) {
            $this->collection->take($limit);
        }
    }

    public function filterList($category)
    {
        $obCategory = Category::find($category);
        $obPropertyList = $obCategory->getProductPropertyAttribute();
        $arrPropertyList = [];
        foreach($obPropertyList as $obProperty){
            // dump($obProperty->property_value->toArray());
            if(!empty($obProperty->property_value->toArray())) {

                $arrPropertyList[] = [
                    'name' => $obProperty['name'],
                    'slug' => $obProperty['slug'],
                    'code' => $obProperty['code'],
                    'description' => $obProperty['description'],
                    'filter_type' => $obProperty['pivot']['filter_type'],
                    'filter_name' => $obProperty['pivot']['filter_name'],
                    'values' => $obProperty->property_value->sort()->toArray(),
                ];
            }
        }

        return $arrPropertyList;
    }

    public function getModelClass(): string
    {
        return Product::class;
    }

    public function getSortColumn(): string
    {
        return ProductListStore::SORT_NEW;
    }
}
