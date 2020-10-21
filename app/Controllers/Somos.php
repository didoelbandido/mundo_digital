<?php namespace App\Controllers;


class Somos extends BaseController
{

    public function index()
	{
		return view('header').view('somos').view('footer');
	}

}