<?php
namespace projet5\model\user_manager;
use \projet5\model\Manager;
use PDO;

class Datas_manager extends Manager {

  public function titlesAll() {
    $sql = 'SELECT DISTINCT ti.id, ti.name_title, ti.color
            FROM mamzelle_projet05_datas.titles ti
            ORDER BY ti.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function entrancesLinkTitlesAll() {
    $sql = 'SELECT DISTINCT en.id, en.location, te.id_title
            FROM mamzelle_projet05_datas.entrances en
            INNER JOIN mamzelle_projet05_datas.title_entrance AS te ON te.id_entrance = en.id
            ORDER BY en.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function titlesId($id) {
    $sql = 'SELECT DISTINCT ti.id, ti.name_title, ti.color, te.id_entrance
            FROM mamzelle_projet05_datas.titles ti
            INNER JOIN mamzelle_projet05_datas.title_entrance AS te ON te.id_title = ti.id
            WHERE ti.id = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function titlesLinkEntrancesAll() {
    $sql = 'SELECT DISTINCT ti.id, ti.name_title, ti.color, te.id_entrance
            FROM mamzelle_projet05_datas.titles ti
            INNER JOIN mamzelle_projet05_datas.title_entrance AS te ON te.id_title = ti.id
            ORDER BY ti.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function entrancesAll() {
    $sql = 'SELECT DISTINCT en.id, en.location
            FROM mamzelle_projet05_datas.entrances en
            ORDER BY en.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function entrancesLinkTitleId($id) {
      $sql = 'SELECT DISTINCT en.id, en.location, te.id_title, ti.color
              FROM mamzelle_projet05_datas.entrances en
              INNER JOIN mamzelle_projet05_datas.title_entrance AS te ON te.id_entrance = en.id
              INNER JOIN mamzelle_projet05_datas.titles AS ti ON ti.id = te.id_title
              WHERE ti.id = ?
              ORDER BY en.id ASC';
      $req = $this->execRequest($sql, array(1 => $id));
      $result = $req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $result;
    }

  public function entrancesId($id) {
    $sql = 'SELECT DISTINCT en.id, en.location, ti.color
            FROM mamzelle_projet05_datas.entrances en
            INNER JOIN mamzelle_projet05_datas.title_entrance AS te ON te.id_entrance = en.id
            INNER JOIN mamzelle_projet05_datas.titles AS ti ON ti.id = te.id_title
            WHERE en.id = ?
            ORDER BY en.id ASC';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function hoursAll() {
    $sql = 'SELECT ho.id, ho.open, ho.close_cashier, ho.close_access, ho.close_rooms, ho.close_museum, ho.close_pyramid
            FROM mamzelle_projet05_datas.hours ho
            ORDER BY ho.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function hoursId($id) {
    $sql = 'SELECT ho.id, ho.open, ho.close_cashier, ho.close_access, ho.close_rooms, ho.close_museum, ho.close_pyramid
            FROM mamzelle_projet05_datas.hours ho
            WHERE ho.id = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function hoursLinkDaysAll() {
    $sql = 'SELECT ho.open, ho.close_cashier, ho.close_access, ho.close_rooms, ho.close_museum, ho.close_pyramid, hd.id_day
            FROM mamzelle_projet05_datas.hours ho
            INNER JOIN mamzelle_projet05_datas.hours_days AS hd ON hd.id_hour = ho.id
            ORDER BY ho.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function hoursLinkDaysId($id) {
    $sql = 'SELECT ho.open, ho.close_cashier, ho.close_access, ho.close_rooms, ho.close_museum, ho.close_pyramid, hd.id_day
            FROM mamzelle_projet05_datas.hours ho
            INNER JOIN mamzelle_projet05_datas.hours_days AS hd ON hd.id_hour = ho.id
            WHERE hd.id_day = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function daysAll() {
    $sql = 'SELECT da.id, da.name_day, da.daytime, da.evening
            FROM mamzelle_projet05_datas.days da
            ORDER BY da.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function daysId($id) {
    $sql = 'SELECT da.id, da.name_day, da.daytime, da.evening
            FROM mamzelle_projet05_datas.days da
            WHERE da.id = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function daysLinkHoursAll() {
    $sql = 'SELECT da.id, da.name_day, da.daytime, da.evening, hd.id_hour
            FROM mamzelle_projet05_datas.days da
            LEFT JOIN mamzelle_projet05_datas.hours_days AS hd ON hd.id_day = da.id
            ORDER BY da.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function daysLinkHoursId($id) {
    $sql = 'SELECT da.id, da.name_day, da.daytime, da.evening, hd.id_hour
            FROM mamzelle_projet05_datas.days da
            LEFT JOIN mamzelle_projet05_datas.hours_days AS hd ON hd.id_day = da.id
            WHERE da.id = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function daysLinkRoomsAll() {
    $sql = 'SELECT da.id, da.name_day, da.daytime, da.evening, rd.id_rooms, rd.close_moment
            FROM mamzelle_projet05_datas.days da
            LEFT JOIN mamzelle_projet05_datas.rooms_days AS rd ON rd.id_day = da.id
            ORDER BY rd.id_rooms ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function daysLinkRoomsId($id) {
    $sql = 'SELECT da.id, da.name_day, da.daytime, da.evening, rd.id_rooms, rd.close_moment
            FROM mamzelle_projet05_datas.days da
            LEFT JOIN mamzelle_projet05_datas.rooms_days AS rd ON rd.id_day = da.id
            WHERE rd.id_rooms = ?
            ORDER BY rd.id_rooms ASC';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function roomsLinkDaysArtworksAll() {
    $sql = 'SELECT DISTINCT ro.id, ro.name_rooms, ro.wing, ro.floor, ro.numbers_ro, ro.collection, ro.picture_coll, rd.id_rooms, ra.id_rooms
            FROM mamzelle_projet05_datas.rooms ro
            LEFT JOIN mamzelle_projet05_datas.rooms_days AS rd ON rd.id_rooms = ro.id
            LEFT JOIN mamzelle_projet05_datas.rooms_artworks AS ra ON ra.id_rooms = ro.id
            ORDER BY ro.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function roomsLinkDaysArtworksId($id) {
    $sql = 'SELECT DISTINCT ro.id, ro.name_rooms, ro.wing, ro.floor, ro.numbers_ro, ro.collection, ro.picture_coll, rd.id_rooms, ra.id_rooms
            FROM mamzelle_projet05_datas.rooms ro
            LEFT JOIN mamzelle_projet05_datas.rooms_days AS rd ON rd.id_rooms = ro.id
            LEFT JOIN mamzelle_projet05_datas.rooms_artworks AS ra ON ra.id_rooms = ro.id
            WHERE ro.id = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function roomsClosedOnIdDay($id) {
    $sql = 'SELECT ro.id, ro.name_rooms, ro.wing, ro.floor, ro.numbers_ro, ro.collection, ro.picture_coll, rd.close_moment
            FROM mamzelle_projet05_datas.rooms ro
            INNER JOIN mamzelle_projet05_datas.rooms_days AS rd
                      ON rd.id_rooms = ro.id
                      AND rd.id_day = ?
            ORDER BY rd.close_moment ASC, ro.id ASC';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function artworksLinkRoomsAll() {
    $sql = 'SELECT ar.id, ar.name_artwork, ar.author, ar.picture_aw, ar.room, ro.name_rooms, ro.wing, ro.floor, ro.numbers_ro, ro.collection, ro.picture_coll
            FROM mamzelle_projet05_datas.artworks ar
            INNER JOIN mamzelle_projet05_datas.rooms_artworks AS ra
            				ON ra.id_artwork = ar.id
            INNER JOIN mamzelle_projet05_datas.rooms AS ro
            				ON ro.id = ra.id_rooms
            ORDER BY ar.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function artworksLinkRoomsLessDay($idDay, $moment) {
    $sql = 'SELECT ar.id, ar.name_artwork, ar.author, ar.picture_aw, ar.room, ro.name_rooms, ro.wing, ro.floor, ro.numbers_ro, ro.collection, ro.picture_coll
            FROM mamzelle_projet05_datas.artworks ar
            INNER JOIN mamzelle_projet05_datas.rooms_artworks AS ra
            				ON ra.id_artwork = ar.id
            INNER JOIN mamzelle_projet05_datas.rooms AS ro
            				ON ro.id = ra.id_rooms
            LEFT JOIN mamzelle_projet05_datas.rooms_days AS rd
            				ON rd.id_rooms = ro.id
            				AND rd.id_day = ?
            WHERE rd.close_moment = ?
            OR rd.id_rooms IS NULL
            ORDER BY ar.id ASC';
    $req = $this->execRequest($sql, array(1 => $idDay, 2 => $moment));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function artworksLinkRooms() {
    $sql = 'SELECT DISTINCT ar.id, ar.name_artwork, ar.author, ar.picture_aw, ar.room, ra.id_rooms
            FROM mamzelle_projet05_datas.artworks ar
            LEFT JOIN mamzelle_projet05_datas.rooms_artworks AS ra ON ra.id_artwork = ar.id
            ORDER BY ar.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function artworksLinkRoomsId($id) {
    $sql = 'SELECT DISTINCT ar.id, ar.name_artwork, ar.author, ar.picture_aw, ar.room, ra.id_rooms
            FROM mamzelle_projet05_datas.artworks ar
            LEFT JOIN mamzelle_projet05_datas.rooms_artworks AS ra ON ra.id_artwork = ar.id
            WHERE ra.id_rooms = ?
            ORDER BY ar.id ASC';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function toursLinkArtworksAll() {
    $sql = 'SELECT DISTINCT tr.id, tr.name_tour, at.id_artwork, at.step, at.map_st
            FROM mamzelle_projet05_datas.tours tr
            LEFT JOIN mamzelle_projet05_datas.artworks_tours AS at ON at.id_tour = tr.id
            ORDER BY tr.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function toursAll () {
    $sql = 'SELECT id, name_tour, picture_to
            FROM mamzelle_projet05_datas.tours
            ORDER BY id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function artworksAndRoomsLinkTourId($id) {
    $sql = 'SELECT ato.id_tour, ato.step, ato.map_st, ato.id_artwork, aw.name_artwork, aw.author, aw.picture_aw, aw.room, ro.wing, ro.floor, ro.collection, ro.picture_coll
            FROM mamzelle_projet05_datas.artworks_tours ato
            INNER JOIN mamzelle_projet05_datas.artworks AS aw ON aw.id = ato.id_artwork
            INNER JOIN mamzelle_projet05_datas.rooms_artworks AS ra ON ra.id_artwork = aw.id
            INNER JOIN mamzelle_projet05_datas.rooms AS ro ON ro.id = ra.id_rooms
            WHERE ato.id_tour = ?
            ORDER BY ato.step ASC';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function toursLinkPublicAll() {
    $sql = 'SELECT tr.id, tr.name_tour, tr.picture_to, tr.timing, tr.map_to, pu.name_public, pu.picture_pu, pu.age
            FROM mamzelle_projet05_datas.tours tr
            INNER JOIN mamzelle_projet05_datas.public_tours AS pt ON pt.id_tour = tr.id
            INNER JOIN mamzelle_projet05_datas.public AS pu ON pu.id = pt.id_public
            ORDER BY tr.id ASC';
    $req = $this->execRequest($sql);
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function tourLinkPublicId($id) {
    $sql = 'SELECT tr.id, tr.name_tour, tr.picture_to, tr.timing, tr.map_to, pu.name_public, pu.picture_pu, pu.age
            FROM mamzelle_projet05_datas.tours tr
            INNER JOIN mamzelle_projet05_datas.public_tours AS pt ON pt.id_tour = tr.id
            INNER JOIN mamzelle_projet05_datas.public AS pu ON pu.id = pt.id_public
            WHERE tr.id = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function toursWorkableOnDayLinkPublic($idDay, $moment) {
    $sql = 'SELECT tr.id, tr.name_tour, tr.picture_to, tr.timing, tr.map_to, pu.name_public, pu.picture_pu, pu.age
            FROM mamzelle_projet05_datas.tours tr
            INNER JOIN mamzelle_projet05_datas.public_tours AS pt ON pt.id_tour = tr.id
            INNER JOIN mamzelle_projet05_datas.public AS pu ON pu.id = pt.id_public
            WHERE tr.id NOT IN (SELECT ta.id_tour
                                FROM mamzelle_projet05_datas.artworks_tours ta
          	                    INNER JOIN mamzelle_projet05_datas.rooms_artworks AS ra ON ra.id_artwork = ta.id_artwork
                                INNER JOIN mamzelle_projet05_datas.rooms AS ro ON ro.id = ra.id_rooms
                                INNER JOIN mamzelle_projet05_datas.rooms_days AS rd
                                          ON rd.id_rooms = ra.id_rooms
                                          AND rd.id_day = ?
                                          AND NOT rd.close_moment = ?)
            ORDER BY tr.id ASC';
    $req = $this->execRequest($sql, array(1 => $idDay, 2 => $moment));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function tourLinkArtworksAndRoomsId($id) {
    $sql = 'SELECT tr.id, tr.name_tour, tr.picture_to, ato.step, ato.map_st, ato.id_artwork, aw.name_artwork, aw.author, aw.picture_aw, aw.room, ro.wing, ro.floor, ro.collection, ro.picture_coll
            FROM mamzelle_projet05_datas.tours tr
            INNER JOIN mamzelle_projet05_datas.artworks_tours AS ato ON ato.id_tour = tr.id
            INNER JOIN mamzelle_projet05_datas.artworks AS aw ON aw.id = ato.id_artwork
            INNER JOIN mamzelle_projet05_datas.rooms_artworks AS ra ON ra.id_artwork = aw.id
            INNER JOIN mamzelle_projet05_datas.rooms AS ro ON ro.id = ra.id_rooms
            WHERE tr.id = ?
            ORDER BY ato.step ASC';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function updateTitle($name, $color, $id) {
    $sql = 'UPDATE mamzelle_projet05_datas.titles ti
            SET ti.name_title = ?, ti.color = ?
            WHERE ti.id = ?';
    $req = $this->execRequest($sql, array(1 => $name, 2 => $color, 3 => $id));
  }

  public function updateEntrances($entrance, $former, $id){
    $sql = 'UPDATE mamzelle_projet05_datas.title_entrance te
            SET te.id_entrance = ?
            WHERE te.id_entrance = ?
            AND te.id_title = ?';
    $req = $this->execRequest($sql, array(1 => $entrance, 2 => $former, 3 => $id));
  }

  public function deleteTitles($id) {
    $sql = 'DELETE FROM mamzelle_projet05_datas.titles
            WHERE id = ?';
    $req = $this->execRequest($sql, array(1 => $id));
  }

  public function addTitlesLinkEntrances($name, $color, array $entrances) {
    $sqlTi = 'INSERT INTO mamzelle_projet05_datas.titles(name_title, color) VALUES (?, ?)';
    $reqTi = $this->execRequest($sqlTi, array(1 => $name, 2 => $color));
    $idTi = $this->lastId($sqlTi);
    $reqTi->closeCursor();
    foreach ($entrances as $en) {
      $sqlEn = 'INSERT INTO mamzelle_projet05_datas.title_entrance(id_title, id_entrance)
                SELECT ti.id, (SELECT en.id
                					     FROM mamzelle_projet05_datas.entrances en
										           WHERE en.id = ?)
                FROM mamzelle_projet05_datas.titles ti
                WHERE ti.id = ?';
      $reqEn = $this->execRequest($sqlEn, array(1 => $en, 2 => $idTi));
    }
  }
}
