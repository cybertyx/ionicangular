<?php

namespace DeliveryQuick\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\DB;
use DeliveryQuick\User;

class OAuthCheckRole
{

    private $user;

    public function __construct(User $user) {
        
        $this->user = $user;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //verificar bruno como fazer pra pegar o Id do usuario autenticado pelo Passport
        $id = Auth::user()->id;
        $user = $this->user->find($id);
        
        if ($user->role != $role) {
            abort(403, 'Access Forbidden');
        }
        return $next($request);
    }
}
