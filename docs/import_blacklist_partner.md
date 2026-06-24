# Import blacklist partner

**Description** : Imports a list of blacklisted partners

**URL** : https://main.metakocka.si/rest/eshop/v1/import_blacklist_partner

**Type** : POST

**Body data parameters**

| Parameter      | Required/Optional                                                 | Description                                                                                                                                         |
|----------------|-------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------|
| secret_key     | Required                                                          | Generated API key.                                                                                                                                  |
| company_id     | Required                                                          | Internal(MK) company id.                                                                                                                            |
| api_user_email | Optional                                                          | Internal(MK) user email.                                                                                                                            |
| clear_all      | Optional                                                          | If `true`, the existing blacklist for the company is archived and removed before the new list is inserted (full replace). Default `false` (append). |
| blacklist      | Required (unless `clear_all=true` is used only to empty the list) | List of blacklist partner objects.                                                                                                                  |

**Blacklist partner object parameters**

| Parameter   | Required/Optional                  | Description                                                                                                                 |
|-------------|------------------------------------|-----------------------------------------------------------------------------------------------------------------------------|
| email       | Required if `gsm`/`phone` is empty | Partner email address.                                                                                                      |
| phone       | Required if `email` is empty       | Partner GSM number. `gsm` and `mobilephone` are also accepted (first non-empty of `phone` → `gsm` → `mobilephone` is used). |
| customer    | Optional                           | Partner full name.                                                                                                          |
| reason      | Optional                           | Reason for blacklisting.                                                                                                    |
| street      | Optional                           | Street.                                                                                                                     |
| post_number | Optional                           | Post / ZIP number.                                                                                                          |
| province    | Optional                           | Province.                                                                                                                   |
| country     | Optional                           | Country name or ISO code                                                                                                    |
| country_id  | Optional                           | Internal(MK) country id. Can be used instead of `country`.                                                                  |

**Notes**

* Within a single request, duplicate emails or phone numbers are not allowed (matching is case-insensitive).
* When `clear_all=false`, if any email/phone already exists on the blacklist, the whole request is rejected (`opr_code` 6). Use `clear_all=true` to replace the whole list, or remove the already existing entries from the request.
* When `clear_all=true`, the existing entries are first copied to history and then removed, all within the same transaction (atomic replace).

**Request example - full replace**
```json
{
  "secret_key": "secretKey",
  "company_id": "12345",
  "clear_all": true,
  "blacklist": [
    {
      "customer": "Janez Novak",
      "email": "janez.novak@example.com",
      "phone": "+38640111222",
      "street": "Slovenska cesta 1",
      "post_number": "1000",
      "province": "Ljubljana",
      "country": "Slovenia",
      "reason": "Repeated chargebacks"
    },
    {
      "email": "maria.rossi@example.it",
      "reason": "Fraudulent orders"
    },
    {
      "phone": "+38640111221",
      "reason": "Spam"
    }
  ]
}
```

**Request example - append**
```json
{
  "secret_key": "secretKey",
  "company_id": "12345",
  "clear_all": false,
  "blacklist": [
    {
      "customer": "Ana Horvat",
      "email": "ana.horvat@example.com",
      "phone": "+38641999888",
      "reason": "Repeated chargebacks"
    }
  ]
}
```

**Request example - clear the whole list**
```json
{
  "secret_key": "secretKey",
  "company_id": "12345",
  "clear_all": true,
  "blacklist": []
}
```

**Response example**
```json
{
  "opr_code": "0",
  "opr_desc": "Blacklist import OK. Inserted 2 entries, cleared 5 existing entries.",
  "opr_time_ms": "189"
}
```

**Error response example - validation**
```json
{
  "opr_code": "2",
  "opr_desc": "Row 3: email and phone/gsm are both empty",
  "opr_time_ms": "12"
}
```

**Error response example - already blacklisted**
```json
{
  "opr_code": "6",
  "opr_desc": "Some entries are already blacklisted. Either set clear_all=true to replace the whole list, or remove the already existing entries from the request. Emails: a@example.com, b@example.com. Phones: +38640111222.",
  "opr_time_ms": "31"
}
```
