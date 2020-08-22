<?php

use Illuminate\Database\Seeder;

class LangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('langs')->insert(
          [
          [
            'lang' => '0',
          ],
          [
            'lang' => '1',
          ],
          [
            'lang' => '2',
          ],
          [
            'lang' => '3',
          ],
          [
            'lang' => '4',
          ],
          [
            'lang' => '5',
          ],
        ]
        );
    }
}
