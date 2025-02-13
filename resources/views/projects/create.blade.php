@extends('layouts.app')

@section('title', 'Créer un Projet')

@section('content')
<div class="container">
    <h2>Créer un Nouveau Projet</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom du Projet</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Date de Début</label>
            <input type="date" id="start_date" name="start_date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Date de Fin</label>
            <input type="date" id="end_date" name="end_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
