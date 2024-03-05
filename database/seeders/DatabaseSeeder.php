<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use App\Models\SalleDeCinema;
use App\Models\Zone;
use App\Models\Seat;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        SalleDeCinema::factory(3)->create()->each(function ($salleDeCinema) {
            $salleDeCinema->zones()->saveMany(
                Zone::factory(2)->create()->each(function ($zone) {
                    $zone->seats()->saveMany(Seat::factory(20)->create());
                })
            );
        });
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
