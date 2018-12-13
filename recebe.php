<?php  
 $connect = mysqli_connect("localhost", "root", "", "db_poa");  
 $query = "SELECT * FROM usuarios ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);

 ?>  
 <!DOCTYPE html>
 <html> 
      <head>  
           <title>Melhorias em PoA</title>

           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <link rel="stylesheet" type="text/css" href="style.css"> 
           <script>function funcao1(){ alert("Desculpe, a função Login está em desenvolvimento!");}</script>

      </head>  
      <body>

          <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="http://www2.portoalegre.rs.gov.br/portal_pmpa_novo/" target="_blank">Porto Alegre</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li><a href="index.html">Início</a></li>
                  <li><a href="form.php">Melhorias</a></li>
                  <li class="active"><a href="#">Lista de Registros</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li onclick="funcao1()"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
              </div>
            </div>
          </nav>



           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Lista de Reclamações / Sugestões de Melhorias</h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Adicionar</button>  
                     </div>  
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <th width="70%">Nome</th>  
                                    <th width="15%">Editar</th>  
                                    <th width="15%">Visualizar</th>  
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["nome"]; ?></td>  
                                    <td><input type="button" name="edit" value="Editar" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="Visualizar" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Detalhes</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Atualizar Informações</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Nome</label>  
                          <input type="text" name="nome" id="nome" class="form-control" />  
                          <br /> 

                          <label>Endereço</label>  
                          <textarea name="endereco" id="endereco" class="form-control"></textarea>  
                          <br />

                          <label>Turno</label>  
                          <select name="turno" id="turno" class="form-control">  
                            <option value="Manha">Manha</option>
                            <option value="Tarde">Tarde</option>  
                            <option value="Noite">Noite</option>  
                          </select>  
                          <br />  

                          <label>Linha</label>  
                          <input type="text" name="linha" id="linha" class="form-control" />  
                          <br />

                          <label>Frequencia</label>  
                          <input type="text" name="freq" id="freq" class="form-control" />   
                          <br />

                          <label>Sugestão/Reclamação</label>  
                          <textarea name="mlh" id="mlh" class="form-control"></textarea>  
                          <br />

                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Atualizar" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Adicionar");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#nome').val(data.nome);  
                     $('#endereco').val(data.endereco);  
                     $('#turno').val(data.turno);  
                     $('#linha').val(data.linha);  
                     $('#freq').val(data.freq);  
                     $('#mlh').val(data.mlh); 
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Atualizar");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#nome').val() == "")  
           {  
                alert("Preencha o campo Nome!");  
           }  
           else if($('#endereco').val() == '')  
           {  
                alert("Preencha o campo Endereço!");  
           }  
           else if($('#linha').val() == '')  
           {  
                alert("Preencha o campo Linha!");  
           }  
           else if($('#freq').val() == '')  
           {  
                alert("Preencha o campo Frequencia!");  
           }  
           else if($('#mlh').val() == '')  
           {  
                alert("Preencha o campo de Sugestões!");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Atualizando...");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
 