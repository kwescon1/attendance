<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function results($data, $code=200) {
    	$status = "";
    	if($code == Response::HTTP_OK)
    		$status = "success";
    	else if($code == Response::HTTP_UNAUTHORIZED)
    		$status = "unauthorized";
    	else
    		$status = "error";
    	return response()->json([
    		'status' => $status,
    		'message' => $data['message'],
    		'data' => $data['data']
    	], $code);
    }
}
