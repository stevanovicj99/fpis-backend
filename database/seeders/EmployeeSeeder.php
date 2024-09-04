<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department1 = new Department();
        $department1->department_name = "HR";
        $department1->save();

        $department2 = new Department();
        $department2->department_name = "Marketing";
        $department2->save();

        $department3 = new Department();
        $department3->department_name = "Finance and Accounting";
        $department3->save();

        $department4 = new Department();
        $department4->department_name = "Operations";
        $department4->save();

        $department5 = new Department();
        $department5->department_name = "Information Technology";
        $department5->save();

        $employee1 = new Employee();
        $employee1->employee_identificator = "0101985701234";
        $employee1->employee_firstname = "Emily";
        $employee1->employee_lastname = "Taylor";
        $employee1->employee_position = "HR Manager";
        $employee1->department_id = $department1->id;
        $employee1->save();

        $employee2 = new Employee();
        $employee2->employee_identificator = "1507946905678";
        $employee2->employee_firstname = "Benjamin";
        $employee2->employee_lastname = "Anderson";
        $employee2->employee_position = "HR Manager";
        $employee2->department_id = $department1->id;
        $employee2->save();

        $employee3 = new Employee();
        $employee3->employee_identificator = "2210624812345";
        $employee3->employee_firstname = "Olivia";
        $employee3->employee_lastname = "Smith";
        $employee3->employee_position = "Marketing Coordinator";
        $employee3->department_id = $department2->id;
        $employee3->save();

        $employee4 = new Employee();
        $employee4->employee_identificator = "0303753907890";
        $employee4->employee_firstname = "William";
        $employee4->employee_lastname = "Taylor";
        $employee4->employee_position = "Chief Financial Officer";
        $employee4->department_id = $department3->id;
        $employee4->save();

        $employee5 = new Employee();
        $employee5->employee_identificator = "1108875904567";
        $employee5->employee_firstname = "Sophia";
        $employee5->employee_lastname = "Martinez";
        $employee5->employee_position = "Operations Supervisor";
        $employee5->department_id = $department4->id;
        $employee5->save();

        $employee6 = new Employee();
        $employee6->employee_identificator = "2805018906789";
        $employee6->employee_firstname = "Emily";
        $employee6->employee_lastname = "Johnson";
        $employee6->employee_position = "Systems Administrator";
        $employee6->department_id = $department5->id;
        $employee6->save();
    }
}
