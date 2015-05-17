## Examples

### Simple query search with query window
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_bill_domestic",
    "query" : "john",
    "offset" : "10",
    "limit" : "10"
}
```

### Advance search
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_bill_domestic",
    "query_advance" : [
    { "type" : "partner_tax_num", "value" : "TAX123" }
    ]
}
```

### Return documents as result
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_bill_domestic",
    "query" : "john",
    "result" : "doc"
}
```

**Respond** :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "62",
    "result_all_records": "1",
    "result_count": "1",
    "offset": "0",
    "limit": "1",
    "result": [
        {
            "mk_id": "1600203710",
            "doc_type": "sales_bill_domestic",
            "opr_code": "0",
            "count_code": "PRD1_494",
            "doc_date": "2015-05-10+02:00",
            "partner": {
                "business_entity": "false",
                "taxpayer": "false",
                "foreign_county": "false",
                "tax_id_number": "TAX123",
                "customer": "Dolg1",
                "street": "naslova",
                "post_number": "1000",
                "place": "Komenda",
                "country": "Slovenia",
                "count_code": "50513",
                "useCustomerAsContact": "false"
            },
            "receiver": {
                "business_entity": "false",
                "taxpayer": "false",
                "foreign_county": "false",
                "tax_id_number": "TAX123",
                "customer": "Dolg1",
                "street": "naslova",
                "post_number": "1000",
                "place": "Komenda",
                "country": "Slovenia",
                "count_code": "50513",
                "useCustomerAsContact": "false"
            },
            "service_to_date": "2015-05-10+02:00",
            "duo_payment": "2015-05-12+02:00",
            "currency_code": "EUR",
            "doc_created_email": "maticpetek@gmail.com",
            "location_of_service": "1komenda",
            "warehouse": "oznaka1",
            "product_list": [
                {
                    "mk_id": "1600095169",
                    "code": "9005617101394",
                    "amount": "2",
                    "price": "2",
                    "tax": "EX4"
                }
            ],
            "sum_basic": "4",
            "sum_tax_ex4": "0.88",
            "sum_all": "4.88"
        }
    ]
}
```

### Return products as result
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"purchase_product",
    "query_advance" : [
    { "type" : "eshop_sync", "value" : "true" }
    ],  
    "result_type" : "doc",
    "limit" : "2"    
}
```

**Respond** :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "8304",
    "result_all_records": "2",
    "result_count": "2",
    "offset": "0",
    "limit": "2",
    "result_product": [
        {
            "count_code": "a15631",
            "mk_id": "1600160543",
            "code": "547779-ODPRODAJA",
            "name": "AKCIJA BFGoodrich 205/55R16 G-ForceWinter 94H XL",
            "unit": "kos",
            "service": "false",
            "sales": "true",
            "purchasing": "true"
        },
        {
            "count_code": "a15632",
            "mk_id": "1600160544",
            "code": "518776-ODPRODAJA",
            "name": "AKCIJA Dunlop 175/70R14 SP Wint.Resp.84T DOT4311",
            "unit": "kos",
            "service": "false",
            "sales": "true",
            "purchasing": "true",
            "weight": "7,3"
        }
    ]
}
```