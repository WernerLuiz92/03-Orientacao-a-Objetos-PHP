<?php

    require 'Conta.php';
    require 'Titular.php';

    $cliente1 = new Titular("183.543.930-62", "Rita Cecília Martins");
    $cliente2 = new Titular("378.890.090-38", "Ana Stefany Cavalcanti");

    $conta1 = new Conta($cliente1);
    $conta2 = new Conta($cliente2);
    $conta3 = new Conta($cliente1);

    echo $conta1->getNumero();
    echo $conta2->getNumero();
    echo $conta3->getNumero();

    echo "<pre>";
    echo $conta1->getNomeTitular();
    echo "</pre>";

    echo "<pre>";
    var_dump($conta1);
    var_dump($conta2);
    var_dump($conta3);
    echo "</pre>";