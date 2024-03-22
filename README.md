

## Tennis-tournament Challenge

Simple simulador de torneo de tenis

### Instalacion Docker Compose

```bash
cd services
docker-compose up -d
```

Verificar que los servicios esten corriendo

```bash
docker ps
```

Correr migraciones y seeders

```bash
cd services

docker exec -ti services-api-1 /bin/sh

php artisan migrate

php artisan db:seed TennisPlayerSeeder
```

---


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