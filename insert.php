<?php  
 $connect = mysqli_connect("localhost", "root", "", "db_poa");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $nome = mysqli_real_escape_string($connect, $_POST["nome"]);  
      $endereco = mysqli_real_escape_string($connect, $_POST["endereco"]);  
      $turno = mysqli_real_escape_string($connect, $_POST["turno"]);  
      $linha = mysqli_real_escape_string($connect, $_POST["linha"]);  
      $freq = mysqli_real_escape_string($connect, $_POST["freq"]);
      $mlh = mysqli_real_escape_string($connect, $_POST["mlh"]);   
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE usuarios   
           SET nome='$nome',   
           endereco='$endereco',   
           turno='$turno',   
           linha = '$linha',   
           freq = '$freq',   
           mlh = '$mlh' 
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data ';  
      }
      else  
      {  
           $query = "  
           INSERT INTO usuarios(nome, endereco, turno, linha, freq, mlh)  
           VALUES('$nome', '$endereco', '$turno', '$linha', '$freq', '$mlh');  
           ";  
           $message = 'Registro Inserido';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM usuarios ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Nome</th>  
                          <th width="15%">Editar</th>  
                          <th width="15%">Visualizar</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["nome"] . '</td>  
                          <td><input type="button" name="edit" value="Editar" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="Visualizar" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 