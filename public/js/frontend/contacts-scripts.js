/**
 * Created by Dev on 08.05.2017.
 */


$(document).ready(function () {
  $('.ac-item input[type=checkbox]').on('change', function(){
    setTimeout(function(){ mainScroll.refresh(); }, 500);
  });

  setTimeout(function(){   $($('#cont-text-r-t')[0]).addClass('show');   }, 1000);
  setTimeout(function(){   $($('#wrap-cont-map')[0]).addClass('show');   }, 1600);
  setTimeout(function(){ initMap(); }, 1200);
});


function scrollFunc() {
  mainScroll.on('scroll', function(){

    var wrapContMap= $($('#wrap-cont-map')[0]).offset().top - (window.innerHeight*0.7);
    var wrapImgContRightBot= $($('.wrap-img-cont-r-b')[0]).offset().top - (window.innerHeight*0.7);
    var wrapImgContBot= $($('.wrap-cont-b')[0]).offset().top - (window.innerHeight*0.7);
    // var wrapContTextRightTop= $($('#cont-text-r-t')[0]).offset().top - (window.innerHeight*0.7);
    var wrapFormMail= $($('#form-mail')[0]).offset().top - (window.innerHeight*0.7);



    if(0 > wrapContMap) $($('.wrap-cont-map')[0]).addClass('show');
    if(0 > wrapImgContRightBot) $($('.wrap-img-cont-r-b')[0]).addClass('show');
    if(0 > wrapImgContBot) $($('.wrap-cont-b')[0]).addClass('show');
    // if(0 > wrapContTextRightTop) $($('#cont-text-r-t')[0]).addClass('show');
    if(0 > wrapFormMail) $($('#form-mail')[0]).addClass('show');



    var lenFooterPath = $($('footer')[0]).offset().top - (window.innerHeight*0.1);
    var a = -(1700 - lenFooterPath) / 100 / 6;
    document.getElementById('wrapper-bg-contacts').style.opacity = a;
    console.log(a)
  })
}



function initMap() {
  var centerMap = {lat: -25.363, lng: 131.044};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: centerMap,
    disableDefaultUI: true,
    styles: [
      {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "saturation": 36
          },
          {
            "color": "#000000"
          },
          {
            "lightness": 40
          }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "visibility": "on"
          },
          {
            "color": "#000000"
          },
          {
            "lightness": 16
          }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 20
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 17
          },
          {
            "weight": 1.2
          }
        ]
      },
      {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 20
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 21
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 17
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 29
          },
          {
            "weight": 0.2
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 18
          }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 16
          }
        ]
      },
      {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 19
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#000000"
          },
          {
            "lightness": 17
          }
        ]
      }
    ],
  });

  var marker = new google.maps.Marker({
    position: centerMap,
    icon: '../images/marker.png',
    map: map
  });
}
