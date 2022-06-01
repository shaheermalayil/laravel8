<?php

namespace App\Http\Controllers;
use App\Models\Faculty;
use Illuminate\Http\Request;
class FacultyController extends Controller
{
    public function index()
    {
      $faculties    = Faculty::query()
      ->where('status',Faculty::ACTIVE)
      ->when(request('user_id'),fn($builder)=> $builder->where('user_id',request('user_id') ) )
      ->with('papers')
      ->get();
      return response()->json(['data'=>$faculties]);
    }
}
