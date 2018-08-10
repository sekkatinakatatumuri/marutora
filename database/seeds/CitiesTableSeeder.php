<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'city_code' => '2643741',
                'currency_code' => 'GBP',
                'country_name' => 'イギリス',
                'city_name' => 'ロンドン',
                'img_path' => '/images/flag/flag197.png'
            ],
            [
                'city_code' => '3169070',
                'currency_code' => 'EUR',
                'country_name' => 'イタリア',
                'city_name' => 'ローマ',
                'img_path' => '/images/flag/flag091.png'
            ],
        ]);
    }
}