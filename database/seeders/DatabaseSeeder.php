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
        $this->call(AdminSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DetailClassDepartmentSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CollectionSeeder::class);
        $this->call(BookCaseSeeder::class);
        $this->call(BookSeeder::class);
    }
}
