SRB:
Za pokretanje ove aplikacije potrebno je da izvršite sledeće komande u terminalu:

1. cd C:\Users\PC\Desktop\laravel_bazzar-master
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. u .env fajlu stavite da vam stoji DB_CONNECTION=mysql
6. zatim u .env fajlu odtagujte sledece stavke:
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=bazzar
    DB_USERNAME=root
    DB_PASSWORD=
7. php artisan migrate
8. php artisan db:seed
9. php artisan storage:link
10. php artisan serve
11. I naravno, potrebno je da imate instaliran XAMPP da bi se pokrenule migracije. Ako XAMPP nije instaliran, uradite to kao prvo, a zatim sve ove korake redom.

####################################################################################

ENG:
To run this application, you need to execute the following commands in the terminal:

1. cd C:\Users\PC\Desktop\laravel_bazzar-master
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. In the .env file, make sure you set DB_CONNECTION=mysql
6. Then, uncomment and set the following values in the .env file:
    DB_HOST=127.0.0.1  
    DB_PORT=3306  
    DB_DATABASE=bazzar  
    DB_USERNAME=root  
    DB_PASSWORD=  
8. php artisan migrate
9. php artisan db:seed
10. php artisan storage:link
11. php artisan serve
12. And of course, you need to have XAMPP installed to run the migrations. If XAMPP is not installed, do that first, then follow these steps in order.
