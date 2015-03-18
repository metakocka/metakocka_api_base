
# 1. Concept

Product have basic struct (see below) for get / insert / update call. 

Update and delete call are using the some business rules as out application. For example, you cannot delete product that is already use on some document (bill, etc.) or remove flag as "sales" product that is on some sales document. 

## 1.1 Attributes
Call example :
```javascript
{
    "secret_key":"my_secreat_key",
    "company_id":"16",
    "count_code":"eshop_001",
    "code":"eshop_001_sif",
    "name":"artikel eshop_001",
    "name_desc": "artikel eshop_001 - daljsi opis",    
    "unit":"kos",
    "service":"false",
    "sales":"true",
    "purchasing":"false",
    "height":"12.23",
    "depth":"4.12",
    "weight":"6.3",
}
```

Attribute                 | Type | Notes| MK SLO |
--------------------------|------|------|--------|
count_code                | char, 30 | Unique product Id, visible to user. It can be empty, but then user must set automatical counting of products in MetaKocka. | Id. artikla |
code [*]                  | char, 20 | | Šifra |
name [*]                  | char, 200 | | Naziv artikla |
name_desc                 | char, 700 | | Dodatni opis |
unit [*]                  | unit register | Values like "kol", "m2", etc. | Enota mere |
service                   | bool | If empty, default value is false | Storitev |
sales                     | bool | If empty, default value is false | Prodajni |
purchasing                | bool | If empty, default value is false | Nabavni |
height                    | decimal |  | Višina |
width                     | decimal |  | Širina |
depth                     | decimal |  | Globina |
weight                    | decimal |  | Teža |
customs_fee               | string  | Must be value (not description) from dynamic register | Carinska tarifa |

Notes :
* Attribute with [*] are mandatory attributes.
