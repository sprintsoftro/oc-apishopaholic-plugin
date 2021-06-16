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
The original plugin can be found on [repository](https://github.com/planetadeleste/oc-shopaholic-api)

To install original plugin with **Composer**, run `composer require planetadeleste/oc-apishopaholic-plugin` from your project root.


## Documentation


### Endpoints


##### Get Categories List

`GET: /api/v1/categories`

##### Get Products List

`GET: /api/v1/products`



#### Filtering categories/products

for filtering categories, add specific filter criteria through GET

##### for pagination

`GET: /api/v1/products?page=2`

##### to set rows per page

`GET: /api/v1/products?page=2&per_page=25`




### Usage
Coming soon

### Events
Coming soon

