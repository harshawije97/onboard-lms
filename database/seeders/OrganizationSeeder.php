<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('organizations')->insert([
            [
                'id' => 'f57620a1-7881-43a2-b37a-fa0e3baee1bf',
                'name' => 'Achme.ltd',
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultricies, nisi sit amet facilisis gravida, leo mi efficitur nulla, sit amet facilisis ipsum eros sodales.',
                'description' => 'consectetur adipiscing elit. Quisque scelerisque vestibulum justo at elementum. Sed finibus neque dapibus elit dictum bibendum. Phasellus sit amet diam sed felis viverra aliquam vitae nec nisl. Sed ac odio a lacus tincidunt fringilla pulvinar eget tortor. Nullam condimentum feugiat luctus. Nam ac libero accumsan.',
                'no_of_users' => 0,
                'no_of_admins' => 0
            ],
            [
                'id' => 'a0d26ba3-2776-4135-b88a-66dea0c44426',
                'name' => 'Epitiya plantations',
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultricies, nisi sit amet facilisis gravida, leo mi efficitur nulla, sit amet facilisis ipsum eros sodales.',
                'description' => 'consectetur adipiscing elit. Quisque scelerisque vestibulum justo at elementum. Sed finibus neque dapibus elit dictum bibendum. Phasellus sit amet diam sed felis viverra aliquam vitae nec nisl. Sed ac odio a lacus tincidunt fringilla pulvinar eget tortor. Nullam condimentum feugiat luctus. Nam ac libero accumsan.',
                'no_of_users' => 1,
                'no_of_admins' => 2
            ]
        ]);
    }
}
