# Soapbox challenge
Create a small blog application with Laravel. You are free to interpret this as you wish in functionality and style. Surprise us!**

## Challenge 
- Post overview with pagination
- Submit form
- Factories/Seeders/Tests
- Responsivene

### Bonus

- Use Laravel Sail (docker)
- Use media model
- Use tiptap as editor
- Use AlpineJS
- Use GIT
- search/filter/order functionality

### Tips

- Use Laravel
- Use Livewire
- Use Tailwind/bootstrap




# Getting started

This repository is a Laravel project created for a assessment. It's been setup using:
- Laravel
- Laravel Sail
- Livewire
- AplineJS

## Installation & usage
This project is built on top of Laravel Sail. So make sure that you have Docker installed. 

Clone the repo to a local folder
```
git clone ... 
```

copy and rename the .env.example file
```
cp .env.example .env
```

Install the project through Sail
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

(or change the php version if necessary).

Run docker
```
sail up
```

Install npm 
```
sail npm install && sail npm run dev
```

Run the migration (default)
```
sail php artisan migrate:fresh --seed
```

Link storage
```
sail php artisan storage:link
```
