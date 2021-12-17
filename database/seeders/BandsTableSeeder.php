<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('bands')->insert([
          'name' => 'band1',
          'genre' => 'genre1',
          'founded' => '2021',
          'active_til' => '2020',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
      ]);
      DB::table('bands')->insert([
          'name' => 'band2',
          'genre' => 'genre2',
          'founded' => '2021',
          'active_til' => '2020',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
      ]);
      DB::table('bands')->insert([
          'name' => 'band3',
          'genre' => 'genre3',
          'founded' => '2021',
          'active_til' => '2020',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
      ]);
    }
}
