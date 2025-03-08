@extends('base')

@section('content')
    <h1 class="mb-4 text-center">Liste des Articles</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Créer un Article</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Extrait</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td class="d-inline-flex gap-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        
                        <!-- Bouton de suppression avec SweetAlert2 -->
                         <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $post->id }})">Supprimer</button>


                        <!-- Formulaire de suppression (caché) -->
                        <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function confirmDelete(postId) {
            Swal.fire({
                title: 'Êtes-vous sûr de suprimer l article ' +postId+' ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Soumettre le formulaire de suppression
                    document.getElementById('delete-form-' + postId).submit();
                }
            });
        }
    </script>

@endsection
