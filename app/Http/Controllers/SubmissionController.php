<?php

namespace App\Http\Controllers;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = Submission::with(['assignment', 'student'])->get();
        return response()->json($submissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
            'student_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $submission = Submission::create($request->all());
        return response()->json($submission, 201);
    }
}
