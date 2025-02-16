SRB:
Za pokretanje ove aplikacije potrebno je da izvršite sledeće komande u terminalu:

cd C:\Users\PC\Desktop\laravel_proba-master
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
I naravno, potrebno je da imate instaliran XAMPP da bi se pokrenule migracije. Ako XAMPP nije instaliran, uradite to kao prvo, a zatim sve ove korake redom.

####################################################################################

ENG:
To run this application, you need to execute the following commands in the terminal:

cd C:\Users\PC\Desktop\laravel_proba-master
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
And of course, you need to have XAMPP installed to run the migrations. If XAMPP is not installed, do that first, then follow these steps in order.
