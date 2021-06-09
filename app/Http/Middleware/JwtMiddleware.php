<?php
namespace App\Http\Middleware;


use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

use App\Models\Token;


class JwtMiddleware extends BaseMiddleware
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
		try {
		   $user = JWTAuth::parseToken()->authenticate();
 		} catch (Exception $e) {
        	  if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
		    return response()->json(['status' => 'Token is Invalid'], 403);
		  }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
			return response()->json(['status' => 'Token is Expired'], 401);
		  }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException){
			return response()->json(['status' => 'Token is Blacklisted'], 400);
		  }else{
		        return response()->json(['status' => 'Authorization Token not found'], 404);
		  }
		}
		$token_obj = Token::findByValue( auth()->getToken()->get() );

		if ( !$token_obj ){
			//OUR APP DID NOT ISSUED THIS TOKEN, POSSIBLE SECURITY BREACH
			return response()->json(['status' => 'Token Invalid - bad issuer'], 403);
		}
            return $next($request);
	}
}