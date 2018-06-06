---
layout   : default
permalink: deliver/handleiding/backoffice/
# Custom Page Variables
# ─────────────────────
title: Backoffice
---
## Installation 
PS> git clone https://github.com/gdmgent-1718-webdev2/1718-webdev2-project-jensrott.git 
PS> cd files->backoffice->app 
PS> composer install 
PS> npm install or yarn install 

## Configure database 
Add your own DB_DATABASE , DB_USERNAME, DB_PASSWORD to .env.example and rename it to .env 
Generate an APP_KEY -> php artisan key:generate 
Create the tables and seed them with data -> php artisan migrate --seed 
Start the development server -> php artisan serve 
