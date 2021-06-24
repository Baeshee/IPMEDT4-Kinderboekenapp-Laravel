<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtXRefresh extends BaseMiddleware
{
   
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$payload = JWTAuth::payload();
		
		if ( $payload->get('xtype') != 'refresh' ){
			return response()->json(['status' => 'Token Misused'], 406);
		}
		
        return $next($request);
	}
}
