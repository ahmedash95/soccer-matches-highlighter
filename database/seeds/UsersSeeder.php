<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->makeAdmin();
    	$this->makeModerator();
    }
    public function makeAdmin(){
        $user = new User;
    	$user->name = 'Admin';
    	$user->email = 'admin@app.dev';
    	$user->password = bcrypt(123456);
    	$user->type = User::findTypeByKey('Admin');
    	$user->save();
    }
    public function makeModerator(){
        $user = new User;
    	$user->name = 'Admin';
    	$user->email = 'moderator@app.dev';
    	$user->password = bcrypt(123456);
    	$user->type = User::findTypeByKey('Moderator');
    	$user->save();
    }
}
