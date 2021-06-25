<?php
namespace projet5\controller\admin_controller;
use \projet5\controller\user_controller\Member_controller;
use \projet5\model\user_manager\Member_manager as Member;
use \projet5\model\admin_manager\Admin_manager as Admin;
use \projet5\lib\Query_curl as Curl;
use \projet5\lib\Api_builder as ApiBuild;
use \projet5\lib\MyException as MyException;

class Admin_controller extends Member_controller {

  protected $_curl;

  public function __construct($template, $side, $name) {
    parent:: __construct($template, $side, $name);
    $this->member();
    $this->_curl = new Curl();
  }

  private function setMember() {
    if(file_exists(parent::MEMBERPATH)) {
      $this->_member = new Admin(parent::MEMBERPATH);
    } else {throw new MyException('Une erreur est survenue. Veuillez réessayer plus tard.', 410);}
  }

  private function member () {
    return $this->setMember();
  }

  public function dlad() {
    if(isset($_POST['valid-admin-conn'])){
        parent::connexionGeneric('valid-admin-conn', 'pseudo-admin-conn', 'pw-admin-conn', 'admin');
        if(!isset($_SESSION['admin-conn_token'])){$this->_alert = 'Vous n\'avez pas les droits pour accèder à cet espace.';}
    }
    $view = $this->_view->genAdmin(array('alert' => $this->_alert));
    return $view;
  }

  public function admin() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $view = $this->_view->genAdmin();
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function pages() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $view = $this->_view->genAdmin();
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function members() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $paginate = parent::paginator(5, $this->_member, 'countMembers', 'getMembers');
      $view = $this->_view->genAdmin(array('members' => $paginate['members'], 'page' => $paginate['page'], 'pages' => $paginate['pages'], 'alert' => $this->_alert));
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function datas() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $view = $this->_view->genAdmin();
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function titlesDatas() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
        $count = 0;
        if(isset($_GET['title'])){
            $titles = NULL;
            $title = $this->_curl->getQueryIdDatas('titles', 'title', $_GET['title']);
            if(isset($_POST['delete-title'])) {
                parent::setCookie('alert', 'Le titre d\'accès a bien été supprimé', time()+1);
                $id = parent::cleanValue($_POST['static-id-ti']);
                $this->_curl->deleteQueryIdDatas('titles', 'title', intval($id));
                header('Location: https://projet5.mamzellea.fr/titles-datas.html');
                exit;
            } elseif (isset($_POST['update-title'])) {
          if(isset($_POST['name-ti']) && $_POST['name-ti'] != '' && isset($_POST['color']) && $_POST['color'] != ''){
            $name = parent::cleanValue($_POST['name-ti']);
            $color = parent::cleanValue($_POST['color']);
            $idTi = parent::cleanValue($_POST['static-id']);
            $colors = $this->_curl->getQueryIdDatas('entrances', 'entrance', 1); //entrée id 1 contient toutes les couleurs
            if(in_array($color, $colors['lines'])){
              $datas = array('name_title' => $name, 'color' => $color, 'id' => $idTi);
              $this->_curl->putQueryIdDatas('titles', 'title', $idTi, $datas);
              $entrances = $this->_curl->getQueryDatas('entrances');
              foreach ($entrances as $en) {
                $idEntrances[] = $en['id'];
              }
              foreach ($title['entrances'] as $en) {
                $idEn[$count] = parent::cleanValue($_POST['entrance-id-' .$count]);
                //if(in_array($idEn[$count], $idEntrances)) {
                     $datas = array('entrance' => $idEn[$count], 'id_title' => $idTi, 'id_entrance' => $en['id']);
                    $this->_curl->putQueryIdDatas('entrances', 'title', $idTi, $datas);
                    $count++;
                //} else {$this->_alert = 'L\'id renseigné d\'une entrée n\'existe pas.';}
              }
              $count = 0;
                header('Location: https://projet5.mamzellea.fr/titles-datas.html');
                exit;
            } else {$this->_alert = 'La couleur renseignée n\'existe pas. Vous devez d\'abord associer une nouvelle couleur à une ou des entrées.';}
          } else {$this->_alert = 'Tous les champs doivent être remplis';}
        }
        } else {
            $title = NULL;
            $titles = $this->_curl->getQueryDatas('titles');
            if(isset($_POST['add-title'])){
                if(isset($_POST['add-name-ti']) && $_POST['add-name-ti'] != '' && isset($_POST['add-color']) && $_POST['add-color'] != ''){
                    $name = parent::cleanValue($_POST['add-name-ti']);
                    $color = parent::cleanValue($_POST['add-color']);
                    $max = $_POST['hidden-max'];
                    while ($count<=$max){
                        if(isset($_POST['add-entrance-id-' .$count]) && $_POST['add-entrance-id-' .$count] != ''){
                            $idEn[$count] = parent::cleanValue($_POST['add-entrance-id-' .$count]);
                            $count++;
                        } else {$this->_alert = 'Tous les champs doivent être remplis';}
                    }
                    $count = 0;
                    $datas = array('name_ti' => $name, 'color' => $color, 'ids_entrance' => $idEn);
                    $this->_curl->postQueryDatas('titles', $datas);
                    parent::setCookie('alert', 'Le titre d\'accès a bien été ajouté', time()+1);
                    header('Location: https://projet5.mamzellea.fr/titles-datas.html');
                    exit;
                } else {$this->_alert = 'Tous les champs doivent être remplis';}
            }
        }
        $view = $this->_view->genAdmin(array('titles' => $titles, 'title' => $title, 'count' => $count, 'alert' => $this->_alert));
        return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function entrancesDatas() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $count = 0;
      $entrances = $this->_curl->getQueryDatas('entrances');
      $view = $this->_view->genAdmin(array('entrances' => $entrances, 'entrance'=> $entrance, 'count' => $count));
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function hoursDatas() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $hours = $this->_curl->getQueryOptionDatas('hours', 'onlyhours');
      $days = $this->_curl->getQueryDatas('days');
      $view = $this->_view->genAdmin(array('hours' => $hours, 'days' => $days));
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function roomsDatas() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $rooms = $this->_curl->getQueryDatas('rooms');
      $view = $this->_view->genAdmin(array('rooms' => $rooms));
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function artworksDatas() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $artworks = $this->_curl->getQueryDatas('artworks');
      $view = $this->_view->genAdmin(array('artworks' => $artworks));
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function toursDatas() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $tours = $this->_curl->getQueryDatas('tours');
      $view = $this->_view->genAdmin(array('tours' => $tours));
      return $view;
    } else {
      parent::oups('dlad');
    }
  }

  public function detailsDatas() {
    $checkT = $this->checkToken('admin-conn');
    if($checkT == true){
      $details = $this->_curl->getQueryIdDatas('details', 'tour', $_GET['tour']);
      $view = $this->_view->genAdmin(array('details' => $details));
      return $view;
    } else {
      parent::oups('dlad');
    }
  }
}
