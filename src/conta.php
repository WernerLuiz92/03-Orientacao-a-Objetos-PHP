<?php

    function criarConta(string $cpf, string $nomeTitular, float $saldoInicial): array
    {
        return [
            $cpf => [
                'titular' => $nomeTitular,
                'saldo' => $saldoInicial
            ]
        ];
    }