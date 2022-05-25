<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/home', function () {
        if (session('status')) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('admin.home');
    });

    Auth::routes(['register' => false]);

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
        Route::get('/', 'HomeController@index')->name('home');
        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::resource('users', 'UsersController');

        // Car Type
        Route::delete('car-types/destroy', 'CarTypeController@massDestroy')->name('car-types.massDestroy');
        Route::post('car-types/media', 'CarTypeController@storeMedia')->name('car-types.storeMedia');
        Route::post('car-types/ckmedia', 'CarTypeController@storeCKEditorImages')->name('car-types.storeCKEditorImages');
        Route::resource('car-types', 'CarTypeController');

        // Maker
        Route::delete('makers/destroy', 'MakerController@massDestroy')->name('makers.massDestroy');
        Route::post('makers/media', 'MakerController@storeMedia')->name('makers.storeMedia');
        Route::post('makers/ckmedia', 'MakerController@storeCKEditorImages')->name('makers.storeCKEditorImages');
        Route::resource('makers', 'MakerController');

        // Car Model
        Route::delete('car-models/destroy', 'CarModelController@massDestroy')->name('car-models.massDestroy');
        Route::resource('car-models', 'CarModelController');

        // Tire Feature
        Route::delete('tire-features/destroy', 'TireFeatureController@massDestroy')->name('tire-features.massDestroy');
        Route::post('tire-features/media', 'TireFeatureController@storeMedia')->name('tire-features.storeMedia');
        Route::post('tire-features/ckmedia', 'TireFeatureController@storeCKEditorImages')->name('tire-features.storeCKEditorImages');
        Route::resource('tire-features', 'TireFeatureController');

        // Tire Design
        Route::delete('tire-designs/destroy', 'TireDesignController@massDestroy')->name('tire-designs.massDestroy');
        Route::post('tire-designs/media', 'TireDesignController@storeMedia')->name('tire-designs.storeMedia');
        Route::post('tire-designs/ckmedia', 'TireDesignController@storeCKEditorImages')->name('tire-designs.storeCKEditorImages');
        Route::resource('tire-designs', 'TireDesignController');

        // Tire Size
        Route::delete('tire-sizes/destroy', 'TireSizeController@massDestroy')->name('tire-sizes.massDestroy');
        Route::resource('tire-sizes', 'TireSizeController');

        // Tire
        Route::delete('tires/destroy', 'TireController@massDestroy')->name('tires.massDestroy');
        Route::post('tires/media', 'TireController@storeMedia')->name('tires.storeMedia');
        Route::post('tires/ckmedia', 'TireController@storeCKEditorImages')->name('tires.storeCKEditorImages');
        Route::resource('tires', 'TireController');

        // Article
        Route::delete('articles/destroy', 'ArticleController@massDestroy')->name('articles.massDestroy');
        Route::post('articles/media', 'ArticleController@storeMedia')->name('articles.storeMedia');
        Route::post('articles/ckmedia', 'ArticleController@storeCKEditorImages')->name('articles.storeCKEditorImages');
        Route::resource('articles', 'ArticleController');

        // City
        Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
        Route::post('cities/media', 'CityController@storeMedia')->name('cities.storeMedia');
        Route::post('cities/ckmedia', 'CityController@storeCKEditorImages')->name('cities.storeCKEditorImages');
        Route::resource('cities', 'CityController');

        // Location
        Route::delete('locations/destroy', 'LocationController@massDestroy')->name('locations.massDestroy');
        Route::post('locations/media', 'LocationController@storeMedia')->name('locations.storeMedia');
        Route::post('locations/ckmedia', 'LocationController@storeCKEditorImages')->name('locations.storeCKEditorImages');
        Route::resource('locations', 'LocationController');

        // Contact
        Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
        Route::resource('contacts', 'ContactController');

        // News
        Route::delete('newss/destroy', 'NewsController@massDestroy')->name('newss.massDestroy');
        Route::resource('newss', 'NewsController');

        // Contact Type
        Route::delete('contact-types/destroy', 'ContactTypeController@massDestroy')->name('contact-types.massDestroy');
        Route::resource('contact-types', 'ContactTypeController');

        // Site Language
        Route::delete('site-languages/destroy', 'SiteLanguageController@massDestroy')->name('site-languages.massDestroy');
        Route::resource('site-languages', 'SiteLanguageController');

        // Setting
        Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
        Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
        Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
        Route::resource('settings', 'SettingController');

        // Site Translation
        Route::delete('site-translations/destroy', 'SiteTranslationController@massDestroy')->name('site-translations.massDestroy');
        Route::resource('site-translations', 'SiteTranslationController');

        // Import Data
//        Route::delete('import-datas/destroy', 'ImportDataController@massDestroy')->name('import-datas.massDestroy');
        Route::resource('import-datas', 'ImportDataController')->only(['index']);
        Route::post('import-datas/car-type/import', 'ImportDataController@carTypeImport')->name('import-datas.car-type-import');
        Route::post('import-datas/maker/import', 'ImportDataController@makerImport')->name('import-datas.maker-import');
        Route::post('import-datas/car-model/import', 'ImportDataController@carModelImport')->name('import-datas.car-model-import');
        Route::post('import-datas/tire-feature/import', 'ImportDataController@tireFeatureImport')->name('import-datas.tire-feature-import');
        Route::post('import-datas/tire-design/import', 'ImportDataController@tireDesignImport')->name('import-datas.tire-design-import');
        Route::post('import-datas/tire/import', 'ImportDataController@tireImport')->name('import-datas.tires-import');
        Route::post('import-datas/tire-size/import', 'ImportDataController@tireSizeImport')->name('import-datas.tire-sizes-import');
    });
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
        // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
            Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
            Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        }
    });


});
