@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Listado de Posts </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary"> Crear Post </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 264px"> Titulo </th>
                                        <th> Imagen </th>
                                        <th> Contenido </th>
                                        <th class="text-center" style="width: 134px"> Autor </th>
                                        <th style="width: 172px"> Fecha de publicación </th>
                                        <th class="text-center" style="width: 40px"> Acción </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($posts->count())
                                        @foreach($posts as $post)
                                            <tr>
                                                <td> {{ $post->title }} </td>
                                                <td> 
                                                    <div style="max-width: 70px; max-height: 70px; overflow: hidden;">
                                                        <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                                                    </div>
                                                </td>
                                                <td class="text-justify"> {{ $post->content }} </td>
                                                <td class="text-center"> {{ $post->user->name }} </td>
                                                <td class="text-center"> {{ $post->date }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route ('posts.destroy', [$post->id]) }}" class="mr-1" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">
                                                <h5 class="text-center"> No hay post </h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center" style="margin-left: 1%;">
        {{ $posts->links() }}
    </div>
@endsection