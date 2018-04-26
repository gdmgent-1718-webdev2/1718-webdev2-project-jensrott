Web Development II 2017-2018
============================

Student: Jens Rottiers

> Artevelde University College Ghent

Productiedossier
----------------

### Installatie Backoffice
```
PS> git clone https://github.com/gdmgent-1718-webdev2/1718-webdev2-project-jensrott.git 
PS> cd files->backoffice->app
PS> composer install
PS> npm install or yarn install
```
#### Important step!
``` 
Add your own DB_DATABASE , DB_USERNAME, DB_PASSWORD to .env.example and rename it to .env
Generate an APP_KEY -> php artisan key:generate
Create the tables and seed them with data -> php artisan migrate --seed
Start the development server -> php artisan serve
```
### Installatie Frontoffice
```
PS> git clone https://github.com/gdmgent-1718-webdev2/1718-webdev2-project-jensrott.git 
PS> cd files->frontoffice->cycling
PS> npm install or yarn install
PS> ng serve
```

### Jekyll-configuratie
```
In `_config.yml` pas je de `baseurl` aan, van:

baseurl: /1718-webdev2-project # the subpath of your site, e.g. /blog
naar `1718-webdev2-project-jensrott` (bv. `1718-webdev2-project-olivpa`):
```

### GitHub Pages Configuratie
```
Op GitHub ga je naar je repository en klik op **Settings**. Scroll naar beneden tot aan **GitHub Pages**, zet de **Source** op `master branch /docs folder` en klik op **Save** om te bewaren.
```

### Voorbeeldsite
```
 - Basissjabloon <https://gdmgent-1718-webdev2.github.io/1718-webdev2-project>
 - Persoonlijke repo van Olivier Parent <https://gdmgent-1718-webdev2.github.io/1718-webdev2-project-olivpa>
```