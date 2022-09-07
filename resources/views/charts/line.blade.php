<script>
    
    function lineChart() {
    
    var line = new CanvasJS.Chart("lineChart", {
        animationEnabled: true,
        title: {
            text: "Dynamite, Bible study and Fountain Purchased Analysis"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00'%'",
            indexLabel: "{label} {y}",
            dataPoints: [
                
                { y: {{ $totalPurchasedBibleStudy }}, label: "Bible Study" },
                { y: {{ $totalPurchasedDailyFountain }}, label: "Daily Fountain" },
                { y: {{ $totalPurchasedDailyDynamite }}, label: "Daily Dynamite" },
                { y: {{ $totalPurchasedCyc }}, label: "CYC" },
                
            ]
        }]
    });
    line.render();
    
    }
    </script>