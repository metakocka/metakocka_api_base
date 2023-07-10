# Abandoned cart - update status

URL : https://main.metakocka.si/rest/eshop/v1/abandoned_cart_update

Status options:
* waiting
* sms
* email
* call_center
* done
* deleted
* unsuccessful

```javascript
{
    "company_id": "{company_id}",
    "secret_key": "{secret_key}",
    "external_id_list" : ["{unique_id_1}", "{unique_id_2}"],
    "status" : "done"
}
```
