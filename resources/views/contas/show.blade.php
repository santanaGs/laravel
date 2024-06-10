@extends('layouts.admin')

@section('content')
    @if (session('sucess'))
        <p style="color: green;">
            {{ session('sucess') }}
        </p>
    @endif

    <div class="card  my-4 shadow border-light">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Visualizar conta</span>
            <span>
                <a class="btn btn-info" href="{{ route('conta.index') }}">
                    <button class="btn text-light btn-info">
                        Listar contas
                    </button>
                </a>
                <a class="btn btn-warning" href="{{ route('conta.edit', ['conta' => $conta->id]) }}">
                    <button class="btn btn-warning text-light">Editar</button>
                </a>
            </span>
        </div>
        @if (session('sucess'))
            <div class="alert alert-success m-3" role="alert">
                {{ session('sucess') }}
            </div>
        @endif

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">
                    {{ $conta->id }}
                </dd>
                <dt class="col-sm-3">Conta</dt>
                <dd class="col-sm-9">
                    {{ $conta->nome }}
                </dd>
                <dt class="col-sm-3">Valor</dt>
                <dd class="col-sm-9">
                    {{ number_format($conta->valor, 2, ',', '.') }}
                </dd>
                <dt class="col-sm-3">Vencimento</dt>
                <dd class="col-sm-9">
                    {{ date('d-m-Y', strtotime($conta->vencimento)) }}
                </dd>
                <dt class="col-sm-3">Lançamento</dt>
                <dd class="col-sm-9">
                    {{ date('d-m-Y', strtotime($conta->created_at)) }}
                </dd>
            </dl>
        </div>
    </div>
@endsection
