$(document).ready(function(){
  //LES ENTREES
  //clic sur bouton ENTREES page Préparation)
  $("#title-select").click(function(){
    dNoneRemover("#hoursresult", "#rooms-result", "#artworks-result", "#tours-result", "#entrance-result");
    displayTitles("#title-selection");
  });//----------------------------------------fin clic #title-select
  //clic JE SAIS PAR OU J'ENTRE (page Visite)
  $("#btn-title").click(function(){
    displayTitles("#title-saved");
  });//---------------------------------------fin clic #btn-title
  //LES HORAIRES
  //clic sur bouton HORAIRES page Préparation
  $("#hours-select").click(function(){
    dNoneRemover("#entrance-result", "#rooms-result", "#artworks-result", "#tours-result", "#hours-result");
    if($("#hours-table-body > td")){$("#hours-table-body").empty();}
    if($("#hours-result-title").text()){$("#hours-result-title").empty();}
    displayHours("#day-selection");
  }); //---------------------------------------------fin clic #hours-select
  //clic sur JE ME SOUVIENS DES HORAIRES page Visite
  $("#btn-hour").click(function(){
    if($("#hours-table-body > td")){$("#hours-table-body").empty();}
    displayHours("#day-saved");
  }); //------------------------------------fin clic #btn-hours
  //LES SALLES
  //clic sur bouton SALLES page Préparation
  $("#rooms-select").click(function(){
    dNoneRemover("#entrance-result", "#hours-result", "#artworks-result", "#tours-result", "#rooms-result");
    displayRooms("#day-selection");
  }); //-----------------------------------------------------fin clic #rooms-select
  //clic sur bouton JE CONNAIS LES SALLES FERMEES page Visite
  $("#btn-room").click(function(){
    displayRooms("#day-saved");
  });
  //LES OEUVRES
  // clic sur bouton OEUVRES page Préparation
  $("#artworks-select").click(function(){
    dNoneRemover("#entrance-result", "#hours-result", "#rooms-result", "#tours-result", "#artworks-result");
    if($("#artworks-result-title").text()){$("#artworks-result-title").empty();}
    if($("#artworks-result-title > p")){$("#artworks-result-title > p").remove();}
    displayArtworks("#day-selection");
  });//----------------------------------------------------fin clic #artworks-select
  //clic sur bouton "JE VAIS VOIR DES OEUVRES" page Visite
  $("#btn-aw").click(function(){
    displayArtworks("#day-saved");
  }); //-------------------------------------------fin clic sur #btn-aw
  //LES PARCOURS
  //clic sur bouton PARCOURS page PREPARATION
  $("#tours-select").click(function(){
    dNoneRemover("#entrance-result", "#hours-result", "#rooms-result", "#artworks-result", "#tours-result");
    displayTours("#day-selection");
  }); //----------------------------------------------------fin clic #tours-select
  //clic DETAIL rubrique PARCOURS page PREPARATION (membre uniquement)
  $("#see-tour").click(function(){
    if($("#tour-detail").hasClass("d-none")){$("#tour-detail").removeClass("d-none");}
    if($("#step-div")){$("#tour-steps").empty();}
    if($(".img-map-tour")){$("#tour-map").empty();}
    displayDetails("#tour-selection option:selected");
  }); //---------------------------------------fin clic #see-tour
  //clic sur JE FAIS MON PARCOURS page Visite
  $("#btn-tour").click(function(){
    if($("#tour-detail").hasClass("d-none")){$("#tour-detail").removeClass("d-none");}
    if($("#step-saved-div")){$("#tour-steps").empty();}
    if($(".img-map-tour")){$("#tour-map").empty();}
    displayDetails("#tour-saved");
  }); //-------------------------------fin clic #btn-tour
  //faire le parcours page TOUR
  if($("#tour-title").text().match("[a-zA-Zàâéèîïôöûü']{1,15}")){
    launchTour("#tour-session");
  }
});
