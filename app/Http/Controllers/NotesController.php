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
        $user = Auth::user()->name;
        $notes = Note::where('author', '=',($user))->orderBy('updated_at', 'desc')->get();
        return view('notes.note-list', compact('notes', 'user'));
    }

    public function show($id) {
        $note = Note::find($id);
        return view('notes.note-view', compact('note'));
    }

    public function new() {
        $note = new Note;
        return view('notes.note-form', compact('note'));
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
        $message = $note->save() ? 'created' : 'error';
        return redirect('/notes')->with($message);
    }

    public function edit($id) {
        $note = Note::find($id);
        $put = '';
        return view('notes.note-form', compact('note', 'put'));
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
        return Note::where('title', $title)->where('author', $author)->exists();
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
