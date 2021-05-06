<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// So as we are in a different controller here now, we first have to import our hobby model
use App\Hobby;

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
        //fetch our Hobbies.  $hobbies = Hobby is model
        $hobbies = Hobby::select()
            //my own id
            ->where('user_id', auth()->id())
            ->orderBy('updated_at', "DESC")
            ->get();

        //pass our hobbies variable to the front end
        return view('home')->with([
            'hobbies' => $hobbies
        ]);
        return view('home');
    }
}
