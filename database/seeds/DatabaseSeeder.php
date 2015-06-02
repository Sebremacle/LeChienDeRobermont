<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('RubriqueTableSeader');

        $this->command->info('User table seeded!');
    }

}

class RubriqueTableSeader extends Seeder {

    public function run()
    {
        DB::table('rubriques')->delete();

        App\Rubrique::create(['titre' => 'A propos']);
    }
}