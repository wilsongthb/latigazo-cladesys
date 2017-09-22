<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserModules as UserModulesModel;
use Auth;

class UserModules
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
        $modules = explode('/', $request->getPathInfo());
        array_pull($modules, 0);

        $user = Auth::user();

        $pattern_module = ( isset($modules[1]) ? $modules[1] : '' );
        $module = $pattern_module . ( isset($modules[2]) ? '/'.$modules[2] : '' );
        
        // $method = $request->getMethod();

        // $userModules = UserModulesModel
        //     ::where('user_id', $user->id)
        //     ->where('module', $pattern_module)
        //     ->get();

        

        $userModules = UserModulesModel
            ::where('user_id', $user->id)
            ->where('module', $module)
            ->orWhere('module', $pattern_module)
            ->where($request->getMethod(), true)
            ->get();

        
        
        // dd($module, $userModules);

        if(count($userModules) === 0){
            
            return response(
                "No tienes acceso :'(", 401);
            
        }

        return $next($request);
    }
}
