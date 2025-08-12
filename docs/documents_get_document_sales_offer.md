**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Sales Offer

**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_offer",
  "doc_id" : "1600202487"
}
```
Respond :
```javascript
{
    "mk_id": "1600202487",
    "doc_type": "sales_offer",
    "opr_code": "0",
    "count_code": "PP1_288",
    "doc_date": "2015-04-20+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI10040073",
        "customer": "eshop 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "country_iso_2" : "SI",
        "count_code": "1600002672",
        "useCustomerAsContact": "false",
        "mk_id": "180600025047",
        "mk_address_id": "180600073437"
    },
    "sales_pricelist_code": "bruto1",
    "purchase_pricelist_code": "cenik_nabava",
    "prepayment_value": "5.42",
    "discount_value": "15",
    "duo_payment": "2015-04-22+02:00",
    "currency_code": "EUR",
    "status_code": "Odprta",
    "status_desc": "open",
    "valid_days": "30",
    "valid_to": "2015-05-20+02:00",
    "title": "Ponudba 1",
    "pariteta": "Lasten prevzem",
    "doc_created_email": "maticpetek@gmail.com",
    "notes": "Dodatni opis",
    "product_list": [
        {
            "mk_id": "1600162716",
            "code": "mkp1",
            "name": "MK prenos 1",
            "name_desc": "MK prenos 1 artikel opis",
            "amount": "2",
            "price": "10",
            "tax": "EX4",
            "doc_desc": "Opis na ponudbi"
        },
        {
            "mk_id": "1600162716",
            "code": "mkp1",
            "name": "MK prenos 1",
            "name_desc": "MK prenos 1 artikel opis",
            "amount": "3",
            "price_with_tax": "13",
            "tax": "EX4",
            "doc_desc": "Opis na ponudbi"
        }
    ],
    "sum_basic": "44.4",
    "sum_discount": "15",
    "sum_tax_ex4": "9.77",
    "sum_prepayment": "10",
    "sum_all": "54.17"
}
```

## Special paramethers
* show\_last\_payment\_date - see [Bill example](/docs/documents_get_document_bill.md)
