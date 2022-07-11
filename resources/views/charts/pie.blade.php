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
                //for each item in the array, add a new data point
                @foreach ($totalPurchaseByBookId as $item)
                { y: {{ $item->total }}, label: "{{ $item->book->title }}" },
                @endforeach
                
            ]
        }]
    });
    pie.render();
    
    }
    </script>