<?php

namespace App\Library;

use Illuminate\Http\Request;
use \SplFileObject;

class Csv
{
    // ファイルパス
    private  $absolute_filepath;

    // コンストラクタ
    public function __construct($seed_csv_filepath){
        $this->absolute_filepath = database_path() . $seed_csv_filepath;
    }
    
    // csvファイルからシードを作成
    public function produceSeeds() {
        $file = new SplFileObject($this->absolute_filepath);
        $file->setFlags(
            SplFileObject::READ_CSV |    # CSV 列として行を読み込みする
            SplFileObject::READ_AHEAD |  # 先読み/巻き戻しで読み出しする
            SplFileObject::SKIP_EMPTY |  # ファイルの空行を読み飛ばしする
            SplFileObject::DROP_NEW_LINE # 行末の改行を読み飛ばしする
        );
    
        $seeds = [];
        foreach($file as $row) {
            $seeds[] = $row;
        }
        
        return($seeds);
    }
}