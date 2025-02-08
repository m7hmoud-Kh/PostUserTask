## Deployment

How to run this project 

```bash
  composer install
```

```bash
  cp .env.example .env
```

```bash
  php artisan key:generate
```

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`DB_PORT`=3306

`DB_DATABASE`=test_task (You Must create DB with this name)

`DB_USERNAME`=root

`DB_PASSWORD`=password

## Migration Database

```bash
  php artisan migrate:fresh --seed
```

## running server

```bash
  php artisan serve
```

