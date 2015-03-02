
# 1. JSON Example
**URL** : https://main.metakocka.si/rest/eshop/v1/json/product_list

**Description** : return list of all products with addition states (like warehouse stock).

Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "sales":"true",
    "return_warehause_stock":"true"
}
```

Attribute                 | Type | Notes| MK SLO |
--------------------------|------|------|--------|
| sales | bool | Product must be flag as sales | Artikel -> Prodajni |
| purchase | bool | Product must be flag as purchase | Artikel -> Nabavni |
| service | bool | Product must be flag as service | Artikel -> Storitev |
| work | bool | Product must be flag as work | Artikel -> Delo |
| return\_warehause\_stock | bool | If attribute is set, every product in respond will have "amount" attribute. In case the product was newer use on stock, attribute "amount" will still have value 0. | / |
| offset | int | see notes. | / |
| limit | int | see notes. | / |

Notes :
* call will always return max 1000 records (limit = 1000). To get next window of results, you must set offset on value 1000. 

Reapond :
```javascript
{
   "opr_code":"0",
   "opr_time_ms":"11762",
   "sales":"true",
   "return_warehause_stock":"true",
   "limit":"2",
   "offset":"0",
   "product_list_count":"2",
   "product_list":[
      {
         "company_id":"0",
         "mk_id":"1600000027",
         "code":"prod sifra 1",
         "name":"naziv sifra 1",
         "unit":"kos",
         "service":"false",
         "sales":"true",
         "purchasing":"true",
         "height":"1",
         "width":"2",
         "depth":"3",
         "weight":"4",
         "amount":"-2000"
      },
      {
         "company_id":"0",
         "mk_id":"1600000028",
         "code":"pod sifra 2",
         "name":"pod naziv 2",
         "unit":"dan",
         "service":"false",
         "sales":"true",
         "purchasing":"false",
         "amount":"-10"
      }
   ]
}
```

Notes :
* head of respond contains attributes (sales, limit, etc) from request.
* product_list_count is number of records in respond. Not the number of all records. If product_list_count = limit, you should read next window of results.