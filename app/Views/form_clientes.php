<!DOCTYPE html>
 <html> 
    <head>
        <!---- titulo será cria automaticamente atraves de um array no controlers com o nome "titulo"--->
      

    </head> 
    <!-- tratamento para campos vazios -->
    <body>  
        <h2>
            <?php

use App\Controllers\Clientes;

echo $titulo ?>
        </h2>
        <!-- Não chamei a action, pois chamei o próprio method como referência --->
        <form method="post">
        
            <br> <br> <strong> <?php $msg ?></strong>
          <input type="hidden"  name="id" value="<?php echo (isset($clientes) ? $clientes->id : '') ?>">
          <label for="fname">Nome:</label><br>
          <input type="text"  name="nome"  required value="<?php echo (isset($clientes) ? $clientes->nome : '') ?>"><br>

          <label for="fende">Endereço:</label><br>
          <input type="text" name="endereço"  required value="<?php echo (isset($clientes) ? $clientes->endereço : '') ?>"><br>

          <label for="ftele">Telefone:</label><br>
          <input type="text" name="telefone"  required value="<?php echo (isset($clientes) ? $clientes->telefone : '') ?>"><br>

          <label for="Fmail">Email:</label><br>
          <input type="email" name="email"  required value="<?php echo (isset($clientes) ? $clientes->email : '') ?>"><br>
        <br><br>
       <button>  <a href="<?php echo base_url('clientes') ?>">Lista de todos Clientes</a></button><br><br>
        <br>
        
          <input type="submit" value= "<?php echo $acao ?>">
        </form>
        
    
    </body>
 </html>

