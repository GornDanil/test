<?php

namespace Database\Seeders;

use App\Domain\Enums\Pastes\AccessSlug;
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
        foreach (AccessSlug::all() as $value) {
            DB::table('access')->updateOrInsert(['slug' => $value]);
        }


    }
}
