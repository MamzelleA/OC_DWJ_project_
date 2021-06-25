//DEFINITIONS DES FONCTIONS UTILISEES DANS api.js
//faire apparaitre le bon bloc de résultats et cachés les autres
function dNoneRemover (hide1, hide2, hide3, hide4, show1){
  if($(hide1).not(".d-none")){$(hide1).addClass("d-none");}
  if($(hide2).not(".d-none")){$(hide2).addClass("d-none");}
  if($(hide3).not(".d-none")){$(hide3).addClass("d-none");}
  if($(hide4).not(".d-none")){$(hide4).addClass("d-none");}
  if($(show1).hasClass("d-none")){$(show1).removeClass("d-none");}
}
//ajouter les horaires du musée (sauf pour le mardi = fermeture)
function addHours (day, open, cashier, access, rooms, museum, pyramid){
  $("#hours-table-body > tr").last().append('<td scope="col">' + day + '</td>');
  $("#hours-table-body > tr").last().append('<td scope="col">' + open + '</td>');
  $("#hours-table-body > tr").last().append('<td scope="col">' + cashier + '</td>');
  $("#hours-table-body > tr").last().append('<td scope="col">' + access + '</td>');
  $("#hours-table-body > tr").last().append('<td scope="col">' + rooms + '</td>');
  $("#hours-table-body > tr").last().append('<td scope="col">' + museum + '</td>');
  $("#hours-table-body > tr").last().append('<td scope="col">' + pyramid + '</td>');
}
//ajouter plans de fermeture des salles
function addMapClose (mapId, img, legendId, legend){
  $(mapId).append(img);
  $(legendId).append(legend);
}
//ajouter les oeuvres
function addArtworks (number, picture, collection, artwork, author, room, floor, wing) {
  $("#tbody-aw").append('<tr></tr>');
  $("#tbody-aw > tr").last().append('<td scope="col"><div class="text-white bg-danger font-weight-bold m-3 m-sm-1 px-1 border rounded-circle d-inline-flex justify-content-center">' + number + '</div></td>');
  $("#tbody-aw > tr").last().append('<td scope="col"><img class="img-fluid" src="public/images/artworks/' + picture + '.jpg" alt="aperçu ' + artwork + '"></td>');
  if(author == "none"){
    $("#tbody-aw > tr").last().append('<td class="text-left" scope="col"><img class="icon8-xsmall" src="public/images/dpt/' + collection + '_dpt.jpg" alt="département ' + collection + '"> ' + artwork + '</td>');
  } else {
    $("#tbody-aw > tr").last().append('<td class="text-left" scope="col"><img class="icon8-xsmall" src="public/images/dpt/' + collection + '_dpt.jpg" alt="département ' + collection + '"> ' + artwork + '<br><span class="font-italic">' + author + '</span></td>');
  }
  $("#tbody-aw > tr").last().append('<td scope="col">' + room + '</td>');
  $("#tbody-aw > tr").last().append('<td scope="col">' + floor + '</td>');
  $("#tbody-aw > tr").last().append('<td scope="col">' + wing + '</td>');
}
//ajouter les parcours
function addTourSelection(id, tour, selection){
  if($("#tour-selection-form").hasClass("d-none")){$("#tour-selection-form").removeClass("d-none");}
  $("#tour-selection").append('<option value="' + id + '|' + tour + '">' + tour + '</option>');
}
function addTours (tour_pict, id, tour, public_pict, audience, age, timing) {
  if($("#tours-result-body").hasClass("d-none")){$("#tours-result-body").removeClass("d-none");}
  $("#tbody-tours").append('<tr></tr>');
  $("#tbody-tours > tr").last().append('<td class="align-middle text-right" scope="col"><img class="icon8-size" src="public/images/icon8/' + tour_pict + '.png" alt="parcours ' + tour + '"></td>');
  $("#tbody-tours > tr").last().append('<td class="text-left align-middle" scope="col">' + id + '. ' + tour + '</td>');
  $("#tbody-tours > tr").last().append('<td class="align-middle text-right" scope="col"><img class="icon8-size" src="public/images/icon8/' + public_pict + '.png" alt="aperçu ' + audience + '"></td>');
  $("#tbody-tours > tr").last().append('<td class="text-left align-middle" scope="col">' + audience + '<br>(' + age + ')</td>');
  $("#tbody-tours > tr").last().append('<td class="text-center align-middle" scope="col">' + timing + '</td>');
}
//voir info d'un parcours
function infoTour (public_pict, audience, tour_pict, tour, age, timing, step) {
  $("#tour-picture").empty();
  $("#tour-title > h4").text(audience);
  $("#tour-title > h3").text('parcours ' + tour);
  $("#tour-picture").append('<img class="icon8-size mr-1" src="public/images/icon8/' + public_pict + '.png" alt="' + audience + '"/>');
  $("#tour-picture").append('<img class="icon8-size mr-1" src="public/images/icon8/' + tour_pict + '.png" alt="' + tour + '"/>');
  $("#tour-age").text(age);
  $("#tour-timing").text(timing);
  $("#tour-step").text(step);
}
//voir détail d'un Parcours
function detailTour (author, idDiv, step, picture, name, pictColl, collection, wing, floor, room) {
  if(author == "none"){
    $(idDiv).append('<div class="row align-items-center border-bottom ml-sm-1"><div class="col-sm-1"><p class="d-inline-flex justify-content-center font-weight-bold m-3 m-sm-1 px-1 border rounded-circle border-dark text-center">' + step +
    '</p></div><div class="col-sm-3 my-sm-1"><img class="img-fluid" src="public/images/artworks/' + picture + '.jpg" alt="aperçu ' + name +
    '"></div><div class="col-sm text-center text-sm-left mx-sm-3" id="detail-step"><p class="pt-3 mb-0"><img class="icon8-xsmall mr-1" src="public/images/dpt/' + pictColl +
    '_dpt.jpg" alt="département ' + collection + '"><span class="font-weight-bold">' + name + '</span></p><p class="font-italic ml-3"> aile ' + wing +
    ' - niveau ' + floor + ' - salle ' + room + '</p></div></div>');
  } else {
    $(idDiv).append('<div class="row align-items-center border-bottom ml-sm-1"><div class="col-sm-1"><p class="d-inline-flex justify-content-center font-weight-bold m-3 m-sm-1 px-1 border rounded-circle border-dark text-center">' + step +
    '</p></div><div class="col-sm-3 my-sm-1"><img class="img-fluid" src="public/images/artworks/' + picture + '.jpg" alt="aperçu ' + name +
    '"></div><div class="col-sm text-center text-sm-left mx-sm-3" id="detail-step"><p class="pt-3 mb-0"><img class="icon8-xsmall mr-1" src="public/images/dpt/' + pictColl +
    '_dpt.jpg" alt="département ' + collection + '"><span class="font-weight-bold">' + name + '</span> - ' + author + '</p><p class="font-italic ml-3"> aile ' + wing +
    ' - niveau ' + floor + ' - salle ' + room + '</p></div></div>');
  }
}

function apiRequest(datas) {
  return datas;
}

function displayTitles(selector) {
  var split = $(selector).val().split("|");
  var selection = split[0];
  if(selection == "tous"){
    var api = $.get(
      "https://projet5.mamzellea.fr/index.php?name=api",
      {query: "titles"},
      apiRequest,
      "json"
    );
    api.done(function(titles){
      if($(".entrances-result-title").text()){$(".entrance-result-title").empty();}
      $(".entrances-result-title").text("quelles entrées pour quel titre ?");
      if($("#entrance-result-body").hasClass("d-none")){$("#entrance-result-body").removeClass("d-none");}
      if($("#all-titles").hasClass("d-none")){$("#all-titles").removeClass("d-none");}
      if($("#title-selected").not(".d-none")){$("#title-selected").addClass("d-none");}
    });
  } else {
    api = $.get(
      "https://projet5.mamzellea.fr/index.php?name=api",
      {query: "titles", title: + selection},
      apiRequest,
      "json"
    );
    api.done(function(titles){
      if($(".entrances-result-title").text()){$(".entrance-result-title").empty();}
      if($(".entrance-result-body").hasClass("d-none")){$(".entrance-result-body").removeClass("d-none");}
      if($("#all-titles").not(".d-none")){$("#all-titles").addClass("d-none");}
      if($("#title-selected").hasClass("d-none")){$("#title-selected").removeClass("d-none");}
      $("#title-selected").empty();
      $(".entrances-result-title").text("cas sélectionné : " + titles.name_title);
      $(".entrances-result-title").append('<p>Vous devez prendre la file <span class="' + titles.color + '">' + titles.color + ".</span></p>");
      var entrances = titles.entrances;
      entrances.forEach(function(en){
        if(en.location == "passage richelieu"){var location = "passage";}
        else {location = en.location;}
        $("#title-selected").append('<div class="col-lg" id="' + location + '-div"><h4 class="text-uppercase">' + en.location +
        '</h4><img class="img-fluid border p-1" id="' + titles.color + '_' + location + '" src="public/images/entrance/' + titles.color + '_' + location + '.jpg" alt="file ' + en.location + ' ' + titles.title + '"></div>');
      }); //fin entrances foreach
    });
  }
  api.fail(function(){
    return (alert("LE CHARGEMENT DES DONNEES DES TITRES D'ACCES A ECHOUE."));
  });// fin displayTitles
}
function displayHours(selector){
  var split = $(selector).val().split("|");
  var selection = split[0];
  var appendMardi = '<td colspan="6" class="text-uppercase text-center font-weight-bold">jour de fermeture</td>';
  if(selection == "tous"){
    var api = $.get(
      "https://projet5.mamzellea.fr/index.php?name=api",
      {query: "hours"},
      apiRequest,
      "json"
    );
    api.done(function(hours){
      hours.forEach(function(ho){
        $(".hours-result-title").text('tous les horaires.');
        $("#hours-table-body").append('<tr></tr>');
        if(ho.name_day == "mardi"){
          $("#hours-table-body > tr").last().append('<td scope="col">' + ho.name_day + '</td>');
          $("#hours-table-body > tr").last().append(appendMardi);
        } else {
          addHours (ho.name_day, ho.open, ho.close_cashier, ho.close_access, ho.close_rooms, ho.close_museum, ho.close_pyramid);
        }
      });
    });
  } else {
    var api = $.get(
      "https://projet5.mamzellea.fr/index.php?name=api",
      {query: "hours", day: + selection},
      apiRequest,
      "json"
    );
    api.done(function(hours){
      $(".hours-result-title").text('horaires du ' + hours.name_day + '.');
      $("#hours-table-body").append('<tr></tr>');
      if (selection == "mardi") {
        $("#hours-table-body > tr").append('<td scope="col">' + selection + '</td>');
        $("#hours-table-body > tr").append(appendMardi);
      } else {
        addHours (hours.name_day, hours.open, hours.close_cashier, hours.close_access, hours.close_rooms, hours.close_museum, hours.close_pyramid);
      }
    });
  }
  api.fail(function(){
    return (alert("LE CHARGEMENT DES DONNEES DES HORAIRES A ECHOUE."));
  });
} //fin displayHours
function displayRooms(selector) {
  var split = $(selector).val().split("|");
  var selection = split[0];
  var hoursApi = $.get(
    "https://projet5.mamzellea.fr/index.php?name=api",
    {query: "hours", day: + selection},
    apiRequest,
    "json"
  );
  hoursApi.done(function(hours){
    if(selection == "tous" || selection == "2" || selection == "6" || selection == "7") {
      if($("#rooms-result-body").not(".d-none")){$("#rooms-result-body").addClass("d-none");}
      if($(".h4-hours")){$(".h4-hours").remove();}
      if(selection == "tous"){
        $(".rooms-result-title").text('cette option n\'est pas disponible.');
      } else if(selection == "2"){
        var day = hours.name_day;
        $(".rooms-result-title").text('le musée est fermé le ' + hours.name_day + '.');
      } else if(selection == "6" || selection == "7"){
        $(".rooms-result-title").text('il n\'y a pas de salles prévues fermées le ' + hours.name_day + '.');
      }
    } else {
      if($(".close-img")){$(".close-img").remove();}
      if($(".legend-map").text()){$(".legend-map").empty();}
      $(".rooms-result-title").text('salles fermées le ' + hours.name_day);
      if(hours.id == selection) {
        if(hours.evening_open == "0"){$("#h4-hours-noc").removeClass("d-none");}
        else{$("#h4-hours-noc").addClass("d-none");}
        $("#h4-hours-day").text('de ' + hours.open + ' à ' + hours.close_museum + '.');
      }
      var roomsApi = $.get(
        "https://projet5.mamzellea.fr/index.php?name=api",
        {query: "rooms", close: + selection},
        apiRequest,
        "json"
      );
      roomsApi.done(function(rooms){
        rooms.forEach(function(ro){
          var concatLegend = '<p class="text-left mb-0"><img class="icon8-small pr-1" src="public/images/dpt/'
          + ro.picture_coll + '_dpt.jpg" alt="département"><span class="wght-bold text-uppercase">' + ro.collection + '</span> - <span class="text-uppercase">' + ro.wing + '</span> - Salles : '
          + ro.numbers_ro + '</p>';
          if(ro.floor == -2){var floor = -1;}
          else {floor = ro.floor;}
          if(ro.close_moment == "alltime" || ro.close_moment == "daytime"){
            var concatImgDay = '<div class="close-img w-100" id="close-img-' + floor + '"><img class="img-fluid p-1" id="' + ro.name_rooms + '-img" src="public/images/rooms_png/' + ro.name_rooms + '_f.png" alt="salle ' + ro.name_rooms + ' fermée"></div>';
            if(ro.floor == "-1" || ro.floor == "-2"){addMapClose ("#map-es", concatImgDay, "#legend-es", concatLegend);}
            if(ro.floor == "0"){addMapClose ("#map-rc", concatImgDay, "#legend-rc", concatLegend);}
            else if(ro.floor == "1"){addMapClose ("#map-1st", concatImgDay, "#legend-1st", concatLegend);}
            else if(ro.floor == "2"){addMapClose ("#map-2nd", concatImgDay, "#legend-2nd", concatLegend);}
          } else if (ro.close_moment == "noctime") {
            var concatImgNoc = '<div class="close-img w-100" id="close-img-' + floor + '"><img class="img-fluid p-1" id="' + ro.name_rooms + '-img" src="public/images/rooms_png/' + ro.name_rooms + '_n.png" alt="salle ' + ro.name_rooms + ' fermée"></div>';
            if(ro.floor == "-1" || ro.floor == "-2"){addMapClose ("#map-es", concatImgNoc, "#legend-es", concatLegend);}
            else if(ro.floor == "0"){addMapClose ("#map-rc", concatImgNoc, "#legend-rc", concatLegend);}
            else if(ro.floor == "1"){addMapClose ("#map-1st", concatImgNoc, "#legend-1st", concatLegend);}
            else if(ro.floor == "2"){addMapClose ("#map-2nd", concatImgNoc, "#legend-2nd", concatLegend);}
          }
        }); //fin rooms foreach
        if($("#rooms-result-body").hasClass("d-none")){$("#rooms-result-body").removeClass("d-none");}
      });
      roomsApi.fail(function(){
        return (alert("LE CHARGEMENT DES DONNEES DES SALLES FERMEES A ECHOUE."));
      });
    }
  });
  hoursApi.fail(function(){
    return (alert("LE CHARGEMENT DES DONNEES DES HORAIRES A ECHOUE."));
  });
} //fin displayHours
function displayArtworks(selector) {
  var split = $(selector).val().split("|");
  var selection = split[0];
  if(selection == "tous"){
    if($("#tbody-aw > tr")){$("#tbody-aw > tr").remove();}
    $(".artworks-result-title").text("toute la sélection d'oeuvres");
    var artworksApi = $.get(
      "https://projet5.mamzellea.fr/index.php?name=api",
      {query: "artworks"},
      apiRequest,
      "json"
    );
    artworksApi.done(function(artworks){
      artworks.forEach(function(aw){
        if($("#artworks-result-body").hasClass("d-none")){$("#artworks-result-body").removeClass("d-none");}
        if($(".map-aw-viewer").hasClass("d-none")){$(".map-aw-viewer").removeClass("d-none");}
        if($(".img-aw-map")){$(".img-aw-map").remove();}
        if($(".aw-map").not(".d-none")){$(".aw-map").addClass("d-none");}
        addArtworks( aw.id, aw.picture_aw, aw.picture_coll, aw.name_artwork, aw.author, aw.room, aw.floor, aw.wing);
      });
      $(".close-map-aw").after('<img class="img-fluid img-aw-map shadow bg-white rounded" src="public/images/preparation_zone/aw_map.jpg" alt="carte toutes les oeuvres">');
    });
    artworksApi.fail(function(){
      return (alert("LE CHARGEMENT DES DONNEES DES OEUVRES A ECHOUE."));
    });
  } else if(selection == 2) {
    $(".artworks-result-title").text("le musée est fermé le mardi.");
    if($("#artworks-result-body").not(".d-none")){$("#artworks-result-body").addClass("d-none");}
    if($(".map-aw-viewer").not(".d-none")){$(".map-aw-viewer").addClass("d-none");}
    if($(".img-aw-map")){$(".img-aw-map").remove();}
    if($(".aw-map").not(".d-none")){$(".aw-map").addClass("d-none");}
  } else {
    var hoursApi = $.get(
      "https://projet5.mamzellea.fr/index.php?name=api",
      {query: "hours", day: + selection},
      apiRequest,
      "json"
    );
    hoursApi.done(function(hours){
      $(".artworks-result-title").text("la sélection d'oeuvres visibles le " + hours.name_day);
      if(hours.evening_open == 0) {
        if($("#artworks-result-body").not(".d-none")){$("#artworks-result-body").addClass("d-none");}
        if($(".checkbox-artworks").hasClass("d-none")){$(".checkbox-artworks").removeClass("d-none");}
        if($(".check-artworks").prop("checked", true)){$(".check-artworks").prop("checked", false);}
        if($(".aw-map").not(".d-none")){$(".aw-map").addClass("d-none");}
        if($(".map-aw-viewer").not(".d-none")){$(".map-aw-viewer").addClass("d-none");}
        $("input[type=radio][name=input-radio-aw]").click(function(){
          if($("#tbody-aw > tr")){$("#tbody-aw > tr").remove();}
          if($(".aw-map").not(".d-none")){$(".aw-map").addClass("d-none");}
          if($(".img-aw-map")){$(".img-aw-map").remove();}
          if($(".map-aw-viewer").hasClass("d-none")){$(".map-aw-viewer").removeClass("d-none");}
          var value = this.value;
          if(value == "daytime"){
            var artworksApi = $.get(
              "https://projet5.mamzellea.fr/index.php?name=api",
              {query: "artworks", day: + selection, option: "daytime"},
              apiRequest,
              "json"
            );
            $(".close-map-aw").after('<img class="img-fluid img-aw-map shadow bg-white rounded" src="public/images/preparation_zone/aw_map_' + selection + '.jpg" alt="carte oeuvres visibles">');
          } else if(value == "noctime"){
            var artworksApi = $.get(
              "https://projet5.mamzellea.fr/index.php?name=api",
              {query: "artworks", day: + selection, option: "noctime"},
              apiRequest,
              "json"
            );
            $(".close-map-aw").after('<img class="img-fluid img-aw-map shadow bg-white rounded" src="public/images/preparation_zone/aw_map_' + selection + '_noc.jpg" alt="carte oeuvres visibles">');
          }
          artworksApi.done(function(artworks){
            artworks.forEach(function(aw){
              if($("#artworks-result-body").hasClass("d-none")){$("#artworks-result-body").removeClass("d-none");}
              addArtworks( aw.id, aw.picture_aw, aw.picture_coll, aw.name_artwork, aw.author, aw.room, aw.floor, aw.wing);
            });
          });
          artworksApi.fail(function(){
            return (alert("LE CHARGEMENT DES DONNEES DES OEUVRES POUR LA JOURNEE DU " + hours.name_day.toUpperCase() + " A ECHOUE."));
          });
        });
      } else {
        if($("#tbody-aw > tr")){$("#tbody-aw > tr").remove();}
        if($(".checkbox-artworks").not(".d-none")){$(".checkbox-artworks").addClass("d-none");}
        if($(".map-aw-viewer").hasClass("d-none")){$(".map-aw-viewer").removeClass("d-none");}
        if($(".img-aw-map")){$(".img-aw-map").remove();}
        if($(".aw-map").not(".d-none")){$(".aw-map").addClass("d-none");}
        var artworksApi = $.get(
          "https://projet5.mamzellea.fr/index.php?name=api",
          {query: "artworks", day: + selection},
          apiRequest,
          "json"
        );
        artworksApi.done(function(artworks){
          artworks.forEach(function(aw){
            if($("#artworks-result-body").hasClass("d-none")){$("#artworks-result-body").removeClass("d-none");}
            addArtworks( aw.id, aw.picture_aw, aw.picture_coll, aw.name_artwork, aw.author, aw.room, aw.floor, aw.wing);
          });
          $(".close-map-aw").after('<img class="img-fluid img-aw-map shadow bg-white rounded" src="public/images/preparation_zone/aw_map_' + selection + '.jpg" alt="carte oeuvres visibles">');
        });
        artworksApi.fail(function(){
          return (alert("LE CHARGEMENT DES DONNEES DES OEUVRES POUR LA JOURNEE DU " + hours.name_day.toUpperCase() + "  A ECHOUE."));
        });
      }
    });
    hoursApi.fail(function(){
      return (alert("LE CHARGEMENT DES DONNEES DES HORAIRES A ECHOUE."));
    });
  }
}

function displayTours (selector){
  var split = $(selector).val().split("|");
  var selection = split[0];
  if($(".tours-result-title").text()){$(".tours-result-title").empty();}
  if($("#tours-result-body").not(".d-none")){$("#tours-result-body").addClass("d-none");}
  if($("#tour-detail").not(".d-none")){$("#tour-detail").addClass("d-none");}
  if($("#tbody-tours > td")){$("#tbody-tours").empty();}
  if($("#tour-selection > option")){$("#tour-selection > option").remove();}
  $("input[type=radio][name=input-radio]").off("click");
  if(selection == "tous"){
    $(".tours-result-title").text("tous les parcours");
    if($(".checkbox-tours").not(".d-none")){$(".checkbox-tours").addClass("d-none");}
    if($("#p-select-day").not(".d-none")){$("#p-select-day").addClass("d-none");}
    if($("#save-tour").not(".d-none")){$("#save-tour").addClass("d-none");}
    if($("#p-select-tous").hasClass("d-none")){$("#p-select-tous").removeClass('d-none');}
    if($("#tour-selection-form").hasClass("d-none")){$("#tour-selection-form").removeClass("d-none");}
    if($("#p-saved-tour").hasClass("d-none")){$("#p-saved-tour").removeClass("d-none");}
    if($("#tours-table").hasClass("d-none")){$("#tours-table").removeClass("d-none");}
    var toursApi = $.get(
      "https://projet5.mamzellea.fr/index.php?name=api",
      {query: "tours"},
      apiRequest,
      "json"
    );
    toursApi.done(function(tours){
      tours.forEach(function(to){
        addTours (to.picture_to, to.id, to.name_tour, to.picture_pu, to.name_public, to.age, to.timing);
        addTourSelection(to.id, to.name_tour, selection);
      });
    });
    toursApi.fail(function(){
      return (alert("LE CHARGEMENT DES DONNEES DES PARCOURS A ECHOUE."));
    });
  } else {
    if(selection == 2){
      if($("#tours-table").not(".d-none")){$("#tours-table").addClass("d-none");}
      if($(".checkbox-tours").not(".d-none")){$(".checkbox-tours").addClass("d-none");}
      if($("#tour-selection-form").not(".d-none")){$("#tour-selection-form").addClass("d-none");}
      if($("#p-saved-tour").not(".d-none")){$("#p-saved-tour").addClass("d-none");}
      $(".tours-result-title").text("le musée est fermé le mardi.");
    } else {
      var hoursApi = $.get(
        "https://projet5.mamzellea.fr/index.php?name=api",
        {query: "hours", day: + selection},
        apiRequest,
        "json"
      );
      hoursApi.done(function(hours){
        $(".tours-result-title").text("parcours réalisables le " + hours.name_day);
        if(hours.evening_open == 0) {
          if($("#tours-result-body").not(".d-none")){$("#tours-result-body").addClass("d-none");}
          if($("#tour-selection-form").not("d-none")){$("#tour-selection-form").addClass("d-none");}
          if($(".checkbox-tours").hasClass("d-none")){$(".checkbox-tours").removeClass("d-none");}
          if($("#p-saved-tour").not(".d-none")){$("#p-saved-tour").addClass("d-none");}
          if($(".check-tours").prop("checked", true)){$(".check-tours").prop("checked", false);}
          $("input[type=radio][name=input-radio-tours]").click(function(){
            var value = this.value;
            if(value == "daytime"){
              var toursApi = $.get(
                "https://projet5.mamzellea.fr/index.php?name=api",
                {query: "tours", day: + selection, option: "daytime"},
                apiRequest,
                "json"
              );
            } else if(value == "noctime"){
              var toursApi = $.get(
                "https://projet5.mamzellea.fr/index.php?name=api",
                {query: "tours", day: + selection, option: "noctime"},
                apiRequest,
                "json"
              );
            }
            toursApi.done(function(tours){
              if($("#tbody-tours > tr")){$("#tbody-tours > tr").remove();}
              if($("#tours-table").hasClass("d-none")){$("#tours-table").removeClass("d-none");}
              if($("#tour-selection-form").hasClass("d-none")){$("#tour-selection-form").removeClass("d-none");}
              if($("#p-saved-tour").hasClass("d-none")){$("#p-saved-tour").removeClass("d-none");}
              if($("#p-select-tous").not(".d-none")){$("#p-select-tous").addClass("d-none");}
              if($("#p-select-day").hasClass("d-none")){$("#p-select-day").removeClass('d-none');}
              if($("#save-tour").hasClass("d-none")){$("#save-tour").removeClass("d-none");}
              tours.forEach(function(to){
                addTours (to.picture_to, to.id, to.name_tour, to.picture_pu, to.name_public, to.age, to.timing);
                addTourSelection(to.id, to.name_tour, selection);
              });
            });
            toursApi.fail(function(){
              return (alert("LE CHARGEMENT DES DONNEES DES PARCOURS A ECHOUE."));
            });
          });
        } else {
          var toursApi = $.get(
            "https://projet5.mamzellea.fr/index.php?name=api",
            {query: "tours", day: + selection},
            apiRequest,
            "json"
          );
          toursApi.done(function(tours){
            tours.forEach(function(to){
              if($(".checkbox-tours").not(".d-none")){$(".checkbox-tours").addClass("d-none");}
              if($("#tours-table").hasClass("d-none")){$("#tours-table").removeClass("d-none");}
              if($("#tour-selection-form").hasClass("d-none")){$("#tour-selection-form").removeClass("d-none");}
              if($("#p-select-tous").not(".d-none")){$("#p-select-tous").addClass("d-none");}
              if($("#p-select-day").hasClass("d-none")){$("#p-select-day").removeClass('d-none');}
              if($("#save-tour").hasClass("d-none")){$("#save-tour").removeClass("d-none");}
              if($("#p-saved-tour").hasClass("d-none")){$("#p-saved-tour").removeClass("d-none");}
              addTours (to.picture_to, to.id, to.name_tour, to.picture_pu, to.name_public, to.age, to.timing);
              addTourSelection(to.id, to.name_tour, selection);
            });
          });
          toursApi.fail(function(){
            return (alert("LE CHARGEMENT DES DONNEES DES PARCOURS A ECHOUE."));
          });
        }
      });
      hoursApi.fail(function(){
        return (alert("LE CHARGEMENT DES DONNEES DES HORAIRES A ECHOUE."));
      });
    }
  }
}

function displayDetails(selector){
  var split = $(selector).val().split("|");
  var selection = split[0];
  var tourApi = $.get(
    "https://projet5.mamzellea.fr/index.php?name=api",
    {query: "tours", tour: + selection},
    apiRequest,
    "json"
  );
  tourApi.done(function(tour){
    var detailsApi = $.get(
      "https://projet5.mamzellea.fr/index.php?name=api",
      {query: "details", tour: + selection},
      apiRequest,
      "json"
    );
    detailsApi.done(function(details){
      infoTour(tour.picture_pu, tour.name_public, tour.picture_to, tour.name_tour, tour.age, tour.timing, $(details.steps).length);
      $("#tour-map").append('<img class="img-fluid mr-1 img-map-tour" src="public/images/tours/' + tour.map_to + '_all.jpg" alt="plan parcours">');
      details.steps.forEach(function(st){
        detailTour(st.author, "#tour-steps", st.step, st.picture_aw, st.artwork, st.picture_coll, st.collection, st.wing, st.floor, st.room);
      });
    });
    detailsApi.fail(function(){
      return (alert("LE CHARGEMENT DU DETAIL DU PARCOURS A ECHOUE."));
    });
  });
  tourApi.fail(function(){
    return (alert("LE CHARGEMENT DES INFORMATIONS DU PARCOURS A ECHOUE."));
  });
}

//obtenir la page courant d'un parcours
function getCurrent (steps, step) {
  var array = new Array();
  steps.forEach(function(st){
    array.push(st.step);
  });
  var check = array.indexOf(step);
  var page = check + 1;
  return page;
}
//faire un parcours
function launchTour(selector){
  var selection = $(selector).text();
  var detailsApi = $.get(
    "https://projet5.mamzellea.fr/index.php?name=api",
    {query: "details", tour: + selection},
    apiRequest,
    "json"
  );
  detailsApi.done(function(details){
    $("#img-tour-launch").append('<img class="inline-block align-top icon8-size" src="public/images/icon8/' + details.picture_to + '.png" alt="icône ' + details.name_tour + '">');
    details.steps.forEach(function(st) {
      var current = getCurrent(details.steps, st.step);
      var path = "https://projet5.mamzellea.fr/tour.html/page-" + current;
      if(window.location.href == path){
        var pages = details.steps.length;
        var prev = Number(current) - 1;
        var next = Number(current) + 1;
        if(current == pages){
          var numLink = '<div class="page-link p-1 text-dark">' + current + ' / ' + pages + '</div>';
          $("#end-tour").removeClass("d-none");
        } else {
          numLink = '<a class="page-link p-1 text-dark" href="tour.html/page-' + next + '">' + current + ' / ' + pages + '</a>';
        }
        if(current > 1){
          var prevLink = '<a class="page-link p-1 text-dark" href="tour.html/page-' + prev + '" aria-label="précédente"><span aria-hidden="true">&laquo;</span></a>';
        }
        if(current < pages){
          var nextLink =  '<a class="page-link p-1 text-dark" href="tour.html/page-' + next + '" aria-label="suivante"><span aria-hidden="true">&raquo;</span></a>';
        }
        $("#prev-link").append(prevLink);
        $("#num-link").append(numLink);
        $("#next-link").append(nextLink);
        $("#step-details-h4").after('<p class="text-uppercase text-center text-lg-left" id="step-details-p"><img class="icon8-small mr-1" src="public/images/dpt/' + st.picture_coll + '_dpt.jpg" alt="couleur collection"> aile  ' + st.wing + ' | niveau ' + st.floor + ' | salle ' + st.room + '</p>');
        $("#step-details-name").text(st.artwork);
        if(st.author != "none"){
          $("#step-details-author").text(' par ' + st.author);
        }
        $("#step-map").before('<div class="col-lg text-center" id="step-img"><img class="img-fluid img-thumbnail" src="public/images/artworks/' + st.picture_aw + '.jpg" alt="oeuvre ' + st.name_artwork + '"></div>');
        $("#step-way-h4").after('<img class="img-fluid" src="public/images/tours/' + st.map +'.jpg" alt="plan étape ' + st.step + '">');
        $("#step-details-h3").text('étape : ' + st.step);

      }
    });
  });
  detailsApi.fail(function(){
    return (alert("LE CHARGEMENT DES DONNEES DU PARCOURS A ECHOUE."));
  });
}
