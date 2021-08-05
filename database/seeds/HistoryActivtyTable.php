<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HistoryActivtyTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('history_activity')->insert([
            'activity'      => 'Message',
            'id_transaksi'   => 5,
            'parent_url'      => '/detail',
            'detail'      => 'Foot Refleksi',
            'uid'      => '12',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
