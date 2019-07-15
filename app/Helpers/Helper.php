<?php
//namespace App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
use Carbon\Carbon;

function parsex($data){
  $parsed = preg_replace_callback('/{{(.*?)}}/', function ($matches) use ($data) {
      list($shortCode, $index) = $matches;

      if( isset($data[$index]) ) {
          return $data[$index];
      } else {
        return "Kode {$shortCode} Tidak Ada Pada {$this->id}"; //throw new Exception("Shortcode {$shortCode} not found in template id {$this->id}", 1);
//throw new Exception("Shortcode {$shortCode} not found in template id {$this->id}", 1);
      }

  }, $this->content);

  return $parsed;
}
function isActiveRoute($route, $output = 'has-class'){
  if (Route::currentRouteName() == $route) {
             return $output;
         }
}
function tgl_indo($tgl){
  $dt = new Carbon($tgl);
		//setlocale(LC_TIME, 'IND');
    Carbon::setLocale('id');
		return $dt->formatLocalized('%A %d %B %Y  %H:%I:%S');
}
function hari_akta($tgl){
  $dt = new Carbon($tgl);

		setlocale(LC_TIME, 'IND');

		return $dt->formatLocalized('%A');
}

function tgl_akta($tgl){
  $dt = new Carbon($tgl);
		

		return $dt->formatLocalized('%d %B %Y');
}
