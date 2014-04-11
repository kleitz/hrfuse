<?php

class DirectoryController extends BaseController {

	public function getIndex()
	{
		$users = User::paginate(10);

		return View::make('directory.index')->with('users', $users);
	}
}