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
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>{{ $project->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $project->updated_at->format('d/m/Y H:i') }}</td>
                <td>
                    <!-- Bouton pour ouvrir la modale -->
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#projectModal{{ $project->id }}">
                        D
                    </button>

                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifier</a>

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                    </form>

                    <!-- Fenêtre Modale -->
                    <div class="modal fade" id="projectModal{{ $project->id }}" tabindex="-1" aria-labelledby="projectModalLabel{{ $project->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="projectModalLabel{{ $project->id }}">{{ $project->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Description :</strong> {{ $project->description }}</p>
                                    <p><strong>Date de Début :</strong> {{ $project->start_date }}</p>
                                    <p><strong>Date de Fin :</strong> {{ $project->end_date }}</p>
                                    <p><strong>Créé le :</strong> {{ $project->created_at->format('d/m/Y H:i') }}</p>
                                    <p><strong>Dernière modification :</strong> {{ $project->updated_at->format('d/m/Y H:i') }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
