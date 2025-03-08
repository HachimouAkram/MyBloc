<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Liste des Posts</h1>
        
        @if(isset($posts) && count($posts) > 0)
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post['title'] }}</h5>
                                <p class="card-text">{{($post['body']) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-danger">Aucun post disponible.</p>
        @endif
    </div>
</body>
</html>
