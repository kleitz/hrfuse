<?php

class DirectoryController extends BaseController {

	public function getIndex()
	{
		return View::make('directory.index');
	}
}