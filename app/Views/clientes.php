<!DOCTYPE html>

    <head>

    <title><?php $titulo ?></title>
    <style>
        .tabela, .tabela td, .tabela tr {
            border: 1px solid;
        }
       

    </style>
    </head>
<body>
<!-- Conteúdo -->
<h2><?php $titulo ?></h2>
    <p><?php $msg ?></p>
    <table class="tabela">
    <tr>
        <td>Id cliente</td>
        <td>Nome cliente</td>
        <td>Endereço</td>
        <td>Telefone</td>
        <td>Email</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php foreach ($clientes as $cliente) : ?>
    <tr>
        <td>  <?php echo $cliente->id ?></td>
        <td>  <?php echo $cliente->nome  ?></td>
        <td>  <?php echo $cliente->endereço  ?></td>
        <td>  <?php echo $cliente->telefone  ?></td>
        <td>  <?php echo $cliente->email  ?></td>
        <td><button>  <a href="<?php echo base_url('clientes/atualizar/' . $cliente->id) ?>">Atualizar</a></button></td>
        <td><button>  <a href="<?php echo base_url('clientes/delete/' . $cliente->id) ?>">Apagar</a></button></td>
    </tr>
    <?php endforeach ?>
  </table>
  <br><br>
  <button>  <a href="<?php echo base_url('clientes/inserir') ?>">Voltar</a></button>&nbsp; &nbsp;
  
  <br><br>

</body>
</html>