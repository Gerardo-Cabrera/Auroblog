@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Editar Post </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}"> Listado de Post </a></li>
                        <li class="breadcrumb-item active"> Editar Post </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <form action="{{ route('posts.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="title"> Título </label>
                                                <input type="text" name="title" class="form-control" id="title" placeholder="Ingrese título" value="{{ $post->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="content"> Contenido </label>
                                                <textarea name="content" class="form-control" id="content" placeholder="Ingrese el contenido"> {{$post->content }} </textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label for="image"> Imagen </label>
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="image"> Seleccione una imagen </label>
                                                            <input type="file" name="image" class="custom-file-input" id="image">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div style="max-width: 100px; max-height: 100px; overflow: hidden; margin-left: auto;">
                                                            <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-lg btn-primary"> Actualizar </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('/admin/js/summernote-bs4.min.js')}}"></script>
    <script>
        $('#content').summernote({
          placeholder: 'Escriba el contenido',
          tabsize: 2,
          height: 250
        });
    </script>
@endsection