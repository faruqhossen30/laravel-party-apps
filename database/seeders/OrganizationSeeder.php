<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = [
            [
                'name' => 'Bangladesh Chhatra League',
                'bn_name' => 'বাংলাদেশ ছাত্রলীগ',
                'user_id' => 1
            ],
            [
                'name' => 'Bangladesh Awami Jubo League',
                'bn_name' => 'বাংলাদেশ যুবলীগ',
                'user_id' => 1
            ],
            [
                'name' => 'Bangladesh Mohila Awami League',
                'bn_name' => 'বাংলাদেশ মহিলা আওমীলীগ',
                'user_id' => 1
            ],
            [
                'name' => 'Bangladesh Krishak League',
                'bn_name' => 'বাংলাদেশ কৃষকলীগ',
                'user_id' => 1
            ],
            [
                'name' => 'Bangladesh Jatiya Sramik League',
                'bn_name' => 'বাংলাদেশ জাতীয় শ্রমিকলীগ',
                'user_id' => 1
            ],
            [
                'name' => 'Bangladesh Awami Swechasebak League',
                'bn_name' => 'বাংলাদেশ সেচ্ছাসেবকলীগ',
                'user_id' => 1
            ]
        ];

       Organization::insert($organizations);
    }
}
