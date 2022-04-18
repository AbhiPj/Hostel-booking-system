
@extends('layouts.user.user')

@section('content')
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


    <div class="payment-content">
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
        <div class="payment-form">
            <form>
                <div class="row"  >
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="firstName" type="text" class="form-control" placeholder="First name" required>
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="lastName" type="text" class="form-control" placeholder="Last name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="phoneNumber" type="number" class="form-control" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="address" type="text" class="form-control" placeholder="Address" required>
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="street" type="text" class="form-control" placeholder="Street" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="city" type="text" class="form-control" placeholder="City" required>
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="province" type="text" class="form-control" placeholder="Province" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="district" type="text" class="form-control" placeholder="District" required>
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="zipCode" type="number" class="form-control" placeholder="Zip code" required>
                    </div>
                </div>
            </form>
        </div>
        <div class="payment-details">
{{--            <p>{{$rooms->roomName}}</p>--}}
            <div class="payment-details-item">
                <h4 style="display:flex; justify-content: center">Payment overview</h4>
                <hr>
                <p>Hostel name</p>
                <p>Room name</p>
                <p>Room type</p>
                <p>2000 Rs</p>

            </div>
            <div>
                <button onclick="payByCash()" class="btn btn-dark" style="border-radius: 5px; width: 100%; padding:0.76rem">Pay by cash</button>
            </div>
            <hr>
            <div id="paypal-button-container"></div>

        </div>
{{--        <a href="/user/rooms/booking/{{$id}}">book</a>--}}
    </div>
    <script>

        function payByCash ()
        {
            if($('#firstName').val() =="" ||
                $('#lastName').val() =="" ||
                $('#email').val()=="" ||
                $('#phoneNumber').val()=="" ||
                $('#address').val()=="" ||
                $('#street').val()=="" ||
                $('#city').val()=="" ||
                $('#province').val()=="" ||
                $('#district').val()=="" ||
                $('#zipCode').val()=="" )
            {
                swal("Error", "Please fill the form with valid data", "error");
            }
            $.ajax({
                method:"POST",
                url:"/user/rooms/checkout",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    firstName:  $('#firstName').val(),
                    lastName:  $('#lastName').val(),
                    email:  $('#email').val(),
                    phoneNumber:  $('#phoneNumber').val(),
                    address:  $('#address').val(),
                    street:  $('#street').val(),
                    city:  $('#city').val(),
                    province:  $('#province').val(),
                    district:  $('#district').val(),
                    zipCode:  $('#zipCode').val(),
                    roomId:"{{$rooms->id}}",
                    paymentMethod:"Pay by cash",
                },
                success:function (response){
                    // swal(response.status);
                    swal("Success", "Data added successfully", "success");
                    window.location.href="/home";
                }
            })
        }
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function (key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }

        paypal.Buttons({

            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{$rooms->price}}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    // var transaction = orderData.purchase_units[0].payments.captures[0];
                    // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // var element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');

                    $.ajax({
                        method:"POST",
                        url:"/user/rooms/checkout",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:{
                            firstName:  $('#firstName').val(),
                            lastName:  $('#lastName').val(),
                            email:  $('#email').val(),
                            phoneNumber:  $('#phoneNumber').val(),
                            address:  $('#address').val(),
                            street:  $('#street').val(),
                            city:  $('#city').val(),
                            province:  $('#province').val(),
                            district:  $('#district').val(),
                            zipCode:  $('#zipCode').val(),

                            'roomId':"{{$rooms->id}}",
                            'paymentMethod':"Paid by Paypal",
                        },
                        success:function (response){
                            // swal(response.status);
                            swal("Success", "Data added successfully", "success");
                            // window.location.href="";
                        }
                    })
                });
            }
        }).render('#paypal-button-container');

    </script>
@endsection
