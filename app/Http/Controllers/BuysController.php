<?php

namespace App\Http\Controllers;

use App\Models\buys;
use Illuminate\Http\Request;

class BuysController extends Controller
{
    public function index()
    {
        $buys = buys::all();
        return view('admin.buys.list' , compact('buys'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(buys $buys)
    {
        //
    }

    public function edit(buys $buys)
    {
        //
    }

    public function update(Request $request, buys $buys)
    {
        //
    }

    public function destroy(buys $buys)
    {
        //
    }
}