@extends('layout')
@section('title','Contador de caracteres')
@section('page_name','Exemplo de contador de caracteres')
@section('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success d-flex align-items-center col" role="alert">
            <div>
                Tudo certo!
            </div>
        </div>
    @endif
    <form action="{{ route('submit') }}" method="post">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-7">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome completo</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           placeholder="Digite seu nome completo. Exemplo: José da Silva Sauro"
                           name="name"
                           value="{{ old('name') }}">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="about" class="form-label">Conte mais sobre você</label>
                    <textarea class="form-control @error('about') is-invalid @enderror"
                            id="about"
                            rows="7"
                            placeholder="Digite aqui algo sobre você..."
                            name="about">{{ old('about') }}</textarea>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 col-12 mx-auto">
            <button class="btn btn-primary" type="submit">Enviar os dados</button>
        </div>
    </form>
@endsection
@section('js')
    <script>
        enableCharacterCounter('name',70);
        enableCharacterCounter('about',300);
    </script>
@endsection
