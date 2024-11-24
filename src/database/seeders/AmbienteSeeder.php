<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ambiente;

class AmbienteSeeder extends Seeder
{
    public function run()
    {
        $ambientes = [
            [
                'name' => 'Auditório',
                'description' => 'Serve para realização de reuniões ou palestras com bastante gente.',
                'is_active' => true,
                'materiais' => '2 microfones, 2 datashows, 2 caixas de som, uma televisão, uma mesa de som',
                'capacidade' => 400,
                'icon' => '🎤'
            ],
            [
                'name' => 'Biblioteca',
                'description' => 'Local calmo e tranquilo para a realização de trabalhos de pesquisa ou para realização de projetos de TCC, alémd e ser um lugar calmo onde você pode descansar lendo um livro enquanto fica no ar-condicionado.',
                'is_active' => true,
                'materiais' => '5 mesas para estudo, 4 computadores, acervo com mais de 200 livros',
                'capacidade' => 50,
                'icon' => '📚'
            ],
            [
                'name' => 'LabMac',
                'description' => 'Sala com 30 macs para a realização de trabalhos de design, edição de vídeos e fotos. utilizado normalmente em aulas padrões do curso de Sistemas para Internet.',
                'is_active' => true,
                'materiais' => '30 computadores, 30 cadeiras, 30 monitores, 30 teclados, 30 mouses',
                'capacidade' => 40,
                'icon' => '💡'
            ],
            [
                'name' => 'Salas de aula 15',
                'description' => 'Sala de aula padrão com 45 cadeiras e 45 mesas, ótima opção para uma reunião com um turma completa.',
                'is_active' => true,
                'materiais' => '45 cadeiras e 45 mesas, 1 quadro branco, 1 projetor multimídia, 2 ar-condicionados, 1 caixa de som, 1 microfone e 1 computador',
                'capacidade' => 50,
                'icon' => '🖊️'
            ],
            // Adicione mais ambientes aqui
        ];

        foreach ($ambientes as $ambiente) {
            Ambiente::create($ambiente);
        }
    }
}