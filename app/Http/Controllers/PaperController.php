<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paper;
class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::query()
        ->when(request('faculty_id'),fn($builder) => $builder->whereFacultyId(request('faculty_id')))
        ->get();
        return response()->json(['data'=>$papers]);
    }
}
