@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.productos._form', ['producto' => new \App\Models\Producto()])
    </form>
</div>
@endsection
