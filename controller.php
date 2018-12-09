<?php

ob_start();
session_start();
//filtro os dados enviados pela requisição ajax
$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$action = $postData['action'] ?? 'no-parametrized';
//destrói o unset
unset($postData['action']);

//verifica se existe valores 
if(!empty($postData['formSerialize'])){
  //vai converter a string em variaveis
  parse_str($postData['formSerialize'], $postData);
}

require_once __DIR__.'/config.php';
$read  = new \CRUD\Read;

switch($action){

  case "data-user":
    if(empty($postData['user_document'])){
        $json['error'] = true;
        $json['errorMessage'] = 'Por favor, informe seu cpf';
        break;
    }
    $read->read('users','WHERE user_document = :document',"document={$postData['user_document']}");
    if($read->getResult()) {
        $json['error'] = true;
        $json['errorMessage'] = 'Cpf já sendo usado';
        break;
    }
    //$json = $postData;
    $_SESSION['wizard']['user_name'] = $postData['user_document'];
    $_SESSION['wizard']['user_lastname'] = $postData['user_lastname'];
    $_SESSION['wizard']['user_document'] = $postData['user_document'];
    $json['success'] = true;
    break;

  case "data-login":
    if(empty($postData['user_email'])){
      $json['error'] = true;
      $json['errorMessage'] = 'Por favor, informe um email';
      break;
    }
    if(!filter_var($postData['user_email'], FILTER_VALIDATE_EMAIL)){
      $json['error'] = true;
      $json['errorMessage'] = 'Informe um email valido';
      break;
    }
    $read->read('users','WHERE user_email = :email',"email={$postData['user_email']}");
    if($read->getResult()) {
        $json['error'] = true;
        $json['errorMessage'] = 'Email já em uso';
        break;
    }
    $_SESSION['wizard']['user_email'] = $postData['user_email'];
    $_SESSION['wizard']['user_password'] = $postData['user_password'];
    $json['success'] = true;
    break;

  case "data-social":
    if(!filter_var($postData['user_facebook'], FILTER_VALIDATE_URL)){
      $json['error'] = true;
      $json['errorMessage'] = 'Informe uma url válida';
      break;
    }

    $userCreate = [
      'user_name' => $_SESSION['wizard']['user_name'],
      'user_lastname' => $_SESSION['wizard']['user_lastname'],
      'user_document' => $_SESSION['wizard']['user_document'],
      'user_email' => $_SESSION['wizard']['user_email'],
      'user_password' => $_SESSION['wizard']['user_password'],
      'user_facebook' => $postData['user_facebook'],
      'user_website' => $postData['user_website']
    ];
    $create = new \CRUD\Create;
    $create->create('users', $userCreate);

    $json['redirect'] = 'main.php';
    $json['finish'] = true;
    break;

  default:
    $json['error'] = true;
    $json['errorMessage'] = 'Ação não parametrizada';
    break;
  }

echo json_encode($json);

ob_end_flush();