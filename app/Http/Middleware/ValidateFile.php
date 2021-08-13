<?php

namespace App\Http\Middleware;

use App\Exceptions\CustomException;
use App\Rules\CheckExtention;
use Closure;

class ValidateFile
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
            $request->validate([
                'file'      => ['required', new CheckExtention],
            ]);
            if ($request->file('file')->getClientSize() > 102400) {

                throw new CustomException();

            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $next($request);
    }

}
