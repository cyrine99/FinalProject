<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        //نكتب الشرط هنا
        if( !session()->has('LoggedUser') && $request->path() !='/' )
        {
            return redirect('/')->with('fail','يجب عليك القيام بتسجيل الدخول !!');
        }


        if( session()->has('LoggedUser') && $request->path() =='/')
        {
            return back();
        }
        //return $next($request);

        //هذه الاسطر تكتب لتنظيف الكاش و جعلها لا تخزن لكي عندما نقوم بعمل Logout تم نضغط سهم الرجوع سوف يردنا الى dashboard و هذا غلط لدا استخدمنا هذه للتنظيف
        return $next($request)->header('Cache-Control','no-cash, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
