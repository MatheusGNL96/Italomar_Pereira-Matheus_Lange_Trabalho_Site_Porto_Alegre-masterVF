<?php  
 if(isset($_POST["employee_id"]))   
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "db_poa");  
      $query = "SELECT * FROM usuarios WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Nome</label></td>  
                     <td width="70%">'.$row["nome"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Endereco</label></td>  
                     <td width="70%">'.$row["endereco"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Turno</label></td>  
                     <td width="70%">'.$row["turno"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Linha</label></td>  
                     <td width="70%">'.$row["linha"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Frequencia</label></td>  
                     <td width="70%">'.$row["freq"].' dias por semana</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Sugestão/Reclamação</label></td>  
                     <td width="70%">'.$row["mlh"].'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 