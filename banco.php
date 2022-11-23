<?php

/*       nomeda       parametros
         função                                                                     */
function sacar  ($conta, $valorAsacar)
{
    /* se o valor a sacar (paramentro $valorAsacar) for maior que o valor da conta
    (paramentro $conta que está recebendo o valor de 'saldo'), iremos exebir uma mensagem
    caso o contrario iremos debitar o $valorAsacar retornaremos a $conta */

    if ($valorAsacar > $conta['saldo']) {
        exibeMensagem("Você não pode sacar este valor");
    } else {
        $conta['saldo'] -= $valorAsacar;
    }
    return $conta;
}

function exibeMensagem($mensagem) 
{
    echo $mensagem . PHP_EOL;
}

function depositar($conta, $valorAdepositar)
{
    if ($valorAdepositar > 0){
        $conta['saldo'] += $valorAdepositar;
        return $conta;
    } else { exibeMensagem('os deposotos devem ser maior que R$ 1,00.');
    }
   
}


$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'Maria',
        'saldo' => 10000
    ],
    '123.456.789-11' => [
        'titular' => 'Alberto',
        'saldo' => 300
    ],
    '123.256.789-12' => [
        'titular' => 'Vinicius',
        'saldo' => 100
    ]
];


$contasCorrentes['123.456.789-10'] = sacar($contasCorrentes['123.456.789-10'], 500);
$contasCorrentes['123.456.789-11'] = sacar($contasCorrentes['123.456.789-11'], 200);
$contasCorrentes['123.256.789-12'] = depositar($contasCorrentes['123.256.789-12'], 900);



foreach ($contasCorrentes as $cpf => $conta) {
    exibeMensagem(
        "$cpf  $conta[titular]  $conta[saldo]"
    );
}











