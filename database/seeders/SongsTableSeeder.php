<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('songs')->insert([
          'title' => 'song1',
          'singer' => 'artist1',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
      ]);
      DB::table('songs')->insert([
            'title' => 'song2',
            'singer' => 'artist2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('songs')->insert([
              'title' => 'song3',
              'singer' => 'artist3',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
          ]);
          DB::table('songs')->insert([
                'title' => 'song4',
                'singer' => 'artist4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            DB::table('songs')->insert([
                  'title' => 'song5',
                  'singer' => 'artist5',
                  'created_at' => Carbon::now(),
                  'updated_at' => Carbon::now()
              ]);
    }
}
