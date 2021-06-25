$(document).ready(function(){
  //TOUTES PAGES
  //navbar apparaît au scroll
    if($("#nav-user").length !== 0) {
      $(function(){
        var position_top_raccourci = $("#nav-user").offset().top;
        $(window).scroll(function () {
          if ($(this).scrollTop() > position_top_raccourci) {
            $("#nav-user").addClass("fix-navigation");
          } else {
            $("#nav-user").removeClass("fix-navigation");
          }
        });
      });
    }
  //changement menu sandwich quand click
  $(".navbar-toggler").click(function() {
    $("#menu-sandwich").toggle();
    $("#menu-close").toggle();
  });
  //faire disparaitre messages alert
  $(".fade-alert").fadeOut(6000);
  //PAGE PROFIL
  //afficher formulaire modifiant info personnelles
  $("#modify-info").click(function(){
    $("#div-modify-info").removeClass("d-none");
    if($("div-modify-pw").not(".d-none")){$("#div-modify-pw").addClass("d-none");}
    if($("div-del-account").not(".d-none")){$("#div-del-account").addClass("d-none");}
  });
  //afficher formulaire modifiant mot de passe
  $("#modify-pw").click(function(){
    $("#div-modify-pw").removeClass("d-none");
    if($("div-modify-info").not(".d-none")){$("#div-modify-info").addClass("d-none");}
    if($("div-del-account").not(".d-none")){$("#div-del-account").addClass("d-none");}
  });
  //afficher formulaire identification pour suppression compte
  $("#del-account").click(function(){
    $("#div-del-account").removeClass("d-none");
    if($("div-modify-info").not(".d-none")){$("#div-modify-info").addClass("d-none");}
    if($("div-modify-pw").not(".d-none")){$("#div-modify-pw").addClass("d-none");}
  });
  //confirmer la suppression du compte
  $("#valid-del-account").click(function(){
    return(confirm("ATTENTION ! Cette action entrainera la suppression du compte et de toutes les données qui lui sont associées."))
  });
  //PAGE PREPARATION
  //masquer les résultats quand clic sur collapse
  $(".btn-collapse").click(function(){
    if($(".datas-result").not(".d-none")){$(".datas-result").addClass("d-none");}
  });
  //alert si modification enregistrement d'un titre, jour ou parcours
  $("#save-title").click(function(){
    return(confirm("ATTENTION ! Un seul titre peut être enregistré, si vous en avez déjà enregistré un, il sera modifié par votre sélection actuelle."))
  });
  $("#save-day").click(function(){
    return(confirm("ATTENTION ! Un seul jour peut être enregistré, si vous en avez déjà enregistré un, il sera modifié par votre sélection actuelle."))
  });
  $("#save-tour").click(function(){
    return(confirm("ATTENTION ! Un seul parcours peut être enregistré, si vous en avez déjà enregistré un, il sera modifié par votre sélection actuelle."));
  });
  //afficher/masquer plan des OEUVRES
  $(".display-map").click(function(){
    $(".aw-map").removeClass("d-none");
    $(".map-aw-viewer").addClass("d-none");
  });
  $(".close-map-aw").click(function(){
    $(".map-aw-viewer").removeClass("d-none");
    $(".aw-map").addClass("d-none");
  });

  //afficher le détail d'un parcours - ADMIN
  $("#view-details").click(function(){
    $("#tours-details-body").removeClass("d-none");
    $("#tours-datas-body").addClass("d-none");
  });

  //confirmer suppression - Page TITLES - ADMIN
  $(".delete-title-input").click(function(){
    var idThis = $(this).attr("id");
    var idName = idThis.replace("delete-confirm-title-", "static-name-ti-")
    var value = $("#" + idName).val();
    return(confirm("ATTENTION ! Vous allez supprimer définitivement le titre d'accès : \"" + value + "\" et toutes ses données associées."));
  });

  //ajouter un champs au formulaire - Page TITLES - ADMIN
  $("#add-field-title").click(function(){
    var lastId = $("input[id^=\"input-id-entrance-\"]:last");
    var last = lastId.prop("id").replace("input-id-entrance-", "");
    var num = parseInt(last.match(/\d+/g), 10 ) + 1;
    var concat = '<div class="form-group align-items-center row" id="div-form-add-' + num +
    '"><div class="col-4 text-right align-items-center" id="label-entrance"><label class="mr-1" for="entrance-id-' + num +
    '">Id entrée :</label></div><div class="col-6 text-left"><input class="input-id-entrance" id="input-id-entrance-' + num +
    '" name="add-entrance-id-' + num + '"/></div><div class="col-2 text-left"><span class="ml-3 py-3 delete-field-title" id="delete-field-' + num +
    '"><img class="img-fluid icon8-small mr-1" src="public/images/icon8/delete_row.png" alt="icône supprimer" title="supprimer un champs"/></span></div></div>'
    $(".input-id-entrance").addClass("mb-1");
    $("#label-entrance").prop("class").replace("align-items-center", "align-items-start");
    $("#div-form-add-" + last).after(concat);
    $("#hidden-max").val(num);
    $("#delete-field-" + last).addClass("d-none");
    $("#delete-field-" + num).click(function(){
      $("#div-form-add-" + num).remove();
      num = num - 1;
      $("#hidden-max").val(num);
      $("#delete-field-" + last).removeClass("d-none");
    });
  });
});
