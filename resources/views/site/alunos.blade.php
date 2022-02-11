<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Matrí­cula</title>
    <link rel="stylesheet" href="{{url(mix('site-css/style.scss.css'))}}">
    <link rel="stylesheet" href="{{url(mix('site-css/yearpicker.css'))}}">    
    <link rel="stylesheet" href="{{url(mix('site-css/buttons.bootstrap5.min.css'))}}">
    <link rel="stylesheet" href="{{url(mix('site-css/dataTables.bootstrap5.min.css'))}}">
    <link rel="stylesheet" href="{{url(mix('site-css/fontawesome.min.css'))}}">
    <link rel="stylesheet" href="{{url(mix('site-css/brands.min.css'))}}">
    <link rel="stylesheet" href="{{url(mix('site-css/solid.min.css'))}}">
</head>

<body>
    <div class="container-sm">

        <h1>Lista de alunos</h1>
        <button type="button" class="btn btn-success btn-cadastrar hidden" id="btnCadastrarModal">
            Cadastrar Aluno
        </button>
    
        <div class="form-group">
            <label for="ano">Calendario:</label>
            <input name="ano" type="text" id="ano" class="yearpicker form-control" value="" >
        </div>        
        <div class="form-group">
            <label for="escola">Escola:</label>
            <select name="escola" class="form-control" id="escola">
                <option value=""> -- Selecione a escola -- </option>
                @foreach ($escolas as $escola)
                <option value="{{ $escola->ed18_i_codigo }}">{{ $escola->ed18_c_nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="turma">Turma:</label>
            <select name="turma" class="form-control">
            <option> --Turma-- </option>       
            </select>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered data-table" >
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nome</th>                    
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <div class="modal fade" id="AlunoModal" tabindex="-1" aria-hidden="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AlunoModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="alunoForm" name="alunoForm" class="form-horizontal" >
                        
                        <input type="hidden" name="aluno_id" id="aluno_id">
                        <div class="form-group">
                            Nome Completo:<br>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira seu nome completo" value="" required>
                        </div>
                        <div class="form-group">
                            Email:<br>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Insira seu email" value="" required>
                        </div>
                        {{-- <div class="form-group">
                            Curso:<br>
                            <select class="form-select" id="selecionarCurso" name="curso_selecionado" focus required>
                                <option value="" disabled selected>Selecione o curso</option>
                                @foreach($cursos as $cursos)
                                <option value="{{$cursos->id}}">{{$cursos->nome_curso}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
                            <button type="submit" class="btn btn-primary" id="btnSalvar" value="Create">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{url(mix('site-js/jquery.js'))}}"></script>
    <script src="{{url(mix('site-js/bootstrap.js'))}}"></script>
    <script src="{{url(mix('site-js/dataTables.js'))}}"></script>
    <script src="{{url(mix('site-js/dataTables-bs5.js'))}}"></script>
    <script src="{{url(mix('site-js/yearpicker.js'))}}"></script>
    <script src="{{url(mix('site-js/dataTables.buttons.min.js'))}}"></script>
    <script src="{{url(mix('site-js/buttons.bootstrap5.min.js'))}}"></script>
    <script src="{{url(mix('site-js/jszip.min.js'))}}"></script>
    <script src="{{url(mix('site-js/pdfmake.min.js'))}}"></script>
    <script src="{{url(mix('site-js/vfs_fonts.min.js'))}}"></script>
    <script src="{{url(mix('site-js/buttons.html5.min.js'))}}"></script>
    <script src="{{url(mix('site-js/buttons.print.min.js'))}}"></script>
    {{-- <script src="{{url(mix('site-js/fontawesome.min.js'))}}"></script> --}}
    <script src="{{url(mix('site-js/alunos.js'))}}"></script>
    
</body>

</html>
