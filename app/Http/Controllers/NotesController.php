<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index() {
        return view('note-list');
    }

    public function show($id) {
        $note = Note::findById($id);
        return view('note-view', $note);
    }

    public function new() {
        return view('note-form');
    }

    public function create(Request $request) {
        $note = new Note;
        $note->title = $request->input('title');
        $note->text = $request->input('text');
        $note->category_id = $request->input('category_id');
        $note->save();
        // Check si la categoria existe y si no crearla
        return view('note-list');
    }

    public function edit($id) {
        $note = Note::findById($id);
        // <form method="POST" action="/items/{{ $item->id }}">
//     @csrf
//     @method('PUT')
//     <input type="text" name="name" value="{{ $item->name }}">
//     <input type="text" name="description" value="{{ $item->description }}">
//     <button type="submit">Update</button>
// </form>
        return view('note-form', $note);
    }

    public function update(Request $request, $id) {
        $note = Note::findById($id);
        $note->title = $request->input('title');
        $note->text = $request->input('text');

        $note->save();
        return redirect('/notes')->with('success', 'Item updated successfully');
    }

    public function delete($id) {
        $note = Note::removeById($id);
        return view('note-list');
    }
}
