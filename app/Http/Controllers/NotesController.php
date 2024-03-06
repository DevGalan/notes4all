<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index() {
        $notes = Note::where('author', '=',(Auth::user()->name))->get();
        return view('note-list');
    }

    public function show($id) {
        $note = Note::find($id);
        return view('note-view', $note);
    }

    public function new() {
        $note = new Note;
        $method = 'POST';
        return view('note-form');
    }

    public function create(Request $request) {
        if ($this->isNameAndAuthorRepeated(
                $request->input('title'),
                Auth::user()->name)) {
                    return redirect('/notes')->with('error', 'Name and Author must be unique');
                }
        $this->addCategoryIfNotExists($request->input('category_name'));
        $note = new Note;
        $note->author = Auth::user()->name;
        $note->title = $request->input('title');
        $note->text = $request->input('text');
        $note->category_name = $request->input('category_name');
        $note->save();
        return view('note-list');
    }

    public function edit($id) {
        $note = Note::find($id);
        $method = 'PUT';
        return view('note-form', $note);
    }

    public function update(Request $request, $id) {
        if ($this->isNameAndAuthorRepeated(
                $request->input('title'),
                Auth::user()->name)) {
                    return redirect('/notes')->with('error', 'Name and Author must be unique');
                }
        $this->addCategoryIfNotExists($request->input('category_name'));
        $note = Note::find($id);
        $note->title = $request->input('title');
        $note->text = $request->input('text');
        $note->category_name = $request->input('category_name');
        $message = $note->save() ? 'success' : 'error';
        return redirect('/notes')->with($message);
    }

    private function isNameAndAuthorRepeated($title, $author) {
        $note = Note::where('title', '=', $title)->where('author', '=', $author);
        return $note->exists();
    }

    private function addCategoryIfNotExists($category_name) {
        $category = Category::where('name', '=', $category_name);
        if (!$category->exists()) {
            $category = new Category;
            $category->name = $category_name;
            $category->save();
        }
    }

    public function delete($id) {
        $message = Note::find($id)->delete() ? 'success' : 'error';
        return redirect('/notes')->with($message);
    }
}
