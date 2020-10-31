function getCountryCode(place){
    var countryCode = null;

    if(place.address_components.length > 0){
        for (var i = 0; i < place.address_components.length; i += 1) {
            var addressObj = place.address_components[i];
            for (var j = 0; j < addressObj.types.length; j += 1)
                if (addressObj.types[j] === 'country')
                    countryCode = addressObj.short_name
        }
    }

    return countryCode;
}


function initialize() {
    var options = {
        types: ['(cities)']
    };

    var input = document.getElementById('cityInput');
    var autocomplete = new google.maps.places.Autocomplete(input, options);


    autocomplete.addListener("place_changed", () => {
        var place = autocomplete.getPlace();

        document.getElementById('cityName').value = place.vicinity;
        document.getElementById('countryCode').value = getCountryCode(place);

    })

}

google.maps.event.addDomListener(window, 'load', initialize);