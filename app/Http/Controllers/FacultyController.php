<?php

namespace App\Http\Controllers;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
class FacultyController extends Controller
{
    public function index()
    {
      $faculties    = Faculty::query()
      ->where('status',Faculty::ACTIVE)
      ->when(request('user_id'),fn($builder)=> $builder->where('user_id',request('user_id') ) )
      ->with('paperss')
      ->get();

      // activity()->log('Look mum, I logged something');
      $activity = Activity::all()->last();
      return response()->json([/*'data'=>$faculties,*/'log'=>$activity->subject]);
    }
    /**
        * @OA\Post(
        * path="/api/faculty",
        * operationId="faculty",
        * tags={"faculty"},
        * summary="faculty Register",
        * description="faculty Register here",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *            @OA\Schema(
        *               type="object",
        *               required={"name","email", "status"},
        *               @OA\Property(property="name", type="text"),
        *               @OA\Property(property="email", type="text"),
        *               @OA\Property(property="status", type="boolean"),
        *            ),
        *        ),
        *          @OA\Response(
        *          response=201,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       )
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found")
        * )
        */
    public function store(Request $request)
    {
      $flight = Faculty::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'status' =>1,
        'user_id' =>1001,
      ]);
      return response()->json(['data'=>$flight]);
    }
    public function update(Request $request,$faculty)
    {
      $flight = Faculty::find($faculty);
      // return response()->json(['data'=>$flight,$request->all()]);

      $flight->name = $request->input('name');
      $flight->save();
      // $flight = Faculty::update([
      //   'name' => $request->input('name'),
      //   'email' => $request->input('email'),
      //   'status' =>1,
      //   'user_id' =>1001,
      // ]);
      return response()->json(['data'=>$flight,$request->userAgent()]);
    }
}
