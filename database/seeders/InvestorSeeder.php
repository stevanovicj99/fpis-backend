<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\City;
use App\Models\Investor;
use App\Models\Township;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class InvestorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city_id =  City::where('city_name', 'Beograd')->first()->id;
        $township_id1 =  Township::where('township_name', 'Vozdovac')->first()->id;
        $township_id2 =  Township::where('township_name', 'Vracar')->first()->id;
        $township_id3 =  Township::where('township_name', 'Novi Beograd')->first()->id;

        $address_id1 =  Address::where('address_name', 'Vojvode Stepe 403')->first()->id;
        $address_id2 =  Address::where('address_name', 'Ohridska 1')->first()->id;
        $address_id3 =  Address::where('address_name', 'Nehruova 8')->first()->id;



        $investor1 = new Investor();
        $investor1->investor_name = "Republika Srbija";
        $investor1->investor_taxID = 123456;
        $investor1->investor_type = "Vlada i javni sektor";
        $investor1->city_id = $city_id;
        $investor1->township_id = $township_id1;
        $investor1->address_id = $address_id1;
        $investor1->save();


        $investor2 = new Investor();
        $investor2->investor_name = "Evropska unija";
        $investor2->investor_taxID = 456212;
        $investor2->investor_type = "Međunarodne organizacije";
        $investor2->city_id = $city_id;
        $investor2->township_id = $township_id2;
        $investor2->address_id = $address_id2;
        $investor2->save();

        $investor3 = new Investor();
        $investor3->investor_name = "Elektromreže Srbije";
        $investor3->investor_taxID = 234234;
        $investor3->investor_type = "Energetske kompanije";
        $investor3->city_id = $city_id;
        $investor3->township_id = $township_id3;
        $investor3->address_id = $address_id3;
        $investor3->save();
    }
}
