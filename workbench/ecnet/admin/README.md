ecnet-admin
===========

#Package admin cms của Ecnet

#Cài đặt  Composer 

require : "ecnet/admin": "dev-master" 

#Thêm Provider 

'Ecnet\Admin\AdminServiceProvider'

#Thêm Alias

'Sentry' => 'Cartalyst\Sentry\Facades\Laravel\Sentry',

#Cập nhật asset 
php artisan asset:publish ecnet/admin
# Custom Config
php artisan config:publish ecnet/admin

#Miragte
php artisan migrate --package=ecnet/admin
php artisan migrate --package=cartalyst/sentry

