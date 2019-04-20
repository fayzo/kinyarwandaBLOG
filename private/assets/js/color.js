function colors(requests, id) {
    var xhr = new XMLHttpRequest();
    var url = "core/ajax/color_db.php?key=color" + '&id=' + id + '&color=' + requests;
    xhr.open("POST", url, true);
    xhr.send();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var json = JSON.parse(xhr.responseText);
            var sc = document.body;
            sc.setAttribute("id", json.color);

            console.log(json.user_id + ", " + json.color);
            console.log(xhr.responseText);
            // location.reload();
            // if (xhr.responseText.indexOf('color') >= 0) {
            //     window.location = 'admin.php';
            // }
        }
    };
}