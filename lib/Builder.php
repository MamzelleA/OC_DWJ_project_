<?php
namespace projet5\lib;
use \projet5\model\user_manager\Datas_manager as DatasMan;
use projet5\lib\MyException as MyException;

class Builder {

  protected $_manager;

  public function __construct($path) {
    $this->manager($path);
  }

  public function setManager($path) {
    if(file_exists($path)) {
      $this->_manager = new DatasMan($path);
    } else {throw new MyException('Une erreur est survenue. Veuillez réessayer plus tard.', 410);}
  }

  public function manager($path) {
    return $this->setManager($path);
  }

  public function titlesGeneratorAll() {
    $titles = $this->_manager->titlesAll();
    $entrances = $this->_manager->entrancesLinkTitlesAll();
    for($i=0; $i<count($titles);$i++) {
      $array[$i] = array(
        'id' => $titles[$i]['id'],
        'name_title' => $titles[$i]['name_title'],
        'color' => $titles[$i]['color']
      );
      for($j=0; $j<count($entrances);$j++) {
        if($entrances[$j]['id_title'] == $titles[$i]['id']) {
          $array[$i]['entrances'][$j]['id'] = $entrances[$j]['id'];
          $array[$i]['entrances'][$j]['location'] = $entrances[$j]['location'];
        }
      }
      $array[$i]['entrances'] = array_values($array[$i]['entrances']);
    }
    return $array;
  }

  public function titlesGeneratorId($idTitle) {
    $titles = $this->_manager->titlesId($idTitle);
    $entrances = $this->_manager->entrancesLinkTitleId($idTitle);
    $array = array(
      'id' => $titles['id'],
      'name_title' => $titles['name_title'],
      'color' => $titles['color']
    );
    for($j=0; $j<count($entrances);$j++) {
      if($entrances[$j]['id_title'] == $titles['id']) {
        $array['entrances'][$j]['id'] = $entrances[$j]['id'];
        $array['entrances'][$j]['location'] = $entrances[$j]['location'];
      }
    }
    $array['entrances'] = array_values($array['entrances']);
    return $array;
  }

  public function entrancesGeneratorAll() {
    $entrances = $this->_manager->entrancesAll();
    $titles = $this->_manager->titlesLinkEntrancesAll();
    for($i=0; $i<count($entrances); $i++){
      $array[$i] = array(
        'id' => $entrances[$i]['id'],
        'location' => $entrances[$i]['location']
      );
      for($j=0; $j<count($titles); $j++){
        if($titles[$j]['id_entrance'] == $entrances[$i]['id']){
          $array[$i]['lines'][] = $titles[$j]['color'];
        }
      }
      $array[$i]['lines'] = array_values(array_unique($array[$i]['lines']));
    }
    return $array;
  }

  public function entrancesGeneratorId($idEntrance) {
    $entrances = $this->_manager->entrancesId($idEntrance);
    $array = array(
      'id' => $entrances[0]['id'],
      'location' => $entrances[0]['location'],
    );
    for($i=0; $i<count($entrances); $i++){
      $array['lines'][] = $entrances[$i]['color'];
    }
    return $array;
  }

  public function hoursGeneratorAll() {
    $hours = $this->_manager->hoursAll();
    return $hours;
  }

  public function hoursGeneratorId($id) {
    $hours = $this->_manager->hoursId($id);
    return $hours;
  }

  public function daysGeneratorAll() {
    $days = $this->_manager->daysAll();
    return $days;
  }

  public function daysGeneratorId($id){
    $day = $this->_manager->daysId($id);
    return $day;
  }

  public function hoursLinkDaysGeneratorAll() {
    $hours = $this->_manager->hoursLinkDaysAll();
    $days = $this->_manager->daysLinkHoursAll();
    for($i=0; $i<count($days);$i++) {
      $array[$i] = array(
        'id' => $days[$i]['id'],
        'name_day' => $days[$i]['name_day'],
        'day_open' => $days[$i]['daytime'],
        'evening_open' => $days[$i]['evening']
      );
      for($j=0; $j<count($hours);$j++) {
        if($days[$i]['id'] == $hours[$j]['id_day']) {
          $array[$i]['open'] = $hours[$j]['open'];
          $array[$i]['close_cashier'] = $hours[$j]['close_cashier'];
          $array[$i]['close_access'] = $hours[$j]['close_access'];
          $array[$i]['close_rooms'] = $hours[$j]['close_rooms'];
          $array[$i]['close_museum'] = $hours[$j]['close_museum'];
          $array[$i]['close_pyramid'] = $hours[$j]['close_pyramid'];
        }
      }
    }
    return $array;
  }

  public function hoursLinkDaysGeneratorId($idDay) {
    $hours = $this->_manager->hoursLinkDaysId($idDay);
    $days = $this->_manager->daysLinkHoursId($idDay);
    if($hours == true){
      if($days['id'] == $hours['id_day']){
        $array = array(
          'id' => $days['id'],
          'name_day' => $days['name_day'],
          'day_open' => $days['daytime'],
          'evening_open' => $days['evening'],
          'open' => $hours['open'],
          'close_cashier' => $hours['close_cashier'],
          'close_access' => $hours['close_access'],
          'close_rooms' => $hours['close_rooms'],
          'close_museum' => $hours['close_museum'],
          'close_pyramid' => $hours['close_pyramid']
        );
      }
    } else {$array = NULL;}
    return $array;
  }

  public function roomsClosedGeneratorId($idDay) {
    $rooms = $this->_manager->roomsClosedOnIdDay($idDay);
    return $rooms;
  }

  public function roomsGeneratorAll() {
    $rooms = $this->_manager->roomsLinkDaysArtworksAll();
    $days = $this->_manager->daysLinkRoomsAll();
    $artworks = $this->_manager->artworksLinkRooms();
    $tours = $this->_manager->toursLinkArtworksAll();
    for($i=0; $i<count($rooms);$i++) {
      $array[$i] = array(
        'id' => $rooms[$i]['id'],
        'name_rooms' => $rooms[$i]['name_rooms'],
        'wing' => $rooms[$i]['wing'],
        'floor' => $rooms[$i]['floor'],
        'numbers' => $rooms[$i]['numbers_ro'],
        'collection' => $rooms[$i]['collection'],
        'picture_coll' => $rooms[$i]['picture_coll']
      );
      for($j=0; $j<count($days);$j++) {
        if($days[$j]['id_rooms'] == $rooms[$i]['id']) {
          $array[$i]['close'][$j] = array(
            'id_day' => $days[$j]['id'],
            'day' => $days[$j]['name_day'],
            'moment' => $days[$j]['close_moment']
          );
        }
      }
      if(isset($array[$i]['close'])){$array[$i]['close'] = array_values($array[$i]['close']);}
      for($k=0; $k<count($artworks);$k++) {
        if($artworks[$k]['id_rooms'] == $rooms[$i]['id']) {
          $array[$i]['artworks'][$k] = array(
            'id_artwork' => $artworks[$k]['id'],
          );
          for($l=0; $l<count($tours); $l++){
            if($tours[$l]['id_artwork'] == $artworks[$k]['id']){
              $array[$i]['artworks'][$k]['tour'][$l] = $tours[$l]['id'];
            }
          }
        }
        if(isset($array[$i]['artworks'][$k]['tour'])){$array[$i]['artworks'][$k]['tour'] = array_values($array[$i]['artworks'][$k]['tour']);}
      }
      if(isset($array[$i]['artworks']) ){$array[$i]['artworks'] = array_values($array[$i]['artworks']);}
    }
    return $array;
  }

  public function roomsGeneratorId($id) {
    $rooms = $this->_manager->roomsLinkDaysArtworksId($id);
    $days = $this->_manager->daysLinkRoomsId($id);
    $artworks = $this->_manager->artworksLinkRoomsId($id);
    $tours = $this->_manager->toursLinkArtworksAll();
    $array = array(
      'id' => $rooms['id'],
      'name_rooms' => $rooms['name_rooms'],
      'wing' => $rooms['wing'],
      'floor' => $rooms['floor'],
      'numbers' => $rooms['numbers_ro'],
      'collection' => $rooms['collection'],
      'picture_coll' => $rooms['picture_coll'],
    );
    for($i=0; $i<count($days); $i++){
      $array['close'][$i] = array(
        'id_day' => $days[$i]['id'],
        'day' => $days[$i]['name_day'],
        'moment' => $days[$i]['close_moment']
      );
    }
    for($j=0; $j<count($artworks); $j++){
      $array['artworks'][$j] = array(
        'id_artwork' => $artworks[$j]['id'],
      );
      for($k=0; $k<count($tours); $k++){
        if($tours[$k]['id_artwork'] == $artworks[$j]['id']){
          $array['artworks'][$j]['tour'][$k] = $tours[$k]['id'];
        }
      }
      if(isset($array['artworks'][$j]['tour'])){$array['artworks'][$j]['tour'] = array_values($array['artworks'][$j]['tour']);}
    }
    return $array;
  }

  public function artworksGeneratorAll() {
    return $this->_manager->artworksLinkRoomsAll();
  }

  public function artworksGeneratorId($idDay, $moment) {
    return $this->_manager->artworksLinkRoomsLessDay($idDay, $moment);
  }

  public function infoToursIdDay($idDay, $moment) {
    $tours = $this->_manager->toursWorkableOnDayLinkPublic($idDay, $moment);
    return $tours;
  }

  public function infoToursAll() {
    $tours = $this->_manager->toursLinkPublicAll();
    return $tours;
  }

  public function infoTourIdTour($idTour) {
    $tour = $this->_manager->tourLinkPublicId($idTour);
    return $tour;
  }

  public function detailsToursGeneratorAll() {
    $tours =$this->_manager->toursAll();
    for($i=0; $i<count($tours);$i++){
      $details = $this->_manager->artworksAndRoomsLinkTourId($tours[$i]['id']);
      for($j=0; $j<count($details); $j++) {
        if($details[$j]['id_tour'] == $tours[$i]['id']){
          $array[$i]['steps'][$j] = array(
            'step' => $details[$j]['step'],
            'id_aw' => $details[$j]['id_artwork'],
            'picture_aw' => $details[$j]['picture_aw'],
            'artwork' => $details[$j]['name_artwork'],
            'author' => $details[$j]['author'],
            'wing' => $details[$j]['wing'],
            'floor' => $details[$j]['floor'],
            'room' => $details[$j]['room'],
            'collection' => $details[$j]['collection'],
            'picture_coll' => $details[$j]['picture_coll'],
            'map' => $details[$j]['map_st']
          );
        }
      }
      $array[$i] = array(
        'id' => $tours[$i]['id'],
        'name' => $tours[$i]['name_tour'],
        'picture_to' => $tours[$i]['picture_to'],
        'steps' => $array[$i]['steps']
      );
    }
    return $array;
  }

  public function detailsToursGeneratorId($idTour) {
    $details = $this->_manager->tourLinkArtworksAndRoomsId($idTour);
    for($i=0; $i<count($details); $i++) {
      $steps[] = array(
        'id_aw' => $details[$i]['id_artwork'],
        'picture_aw' => $details[$i]['picture_aw'],
        'artwork' => $details[$i]['name_artwork'],
        'author' => $details[$i]['author'],
        'wing' => $details[$i]['wing'],
        'floor' => $details[$i]['floor'],
        'room' => $details[$i]['room'],
        'collection' => $details[$i]['collection'],
        'picture_coll' => $details[$i]['picture_coll'],
        'step' => $details[$i]['step'],
        'map' => $details[$i]['map_st']
      );
    }
    $array = array(
      'id' => $details[0]['id'],
      'name' => $details[0]['name_tour'],
      'picture_to' => $details[0]['picture_to'],
      'steps' => $steps
    );
    return $array;
  }
}
