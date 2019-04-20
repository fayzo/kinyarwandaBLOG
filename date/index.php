<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="simple-calendar.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 3 integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 4 crossorigin="anonymous">
    </script>
    <script src="jquery.simple-calendar.js"></script>
</head>

<body>
    <div id="container"></div>
</body>
<script>
    $(function() {
        $("#container").simpleCalendar();
    });

    $("#container").simpleCalendar({
        // event dates
        events: ['2019-03-04', '2019-03-05', '2019-03-06', '2019-03-07'],
        // event info to show
        eventsInfo: ['Event 1', 'Event 2', 'Event 3', 'Event 4']
    });
    $("#container").simpleCalendar({
        minDate: "YYYY-MM-DD"
        maxDate: "YYYY-MM-DD",
    });

    $("#container").simpleCalendar({
        months: ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']
        days: ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'],
    });

    $("#container").simpleCalendar({
        selectCallback: function(selDate) {},
        insertCallback: function() {}
    });
</script>

</html> 