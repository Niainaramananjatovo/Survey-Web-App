<?php

namespace App\Http\Controllers;

use App\Events\PostCreateEvent;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $events=new PostCreateEvent();
        event($events);
        
    }
}