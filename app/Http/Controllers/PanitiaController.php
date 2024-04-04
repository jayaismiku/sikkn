<?php

namespace App\Http\Controllers;

use App\panitia;
use Illuminate\Http\Request;

class PanitiaController extends Controller
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
        return view('panitia');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function show(panitia $panitia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function edit(panitia $panitia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, panitia $panitia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function destroy(panitia $panitia)
    {
        //
    }
}
