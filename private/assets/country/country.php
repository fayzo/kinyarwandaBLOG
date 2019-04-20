<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
    function country() {
        var xmlhttp = new XMLHttpRequest();
        var url = "country.json";
        xmlhttp.open("post", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                var myDiv = document.getElementById("myDiv");
                //Create and append select list
                var selectList = document.createElement("select");
                selectList.id = "country";
                selectList.name = "country";
                myDiv.appendChild(selectList);

                var ordered = {};
                Object.keys(myObj).sort().forEach(function(key) {
                    ordered[key] = myObj[key];
                });
                // var ordered =Object.keys(myObj);
                // ordered.sort().forEach(function(key) {
                //     ordered[key] = myObj[key];
                // });

                for (x in ordered) {
                    var option = document.createElement("option");
                    option.value = ordered[x];
                    option.text = x;
                    selectList.appendChild(option);
                }
                console.log(ordered);
                console.log(myObj);
            }
        };
    }
    window.onload = country();
    </script>
</head>

<body>
    <div id="myDiv">
    </div>

</body>

</html>