<?php
namespace projet5\model\user_manager;
use \projet5\model\Manager;
use PDO;

class Member_manager extends Manager {

  public function addMember ($last, $first, $email, $pseudo, $pw) {
    $sql = 'INSERT INTO mamzelle_projet05_members.members (lastname, firstname, email, pseudo, password, last_conn, regen_code, code) VALUES (?, ?, ?, ?, ?, NOW(), DEFAULT, DEFAULT)';
    $this->execRequest($sql, array(1 => $last, 2 => $first, 3 => $email, 4 => $pseudo, 5 => $pw));
  }

  public function checkEmail ($email) {
    $sql = 'SELECT email
            FROM mamzelle_projet05_members.members
            WHERE email = ?';
    $req = $this->execRequest($sql, array(1 => $email));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function checkPseudo ($pseudo) {
    $sql = 'SELECT pseudo
            FROM mamzelle_projet05_members.members
            WHERE pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function checkPw ($pw) {
    $sql = 'SELECT password
            FROM mamzelle_projet05_members.members
            WHERE password = ?';
    $req = $this->execRequest($sql, array(1 => $pw));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function updateLastConn ($pseudo) {
    $sql = 'UPDATE mamzelle_projet05_members.members
            SET last_conn = NOW()
            WHERE pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
  }

  public function getMember($pseudo) {
    $sql = 'SELECT lastname, firstname, email, pseudo
            FROM mamzelle_projet05_members.members
            WHERE pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function updateInfo ($last, $first, $email, $pseudo) {
    $sql = 'UPDATE mamzelle_projet05_members.members
            SET lastname = ?, firstname = ?, email = ?
            WHERE pseudo = ?';
    $this->execRequest($sql, array(1 => $last, 2 => $first, 3 => $email, 4 => $pseudo));
  }

  public function getPw ($pseudo) {
    $sql = 'SELECT password
            FROM mamzelle_projet05_members.members
            WHERE pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function getPwRegenCode ($pseudo) {
    $sql = 'SELECT password, regen_code, code
            FROM mamzelle_projet05_members.members
            WHERE pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function getPseudo ($email) {
    $sql = 'SELECT pseudo
            FROM mamzelle_projet05_members.members
            WHERE email = ?';
    $req = $this->execRequest($sql, array(1 => $email));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function getRegenCode ($pseudo) {
    $sql = 'SELECT regen_code
            FROM mamzelle_projet05_members.members
            WHERE pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }


  public function updateCode ($code, $email) {
    $sql = 'UPDATE mamzelle_projet05_members.members
            SET regen_code = ?
            WHERE email = ?';
    $this->execRequest($sql, array(1 => $code, 2 => $email));
  }

  public function updatePw ($pw, $pseudo) {
    $sql = 'UPDATE mamzelle_projet05_members.members
            SET password = ?, regen_code = DEFAULT
            WHERE pseudo = ?';
    $this->execRequest($sql, array(1 => $pw, 2 => $pseudo));
  }

  public function forgetPw ($pw, $email) {
    $sql = 'UPDATE mamzelle_projet05_members.members
            SET password = ?, regen_code = 1
            WHERE email = ?';
    $this->execRequest($sql, array(1 => $pw, 2 => $email));
  }

  public function delMember ($pseudo) {
    $sql = 'DELETE
            FROM mamzelle_projet05_members.members
            WHERE pseudo = ?';
    $this->execRequest($sql, array(1 => $pseudo));
  }

  public function checkId ($pseudo) {
    $sql = 'SELECT ms.id_member
            FROM mamzelle_projet05_members.member_savings ms
            INNER JOIN members AS me ON me.id = ms.id_member
            WHERE me.pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  private function getId($pseudo) {
    $sql = 'SELECT id
            FROM mamzelle_projet05_members.members
            WHERE pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function addTitle ($pseudo, $title) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'INSERT INTO mamzelle_projet05_members.member_savings(id_member, id_title) VALUES(?, ?)';
    $this->execRequest($sql, array(1 => $id, 2=> $title));
    return true;
  }

  public function addDay($pseudo, $day){
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'INSERT INTO mamzelle_projet05_members.member_savings(id_member, id_day) VALUES(?, ?)';
    $this->execRequest($sql, array(1 => $id, 2=> $day));
  }

  public function addTour ($pseudo, $tour) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'INSERT INTO mamzelle_projet05_members.member_savings(id_member, id_tour) VALUES(?, ?)';
    $this->execRequest($sql, array(1 => $id, 2=> $tour));
  }

  public function updateTitle($pseudo, $title) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'UPDATE mamzelle_projet05_members.member_savings
            SET id_title = ?
            WHERE id_member = ?';
    $this->execRequest($sql, array(1 => $title, 2 => $id));
  }

  public function updateDay($pseudo, $day) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'UPDATE mamzelle_projet05_members.member_savings
            SET id_day = ?
            WHERE id_member = ?';
    $this->execRequest($sql, array(1 => $day, 2 => $id));
  }

  public function updateTour($pseudo, $tour) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'UPDATE mamzelle_projet05_members.member_savings
            SET id_tour = ?
            WHERE id_member = ?';
    $this->execRequest($sql, array(1 => $tour, 2 => $id));
  }

  public function getTitle($pseudo) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'SELECT ms.id_title, ti.name_title
            FROM mamzelle_projet05_members.member_savings ms, mamzelle_projet05_datas.titles ti
            WHERE ms.id_title = ti.id
            AND id_member = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function getDay($pseudo) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'SELECT ms.id_day, da.name_day
            FROM mamzelle_projet05_members.member_savings ms
            INNER JOIN mamzelle_projet05_datas.days as da ON da.id = ms.id_day 
            WHERE id_member = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function getTour($pseudo) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'SELECT ms.id_tour, tr.name_tour
            FROM mamzelle_projet05_members.member_savings ms, mamzelle_projet05_datas.tours tr
            WHERE ms.id_tour = tr.id
            AND id_member = ?';
    $req = $this->execRequest($sql, array(1 => $id));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function delTitle ($pseudo) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'UPDATE mamzelle_projet05_members.member_savings
            SET id_title = DEFAULT
            WHERE id_member = ?';
    $this->execRequest($sql, array(1 => $id));
  }

  public function delDay ($pseudo) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'UPDATE mamzelle_projet05_members.member_savings
            SET id_day = DEFAULT
            WHERE id_member = ?';
    $this->execRequest($sql, array(1 => $id));
  }

  public function delTour ($pseudo) {
    $array = $this->getId($pseudo);
    $id = $array['id'];
    $sql = 'UPDATE mamzelle_projet05_members.member_savings
            SET id_tour = DEFAULT
            WHERE id_member = ?';
    $this->execRequest($sql, array(1 => $id));
  }
}
