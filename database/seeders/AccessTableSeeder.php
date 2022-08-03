<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('access')->insert([
            ['slug' => 'public'],
            ['slug' => 'unlisted'],
            ['slug' => 'private']
        ]);
    }
}
