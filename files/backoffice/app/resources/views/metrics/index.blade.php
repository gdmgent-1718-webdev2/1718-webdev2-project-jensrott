@extends('layouts.app')

@section('content')
    <!-- This is the Super Admin dashboard after logging in -->
    <!-- We kunnen geen super admin registreren. Er is hier maar 1 van -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>
    </div>

    <h1>Welcome {{ Auth::user()->user_name }} ! </h1>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidenavigation in partials -->
            @include('partials.sidenav')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h1">{{$title}}</h1>
                    <div class="table-responsive">
                        <table class="table table-light table-hover">
                            <tbody>
                                <div class="chart"></div>


                            </tbody>
                        </table>

                    </div>
                </div>
            </main>

        </div>

    </div>

@endsection

<script src="https://d3js.org/d3.v5.min.js"></script>
<script>


         const usersData = JSON.parse('<?= $users ?>');
         const productsData = JSON.parse('<?= $products ?>');
         console.log(usersData, productsData);

         const data = [30, 86, 168, 281, 303, 365];
         /*const data = {
             "x" : {
                 1 : 30,
                 2 : 40
             },
             "y": {
                 1 : 168,
                 2 : 291,
             }
         }*/



         let chart = d3.select(".chart").attr('width', 500).attr('height', 500);
         var bars = chart.selectAll(".bar")
             .data(productsData)
             .enter()
             .append("g")

         bars.append("rect")
             .attr("x", function(d) {return d.x})
             .attr("y", 0)
             .attr("width", function(d) {return d.id;})
             .attr("height", function(d) {return d.name;})
         /*
                  var svg = d3.select("svg"),
                      width = +svg.attr("width"),
                      height = +svg.attr("height"),
                      radius = Math.min(width, height) / 2,
                      g = svg.append("g").attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");


                  var color = d3.scaleOrdinal(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);



                  productsData.forEach((data) => {
                      var pie = d3.pie()
                          .sort(null)
                          .value(function(d) { return data.name; });

                      var path = d3.arc()
                          .outerRadius(radius - 10)
                          .innerRadius(0);

                      var label = d3.arc()
                          .outerRadius(radius - 40)
                          .innerRadius(radius - 40);

                      var arc = g.selectAll(".arc")
                          .data(pie(data))
                          .enter().append("g")
                          .attr("class", "arc");

                      arc.append("path")
                          .attr("d", path)
                          .attr("fill", function(d) { return color(d.data.age); });

                      arc.append("text")
                          .attr("transform", function(d) { return "translate(" + label.centroid(d) + ")"; })
                          .attr("dy", "0.35em")
                          .text(function(d) { return d.data.age; });
                  });
                  */
</script>

