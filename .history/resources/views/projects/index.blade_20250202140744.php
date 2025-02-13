@extends('layouts.app')

@section('title', 'Liste des Projets')

@section('content')
<div class="container">
    <h2>Liste des Projets</h2>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Créer un Projet</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Date de création</th>
                <th>Date de modification</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>{{ $project->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $project->updated_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifier</a>

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
