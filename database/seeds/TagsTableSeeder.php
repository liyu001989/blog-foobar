<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            '教程',
            '翻译'
        ];

        foreach($datas as $data) {
            Tag::create(['name' => $data]); 
        }
    }
}
