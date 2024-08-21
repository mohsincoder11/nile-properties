<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment Gateway</title>
</head>

<body>
    <form id="razorpay-form" method="POST" action="{{ route('razorpay.callback') }}">
        @csrf
        <input type="hidden" id="razorpay_order_id" name="razorpay_order_id">
        <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id">

        <input type="hidden" id="razorpay_initial_enquiry_id" name="initial_enquiry_id"
            value="{{ $data['initial_enquiry_id'] ?? '' }}">
        <input type="hidden" id="razorpay_installment" name="installment" value="{{ $data['installment'] ?? '' }}">
        <input type="hidden" id="razorpay_date" name="date" value="{{ $data['date'] }}">
        <input type="hidden" id="razorpay_payment_type" name="payment_type" value="{{ $data['payment_type'] }}">
        <input type="hidden" id="razorpay_paid_amount" name="paid_amount" value="{{ $data['paid_amount'] }}">
        <input type="hidden" id="razorpay_bank_name" name="bank_name" value="{{ $data['bank_name'] }}">
        <input type="hidden" id="razorpay_account_no" name="account_no" value="{{ $data['account_no'] }}">
        <input type="hidden" id="razorpay_cheque_no" name="cheque_no" value="{{ $data['cheque_no'] }}">
        <input type="hidden" id="razorpay_ifsc" name="ifsc" value="{{ $data['ifsc'] }}">
        <input type="hidden" id="razorpay_remark" name="remark" value="{{ $data['remark'] }}">

        <!-- Razorpay Button -->
        <button type="button" id="razorpay-button">Pay with Razorpay</button>
    </form>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        // Sync function to copy data from the storeInstallmentForm to the razorpay-form
        function syncField(sourceId, targetId) {
            document.getElementById(targetId).value = document.getElementById(sourceId).value;
        }

        // Attach event listeners to all input fields to sync data
        document.getElementById('date2').addEventListener('input', function() {
            syncField('date2', 'razorpay_date');
        });

        document.getElementById('payment_type2').addEventListener('change', function() {
            document.getElementById('razorpay_payment_type').value = this.value;
        });

        document.getElementById('paid_amount2').addEventListener('input', function() {
            syncField('paid_amount2', 'razorpay_paid_amount');
        });

        document.getElementById('bank_name2').addEventListener('input', function() {
            syncField('bank_name2', 'razorpay_bank_name');
        });

        document.getElementById('account_no2').addEventListener('input', function() {
            syncField('account_no2', 'razorpay_account_no');
        });

        document.getElementById('cheque_no2').addEventListener('input', function() {
            syncField('cheque_no2', 'razorpay_cheque_no');
        });

        document.getElementById('ifsc2').addEventListener('input', function() {
            syncField('ifsc2', 'razorpay_ifsc');
        });

        document.getElementById('remark2').addEventListener('input', function() {
            syncField('remark2', 'razorpay_remark');
        });

        // Razorpay payment button functionality
        document.getElementById('razorpay-button').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default form submission
            console.log("Button clicked");

            var paidAmount = document.getElementById('razorpay_paid_amount').value;
            var installment = document.getElementById('razorpay_installment').value;

            console.log("Paid Amount:", paidAmount);
            console.log("Installment:", installment);

            var options = {
                "key": "{{ env('RAZORPAY_KEY_ID') }}", // Your Razorpay key
                "amount": paidAmount * 100, // Amount in paise
                "name": "Nile Properties",
                "description": installment + " Installment transaction",
                "image": "{{ asset('panel/logo/favicon.png') }}",
                "handler": function (response) {
                    console.log("Razorpay Order ID:", response.razorpay_order_id);
                    console.log("Razorpay Payment ID:", response.razorpay_payment_id);

                    document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;

                    document.getElementById('razorpay-form').action = "{{ route('razorpay.callback') }}";
                    console.log("Form Action:", document.getElementById('razorpay-form').action);

                    console.log("Form is being submitted");
                    document.getElementById('razorpay-form').submit();
                },
                "prefill": {
                    "name": "{{ auth()->user()->name }}",
                    "email": "{{ auth()->user()->email }}"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            console.log("Razorpay Options:", options);
            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
    </script>
</body>

</html>
