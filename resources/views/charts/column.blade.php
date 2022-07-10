@php
    $num1 = "8";
@endphp
<script>
    function columnChart() {
    
    var column = new CanvasJS.Chart("columnChart", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Books"
        },
        axisY: {
            title: "REPORT ANALYSIS"
        },
        data: [{
            type: "column",
            showInLegend: true,
            legendMarkerColor: "grey",
            legendText: "FINANCIAL REPORT",
            dataPoints: [
                { y: 10, label: "A&B" },
                { y: 13,  label: "BCP" },
                { y: 35,  label: "Bible Study 2022" },
                { y: 6,  label: "CYC" },
                { y: 6,  label: "CoN HYMN" },
                { y: 1, label: "CONSTITUTION AND CANNONS" },
                { y: 23,  label: "DAILY DYNAMITES 2022" },
                { y: 48,  label: "DAILY FOUNTAIN 2022" },
                { y: 30,  label: "FINANCIAL FREEDOM" },
                { y: {{ $num1 }},  label: "SS AGE 3-5" }
            ]
        }]
    });
    column.render();
    
    }
    </script>