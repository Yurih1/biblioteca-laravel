<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Libraryuser;
use App\Models\User_book;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $dateNow = date("Y-m-d");

        $users = Libraryuser::all();
        
        return view('users.create')
            ->with('users', $users)
            ->with('date', $dateNow);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $userName = $request->input('nome');
        $email = $request->input('email');

        $libraryUser = new Libraryuser();

        $libraryUser->id = Str::uuid();
        $libraryUser->name = $userName;
        $libraryUser->email = $email;

        $libraryUser->save();

        return redirect('/users/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Libraryuser::find($id);

        $checked = !empty($user->returned) ? 'checked' : '';

        $dateToday = date_create(date("Y-m-d"));
        $bdDate = date_create($user->devolution_date);
        $interval = date_diff($dateToday, $bdDate);

        return view('users.show')
            ->with('user', $user)
            ->with('checked', $checked)
            ->with('interval', $interval->format("%d"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Libraryuser::find($id);
        
        $userName = $request->nome;
        $userEmail = $request->email;
        $returned = $request->devolvido;

        $user->name = $userName;
        $user->email = $userEmail;
        $user->returned = !empty($returned) ? $returned : '';
        $user->save();

        return redirect('/users/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Libraryuser::destroy($id);
        
        return redirect('/users/create');
    }
}
