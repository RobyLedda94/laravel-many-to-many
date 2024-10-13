@extends('layouts.app')

@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="card p-2" style="width: 18rem;">
                @if (Str::startsWith($post->cover_image, 'https'))
                    <img class="img-fluid" src="{{ $post->cover_image }}" alt="{{ $post->title }}">
                @else
                    <img class="img-fluid" src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->slug }}</p>
                    <p class="card-text">
                        @if ($post->type)
                            {{ $post->type->name }}
                        @else
                            <span class="text-danger">Tipo non disponibile</span>
                        @endif
                    </p>
                    <p>
                        @forelse ($post->technologies as $technology)
                            {{ $technology->name }}
                        @empty
                            Il post non ha tag assegnati
                        @endforelse
                    </p>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
                <div class="card-footer text-muted">
                    <small>Pubblicato il {{ $post->created_at->format('d/m/Y') }}</small>
                </div>
            </div>
        </div>
    </div>
@endsection


