<?php
namespace projet5\lib;

class Query_curl {

  protected $_ch;

  public function __construct(){
    $this->_ch = curl_init();
  }

  public function __destruct(){
    curl_close($this->_ch);
  }

  public function getQueryDatas($query){
    $url = 'https://projet5.mamzellea.fr/api.html/' .$query;
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($this->_ch, $options);
    $raw = curl_exec($this->_ch);
    $result = json_decode($raw, true);
    return $result;
  }

  public function getQueryIdDatas($query, $idName, $id){
    $url = 'https://projet5.mamzellea.fr/api.html/' .$query. '/' .$idName. '-' .$id;
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($this->_ch, $options);
    $raw = curl_exec($this->_ch);
    $result = json_decode($raw, true);
    return $result;
  }

  public function getQueryOptionDatas($query, $option){
    $url = 'https://projet5.mamzellea.fr/api.html/' .$query. '/option-' .$option;
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($this->_ch, $options);
    $raw = curl_exec($this->_ch);
    $result = json_decode($raw, true);
    return $result;
  }

  public function getQueryIdOptionDatas($query, $idName, $id, $option){
    $url = 'https://projet5.mamzellea.fr/api.html/' .$query. '/' .$idName. '-' .$id. '/option-' .$option;
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($this->_ch, $options);
    $raw = curl_exec($this->_ch);
    $result = json_decode($raw, true);
    return $result;
  }

  public function putQueryIdDatas($query, $idName, $id, $data){
    $url = 'https://projet5.mamzellea.fr/api.html/' .$query. '/' .$idName. '-' .$id. '/action-update';
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => http_build_query($data),
      CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($this->_ch, $options);
    $result = curl_exec($this->_ch);
    return $result;
  }

  public function deleteQueryIdDatas($query, $idName, $id){
    $url = 'https://projet5.mamzellea.fr/api.html/' .$query. '/' .$idName. '-' .$id. '/action-delete';
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
      CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($this->_ch, $options);
    $result = curl_exec($this->_ch);
    return $result;
  }

  public function postQueryDatas($query, $data){
    $url = 'https://projet5.mamzellea.fr/api.html/' .$query. '/action-create';
    $data_json = json_encode($data);
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => http_build_query($data),
      CURLOPT_RETURNTRANSFER => true
    );
    $curlOpt = curl_setopt_array($this->_ch, $options);
    $result  = curl_exec($this->_ch);
    return $result;
  }
}
