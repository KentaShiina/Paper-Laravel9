<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PapersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('papers')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		        'name'=> 'ron1',
		        'author'=> 'aa',
		        'category'=> '1',
		        'shosai'=> 'sam1。',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		        'name'=> 'ron2',
		        'author'=> 'aa',
		        'category'=> '1',
		        'shosai'=> 'sam2。',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		        'name'=> 'ron3',
		        'author'=> 'a',
		        'category'=> '1',
		        'shosai'=> 'sannpuru3。',
            ],
        ]);
    }
}
