@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Crear Post </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}"> Listado de Post </a></li>
                        <li class="breadcrumb-item active"> Crear Post </li>
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
                                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="title"> Título </label>
                                                <input type="text" name="title" class="form-control" id="title" placeholder="Ingrese título">
                                            </div>
                                            <div class="form-group">
                                                <label for="content"> Contenido </label>
                                                <textarea name="content" class="form-control" id="content" placeholder="Escriba el contenido">{{ old('content') }} </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="image"> Imagen </label>
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="image"> Seleccione una imagen </label>
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-lg btn-primary"> Crear </button>
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