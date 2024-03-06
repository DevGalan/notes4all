@extends('layouts.note-template')

@section('title', "Formulario")

@section('content')

<div class="container my-3">
    <div class="row">
        <div class="col-md-10">
            <form th:action="@{/notes}" method="post" th:object="${note}">

                <input type="hidden" th:field="*{id}">

                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" th:field="*{title}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenido</label>
                    <textarea type="text" class="form-control" id="content" th:field="*{content}" th:text="${note.content}" required></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-circle btn-xl bnt-bottom-right d-flex flex-column justify-content-center align-items-center"><i class="bi-check2 text-white fs-2"></i></button>
            </form>
        </div>
    </div>
</div>
<a class="btn btn-info btn-circle btn-xl bnt-bottom-left d-flex flex-column justify-content-center align-items-center" th:href="@{/notes}"><i class="bi-x text-white fs-1"></i></a>

@endsection
