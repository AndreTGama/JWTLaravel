<?php
namespace App\Http\Middleware;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class AssignGuard
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
        $token = JWTAuth::getToken();
        $decode = JWTAuth::decode($token);
        $id = $decode['tipo_user_id'];
        if($id != null)
            auth()->shouldUse($id);
        return $next($request);
    }
}
