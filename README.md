

# Tennis-tournament Challenge

Simple simulador de torneo de tenis

<br />
<br /> 

## Instalacion con Docker Compose

```bash

git clone ...

cd tennis-challenge/services/api

cp .env.example .env

composer install

docker-compose up -d
```

Verificar que los servicios esten corriendo

```bash
docker ps
```

Correr migraciones y seeders

```bash
cd tennis-challenge/services/api

docker exec -ti services-api-1 /bin/sh

php artisan migrate

php artisan db:seed TennisPlayerSeeder
```

<br />


Ahora se puede acceder y probar la API en [http://api.localhost](http://api.localhost)

---


### Documentacion 

[http://api.localhost/api/documentation](http://api.localhost/api/documentation)

---

### Postman Collection

[Descargar Postman Collection](services/api/Tennis-Challenge.postman_collection.json)


---


### Tests

```bash
cd services

docker exec -ti services-api-1 /bin/sh

php artisan test
```

---

<br />
<br /> 


## URL produccion test


[https://tennis-tournament-api-production-5f6a.up.railway.app/](https://tennis-tournament-api-production-5f6a.up.railway.app/)

* [/api/tennis-players](https://tennis-tournament-api-production-5f6a.up.railway.app/api/tennis-players)

* [/api/tournaments](https://tennis-tournament-api-production-5f6a.up.railway.app/api/tournaments)

* [/api/tournaments/{tournament}/matches](https://tennis-tournament-api-production-5f6a.up.railway.app/api/tournaments/1/matches)


[Documentation](https://tennis-tournament-api-production-5f6a.up.railway.app/api/documentation)