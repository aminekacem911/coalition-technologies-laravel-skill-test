<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::put('page', 'home');
        $tasks = Task::count();
        $users = User::count();
        $projects = Project::count();
        $items = Task::orderBy('priority')->get();
        return view('home',compact('tasks','users','projects','items'));
    }
    public function updateOrder(Request $request)
    {
        $input = $request->all();

        if (isset($input["order"])) {

            $order  = explode(",", $input["order"]);

            for ($i = 0; $i < count($order); $i++) {

                Task::where('id', $order[$i])->update(['priority' => $i]);
            }

            return json_encode([
                "status" => true,
                "message" => "Order updated"
            ]);
        }
    }
}
