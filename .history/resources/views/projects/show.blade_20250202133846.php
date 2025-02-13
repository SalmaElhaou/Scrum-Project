@extends('layouts.app')

@section('title','Details de Projet')

@section('content')
<div class="container">
<h2>{{$project->name}}</h2>
<p>{{$project->description}}</p>
<p><strong></strong></p>
</div>

@endsection
