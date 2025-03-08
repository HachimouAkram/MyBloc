@extends('base')


@section('content')
    <h1 class="mb-4 text-center">Liste des Articles</h1>


    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $post->title }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($post->content, 100) }}
                        </p><a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Lire la suite</a>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
