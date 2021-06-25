<?php
namespace projet5\lib;
use projet5\model\model_user\Datas_manager as DatasMan;
use projet5\lib\Builder;
use projet5\lib\MyException as MyException;

class Api_builder extends Builder {

  public function datasBuilder() {
    $titles = parent::titlesGeneratorAll();
    $hours = parent::hoursGeneratorAll();
    $rooms = parent::roomsGeneratorAll();
    $artworks = parent::artworksGeneratorAll();
    $tours = parent::infoToursAll();
    $details = parent::detailsToursGeneratorAll();
    $datas = array(
      'titles' => $titles,
      'hours' => $hours,
      'rooms' => $rooms,
      'artworks' => $artworks,
      'tours' => $tours,
      'details' => $details
    );
    return $datas;
  }

  private function getDatas($query) {
    switch ($query) {
      case 'titles' :
        if(isset($_GET['title'])){
          $title = intval($_GET['title']);
          return parent::titlesGeneratorId($title);
        } else{return parent::titlesGeneratorAll();}
        break;
      case 'entrances' :
        if(isset($_GET['entrance'])){
          $entrance = intval($_GET['entrance']);
          return parent::entrancesGeneratorId($entrance);
        } else{return parent::entrancesGeneratorAll();}
        break;
      case 'hours' :
        if(isset($_GET['hour'])){
          $hour = intval($_GET['hour']);
          return parent::hoursGeneratorId($hour);
        } elseif(isset($_GET['day'])){
          $day = intval($_GET['day']);
          return parent::hoursLinkDaysGeneratorId($day);
        } elseif(isset($_GET['option']) && $_GET['option'] == 'onlyhours'){
          return parent::hoursGeneratorAll();
        } else {return parent::hoursLinkDaysGeneratorAll();}
        break;
      case 'days' :
        if(isset($_GET['day'])){
          $day = intval($_GET['day']);
          return parent::daysGeneratorId($day);
        } else{return parent::daysGeneratorAll();}
        break;
      case 'rooms' :
        if(isset($_GET['room'])){
          $room = intval($_GET['room']);
          return parent::roomsGeneratorId($room);
        } elseif(isset($_GET['close'])){
          $close = intval($_GET['close']);
          return parent::roomsClosedGeneratorId($close);
        } else {return parent::roomsGeneratorAll();}
        break;
      case 'artworks' :
        if(isset($_GET['day'])){
          $day = intval($_GET['day']);
          if(isset($_GET['option'])){
            if($_GET['option'] == 'daytime'){
              return parent::artworksGeneratorId($day, 'noctime');
            } else if ($_GET['option'] == 'noctime'){
              return parent::artworksGeneratorId($day, 'daytime');
            } else {throw new MyException('Ressource non trouvée', 404);}
          } else {return parent::artworksGeneratorId($day, 'noctime');}
        } else {return parent::artworksGeneratorAll();}
        break;
      case 'tours' :
        if(isset($_GET['day'])){
          $day = intval($_GET['day']);
          if(isset($_GET['option'])){
            if($_GET['option'] == 'noctime'){return parent::infoToursIdDay($day, 'daytime');}
            elseif($_GET['option'] == 'daytime'){return parent::infoToursIdDay($day, 'noctime');}
            else {throw new MyException('Ressource non trouvée', 404);}
          } else {return parent::infoToursIdDay($day, 'noctime');}
        } elseif(isset($_GET['tour'])){
          $tour = intval($_GET['tour']);
          return parent::infoTourIdTour($tour);
        } else {return parent::infoToursAll();}
        break;
      case 'details' :
        if(isset($_GET['tour'])){
          $tour = intval($_GET['tour']);
          return parent::detailsToursGeneratorId($tour);
        } else {return parent::detailsToursGeneratorAll();}
        break;
      default :
        throw new MyException('Ressource non trouvée', 404);
        break;
    }
  }

  private function postDatas($datas) {
    if($_GET['action'] == 'create'){
      switch ($datas) {
        case 'titles' :
          $titles = $this->_manager->addTitlesLinkEntrances($_POST['name_ti'], $_POST['color'], $_POST['ids_entrance']);
          break;
        default :
          throw new MyException('Ressource non trouvée', 404);
          break;
      }
    } else {throw new MyException('Erreur de syntaxe dans la requête', 400);}
  }

  private function putDatas($datas) {
    if($_GET['action'] == 'update'){
      $_PUT = array();
      parse_str(file_get_contents('php://input'), $_PUT);
      switch ($datas) {
        case 'titles' :
          $this->_manager->updateTitle($_PUT['name_title'], $_PUT['color'], $_PUT['id']);
          break;
        case 'entrances' :
          $this->_manager->updateEntrances($_PUT['entrance'], $_PUT['id_entrance'], $_PUT['id_title']);
          break;
        default :
          throw new MyException('Ressource non trouvée', 404);
          break;
      }
    } else {throw new MyException('Erreur de syntaxe dans la requête', 400);}
  }

  private function deleteDatas ($datas) {
    if($_GET['action'] == 'delete'){
      switch ($datas) {
        case 'titles' :
          $this->_manager->deleteTitles($_GET['title']);
          break;
        default :
          throw new MyException('Ressource non trouvée', 404);
          break;
      }
    } else {throw new MyException('Erreur de syntaxe dans la requête', 400);}
  }

  public function manageApi($param) {
    $request = $_SERVER["REQUEST_METHOD"];
    switch ($request) {
      case 'GET' :
        if ($_GET[$param] == 'api') {
          $datas = $this->datasBuilder();
        } else {
          $datas = $this->getDatas($_GET[$param]);
        }
        return $datas;
        break;
      case 'POST' :
        $this->postDatas($_GET[$param]);
        break;
      case 'PUT' :
        $this->putDatas($_GET[$param]);
        break;
      case 'DELETE' :
        $this->deleteDatas($_GET[$param]);
        break;
      default:
        throw new MyException('Méthode de requête non autorisée', 405);
        break;
    }
  }
  public function apiGen($get) {
    $response = $this->manageApi($get);
    $api = json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
    header('Content-Type: application/json');
    return $api;
  }
}
