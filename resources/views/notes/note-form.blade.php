@extends('layouts.note-template')

@section('title', "Formulario")

@section('content')

<div class="container my-3">
    <div class="row">
        <div class="col-md-10">
            @if (isset($put))
                <form method="post" action="/notes/{{ $note->id }}/update">

                @method('PUT')
            @else
                <form method="post" action="/notes/create">
            @endif
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" name="title" value="{{ $note->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="category_name" class="form-label">Categoría</label>
                    <input type="text" class="form-control" name="category_name" value="{{ $note->category_name }}" required>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Contenido</label>
                    <textarea type="text" class="form-control" name="text" required>{{ $note->text }}</textarea>
                </div>
                <button type="submit" class="btn btn-success btn-circle btn-xl bnt-bottom-right d-flex flex-column justify-content-center align-items-center"><i class="bi-check2 text-white fs-2"></i></button>
            </form>
        </div>
    </div>
</div>
<a class="btn btn-info btn-circle btn-xl bnt-bottom-left d-flex flex-column justify-content-center align-items-center" href="/notes"><i class="bi-x text-white fs-1"></i></a>

@endsection
