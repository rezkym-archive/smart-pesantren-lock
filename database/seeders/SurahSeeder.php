<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surah;

class SurahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Surah::truncate();
  
        $csvFile = fopen(base_path("database/data/surah_quran.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Surah::create([
                    "ayat_name" => $data['0'],
                    "number_of_verse" => $data['1']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
