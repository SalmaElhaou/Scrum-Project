@extends('layouts.app')

@section('title','Details de Projet')

@section('content')
<div class="container">
<h2>{{$project->name}}</h2>
<p>{{$project->description}}</p>
<p><strong>Date de Début :</strong>{{$project->start_date}}</p>
<p><strong>Date de Fin :</strong>{{$project->end_date}}</p>
<p><strong>Créé le :</strong>{{$project->created_at->format('d/m/Y H:i')}}</p>
<p><strong>Dernière modification :</strong>{{ $project->updated_at->format('d/m/Y H:i') }}</p>

<a href="{{ route('projects.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
