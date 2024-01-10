<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

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

    public function createItemClass($faker, $cat)
    {
        $itemClass = new ItemClass([
            "name" => $faker->word()." ".$faker->word(),
            "description" => $faker->text(),
            "private" => rand(0, 100) > 5,
            "quantity" => rand(0, 10),
            "asso_id" => self::assoIds[rand(0, count(self::assoIds) - 1)],
            "position" => "MDE",
            "image" => asset("images/DiyJSb2l8QZ3PTXnK1bJrgTUoZS3DnSLzy9qcMAu.jpg")
        ]);
        $itemClass->save();
        return $itemClass;
    }

    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $categories = Category::all();
        for ($i = 0; $i < 400; $i++) {
            $class = $this->createItemClass($faker, $categories);
            $cat = $categories[rand(0, count($categories) - 1)];
            $class->categories()->attach($cat);
        }

    }
}
