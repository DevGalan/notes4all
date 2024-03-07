@extends('layouts.note-template')

@section('title', "Nota " . $note->title)

@section('content')

<div class="container">
    <h1 class="display-1 text-center my-3">{{ $note->title }}</h1>
    <p class="text-start">{{ $note->text }}</p>
    <p>{{ $note->category_name }}</p>
    <p class="text-end">{{ $note->updated_at }}</p>
</div>

<a class="btn btn-info btn-circle btn-xl bnt-bottom-left d-flex flex-column justify-content-center align-items-center" href="{{ url('/notes') }}">
    <i class="bi-x text-white fs-1"></i>
</a>

<a class="btn btn-danger btn-circle btn-xl bnt-bottom-center d-flex flex-column justify-content-center align-items-center" href="{{ url('/notes', ['id' => $note->id]) }}/delete">
    <i class="bi-trash text-white fs-1"></i>
</a>

<a class="btn btn-primary btn-circle btn-xl bnt-bottom-right d-flex flex-column justify-content-center align-items-center" href="{{ url('/notes', ['id' => $note->id]) }}/edit">
    <i class="bi-arrow-left-right text-white fs-2"></i>
</a>

@endsection
