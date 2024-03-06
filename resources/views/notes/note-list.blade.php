@extends('layouts.note-template')

@section('title', "Notas")

@section('content')

<div class="container">
    <h1 class="display-1 text-center my-3">Mis notas</h1>
    <div class="row g-3 justify-content-md-center align-items-center align-items-stretch">
        @foreach ($notes as $note)
            <div class="col-6 col-md-4">
                <a class="btn btn-outline-dark w-100 h-100" href="{{ url('/notes', ['id' => $note->id]) }}">
                    <h1>{{ $note->title }}</h1>
                    <p>{{ strlen($note->text) > 200 ? substr($note->text, 0, 200) . '...' : $note->text }}</p>
                    <p><span class="text-start">{{ $note->category_name }}</span><span class="text-end">{{ $note->updateDate }}</span></p>
                </a>
            </div>
        @endforeach
    </div>
</div>

<a class="btn btn-warning btn-circle btn-xl bnt-bottom-right d-flex flex-column justify-content-center align-items-center" href="{{ url('/notes/new') }}">
    <i class="bi-plus text-white fs-1"></i>
</a>

<div class="div-bottom-center w-100 d-flex justify-content-center">
    <div class="bg-white border rounded border-black d-flex align-items-center">
        <p>"{{ $joke }}"</p>
    </div>
</div>

<a class="btn btn-primary btn-circle btn-xl bnt-bottom-left d-flex flex-column justify-content-center align-items-center" href="/logout">
    <i class="bi-box-arrow-in-left text-white fs-1"></i>
</a>

@endsection
