<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModelo;
class ErrorAcceso extends BaseController
{
   
	public function __construct() {
     helper(['form', 'url','funciones']);
   
    }
	public function index()
	{
		return view('header').view('erroracceso').view('footer');
	}
}