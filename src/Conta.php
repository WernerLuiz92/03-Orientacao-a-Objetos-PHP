<?php

    class Conta 
    {
        private string $cpfTitular;
        private string $nomeTitular;
        private float $saldo;
        private static $numeroDeContas = 0;

        public function __construct(string $cpfTitular, string $nomeTitular)
        {
            $this->validaCpfTitular($cpfTitular);
            $this->cpfTitular = $cpfTitular;
            $this->validaNomeTitular($nomeTitular);
            $this->nomeTitular = $nomeTitular;
            $this->saldo = 0;

            self::$numeroDeContas++;

        }

        public function __destruct()
        {
            self::$numeroDeContas--;
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

        // Este algoritmo não é meu, tentar entender mais adiante!!!
        private function validaCpfTitular($cpfTitular): void
        {
            // Extrai somente os números
            $cpfTitular = preg_replace( '/[^0-9]/is', '', $cpfTitular );
                
            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpfTitular) != 11) {
                echo "CPF Inválido";
                exit();
            }
    
            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpfTitular)) {
                echo "CPF Inválido";
                exit();
            }
    
            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpfTitular[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpfTitular[$c] != $d) {
                    echo "CPF Inválido";
                    exit();
                }
            }
        }

        private function validaNomeTitular($nomeTitular): void
        {
            if (strlen($nomeTitular) < 5) {
                echo "O nome precisa conter pelo menos 5 caracteres.";
                exit();
            }
        }

        public static function getNumeroDeContas(): int
        {
            return self::$numeroDeContas;
        }
    }