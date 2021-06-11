# webbeds-sdk-php
PHP SDK for WebBeds

- Change Zend Dependencies to Laminas
- Add support for php >= 7.2
- Add Meals endpoint

The structure of this library is from hotelbeds, but the api scheme and api calls are entirely re-written for WebBeds ( also known as FIT RUUMS). 

This Repository forked from  
https://github.com/HamiltonWang/webbeds-sdk-php

### Official Documentation

http://search.fitruums.com/1

### API url
Search operations:
http://search.fitruums.com/1/PostGet/NonStaticXMLAPI.asmx

Booking operations:
http://book.fitruums.com/1/PostGet/Booking.asmx

e.g. http://search.fitruums.com/1/PostGet/NonStaticXMLAPI.asmx?op=GetLanguages

### Install
Install from console with Composer utility: https://getcomposer.org/download/

composer require webbeds/hotel-api-sdk-php

### Using SDK
read tests folder for complete example