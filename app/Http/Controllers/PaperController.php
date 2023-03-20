<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paper;
use App\Events\OrderCreated;
use App\Events\NewMessage;
class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::query()
        ->when(request('faculty_id'),fn($builder) => $builder->whereFacultyId(request('faculty_id')))
        ->get();
        return response()->json(['data'=>$papers]);
    }
    public function createDbFunc($dbname)
    {
        // exec("/opt/lampp/bin/mysqldump -u root -p'root' embase_template > demo_dump");
        exec("echo 'create database $dbname' | /opt/lampp/bin/mysql -u root -p'root'");
        // exec("/opt/lampp/bin/mysql -u root -p'Frz@#111$01' $dbname < demo_dump");

        return true;
    }
    public function soketi(Request $request)
    {
        $message = $request->message;
        OrderCreated::dispatch($message);
        return response()->json(['message' =>'sent'], 200);
    }
    public function SendMessage(Request $request)
    {
        $message = $request->message;
        broadcast(new NewMessage($message))->toOthers();
        return response()->json(['message' =>'sent'], 200);
    }
}
