<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\comment;
class CommentController extends Controller
{
    //
    public function index()
    {
        Log::info('this one czll');
        Log::info(comment::findOrFail(1));
        return view('comments', ['comment' => comment::findOrFail(1)]);
    }
}
