<?php

use Illuminate\Database\Seeder;

class ScreenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Check if Screens Table is Empty
        if (DB::table('screens')->get()->count() == 0) {

            //Insert Default Screen
            DB::table('screens')->insert([
                [
                    'id' => 1,
                    'screen_name' => 'Screen One',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]);

        }
    }
}
