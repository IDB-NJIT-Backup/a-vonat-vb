# Vonatok | Vue próbadolgozat

**A feladat megoldásához a `Use this template` gomb segítségével hozhatja létre a saját repository-ját. A repository-t a szervezetben hozza létre `a-vonat-[monogram]` néven**
A projekben már elő van készítve a Bootstrap 5 és a Vue.js 3.2, így önnek ezzel már semmilyen teendője nincs! Továbbá talál a gyökérkönyvtárban egy `postman_collection.json` nevű fájlt, melyet a Postman-be importálva kipróbálhatja a az API-t.<br>
A feladat során egy vonat nyilványtartás frontend felületét kell megalkotnia Vue.js segítségével. 

## Feladatok
1. Készítse el a TrainModel nevű osztályt amely egy [vonat](#a-vonat-adatai) adatait képes tárolni.
2. Készítse el a TrainController nevű osztályt, amely képes az alap [CRUD műveletek](#crud-url-ek) megvalósítására és a TrainModel-ek tárolására.
3. Hozza létre a TrainTable nevű komponenst, amelyben egy táblázatot hoz létre a megfelelő fejlécekkel. A Táblázat megjelenés legyen sávos.
   1. A TrainTable komponensen belül példányosítsa a TrainControllert.
   2. Oldja meg, hogy a komponens létrejöttekor a TrainConroller lekérje az elemeket az API-on keresztül
4. Hozza létre a TrainData nevű komponenst, amelyben egy adott TrainModel adatait jeleníti meg, valamint a `Módosítás` és `Törlés` gombokat 
   1. A TrainData `prop`-ként csak az adott TrainModel-t kapja meg, valamint a törlő és módosító függvényt.
   2. A TrainData rendelkezzen a módosításhoz szükséges mezőkkel, melynek adatait a függvényen keresztül adja át.
5. A törlést, a módosítást és a létrehozást a TrainTable-ön keresztül valósítsa meg a TrainController.
6. A TrainTable végére szúrjon be egy speciális sort amely a megfelelő beviteli mezőket tartalmazza, ahhoz hogy új elemet lehessen felvenni.

## A vonat adatai
| Tárolt adat  | Mező neve    | Tárolt típus | Max hossz | Megengedett értékek | Megjegyzés                          |
|--------------|--------------|--------------|-----------|---------------------|-------------------------------------|
| Gyártó neve  | manufacturer | String       | 20        |                     |                                     |
| Vonat model  | model        | String       | 20        |                     |                                     |
| Gyártási év  | year         | Int          |           |                     |                                     |
| Vonat típusa | type         | String       | 1         | L/C                 | L = Mozdony, C = kocsi              |
| Szállítás    | Carries      | String       | 1         | P/C                 | P = Utasszállító, C = Teherszállító |

## CRUD URL-ek
| Method | URL                 |
|--------|---------------------|
| GET    | /                   |
| GET    | /api/trains         |
| GET    | /api/trains/{train} |
| POST   | /api/trains         |
| PUT    | /api/trains/{train} |
| DELETE | /api/trains/{train} |
