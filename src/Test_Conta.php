<?php

    require 'Conta.php';

    $conta1 = new Conta("183.543.930-62", "Rita Cecília Martins");
    $conta2 = new Conta("378.890.090-38", "Ana Stefany Cavalcanti");
    $conta3 = new Conta("169.993.700-10", "Vicente Márcio Rocha");
    $conta4 = new Conta("169.993.700-10", "Vicente Márcio Rocha");
    $conta5 = new Conta("169.993.700-10", "Vicente Márcio Rocha");

    echo "Getters e Setters: <br>";
    echo "getCpfTitular: {$conta1->getCpfTitular()} <br>";
    echo "getNomeTitular: {$conta1->getNomeTitular()} <br>";
    echo "setNomeTitular: Alterando o nome para: Rita Cecília Martins Camargo <br>";
    $conta1->setNomeTitular("Rita Cecília Martins Camargo");
    echo "getNomeTitular: {$conta1->getNomeTitular()} <br>";
    echo "getSaldo: {$conta1->getSaldo()} <br> <br>";

    
    echo "Metodos: <br>";

    echo 'deposita(float $valorADepositar): void: <br>';
    $conta1->deposita(1500);
    echo "<br>";

    echo 'saca(float $valorASacar): void: <br>';
    $conta1->saca(250);
    echo "<br>";

    echo 'transfere(float $valorATransferir, Conta $contaDestino): void: <br>';
    $conta1->transfere(300, $conta2);
    echo "<br>";

    echo "<pre>";
    var_dump($conta1);
    var_dump($conta2);
    var_dump($conta3);
    echo "</pre>";

    echo Conta::getNumeroDeContas();



