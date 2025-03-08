<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Recherche d'Articles</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Recherche d'Articles</h1>

        <!-- Champ de recherche -->
        <form id="searchForm" class="mb-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un article...">
        </form>

        <!-- Conteneur des articles -->
        <div id="articlesContainer" class="row">
            @foreach ($posts as $post)
                <div class="col-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $post->title }}</h5>
                            <p class="card-text text-muted">
                                {{ Str::limit($post->content, 100) }}
                            </p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Lire la suite</a>
                            <a href="{{ route('view') }}" class="btn btn-outline-danger">Retour</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Script JavaScript pour la recherche dynamique -->
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                const query = $(this).val();

                $.ajax({
                    url: "{{ route('posts.search') }}",
                    type: 'GET',
                    data: { query: query },
                    success: function(response) {
                        let results = '';
                        response.forEach(post => {
                            results += `
                                <div class="col-12 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">${post.title}</h5>
                                            <p class="card-text text-muted">
                                                ${post.content.substring(0, 100)}...
                                            </p>
                                             <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Lire la suite</a>
                                             <a href="{{ route('view') }}" class="btn btn-outline-danger">Retour</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });

                        $('#articlesContainer').html(results);
                    },
                    error: function() {
                        $('#articlesContainer').html('<p class="text-danger">Erreur lors de la recherche.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
