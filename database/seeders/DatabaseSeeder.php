<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Career;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Faculty::factory(3)->create();
        Career::factory(10)->create();
        Subject::factory(30)->create();
    }
}
