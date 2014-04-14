<?php

class InitialSeeder extends Seeder {

	public function run()
	{
		// Create roles
		$admin = \Toddish\Verify\Models\Role::create(['name' => 'Admin', 'level' => 10]);

		// Create permissions
		$create_user = \Toddish\Verify\Models\Permission::create(['name' => 'create_user']);
		$update_user = \Toddish\Verify\Models\Permission::create(['name' => 'update_user']);
		$delete_user = \Toddish\Verify\Models\Permission::create(['name' => 'delete_user']);

		$modify_settings = \Toddish\Verify\Models\Permission::create(['name' => 'modify_settings']);

		// Add permissions to admin role
		$admin->permissions()->sync([$create_user->id, $update_user->id, $delete_user->id, $modify_settings->id]);

		// Create the admin account
		$user = User::create(['username' => 'admin', 'email' => 'admin@example.com', 'password' => 'admin', 'verified' => true]);

		// Add the admin account to the admin role
		$user->roles()->sync([$admin->id]);
	}
}
