<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contas</title>
</head>

<body style="font-size: 12px; text-align: center">
    <h2 style="text-align: center;">Contas</h2>
    <table style="border-collapse: collapse; width: 100%; text-align: center">
        <thead>
            <tr style="background-color: #adb5bd">
                <th style="border: 1px solid #ccc;">ID</th>
                <th style="border: 1px solid #ccc;">Nome</th>
                <th style="border: 1px solid #ccc;">Vencimento</th>
                <th style="border: 1px solid #ccc;">Valor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contas as $conta)
                <tr style="border: 1px solid #ccc; border-top: none">
                    <td>{{ $conta->id }}</td>
                    <td>{{ $conta->nome }}</td>
                    <td>{{ date('d-m-Y', strtotime($conta->vencimento)) }}</td>
                    <td>R$ {{ number_format($conta->valor, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma conta encontrada!</td>
                </tr>
            @endforelse
            <tr>
                <td colspan="3" style="border: 1px solid #ccc; border-top: none; text-align:center">Total</td>
                <td style="border: 1px solid #ccc; border-top: none;">
                    {{ 'R$' . number_format($totalValor, 2, ',', '.') }}</td>
            </tr>
        </tbody>

    </table>
</body>

</html>
