<?php include 'master-page/left-panel.php' ?>
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
                          <th scope="col">Source</th>
                          <th scope="col">Destination</th>
                          <th scope="col">Time</th>
                          <th scope="col">Booking Date</th>
                          <th scope="col">Price</th>
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


</div>
<script>
    $( document ).ready(function() {
        console.log( "ready!" );
        var urlAdd = "../api/getAllBookingById.php?UserId=1";
        $.ajax({type: "GET",
        url: urlAdd,        
        success:function(result) {
            if(result.length !=0){
                console.log(result);
                for (i = 0; i < result.length; i++) { 
                $("tbody").append('<tr class="btnDelete" data-id="2"><th scope="row">'+
                result[i].from_address +'</th>'+
                                  '<td>'+result[i].to_address+'</td>'+
                                  '<td>'+result[i].time+'</td>'+
                                  '<td>'+result[i].BookingDate+'</td>'+
                                  '<td>'+result[i].Price+'</td>' +
                                   '</tr>');       
                }
            }
            

        },
        error:function(result) {
            $("#nextBusError").html(
                    '<div class="alert alert-danger" role="alert">'+
                    'Something went wrong. Please contact admin'+
                    '</div>'
                );
        }
        });
    });
    </script>
</body>
</html>