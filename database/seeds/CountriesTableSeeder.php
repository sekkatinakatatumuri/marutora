<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        
        $seeder_filepath = '/seeds/csv/countries_seeder.csv';
        $absolute_filepath = database_path() . $seeder_filepath;
        
        $file = new \SplFileObject($absolute_filepath);
        $file->setFlags(
            SplFileObject::READ_CSV |    # CSV 列として行を読み込みする
            SplFileObject::READ_AHEAD |  # 先読み/巻き戻しで読み出しする
            SplFileObject::SKIP_EMPTY |  # ファイルの空行を読み飛ばしする
            SplFileObject::DROP_NEW_LINE # 行末の改行を読み飛ばしする
        );
    
        $seeds = [];
        
        foreach($file as $row) {
            $seeds[] = [
                "country_name" => $row[0],
                "currency_code" => $row[1],
                "img_path" => $row[2],
                "created_at" => $now,
                "updated_at" => $now,
            ];
        }
        
        DB::table("countries")->insert($seeds);
    }
}
