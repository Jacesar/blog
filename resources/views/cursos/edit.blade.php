@extends('layouts.plantilla')

@section('title', 'Edit')

@section('content')
    {{-- {{$curso}} --}}
    <h1>En Esta pagina podras editar el Curso</h1>
    <form action="{{route('cursos.update', $curso)}}" method="POST">
        {{-- Se deja metodo POST y se agrega directiva @method para un update --}}
        @csrf
        @method('put')
        <label>
            Nombre :
            <br>
            <input type="text" name="name" value="{{old('name', $curso->name)}}">
        </label>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Descripcion :
            <br>
            <textarea name="descripcion" rows="5">{{old('descripcion', $curso->descripcion)}}</textarea>
        </label>
        @error('descripcion')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Categoria :
            <br>
            <input type="text" name="categoria" value="{{old('categoria', $curso->categoria)}}">
        </label>
        @error('categoria')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Actualizar Formulario</button>
    </form>

@endsection
