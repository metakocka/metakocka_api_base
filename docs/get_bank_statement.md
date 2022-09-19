# get_bank_statement - return bank statements with transactions

| Parameter     | Required/Optional | Description                                 |
|---------------|-------------------|---------------------------------------------|
| doc_date      | Optional          | Get data for specific date                  |
| doc_date_from | Optional          | Get data from date                          |
| doc_date_to   | Optional          | Get data to date (along with doc_date_from) |
| doc_id        | Optional          | Get document by id                          |
| offset        | Optional          | Offset                                      |
| limit         | Optional          | Limit                                       |

**Type** : POST

**URL** : https://main.metakocka.si/rest/eshop/v1/json/get_bank_statement

**Request example**
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_date":"2022-01-27+02:00"
} 
```

**Respond example**
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "16",
    "limit": "100",
    "offset": "0",
    "result_count": "3",
    "result": [
        {
            "doc_date": "2022-05-10+02:00",
            "code": "34",
            "initial_state": "11318.04",
            "final_state": "11418.04",
            "transactions": [
                {
                    "type": "Prejemek - avans",
                    "partner": "Test 123",
                    "description": "avans baje",
                    "amount": "100",
                    "payment_type": "Transakcijski račun",
                    "partner_id": "180600026430"
                }
            ],
            "currency": "EUR",
            "bank_account": "SI56 1111 1160 1111 645",
            "doc_id": "1600597142"
        },
        {
            "doc_date": "2022-07-08+02:00",
            "code": "35",
            "initial_state": "11418.04",
            "final_state": "11442.04",
            "transactions": [
                {
                    "type": "Prejemek",
                    "partner": "Izpisek>izpisek",
                    "document": "1-MK-2064",
                    "amount": "24",
                    "payment_type": "Transakcijski račun",
                    "partner_id": "1600350476",
                    "doc_id": "1600598073"
                }
            ],
            "currency": "EUR",
            "bank_account": "SI56 1111 1160 1111 645",
            "doc_id": "1600598078"
        },
        {
            "doc_date": "2022-07-19+02:00",
            "code": "36",
            "initial_state": "11442.04",
            "final_state": "11320.04",
            "transactions": [
                {
                    "type": "Izdatek - avans",
                    "partner": "Izpisek>izpisek",
                    "document": "IOPTest",
                    "amount": "122",
                    "payment_type": "Transakcijski račun",
                    "partner_id": "1600350476",
                    "doc_id": "1600598425"
                }
            ],
            "currency": "EUR",
            "bank_account": "SI56 1111 1160 1111 645",
            "doc_id": "1600598430"
        }
    ]
}
```
