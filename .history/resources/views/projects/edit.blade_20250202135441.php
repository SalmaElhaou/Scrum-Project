@extends('layouts.app')

@section('title','Modifier le Projet')

@section('content')

<div class="container">
<h2>Modifier le Projet</h2>
<form action="{{ route('projects.update', $project->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label dropzone="">Nom du Projet</label>

    </div>

</form>
</div>
@endsection
