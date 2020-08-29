<?php

use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Check if Seats Table is Empty
        if (DB::table('seats')->get()->count() == 0) {

            //Insert Default Seats
            DB::table('seats')->insert([
                [
                    'id' => 1,
                    'screen_id' => 1,
                    'seat_name' => 'Seat A',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 2,
                    'screen_id' => 1,
                    'seat_name' => 'Seat B',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 3,
                    'screen_id' => 1,
                    'seat_name' => 'Seat C',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 4,
                    'screen_id' => 1,
                    'seat_name' => 'Seat D',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 5,
                    'screen_id' => 1,
                    'seat_name' => 'Seat E',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 6,
                    'screen_id' => 1,
                    'seat_name' => 'Seat F',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 7,
                    'screen_id' => 1,
                    'seat_name' => 'Seat G',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 8,
                    'screen_id' => 1,
                    'seat_name' => 'Seat H',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 9,
                    'screen_id' => 1,
                    'seat_name' => 'Seat I',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 10,
                    'screen_id' => 1,
                    'seat_name' => 'Seat J',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}