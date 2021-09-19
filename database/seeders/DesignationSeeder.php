<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            'name' => 'Developer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('designations')->insert([
            'name' => 'HR',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('designations')->insert([
            'name' => 'Designer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Designation::factory()->count(10)->create();
    }
}
