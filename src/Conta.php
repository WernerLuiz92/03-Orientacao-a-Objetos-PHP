<?php

    class Conta 
    {
        private string $cpfTitular;
        private string $nomeTitular;
        private float $saldo = 0;


        public function getCpfTitular(): string  
        {
            return $this->cpfTitular;
        }

        public function setCpfTitular(string $cpfTitular) 
        {
            $this->cpfTitular = $cpfTitular;
        }

        public function getNomeTitular(): string 
        {
            return $this->nomeTitular;
        }

        public function setNomeTitular(string $nomeTitular) 
        {
            $this->nomeTitular = $nomeTitular;
        }

        public function getSaldo(): float 
        {
            return $this->saldo;
        }

        public function setSaldo(float $saldo) 
        {
            $this->saldo = $saldo;
        }


        public function sacar(float $valorASacar): void
        {
            if ($valorASacar > $this->saldo) {
                echo "Saldo insuficiente";
                return;
            }

            $this->saldo -= $valorASacar;
            echo "Saque realizado com sucesso. Seu saldo atual é de: R$ {$this->saldo}";
            
        }

        public function depositar(float $valorADepositar): void
        {
            if ($valorADepositar < 0) {
                echo "O valor a ser depositado deve ser maior do que zero!";
                return;
            }

            $this->saldo += $valorADepositar;
            echo "Deposito efetuado com sucesso. Seu saldo atual é de: R$ {$this->saldo}";
            
        }

        public function transferir(float $valorATransferir, Conta $contaDestino): void
        {
            if ($valorATransferir > $this->saldo) {
                echo "Saldo insuficiente";
                return;
            }

            $this->sacar($valorATransferir);
            $contaDestino->depositar($valorATransferir);
            echo "Transferencia realizada com sucesso. Seu saldo atual é de: R$ {$this->saldo}";
            
        }
    }