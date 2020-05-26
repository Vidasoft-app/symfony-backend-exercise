# Ejercicio de prueba en Symfony 4.4

### Contexto

Este ejercicio se ha realizado para una prueba técnica. Se trata de la creación de 2 endpoints para consumir datos desde Punk API (https://punkapi.com/documentation/v2).

### Instalación

* Clonar repositorio
* Instalar dependencias ``Composer install``
* Ejecutar comando ``symfony server:start``
* Abrir localhost:8000

### Endpoints

* http://localhost:8000/api/beers -> Lista todo
* http://localhost:8000/api/beers?food=food=Spicy%20chicken -> Realiza búsqueda
* http://localhost:8000/api/beers/1 -> Lista 1 elemento con la ficha ampliada

### Test

Se han incluido 3 test muy simples.

Para ejecutarlos lanzar comando ``php ./bin/phpunit``

