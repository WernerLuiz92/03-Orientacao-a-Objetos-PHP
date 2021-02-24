<?php

    class Conta 
    {
        private string $cpfTitular;
        private string $nomeTitular;
        private float $saldo = 0;

        public function __construct(string $cpfTitular, string $nomeTitular)
        {
            $this->cpfTitular = $cpfTitular;
            $this->nomeTitular = $nomeTitular;

        }


        public function getCpfTitular(): string  
        {
            return $this->cpfTitular;
        }

        public function getNomeTitular(): string 
        {
            return $this->nomeTitular;
        }

        public function setNomeTitular(string $nomeTitular): void 
        {
            $this->nomeTitular = $nomeTitular;
        }

        public function getSaldo(): float 
        {
            return $this->saldo;
        }


        public function saca(float $valorASacar): void
        {
            if ($valorASacar > $this->saldo) {
                echo "Saldo insuficiente";
                return;
            }

            $this->saldo -= $valorASacar;
            echo "Saque realizado com sucesso. Seu saldo atual é de: R$ {$this->saldo} <br>";
            
        }

        public function deposita(float $valorADepositar): void
        {
            if ($valorADepositar < 0) {
                echo "O valor a ser depositado deve ser maior do que zero!";
                return;
            }

            $this->saldo += $valorADepositar;
            echo "Deposito efetuado com sucesso. Seu saldo atual é de: R$ {$this->saldo} <br>";
            
        }

        public function transfere(float $valorATransferir, Conta $contaDestino): void
        {
            if ($valorATransferir > $this->saldo) {
                echo "Saldo insuficiente";
                return;
            }

            $this->saca($valorATransferir);
            $contaDestino->deposita($valorATransferir);
            echo "Transferencia realizada com sucesso. Seu saldo atual é de: R$ {$this->saldo} <br>";
            
        }
    }