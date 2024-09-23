<?php

namespace App\Http\Controllers;

use App\Jobs\SeedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class PostSeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // SeedPost::dispatch()->onConnection('sync')->delay(now()->addMinutes(10));
        //  SeedPost::dispatchSync()->delay(now()->addMinutes(10));
        SeedPost::dispatch();
        return view('welcome');
    }
}
