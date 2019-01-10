<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->text('avatar');
        });
    }
}
