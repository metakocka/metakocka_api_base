# Accounting export

**Description** : Generate accounting export data based on defined profiles. See https://metakocka.freshdesk.com/a/solutions/articles/3000048648 for more information.

**URL** : https://main.metakocka.si/rest/eshop/accounting_export

**Type** : POST

**Request example**

Notes :
* profile_name_list: A list of profiles for export. This can include either the profile name or the profile ID.
* export_attachment: Defines whether to export the invoice PDF and all files attached to these invoices.

```json
{
  "secret_key" : "8899",
  "company_id" : "16",
  "profile_name_list" : ["Izdani računi Vasco - domači"],
  "from_date" : "2026-01-01+02:00",
  "to_date" : "2026-03-01+02:00",
  "export_attachment" : "false"
}
```
**Success response example**

Notes : 
* If opr_code = 0: The operation was successful. The result_url provides a link to download a ZIP file containing the exported documents. The file format is identical to exports performed directly within the MetaKocka main interface.
* The result_url link is only available for 3600 seconds (1 hour). After this period, the link will no longer be accessible.

```json
{
  "opr_code": "0",
  "opr_time_ms": "17559",
  "opr_time_no_lock_ms": "0",
  "result_url": "https://metakocka-exc-temp-dev2.s3-eu-west-1.amazonaws.com/izdani_racuni_SI101345657_2026_03_01_225040.zip?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20260301T215044Z&X-Amz-SignedHeaders=host&X-Amz-Expires=3599&X-Amz-Credential=AKIAJQPR4WOKGGZOD2344F20260301%2Feu-west-1%2Fs3%2Faws4_request&X-Amz-Signature=771c491c67513373913618e8bb96c2f59b34786c80b61053b233bac714f7cc40",
  "job_id": "267"
}
```

**Error response example**

Notes :
* opr_code: Any value other than 0 indicates an error; the corresponding description will be provided in the error_desc field.

```json
{
  "opr_code": "1",
  "opr_time_ms": "13047",
  "opr_time_no_lock_ms": "0",
  "error_desc": "java.lang.InterruptedException: sleep interrupted",
  "job_id": "265"
}
```
