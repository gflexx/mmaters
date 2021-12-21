<?php

namespace App\Http\Middleware;

use App\Models\Payments;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EnsurePayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $payments = Payments::where('user_id', $user->id);

        // check if user has payment else redirect to payment page
        // specialist are allowed
        if ($payments->exists() or $user->is_specialist or $user->is_admin){
            return $next($request);
        } else{
            return redirect()->route('make_payment');
        }

    }
}
