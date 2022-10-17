ymaps.ready(init);
const active_id = document.querySelector('[data-activeId]').getAttribute('data-activeId');

function init() {
    var myMap = new ymaps.Map('map', {
            center: [55.751574, 37.573856],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        }),
        objectManager = new ymaps.ObjectManager();

    myMap.geoObjects.add(objectManager);

    $.getJSON('/api/geos', function (response) {
        objectManager.add(response);
        objectManager.setFilter(function (object) {
            return object.user_id == active_id;
        });
        myMap.setBounds(objectManager.getBounds(), {checkZoomRange:true});
    });

    [].forEach.call(document.querySelectorAll('[data-objectId]'), function (el) {
        el.addEventListener('click', function () {
            var objectId = el.getAttribute("data-objectId");
            viewObject(objectId);
        });
    });

    function viewObject(objectId) {
        for (var object of document.querySelectorAll('[data-objectId]')) {
            object.classList.remove('active');
        }
        document.querySelector('[data-objectId="' + objectId + '"]').classList.add('active');

        objectManager.objects.each(function (item) {
            objectManager.objects.setObjectOptions(item.id, {
                preset: 'islands#blueIcon'
            });
        });
        objectManager.objects.setObjectOptions(objectId, {
            preset: 'islands#redDotIcon'
        });

        myMap.setCenter(objectManager.objects.getById(objectId).geometry.coordinates, 15, {
            checkZoomRange: true
        });
    }
}
