@extends('layouts.app')

@section('title','Modifier le Projet')

@section('content')

<div class="container">
<h2>Modifier le Projet</h2>
<form action="{{ route('projects.update', $project->id)}}">

</form>
</div>
@endsection
