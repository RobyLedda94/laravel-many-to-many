@extends('layouts.app')

@section('content')
    <div class="container-fluid p-3">
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li> 
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12">
                <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="control-label"><strong>Titolo :</strong></label>
                        <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Inserisci il titolo" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class=" my-3 col-12">
                    @if (Str::startsWith($post->cover_image, 'https'))
                        <img class="img-fluid" src="{{ $post->cover_image }}" alt="{{ $post->title }}">
                    @else
                        <img class="img-fluid" src="{{ asset('./storage/'. $post->cover_image) }}" alt="{{ $post->title }}">
                     @endif
                     <div class=" my-3">
                        <label for="" class="control-label">Immagine</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control form-control-sm">
                     </div>
                    </div>
                    <div class="col-12 my-2">
                        <label for="" class="control-label"><strong>Seleziona Tipologia :</strong></label>
                        <select name="type_id" id="" class="form-select form-select-sm" required>
                            <option value="">Seleziona Tipologia</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" @selected($type->id == old ('type_id', $post->type ? $post->type->id : ''))>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- tecnologie -->
                    <div class="col-12">
                        <label for="" class="control-label"><strong>Seleziona Tecnologia :</strong></label>
                        <div>
                            @foreach($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <!-- controllo degli errori -->
                                 @if($errors->any())
                                    <input type="checkbox" name="technologies[]" id="" class="form-check-input" value="{{$technology->id}}" {{ in_array($technology->id, old('technologies')) ? 'checked' : '' }}>
                                 @else
                                    <input type="checkbox" name="technologies[]" id="" class="form-check-input" value="{{$technology->id}}" {{$post->technologies->contains($technology->id) ? 'checked' : ''}}>
                                 @endif
                                <!-- <input class="form-check-input" type="checkbox" id="" name="technologies[]" value="{{$technology->id}}"  @checked(is_array(old('technologies')) && in_array($technology->id, old('technologies')))> -->
                                 
                                <label class="form-check-label" for=""technology_{{ $technology->id }}">{{$technology->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <label for="content" class="control-label"><strong>Contenuto :</strong></label>
                        <textarea class="form-control form-control-sm w-100 textarea-sm" name="content" id="content-post" placeholder="Inserisci il contenuto">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection