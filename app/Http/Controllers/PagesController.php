<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index() {
    	return view('welcome');
    }

    public function about() {
    	$name = 'Kylan Hurt';
    	return view('pages.about')->with('name', $name);
    }
    
    public function createEntity() {
        return view('pages.createEntity');
    }
}
