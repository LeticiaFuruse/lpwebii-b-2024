<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;
use App\Models\Cargos;

class CargoSeeder extends Seeder
{
    public function run()
    {
        $cargos = [
            ['cargo_nome' => 'Programador Júnior', 'cargo_descricao' => 'Desenvolvedor iniciante com conhecimentos básicos.'],
            ['cargo_nome' => 'Programador Pleno', 'cargo_descricao' => 'Desenvolvedor com experiência intermediária.'],
            ['cargo_nome' => 'Programador Sênior', 'cargo_descricao' => 'Desenvolvedor com ampla experiência e habilidades avançadas.'],
            ['cargo_nome' => 'Engenheiro de Software', 'cargo_descricao' => 'Profissional focado em arquitetar e implementar sistemas complexos.'],
            ['cargo_nome' => 'Desenvolvedor Frontend', 'cargo_descricao' => 'Especialista em tecnologias de frontend, como HTML, CSS, JavaScript.'],
            ['cargo_nome' => 'Desenvolvedor Backend', 'cargo_descricao' => 'Especialista em backend, com foco em banco de dados e APIs.'],
            ['cargo_nome' => 'Desenvolvedor Full Stack', 'cargo_descricao' => 'Capaz de atuar tanto no frontend quanto no backend.'],
            ['cargo_nome' => 'Analista de Sistemas', 'cargo_descricao' => 'Profissional que analisa e especifica soluções de software.'],
            ['cargo_nome' => 'Desenvolvedor Mobile', 'cargo_descricao' => 'Especialista em aplicativos móveis para Android e iOS.'],
            ['cargo_nome' => 'DevOps', 'cargo_descricao' => 'Responsável por automatizar e integrar processos de desenvolvimento e operações.'],
        ];

        foreach ($cargos as $cargo) {
            Cargos::create($cargo);
        }
    }
}
