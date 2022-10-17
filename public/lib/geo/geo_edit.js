ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
            center: [55.751574, 37.573856],
            zoom: 9,
        }, {
            searchControlProvider: 'yandex#search'
        }),
        objectManager = new ymaps.ObjectManager();

    myMap.geoObjects.add(objectManager);

    function setState() {
        myMap.geoObjects.removeAll();

        let name = document.getElementById('name').value;
        let longitude = document.getElementById('longitude').value;
        let Latitude = document.getElementById('Latitude').value;

        myMap.setCenter([Latitude, longitude]);

        myMap.geoObjects.add(new ymaps.Placemark([Latitude, longitude], {
            balloonContent: name,
        }, {
            preset: 'islands#redDotIcon',
        }));
    }

    setState();

    document.getElementById('geo-map').addEventListener('input', function (myMap) {
        setState(myMap);
    });
}
