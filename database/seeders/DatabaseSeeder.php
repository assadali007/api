<?php

namespace Database\Seeders;

use App\Models\Poll;
use App\Models\User;
use App\Models\Answer;
use App\Models\Author;
use App\Models\Petition;
use App\Models\Question;
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
        User::factory(5)->create();
        Petition::factory(50)->create();
        Author::factory(10)->create();
        Poll::factory(10)->create();
        Question::factory(50)->create();
        Answer::factory(500)->create();



    }
}
