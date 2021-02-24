<?php

    class Conta {
        private string $cpfTitular;
        private string $nomeTitular;
        private float $saldo;


        public function getCpfTitular() {
            return $this->cpfTitular;
        }

        public function setCpfTitular($cpfTitular) {
            $this->cpfTitular = $cpfTitular;
        }

        public function getNomeTitular() {
            return $this->nomeTitular;
        }

        public function setNomeTitular($nomeTitular) {
            $this->nomeTitular = $nomeTitular;
        }

        public function getSaldo() {
            return $this->saldo;
        }

        public function setSaldo($saldo) {
            $this->saldo = $saldo;
        }


        public function sacar(float $valorASacar) {
            if ($valorASacar > $this->saldo) {
                echo "Saldo insuficiente";
            } else {
                $this->saldo -= $valorASacar;
                echo "Saque realizado com sucesso";
            }
        }
    }