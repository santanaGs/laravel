<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class ContaController extends Controller
{
    //listar as contas
    public function index(Request $request)
    {
        $contas = Conta::when($request->has('nome'), function ($whenQuery) use ($request) {
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
            ->when($request->filled('initial_date'), function ($whenQuery) use ($request) {
                $whenQuery->where('vencimento', '>=', \Carbon\Carbon::parse($request->initial_date)->format('Y-m-d'));
            })
            ->when($request->filled('final_date'), function ($whenQuery) use ($request) {
                $whenQuery->where('vencimento', '<=', \Carbon\Carbon::parse($request->final_date)->format('Y-m-d'));
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
        return view(
            'contas.index',
            [
                'contas' => $contas,
                'nome' => $request->nome,
                'initial_date' => $request->initial_date,
                'final_date' => $request->final_date
            ],
        );
    }

    // tela para criar uma conta
    public function create()
    {
        return view('contas.create');
    }

    // cadastar a conta no banco de dados
    public function store(ContaRequest $request)
    {
        // Validacao do formulario
        $request->validated();

        try {
            // Cadastro no banco de dados
            $conta = Conta::create([
                'nome' => $request->nome,
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
                'vencimento' => $request->vencimento
            ]);

            // Redirect após cadastro
            return redirect()->route('conta.index', ['conta' => $conta->id])->with('sucess', 'conta cadastrada com sucesso');
        } catch (Exception $erro) {
            return back()->withInput()->with('error', 'o limite maximo de caracteres sao de 8 numeros');
        }
    }

    // modatrar detalhes da contas
    public function show(Conta $conta)
    {
        return view('contas.show', ['conta' => $conta]);
    }

    // pagina de editacao
    public function edit(Conta $conta)
    {
        return view('contas.edit', ['conta' => $conta]);
    }

    // editar uma conta no banco de dados
    public function update(ContaRequest $request, Conta $conta)
    {
        $request->validated();
        // dd($request);

        try {
            // EDITAR NO BANCO
            $conta->update([
                'nome' => $request->nome,
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
                'vencimento' => $request->vencimento
            ]);

            // REGISTRAR O LOGO DE ERROS
            Log::info('Conta registrada com sucesso', ['id' => $conta->id]);

            // Redirect após atualizacao
            return redirect()->route('conta.show', ['conta' => $conta->id])->with('sucess', 'conta editada com sucesso');
        } catch (Exception $error) {
            Log::warning('Erro ao editar a conta', ['conta'  => $conta->id]);
            return back()->withInput()->with('error', 'conta nao editada');
        }
    }

    // excluir uma conta no banco de dados
    public function destroy(Conta $conta)
    {
        $conta->delete();

        // Redirect após atualizacao
        return redirect()->route('conta.index')->with('sucess', 'conta apagada com sucesso');
    }

    // criar PDF
    public function pdf_generate(Request $request)
    {

        // $contas = Conta::orderByDesc('created_at')->get();
        $contas = Conta::when($request->has('nome'), function ($whenQuery) use ($request) {
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
            ->when($request->filled('initial_date'), function ($whenQuery) use ($request) {
                $whenQuery->where('vencimento', '>=', \Carbon\Carbon::parse($request->initial_date)->format('Y-m-d'));
            })
            ->when($request->filled('final_date'), function ($whenQuery) use ($request) {
                $whenQuery->where('vencimento', '<=', \Carbon\Carbon::parse($request->final_date)->format('Y-m-d'));
            })
            ->orderByDesc('created_at')
            ->get();

        $totalValor = $contas->sum('valor');



        $pdf =  Pdf::loadView('contas.generate_pdf', ['contas' => $contas, 'totalValor' => $totalValor])->setPaper('a4', 'portrait');
        return $pdf->download('contas.pdf');
    }
}
