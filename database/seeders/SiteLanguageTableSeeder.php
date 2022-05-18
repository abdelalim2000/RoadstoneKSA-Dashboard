<?php

namespace Database\Seeders;

use App\Models\SiteLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteLanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteLanguage::query()->create([
            'name' => 'English',
            'locale' => 'en'
        ]);

        SiteLanguage::query()->create([
            'name' => 'العربية',
            'locale' => 'ar'
        ]);
    }
}
