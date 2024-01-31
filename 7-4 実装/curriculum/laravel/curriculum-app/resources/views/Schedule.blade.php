<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lesson Sample Site</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/sp.css') }}">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js" charset="UTF=8"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="Schedule-container">
        <div class="navigation-bar">
                <div class="navi-title">
                    <h1>Memo-Real<br>var 1.1</h1>
                </div>
                <div class="navigation-buttons">
                    <a href="/Home"     class="navi-btn">Home<br></a>
                    <a href="/Schedule" class="navi-btn">Schedule<br></a>
                    <a href="/Task"     class="navi-btn">Task<br></a>
                    <a href="/Memo"     class="navi-btn">Memo<br></a>
                </div>
            </div>
            <div class="Schedule-form">
                <h2>Schedule</h2>
                <div id="calendar" class="calendar"></div>
            </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: @json($events) 
    });
    calendar.render();
});
</script>
</body>
</html>
