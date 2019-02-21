<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class BreadCrumbs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $name = NULL, $route = NULL, $route_param = NULL)
    {
        $arr = $request->Get('breadcrumbs');
        if (!empty($route_param)) {
            $route_param = explode('=>', $route_param);
            $route_param = [$route_param[0] => $route_param[1]];
        }
        $arr[] = ['url' => route($route, $route_param), 'name' => $name];
        $request->attributes->Add(['breadcrumbs' => $arr]);
        View::share('breadcrumbs', $request->Get('breadcrumbs'));
        return $next($request);
    }
}
