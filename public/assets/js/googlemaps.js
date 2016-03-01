var marker
var input = $('#address')[0];
var image = '/assets/img/map-pin.png';
function initAutocomplete() {
    var defaultCenter = new google.maps.LatLng($('#latitude').val(),$('#longitude').val());
    var infowindow = new google.maps.InfoWindow();
    var city = new google.maps.places.Autocomplete(document.getElementById('city'),{types: ['geocode']});
    var autocomplete = new google.maps.places.Autocomplete(input);

    var map = new google.maps.Map(document.getElementById('map'), {
        scrollwheel: false,
        center: defaultCenter,
        zoom: 8,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.TOP_RIGHT
        }
    });

    autocomplete.bindTo('bounds', map);

    marker = new google.maps.Marker({
        position: defaultCenter,
        map: map,
        icon: image,
        title: "Desired Location",
        draggable:true,
        animation: google.maps.Animation.DROP,
    });


    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    google.maps.event.addDomListener(input, 'keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });

    // Bias the searchBox results towards current map's viewport.
    /*    map.addListener('bounds_changed', function() {
     searchBox.setBounds(map.getBounds());
     });*/

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
        toggleBounce();
    });

    google.maps.event.addListener(marker, 'dragend', function(evt){
        $('#lat').html(evt.latLng.lat().toFixed(4));
        $('#lng').html(evt.latLng.lng().toFixed(4));
        $('#latitude').val(evt.latLng.lat().toFixed(4));
        $('#longitude').val(evt.latLng.lng().toFixed(4));
        $('#markerPosition').html('<i>Marker dropped</i>');
        map.setCenter(this.position);
        geocodePosition(this.getPosition());
    });
    google.maps.event.addListener(marker, 'dragstart', function(evt){
        $('#markerPosition').html('<i class="fa fa-refresh fa-spin" style="font-size:1.3em;color:#e1c950"></i><i> Currently dragging marker...</i>');
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        // Set the position of the marker using the place ID and location
        //marker.setPlace({
        //    placeId: place.place_id,
        //    location: place.geometry.location
        //});
        marker.setPosition(place.geometry.location);
        marker.setAnimation(google.maps.Animation.DROP);
        marker.setVisible(true);

        $('#lat').html(place.geometry.location.lat().toFixed(4));
        $('#lng').html(place.geometry.location.lng().toFixed(4));
        $('#latitude').val(place.geometry.location.lat().toFixed(4));
        $('#longitude').val(place.geometry.location.lng().toFixed(4));
        $('#markerPosition').html('<i>Marker dropped:</i>');

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                /*'Place ID: ' + place.place_id + '<br>' +*/
            place.formatted_address);
        //infowindow.open(map, marker);
    });
}


function toggleBounce() {
    if (marker.getAnimation() != null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}


function geocodePosition(pos)
{
    geocoder = new google.maps.Geocoder();
    geocoder.geocode
    ({
            latLng: pos
        },
        function(results, status)
        {
            if (status == google.maps.GeocoderStatus.OK)
            {
                $("#address").val(results[0].formatted_address);
            }
            else
            {
                $.growl.error({ title: "Error", message: "Cannot determine address at this location." });
            }
        }
    );
}
