<?php 
$connect = mysqli_connect("localhost", "root", "", "db_poa"); 
$query = "SELECT * FROM usuarios ORDER BY id DESC";  
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PoA City</title>
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
        <li class="active"><a href="#">Melhorias</a></li>
        <li><a href="recebe.php">Lista de Registros</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li onclick="funcao1()"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="https://www.sympla.com.br/eventos/porto-alegre-rs" target="_blank">Eventos</a></p>
      <p><a href="https://www.viagensecaminhos.com/2016/12/o-que-fazer-em-porto-alegre-pontos-turisticos-da-capital-gaucha.html" target="_blank">Pontos Turísticos</a></p>
      <p><a href="http://www.eptc.com.br/EPTC_Itinerarios/linha.asp" target="_blank">Itinerário/Horário dos ônibus</a></p>
    </div>

    <div class="col-sm-8 text-left"> 
      <h1 align='center'>Melhorias nas paradas do centro de Porto Alegre</h1>
     
        <form action="recebe.php" method="post" id="insert_form">  
          <label>Nome</label>  
          <input type="text" name="nome" id="nome" class="form-control" />  
          <br />

          <p>Referente as paradas de ônibus, informe:</p><br>  

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
          <input type="text" name="freq" id="freq" class="form-control" placeholder="Quantos dias na semana utiliza esse transporte? Ex.: 5" />  
          <br />

          <label>Sugestão/Reclamação</label>  
          <textarea name="mlh" id="mlh" class="form-control"></textarea>  
          <br />

          <input type="hidden" name="employee_id" id="employee_id" />  
          <input type="submit" name="insert" id="insert" value="Registrar" class="btn btn-success" onclick="location.href='recebe.php'" />  
        </form>
  </div>
  <div class="col-sm-2 sidenav">
      <div class="well">
        <p><a href="https://www.fadergs.edu.br/" target="_blank"><img src="https://tbcdn.talentbrew.com/company/673/v1_0/img/logo/logo-theme-bra-06.png"width="200" height="90"></a></p>
      </div>
      <div class="well">
        <p><a href="https://www.eadlaureate.com.br/graduacao/?formaentrada=vestibular_principal&intake=2018_2&gclid=Cj0KCQiAgMPgBRDDARIsAOh3uyLfv63P3pXGbLHQfsx5twmP55kZLvDQrUZGTS1XyQYCOpoUJdlEsloaAm55EALw_wcB" target="_blank"><img src="https://gosteidisso.com.br/wp-content/uploads/2018/02/Curso-EAD-Laureate.jpg"width="200" height="200"></a></p>
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br><br>
<footer class="container-fluid text-center">
  <p>@PortoAlegre</p>
</footer>

</body>
</html>
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