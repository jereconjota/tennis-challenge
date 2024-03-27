

## Tennis-tournament Challenge

Simple simulador de torneo de tenis

### Instalacion Docker Compose

```bash
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

---

Ahora se puede acceder y probar la API en [http://api.localhost](http://api.localhost)


### Postman Collection

[Descargar Postman Collection](services/api/Tennis-Challenge.postman_collection.json)

---


### Documentacion 

[http://api.localhost/api/documentation](http://api.localhost/api/documentation)

---


### Tests

```bash
cd services

docker exec -ti services-api-1 /bin/sh

php artisan test
```