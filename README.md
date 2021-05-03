# laravel-E-Commerce
E-Shop E-Commerce System with Laravel 8 + VueJS + Fortify

# Setup

## Docker Desktop
-  First download dockerhub desktop from https://docs.docker.com/get-docker/ depend on your laptop or pc. Window, Mac, Linux.
-  Create Account at dockerhub
-  After install docker desktop and login with your account (https://docs.docker.com/docker-for-windows/install/)
-  If interest , keep digging more. There was a lot of knowledge for infrastructure (kubernetes) (docker-swarm)

## Host Setup with https certificate
https://laravel.com/docs/8.x/valet
   ```console
   composer global require laravel/valet
   valet install
   ```

## Local Dev Setup
- clone repo from Github

```console
git clone https://github.com/MgHtinLynn/laravel-e-commerce.git
cd laravel-e-commerce
```

Link valet certificate with nginx proxy
```console
ln -s /Users/htinlynn/.config/valet/Certificates {dir of repo clone}/data/
ln -s /Users/htinlynn/.config/valet/Certificates /Users/htinlynn/Code/htinlynn/laravel-e-commerce/data/
```

Link Valet With Https URL
```console
valet secure {host-name}
```

For Example
```console
valet secure e-commerce-shop 
```

That will generate https certificate for your repo

We have to disable nginx port 80 in PC or Laptop


```console
valet stop
```


For Server Up
```console
docker-compose up -d
```

For Sever Down
```console
docker-compose down
```

!!BOOM!!

You can call your host name to web-browser

In my mac
https://e-commerce-shop.test/

if different dir. need to edit docker-compose file.


For Migration 
```console
cp .env.example .env
docker-exec -it app bash
php artisan migrate --seed
```

Enjoy your setup.

# REMEMBER 
## I developed this repo within two days only.

If any problem , open the issue.

Htin Lynn,
htinlin01@gmail.com,
09785360975 


