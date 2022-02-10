<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'curso_id',
    ];  
    
    public function buscarAlunos($ano,$escola,$turma){

        $alunos = DB :: select("SELECT a.ed47_i_codigo,
         a.ed47_v_nome,
         m.ed60_c_situacao,
         t.ed57_c_descr,
         e.ed18_c_nome,
         c.ed52_c_descr
         from
         escola.matricula m
         inner join escola.turma t on
         m.ed60_i_turma = t.ed57_i_codigo
         inner join escola.escola e on
         t.ed57_i_escola = e.ed18_i_codigo
         inner join escola.base b on
         b.ed31_i_codigo = t.ed57_i_base
         inner join escola.cursoedu c2 on
         c2.ed29_i_codigo = b.ed31_i_curso
         inner join escola.aluno a on
         m.ed60_i_aluno = a.ed47_i_codigo
         inner join escola.calendario c on
         t.ed57_i_calendario = c.ed52_i_codigo
         where
         c.ed52_i_ano = ?
         and e.ed18_i_codigo = ?    
         and t.ed57_i_codigo = ?
         and m.ed60_c_situacao = 'MATRICULADO'      
         order by
         to_ascii(ed47_v_nome)",[$ano,$escola,$turma] );

        return $alunos;
    }
    
    
}
