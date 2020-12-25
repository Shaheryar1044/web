<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function uploadHelper($fileType){


    		$extension = Input::file($fileType)->getClientOriginalExtension();
			$fileName = rand(11111,99999).'_'.time().'.'.$extension;
			$upload_path = public_path('uploads/templates/'.$fileType);
			$full_path = '/public/uploads/templates/'.$fileType.'/'.$fileName;
			$check = Input::file($fileType)->move($upload_path, $fileName);


		return $full_path;

	}
}
