<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolarController extends Controller
{
  function index(){
    $pi = pi();
    return view('index',compact('pi'));
  }
  function pi()
  {
    $pi = 3;
    $x = 2;
    $count = 1;
    // Using Nilakantha series algorithm
    // https://www.geeksforgeeks.org/calculate-pi-using-nilkanthas-series/
    // π = 3 + 4 / (2*3*4) – 4 / (4*5*6) + 4 / (6*7*8) – . . .
    for($i = 0; $i < 100000; $i++)
    {
      if ($count % 2) {
        $pi = $pi + (4/($x * ($x+1) * ($x+2)));
      } else {
        $pi = $pi - (4/($x * ($x+1) * ($x+2)));
      }

      $x += 2;
      $count ++;
    }
    return $pi;
  }
}
