<?php

namespace Database\Seeders;

use App\Models\Proposal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proposal1 = new Proposal();
        $proposal1->proposal_name = "Predlog za rekonstrukciju TS Čačak2";
        $proposal1->save();

        $proposal2 = new Proposal();
        $proposal2->proposal_name = "Predlog za izgradnju TE Bistrica";
        $proposal2->save();

        $proposal3 = new Proposal();
        $proposal3->proposal_name = "Predlog za zamenu ulične rasvete u Kraljevu";
        $proposal3->save();

        $proposal4 = new Proposal();
        $proposal4->proposal_name = "Predlog za rekonstrukciju TE Nikola Tesla";
        $proposal4->save();
    }
}
