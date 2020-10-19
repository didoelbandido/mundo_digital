<?php namespace App\Controllers;
use CodeIgniter\Controller;
// use App\Models\PersonaModelo;

class Home extends BaseController
{
	
	 
	public function index()
	{
		return view('header').view('portada').view('footer');
	}

	




	//--------------------------------------------------------------------

}
