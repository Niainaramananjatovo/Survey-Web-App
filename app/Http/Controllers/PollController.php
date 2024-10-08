<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    // create
    public function creer(Request $request)
    {
        $request->validate([
            'titre' => ['required', 'max:100'],
            'invite' => ['required', 'max:100'],
            'date_fin' => ['required', 'date'],
            'image_path' => ['nullable', 'max:255']
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        Poll::create([
            'titre' => $request->titre,
            'invite' => $request->invite,
            'date_fin' => $request->date_fin,
            'image_path' => $imagePath
        ]);



        return response()->json(['success' => 'formulaire de sondage créés avec success']);
    }

    // getter 
    public function getAllSurvey()
    {
        $polls = Poll::all();
        $table = [];
        foreach ($polls as $poll) {
            array_push($table, ["id" => $poll->id, "titre" => $poll->titre,  'date_fin' => $poll->date_fin, 'invite' => $poll->invite]);
        }
        return $table;
    }

    //  update
    public function getModification($id)
    {
        return $polls = Poll::where('id', $id)->get();
    }

    public function getTitre($id)
    {
        $table = [];
        $title = Poll::where('id', $id)->value('titre');
        $image = Poll::where('id', $id)->value('image_path');
        array_push($table, $title, $image);
        return $table;
    }

    // suppression 
    public function effacer($id)
    {
        Poll::where('id', $id)->delete();
        return 'suppression effectuée';
    }

    public function destroy()
    {
        try {
            // Get the current date/time
            $now = now();

            // Delete polls where the expiration date has passed
            $deletedRows = DB::table('poll')
                ->where('date_fin', '<', $now)
                ->delete();

            return response()->json([
                'success' => $deletedRows . ' expired polls deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error occurred while deleting expired polls'
            ], 500);
        }
    }
}
