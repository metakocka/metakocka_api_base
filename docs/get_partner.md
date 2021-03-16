**URL** : https://main.metakocka.si/rest/eshop/v1/get_partner

# get_partner

**Description** : return list of partners. Supported fields to search partner by :
* partner_id
* partner_name
* partner_tax_number
* partner_email
* partner_phone_number

**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_partner) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",  
  "partner_name" : "janez"
}
```
Respond :
```javascript
{
    "partner_list_count": "2",
    "partner_list": [
        {
            "mk_id": "228000009447",
            "business_entity": "false",
            "foreign_county": "false",
            "customer": "BAJEC JANEZ",
            "count_code": "WE0003085",
            "partner_contact_list": [
                {
                    "mk_id": "228000009449",
                    "mk_address_id": "228000009448",
                    "contact_address": "Tehnološki park 24",
                    "gsm": "051123456",
                    "email": "test@test.si"
                }
            ],
            "partner_delivery_address_list": [
                {
                    "mk_id": "228000009448",
                    "address_type": "Račun",
                    "street": "Tehnološki park 24",
                    "post_number": "1000",
                    "city": "Ljubljana",
                    "payment_due_days": "15",
                    "language": "Slovenski"
                }
            ]
        },
        {
            "mk_id": "228000012291",
            "business_entity": "false",
            "taxpayer": "false",
            "foreign_county": "false",
            "customer": "TESTNI JANEZ",
            "count_code": "140",
            "partner_contact_list": [
                {
                    "mk_id": "228000012293",
                    "mk_address_id": "228000012292",
                    "contact_address": "Tehnološki park 21",
                    "gsm": "031111222",
                    "email": "test1@test.si"
                }
            ],
            "partner_delivery_address_list": [
                {
                    "mk_id": "228000012292",
                    "address_type": "Račun",
                    "street": "Tehnološki park 21",
                    "post_number": "1000",
                    "city": "LJUBLJANA",
                    "country": "Slovenija",
                    "payment_due_days": "10",
                    "language": "Slovenski",
                    "currency_id": "65",
                    "currency": "EUR"
                }
            ]
        }
    ]
}
```
# get_partner with discounts

**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_partner) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",  
  "partner_name" : "janez",
  "show_partner_discount" : "true"
}
```
Respond :
```javascript
{
    "partner_list_count": "2",
    "partner_list": [
        {
            "mk_id": "228000009447",
            "business_entity": "false",
            "foreign_county": "false",
            "customer": "BAJEC JANEZ",
            "count_code": "WE0003085",
            "partner_contact_list": [
                {
                    "mk_id": "228000009449",
                    "mk_address_id": "228000009448",
                    "contact_address": "Tehnološki park 24",
                    "gsm": "051123456",
                    "email": "test@test.si"
                }
            ],
            "partner_delivery_address_list": [
                {
                    "mk_id": "228000009448",
                    "address_type": "Račun",
                    "street": "Tehnološki park 24",
                    "post_number": "1000",
                    "city": "Ljubljana",
                    "payment_due_days": "15",
                    "language": "Slovenski"
                }
            ],
            "discounts": [
                {
                    "categories": [
                        "MacBook",
                        "MacBook Pro"
                    ],
                    "discount_percent": "10.00",
                    "override_existing": "false"
                },
                {
                    "categories": "Gume",
                    "discount_percent": "15.00",
                    "override_existing": "true"
                }
            ]
        }
    ]
}
```
