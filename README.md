# angular-php-mysql-table-app

Instrukcijos paleisti sistemą:

Paleisti duombazę (reikalingos mysql administratoriaus privilegijos):

1. Sukurti duombazę ir vartotoją, įkelti duomenis (mysql -u root -p < marks.sql)

Paleidimo Dependencies:
mysql (naudojau 14.14)

Paleisti front-end:

1. Nueiti į front-end direktoriją ( cd front-end ).

2. Atsisiųsti projekto dependencies ( npm install )

3. Startuoti front-end ( ng serve )

Paleidimo Dependencies:

Node Package Manager (npm) (naudojau 6.14.6),
Angular CLI (naudojau 6.2.3, Node: 9.11.2)

﻿Paleisti back-end:

1. Nueiti į back-end direktoriją ( cd back-end ).

2. Atsisiųsti dependencies ( composer update ).

3. Startuoti serverį ( php -S 127.0.0.1:8080 -t public )

Paleidimo Dependencies:

PHP (naudojau 7.1),
Symfony CLI (naudojau v4.21.6),
Composer (naudojau 2.0.8)


Padarius šiuos veiksmus, naršyklėje atsidaryti http://localhost:4200
