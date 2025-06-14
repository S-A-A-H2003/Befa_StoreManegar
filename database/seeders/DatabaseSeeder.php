<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Product::factory(100)->create();
        // User::factory()->create([
        //     'name' => 'Saeed Alaa Abu Halima',
        //     'email' => 'Saeed1@gmail.com',
        //     'password' => '1111',
        // ]);
        Category::factory(100)->create();
        // $user = User::findOrFail('0197077a-87db-71d3-ae73-1e0b02e1fef0');
        // Auth::login($user);
    }
}
