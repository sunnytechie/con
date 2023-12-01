@php
                          $deleted = "deleted";
                      @endphp
<script>

    function pieChart() {

    var pie = new CanvasJS.Chart("pieChart", {
        animationEnabled: true,
        title: {
            text: "BCP, CYC and Hymnals"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00'%'",
            indexLabel: "{label} {y}",
            dataPoints: [

                { y: {{ $hymnals }}, label: "Con Hymnals Purchase" },
                { y: {{ $bcps }}, label: "Book of Common Prayers" },
                { y: {{ $cycs }}, label: "Church Year Calendar" },

            ]
        }]
    });
    pie.render();

    }
    </script>
