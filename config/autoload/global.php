<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'db' => [
        'driver'   => 'Pdo_Mysql',
        'host'     => 'localhost',
        'database' => 'helpdesk',
        'username' => 'root',
        'password' => '',
        'port'     => '3306',
        'charset'  => 'utf8',
    ],
    'mail' =>[
        'name' => 'smtp.mailtrap.io', //SMTP DO SERVIOR DE E-MAIL
        'host' => 'smtp.mailtrap.io', //NO GOOGLE SÓ REPETIR S SMTP
        'port' => 2525, //PORTA DO SERVIDOR DE E-MAIL GMAIL 465
        'connection_class'=> 'login', //DIZ QUE SERÁ FEITO UMA AUTENTICAÇÃO PARA DISPARAR OS E-MAIL
        'connection_config' => [
            'from' => 'ticket-cbce61@inbox.mailtrap.io', //DE!
            'username' => 'f4894a9456ff47', //E-MAIL DE AUTENTICAÇÃO
            'password' => 'c35a9d08e46a22', //SENHA DO E-MAIL PARA AUTENTICAR
            //'ssl' => 'ssl', //TIPO DO ENVIO SSL => SSL PARA EMAIL
            'auth' => 'CRAM-MDS',
        ],
    ]
];
