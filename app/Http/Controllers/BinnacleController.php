<?php

namespace App\Http\Controllers;

use App\User;
use App\Binnacle;
use Illuminate\Http\Request;

class BinnacleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('binnacles.index', [
            'results' => Binnacle::paginate(15)
        ]);
    }
}
