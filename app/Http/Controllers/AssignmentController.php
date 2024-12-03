<?php

namespace App\Http\Controllers;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with('course')->get();
        return response()->json($assignments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        $assignment = Assignment::create($request->all());
        return response()->json($assignment, 201);
    }
}
