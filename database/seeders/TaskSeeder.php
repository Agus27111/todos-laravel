<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Menambahkan data task default
         DB::table('tasks')->insert([
            ['item' => 'Task 1', 'created_at' => now(), 'updated_at' => now()],
            ['item' => 'Task 2', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
