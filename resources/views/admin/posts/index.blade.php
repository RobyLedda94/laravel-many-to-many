@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="my-3">Tabella dei Post</h3>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Aggiungi nuovo elemento
                </a>
                <hr>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <div class="">
                                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="me-2 btn btn-sm btn-primary" aria-label="Visualizza post">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="me-2 btn btn-sm btn-warning" aria-label="Modifica post">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete">Cancella</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.posts.partials.modal_delete')
@endsection