<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb81c018b5c0418372e2d144285972d1d
{
    public static $files = array (
        '3b5531f8bb4716e1b6014ad7e734f545' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Acme\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Acme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Acme',
        ),
    );

    public static $prefixesPsr0 = array (
        'I' => 
        array (
            'Illuminate\\Support' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/support',
            ),
        ),
        'E' => 
        array (
            'Ecnet\\Shop\\' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static $classMap = array (
        'Acme\\Exceptions\\PermissionException' => __DIR__ . '/../..' . '/src/Acme/Exceptions/PermissionException.php',
        'Acme\\Forms\\CameraDomainForm' => __DIR__ . '/../..' . '/src/Acme/Forms/CameraDomainForm.php',
        'Acme\\Forms\\DomainLoginForm' => __DIR__ . '/../..' . '/src/Acme/Forms/DomainLoginForm.php',
        'Acme\\Forms\\GroupForm' => __DIR__ . '/../..' . '/src/Acme/Forms/GroupForm.php',
        'Acme\\Forms\\LoginForm' => __DIR__ . '/../..' . '/src/Acme/Forms/LoginForm.php',
        'Acme\\Forms\\MenuForm' => __DIR__ . '/../..' . '/src/Acme/Forms/MenuForm.php',
        'Acme\\Forms\\MenusPackForm' => __DIR__ . '/../..' . '/src/Acme/Forms/MenusPackForm.php',
        'Acme\\Forms\\Modules\\DomainForm' => __DIR__ . '/../..' . '/src/Acme/Forms/Modules/DomainForm.php',
        'Acme\\Forms\\Modules\\ProductForm' => __DIR__ . '/../..' . '/src/Acme/Forms/Modules/ProductForm.php',
        'Acme\\Forms\\Modules\\RecordForm' => __DIR__ . '/../..' . '/src/Acme/Forms/Modules/RecordForm.php',
        'Acme\\Forms\\PageForm' => __DIR__ . '/../..' . '/src/Acme/Forms/PageForm.php',
        'Acme\\Forms\\PermissionForm' => __DIR__ . '/../..' . '/src/Acme/Forms/PermissionForm.php',
        'Acme\\Forms\\PropertyForm' => __DIR__ . '/../..' . '/src/Acme/Forms/PropertyForm.php',
        'Acme\\Forms\\RegistrationForm' => __DIR__ . '/../..' . '/src/Acme/Forms/RegistrationForm.php',
        'Acme\\Forms\\Shop\\CategoryForm' => __DIR__ . '/../..' . '/src/Acme/Forms/Shop/CategoryForm.php',
        'Acme\\Forms\\UserForm' => __DIR__ . '/../..' . '/src/Acme/Forms/UserForm.php',
        'Acme\\Forms\\profileForm' => __DIR__ . '/../..' . '/src/Acme/Forms/profileForm.php',
        'AdminPagesController' => __DIR__ . '/../..' . '/src/controllers/admin/AdminPagesController.php',
        'CreateAttributesTable' => __DIR__ . '/../..' . '/src/migrations/2014_12_03_102414_create_attributes_table.php',
        'CreatePageAttributeTable' => __DIR__ . '/../..' . '/src/migrations/2014_12_03_102742_create_page_attribute_table.php',
        'CreateProductCategoryTable' => __DIR__ . '/../..' . '/src/migrations/2014_12_03_095352_create_product_category_table.php',
        'CustomersController' => __DIR__ . '/../..' . '/src/controllers/admin/CustomersController.php',
        'Ecnet\\Shop\\ShopServiceProvider' => __DIR__ . '/../..' . '/src/Ecnet/Shop/ShopServiceProvider.php',
        'GroupsController' => __DIR__ . '/../..' . '/src/controllers/admin/GroupsController.php',
        'HomeController' => __DIR__ . '/../..' . '/src/controllers/admin/HomeController.php',
        'Illuminate\\Support\\Arr' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Arr.php',
        'Illuminate\\Support\\ClassLoader' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/ClassLoader.php',
        'Illuminate\\Support\\Collection' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Collection.php',
        'Illuminate\\Support\\Contracts\\ArrayableInterface' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Contracts/ArrayableInterface.php',
        'Illuminate\\Support\\Contracts\\JsonableInterface' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Contracts/JsonableInterface.php',
        'Illuminate\\Support\\Contracts\\MessageProviderInterface' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Contracts/MessageProviderInterface.php',
        'Illuminate\\Support\\Contracts\\RenderableInterface' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Contracts/RenderableInterface.php',
        'Illuminate\\Support\\Contracts\\ResponsePreparerInterface' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Contracts/ResponsePreparerInterface.php',
        'Illuminate\\Support\\Facades\\App' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/App.php',
        'Illuminate\\Support\\Facades\\Artisan' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Artisan.php',
        'Illuminate\\Support\\Facades\\Auth' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Auth.php',
        'Illuminate\\Support\\Facades\\Blade' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Blade.php',
        'Illuminate\\Support\\Facades\\Cache' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Cache.php',
        'Illuminate\\Support\\Facades\\Config' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Config.php',
        'Illuminate\\Support\\Facades\\Cookie' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Cookie.php',
        'Illuminate\\Support\\Facades\\Crypt' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Crypt.php',
        'Illuminate\\Support\\Facades\\DB' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/DB.php',
        'Illuminate\\Support\\Facades\\Event' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Event.php',
        'Illuminate\\Support\\Facades\\Facade' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Facade.php',
        'Illuminate\\Support\\Facades\\File' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/File.php',
        'Illuminate\\Support\\Facades\\Form' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Form.php',
        'Illuminate\\Support\\Facades\\HTML' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/HTML.php',
        'Illuminate\\Support\\Facades\\Hash' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Hash.php',
        'Illuminate\\Support\\Facades\\Input' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Input.php',
        'Illuminate\\Support\\Facades\\Lang' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Lang.php',
        'Illuminate\\Support\\Facades\\Log' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Log.php',
        'Illuminate\\Support\\Facades\\Mail' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Mail.php',
        'Illuminate\\Support\\Facades\\Paginator' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Paginator.php',
        'Illuminate\\Support\\Facades\\Password' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Password.php',
        'Illuminate\\Support\\Facades\\Queue' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Queue.php',
        'Illuminate\\Support\\Facades\\Redirect' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Redirect.php',
        'Illuminate\\Support\\Facades\\Redis' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Redis.php',
        'Illuminate\\Support\\Facades\\Request' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Request.php',
        'Illuminate\\Support\\Facades\\Response' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Response.php',
        'Illuminate\\Support\\Facades\\Route' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Route.php',
        'Illuminate\\Support\\Facades\\SSH' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/SSH.php',
        'Illuminate\\Support\\Facades\\Schema' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Schema.php',
        'Illuminate\\Support\\Facades\\Session' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Session.php',
        'Illuminate\\Support\\Facades\\URL' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/URL.php',
        'Illuminate\\Support\\Facades\\Validator' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/Validator.php',
        'Illuminate\\Support\\Facades\\View' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Facades/View.php',
        'Illuminate\\Support\\Fluent' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Fluent.php',
        'Illuminate\\Support\\Manager' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Manager.php',
        'Illuminate\\Support\\MessageBag' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/MessageBag.php',
        'Illuminate\\Support\\NamespacedItemResolver' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/NamespacedItemResolver.php',
        'Illuminate\\Support\\Pluralizer' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Pluralizer.php',
        'Illuminate\\Support\\SerializableClosure' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/SerializableClosure.php',
        'Illuminate\\Support\\ServiceProvider' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/ServiceProvider.php',
        'Illuminate\\Support\\Str' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Str.php',
        'Illuminate\\Support\\Traits\\CapsuleManagerTrait' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Traits/CapsuleManagerTrait.php',
        'Illuminate\\Support\\Traits\\MacroableTrait' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/Traits/MacroableTrait.php',
        'Illuminate\\Support\\ViewErrorBag' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/ViewErrorBag.php',
        'PermissionsController' => __DIR__ . '/../..' . '/src/controllers/admin/PermissionsController.php',
        'ProfilesController' => __DIR__ . '/../..' . '/src/controllers/admin/ProfilesController.php',
        'RegistrationController' => __DIR__ . '/../..' . '/src/controllers/admin/RegistrationController.php',
        'SessionsController' => __DIR__ . '/../..' . '/src/controllers/admin/SessionsController.php',
        'admin\\DomainsController' => __DIR__ . '/../..' . '/src/controllers/admin/DomainsController.php',
        'admin\\PagesController' => __DIR__ . '/../..' . '/src/controllers/admin/PagesController.php',
        'shop\\Category' => __DIR__ . '/../..' . '/src/models/Category.php',
        'shop\\CategoryProduct' => __DIR__ . '/../..' . '/src/models/CategoryProduct.php',
        'shop\\Product' => __DIR__ . '/../..' . '/src/models/Product.php',
        'shop\\admin\\AdminController' => __DIR__ . '/../..' . '/src/controllers/admin/AdminController.php',
        'shop\\admin\\CategoriesController' => __DIR__ . '/../..' . '/src/controllers/admin/CategoriesController.php',
        'shop\\admin\\ProductsController' => __DIR__ . '/../..' . '/src/controllers/admin/ProductsController.php',
        'shop\\admin\\ShopController' => __DIR__ . '/../..' . '/src/controllers/admin/ShopController.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb81c018b5c0418372e2d144285972d1d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb81c018b5c0418372e2d144285972d1d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb81c018b5c0418372e2d144285972d1d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitb81c018b5c0418372e2d144285972d1d::$classMap;

        }, null, ClassLoader::class);
    }
}