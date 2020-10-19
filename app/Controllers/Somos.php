<?php namespace App\Controllers;


class Somos extends BaseController
{

    public function somos()
	{
		return view('header').view('somos').view('footer');
	}

}