<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use App\Models\Question as QuestionModels;
use App\Models\Option;
class Question extends Controller
{
    public function create_question(Request $request)
    {
        
        QuestionModels::create([
            'contenu' => $request->contenu,
            'type' => $request->type,
            'poll_id' => $request->survey,
        ]); 
        return response()->json(['success' => 'question créés avec success']);
    }
    
    public function retrieveList($id)
    {
        return QuestionModels::where('poll_id', $id)->get();
    }

    public function getCount($id){
        return count(QuestionModels::where('poll_id', $id)->get());
    }
}