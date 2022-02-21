
@extends('layouts.user')

@section('content')
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="content">
        <div id="paypal-button-container"></div>
        <div >
            <button onclick="cashOnDelivery()" class="btn btn-dark" style="border-radius: 5px; width: 750px">Cash on delivery</button>
        </div>

        <p>added</p>
{{--        <a href="/user/rooms/booking/{{$id}}">book</a>--}}
        <p>{{$rooms->roomName}}</p>
        <p>{{$rooms->id}}</p>



    </div>
    <script>
        function cashOnDelivery ()
        {
            $.ajax({
                method:"POST",
                url:"/user/rooms/checkout",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    'roomId':"{{$rooms->id}}",
                    'paymentMethod':"Cash on Delivery",
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
