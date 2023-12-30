<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemClass;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function createItem($faker)
    {
        //$classIds = ItemClass::all()->pluck('id');
        $item = new Item([
            'id' => $faker->uuid(),
            "mono_item" => $faker->boolean,
            "description" => $faker->text(),
            "quantity" => rand(0, 30),
            //"class_id" =>  $classIds[rand(0, count($classIds) - 1)]
            "class_id" => 1
        ]);
        $item->save();
    }
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 850; $i++) {
            $this->createItem($faker);
        }
    }

}
