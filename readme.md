# Chat Real Time - Laravel 5.2 + Pusher

Chat real time is a web application with Laravel 5.2 Framework and Pusher API 4.1.

## Configurations

Auth requires github account. (Laravel Socialite 2.0)

**On .env**

* PUSHER_APP_ID
* PUSHER_KEY
* PUSHER_SECRET
* PUSHER_CLUSTER

### Other Configurations needed:

* PHP config file (php.ini)

Requires enabled *openssl* extension & !(https://curl.haxx.se/docs/caextract.html)

curl.cainfo="ROUTE\\TO\\CACERT.PEM"

openssl.cafile"ROUTE\\TO\\CACERT.PEM"

* Apache enable *mod_ssl*
