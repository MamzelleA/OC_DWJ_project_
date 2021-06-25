<?php
namespace projet5\controller\user_controller;
use projet5\controller\Controller;
use \projet5\model\user_manager\Member_manager as Member;
use \projet5\lib\Email_sender as EmailSender;
use \projet5\lib\Api_builder as ApiBuild;
use \projet5\lib\MyException as MyException;

class User_controller extends Controller {

  protected $_member;
  protected $_api;

  protected const MEMBERPATH = '/home/mamzelle/public_html/projet5/config/access/config_members.ini';
  protected const DATASPATH = '/home/mamzelle/public_html/projet5/config/access/config_datas.ini';

  public function __construct ($template, $side, $name) {
    parent::__construct($template, $side, $name);
    $this->member();
    $this->api();
  }

  private function setMember() {
    if(file_exists(self::MEMBERPATH)) {
      $this->_member = new Member(self::MEMBERPATH);
    } else {throw new MyException('Une erreur est survenue. Veuillez réessayer plus tard.', 410);}
  }

  private function member () {
    return $this->setMember();
  }

  private function setApi() {
    if(file_exists(self::DATASPATH)) {
      $this->_api = new ApiBuild(self::DATASPATH);
    } else {throw new MyException('Une erreur est survenue. Veuillez réessayer plus tard.', 410);}
  }

  private function api() {
    return $this->setApi();
  }

  public function apiDatas() {
    if(isset($_GET['query'])) {echo $this->_api->apiGen('query');}
    else {echo $this->_api->apiGen('name');}
  }

  public function home() {
    $content = parent::content(array('home-us'));
    $view = $this->_view->genView(array('content' => $content));
    return $view;
  }

  public function museum() {
    if(!empty($_SESSION)){
      $checkT = parent::checkToken(array('form-conn', 'admin-conn'));
      if($checkT == false){parent::oups('home');}
    }
    $content = $this->content(array('building-mu', 'titles-mu', 'entrances-mu', 'reception-mu', 'acces-mu', 'collections-mu', 'walkin-mu', 'advices-mu'));
    $view = $this->_view->genView(array('content' => $content));
    return $view;
  }

  public function site() {
    if(!empty($_SESSION)){
      $checkT = parent::checkToken(array('form-conn', 'admin-conn'));
      if($checkT == false){parent::oups('home');}
    }
    $content = $this->content(array('goal-si', 'member-si'));
    $view = $this->_view->genView(array('content' => $content));
    return $view;
  }

  public function legal() {
    if(!empty($_SESSION)){
      $checkT = parent::checkToken(array('form-conn', 'admin-conn'));
      if($checkT == false){parent::oups('home');}
    }
    $icon = parent::content(array('icon8-list'));
    $view = $this->_view->genView(array('icon' => $icon));
    return $view;
  }

  public function preparation() {
    $content = parent::content(array('entrances-si', 'hours-si', 'rooms-si', 'artworks-si', 'tours-si','titles-details', 'hours-details', 'rooms-details', 'aw-details', 'tours-details', 'tour-details'));
    $view = $this->_view->genView(array('content' => $content));
    return $view;
  }

  public function suscribe() {
    if(isset($_POST['valid-suscribe'])){
      $last = parent::cleanValue($_POST['lastname']);
      $first = parent::cleanValue($_POST['firstname']);
      $pseudo = parent::cleanValue($_POST['pseudo']);
      $email = parent::cleanValue($_POST['email']);
      $pw = parent::cleanValue($_POST['password']);
      $confirmPw = parent::cleanValue($_POST['confirm-pw']);
      if(empty($_POST['email-checking'])) {
        $_SESSION['last'] = $last;
        $_SESSION['first'] = $first;
        $_SESSION['email'] = $email;
        $_SESSION['pseudo'] = $pseudo;
        if(!empty($last) && $last != ' ' && !empty($first) && $first != ' ' && !empty($email) && !empty($pseudo) && !empty($_POST['password']) && !empty($_POST['confirm-pw'])) {
          if(preg_match(parent::REGMAIL, $email)) {
            $checkE = $this->_member->checkEmail($email);
            if(empty($checkE)){
              if(preg_match(parent::REGPSEUDO, $pseudo)) {
                $checkP = $this->_member->checkPseudo($pseudo);
                if(empty($checkP)){
                  if(preg_match(parent::REGPW, $pw)) {
                    if($confirmPw == $pw) {
                      $pwHash = password_hash($pw, PASSWORD_DEFAULT);
                      $this->_member->addMember($last, $first, $email, $pseudo, $pwHash);
                      parent::setCookie('alert', 'Tout est bon ' .$pseudo. ', vous voilà membre !  Profitez, immédiatemment de l\'expérience en vous connectant <a href="index.php?name=connexion" class="text-uppercase">ici</a>.', time()+1);
                      unset($_SESSION['last'], $_SESSION['first'], $_SESSION['email'], $_SESSION['pseudo']);
                      header('Location: https://projet5.mamzellea.fr/suscribe.html');
                      exit;
                    } else {
                      $this->_alert = 'Les 2 mots de passe saisis ne sont pas identiques.';
                    }
                  } else {
                    $this->_alert = 'Le format du mot de passe n\'est pas valide';
                  }
                } else {
                  unset($_SESSION['pseudo']);
                  $this->_alert = 'L\'identifiant choisi existe déjà.';
                }
              } else {
                unset($_SESSION['pseudo']);
                $this->_alert = 'Le format de l\'identifiant n\'est pas valide';
              }
            } else {
              unset($_SESSION['email']);
              $this->_alert = 'Un compte est déjà associé à cet email.';
            }
          } else {
            unset($_SESSION['email']);
            $this->_alert = 'Le format de l\'email n\'est pas valide';
          }
        } else {
          $this->_alert = 'Tous les champs doivent être remplis.';
        }
      } else {
        $this->_alert = 'Etes-vous vraiment un humain ?!';
      }
    }
    $view = $this->_view->genView(array('alert' => $this->_alert));
    return $view;
  }

  public function connexion() {
    parent::connexionGeneric('valid-conn', 'pseudo-conn', 'pw-conn', 'home');
    $view = $this->_view->genView(array('alert' => $this->_alert));
    return $view;
  }

  public function forget(){
    if(isset($_POST['valid-forget'])) {
      if(empty($_POST['email-forget'])) {
        $this->_alert = 'Le champs doit être renseigné !';
      } else {
        $email = parent::cleanValue($_POST['email-forget']);
        $_SESSION['email-help'] = $email;
        $regex = '#^[a-z0-9.-_]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';
        if(preg_match($regex, $email)){
          $checkE = $this->_member->checkEmail($email);
          if(empty($checkE)){
            $this->_alert = 'L\'email renseigné n\'existe pas dans notre base. Merci de vérifier votre saisie.';
          } else {
            $arrayP = $this->_member->getPseudo($email);
            $pseudo = $arrayP['pseudo'];
            $arrayC = $this->_member->getRegenCode($pseudo);
            $codeExist = $arrayC['regen_code'];
            if($codeExist == 0) {
              $bytes = random_bytes(5);
              $code = bin2hex($bytes);
              if(EmailSender::lostPw($email, $pseudo, $code)){
                $hashCode = password_hash($code, PASSWORD_DEFAULT);
                var_dump($hashCode);
                $this->_member->forgetPw($hashCode, $email);
                $this->_alert = $pseudo. ' , un e-mail vient de vous être envoyé à l\'adresse : ' .$email. '. Suivez-en les instructions et tout se passera bien ! Pensez à aussi vérifier vos spams.';
                unset($_SESSION['email-help']);
              } else {$this->_alert = ' Echec de l\'envoi à l\'adresse : ' .$email. '.';}

            } elseif ($codeExist == 1) {
              $this->_alert = 'Vous avez déjà signalé l\'oubli de votre mot de passe. Vérifiez votre boîte mail.';
              unset($_SESSION['email-help']);
            }
          }
        } else {
          $this->_alert = 'Le format de l\'email n\'est pas valide.';
        }
      }
    }
    $view = $this->_view->genView(array('alert' => $this->_alert));
    return $view;
  }

  public function regenerate() {
    if(isset($_POST['valid-regen'])){
      $pseudo = parent::cleanValue($_POST['pseudo-regen']);
      $codeSent = parent::cleanValue($_POST['code-regen-pw']);
      $code = password_hash($codeSent, PASSWORD_DEFAULT);
      $new = parent::cleanValue($_POST['pw-regen']);
      $pwDb = $this->_member->getPw($pseudo);
      var_dump($pwDb);
      var_dump($code);
      $verify = password_verify($codeSent, $pwDb['password']);
      if($verify) {
        parent::updatePass($pseudo, $codeSent, $new, $_POST['confirm-regen-pw']);
        parent::setCookie('alert', 'Votre nouveau mot de passe a bien été pris en compte.', time()+1);
        header('Location: https://projet5.mamzellea.fr/connexion.html');
        exit;
      } else {
        $this->_alert = 'Le code renseigné ne correspond pas à celui enregistré.';
      }
    }
    $view = $this->_view->genView(array('alert' => $this->_alert));
    return $view;
  }
}
