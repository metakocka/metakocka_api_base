
# Concept

Let's start with example :

**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_bill_domestic",
    "query" : "john"
}
```

* you can search by one document type (doc\_type)
* use 'query' (some as search field in MetaKocka) or 'advance\_query' (some as advance search option in MetaKocka) to limit results.
* use 'limit' and 'offset' to perform query window
* you can get maximum of 50 records. For more use query window

**Respond** :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "185",
    "result_all_records": "1",
    "result_count": "1",
    "offset": "0",
    "limit": "1",
    "result": [
        {
            "mk_id": "1600203710",
            "opr_code": "0",
            "count_code": "PRD1_494"
        }
    ]
}
```

* 'result\_all\_records' is number of all possible records for given query
* result can be list of mk\_id and count code or list of whole document (see examples below)

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

## Advance search supported paramethers
Condition  | Paramethers                           | Notes |
-----------|---------------------------------------|-------|
partner    |partner\_mk\_id, partner\_query, partner\_tax\_num, partner\_code | / |