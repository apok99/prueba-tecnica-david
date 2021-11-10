Para iniciar el proyecto:

    docker-compose up --build

    Si da fallo por la carpeta vendor ya que en GIT no estan las dependencias, las necesita y como comentan en la documentacion oficial de laravel.
        docker run --rm -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer install
        docker run --rm -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer update
        https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects
    
    php artisan migrate en la consola para poder insertar las tablas a la base de datos.

    Configurar .env, ejemplo .env copy
