@extends('layouts.app')

@section('title','Modifier le Projet')

@section('content')

<div class="container">
<h2>Modifier le Projet</h2>
<form action="{{ route('projects.update', $project->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nom du Projet</label>
        <input type="text" id="name" name="name" class="form-control" value="{{$project->name}}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Nom du Projet</label>
        <input type="text" id="description" name="description" class="form-control" value="{{$project->description}}">
    </div>

    
</form>
</div>
@endsection
