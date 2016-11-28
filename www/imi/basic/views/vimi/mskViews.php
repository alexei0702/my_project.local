<style>
body {
  margin: 0;
  padding: 0;
  font: 10px sans-serif;
}
table
{
  width: 100%;
  border-collapse: collapse;
}
th,td 
{
  border: #ccc 1px solid;
  padding: 5px 10px;
}
.container
{
  width: 100%;
}
.bar {
  fill: steelblue;
}

.bar:hover {
  fill: brown;
}

.axis--x path {
  display: none;
}

</style>
<div class="row">
<div class="col-md-8">
<h1>Ведомость межсессионного контроля</h1>
<svg width="900" height="500"></svg>
</div>
<?php if($count): ?>
<div class="col-md-4">
<h1>Cписок топ групп:
<table class='table table-striped table-hover table-bordered'>
    <thead>
    <tr>
      <td>#</td>
      <td>Group</td>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach ($nulls as $nulls)
    {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$nulls."</td>";
        echo "</tr>";
        $i++;
    }
    ?>
</tbody>
</table>
</h1>
</div>
</div>
<br><br><br>
<div class="row">
<p><a class="btn btn-info btn-lg center-block" href="index.php?r=vimi/choose-group">Перейти к группам &raquo;</a></p>
</div>
<?php endif; ?>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>

var svg = d3.select("svg"),
    margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom;

var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
    y = d3.scaleLinear().rangeRound([height, 0]);

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.tsv("csv/data.tsv", function(d) {
  d.frequency = +d.frequency;
  return d;
}, function(error, data) {
  if (error) throw error;

  x.domain(data.map(function(d) { return d.letter; }));
  y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

  g.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));

  g.append("g")
      .attr("class", "axis axis--y")
      .call(d3.axisLeft(y).ticks(15))
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", "0.71em")
      .attr("text-anchor", "end")
      .text("Frequency");

  g.selectAll(".bar")
    .data(data)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return x(d.letter); })
      .attr("y", function(d) { return y(d.frequency); })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return height - y(d.frequency); });
});

</script>
