<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function Index()
	{
		if(Auth::user()->hasRole('user')){
			return view('userdash');
		}elseif(Auth::user()->hasRole('company')){
			return view('companydash');
		}elseif(Auth::user()->hasRole('admin')){
			return view('dashboard');
		}
	}

	
public function profile()
   {
    return view('profile');
   }

   public function advert()
   {
    return view('advert');
   }

   
    //
}
