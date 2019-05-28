<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'id'=>1,
            'name'=>'Admin',
            'prenom'=>'Master',
            'email'=>'admin@exemple.com',
            'password'=>'$2y$10$Yp4tMBi4uUY7ds5y4DAXw.596BdWUOj0KqqvvVx9LvK7zL3hwwG32',
            'telUser'=>'0600000000',
            'commercant'=>1,
            'admin'=>1
        ] );

        User::create( [
            'id'=>2,
            'name'=>'Commercant1',
            'prenom'=>'Le Premier',
            'email'=>'commercant@exemple.com',
            'password'=>'$2y$10$Yp4tMBi4uUY7ds5y4DAXw.596BdWUOj0KqqvvVx9LvK7zL3hwwG32',
            'telUser'=>'0612345678',
            'commercant'=>1
        ] );

        User::create( [
            'id'=>3,
            'name'=>'Gerard-Kevin',
            'prenom'=>'Delaboustifaille',
            'email'=>'user@exemple.com',
            'password'=>'$2y$10$Yp4tMBi4uUY7ds5y4DAXw.596BdWUOj0KqqvvVx9LvK7zL3hwwG32',
            'telUser'=>'0687654321',
        ] );

        User::create( [
            'id'=>4,
            'name'=>'Jean-Claude',
            'prenom'=>'Delaporte',
            'email'=>'user2@exemple.com',
            'password'=>'$2y$10$Yp4tMBi4uUY7ds5y4DAXw.596BdWUOj0KqqvvVx9LvK7zL3hwwG32',
            'telUser'=>'0687654321',
        ] );

        User::create( [
            'id'=>5,
            'name'=>'Madame Michu',
            'prenom'=>'Ducantal',
            'email'=>'user3@exemple.com',
            'password'=>'$2y$10$Yp4tMBi4uUY7ds5y4DAXw.596BdWUOj0KqqvvVx9LvK7zL3hwwG32',
            'telUser'=>'0687654321',
        ] );
            
    }
}
