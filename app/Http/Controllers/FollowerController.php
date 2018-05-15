<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\GitHub\Facades\GitHub;

class FollowerController extends Controller
{
    public function listAll($username)
    {
    	$followers = array();
    	return view('followers')->with('username',$username)->with('followers',$followers);
    }

    /*
     *	Function to be called by AJAX
     */
    public function getFollowers($username,$page_number = 1)
    {
    	$followers = Github::api('user')->followers($username,array('page'=>$page_number));
        echo json_encode($followers);
    }
}
