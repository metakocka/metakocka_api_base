# Delivery service - price lists
**Notes** : 
* Each delivery type has its own price list.
* Price lists are not directly linked with delivery services, because multiple delivery services can have the same delivery type, therefore the same price list.

## get_delivery_service_pricelist

**URL** : https://main.metakocka.si/rest/eshop/v1/get_delivery_service_pricelist

**Type** : POST

**Notes** :
* Always returns all price lists for all delivery types

**Request example**
```javascript
{
    "company_id":"16",
    "secret_key":"8899"
}
```

**Respond example**
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "30",
    "opr_time_no_lock_ms": "0",
    "pricelist_list_count": "2",
    "pricelist_list": [
        {
            "currency_code": "EUR",
            "delivery_type": "GLS Slovenija",
            "package_delivered_status_list": [
                "Delivered",
                "Picked up"
            ],
            "package_return_status_list": [
                "Returned",
                "Canceled"
            ],
            "pricelist_rows": [
                {
                    "cod_cost": "3",
                    "id": "1",
                    "package_delivery_cost": "2",
                    "package_weight": "2",
                    "return_cost": "4",
                    "transport_cost": "1",
                    "valid_from": "2025-02-10+02:00",
                    "valid_to": "2025-02-26+02:00"
                },
                {
                    "cod_cost": "3",
                    "id": "2",
                    "package_delivery_cost": "4",
                    "package_weight": "5",
                    "return_cost": "2",
                    "transport_cost": "5",
                    "valid_from": "2025-02-10+02:00",
                    "valid_to": "2025-02-14+02:00"
                }
            ]
        },
        {
            "currency_code": "EUR",
            "delivery_type": "GLS Italy",
            "package_delivered_status_list": [
                "Delivered",
                "Picked up"
            ],
            "package_return_status_list": [
                "Returned",
                "Canceled"
            ],
            "pricelist_rows": [
                {
                    "cod_cost": "4",
                    "id": "3",
                    "package_delivery_cost": "23",
                    "package_weight": "1",
                    "return_cost": "2",
                    "transport_cost": "2",
                    "valid_from": "2025-02-10+02:00",
                    "valid_to": "2025-02-20+02:00"
                }
            ]
        }
    ]
}
```