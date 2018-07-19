<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
  <title></title>
</head>
<body>
<form action="{{url('razor-pay-post')}}" method="POST">
<?php $key="rzp_live_b7vQ8lyFs69syy";?>
<!-- Note that the amount is in paise = 50 INR -->
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $key;?>"
    data-amount="100"
    data-buttontext="Pay with Razorpay"
    data-name="Merchant Name"
    data-description="Purchase Description"
    data-image="https://your-awesome-site.com/your_logo.jpg"
    data-prefill.name="Durga Pratap Rajbhar"
    data-prefill.email="rajbhardp@gmail.com"
    data-theme.color="#F37254"
></script>
<input type="hidden" value="Hidden Element" name="hidden">
</form>

</body>
</html>




<!-- Hj5Bkherf4URhXsNwJfHwKpZ -->

