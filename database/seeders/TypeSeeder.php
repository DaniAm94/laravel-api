<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $labels = ['FrontEnd', 'BackEnd', 'UI/UX', 'FullStack', 'Design'];
        foreach ($labels as $label) {
            $type = new Type();
            $type->label = $label;
            $type->slug = Str::slug($type->label);
            $type->color = $faker->hexColor();
            $type->save();
        }
    }
}
