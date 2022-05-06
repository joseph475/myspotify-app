document.getElementById('search').onkeyup = function(e) {
    if (e.keyCode === 13) {
        document.getElementById('searchForm').submit(); // your form has an id="form"
    }
    return true;
}