<?php

namespace App\Http\Controllers;

use App\Models\Option as OptionModels;
use Illuminate\Http\Request;

class Option extends Controller
{
    public function create_option(Request $request)
    {

        $request->validate([
            'options' => 'required|array',
            'options.*' => 'string|max:255', // Validate each option
            'question_id' => 'required|integer', // Link to the question
        ]);
        foreach ($request->text as $index => $choix) {
            OptionModels::create([
                'choix' => $choix,
                'question_id' => $request->question_id
            ]);
        }

        return response()->json(['success' => 'Options created successfully']);
    }
}
