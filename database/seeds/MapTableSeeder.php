<?php

use Illuminate\Database\Seeder;

class MapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('maps')->insert([
          [
            'map_title' => 'ハルカス',
            'data' => '2020/08/09',
            'body' => '今日食べたご飯はこちら。',
            'image' => 'sample.png',
            'user_id' => 1,
          ],
          [
            'map_title' => '鶴橋　焼肉',
            'data' => '2020/08/01',
            'body' => '今日食べたご飯はこちら。',
            'image' => 'sample.png',
            'user_id' => 2,
          ],
          [
            'map_title' => '鶴橋　餃子',
            'data' => '2020/08/02',
            'body' => '今日食べたご飯はこちら。',
            'image' => 'sample.png',
            'user_id' => 3,
          ],
        ]);
    }
}
