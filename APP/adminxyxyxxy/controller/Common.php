<?php 
namespace app\adminxyxyxxy\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
	public function __construct(Request $request=null)
	{
		parent::__construct($request);
		if(!session('username'))
		{
			$this->redirect('adminxyxyxxy\login\login');
		}
	}
}
