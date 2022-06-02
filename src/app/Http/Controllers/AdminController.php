<?php

// Autor: Vukašin Stepanović 0133/2019

namespace App\Http\Controllers;

use App\Utilities;
use Illuminate\Http\Request;

/** 
 * AdminController - klasa za administratorske funkcije
 */
class AdminController extends Controller
{
    /** 
     * Pokrece selekciju
     * 
     * @return Post
     */
    public function triggerSelection(Request $request)
    {
        $winner = Utilities::triggerSelection();
        return response()->json(['winner' => $winner]);
    }

    /**
     * Pokrece selekciju (JSON endpoint)
     * 
     * @return Post
     */
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
