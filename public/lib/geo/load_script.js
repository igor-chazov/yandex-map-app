let activePageEl = document.querySelector('[data-activePage]').getAttribute('data-activePage');

function loadScript(src) {
    let script = document.createElement('script');
    script.src = src;
    script.type = "module";
    script.async = false;
    document.head.append(script);
}

if (activePageEl === 'show') {
    loadScript("/lib/geo/user_location.js");
} else if (activePageEl === 'create' || activePageEl === 'edit') {
    loadScript("/lib/geo/geo_edit.js")
} else {
    loadScript("/lib/geo/geo_init.js");
}
