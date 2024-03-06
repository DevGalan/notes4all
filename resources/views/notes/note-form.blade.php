@extends('layouts.note-template')

@section('title', "Formulario")

@section('content')

<div class="container my-3">
    <div class="row">
        <div class="col-md-10">
            <form method="POST" action="/items/{{ $note->id }}">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $note->id }}">
                <input type="text" name="name" value="{{ $note->name }}">
                <input type="text" name="text" value="{{ $note->text }}">
                <input type="text" name="category" value="{{ $note->category }}">
                <button type="submit" class="btn btn-success btn-circle btn-xl bnt-bottom-right d-flex flex-column justify-content-center align-items-center"><i class="bi-check2 text-white fs-2"></i></button>
            </form>
        </div>
    </div>
</div>
<a class="btn btn-info btn-circle btn-xl bnt-bottom-left d-flex flex-column justify-content-center align-items-center" th:href="@{/notes}"><i class="bi-x text-white fs-1"></i></a>

@endsection
