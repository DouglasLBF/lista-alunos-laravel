<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Turma extends Model
{
    use HasFactory;

    public function buscarTurmas($escola,$ano){
       
       $turmas = DB :: select( "SELECT ed57_i_codigo,
        ed57_c_descr
        from
        escola.turma
        inner join escola.escola on
            escola.ed18_i_codigo = turma.ed57_i_escola
        inner join escola.turno on
            turno.ed15_i_codigo = turma.ed57_i_turno
        inner join escola.sala on 
            sala.ed16_i_codigo = turma.ed57_i_sala
        inner join escola.calendario on
            calendario.ed52_i_codigo = turma.ed57_i_calendario
        inner join escola.base on
            base.ed31_i_codigo = turma.ed57_i_base
        inner join escola.regimemat on
            regimemat.ed218_i_codigo = base.ed31_i_regimemat
        inner join cadastro.bairro on
            bairro.j13_codi = escola.ed18_i_bairro
        inner join cadastro.ruas on
            ruas.j14_codigo = escola.ed18_i_rua
        inner join configuracoes.db_depart on
            db_depart.coddepto = escola.ed18_i_codigo
        inner join escola.tiposala on
            tiposala.ed14_i_codigo = sala.ed16_i_tiposala
        inner join escola.duracaocal on
            duracaocal.ed55_i_codigo = calendario.ed52_i_duracaocal
        inner join escola.cursoedu on
            cursoedu.ed29_i_codigo = base.ed31_i_curso
        inner join escola.ensino on
            ensino.ed10_i_codigo = cursoedu.ed29_i_ensino
        inner join escola.tipoensino on
            tipoensino.ed36_i_codigo = ensino.ed10_i_tipoensino
        left join escola.censocursoprofiss on
            censocursoprofiss.ed247_i_codigo = turma.ed57_i_censocursoprofiss
        inner join escola.turmacensoetapa on
            turmacensoetapa.ed132_turma = turma.ed57_i_codigo
        where  ed57_i_escola = ?
        and ed132_ano = ?
        order by ed57_c_descr ", [$escola,$ano]);

        return $turmas;
    }

   
}
