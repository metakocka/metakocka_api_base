#add_payment – dodajanje plačila na račun in ponudbo
Opis : Na obstoječi račun ali ponudbo lahko dodamo transakcijo plačila. Glede na to, da ima dokument lahko več plačil, lahko tudi operacijo ponovimo večkrat.
URL : https://main.metakocka.si/rest/eshop/v1/json/add_payment

**Primer klica**
```javascript
{
   "secret_key":"my_secret",
   "company_id":"16",
   "doc_type" : "bill" ; "sales_offer"
   "mk_id":"1600001744",
   "count_code":"eshop_002"   
   "payment_mode" : "payment" ; "prepayment", "return"
   "payment_type" : "Transakcijski račun"
   "cash_register" : "Blagajna 1"
   "date" : "2014-08-23+02:00"
   "price" : "12.23"
   "notes" : "bla bla bla"
}
```

**Primer odgovora**
```javascript
{
    "opr_code":"0",
    "opr_time_ms":"33",
}
```

Opombe
- doc_type mora biti določen glede na tip dokumenta na katerega želimo dodajati plačilo,
- za identifikacijo dokumenta lahko uporabimo mk_id ali count_code (to je št. računa ali št. ponudbe)
- cash_register uporabimo samo v primeru, da imamo gotovinsko plačilo

| Atribut | Obvezen? | V MK | Tip / max dolžina | Opomba |
| ------- | -------- | ---- | ----------------- | ------ |
| doc_type | DA | / | char | vrednost 'bill' (za vse račune) oz. 'sales_offer' (za ponudbe)
| mk_id | NE | / | char, 30 | unikatna oznaka dokumenta v MK. Dobimo kot rezultat klical za dodajanje dokumentov. Mora biti podani mk_id ali count_code
| count_code | NE | Št. računa ali Št. ponudbe | char, 30 | Št. dokumenta v MK. Lahko se avtomatično generila v MK ali jo določimo preko klica za dodajanje dokumentov. Več dokument ima lahko enako oznako (recimo domači in tuji račun ; domači računi v različnih letih)
| payment_mode | DA | Tip plačila | char | glej okno za dodajanje plačila. Možne vrednost "payment" (Plačilo), "prepayment" (Plačilo - avans), "return" (Vračilo)
| payment_type | DA | Vrsta plačila | char,100 | ime plačila, ki ga lahko nastavimo v dinamičnem šifrantu
| cash_register | NE | Blagajna | char,100 | ime blagajne, ki jo lahko nastavimo v dinamičnem šifrantu. Uporabno samo v primeru, da imamo plačilo preko gotovine. 
| date | DA | Datum | char (ISO date) | kdaj je bilo opravljeno plačilo v ISO 8601 formatu.
| price | DA | Znesek | cena | znesek v format "1200.12".
| notes | NE | Opomba | char,100 | opomba, ki se izpiše ob transakciji

