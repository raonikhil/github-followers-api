<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\GitHub\Facades\GitHub;

class SearchController extends Controller
{
    public function index()
    {
    	$users = array();
    	return view('welcome')->with('users',$users);
    }

    public function search(Request $request)
    {
    	$users = Github::api('search')->users($request->input('username').' in:login type:user');
    	return view('welcome')->with('users',$users['items']);
    }
}
