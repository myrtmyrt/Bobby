<?php

namespace Database\Seeders;

use App\Models\BorrowRequest;
use App\Models\Item;
use App\Models\ItemClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowRequestSeeder extends Seeder
{
    const assoIds = [
        "acoustic",
        "acrockeur",
        "afrique",
        "alarutc",
        "apprenteam",
        "arabut",
        "arcadia",
        "ascension",
        "asdechoeur",
        "azero",
        "baignoirutc",
        "bdb",
        "bdbdec",
        "bde",
        "boulut",
        "breakdance",
        "bruit",
        "by",
        "cabaret",
        "cafedeslumieres",
        "candide",
        "charcutc",
        "cheerutc",
        "cinemutc",
        "cledut",
        "clubbiomecanique",
        "coexister",
        "coincidence",
        "comedmus",
        "comet",
        "compiegneentransition",
        "comutec",
        "convergence",
        "cookutc",
        "crea",
        "d1g",
        "d2m",
        "dada",
        "dataventure",
        "decibels",
        "decide",
        "divut",
        "donutc",
        "eden",
        "epi",
        "equitut",
        "esperanto",
        "etusexy",
        "etuville",
        "fablab",
        "festupic",
        "flowraison",
        "formulut",
        "forumdelingenieriedurable",
        "fsc",
        "geniusutc",
        "grafhit",
        "grimput",
        "hackathon",
        "hackutc",
        "humaniraid",
        "imaginarium",
        "integ",
        "integfev",
        "japonutc",
        "jonglage",
        "lanutc",
        "larsen",
        "lecid",
        "lecoindujoueur",
        "lefil",
        "lightupcity",
        "mecautc",
        "met",
        "montagnut",
        "mrotwu",
        "mycelium",
        "nasa",
        "nutrition",
        "ocata",
        "oenologie",
        "orion",
        "piano",
        "picasoft",
        "picasso",
        "picnrock",
        "picsart",
        "pikecoud",
        "pmde",
        "pokerutc",
        "polar",
        "poleae",
        "polesec",
        "polete",
        "polevdc",
        "profitroles",
        "ptp",
        "raidut",
        "rhizome",
        "ridut",
        "rugbydequerre",
        "runutc",
        "salsautc",
        "sciencesegales",
        "secouruts",
        "sei",
        "simde",
        "skiutc",
        "soireedesfinaux",
        "ssp",
        "star",
        "stopvss",
        "stravaganza",
        "suitc",
        "surfutc",
        "tactose",
        "talentbrut",
        "teamutecia",
        "tedutc",
        "toitaunepal",
        "tribut",
        "ucc",
        "usec",
        "utcare",
        "utciel",
        "utclock",
        "utcode",
        "utconice",
        "utcoupe",
        "uterus",
        "utescape",
        "uthezard",
        "utrading",
        "utrip",
        "utsafe",
        "utsea",
        "veloc",
        "wikilogie",
        "workandchill"
    ];
    public function createRequest($faker)
    {
        $debut_date = $faker->dateTimeBetween('-1 week', now());
        $end_date = $faker->dateTimeBetween($debut_date, '+1 week');

        $borrowRequest = new BorrowRequest([
            'asso_id' => self::assoIds[rand(0, count(self::assoIds) - 1)],
            'debut_date' => $debut_date,
            'end_date' => $end_date,
            'comment' => $faker->text(),
        ]);

        $borrowRequest->save();

        return $borrowRequest;
    }

    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < count(self::assoIds); $i++) {
            $classes = ItemClass::all()->where('asso_id', self::assoIds[$i]);

            foreach ($classes as $class) {
                $items = $class->items;
                $filtered = $items->filter(function ($item) {
                    return $item->isAvailable();
                });

                $items_id = $filtered->pluck('id');

                if (count($items_id) > 0) {
                    for ($j = 0; $j < rand(1, 5); $j++) {
                        $request = $this->createRequest($faker);
                        $itemsToAttach = $items_id->random(rand(1, min(count($items_id), 5)));

                        foreach ($itemsToAttach as $item) {
                            $request->items()->attach($item);
                        }
                    }
                }
            }
        }
    }
}
