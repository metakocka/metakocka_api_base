**URL** : https://main.metakocka.si/rest/eshop/v1/put_document

Development environment [more](https://metakocka.freshdesk.com/a/solutions/articles/3000088225) : https://devmainsi.metakocka.si/rest/eshop/v1/put_document

# 1. put_document

```javascript
{
   "doc_type":"abandoned_cart",
   "version":"1.0.0",
   "company_id":"{company_id}",
   "secret_key":"{secret_key}",
   "doc_date":"2022-06-23+12:10",
   "link_to_web_store":"{metakocka_store_name}",
   "partner":{
      "gsm":"000 111 222",
      "email":"mock@mail.com",
      "country":"SI",
      "first_name":"First name",
      "last_name":"Last name",
      "partner_contact":{
         "gsm":"000 111 222",
         "email":"mock@mail.com"
      }
   },
   "order":{
      "id":"{unique_id}",
      "number":null,
      "order_value":"55.55",
      "currency":"EUR",
      "checkout_url":"https://test-store.com?token={unique_id}",
      "is_cod":false,
      "shipping_method":"{shipping_method_name}",
      "items":[
         {
            "id":"123",
            "variation_id":"432",
            "sku":"SKU123",
            "name":"Product name",
            "quantity":"1",
            "unit":"kos",
            "price":"55.55",
            "tax_factor":0.22
         }
      ],
      "metadata":[
         {
            "key":"MetaDataKey1",
            "value_string":"MetaDataValue1"
         }
      ],
      "billing_address":{
         "gsm":"000 111 222",
         "email":"mock@mail.com",
         "first_name":"First name",
         "last_name":"Last name",
         "company":"",
         "address_1":"Ljubljanska cesta",
         "address_2":"3",
         "city":"Ljubljana",
         "state":"",
         "postal_code":"1000",
         "country":"SI",
         "county":"",
         "locality":"",
         "bl":"",
         "sc":"",
         "et":"",
         "ap":""
      }
   }
}
```

Priority order for fields:
* first_name : billing_address > partner
* last_name : billing_address > partner

* gsm : partner > billing_address > partner_contact
* email : partner > billing_address > partner_contact
