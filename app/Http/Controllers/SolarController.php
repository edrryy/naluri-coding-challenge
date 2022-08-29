<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolarController extends Controller
{
  public function index()
  {
    $pi = $this->pi();
    $circumference = $this->circumference($pi);
    return view('index',compact('pi','circumference'));
  }
  public function pi()
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
  function circumference($pi)
  {
    // Formula circumference = 2πr
    // Diameter of sun = 1392530 Kilometers
    // Radius of sun =  696,265 Kilometers
    $radius = 696265;
    $circumference = 2 * $pi * $radius;
    return $circumference;
  }
}
