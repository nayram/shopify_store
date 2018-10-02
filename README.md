# shopify_store

This is an api that syncs products on shopify into kudobuzz. The api allows the user to add a
new shop and also to get​ the first 10 products for a shop.

## API Documentation

The database is an sqlitedb.

Run `php artisan migrate`

### Get Listed Products On Shopify.

```
path : /shopify/products
method : GET
response : {
    "products": [
        {
            "id": 1626812809283,
            "title": "Blazer",
            "body_html": "Tommy Hillfiger",
            "vendor": "MadinaClothing",
            "product_type": "",
            "created_at": "2018-10-01T11:17:36-04:00",
            "handle": "blazer",
            "updated_at": "2018-10-01T11:17:37-04:00",
            "published_at": "2018-10-01T11:16:43-04:00",
            "template_suffix": null,
            "tags": "",
            "published_scope": "web",
            "admin_graphql_api_id": "gid://shopify/Product/1626812809283",
            "variants": [
                {
                    "id": 14614723657795,
                    "product_id": 1626812809283,
                    "title": "Default Title",
                    "price": "400.00",
                    "sku": "100",
                    "position": 1,
                    "inventory_policy": "deny",
                    "compare_at_price": null,
                    "fulfillment_service": "manual",
                    "inventory_management": null,
                    "option1": "Default Title",
                    "option2": null,
                    "option3": null,
                    "created_at": "2018-10-01T11:17:36-04:00",
                    "updated_at": "2018-10-01T11:17:36-04:00",
                    "taxable": false,
                    "barcode": "",
                    "grams": 600,
                    "image_id": null,
                    "inventory_quantity": 1,
                    "weight": 0.6,
                    "weight_unit": "kg",
                    "inventory_item_id": 14825632071747,
                    "old_inventory_quantity": 1,
                    "requires_shipping": true,
                    "admin_graphql_api_id": "gid://shopify/ProductVariant/14614723657795"
                }
            ],
            "options": [
                {
                    "id": 2209902624835,
                    "product_id": 1626812809283,
                    "name": "Title",
                    "position": 1,
                    "values": [
                        "Default Title"
                    ]
                }
            ],
            "images": [],
            "image": null
        }]}
  ```
  ### Sync Listed Products Unto Kudobuzz

  ```
  path : /kudobuzz/products
  method : /POST
  response : {
    "kudobuzz": {
        "products": [
            {
                "id": 1626812809283,
                "title": "Blazer",
                "body_html": "Tommy Hillfiger",
                "vendor": "MadinaClothing",
                "product_type": "",
                "handle": "blazer",
                "published_at": "2018-10-01T11:16:43-04:00",
                "template_suffix": null,
                "tags": "",
                "published_scope": "web",
                "admin_graphql_api_id": "gid://shopify/Product/1626812809283",
                "created_at": "2018-10-02 07:26:26",
                "updated_at": "2018-10-02 07:26:26"
            },
            {
                "id": 1626807763011,
                "title": "Long Sleeve Shirt",
                "body_html": "Max &amp; Spencer",
                "vendor": "MadinaClothing",
                "product_type": "",
                "handle": "short-sleeve-shirt",
                "published_at": "2018-10-01T11:14:22-04:00",
                "template_suffix": null,
                "tags": "",
                "published_scope": "web",
                "admin_graphql_api_id": "gid://shopify/Product/1626807763011",
                "created_at": "2018-10-02 07:26:26",
                "updated_at": "2018-10-02 07:26:26"
            }]}}
  ```
  ### Add Product To Shopify

  ```
  path : /shopify/product/add
  method : POST
  body : {
	         "title": "Shoes",
          "body_html": "<strong>The very best</strong>",
          "vendor": "Kumasi",
          "product_type": "Shoe",
          "tags": "footwear"
        }
  response : {
    "product": {
       "id": 15,
       "title": "Shoes",
       "body_html": "<strong>the very best!</strong>",
       "vendor": "Kumasi",
       "product_type": "Shoe",
       "handle": "shoes",
       "published_at": "2018-10-02T06:32:56-04:00",
       "template_suffix": null,
       "tags": "footwear",
       "published_scope": "web",
       "admin_graphql_api_id": "gid://shopify/Product/1629538648131",
       "updated_at": "2018-10-02 10:30:58",
       "created_at": "2018-10-02 10:30:58"
   }
  }

  ```


### Tests

All test methods can be found in **test/Feature/ProductTest.php**
Use `vendor/bin/phpunit tests/Feature/ProductTest.php` to run the tests

For some tests a mock shopify webservice was used. It can be found in the **test\Feature\admin\product.json**

#### Below are the test functions
```
test_it_returns_200 (this tests if the shopify api returns a 200 status code)
test_it_has_products_in_json (this test if the products are listed in the json payload and the count is 10)
test_save_shopify_store_products_to_kudobuzz (this tests the syncing of products to the local db )
test_create_new_product_on_shopify (test the creation of products on shopify)
test_it_gets_products_in_kudobuzz (test the retrieval of products on kudobuzz)
```
