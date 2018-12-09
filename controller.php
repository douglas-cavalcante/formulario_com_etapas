<?php

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

switch($action){

  case "data-user":
    //$json = $postData;
    $json['success'] = true;
    break;

  default:
    $json['error'] = true;
    $json['errorMessage'] = 'Ação não parametrizada';
    break;

}

echo json_encode($json);