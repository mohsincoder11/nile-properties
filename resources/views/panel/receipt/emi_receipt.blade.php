<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
            /* Position the button on the right side */
    .back-button {
        position: absolute; /* Or 'fixed' depending on your layout */
        right: 20px; /* Distance from the right edge */
        top: 20px; /* Distance from the top edge */
        padding: 10px 20px; /* Add padding for a larger button */
        background-color: #007bff; /* Button background color */
        color: white; /* Button text color */
        border: none; /* Remove borders */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Pointer cursor on hover */
        font-size: 16px; /* Font size */
    }

    /* Add hover effect */
    .back-button:hover {
        background-color: #0056b3; /* Darker background on hover */
    }
    </style>
     <script>
        window.onload = function() {
            window.print();
        }
    </script>
</head>

<body>
    <div style="border:1px solid rgb(242, 99, 16); width: 100%; height: 500px;">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('saleded_receipt/nile.jpeg'))) }}" style="margin-top:2%; margin-left:40%;height:5%;width:15%;" ; alt="Nile">
        <p style="text-align:center; color:#496900; margin-top: 1px;"><b>T/2 3rd Floor, Parvati Smurti Appt., Yashwant Stadium, Nagpur.
            0712-2451116, 9325257764</b></p>
        <div style="padding-right:10px; padding-left:10px;">
            <hr>
        </div>

        <p><span style="margin-left:15px;">Receipt No.</span><b>:&nbsp;{{$expensedata->bill_no}}</b> <span style="margin-left:50%;">Date:
               <b> {{$expensedata->created_at->format('d-m-Y')}}</b></span></p>
        <p><span style="margin-left:16px;">Received with thanks from</span><span> &nbsp;<b><span style="text-decoration:underline; ">{{$data->clientsigle->name ?? ''}}</span></b></span></p>
        <p style="margin-left:16px;">   By Cash/Bank: <b>{{$expensedata->mode_of_payment}}</b></p>
        <p style="margin-left:16px;">  The sum of Rupee : <span style="text-decoration:underline;"><b>Rs. {{$amountInWords}} Only</b></span></p>
        <p style="margin-left:16px;">An Account of :<span style="text-decoration:underline;"><b>{{$expensedata->income_category}}</b> &nbsp;&nbsp;&nbsp;Project :&nbsp;&nbsp;&nbsp; <b>{{$data->project->project_name ?? ''}}</b></span></p>
        <p style="margin-left:16px;">Mauza :<span style="text-decoration:underline; "><b>{{$data->mauja}}</b> &nbsp;&nbsp;&nbsp; P.H.No. : <b>{{$data->phn}}</b> &nbsp;&nbsp;&nbsp; Kh. No. :<b>{{$data->kh_no}}</b> Plot No.: <b>{{$data->plotname->plot_no ?? ''}}</b>  </span></p>
    
        <div style="margin-left:5%;">
            <p style="border:1px solid rgb(7, 7, 7); width: 20%; height: 30px; text-align: center; padding-top: 2px; font-size: 16px;"><b>Rs. {{$expensedata->amount}} /-</b> <br><span ></span></p>
            <p style="font-size: 10px;"><b>* 35% of Total Paid Amount will be deducted.</b></p>
            <p style="font-size: 10px;"><b>* If 3 Instalment balance Your plot will be cancelled with out any intimation.</b></p>
        </div>
        <p style="margin-left:70%; font-size:18px;"><b>For Nile Properties</b></p>

    </div>
    <form action="{{ route('expense.income') }}" method="GET">
        @if(!isset($isPdf) || !$isPdf)
            <button type="submit" id="backButton" class="back-button">Back</button>
        @endif
    </form>
    
    <script>
        // Listen for the print dialog to open
        window.onbeforeprint = function() {
            // Hide the back button when print window opens
            document.getElementById('backButton').style.display = 'none';
        };
    
        // When the print dialog is closed, show the button again
        window.onafterprint = function() {
            document.getElementById('backButton').style.display = 'inline';
        };
    </script>
</body>

</html>