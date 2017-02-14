var itemsSelection = 0;

function startApp() {
  var map = document.getElementById('lugares'),
      placesMap = "",
      inputComplet = '';

  for(var i = 0; i < places.length; i++) {
    var popup = '';
    if (userOptions.role === "admin" || userOptions.role === "vendor" || places[i].status === "sold") {
      popup = places[i].status === "reserved" ? '<div class="popup">' + places[i].client + '</div>' : '<div class="popup">Disponible</div>';
      popup = places[i].status === 'sold' ? '<div class="popup"><img src="http://electricon.com.mx/mapa/lib/proveedores/' + places[i].client + '.png" alt="' + places[i].client + '"></div>' : popup;
    } else {
      popup = places[i].status === "reserved" ? '<div class="popup">Reservado</div>' : '<div class="popup">Disponible</div>';
    }

    var content = '<li id="' +
                  places[i].id +
                  '"><button item="' + i +
                  '" class="transparent-button ' + places[i].status +
                  '">' + places[i].client +
                  '</button>' + popup + '</li>';
    placesMap += content;
  }
  map.innerHTML = placesMap;
  var items = document.getElementsByClassName('transparent-button'),
      change = document.getElementById("change");
  for(var i = 0; i < items.length; i++) {
    items[i].addEventListener("click", function () {
      //console.log(this);
      changeStatus(this, change);
    }, false);
  }

  if (userOptions.role != null){
    var inputComplet = document.getElementById('client');

    inputComplet.addEventListener('keyup', function (e){
      if (inputComplet.value.length > 0) {
        document.getElementById('reserved').disabled = false;
        document.getElementById('sold').disabled = false;
      } else {
        document.getElementById('reserved').disabled = true;
        document.getElementById('sold').disabled = true;
      }
    });
  }
}
function changeStatus(btn, change) {
  if(userOptions.role === "admin") {
    if (btn.classList.contains('sold')) {
      if (btn.classList.contains('select-item')){
        changeStatuPlaces(btn, change);
      } else {
        var conf = confirm("Vas a modificar un espacio vendido");
        if (conf == true) {
          changeStatuPlaces(btn, change);
        }
      }
    } else if (btn.classList.contains('reserved')) {
      if (btn.classList.contains('select-item')){
        changeStatuPlaces(btn, change);
      } else {
        var conf = confirm("Vas a modificar un espacio reservado");
        if (conf == true) {
          changeStatuPlaces(btn, change);
        }
      }
    } else {
      changeStatuPlaces(btn, change);
    }
  } else if(userOptions.role === "vendor") {
    if (btn.classList.contains('sold')) {
      alert("No puedes modificar este espacio");
    } else if (btn.classList.contains('reserved')) {
      if (btn.classList.contains('select-item')){
        changeStatuPlaces(btn, change);
      } else {
        var conf = confirm("Vas a modificar un espacio reservado");
        if (conf == true) {
          changeStatuPlaces(btn, change);
        }
      }
    } else {
      changeStatuPlaces(btn, change);
    }
  } else {
    if (btn.classList.contains('sold') || btn.classList.contains('reserved')) {
      alert("No puedes modificar este espacio");
    } else {
      changeStatuPlaces(btn, change);
    }
  }
}
function changeStatuPlaces(btn, change) {
  var field,
      valueField = btn.parentNode.id;
  if (userOptions.role === "admin" || userOptions.role === "vendor"){
    field = document.getElementById('spaces');
  } else {
    field = document.getElementById('solicitud');
  }
  btn.classList.toggle('select-item');
  if(btn.classList.contains('select-item')) {
    itemsSelection++;
    field.value += field.value==null || field.value== "" ? valueField:","+valueField;
  } else {
    var valueField = field.value.indexOf(valueField+',') >= 0 ? valueField + ',' : field.value.indexOf(',' + valueField) > 0 ? ',' + valueField : valueField,
        newValue = field.value.replace(valueField, '');

    itemsSelection--;
    field.value = newValue;
  }
  if(itemsSelection > 0) {
    change.classList.add('active-options');
  } else {
    change.classList.remove('active-options');
  }
}
$(function() {
  startApp();
});
