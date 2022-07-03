<script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("linechart", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Simple Line Chart"
        },
        axisY:{
            includeZero: false
        },
        data: [{        
            type: "line",       
            dataPoints: [
                { x: 10, label: "A&B" },
                { x: 13,  label: "BCP" },
                { x: 35,  label: "Bible Study 2022" },
                { x: 6,  label: "CYC" },
                { x: 6,  label: "CoN HYMN" },
                { x: 1, label: "CONSTITUTION AND CANNONS" },
                { x: 23,  label: "DAILY DYNAMITES 2022" },
                { x: 48,  label: "DAILY FOUNTAIN 2022" },
                { x: 48,  label: "FINANCIAL FREEDOM" },
                { x: 48,  label: "SS AGE 3-5" }
            ]
        }]
    });
    chart.render();
    
    }
    </script>