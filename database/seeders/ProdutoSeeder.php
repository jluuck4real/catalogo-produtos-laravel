<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produtos')->delete();
        $agora = now();

        DB::table('produtos')->insert([
            ['nome' => 'Notebook Lenovo IdeaPad 3', 'descricao' => 'Notebook para trabalho e estudo, com SSD de 512 GB.', 'categoria' => 'Informática', 'preco' => 3499.90, 'quantidade' => 12, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'Mouse sem fio Logitech M170', 'descricao' => 'Mouse compacto sem fio com receptor USB.', 'categoria' => 'Acessórios', 'preco' => 79.90, 'quantidade' => 35, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'Teclado mecânico Redragon Kumara', 'descricao' => 'Teclado mecânico compacto com iluminação e conexão USB.', 'categoria' => 'Acessórios', 'preco' => 249.90, 'quantidade' => 18, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'Monitor LG 24 polegadas Full HD', 'descricao' => 'Monitor IPS Full HD para uso doméstico e profissional.', 'categoria' => 'Informática', 'preco' => 899.00, 'quantidade' => 9, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'Fone Bluetooth JBL Tune 520BT', 'descricao' => 'Fone sem fio com microfone integrado e bateria de longa duração.', 'categoria' => 'Áudio', 'preco' => 279.90, 'quantidade' => 22, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'Webcam Logitech C920', 'descricao' => 'Webcam Full HD com microfones estéreo para videochamadas.', 'categoria' => 'Acessórios', 'preco' => 459.90, 'quantidade' => 7, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'SSD Kingston NV2 1 TB', 'descricao' => 'Unidade SSD NVMe M.2 de 1 TB para computadores compatíveis.', 'categoria' => 'Armazenamento', 'preco' => 429.90, 'quantidade' => 15, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'Hub USB-C Baseus 6 em 1', 'descricao' => 'Adaptador USB-C com HDMI, USB-A, leitor de cartões e alimentação.', 'categoria' => 'Acessórios', 'preco' => 219.90, 'quantidade' => 11, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'Cadeira de escritório ergonômica', 'descricao' => 'Cadeira com ajuste de altura, apoio lombar e braços acolchoados.', 'categoria' => 'Móveis', 'preco' => 799.90, 'quantidade' => 5, 'created_at' => $agora, 'updated_at' => $agora],
            ['nome' => 'Impressora multifuncional Epson EcoTank', 'descricao' => 'Impressora tanque de tinta com scanner e conexão Wi-Fi.', 'categoria' => 'Impressão', 'preco' => 1199.00, 'quantidade' => 4, 'created_at' => $agora, 'updated_at' => $agora],
        ]);
    }
}
