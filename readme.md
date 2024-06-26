<h1>Для запуска проекта необходимо:</h1>

- Внутри директории /api создать файлы .env и .env.test и скопировать в них соответственно содержимое файлов .env.dist и .env.test.dist
- Внутри директории /infra создать файл .env и скопировать в него содержимое файла .env.example
- Выполнить команду `docker compose up -d` из директории /infra
- Зайти внутрь контейнера api с помощью команды `docker compose exec api bash`
- Выполнить команду `composer install`
- Для запуска тестов необходимо выполнить команду `php ./bin/phpunit` внутри контейнера api

<h2>Для проверки контроллера стоимости брони необзодимо:</h2>

- Отправить POST запрос на эндпоинт localhost:8080/api/booking/price

Пример запроса и ответа:

```
POST http://localhost:8080/api/booking/price
Content-Type: application/json

{
"price": 10000,
"birthDate": "2020-09-01",
"startDate": "2025-05-03",
"paymentDate": "2024-11-02"
}

Response:
{
  "price": 1300
}
```