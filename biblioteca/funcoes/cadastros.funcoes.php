<?php

function cadastros__logout()
{
    autenticacao__unset_logon();
    autenticacao__unset_usuario_uuid();
    unset( $_SESSION['KCFINDER'] );
}

function cadastros__logon($login, $senha){
    
    $login = filter_var($login, FILTER_SANITIZE_MAGIC_QUOTES);

    $consulta = "SELECT * 
                    FROM Cadastros
                    WHERE Email = '{$login}'
                    AND Situacao = '1'";

    $resultado = global__db()->fetchAssoc($consulta);

    $check = password_verify($senha, $resultado["Senha"]);

    return [
        "check"    => $check,
        "cadastro" => $resultado
    ];
}

function cadastros__get_usuario( $hash_uuid )
{
    $hash_uuid = filter_var($hash_uuid);

    $consulta = "SELECT *
					FROM Cadastros
					WHERE Situacao = '1'
					AND MD5(uuid) = '{$hash_uuid}'";

    return global__db()->fetchAssoc( $consulta );
}

function cadastros__cpf_existe( $cpf ){

	$cpf = filter_var( $cpf, FILTER_SANITIZE_MAGIC_QUOTES );

	$consulta = "SELECT count(*)
                FROM Cadastros
				WHERE Cadastros.Cpf = ?";

	return global__db()->fetchColumn( $consulta,[$cpf] );

}

function cadastros__email_existe( $email ){

	$email = filter_var( $email, FILTER_SANITIZE_MAGIC_QUOTES );

	$consulta = "SELECT count(*)
                FROM Cadastros
				WHERE Cadastros.Email = ?";

	return global__db()->fetchColumn( $consulta,[$email] );

}