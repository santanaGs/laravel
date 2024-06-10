@extends('layouts.admin')

@section('content')
    <div class="card  mt-3 mb-4 shadow border-light">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Pesquisar contas</span>
        </div>

        <div class="card-body">
            <form action="{{ route('conta.index') }}" class="">
                <div class="row align-items-end">
                    <div class="col-md-3 col-sm-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ $nome }}"
                            placeholder="Nome da conta ...">
                    </div>

                    {{-- data inicial --}}
                    <div class="col-md-3 col-sm-12">
                        <label for="initial_date" class="form-label">Data inicial</label>
                        <input type="date" name="initial_date" id="initial_date" class="form-control"
                            value="{{ $initial_date }}">
                    </div>
                    {{-- data final --}}
                    <div class="col-md-3 col-sm-12">
                        <label for="final_date" class="form-label">Data final</label>
                        <input type="date" name="final_date" id="final_date" class="form-control"
                            value="{{ $final_date }}">
                    </div>

                    {{-- botoes --}}
                    <div class="col-md-3 col-sm-12">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('conta.index') }}" class="btn btn-warning  btn-sm">Limpar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card  my-4 shadow border-light">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Listar contas</span>
            <span>
                <a class="btn btn-sucess" href="{{ route('conta.create') }}">
                    <button class="btn btn-success">
                        Registrar conta
                    </button>
                </a>
                {{-- <a class="btn btn-warning text-white" href="{{ route('conta.pdf-generate') }}">
                    Gerar PDF
                </a> --}}

                <a href="{{ url('pdf-generate?' . request()->getQueryString()) }}" class="btn btn-warning text-white">Gerar
                    PDF</a>
            </span>
        </div>
        @if (session('sucess'))
            <div class="alert alert-success m-3" role="alert">
                {{ session('sucess') }}
            </div>
        @endif
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Conta</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Vencimento</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contas as $conta)
                        <tr>
                            <th scope="row">{{ $conta->id }}</th>
                            <td>{{ $conta->nome }}</td>
                            <td>R$ {{ number_format($conta->valor, 2, ',', '.') }}</td>
                            <td>{{ date('d-m-Y', strtotime($conta->vencimento)) }}</td>
                            <td class="d-md-flex">
                                <a class="text-decoration-none" href="{{ route('conta.show', ['conta' => $conta->id]) }}">
                                    <button class="me-1 btn btn-info  text-light ">Visualizar</button>
                                </a>
                                <a class=" text-decoration-none" href="{{ route('conta.edit', ['conta' => $conta->id]) }}">
                                    <button class=" me-1  btn btn-warning  text-light">Editar</button>
                                </a>
                                <form action="{{ route('conta.destroy', ['conta' => $conta->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger "
                                        onclick="return confirm('Tem certeza que deseja apagar o registro {{ $conta->nome }} ?')">Excluir</button>

                                </form>
                            </td>

                        </tr>
                    @empty
                        <span>nao tem nada</span>
                    @endforelse
                </tbody>
            </table>
            {{ $contas->links() }}
        </div>
    </div>
@endsection
