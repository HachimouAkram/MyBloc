<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Menu de Navigation</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-primary">{{ $post->title }}</h1>
                        <p class="card-text text-muted">{{ $post->content }}</p>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-danger">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
