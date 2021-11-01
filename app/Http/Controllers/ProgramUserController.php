<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Auth;

class ProgramUserController extends Controller
{
    public function store(Request $request)
    {
        $program = Program::findOrFail($request['program_id']);
        if ($program->join == config('course.joinin')) {
            $program->users()->sync([Auth::id() ?? null]);

            return back()->with('success', 'Completed program');
        } else {
            return back()->with('error', 'Error');
        }
    }
}
