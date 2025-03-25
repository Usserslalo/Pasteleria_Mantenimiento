@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Categoría</h1>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        @include('admin.categorias._form', ['categoria' => new \App\Models\Categoria()])
    </form>
</div>
@endsection
