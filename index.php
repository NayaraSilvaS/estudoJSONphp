<?php
$fatura = array(
    'cliente' => array(
        'ano' => 2020,
        'nome' => 'Maria Aparecida',
    ),
    'pagamentos' => array(
        array(
            'id' => 123,
            'descricao' => 'Arlequina',
            'valor' => 50.5,
            'vendidos' => 180,
            'estudante' => 25,
            'publico' => 150,
            'custo' => 500,
            'meta' => 1000,
            'imposto' => 10,
        ),
        array(
            'id' => 124,
            'descricao' => 'Batman',
            'valor' => 1500.5,
            'vendidos' => 30,
            'estudante' => 15,
            'publico' => 10,
            'custo' => 600,
            'meta' => 5000,
            'imposto' => 50,
        ),
        array(
            'id' => 125,
            'descricao' => 'Coringa',
            'valor' => 1500,
            'vendidos' => 650,
            'estudante' => 140,
            'publico' => 400,
            'custo' => 70,
            'meta' => 80000,
            'imposto' => 80,
        ),
        array(
            'id' => 126,
            'descricao' => 'Mulher Maravilha',
            'valor' => 5000,
            'vendidos' => 500,
            'estudante' => 50,
            'publico' => 150,
            'custo' => 500,
            'meta' => 500,
            'imposto' => 5,
        ),
    ),
);
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body>
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="descricao">Filme</th>
          <th class="valor">Valor do ingresso</th>
          <th class="vendidos">Vendidos</th>
          <th class="publico">Publico</th>
          <th class="lucro">Lucro Total</th>
          <th>Lucro Liquido</th>
        </tr>
      </thead>
      <tbody class="container">
          <?php
          foreach ($fatura['pagamentos'] as &$item) {
              $lucro = calculaLucro($item);
              $item['lucro'] = $lucro;
              $item['lucroLiq'] = descontoImposto($item, $lucro);
              ?>
              <tr>
                  <td><?php echo $item['descricao']; ?></td>
                  <td><?php echo 'R$ ' . formateReal($item['valor']); ?></td>
                  <td><?php echo 'R$' . formateReal($item['vendidos']); ?></td>
                  <td><?php echo 'R$' . formateReal($item['publico']); ?></td>
                  <td class="<?php echo meta($item, $lucro); ?>"><?php echo 'R$ ' . formateReal($lucro); ?></td>
                  <td><?php echo 'R$ ' . formateReal($item['lucroLiq']); ?></td>
              </tr>
              <?php
          }
          ?>
          <tr>
              <td colspan="2">Total</td>
              <td><?php echo 'R$ ' . formateReal(array_reduce($fatura['pagamentos'], 'totalVendido', 0)); ?></td>
              <td><?php echo 'R$ ' . formateReal(array_reduce($fatura['pagamentos'], 'totalPublico', 0)); ?></td>
              <td><?php echo 'R$ ' . formateReal(array_reduce($fatura['pagamentos'], 'totalLucro', 0)); ?></td>
              <td><?php echo 'R$ ' . formateReal(array_reduce($fatura['pagamentos'], 'totalLucroLiq', 0)); ?></td>
          </tr>
      </tbody>
    </table>
  </body>
</html>
<?php
function calculaLucro($pagamento) {
    return $pagamento['valor'] * ($pagamento['vendidos'] - $pagamento['estudante'])
     + $pagamento['valor'] * 0.1 * $pagamento['estudante'] - $pagamento['custo'];
}

function descontoImposto($pagamento, $lucro){
    return $lucro - ($lucro * $pagamento['imposto']/100);
}

function meta($pagamento, $lucro){
    return $pagamento['meta'] < $lucro ? "text-success" : "text-danger";
}

function totalVendido($acc, $pagamento) {
    return $acc + $pagamento['vendidos'];
}

function totalPublico($acc, $pagamento) {
    return $acc + $pagamento['publico'];
}

function totalLucro($acc, $pagamento) {
    return $acc + $pagamento['lucro'];
}

function totalLucroLiq($acc, $pagamento) {
    return $acc + $pagamento['lucroLiq'];
}

function formateReal($valor) {
    return number_format($valor, 2, ',', '.');
}