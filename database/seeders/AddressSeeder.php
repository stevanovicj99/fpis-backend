<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\City;
use App\Models\Township;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = new City();
        $city->city_name = "Beograd";
        $city->save();

        $township1 = new Township();
        $township1->township_name = "Vozdovac";
        $township1->city_id = $city->id;
        $township1->save();

        $township2 = new Township();
        $township2->township_name = "Vracar";
        $township2->city_id = $city->id;
        $township2->save();


        $township3 = new Township();
        $township3->township_name = "Novi Beograd";
        $township3->city_id = $city->id;
        $township3->save();

        $address1 = new Address();
        $address1->address_name = "Vojvode Stepe 403";
        $address1->township_id = $township1->id;
        $address1->city_id = $city->id;
        $address1->save();

        $address2 = new Address();
        $address2->address_name = "Jove Ilica 7";
        $address2->township_id = $township1->id;
        $address2->city_id = $city->id;
        $address2->save();

        $address3 = new Address();
        $address3->address_name = "Ohridska 1";
        $address3->township_id = $township2->id;
        $address3->city_id = $city->id;
        $address3->save();

        $address4 = new Address();
        $address4->address_name = "Krusedolska 5";
        $address4->township_id = $township2->id;
        $address4->city_id = $city->id;
        $address4->save();

        $address5 = new Address();
        $address5->address_name = "Macvanska 2";
        $address5->township_id = $township2->id;
        $address5->city_id = $city->id;
        $address5->save();

        $address6 = new Address();
        $address6->address_name = "Bulevar Jurija Gagarina 7";
        $address6->township_id = $township3->id;
        $address6->city_id = $city->id;
        $address6->save();

        $address7 = new Address();
        $address7->address_name = "Nehruova 8";
        $address7->township_id = $township3->id;
        $address7->city_id = $city->id;
        $address7->save();

        $address8 = new Address();
        $address8->address_name = "Bulevar Zorana Djindjica 15";
        $address8->township_id = $township3->id;
        $address8->city_id = $city->id;
        $address8->save();
    }
}
