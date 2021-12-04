Installation Steps

1. Clone or download zip of repository
2. Switch to working directory e.g techngl_test
3. Run command in working directory: 
    composer update
4. Create a database with any same e.g techngl_tes
    Provide same DB name in .env file along with DB creds
5. Run command: 
    php artisan migrate
6. Now use this command to seed contry table - insert all countries list :
    php artisan db:seed --class=CountrySeeder

Setup is done
