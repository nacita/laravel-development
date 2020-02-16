<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class TesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Angga 2";
        $user->email = "lanuma.angga2@gmail.com";
        $user->password = 'blabla'; //Hash::make('blabla');
        $user->save();
    }
}
