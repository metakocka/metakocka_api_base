# Abandoned cart - update

URL : https://main.metakocka.si/rest/eshop/v1/abandoned_cart_update

Status options:
* waiting
* sms
* email
* viber
* call_center
* done
* deleted
* unsuccessful



### 1. Update Abandoned Cart
* If 'external_id' is present or 'external_id_list' contains only one element Abandoned cart update will occur.
* Field 'status' can be null, in that case status will not be updated.
```json
{
    "company_id": "{company_id}",
    "secret_key": "{secret_key}",

    "external_id": "{unique_id_1}", 

    "first_name": "FirstName",
    "last_name": "LastName",
    "company": "Company",
    "address_1": "Address1",
    "address_2": "Address2",
    "city": "City",
    "state": "State",
    "postal_code": "1000",
    "country": "SI",

    // For Romania
    "county": "County",
    "locality": "Locality",
    "address_bl": "Address BL",
    "address_sc": "Address SC",
    "address_et": "Address ET",
    "address_ap": "Address AP",

    "status": "waiting",
    "gsm": "111 111 111",
    "email": "email@email.com",

    "items": [{
            "id": "12345",
            "variation_id": "54321",
            "sku": "SKU",
            "name": "Name",
            "quantity": "1",
            "unit": "kos",
            "price": "100",
            "tax_factor": 0.22
        }
    ]
}

```
