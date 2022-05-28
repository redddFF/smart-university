<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\PaperWork;
use App\Models\Pfe;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        User::factory(1)
            ->has(
                PaperWork::factory(2))->count(4)->create(); 
        User::factory(1)
            ->has(Pfe::factory(2))->count(4)->create(); 
        User::factory(1)
            ->has(Event::factory(2))->count(4)->create();     
    }
}
