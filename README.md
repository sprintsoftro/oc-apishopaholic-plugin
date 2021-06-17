# API Shopaholic
RESTful API for [Lovata.Shopaholic](https://octobercms.com/plugin/lovata-shopaholic) plugins

## Dependencies
This plugin depends on:

- [PlanetaDelEste.ApiToolbox](https://github.com/planetadeleste/oc-api-toolbox)
- [PlanetaDelEste.BuddiesGroup](https://octobercms.com/plugin/planetadeleste-buddiesgroup)
- [Lovata.Shopaholic](https://octobercms.com/plugin/lovata-shopaholic)
- [Lovata.Buddies](https://octobercms.com/plugin/lovata-buddies)

## Optional Plugins
API Shopaholic has controllers/resources for this plugins, if they are installed
- [Lovata.OrdersShopaholic](https://octobercms.com/plugin/lovata-ordersshopaholic)

## Installation
To install from the [repository](https://github.com/sprintsoftro/oc-apishopaholic-plugin), clone it into `plugins/planetadeleste/apishopaholic` and then run `composer update` from your project root in order to pull in the dependencies.


## This plugin it is s Fork of `planetadeleste/apishopaholic`
The original plugin can be found on [GitHub](https://github.com/planetadeleste/oc-shopaholic-api)

To install original plugin with **Composer**, run `composer require planetadeleste/oc-apishopaholic-plugin` from your project root.


## Documentation

[Exemple of using shopaholic filter](https://shopaholic.one/docs#/modules/filter/examples/examples)

### Endpoints

#### Get Categories List

`GET: /api/v1/categories`

##### Get Products List

`GET: /api/v1/products`

##### Get Poperies List for specific category

`GET: /api/v1/products/{category_id}/filter-list`

this method will return all properties that have some values in list





#### Filtering categories/products

for filtering categories, add specific filter criteria through GET


##### Property

`GET: /api/v1/products?property[:id]=:value`

```json
{
    id: "property_id", // this will be get it from Properties List
    value: "value of filter",
}
```

If you have more filter properties, you can concatenate it

`GET: /api/v1/products?property[:id]=:value&property[:id2]=:value2`

##### Pagination

`GET: /api/v1/products?page=2`

##### Items per page

`GET: /api/v1/products?page=2&per_page=25`




### Usage
Coming soon

### Events
Coming soon

