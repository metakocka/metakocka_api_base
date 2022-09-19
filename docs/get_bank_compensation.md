# get_bank_compensation - return compensations

| Parameter     | Required/Optional | Description                                 |
|---------------|-------------------|---------------------------------------------|
| doc_date      | Optional          | Get data for specific date                  |
| doc_date_from | Optional          | Get data from date                          |
| doc_date_to   | Optional          | Get data to date (along with doc_date_from) |
| doc_id        | Optional          | Get document by id                          |
| offset        | Optional          | Offset                                      |
| limit         | Optional          | Limit                                       |

**Type** : POST

**URL** : https://main.metakocka.si/rest/eshop/v1/json/get_bank_compensation

**Request example**
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_date_from":"2011-03-23+02:00",
    "doc_date_to":"2014-11-23+02:00"
}
```

**Respond example**
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "675",
    "result_count": "2",
    "result": [
        {
            "doc_date": "2014-04-02+02:00",
            "doc_id": "1600124622",
            "confirmation_date": "2014-04-02+02:00",
            "confirmed": "false",
            "compensation_amount": "0",
            "partner_id": "1600036960",
            "partner_desc": "Partner 123",
            "count_code": "BK-8"
        },
        {
            "doc_date": "2013-08-01+02:00",
            "doc_id": "1600109049",
            "confirmation_date": "2013-08-01+02:00",
            "confirmed": "false",
            "compensation_amount": "1.22",
            "partner_id": "1600054609",
            "partner_desc": "Partner 101",
            "count_code": "BK-7",
            "purchase_bill_list": [
                {
                    "mk_id": "1600104433",
                    "opr_code": "0",
                    "count_code": "ddv1",
                    "doc_date": "2013-06-24+02:00",
                    "duo_payment": "2013-07-17+02:00",
                    "currency_code": "EUR",
                    "receive_date": "2013-06-26+02:00",
                    "sum_all": "1.22",
                    "sum_paid": "0",
                    "compensation_amount": "1.22"
                }
            ],
            "sales_bill_list": [
                {
                    "mk_id": "1600108866",
                    "opr_code": "0",
                    "count_code": "PRD1_215",
                    "doc_date": "2013-07-30+02:00",
                    "duo_payment": "2013-08-22+02:00",
                    "currency_code": "EUR",
                    "sum_all": "122",
                    "sum_paid": "0",
                    "compensation_amount": "1.22"
                }
            ]
        }
    ]
}
```
