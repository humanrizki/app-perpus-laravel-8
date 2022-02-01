<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DetailClassDepartmentSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CollectionSeeder::class);
        $this->call(BookCaseSeeder::class);
        $this->call(BookSeeder::class);
        // $this->call(StudentSeeder::class);
        \App\Models\Expense::factory(10)->create();
    }
}
