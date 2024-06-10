@extends('layouts.admin')

@section('content')
    @if (session('sucess'))
        <p style="color: green;">
            {{ session('sucess') }}
        </p>
    @endif


    <div class="card  my-4 shadow border-light">
        <div class="card-header d-flex justify-content-between align-items-center">
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
        </div>
        @if (session('sucess'))
            <div class="alert alert-success m-3" role="alert">
                {{ session('sucess') }}
            </div>
        @endif

        <div class="card-body">
            <form action="{{ route('conta.update', ['conta' => $conta->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-control" value="{{ old('nome', $conta->nome) }}" type="text" name="nome"
                        id="nome" placeholder="Nome da conta">
                    @error('nome')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <label class="form-label" for="valor">Valor</label>
                    <input class="form-control"
                        value="{{ old('valor', isset($conta->valor) ? number_format($conta->valor, '2', ',', '.') : '') }}"
                        type="text" name="valor" id="valor" placeholder="valor da conta">
                    @error('valor')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label class="form-label" for="date">Vencimento</label>
                    <input class="form-control" value="{{ old('vencimento', $conta->vencimento) }}" type="date"
                        name="vencimento" id="date">
                    @error('vencimento')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-danger" type="submit">Salvar</button>
            </form>
        </div>
    </div>
@endsection
