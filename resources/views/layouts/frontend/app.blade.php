<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!--  toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontend/js/main.js') }}"></script>

<!-- cart save -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
         // Toastr Message pop only one message at a time
        function toastrMessage(type, message) {
            let toastClass = $('.toast');

            toastClass.remove();
            if (type === 'success'){
                toastr.success(message);
            } else if (type == 'error') {
                toastr.error(message);
            } else if (type == 'warning') {
                toastr.warning(message);
            }
        }
        $(".addtocart").click(function() {
            var product_id = $(this).attr("data-product_id");
            var quantity = $(this).attr("data-quantity");
            $.ajax({
                url: "{{ route('cart.store') }}",
                method: 'POST',
                data: {id:product_id,quantity:quantity},
                success: function(res) {
                    toastrMessage('success', "Your product has been updated");
                },
                error: function(res) {
                    console.log(res);
                },
            });
        });
    });
</script>

</body>

</html>