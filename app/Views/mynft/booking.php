<?= $this->extend("App\Views\home") ?>
<?= $this->section('javascript') ?>
    
    <script src="/assets/blockchain/nfttravel.js?v=2.0.3"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){

        $('.input-daterange').datepicker({
            format: 'mm/dd/yyyy',
            autoclose: true,
            calendarWeeks : true,
            clearBtn: true,
            disableTouchKeyboard: true
        });
        $("#province").on("change",function(){
            var id = $(this).val();
            if(Number(id) < 1) return 0;
           
            axios.get("/mynft/province/"+id).then(function (response) {
                var html ='<div class="card mb-4 border"><div class="alert alert-warning" id="notes">'+response.data.notes+'</div></div>';
                html += '<div class="card mb-4"><h4 class="mb-4">Service</h4>';
                html += '<div>'+response.data.service+'</div>';
                html += '<h4 class="mb-4">Infomation</h4>';
                html += '<div>'+response.data.infomation+'</div>';
                html += '<h4 class="mb-4">Maps</h4>';
                html += response.data.maps;
                html += '</div>';
                $("#afternotes").html(html);
                
            });
            

        });
     
    $("#booking").on("submit", function(){
        var obj = {
            tokenid : <?php echo $token_id ?>,
            firstname : $("input[name=firstname]").val(),
            lastname : $("input[name=lastname]").val(),
            name : $("input[name=firstname]").val() + " "+ $("input[name=lastname]").val(),
            email : $("input[name=email]").val(),
            passport : $("input[name=passport]").val(),
            address : $("input[name=address]").val(),
            phone : $("input[name=phone]").val(),
            hotel : $("select[name=province]").val(),
            checkin : $("input[name=checkin]").val(),
            checkout : $("input[name=checkout]").val(),
        }

        axios.post("/mynft/bookingtoken?id=<?php echo $token_id ?>",obj).then(function (response) {
            obj.checkin = moment(obj.checkin + " 0:00").unix();
            obj.checkout = moment(obj.checkout + " 0:00").unix();
            //console.log(obj);

            SmartApp.Travel.bookingTour(obj);
        });
        return false;
        //SmartApp.Travel.bookingTour(obj);
    });

    });
</script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

                <div class="container-fluid py-4">
                    <!-- Block @s -->
                    
                        
                        <form method="post" action="/mynft/booking-<%=tokenid%>.html">
                        <div class="card">
                        <div class="card-body">
                            <h4>Infomation</h4>
                          <div class="form-group row">
                            <div class="col-md-6">
                                
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" required class="form-control" name="firstname">
                                    

                           
                            </div>
                            <div class="col-md-6">
                                
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" required class="form-control" name="lastname">
                                    
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="number" required class="form-control" name="phone">
                            
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" required class="form-control" name="email">
                            <small id="emailHelp" class="form-text text-muted">Email address.</small>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" required class="form-control" name="address">
                            
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Passport / ID</label>
                            <input type="text" required class="form-control" name="passport">
                            
                          </div>




                         

                        </div>
                        </div>
                        <br>
                        <div class="card">
                        <div class="card-body">
                          <h4>Hotel</h4>
                          <div class="form-group row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Country</label>
                                <select  class="form-select" name="country">
                                    <option value="vn">Vietnamme</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="exampleInputEmail1">Location</label>
                                <select  class="form-select" id="province" name="province" required>
                                    <option value="">----</option>
                                    <?php foreach ($hotel as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->province; ?> - <?php echo $value->star; ?> Star</option>
                                    <?php } ?>
                                        
                                </select>
                            </div>
                            
                          </div>


                          <div class="input-daterange row mb-4">
                              <div class="col-md-6">
                                <label id="start-p" for="start">Checkin</label>
                                <input  class="form-control" required id="start" name="checkin" aria-describedby="emailHelp">
                                
                              </div>


                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Checkout</label>
                                <input  class="form-control" required id="end" name="checkout" aria-describedby="emailHelp">
                                
                              </div>
                          </div>
                          

                          
                        </div>
                        <div id="afternotes "></div>
                          
                          <div class="card-footer"><button type="submit" id="booking" class="btn btn-primary btn-lg">Send Booking</button></div>
                        </form>
                    </div><!-- .block @e -->
                </div>
          
<?= $this->endSection() ?>