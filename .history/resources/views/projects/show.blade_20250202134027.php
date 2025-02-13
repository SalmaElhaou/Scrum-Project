@extends('layouts.app')

@section('title','Details de Projet')

@section('content')
<div class="container">
<h2>{{$project->name}}</h2>
<p>{{$project->description}}</p>
<p><strong>Date de Début :</strong>{{$project->start-date}}</p>
<p><strong>Date de Fin :</strong>{{$project->end-date}}</p>
<p><strong>Date de Debut:</strong>{{$project->start-date}}</p>

</div>

@endsection
