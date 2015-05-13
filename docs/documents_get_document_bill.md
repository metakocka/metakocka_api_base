# get_document - Bill

Valid doc_type :
* sales\_bill\_domestic
* sales\_bill\_foreign
* sales\_bill\_retail
* purchase\_bill\_domestic
* purchase\_bill\_foreign

**Example** :

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "sales_bill_domestic",
    "opr_code": "0",
    "count_code": "PRD1_493",
    "doc_date": "2015-05-07+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI78552478",
        "customer": "3D ART d.o.o.",
        "street": "Glavarjeva ulica 49",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "count_code": "1000",
        "useCustomerAsContact": "false"
    },
    "receiver": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI78552478",
        "customer": "3D ART d.o.o.",
        "street": "Ulica 2",
        "post_number": "2000",
        "place": "Kamnik",
        "country": "Slovenia",
        "count_code": "1000",
        "useCustomerAsContact": "false"
    },
    "service_to_date": "2015-05-07+02:00",
    "sales_pricelist_code": "PC_115",
    "discount_value": "10",
    "duo_payment": "2015-05-22+02:00",
    "currency_code": "EUR",
    "title": "Naziv1",
    "pariteta": "Dostava kupcu",
    "doc_created_email": "maticpetek@gmail.com",
    "location_of_service": "1komenda",
    "offer_list": [
        {
            "count_code": "PP424"
        }
    ],
    "buyer_order": "nkupca1",
    "warehouse": "SK0005",
    "delivery_type": "Lasten prevzem",
    "notes": "opis2",
    "product_list": [
        {
            "mk_id": "1600063983",
            "code": "majica1sifra",
            "name_desc": "majica1 artikle opis",
            "amount": "2",
            "price": "3",
            "discount": "12",
            "tax": "EX4",
            "doc_desc": "Opis na računu"
        },
        {
            "mk_id": "1600063983",
            "code": "majica1sifra",
            "name_desc": "majica1 artikle opis",
            "amount": "2",
            "price_with_tax": "14.6754",
            "discount": "12",
            "tax": "EX4",
            "doc_desc": "Opis na računu"
        }
    ],
    "sum_basic": "20.33",
    "sum_discount": "13.67",
    "sum_tax_ex4": "4.47",
    "sum_all": "24.8"
}
```