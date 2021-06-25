<?php
namespace projet5\lib;

class Email_sender {

  protected static $_from = 'destination.louvre@mamzellea.fr';
  protected static $_reply = 'destination.louvre@mamzellea.fr';
  protected static $_name = 'Destination Louvre';

  public static function lostPw ($to, $pseudo, $code) {
    $headers = 'From: '. SELF::$_name. ' <'.SELF::$_from.'>'."\n";
    $headers .= 'MIME-Version: 1.0'."\n";
    $headers .= "X-Priority : 3\n";
    $headers .= "Content-type: text/html; charset=utf-8\n";
    $headers .= "Content-Transfer-Encoding: 8bit\n";
    $subject = 'Réinitialisation de votre mot de passe';
    $subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
    $message  = '<body>
      <div style="text-align:center; background-color:black">
      <h1 style="color:white; padding-top:10px">DESTINATION : LOUVRE</h1>
      <h2 style="color:white; padding-bottom:10px">Se préparer pour mieux profiter.</h2>
      </div>
      <div style="text-align: justify; font-size: 16px">
      <p>Bonjour ' .$pseudo. ',</p>
      <p>Vous avez demandé à réinitialiser votre mot de passe. Vous trouverez ci-dessous un code vous permettant de générer un nouveau mot de passe.</p>
      <p>Code : <b>' .$code.'</b>.</p>
      <p>Cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe avant de vous connecter à votre espace :</p>
      <a href="https://projet5.mamzellea.fr/regenerate.html" target="blank"><b>REGENERER MON MOT DE PASSE</b></a>
      <p>A bientôt,</p>
      <p>L\'équipe de <b>DESTINATION LOUVRE</b></p>
      </div>
      <p style="font-size:12px; margin-top:12px">Ceci est un mail automatique, merci de ne pas y répondre.</p>
      </body>';
      mail($to, $subject, $message, $headers);
      return true;
  }
}
