<?php

namespace App\Http\Controllers;
use App\Models\Faculty;
use Illuminate\Http\Request;
class FacultyController extends Controller
{
    public function index()
    {
      $faculties    = Faculty::where('status',Faculty::ACTIVE)->get();
      return response()->json(['data'=>$faculties]);
    }
}
