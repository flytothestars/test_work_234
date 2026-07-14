## Стек

- **PHP 8.4** + Apache
- **MySQL 8.0**
- **Smarty 5** — шаблонизатор
- **scssphp** — компиляция SCSS в CSS без Node
- **Carbon** — работа с датами
- **Composer** — зависимости и скрипты
- **Docker / Docker Compose**

## Быстрый старт

```bash
docker compose up -d --build
```

Приложение будет доступно на **http://localhost:8000**.

При старте контейнера автоматически:
1. ожидается готовность MySQL;
2. применяется миграция
3. запускается сидер

Повторный запуск/рестарт данные не дублирует.

Остановка:

```bash
docker compose down  
```

## Структура проекта

```
.
├── index.php                 # front controller: DI, регистрация роутов, dispatch
├── schema.sql                # миграция (структура БД)
├── Dockerfile                # образ PHP+Apache, автозапуск entrypoint
├── docker-compose.yml        # сервисы web + db
├── .htaccess                 # rewrite всех запросов на index.php
│
├── app/
│   ├── Config/Config.php     # конфиг БД из переменных окружения
│   ├── Core/
│   │   ├── Database.php       # singleton PDO-подключения
│   │   ├── Router.php         # роутер с обработкой метода
│   │   └── View.php           # единый класс для переисползование Smarty
│   ├── Controller/            # Управление и возвращение к темплейту Home / Category / Article
│   └── Repository/            # Запрос к базу
│
├── view/                      # шаблоны (.tpl)
├── public/
│   ├── style.scss             # исходные стили
│   └── assets/css/style.css   # результат сборки (генерируется)
└── scripts/
    ├── migrations.php         # применяет schema.sql и миграция базу
    ├── seeder.php             # мок данные
    ├── build-css.php          # SCSS → CSS
    └── docker-entrypoint.sh   # миграция + сидер + Apache
```

## Маршруты

| URL                | Описание                                    |
| ------------------ | ------------------------------------------- |
| `/`                | Главная — блоки статей по категориям        |
| `/category/{id}`   | Статьи выбранной категории                  |
| `/article/{id}`    | Статья                                      |

## Конфигурация

Параметры БД читаются из переменных окружения (см. [Config.php](app/Config/Config.php)); значения задаются в [docker-compose.yml](docker-compose.yml):

| Переменная     | По умолчанию      |
| -------------- | ----------------- |
| `DB_HOST`      | `db`              |
| `DB_PORT`      | `3306`            |
| `DB_NAME`      | `news`            |
| `DB_USER`      | `user`            |
| `DB_PASSWORD`  | `StrongPassword!` |

## База данных

Три таблицы (см. [schema.sql](schema.sql)):

- **categories** — категории;
- **articles** — статьи;
- **article_category** — связь many-to-many между статьями и категориями.
