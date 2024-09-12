# inventory_app
Aplicación de prueba de inventarios


Requerimientos
PHP: ^8.2.23
Composer: ^2.7.9
Docker desktop: (opcional, si no cuentas con ello, puedes optar por levantar los servicios de laravel con php)

Instalación
WINDOWS (PHP)

Verificar instalación de PHP 8 en tu S.O y Composer
Asegurarse de habilitar las extensiones correspondientes, en el php.ini descomentar los siguientes apartados:
extension=openssl
extension=fileinfo
extension=gd
extension=gettext
extension=curl;

Tomando en cuenta que partimos desde este punto desde la raíz del proyecto:

Ejecutar: composer install
Ejecutar: php artisan migrate
Ejecutar: php artisan key:generate
Verificar en el .env DB_HOST
Verificar en el .env DB_DATABASE
Verificar en el .env DB_USER
Verificar en el .env DB_PASSWORD
Ejecutar: php artisan serve
Ejecutar: php artisan db:seed (opcional)
Ejecutar: npm run dev


WINDOWS (Docker) <Recomendado>
Tomando en cuenta que partimos desde este punto desde la raíz del proyecto:

Ejecutar: composer install
Ejecutar: bash en la raiz del proyecto
Ejecutar: sudo mkdir /mnt/c
Ejecutar: sudo mount -t drvfs <your_letter_drive:>/location/inventory_app /mnt/c/inventory_app
Ejecutar: exit 
Ejecutar: bash
Ejecutar: ./vendor/bin/sail up -d
Ejecutar: ./vendor/bin/sail artisan migrate
Ejecutar: ./vendor/bin/sail artisan serve
Verificar en el .env que tu DB_HOST sea host.docker.internal
Ejecutar: ./vendor/bin/sail artisan db:seed (opcional)
Ejecutar: exit
Ejecutar: npm run dev
