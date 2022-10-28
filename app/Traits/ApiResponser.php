<?php

namespace App\Traits;
use Carbon\Carbon;

trait ApiResponser{

    protected function success($data, string $message = null, int $code = 200)
	{
			// echo '<pre>'; print_r($data).'data<br>';
			// echo '<pre>'; print_r($message).'message<br>';
			// die;
		return response()->json([
			'status' => true,
			'data' => $data,
			'message' => $message
		], $code);
	}

    protected function error(string $message = null, int $code, $data = null)
	{
		return response()->json([
			'status' => false,
			'message' => $message,
			'data' => $data
		], $code);
	}
}
