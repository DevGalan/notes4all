@extends('layouts.note-template')

@section('title', "Nota " . $note->title)

@section('content')

<div class="container">
    <h1 class="display-1 text-center my-3" th:text="${note.title}">Titulo</h1>
    <p class="text-start" th:text="${note.content}">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde beatae, excepturi voluptate nesciunt velit corrupti, ratione, perferendis repellendus architecto laborum error enim optio quidem ex deserunt rem! Provident, nostrum veritatis.
    Obcaecati quam eaque voluptatum eveniet nemo ad incidunt iure quas, sequi provident aut placeat ullam, dolorem in delectus. Debitis quibusdam ad corrupti saepe, inventore animi veniam dolore provident sed assumenda.
    Numquam sed consequuntur harum voluptates inventore voluptatem saepe. Cumque labore accusamus ex ipsa tempore maiores obcaecati similique laborum illum sint, odit explicabo, corrupti excepturi dolores molestias vitae! Eveniet, quos odio.
    Ullam sint pariatur nostrum facere quos. Incidunt dolor corporis ullam explicabo obcaecati debitis nobis esse corrupti illum perspiciatis aperiam ut, exercitationem error suscipit rerum! Quisquam cupiditate illo fugit adipisci fuga!
    Laboriosam expedita quaerat sint qui, sequi incidunt soluta mollitia deserunt vero iusto commodi sunt, laborum praesentium quas itaque sed ab officiis? Cupiditate mollitia quas maxime, deleniti ex vero voluptates at.</p>
    <p class="text-end" th:text="${note.updateDate}">Fecha</p>
</div>
<a class="btn btn-info btn-circle btn-xl bnt-bottom-left d-flex flex-column justify-content-center align-items-center" th:href="@{/notes}"><i class="bi-x text-white fs-1"></i></a>
<a class="btn btn-danger btn-circle btn-xl bnt-bottom-center d-flex flex-column justify-content-center align-items-center" th:href="@{/notes/delete/{id}(id=${note.id})}"><i class="bi-trash text-white fs-1"></i></a>
<a class="btn btn-primary btn-circle btn-xl bnt-bottom-right d-flex flex-column justify-content-center align-items-center" th:href="@{/notes/edit/{id}(id=${note.id})}"><i class="bi-arrow-left-right text-white fs-2"></i></a>

@endsection
