<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 未回答の問い合わせ
        Question::factory(10)->create();

        // ユーザ(回答者5人が10件の問い合わせに対応)
        User::factory(5)->has(Answer::factory()->count(10))->create();

        // テストユーザ
        User::create([
            'name' => 'test-user',
            'email' => 'test_user@gmail.com',
            'email_verified_at' => now(),
            'password' => 'test_user',
            'remember_token' => Str::random(10),
        ]);
    }
}
