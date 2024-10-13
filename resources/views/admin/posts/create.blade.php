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
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="control-label"><strong>Titolo :</strong></label>
                        <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Inserisci il titolo" value="{{ old('title') }}" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="col-12 my-2">
                        <label for="" class="control-label"><strong>Immagine :</strong></label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 my-2">
                        <label for="" class="control-label"><strong>Seleziona Tipologia :</strong></label>
                        <select name="type_id" id="" class="form-select form-select-sm" required>
                            <option value="">Seleziona Tipologia</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" @selected($type->id == old ('type_id'))>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- tecnologie -->
                    <div class="col-12">
                        <label for="" class="control-label"><strong>Seleziona Tecnologia :</strong></label>
                        <div>
                            @foreach($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="" name="technologies[]" value="{{$technology->id}}"  @checked(is_array(old('technologies')) && in_array($technology->id, old('technologies')))>
                                <label class="form-check-label" for=""technology_{{ $technology->id }}">{{$technology->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <label for="content" class="control-label"><strong>Contenuto :</strong></label>
                        <textarea class="form-control form-control-sm w-100 textarea-sm" name="content" id="content-post" placeholder="Inserisci il contenuto" required>{{ old('content') }}</textarea>
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