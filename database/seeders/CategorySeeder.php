<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    const category = [
        "meuble",
        "rangement",
        "decoration",
        "outil",
        "jouet",
        "utilitaire",
        "ustensiles cuisine"

    ];
    public function run(): void
    {
        for($i=0; $i<count(self::category); $i++){
            $cat = new Category(['name'=>self::category[$i]]);
            $cat->save();
        }
    }
}
