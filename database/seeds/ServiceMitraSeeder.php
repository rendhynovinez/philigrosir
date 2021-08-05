<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServiceMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_mitra')->insert([
            'type' =>  1,  //--- >Message
            'category'      => 'Message',
            'title'      => 'Foot',
            'name_service'      => 'Refleksi',
            'description'      => 'Layanan Pijat Refleksi dengan aku puntur dsbb',
            'open_service'      => 'Pukul 06.00 - 12.00 WIB',
            'reference'      => 'Cust Pria - Pria & Cust Wanita - Wanita',
            'duration'      => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
