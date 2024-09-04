<?php

namespace Database\Seeders;

use App\Models\Consent;
use App\Models\Employee;
use App\Models\Investor;
use App\Models\Proposal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proposal_id1 = Proposal::where('proposal_name', 'Predlog za rekonstrukciju TS Čačak2')->first()->id;
        $proposal_id2 = Proposal::where('proposal_name', 'Predlog za izgradnju TE Bistrica')->first()->id;
        $proposal_id3 = Proposal::where('proposal_name', 'Predlog za zamenu ulične rasvete u Kraljevu')->first()->id;

        $employee_id1 = Employee::where('employee_firstname', 'Emily')
            ->where('employee_lastname', 'Taylor')
            ->first()->employee_identificator;
        $employee_id2 = Employee::where('employee_firstname', 'William')
            ->where('employee_lastname', 'Taylor')
            ->first()->employee_identificator;
        $employee_id3 = Employee::where('employee_firstname', 'Olivia')
            ->where('employee_lastname', 'Smith')
            ->first()->employee_identificator;

        $investor_id1 = Investor::where('investor_name', 'Evropska unija')->first()->id;
        $investor_id2 = Investor::where('investor_name', 'Republika Srbija')->first()->id;
        $investor_id3 = Investor::where('investor_name', 'Elektromreže Srbije')->first()->id;

        $consent1 = new Consent();
        $consent1->consent_date = '2023-02-01';
        $consent1->proposal_id = $proposal_id1;
        $consent1->employee_id = $employee_id1;
        $consent1->investor_id = $investor_id1;
        $consent1->save();

        $consent2 = new Consent();
        $consent2->consent_date = '2023-03-01';
        $consent2->proposal_id = $proposal_id2;
        $consent2->employee_id = $employee_id2;
        $consent2->investor_id = $investor_id2;
        $consent2->save();

        $consent3 = new Consent();
        $consent3->consent_date = '2023-01-01';
        $consent3->proposal_id = $proposal_id3;
        $consent3->employee_id = $employee_id3;
        $consent3->investor_id = $investor_id3;
        $consent3->save();
    }
}
