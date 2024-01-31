<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sp.css') }}">
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="Home-container">
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

            <div class="Home-form">
                <h2>Home</h2>
                <div id="gantt_here" style='width:100%; height:250px;'></div>
            </div>
    </div>

<script>
    gantt.config.readonly = true;
    gantt.init("gantt_here");
    gantt.config.columns = gantt.config.columns.filter(function(column) {
        return column.name !== "add";
    });
    gantt.config.columns = [
        {name: "text",       label: "タスク",  width: "*", tree: true },
        {name: "start_date", label: "開始予定日",  align: "center" },
        {name: "end_date",   label: "終了予定日", align: "center"},
        {name: "duration",   label: "期間",    align: "center" }
    ];
    gantt.parse({
    data: @json($ganttData) 
    });
</script>
</body>
</html>