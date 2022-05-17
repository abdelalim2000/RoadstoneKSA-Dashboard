<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'car_section_access',
            ],
            [
                'id'    => 18,
                'title' => 'car_type_create',
            ],
            [
                'id'    => 19,
                'title' => 'car_type_edit',
            ],
            [
                'id'    => 20,
                'title' => 'car_type_show',
            ],
            [
                'id'    => 21,
                'title' => 'car_type_delete',
            ],
            [
                'id'    => 22,
                'title' => 'car_type_access',
            ],
            [
                'id'    => 23,
                'title' => 'maker_create',
            ],
            [
                'id'    => 24,
                'title' => 'maker_edit',
            ],
            [
                'id'    => 25,
                'title' => 'maker_show',
            ],
            [
                'id'    => 26,
                'title' => 'maker_delete',
            ],
            [
                'id'    => 27,
                'title' => 'maker_access',
            ],
            [
                'id'    => 28,
                'title' => 'car_model_create',
            ],
            [
                'id'    => 29,
                'title' => 'car_model_edit',
            ],
            [
                'id'    => 30,
                'title' => 'car_model_show',
            ],
            [
                'id'    => 31,
                'title' => 'car_model_delete',
            ],
            [
                'id'    => 32,
                'title' => 'car_model_access',
            ],
            [
                'id'    => 33,
                'title' => 'tire_section_access',
            ],
            [
                'id'    => 34,
                'title' => 'tire_feature_create',
            ],
            [
                'id'    => 35,
                'title' => 'tire_feature_edit',
            ],
            [
                'id'    => 36,
                'title' => 'tire_feature_show',
            ],
            [
                'id'    => 37,
                'title' => 'tire_feature_delete',
            ],
            [
                'id'    => 38,
                'title' => 'tire_feature_access',
            ],
            [
                'id'    => 39,
                'title' => 'tire_design_create',
            ],
            [
                'id'    => 40,
                'title' => 'tire_design_edit',
            ],
            [
                'id'    => 41,
                'title' => 'tire_design_show',
            ],
            [
                'id'    => 42,
                'title' => 'tire_design_delete',
            ],
            [
                'id'    => 43,
                'title' => 'tire_design_access',
            ],
            [
                'id'    => 44,
                'title' => 'tire_size_create',
            ],
            [
                'id'    => 45,
                'title' => 'tire_size_edit',
            ],
            [
                'id'    => 46,
                'title' => 'tire_size_show',
            ],
            [
                'id'    => 47,
                'title' => 'tire_size_delete',
            ],
            [
                'id'    => 48,
                'title' => 'tire_size_access',
            ],
            [
                'id'    => 49,
                'title' => 'tire_create',
            ],
            [
                'id'    => 50,
                'title' => 'tire_edit',
            ],
            [
                'id'    => 51,
                'title' => 'tire_show',
            ],
            [
                'id'    => 52,
                'title' => 'tire_delete',
            ],
            [
                'id'    => 53,
                'title' => 'tire_access',
            ],
            [
                'id'    => 54,
                'title' => 'article_create',
            ],
            [
                'id'    => 55,
                'title' => 'article_edit',
            ],
            [
                'id'    => 56,
                'title' => 'article_show',
            ],
            [
                'id'    => 57,
                'title' => 'article_delete',
            ],
            [
                'id'    => 58,
                'title' => 'article_access',
            ],
            [
                'id'    => 59,
                'title' => 'distributor_access',
            ],
            [
                'id'    => 60,
                'title' => 'city_create',
            ],
            [
                'id'    => 61,
                'title' => 'city_edit',
            ],
            [
                'id'    => 62,
                'title' => 'city_show',
            ],
            [
                'id'    => 63,
                'title' => 'city_delete',
            ],
            [
                'id'    => 64,
                'title' => 'city_access',
            ],
            [
                'id'    => 65,
                'title' => 'location_create',
            ],
            [
                'id'    => 66,
                'title' => 'location_edit',
            ],
            [
                'id'    => 67,
                'title' => 'location_show',
            ],
            [
                'id'    => 68,
                'title' => 'location_delete',
            ],
            [
                'id'    => 69,
                'title' => 'location_access',
            ],
            [
                'id'    => 70,
                'title' => 'customer_service_access',
            ],
            [
                'id'    => 71,
                'title' => 'contact_create',
            ],
            [
                'id'    => 72,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 73,
                'title' => 'contact_show',
            ],
            [
                'id'    => 74,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 75,
                'title' => 'contact_access',
            ],
            [
                'id'    => 76,
                'title' => 'news_create',
            ],
            [
                'id'    => 77,
                'title' => 'news_edit',
            ],
            [
                'id'    => 78,
                'title' => 'news_show',
            ],
            [
                'id'    => 79,
                'title' => 'news_delete',
            ],
            [
                'id'    => 80,
                'title' => 'news_access',
            ],
            [
                'id'    => 81,
                'title' => 'contact_type_create',
            ],
            [
                'id'    => 82,
                'title' => 'contact_type_edit',
            ],
            [
                'id'    => 83,
                'title' => 'contact_type_show',
            ],
            [
                'id'    => 84,
                'title' => 'contact_type_delete',
            ],
            [
                'id'    => 85,
                'title' => 'contact_type_access',
            ],
            [
                'id'    => 86,
                'title' => 'site_setting_access',
            ],
            [
                'id'    => 87,
                'title' => 'site_language_create',
            ],
            [
                'id'    => 88,
                'title' => 'site_language_edit',
            ],
            [
                'id'    => 89,
                'title' => 'site_language_show',
            ],
            [
                'id'    => 90,
                'title' => 'site_language_delete',
            ],
            [
                'id'    => 91,
                'title' => 'site_language_access',
            ],
            [
                'id'    => 92,
                'title' => 'setting_create',
            ],
            [
                'id'    => 93,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 94,
                'title' => 'setting_show',
            ],
            [
                'id'    => 95,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 96,
                'title' => 'setting_access',
            ],
            [
                'id'    => 97,
                'title' => 'site_translation_create',
            ],
            [
                'id'    => 98,
                'title' => 'site_translation_edit',
            ],
            [
                'id'    => 99,
                'title' => 'site_translation_show',
            ],
            [
                'id'    => 100,
                'title' => 'site_translation_delete',
            ],
            [
                'id'    => 101,
                'title' => 'site_translation_access',
            ],
            [
                'id'    => 102,
                'title' => 'import_data_create',
            ],
            [
                'id'    => 103,
                'title' => 'import_data_edit',
            ],
            [
                'id'    => 104,
                'title' => 'import_data_show',
            ],
            [
                'id'    => 105,
                'title' => 'import_data_delete',
            ],
            [
                'id'    => 106,
                'title' => 'import_data_access',
            ],
            [
                'id'    => 107,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
