<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    public function index()
    {
        return response()->json(Checklist::where('user_id', Auth::id())->get());
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string']);
        // dd(Auth::id());
        $checklist = Checklist::create(['title' => $request->title, 'user_id' => Auth::id()]);
        return response()->json($checklist, 201);
    }

    public function show($id)
    {
        $checklist = Checklist::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($checklist);
    }

    public function update(Request $request, $id)
    {
        $checklist = Checklist::where('user_id', Auth::id())->findOrFail($id);
        $checklist->update($request->only('title'));
        return response()->json($checklist);
    }

    public function destroy($id)
    {
        $checklist = Checklist::where('user_id', Auth::id())->findOrFail($id);
        $checklist->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

