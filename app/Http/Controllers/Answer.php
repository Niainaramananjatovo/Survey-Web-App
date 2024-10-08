<?php

namespace App\Http\Controllers;

use App\Models\Answer as ModelsAnswer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class Answer extends Controller
{
    public function store_response(Request $request)
    {
        $validated = $request->validate([
            'reponse' => 'required|array', // Expecting an array of responses
            'PollID' => 'required|integer',
            'UserID' => 'required|integer',
            'questionID' => 'required|array'
        ]);

        foreach ($request->reponse as $index => $choix) {
            ModelsAnswer::create([
                'choix' => $choix,
                'poll_id' => $request->PollID,
                'user_id' => $request->UserID,
                'question_id' => $request->questionID[$index]
            ]);
        }

        return response()->json([
            'message' => 'Réponses soumises avec succès!',
        ], 200);
    }

    public function getResponse($id)
    { 
        $users = ModelsAnswer::where('poll_id', $id)->orderby('created_at', 'asc')->pluck('user_id');
        $Username = User::whereIn('id', $users)->get();
        return $Username;
    }

    public function get($id, $user)
    {
        $answers = ModelsAnswer::where('poll_id', $id)->where('user_id', $user)->get(); 
        $questions = Question::where('poll_id', $id)->get();
        $table = [];  
        for($i=0; $i<count($questions); $i++){ 
            array_push($table, $questions[$i]->contenu);
            array_push($table, $answers[$i]-> choix);
        }
        return $table;
    }

}
