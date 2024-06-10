@extends('layouts.admin')

@section('content')
    @if (session('sucess'))
        <p style="color: green;">
            {{ session('sucess') }}
        </p>
    @endif

    <div class="card  my-4 shadow border-light">
        {{-- <div class="card-header d-flex justify-content-between align-items-center">
            <span>Editar conta</span>
            <span>
                <a class="btn btn-info" href="{{ route('conta.index') }}">
                    <button class="btn text-light btn-info">
                        Listar contas
                    </button>
                </a>
                <a class="btn btn-success" href="{{ route('conta.show', ['conta' => $conta->id]) }}">
                    <button class="btn btn-success text-light">Visualizar</button>
                </a>
            </span>
        </div> --}}
        @if (session('sucess'))
            <div class="alert alert-success m-3" role="alert">
                {{ session('sucess') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger m-3" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
            <br>
        @endif

        <div class="card-body">
            <form action="{{ route('conta.store') }}" method="post" class="row g-3">
                @csrf
                <div class="col-12">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-control" value="{{ old('nome') }}" type="text" name="nome" id="nome"
                        placeholder="Nome da conta">

                </div>
                <div class="col-12">
                    <label class="form-label" for="valor">Valor</label>
                    <input class="form-control" value="{{ old('valor') }}" type="text" name="valor" id="valor"
                        placeholder="valor da conta">
                </div>
                <div class="col-12">
                    <label class="form-label" for="date">Vencimento</label>
                    <input class="form-control" value="{{ old('vencimento') }}" type="date" name="vencimento"
                        id="date">
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
