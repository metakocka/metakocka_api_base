**URL** : https://main.metakocka.si/rest/eshop/v1/put_document

## 2.4 Purchase Order

**Example full request** :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "purchase_order",
    "count_code": "order1",
    "doc_date" : "2014-11-23+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "province": "Severna primorska",
        "country": "Slovenia"
    },
    "receiver": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000002",
        "customer": "API partner 2",
        "street": "Slovenska cesta 200",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "partner_contact": {
            "name": "Rok Doltar",
            "phone": "05 320 24 88",
            "fax": "05 320 24 84",
            "gsm": "071 333 444",
            "email": "test@test.co.uk"
        }
    },
	"warehouse_delivery" : "glavni",
    "discount_value" : "50",
    "currency_code" : "USD",
    "title" : "narocilnica 1",	
    "delivery_date" : "2014-11-22+02:00",
    "offer_number" : "ponudba1",
    "purchase_pricelist_code" : "cenik_pr_1",
    "pariteta" : "Lasten Prevzem",
    "delivery_type" : "Logo",    
    "notes" : "short description",
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ]
}
```
