<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{

  public function getCarouselSliders()
  {
      $sliders = DB::table('carousel')
              ->where('locale', '=', app()->getLocale())
              ->orderBy('position', 'asc')
              ->join('carousel_translations', 'carousel_translations.for_id', '=', 'carousel.id')
              ->get();
      return $sliders;
  }

}
