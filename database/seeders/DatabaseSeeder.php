<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Message;
use App\Models\Testimonial;
use App\Models\Topic;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(6)->create();
       // Category::factory(4)->has(Topic::factory()->count(5))->create();
        Message::factory(10)->create();
        //Testimonial::factory(6)->create();

       /*  User::factory()->create([
            'user_name' => 'Admin',
            'first_name' => 'Admin_first_name',
            'last_name' => 'Admin_last_name',
            'email' => 'admin@topic_catalog.com',
            'password' => Hash::make('password'),
            'remember_token' => 'abcdefghij',
            'email_verified_at' => now(),
            'active' => '1'
        ]); */
    }
}
