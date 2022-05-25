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
}
