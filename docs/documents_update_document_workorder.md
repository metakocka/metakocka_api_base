## Workorder - update

### Example : add work to all positions ("izdelava - vsi")
Notes :
* mk_id is MetaKocka Id for current workorder

```javascript
{
  "work_list" : [
    {
      "product_mk_id" : "122109555946",
      "amount_realization" : 93,
      "performer_name_list" : [
        {
          "email" : "user@gmail.com"
        }
      ],
      "when" : "28.11.2016, 09:32",
      "type" : "work"
    }
  ],
  "mk_id" : "1609556075",
  "secret_key" : "8899",
  "company_id" : "16"
}
```