@php
    $num1 = "8";
    $deleted = "Item deleted";
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
                @foreach ($totalPurchaseByBookId as $item)
                { y: {{ $item->total }}, label: "{{ $item->book->title ?? $deleted }}" },
                @endforeach
            ]
        }]
    });
    column.render();
    
    }
    </script>