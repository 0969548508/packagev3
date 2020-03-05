<?php 

namespace nnbao\Press\Http\Controllers;

use Illuminate\Routing\Controller;	

class TestController extends Controller{

	public function index(){
		echo "in controller";
		echo "<br/>";
		echo trans('press::home.hello');
	}

	public function TestView(){
		return view('press::master');
	}
}