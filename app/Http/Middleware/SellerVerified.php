<?php

namespace App\Http\Middleware;

use App\Models\Shop;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $shop = Shop::where('user_id', Auth::user()->id)->first();
            if (Auth::user()->role_id == 3 || Auth::user()->role_id == 1) {
                 if ($request->route('slug') == $shop->slug) {
                    $response = $next($request);
                    $response->headers->set('Access-Control-Allow-Origin', '*');
                    $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
                    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
                    $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
                    $response->headers->set('Pragma', 'no-cache'); //HTTP 1.0
                    $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT'); // // Date in the past

                    return $response;
                }
            }
        }
        abort(403);
    }
}
