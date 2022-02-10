<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Escola extends Model
{
    use HasFactory;

    public function buscarEscolas(){
        
        $escolas = DB :: select("SELECT DISTINCT ed18_i_codigo,
            ed18_c_nome
            from
            escola.alunocurso
            inner join escola.escola on
            escola.ed18_i_codigo = alunocurso.ed56_i_escola
            inner join escola.aluno on 
            aluno.ed47_i_codigo = alunocurso.ed56_i_aluno
            inner join escola.calendario on 
            calendario.ed52_i_codigo = alunocurso.ed56_i_calendario
            inner join escola.base on 
            base.ed31_i_codigo = alunocurso.ed56_i_base
            inner join escola.cursoedu on 
            cursoedu.ed29_i_codigo = base.ed31_i_curso
            left join escola.alunopossib on 
            alunopossib.ed79_i_alunocurso = alunocurso.ed56_i_codigo
            left join escola.serie on 
            serie.ed11_i_codigo = alunopossib.ed79_i_serie
            left join escola.turno on 
            turno.ed15_i_codigo = alunopossib.ed79_i_turno
            ORDER  BY ed18_c_nome"
        );

        return $escolas;
    }
}
