Installation Steps

1. Clone or download zip of repository
2. Switch to working directory e.g techngl_test
3. Run below command in working directory

    composer update
    
    php artisan key:generate

4. Create a database with any same e.g techngl_test

    rename .env.example file to .env

    Provide same DB name (techngl_test) in .env file along with DB creds

    DB_DATABASE=techngl_test

5. Run below command

    php artisan migrate

6. Now use belwo command to seed contry table - insert all countries list

    php artisan db:seed --class=CountrySeeder

Setup is done
