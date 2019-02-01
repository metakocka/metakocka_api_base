# get_bank_statement_status - return last statement state, date, etc for all bank bills

**Description** : If you use bank statement, you can get the last statement state. It is useful for dashboards to show how much money you have on some bank transaction bill.

**Type** : POST

**URL** : https://main.metakocka.si/rest/eshop/v1/get_bank_statement_status

**Request example**
```javascript
{
   "secret_key":"my_secret",
   "company_id":"16"
}
```

**Respond example**
```javascript
{
  "opr_code": "0",
  "opr_time_ms": "52",
  "statement_list": [
    {
      "opr_code": "0",
      "opr_time_ms": "0",
      "ttr": "SI56 0231 1160 3190 647",
      "currency": "EUR",
      "last_statement_count_code": "129",
      "last_statement_date": "10.04.2014",
      "finished_state": "14737.52"
    },
    {
      "opr_code": "0",
      "opr_time_ms": "0",
      "ttr": "SI56 0231 1160 3190 647",
      "currency": "USD",
      "last_statement_count_code": "117",
      "last_statement_date": "04.05.2012",
      "finished_state": "5125.21"
    }
  ]
}
```

**Notes**
- you will get multiple return object for some TTR, if you managed bank statements by different currency
- finished_state is final account state
