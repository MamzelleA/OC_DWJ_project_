<?php
namespace projet5\controller\user_controller;
use projet5\controller\user_controller\User_controller;
use \projet5\model\Member_manager as Member;
use \projet5\lib\MyException as MyException;

class Member_controller extends User_controller {

  public function home() {
    $checkT = $this->checkToken(array('form-conn', 'admin-conn'));
    if($checkT == true){
      $content = parent::content(array('home-me'));
      $view = $this->_view->genView(array('content' => $content));
      return $view;
    } else {
      parent::oups('connexion');
    }
  }

  public function account() {
    $checkT = $this->checkToken(array('form-conn', 'admin-conn'));
    if($checkT == true){
      $pseudo = $_SESSION['pseudo'];
      $pwOld = $this->_member->getPw($pseudo);
      $info = $this->_member->getMember($pseudo);
      $last = $info['lastname'];
      $first = $info['firstname'];
      $email = $info['email'];
      if(isset($_POST['valid-modify-info'])){
        $lastN = parent::cleanValue($_POST['lastname']);
        $firstN = parent::cleanValue($_POST['firstname']);
        $emailN = parent::cleanValue($_POST['email']);
        if(preg_match(parent::REGFILL, $lastN) && preg_match(parent::REGFILL, $firstN)){
          if(preg_match(parent::REGMAIL, $emailN)) {
            $checkE = $this->_member->checkEmail($emailN);
            if(empty($checkE) || $checkE['email'] == $email){
              $this->_member->updateInfo($lastN, $firstN, $emailN, $pseudo);
              parent::setCookie('alert', 'Vos modifications ont bien été mise à jour.', time()+1);
              header('Location: https://projet5.mamzellea.fr/account.html');
              exit;
            } else {
              $this->_alert = 'Un compte est déjà associé à cet email.';
            }
          } else {
            $this->_alert = 'Le format de l\'email n\'est pas valide';
          }
        } else {$this->_alert = 'Certains champs ne sont pas renseignés ou ne respectent pas le format attendu';}
      } else if (isset($_POST['valid-modify-pw'])) {
        $old = parent::cleanValue($_POST['old-pw']);
        $new = parent::cleanValue($_POST['new-pw']);
        $pwOld = $this->_member->getPw($pseudo);
        $verify = password_verify($old, $pwOld['password']);
        if($verify) {
          parent::updatePass($pseudo, $old, $new, $_POST['confirm-new-pw']);
          parent::setCookie('alert', 'Votre mot de passe a été modifié.', time()+1);
          header('Location: https://projet5.mamzellea.fr/account.html');
          exit;
        } else {
          $this->_alert = 'Le mot de passe saisi dans le 1er champs ne correspond pas à celui enregistré.';
        }
      } else if (isset($_POST['valid-del-account'])){
        if(empty($_POST['del-pseudo']) || empty($_POST['del-pw'])){
          $this->_alert = 'Tous les champs doivent être renseignés';
        } else {
          $pseudo = parent::cleanValue($_POST['del-pseudo']);
          $checkP = $this->_member->checkPseudo($pseudo);
          $pass = $this->_member->getPw($pseudo);
          $pwClean = parent::cleanValue($_POST['del-pw']);
          $verify = password_verify($pwClean, $pass['password']);
          if(empty($checkP) || !$verify){
            $this->_alert = 'L\'identifiant et/ou le mot de passe renseignés ne sont pas valides.';
          } else {
            $this->_member->delMember($pseudo);
            unset($_SESSION['pseudo'], $_SESSION['form-conn_token'], $_SESSION['form-conn_token_time']);
            parent::setCookie('alert', 'Votre compte a été supprimé avec succès !', time()+1);
            header('Location: https://projet5.mamzellea.fr/home.html');
            exit();
          }
        }
      }
      $view = $this->_view->genView(array('pseudo' => $pseudo, 'lastname' => $last, 'firstname' => $first, 'email' => $email, 'alert' => $this->_alert));
      return $view;
    } else {
      parent::oups('connexion');
    }
  }

  public function preparation() {
    $checkT = $this->checkToken(array('form-conn', 'admin-conn'));
    if($checkT == true){
      $content =$this->content(array('entrances-si', 'hours-si', 'rooms-si', 'artworks-si', 'tours-si','titles-details', 'hours-details', 'rooms-details', 'aw-details', 'tours-details', 'tour-details'));
      $saveTitle = $this->getSavings('title');
      $saveDay = $this->getSavings('day');
      $saveTour = $this->getSavings('tour');
      if(isset($_POST)){
        $checkId = $this->_member->checkId($_SESSION['pseudo']);
        if(isset($_POST['save-title'])){
            $this->updateOrAddSavings('title', $checkId, $_SESSION['pseudo'], 'titre d\'accès');
            header('Location: https://projet5.mamzellea.fr/preparation.html');
            exit;
        } else if(isset($_POST['save-day'])){
          $this->updateOrAddSavings('day', $checkId, $_SESSION['pseudo'], 'jour de visite');
          header('Location: https://projet5.mamzellea.fr/preparation.html');
          exit;
        } else if(isset($_POST['save-tour'])){
          $this->updateOrAddSavings('tour', $checkId, $_SESSION['pseudo'], 'parcours');
          header('Location: https://projet5.mamzellea.fr/preparation.html');
          exit;
        }
      }
      $view = $this->_view->genView(array('title' => $saveTitle, 'day' => $saveDay, 'tour' => $saveTour, 'content' => $content, 'alert' => $this->_alert));
      return $view;
    } else {
      parent::oups('connexion');
    }
  }

  public function visit() {
    $checkT = $this->checkToken(array('form-conn', 'admin-conn'));
    if($checkT == true){
      $title = $this->getSavings('title');
      $day = $this->getSavings('day');
      $tour = $this->getSavings('tour');
      if(isset($_POST['del-my-title'])){
        $this->_member->delTitle($_SESSION['pseudo']);
        parent::setCookie('alert', 'Le titre d\'accès <span class="text-uppercase font-weight-bold">' .$title['name_title']. '</span> a bien été supprimé de votre compte.', time()+1);
        header('Location: https://projet5.mamzellea.fr/visit.html');
        exit;
      } else if(isset($_POST['del-my-day'])){
        $this->_member->delDay($_SESSION['pseudo']);
        parent::setCookie('alert', 'Le jour de visite <span class="text-uppercase font-weight-bold">' .$day['name_day']. '</span> a bien été supprimé de votre compte.', time()+1);
        header('Location: https://projet5.mamzellea.fr/visite.html');
        exit;
      } else if(isset($_POST['del-my-tour'])){
        $this->_member->delTour($_SESSION['pseudo']);
        parent::setCookie('alert', 'Le parcours <span class="text-uppercase font-weight-bold">' .$tour['name_tour']. '</span> a bien été supprimé de votre compte.', time()+1);
        header('Location: https://projet5.mamzellea.fr/visit.html');
        exit;
      }
      $content =$this->content(array('titles-details', 'hours-details', 'rooms-details', 'aw-details', 'tour-details'));
      $view = $this->_view->genView(array('title' => $title, 'day' => $day, 'tour' => $tour, 'content' => $content));
      return $view;
    } else {
      parent::oups('connexion');
    }
  }

  public function tour() {
    $checkT = $this->checkToken(array('form-conn', 'admin-conn'));
    if($checkT == true){
        $tour = $this->getSavings('tour');
        $_SESSION['name_tour'] = $tour['name_tour'];
        $_SESSION['id_tour'] = $tour['id_tour'];
        if(isset($_SESSION['name_tour']) && isset($_SESSION['id_tour'])){
            $view = $this->_view->genTour();
            return $view;
        } else {
            parent::setCookie('alert', 'Impossible de charger le parcours ' .$tour['name_tour']. '.', time()+1);
            header('Location:https://projet5.mamzellea.fr/visit.html');
            exit;
        }
    } else {
        $this->setCookie('alert', 'Vous êtes déconnecté de votre espace.', time()+1, 'connexion');
        parent::oups('connexion');
    }
  }

  public function disconnect () {
    session_destroy();
    parent::setCookie('alert', 'Vous êtes déconnecté de votre espace.', time()+1);
  	header('Location: https://projet5.mamzellea.fr/home.html');
  	exit();
	}

  private function getSavings ($option) {
    $method = 'get' .ucfirst($option);
    $array = $this->_member->$method($_SESSION['pseudo']);
    $result = array(
      'id_' .$option => $array['id_' .$option],
      'name_' .$option => $array['name_' .$option]
    );
    return $result;
  }

  private function updateOrAddSavings ($select, $exist, $pseudo, $name){
    $post = parent::cleanValue($_POST['select-' .$select]);
    $postArray = explode('|', $post);
    $postId = $postArray[0];
    if(isset($postArray[1])){$postName = $postArray[1];}
    if($postId == 'tous'){parent::setCookie('alert', 'Vous ne pouvez pas enregistrer cette option.', time()+1);}
    else {
      if($select == 'day' && $postId == 2) {parent::setCookie('alert', 'Le musée étant fermé le mardi, il n\'est pas pertinent de sauvegardé cette option, non ?', time()+1);}
      else {
        if(!$exist){
          $method = 'add' .ucfirst($select);
        } else {
          $method = 'update' .ucfirst($select);
        }
        $this->_member->$method($pseudo, $postId);
        parent::setCookie('alert', 'Le '.$name. ' <span class="text-uppercase font-weight-bold">' .$postName. '</span> a bien été enregistré.', time()+1);
      }
    }
  }
}
