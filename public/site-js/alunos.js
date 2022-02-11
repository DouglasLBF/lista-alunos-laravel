$(function(){
    
    $anoatual = new Date().getFullYear();

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })   

    $("#btnCadastrarModal").on('click',function(){
        $("#aluno_id").val('');
        $("#alunoForm").trigger("reset");
        $("#AlunoModalLabel").html("Cadastrar");
        $("#AlunoModal").modal('show');
    });

    $("#btnSalvar").on('click',function(e){
        var valid = this.form.checkValidity();
        $(this).html('Salvar');
        if(valid){
            preventDefault();

            $.ajax({
                data:$("#alunoForm").serialize(),
                url:"/alunos/store",
                type:"POST",
                datatype:'json',
                success:function(data){
                    $("alunoForm").trigger("reset");
                    $("#AlunoModal").modal('hide');
                    table.draw();
                },
                error:function(data){
                    console.log('Error',data);
                    $("#btnSalvar").html('Salvar');
                }
            });
        }


    });

    $('body').on('click','.deletarAluno',function(){
        var aluno_id = $(this).data("id");
        if(confirm('Tem certeza que quer deletar este Aluno?')){
            $.ajax({
                type:"DELETE",
                url:"/alunos"+'/'+aluno_id,
                success:function(data){
                    table.draw();
                },
                error: function(data){
                    console.log('Error'.data);
                }
            });
        } ;

    })

    $('body').on('click','.editarAluno',function(){
        var aluno_id = $(this).data("id");

        $.get("/alunos"+"/"+aluno_id+"/edit",function(data){
            $("#AlunoModalLabel").html("Editar Aluno");
            $('#AlunoModal').modal('show');
            $('#aluno_id').val(data.id);
            $('#nome').val(data.nome);
            $('#email').val(data.email);
            // $('#selecionarCurso').val(data.curso_id);
        })

    })

    $('.yearpicker').yearpicker({
        // Ano fixo
        year:2022,
        // Primeiro ano a ser mostrado 
        startYear:2019,
        // Ultimo ano a ser mostrado 
        endYear:$anoatual,   

    }); 

    $('#ano').on('change',function () {
        $('select[name="escola"]').prop('selectedIndex',0);
        
        $('select[name="turma"]').empty();
        $('select[name="turma"]').append('<option value=""> --Turma-- </option>');                     
    })

    $('select[name="escola"]').on('change',function(){
        $escolaID = $(this).val();
        $ano = $('#ano').val();                            

        if($escolaID)
        {
            $.ajax({
                url : '/alunos/buscarturmas/' + $escolaID +'/'+ $ano,
                type : "GET",
                dataType : "json",
                success:function(data)
                {                                              
                if(data.length !== 0){
                    $('select[name="turma"]').empty();
                    $.each(data, function(key,value){                            
                        $('select[name="turma"]').append('<option value="'+ value.ed57_i_codigo +'">'+ value.ed57_c_descr +'</option>');
                    });
                    
                }else {
                    $('select[name="turma"]').empty();
                    $('select[name="turma"]').append('<option value="">Sem turma</option>');          
                }
                }
            });
        }
        else
        {
            $('select[name="turma"]').empty();
        }
    });

    $('select[name="turma"]').on('change',function(){ 
        $turma = $(this).val();
        $escola = $('#escola').val();
        $ano = $('#ano').val();         

        $(".data-table").DataTable().clear();
        $(".data-table").DataTable().destroy();

        $(".data-table").DataTable({            
            //serverSide:true,
             processing:true,
            ajax:'alunos/buscaralunos/'+ $ano + '/' + $escola + '/' + $turma,
            columns:[
                {data:'ed47_i_codigo',name:'ed47_i_codigo'},
                {data:'ed47_v_nome',name:'ed47_v_nome'},                
                {data:'acoes',name:'acoes'}
            ],
            paging:true,            
            responsive: true,
            // scrollY: 300,
            // deferRender: true,
            // scroller: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    text:' Exportar para <i class="fa-solid fa-file-excel"></i>',
                    title: 'ListaAlunos',
                    autoFilter: true,
                    className:'btnExcel' ,                
                    exportOptions: {                        
                        columns: [0, 1]                        
                    }
                },{
                    extend: 'pdf',
                    text:'Exportar para <i class="fa-solid fa-file-pdf"></i>',
                    orientation: 'landscape' ,
                    title: 'ListaAlunos',
                    className:'btnPdf' ,
                    exportOptions:{
                        columns:[0,1]
                    },
                }
            ],
            "oLanguage": {
                "sLengthMenu": "Mostrando _MENU_ registros",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros)",
                "sSearch": "Pesquisar: ",
                "oPaginate": {
                    "sFirst": "In�cio",
                    "sPrevious": "Anterior",
                    "sNext": "Pr�ximo",
                    "sLast": "�ltimo"
                }
            }
        });

    })


})