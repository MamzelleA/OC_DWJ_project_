<?php
namespace projet5\lib;
use \Exception;
use \projet5\view\View as view;

class MyException extends Exception {

  protected $_view;

  public function __construct($message, $code) {
    parent::__construct($message, $code);
    $this->_view = new view('user', 'err', 'err');
  }

  public function __toString() {
    return $this->message;
  }

  public function viewException ($file, $line) {
    $view = $this->_view->genView(array('errMessage' => $this->message, 'errCode' => $this->code, 'errFile' => $file, 'errLine' => $line));
    return $view;
  }
}
