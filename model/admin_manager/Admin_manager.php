<?php
namespace projet5\model\admin_manager;
use \projet5\model\user_manager\Member_manager;
use \projet5\model\user_manager\Datas_manager;
use \projet5\model\Manager;
use PDO;

class Admin_manager extends Member_manager {

  public function getPwCode ($pseudo) {
    $sql = 'SELECT password, code
            FROM mamzelle_projet05_members.members
            WHERE pseudo = ?';
    $req = $this->execRequest($sql, array(1 => $pseudo));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function getMembers ($limit, $start) {
    $sql = 'SELECT id, lastname, firstname, pseudo, email, last_conn, code
            FROM mamzelle_projet05_members.members
            LIMIT ? OFFSET ?';
    $req = $this->execRequest($sql, array(1 => $limit, 2 => $start));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result;
  }

  public function countMembers (){
    $sql = 'SELECT count(id)
            FROM mamzelle_projet05_members.members';
    $req = $this->execRequest($sql);
    $result = $req->fetchColumn();
    $req->closeCursor();
    return $result;
  }
}
