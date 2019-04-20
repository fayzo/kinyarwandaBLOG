
function language(lang, id) {
    var xmlhttp = new XMLHttpRequest();
    var url = "core/ajax/language_translator_config.php?key=lang" + '&lang=' + lang + '&id=' + id;
    xmlhttp.open("POST", url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            location.reload();
            console.log(this.responseText);
        }
    };
}