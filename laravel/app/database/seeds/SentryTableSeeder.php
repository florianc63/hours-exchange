<?php 

use App\Models\User;

class SentryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();
 
        Sentry::getUserProvider()->create(array(
            'email'       => 'admin@hourexchange.com',
            'password'    => "123456",
            'first_name'  => 'Admin',
            'last_name'   => ' ',
            'activated'   => 1,
        ));
        Sentry::getUserProvider()->create(array(
            'email'       => 'gus@kodewebsites.com',
            'password'    => "123456",
            'first_name'  => 'Gus',
            'last_name'   => 'Munteanu',
            'activated'   => 1,
        ));
        Sentry::getUserProvider()->create(array(
            'email'       => 'harry.vogel@gmail.com',
            'password'    => "123456",
            'first_name'  => 'Harry',
            'last_name'   => 'Vogel',
            'activated'   => 1,
        ));
 
        Sentry::getGroupProvider()->create(array(
            'name'        => 'Admin',
            'permissions' => array('admin' => 1),
        ));
		Sentry::getGroupProvider()->create(array(
			'name'        => 'Member',
			'permissions' => array(
				'user.create' => 1,
				'user.profile' => 1,
			),
		));

        // Assign user permissions
        $user  = Sentry::getUserProvider()->findByLogin('admin@hourexchange.com');
        $group = Sentry::getGroupProvider()->findByName('Admin');
        $user->addGroup($group);
		
        $group = Sentry::getGroupProvider()->findByName('Member');
		
        $user  = Sentry::getUserProvider()->findByLogin('gus@kodewebsites.com');
        $user->addGroup($group);
		
        $user  = Sentry::getUserProvider()->findByLogin('harry.vogel@gmail.com');
        $user->addGroup($group);
	}
}
