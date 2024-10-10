<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// utilizzo il model technology
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Laravel', 'HTML', 'CSS', 'Javascript', 'PHP', 'Vue.js'];

        foreach($technologies as $technology){
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Technology::generateSlug($technology);
            $new_technology->save();
        }
    }
}
