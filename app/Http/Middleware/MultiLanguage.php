<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;

class MultiLanguage
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
      /*
      * segment 1 is public
      * segment 2 is admin
      */
      $segment = request()->segment(1);
      $lang = Config::get('app.locale'); // get default locale
      $supportedLocales = Config::get('app.locales');
      if (is_array($supportedLocales)){
        if (in_array($segment, $supportedLocales)) {
        $lang = $segment;
      }
    }
      App::setLocale($lang);
      return $next($request);
  }
}
