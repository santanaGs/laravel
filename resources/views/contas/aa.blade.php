@section('content')
    <p>CRIAR as contas</p>

    @if (session('error'))
        <p style="color: red;">
            {{ session('error') }}
        </p>
    @endif

    <form action="{{ route('conta.store') }}" method="post">
        @csrf
        <label for="nome">Nome</label>
        <input value="{{ old('nome') }}" type="text" name="nome" id="nome" placeholder="Nome da conta">
        @error('nome')
            <p>{{ $message }}</p>
        @enderror
        <br><br>
        <label for="valor">Valor</label>
        <input value="{{ old('valor') }}" type="text" name="valor" id="valor" placeholder="valor da conta">
        @error('valor')
            <div>{{ $message }}</div>
        @enderror
        <br><br>
        <label for="date">Vencimento</label>
        <input value="{{ old('vencimento') }}" type="date" name="vencimento" id="data">
        @error('vencimento')
            <div>{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Cadatrar</button>

    </form>

    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
