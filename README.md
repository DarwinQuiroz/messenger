# Laravel Messenger
Creado con Laravel 5.7, VueJS & Bootstrap-Vue.

## Requerimientos
https://laravel.com/docs/5.7#server-requirements

## Instalación
Clonar Repo

```
git clone https://github.com/DarwinQuiroz/messenger.git
```

Entrar a la carpeta que contiene el proyecto
```
cd messenger
```

Instalar dependencias
```
composer install
npm install
```

## Configuración

Generar archivo .env
```
cp .env.example .env
```

Generar APP_KEY
```
php artisan key:generate
```

Base de Datos

```
# Crear Base de Datos
mysql -u{user} -p{password}
mysql> create database messenger;
```

```
# Agregar los siguientes parametros en el archivo .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=messenger
DB_USERNAME=root
DB_PASSWORD=password
```


## Ejecutar

```
# Migraciones
php artisan migrate

# Seeder (opcional)
php artisan db:seed

# Compilar assets
npm run dev

# Correr serve
php artisan serve
```

---

> Developed with :bulb: :headphones: :beer: by [@DarwinQuiroz](https://github.com/DarwinQuiroz)
