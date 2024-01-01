<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemClass;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function createItem($faker, $class_id)
    {

        $item = new Item([
            "mono_item" => $faker->boolean,
            "description" => $faker->text(),
            "class_id" =>  $class_id
            //"class_id" => 1
        ]);
        $item->save();
    }
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $classIds = ItemClass::all()->pluck('id');
        for ($i = 0; $i < 850; $i++) {
            $this->createItem($faker, $classIds[rand(0, count($classIds) - 1)]);
        }
    }

}
