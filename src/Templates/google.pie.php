<?php

$graph = "
    <script type='text/javascript'>
      google.charts.setOnLoadCallback(drawPieChart);
      function drawPieChart() {
        var data = google.visualization.arrayToDataTable([
          ['Element', 'Value'],
          ";
            $i = 0;
            foreach ($this->values as $dta) {
                $e = $this->labels[$i];
                $v = $dta;
                $graph .= "['$e', $v],";
                $i++;
            }
            $graph .= '
        ]);
        var options = {
            ';
            if (!$this->responsive) {
                $graph .= "
                height: $this->height,
                width: $this->width,
            ";
            }
            $graph .= "
            fontSize: 12,
            title: '$this->title',";
            if ($this->colors) {
                $graph .= 'colors:[';
                foreach ($this->colors as $color) {
                    $graph .= "'$color',";
                }
                $graph .= '],';
            }
        $graph .= "
        };
        var chart = new google.visualization.PieChart(document.getElementById('$this->id'));
        chart.draw(data, options);
      }
    </script>
    <div id='$this->id'></div>
";

return $graph;