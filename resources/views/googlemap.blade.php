<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google-map.apikey') }}&callback=initMapWithAddress" async defer></script>
<script>
var _my_address = '{{ $address->map_title }}';
function initMapWithAddress() {
    var opts = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    var my_google_map = new google.maps.Map(document.getElementById('my_map'), opts);
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode(
      {
        'address': _my_address,
        'region': 'jp'
      },
      function(result, status){
        if(status==google.maps.GeocoderStatus.OK){
            var latlng = result[0].geometry.location;
            my_google_map.setCenter(latlng);
            var marker = new google.maps.Marker({position:latlng, map:my_google_map, title:latlng.toString(), draggable:true});
            google.maps.event.addListener(marker, 'dragend', function(event){
                marker.setTitle(event.latLng.toString());
            });
        }
      }
    );
  }
</script>
<div class="my_map" >

<div id="my_map" style="width: 100%; height: 600px; display:block; margin:30px auto 30px;"></div>
</div>
