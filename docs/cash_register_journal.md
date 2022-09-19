# cash_register_journal - return cash register journal data with transactions

| Parameter     | Required/Optional | Description                                 |
|---------------|-------------------|---------------------------------------------|
| doc_date      | Optional          | Get data for specific date                  |
| doc_date_from | Optional          | Get data from date                          |
| doc_date_to   | Optional          | Get data to date (along with doc_date_from) |
| doc_id        | Optional          | Get document by id                          |
| cash_register | Optional          | Filter data by specific cash register name  |
| offset        | Optional          | Offset                                      |
| limit         | Optional          | Limit                                       |

**Type** : POST

**URL** : https://main.metakocka.si/rest/eshop/v1/json/cash_register_journal

**Request example**
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_date":"2022-01-27+02:00",
    "cash_register":"blagajna 4"
} 
```

**Respond example**
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "1081",
    "limit": "100",
    "offset": "0",
    "doc_id": "1600593893",
    "cash_register_journal_count": "1",
    "cash_register_journal_list": [
        {
            "doc_date": "2022-01-27+02:00",
            "code": "170",
            "cash_register": "Blagajna 4",
            "initial_state": "4658.69",
            "final_state": "5049.01",
            "deposit": "100",
            "transactions": [
                {
                    "type": "Prejemek",
                    "partner": "TRGOVINA, D.O.O.",
                    "document": "1-MK-1935",
                    "description": "This is a description",
                    "amount": "165.35",
                    "payment_type":"Gotovina",
                    "doc_id":"1600593623",
                    "partner_id": "1600256350"
                },
                {
                    "type": "Izdatek",
                    "partner": "TRGOVINA, D.O.O.",
                    "document": "MK-211",
                    "amount": "36",
                    "payment_type":"Gotovina",
                    "doc_id":"1600593623",
                    "partner_id": "1600256350"
                },
                {
                    "type": "Prejemek - avans",
                    "partner": "TRGOVINA, D.O.O.",
                    "document": "PP-27203",
                    "amount": "365.35",
                    "payment_type":"Gotovina",
                    "doc_id":"1600593644",
                    "partner_id": "1600256350"
                },
                {
                    "type": "Izdatek - avans",
                    "partner": "TRGOVINA, D.O.O.",
                    "document": "doc1",
                    "amount": "4.38",
                    "payment_type":"Gotovina",
                    "doc_id":"1600593629",
                    "partner_id": "1600256350"
                },
                {
                    "type": "Vračilo - prodaja",
                    "partner": "TRGOVINA, D.O.O.",
                    "document": "PP-27178",
                    "amount": "0",
                    "payment_type":"Gotovina",
                    "doc_id":"1600593626",
                    "partner_id": "1600256350"
                },
                {
                    "type": "Vračilo - nabava",
                    "partner": "TRGOVINA, D.O.O.",
                    "document": "linktest",
                    "amount": "0",
                    "payment_type":"Gotovina",
                    "doc_id":"1600593654",
                    "partner_id": "1600256350"
                }
            ]
        }
    ]
}
```
