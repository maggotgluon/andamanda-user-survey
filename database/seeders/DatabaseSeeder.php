<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'ruttaphong',
            'email' => 'ruttaphong.w@vananava.com',
            'password'=> Hash::make('gto3000gt')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'admd admin',
            'email' => 'itsupport@andamandaphuket.com',
            'password'=> Hash::make('password')
        ]);

        \App\Models\Question::factory()->create([
            'Question' => 'How do you like our park',
            'status' => true,
        ]);
        \App\Models\Question::factory()->create([
            'Question' => 'TEST-How do you like our park',
            'status' => false,
        ]);
    }
}
