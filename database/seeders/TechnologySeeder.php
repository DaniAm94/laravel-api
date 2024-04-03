<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['label' => 'HTML', 'color' => 'danger'],
            ['label' => 'CSS', 'color' => 'info'],
            ['label' => 'ES6', 'color' => 'warning'],
            ['label' => 'Bootstrap', 'color' => 'dark'],
            ['label' => 'VUE', 'color' => 'success'],
            ['label' => 'SQL', 'color' => 'secondary'],
            ['label' => 'PHP', 'color' => 'info'],
            ['label' => 'Laravel', 'color' => 'danger'],
        ];
        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->label = $technology['label'];
            $new_technology->slug = Str::slug($new_technology->label);
            $new_technology->color = $technology['color'];
            $new_technology->save();
        }
    }
}
