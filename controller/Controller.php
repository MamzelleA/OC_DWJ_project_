<?php
namespace projet5\controller;
use \projet5\datas_builders\Api_builder as ApiBuild;
use \projet5\view\View as view;
use \projet5\lib\MyException as MyException;

class Controller {

    protected $_view;
    protected $_alert;

    protected const REGMAIL = '#^[a-z0-9.-_]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';
    protected const REGFILL = '#^[a-zA-Z\'-äâàëêéèïîìöôòüûùñ]+$#';
    protected const REGPSEUDO = '#^([\wàâéèêëîïôùç-]){2,15}$#';
    protected const REGPW = '#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,15}$#';

    public function __construct ($side, $template, $name) {
      $this->_view = new View($side, $template, $name);
    }

    public function content(array $name) {
      foreach ($name as $na) {
        $content[] = $this->_view->genContent($na);
      }
      return $content;
    }

    public function cleanValue ($value) {
      return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

    public function tokenGenerator($name) {
      $token = uniqid(rand(), true);
      $_SESSION[$name.'_token'] = $token;
      $_SESSION[$name. '_time'] = time();
    }

    public function checkToken($name) {
      if(is_array($name)){
        foreach ($name as $na) {
          if(isset($_SESSION[$na.'_token']) && isset($_SESSION[$na. '_time'])) {
            $timeOut = time()-$_SESSION[$na. '_time'];
            if($timeOut < 14400) { //expiration automatique de la session au bout de 4 heures 14400sec
              return true;
            } else {
              return false;
            }
          }
        }
      }
      else {
        if(isset($_SESSION[$name.'_token']) && isset($_SESSION[$name. '_time'])) {
          $timeOut = time()-$_SESSION[$name. '_time'];
          if($timeOut < 14400) { //expiration automatique de la session au bout de 4 heures 14400sec
            return true;
          } else {
            return false;
          }
        }
      }
      return false;
    }

    public function paginator ($limit, $manager, $countMethod, $getMethod){
      if(isset($_GET['page']) && !empty($_GET['page'])){
          $page = intval($_GET['page']);
      } else {$page = 1;}
      $start = ($page-1) * $limit;
      $total = $manager->$countMethod();
      $pages = ceil($total / $limit);
      $members = $manager->$getMethod($limit, $start);
      $array = array(
        'page' => $page,
        'pages' => $pages,
        'members' => $members
      );
      return $array;
    }

    public function oups($location) {
      session_destroy();
      $this->setCookie('alert', 'Oups, vous avez été déconnecté !', time()+1);
      header('Location: https://projet5.mamzellea.fr/' .$location. '.html');
    	exit();
    }

    public function setCookie($name, $value, $time){
      setcookie($name, $value, $time, '', '', false, true);
    }

    public function connexionGeneric($validField, $pseudoField, $pwField, $location) {
      if(isset($_POST[$validField])) {
        if(empty($_POST[$pseudoField]) || empty($_POST[$pwField])){
          $this->_alert = 'Tous les champs doivent être renseignés';
        } else {
          $pseudoClean = $this->cleanValue($_POST[$pseudoField]);
          $connInfo = $this->_member->getPwRegenCode($pseudoClean);
          if($connInfo['regen_code'] == 0) {
            $checkP = $this->_member->checkPseudo($pseudoClean);
            if(!empty($checkP)){
              $pwClean = $this->cleanValue($_POST[$pwField]);
              $verify = password_verify($pwClean, $connInfo['password']);
              if($verify) {
                $this->_member->updateLastConn($pseudoClean);
                if($connInfo['code'] == 0) {$this->tokenGenerator('admin-conn');}
                else {$this->tokenGenerator('form-conn');}
                $_SESSION['pseudo'] = $pseudoClean;
                header('Location: https://projet5.mamzellea.fr/' .$location. '.html');
                exit();
              } else {
                $this->_alert = 'L\'identifiant et/ou le mot de passe renseignés ne sont pas valides.';
              }
            } else {
              $this->_alert = 'L\'identifiant et/ou le mot de passe renseignés ne sont pas valides.';
            }
          } else {
            $this->_alert = 'Vous avez demandé à redéfinir votre mot de passe. Consultez le mail qui vous a été envoyé et suivez-en les instructions avant de pouvoir vous connecter.';
          }
        }
      }
    }

    public function updatePass($pseudo, $old, $new, $confirmNew) {
        if(preg_match(self::REGPW, $new)) {
          if($new != $old) {
            if($confirmNew == $new) {
              $pw = password_hash($new, PASSWORD_DEFAULT);
              $this->_member->updatePw($pw, $pseudo);
            } else {
              $this->_alert = 'Les 2 mots de passe ne sont pas identiques.';
            }
          } else {
            $this->_alert = 'Le nouveau mot de passe ne peut être identique à l\'ancien !';
          }
        } else {
          $this->_alert = 'Le format du nouveau mot de passe n\'est pas valide';
        }
    }
  }
