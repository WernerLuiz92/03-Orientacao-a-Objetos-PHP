<?php

    require 'Conta.php';
    require 'Titular.php';
    require 'Cpf.php';

    $cliente1 = new Titular(new Cpf("183.543.930-62"), "Rita Cecília Martins");
    $cliente2 = new Titular(new Cpf("378.890.090-38"), "Ana Stefany Cavalcanti");

    $conta1 = new Conta($cliente1);
    $conta2 = new Conta($cliente2);
    $conta3 = new Conta($cliente1);

    $contas = [
        $conta1,
        $conta2,
        $conta3
    ];

    $conta1->deposita(114.74);
    $conta1->transfere(50, $conta2);
    $conta2->saca(30);
    $conta1->transfere(20.74, $conta3);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas Correntes</title>
</head>
<body>
    <h1>Contas Correntes</h1>

    <dl>
        <?php foreach ($contas as $conta) { ?>
            <dt><h3>Titular: <?= $conta->getNomeTitular(); ?></h3></dt>
            <dd>Número da Conta: <?= $conta->getNumero(); ?></dd>
            <dd>CPF: <?= $conta->getCpfTitular(); ?></dd>
            <dd>Saldo: R$ <?= $conta->getSaldo(); ?></dd>
        <?php } ?>
    </dl>
</body>
</html>