<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();

        $users = User::all()->shuffle();

        for( $i = 0; $i < 20; $i++ ) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id,
            ]);
        }

        $employers = Employer::all();

        for( $i = 0; $i < 100; $i++ ) {
            Job::factory()->create(
                [
                    'employer_id' => $employers->random()->id,
                ]
            );
        }

        // \App\Models\User::factory(10)->create();
        // \App\Models\Job::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
