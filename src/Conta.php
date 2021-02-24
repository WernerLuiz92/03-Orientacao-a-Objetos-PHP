<?php

    class Conta 
    {
        private string $cpfTitular;
        private string $nomeTitular;
        private float $saldo;


        public function getCpfTitular() 
        {
            return $this->cpfTitular;
        }

        public function setCpfTitular($cpfTitular) 
        {
            $this->cpfTitular = $cpfTitular;
        }

        public function getNomeTitular() 
        {
            return $this->nomeTitular;
        }

        public function setNomeTitular($nomeTitular) 
        {
            $this->nomeTitular = $nomeTitular;
        }

        public function getSaldo() 
        {
            return $this->saldo;
        }

        public function setSaldo($saldo) 
        {
            $this->saldo = $saldo;
        }


        public function sacar(float $valorASacar): void
        {
            if ($valorASacar > $this->saldo) {
                echo "Saldo insuficiente";
            } else {
                $this->saldo -= $valorASacar;
                echo "Saque realizado com sucesso. Seu saldo atual é de: R$ {$this->saldo}";
            }
        }

        public function depositar(float $valorADepositar): void
        {
            if ($valorADepositar < 0) {
                echo "O valor a ser depositado deve ser maior do que zero!";
            } else {
                $this->saldo += $valorADepositar;
                echo "Deposito efetuado com sucesso. Seu saldo atual é de: R$ {$this->saldo}";
            }
        }
    }