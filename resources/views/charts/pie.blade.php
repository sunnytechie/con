<script>
    
    function pieChart() {
    
    var pie = new CanvasJS.Chart("pieChart", {
        animationEnabled: true,
        title: {
            text: "Pie Chart Analysis"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00'%'",
            indexLabel: "{label} {y}",
            dataPoints: [
                { y: 10, label: "A&B" },
                { y: 13,  label: "BCP" },
                { y: 35,  label: "Bible Study 2022" },
                { y: 6,  label: "CYC" },
                { y: 6,  label: "CoN HYMN" },
                { y: 1, label: "CONSTITUTION AND CANNONS" },
                { y: 23,  label: "DAILY DYNAMITES 2022" },
                { y: 48,  label: "DAILY FOUNTAIN 2022" },
                { y: 48,  label: "FINANCIAL FREEDOM" },
                { y: 48,  label: "SS AGE 3-5" }
            ]
        }]
    });
    pie.render();
    
    }
    </script>