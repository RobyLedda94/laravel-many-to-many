<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
// utilizzo il model Type
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Piccolo', 'Medio', 'Grande'];

        foreach($types as $typ){
            $type = new Type();

            $type->name = $typ;
            $type->slug = Str::slug($typ, '-');
            $type->save();
        }
    }
}
