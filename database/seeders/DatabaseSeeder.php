<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PerusahaanModel;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        for ($i=0; $i < 10; $i++) { 

            PerusahaanModel::create([
                'nama' => 'Perusahaan ' . ($i+1),
                'telepon' => '082131955087',
                'status_dihubungi' => 1,
                'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem odio iste voluptatibus, laborum vitae dolorem placeat magni recusandae eos voluptates."
            ]);

                    # code...
        }
    }
}
