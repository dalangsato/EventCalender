<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User;
        $admin->email = "admin@admin.com";
        $admin->name = "Administrator";
        $admin->password = \Hash::make("123456");

        $admin->save();

        $this->command->info("User created");
    }
}
