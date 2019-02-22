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
    public function handle($request, Closure $next, $name = NULL, $route = NULL)
    {
        $param = NULL;
        if ($route == $request->route()->getName()) {
            $param = $request->route()->parameters;
        }
        $arr = $request->Get('breadcrumbs');
        $arr[] = ['url' => route($route, $param), 'name' => $name];
        $request->attributes->Add(['breadcrumbs' => $arr]);
        View::share('breadcrumbs', $request->Get('breadcrumbs'));
        return $next($request);
    }
}
