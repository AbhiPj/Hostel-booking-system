
@extends('layouts.user')

@section('content')
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="payment-content">


        <div class="payment-form">
            <form>
                <div class="row"  >
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="firstName" type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="lastName" type="text" class="form-control" placeholder="Last name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="email" type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="phoneNumber" type="text" class="form-control" placeholder="Phone Number">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="address" type="text" class="form-control" placeholder="Address">
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="street" type="text" class="form-control" placeholder="Street">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="city" type="text" class="form-control" placeholder="City">
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="province" type="text" class="form-control" placeholder="Province">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="district" type="text" class="form-control" placeholder="District">
                    </div>
                    <div class="col-md-6 col-sm-12 my-3">
                        <input id="zipCode" type="text" class="form-control" placeholder="Zip code">
                    </div>
                </div>
            </form>
        </div>
        <div class="payment-details">
{{--            <p>{{$rooms->roomName}}</p>--}}
            <div style="min-height: 40vh; width: 100%; background-color: black; margin-bottom: 20px"></div>
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
                    // window.location.href="/url";
                }
            })
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
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

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
                            // window.location.href="/url";
                        }
                    })
                });
            }
        }).render('#paypal-button-container');

    </script>
@endsection
