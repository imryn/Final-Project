function initMap(){
  var options = {
    types: ['(cities)'],
    componentRestrictions: {country: "isr"}
  };
  var input = document.getElementById('pac-input');
  var autocomplete = new google.maps.places.Autocomplete(input, options);
}
