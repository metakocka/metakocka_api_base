# 1. Concept
Every change on document on stock can be send to other system via POST service. You will get the some data as calling get service on MetaKocka REST. 

Required paramethers :
* URL - webhook end point for POST call
* client_secret - secret token for signing POST content with HMAC.

Optional paramethers :
* basic_auth_username / basic_auth_password - end point can have extra HTTP Basic authentication

WebHook must return JSON with paramether "check_respond_status_json_ok" and value "true" (respond can have other JSON properties). For example :
``` javascript
{
  "check_respond_status_json_ok" : "true"
}
```
If webhook end point is not available (or respond is not required JSON), MK will try two more time with 60 seconds delay.

POST request on webhook will have the following header paramethers :
* X-MetaKocka-Event - see EventType in description below. For example : warehouse_product_stock_update
* X-MetaKocka-Id - unique MK event id for log tracking
* X-MetaKocka-Signature - hash body value (HMAC) with client_secret value

POST content is UTF-8 encoded.  

# 2. Stock
EventType : warehouse_product_stock_update
