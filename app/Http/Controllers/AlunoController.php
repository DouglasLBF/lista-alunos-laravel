<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Escola;
use App\Models\Turma;
use DataTables;

class AlunoController extends Controller
{
    private Aluno $alunoModel;
    private Escola $escolaModel;
    private Turma $turmaModel;

    public function __construct(
        Aluno $alunoModel,
        Escola $escolaModel,
        Turma $turmaModel
        )
    {
        $this->Aluno = $alunoModel;
        $this->Escola = $escolaModel;
        $this->Turma = $turmaModel;
    }

    public function index(Request $request)
    {        
        $escolas = $this->Escola->buscarEscolas();         

        return view('site.alunos')->with(compact('escolas'));
    }

    public function store(Request $request){
        Aluno::updateOrCreate(
            ['id'=>$request -> aluno_id],
            [
                'nome'=>$request->nome,
                'email'=>$request->email,
                'curso_id'=>$request->curso_selecionado,
            ]
        );
        return response() -> json(['success' => 'Aluno adicionado com sucesso!']);
    }

    public function destroy($id){
        Aluno::find($id)->delete();
        return response() -> json(['success' => 'Aluno deletado com sucesso!']);
    }

    public function edit($id) {
        $aluno = Aluno::find($id);
        return response()->json($aluno);
    }

    public function buscarTurmas($escola,$ano){

        $turmas = $this->Turma->buscarTurmas($escola,$ano);
        
        return json_encode($turmas);
    }

    public function buscarAlunos(Request $request,$ano,$escola,$turma){
        
        $alunos = $this->Aluno->buscarAlunos($ano,$escola,$turma);
       
        if($request->ajax()){
            $Data_alunos = DataTables::of($alunos)          
            ->addColumn('acoes', function($row){                              
                return "<a href='javascript:void(0)' data-toggle='tooltip'
                data-id='$row->ed47_i_codigo'
                data-original-title='Editar'
                class='edit btn btn-primary btn-sm editarAluno hidden'>Editar</a>

                <a href='javascript:void(0)' data-toggle='tooltip'
                data-id='$row->ed47_i_codigo'
                data-original-title='Deletar'
                class='edit btn btn-danger btn-sm deletarAluno hidden'>Deletar</a>
                ";
            })
            ->rawColumns(['acoes'])
            ->make(true);            

            return $Data_alunos;
        }

        return json_encode($alunos);
    }

}
