# Тестовое задание: REST API для продуктов и категорий

##  Описание проекта
Реализация REST API для управления продуктами и категориями с рекурсивной структурой на Laravel 10+.

##  Технологический стек
- Laravel 10+
- PHP 8+
- PostgreSQL
- Git

##  Структура базы данных
### Таблица `product_categories`

### Таблица `products`

##  API Эндпоинты

### Продукты
- `GET /api/products` - Список продуктов (пагинация по 6)
- `GET /api/products/{product:slug}` - Детали продукта
- `POST /api/products` - Создание продукта
- `PUT /api/products/{id}` - Обновление продукта
- `DELETE /api/products/{id}` - Удаление продукта

### Категории
- `GET /api/product_categories` - Дерево категорий
- `GET /api/product_categories/with-products` - Категории с продуктами
- `POST /api/product_categories` - Создание категории
- `PUT /api/product_categories/{id}` - Обновление категории
- `DELETE /api/product_categories/{id}` - Удаление категории

##  Установка

### Клонировать репозиторий:

git clone git@github.com:DanyaErezer/CRUD-API.git
cd project-directory

### Установка зависимостей
composer install

### Настройка .env 

### Запуск сидеров и сиграций
(php artisan migrate --seed)

### Запуск сервера
(php artisan serve)

## Для удобства тестирование прелагаю воспользоваться готовой документацией Postman
https://documenter.getpostman.com/view/43517403/2sB2cX8M2J




 

