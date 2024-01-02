<?php

namespace Database\Seeders;

use App\Enum\ConditionEnum;
use App\Models\ConditionHistory;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionHistorySeeder extends Seeder
{
    public function createCondition($cond, $item_id)
    {
        $condition = new ConditionHistory([
            "condition" => $cond,
            "item_id" =>  $item_id,
            "date" => now()->format('Y-m-d H:i:s')
        ]);
        $condition->save();
    }
    public function run(): void
    {
        $conditions =[ConditionEnum::Neuf, ConditionEnum::TB, ConditionEnum::Bon, ConditionEnum::Moyen, ConditionEnum::Mauvais, ConditionEnum::TM];
        $itemIds = Item::all()->pluck('id');
        for ($i = 0; $i < count($itemIds); $i++) {
            $this->createCondition($conditions[rand(0, count($conditions) - 1)], $itemIds[$i]);
        }
    }
}
