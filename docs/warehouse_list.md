# 1. JSON Examples
**URL** : https://main.metakocka.si/rest/eshop/v1/json/warehouse_list

**Description** : return list of all warehouses. We also have support for calling webhooks in case of change on warehouse.

## 1.1 Warehouse list
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16"
}
```
Respond :
``` javascript
{
  "opr_code": "0",
  "opr_time_ms": "58",
  "offset": "0",
  "limit": "1000",
  "warehouse_list_count": "7",
  "warehouse_list": [
    {
      "mk_id": "1600000042",
      "mark": "oznaka1",
      "name": "moje skladisce",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "čebuljeva 19",
      "post": "1000",
      "place": "Komenda",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000067",
      "mark": "oznaka2",
      "name": "oznaka2",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica2",
      "post": "1000",
      "place": "Komenda",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "true"
    },
    {
      "mk_id": "1600000142",
      "mark": "sk1",
      "name": "sk1",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica",
      "post": "1000",
      "place": "Ljubljana",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "false",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000143",
      "mark": "sk2",
      "name": "sk2",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica123",
      "post": "2001",
      "place": "Maribor1",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000215",
      "mark": "kos_1",
      "name": "Kosovnica 1",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica1",
      "post": "1000",
      "place": "Komenda",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000216",
      "mark": "kos_2",
      "name": "kosovnica_2",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica2",
      "post": "2001",
      "place": "Maribor",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000311",
      "mark": "glavno",
      "name": "Glavno",
      "same_address_as_company": "true",
      "main_warehouse": "false",
      "street": "Ljubljanska 1",
      "post": "3000",
      "place": "Celje",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "true"
    }
  ]
}
```
