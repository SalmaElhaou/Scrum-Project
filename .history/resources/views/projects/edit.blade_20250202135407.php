@extends('layouts.app')

@section('title','Modifier le Projet')

@section('content')

<div class="container">
<h2>Modifier le Projet</h2>
<form action="{{ route('projects.update', $project->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-">

    </div>

</form>
</div>
@endsection
