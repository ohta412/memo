<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'JavaScript',
            ],
            [
                'name' => 'PHP',
            ],
            [
                'name' => 'Vue.js',
            ],
            [
                'name' => 'WordPress',
            ],
            [
                'name' => 'Laravel',
            ]
        ]);
    }
}
