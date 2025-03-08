@extends('base')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Créer un Article</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre de l'article</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Enregietrer</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
