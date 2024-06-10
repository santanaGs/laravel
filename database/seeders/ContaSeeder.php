<?php

namespace Database\Seeders;

use App\Models\Conta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Conta::where("nome", "Energia")->first()) {
            Conta::create([
                'nome' => 'Energia',
                'valor' => '123.45',
                'vencimento' => '2024-04-20'
            ]);
        }

        if (!Conta::where("nome", "Internet")->first()) {
            Conta::create([
                'nome' => 'Internet',
                'valor' => '321.45',
                'vencimento' => '2024-04-20'
            ]);
        }

        if (!Conta::where("nome", "Internet")->first()) {
            Conta::create([
                'nome' => 'Cartao Nubank',
                'valor' => '1567.89',
                'vencimento' => '2024-04-20'
            ]);
        }

        if (!Conta::where("nome", "Internet")->first()) {
            Conta::create([
                'nome' => 'Gás',
                'valor' => '110.00',
                'vencimento' => '2024-04-20'
            ]);
        }

        // Modelo 1
        if (!Conta::where("nome", "Internet")->first()) {
            Conta::create([
                'nome' => 'Gás',
                'valor' => '110.00',
                'vencimento' => '2024-04-20'
            ]);
        }

        // Modelo 2
        if (!Conta::where("nome", "Eletricidade")->first()) {
            Conta::create([
                'nome' => 'Água',
                'valor' => '90.00',
                'vencimento' => '2024-04-25'
            ]);
        }

        // Modelo 3
        if (!Conta::where("nome", "Telefone")->first()) {
            Conta::create([
                'nome' => 'Telefone Fixo',
                'valor' => '50.00',
                'vencimento' => '2024-04-30'
            ]);
        }

        // Modelo 4
        if (!Conta::where("nome", "TV a Cabo")->first()) {
            Conta::create([
                'nome' => 'TV a Cabo',
                'valor' => '80.00',
                'vencimento' => '2024-05-05'
            ]);
        }

        // Modelo 5
        if (!Conta::where("nome", "Seguro de Saúde")->first()) {
            Conta::create([
                'nome' => 'Seguro de Saúde',
                'valor' => '200.00',
                'vencimento' => '2024-05-10'
            ]);
        }

        // Modelo 6
        if (!Conta::where("nome", "Aluguel")->first()) {
            Conta::create([
                'nome' => 'Aluguel',
                'valor' => '1200.00',
                'vencimento' => '2024-05-15'
            ]);
        }

        // Modelo 7
        if (!Conta::where("nome", "Plano de Celular")->first()) {
            Conta::create([
                'nome' => 'Plano de Celular',
                'valor' => '60.00',
                'vencimento' => '2024-05-20'
            ]);
        }

        // Modelo 8
        if (!Conta::where("nome", "Academia")->first()) {
            Conta::create([
                'nome' => 'Academia',
                'valor' => '150.00',
                'vencimento' => '2024-05-25'
            ]);
        }

        // Modelo 9
        if (!Conta::where("nome", "Internet")->first()) {
            Conta::create([
                'nome' => 'Internet',
                'valor' => '90.00',
                'vencimento' => '2024-05-28'
            ]);
        }

        // Modelo 10
        if (!Conta::where("nome", "Impostos")->first()) {
            Conta::create([
                'nome' => 'Impostos',
                'valor' => '500.00',
                'vencimento' => '2024-06-01'
            ]);
        }

        // Modelo 11
        if (!Conta::where("nome", "Manutenção do Carro")->first()) {
            Conta::create([
                'nome' => 'Manutenção do Carro',
                'valor' => '300.00',
                'vencimento' => '2024-06-05'
            ]);
        }

        // Modelo 12
        if (!Conta::where("nome", "Seguro do Carro")->first()) {
            Conta::create([
                'nome' => 'Seguro do Carro',
                'valor' => '250.00',
                'vencimento' => '2024-06-10'
            ]);
        }

        // Modelo 13
        if (!Conta::where("nome", "Escola dos Filhos")->first()) {
            Conta::create([
                'nome' => 'Escola dos Filhos',
                'valor' => '400.00',
                'vencimento' => '2024-06-15'
            ]);
        }

        // Modelo 14
        if (!Conta::where("nome", "Cartão de Crédito")->first()) {
            Conta::create([
                'nome' => 'Cartão de Crédito',
                'valor' => '700.00',
                'vencimento' => '2024-06-20'
            ]);
        }

        // Modelo 15
        if (!Conta::where("nome", "Cinema")->first()) {
            Conta::create([
                'nome' => 'Cinema',
                'valor' => '50.00',
                'vencimento' => '2024-06-25'
            ]);
        }

        // Modelo 16
        if (!Conta::where("nome", "Viagem")->first()) {
            Conta::create([
                'nome' => 'Viagem',
                'valor' => '1000.00',
                'vencimento' => '2024-06-30'
            ]);
        }

        // Modelo 17
        if (!Conta::where("nome", "Roupas")->first()) {
            Conta::create([
                'nome' => 'Roupas',
                'valor' => '200.00',
                'vencimento' => '2024-07-05'
            ]);
        }

        // Modelo 18
        if (!Conta::where("nome", "Presentes")->first()) {
            Conta::create([
                'nome' => 'Presentes',
                'valor' => '150.00',
                'vencimento' => '2024-07-10'
            ]);
        }

        // Modelo 19
        if (!Conta::where("nome", "Educação")->first()) {
            Conta::create([
                'nome' => 'Educação',
                'valor' => '300.00',
                'vencimento' => '2024-07-15'
            ]);
        }

        // Modelo 20
        if (!Conta::where("nome", "Livros")->first()) {
            Conta::create([
                'nome' => 'Livros',
                'valor' => '80.00',
                'vencimento' => '2024-07-20'
            ]);
        }
    }
}
