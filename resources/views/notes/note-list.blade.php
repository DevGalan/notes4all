@extends('layouts.note-template')

@section('title', "Notas")

@section('content')

<div class="container">
    <h1 class="display-1 text-center my-3">Mis notas</h1>
    <div class="row g-3 justify-content-md-center align-items-center align-items-stretch">
        <div class="col-6 col-md-4" th:each="note : ${notes}">
            <a class="btn btn-outline-dark w-100 h-100" th:href="@{/notes/{id}(id=${note.id})}">
                <h1 th:text="${note.title}">Titulo</h1>
                <p th:text="${#strings.length(note.content) > 200 ? #strings.substring(note.content, 0, 200) + '...' : note.content}">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut reprehenderit in et. Velit modi praesentium sunt labore officiis, porro ab laudantium voluptate tempora rerum pariatur voluptates quam quisquam voluptas in...</p>
                <p class="text-end" th:text="${note.updateDate}">Fecha</p>
            </a>
        </div>
    </div>
</div>
<a class="btn btn-warning btn-circle btn-xl bnt-bottom-right d-flex flex-column justify-content-center align-items-center" th:href="@{/notes/new}"><i class="bi-plus text-white fs-1"></i></a>
<div class="div-bottom-center w-100 d-flex justify-content-center">
    <div class="bg-white border rounded border-black d-flex align-items-center"><p>"<span th:text="${joke}">Chuck Norris declined to be in 'The Expendables' because it contained pussies like Jet Li and Dolph Lundgren.</span>"</p></div>
</div>
<a class="btn btn-primary btn-circle btn-xl bnt-bottom-left d-flex flex-column justify-content-center align-items-center" href="/logout"><i class="bi-box-arrow-in-left text-white fs-1"></i></a>

@endsection
