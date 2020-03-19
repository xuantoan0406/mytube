<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\SvModel::class, 50)->create();
        DB::table('Sv')->insert([
            'name' => 'húc',
            'lop' => '3'
        ]);
    }
}
