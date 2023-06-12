<?php

namespace App\Http\Controllers;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use QrCode;
class FacultyController extends Controller
{
    public function index()
    {
      $faculties    = Faculty::query()
      ->where('status',Faculty::ACTIVE)
      ->when(request('user_id'),fn($builder)=> $builder->where('user_id',request('user_id') ) )
      ->with('papers')
      ->get();

      // activity()->log('Look mum, I logged something');
      $activity = Activity::all()->last();
      return response()->json(['data'=>$faculties]);//log'=>$activity->subject]);
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

    public function Authenticate(Request $request)
    {
      $credentials = $request->validate([
        'email' => ['required'],
        'password' => ['required'],
        ]);
      if (Auth::attempt($credentials)) {
        $token = $request->user()->createToken('token');
        return response()->json([
          'user'=>$request->user(),
          'token'=>$request->user()->createToken('token')->plainTextToken], 200);
      }
      return response()->json('denied', 401);

    }
    public function Register(Request $request)
    {
      $name = $request->input('name');
      $email = $request->input('email');
      $pass = $request->input('password');
      // return response()->json(Carbon::now()->toDayDateTimeString(), 200);

      // User::create([
      //   'name' =>$name,
      //   'email' =>$email,
      //   'password' =>Hash::make($pass),
      //   'created_at' => Carbon::now()
      //   ]);
      $id = DB::table('users')->insertGetId([
         'name' =>$name,
        'email' =>$email,
        'password' =>Hash::make($pass),
        'created_at' => Carbon::now()
      ]);
      return response()->json(Carbon::now(), 200);
    }
    public function generateQr()
    {
      $from = [205, 0, 0];
      $to = [0, 0, 205];
      $result=  QrCode::size(400)
        ->backgroundColor(255, 255, 255)
        // ->style('dot')
        ->eye('circle')
        ->color(255, 255, 255)
        ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
        ->margin(2)
        ->format('png')->merge('https://w7.pngwing.com/pngs/249/19/png-transparent-google-logo-g-suite-google-guava-google-plus-company-text-logo.png',.3, true)
        ->errorCorrection('H')
        ->generate('Hello, World!hello');
      $base= base64_encode($result);
      return $base;
      // return QrCode::size(200)
      //   ->backgroundColor(255, 255, 255)
      //   ->style('dot')
      //   ->eye('circle')
      //   ->color(255, 255, 255)
      //   ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
      //   ->margin(2)
      //   //https://w7.pngwing.com/pngs/989/129/png-transparent-google-logo-google-search-meng-meng-company-text-logo-thumbnail.png
      //   ->generate(
      //       'Hello, World!hello asdfsdfasdfasdfasfasd',
      //   );
    }
}
