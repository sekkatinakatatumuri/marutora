<?php

use Illuminate\Database\Seeder;
use App\Library\Csv;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_csv_filepath = '/seeds/csv/oceania_seeder.csv';
        $csv = new Csv($seed_csv_filepath);
        $seeds = $csv->produceSeeds();
        DB::table("cities")->insert($seeds);
    }
}

