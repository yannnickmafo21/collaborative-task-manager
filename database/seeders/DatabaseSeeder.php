<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Yannick',
            'surname' => 'Mafo',
            'email' => 'yannickmafo21@gmail.com',
            'password' => Hash::make('123456'),
            'profil' => 'https://res.cloudinary.com/dn0419glk/image/upload/v1774606254/profils/uaw6gdpbgw6a7jg8jeui.jpg',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'menounga',
            'surname' => 'Clara',
            'email' => 'claramenounga631@gmail.com',
            'password' => Hash::make('123456'),
            'profil' => 'https://res.cloudinary.com/dn0419glk/image/upload/v1774601829/profils/n300dnviu0akmxnyf7hp.jpg',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Regine',
            'surname' => 'Memong',
            'email' => 'reginememong5@gmail.com',
            'password' => Hash::make('123456'),
            'profil' => 'https://res.cloudinary.com/dn0419glk/image/upload/v1774602286/profils/yxypate0xceublheubki.jpg',
        ]);
    }
}
