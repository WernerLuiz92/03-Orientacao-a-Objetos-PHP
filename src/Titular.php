<?php

    class Titular
    {
        private string $cpf;
        private string $nome;

        public function __construct(string $cpf, string $nome)
        {
            $this->validaCpf($cpf);
            $this->cpf = $cpf;
            $this->validaNome($nome);
            $this->nome = $nome;
        }

        public function getCpf(): string
        {
            return $this->cpf;
        }

        public function getNome(): string
        {
            return $this->nome;
        }

        public function setNome($nome): void
        {
            $this->validaNome($nome);
            $this->nome = $nome;
        }

        // Este algoritmo não é meu, tentar entender mais adiante!!!
        private function validaCpf($cpf): void
        {
            // Extrai somente os números
            $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
                
            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpf) != 11) {
                echo "CPF Inválido";
                exit();
            }
    
            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                echo "CPF Inválido";
                exit();
            }
    
            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    echo "CPF Inválido";
                    exit();
                }
            }
        }

        private function validaNome($nome): void
        {
            if (strlen($nome) < 5) {
                echo "O nome precisa conter pelo menos 5 caracteres.";
                exit();
            }
        }
    }