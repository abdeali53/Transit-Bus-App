
<!doctype html>



<?php include 'master-page/left-panel.php' ?>
        

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <!-- /header -->
        <!-- Header-->

       


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All Routes</strong>
                        </div>
                        <div class="card-body">
                            <div id="nextBusError"></div>
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Route Id</th>
                                  <th scope="col">Source</th>
                                  <th scope="col">Destination</th>
                                  <th scope="col">Time</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                
                              </tbody>
                            </table>
                             
                        </div>
                    </div>
                </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

    <script>
    $( document ).ready(function() {
        console.log( "ready!" );
        var urlAdd = "../api/get-all-bus.php";
        $.ajax({type: "GET",
        url: urlAdd,        
        success:function(result) {
            $("tbody").append('
            <tr class="btnDelete" data-id="2"><th scope="row">'+
             $route['route_id']; ?></th>
                                  <td><?php echo $route['from_address']; ?></td>
                                  <td><?php echo $route['to_address']; ?></td>
                                  <td><?php echo $route['time']; ?></td>
                                  <td><a href = "<?php echo 'edit-route.php?id=' . $route['route_id']; ?>">Google Map</a> </td>
                                 
                                </tr>')
        },
        error:function(result) {
            $("#nextBusError").html(
                    '<div class="alert alert-danger" role="alert">'+
                    'Something went wrong. Please contact admin'+
                    '</div>'
                );
        }
    });
    </script>

</body>
</html>
