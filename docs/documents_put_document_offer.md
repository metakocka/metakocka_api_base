**URL** : https://main.metakocka.si/rest/eshop/v1/put_document

## 2.1 sales\_offer
**Example full request** :
```javascript
{
  "company_id" : "16",
  "secret_key" : "...",
  "doc_type": "sales_offer",
  "count_code": "PP1_329",
  "doc_date": "2015-12-27+02:00",
  "partner": {
    "business_entity": "true",
    "taxpayer": "true",
    "foreign_county": "false",
    "tax_id_number": "SI78552478",
    "customer": "3D ART d.o.o.",
    "street": "Glavarjeva ulica 49",
    "post_number": "1000",
    "place": "Ljubljana",
    "province": "Severna primorska",
    "country": "Slovenia",
    "count_code": "1000"
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
  "sales_pricelist_code": "PC_104",
  "purchase_pricelist_code": "NC_200_NC",
  "prepayment_value": "12",
  "discount_value": "22",
  "duo_payment": "2016-01-11+02:00",
  "currency_code": "EUR",
  "status_code": "test",
  "valid_days": "34",
  "valid_to": "2016-01-28+02:00",
  "title": "n2",
  "inquiry_num": "sp2",  
  "pariteta": "Dostava kupcu",
  "doc_created_email": "maticpetek@gmail.com",
  "method_of_payment" : "on_deliver",
  "product_list": [
    {
      "code": "art1",
      "name": "art1",
      "name_desc": "Product description",
      "amount": "11",
      "price": "21",
      "discount": "21",
      "tax": "EX4"
    }
  ]
}
```

Notes : 
* prepayment\_percent - for exact value you can use prepayment\_value
* discount\_percent - for exact value you can use discount_value
