<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /** @var Movie */
    private $movieModel;

    public function __construct(
        Request $request,
        Movie $movieModel = null
    )
    {
        $this->movieModel = $movieModel ?? new Movie();
    }

    public function index(){
        return view('movie.index');
    }
}
