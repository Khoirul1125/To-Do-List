<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoItem;
use App\Models\Checklist;
use Illuminate\Support\Facades\Auth;

class TodoItemController extends Controller
{
    public function store(Request $request, $checklistId)
    {
        $request->validate(['task' => 'required|string']);
        $checklist = Checklist::where('user_id', Auth::id())->findOrFail($checklistId);
        $item = $checklist->todoItems()->create(['task' => $request->task]);
        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = TodoItem::whereHas('checklist', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = TodoItem::whereHas('checklist', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);
        $item->update($request->only('task'));
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = TodoItem::whereHas('checklist', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    public function toggleStatus($id)
    {
        // dd($id);
        $item = TodoItem::whereHas('checklist', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);
        $item->update(['completed' => !$item->completed]);
        return response()->json($item);
    }
}