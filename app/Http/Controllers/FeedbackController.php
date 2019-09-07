<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //

    public function fd()
    {
        return view('feedbackform.feed');
    }
}
