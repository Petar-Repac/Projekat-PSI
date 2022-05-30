<?php

// Autor: Vukašin Stepanović

namespace App\Http\Controllers;

use App\Utilities;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function triggerSelection(Request $request)
    {
        $winner = Utilities::triggerSelection();
        return response()->json(['winner' => $winner]);
    }

    public function triggerAutoSelection(Request $request)
    {
        $req = json_decode($request->getContent(), true);

        if (!array_key_exists("key", $req)) {
            return response()->json(['error' => 'Missing autoselect key.'], 500);
        }

        if ($req['key'] != env('TOBAGO_AUTO_SELECT_KEY')) {
            return response()->json(['error' => 'Incorrect autoselect key.'], 500);
        }
        
        return $this->triggerSelection($request);
    }
}
