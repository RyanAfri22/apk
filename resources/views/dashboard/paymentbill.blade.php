@php
    use Carbon\Carbon;

    //get current time + 5 hours
    $currentDateTime = now();
    $dateTimePlusFiveHours = $currentDateTime->copy()->addHours(5);

    //get first url
    $currentUrl = url()->current();
    $path = parse_url($currentUrl, PHP_URL_PATH);
    $segments = explode('/', trim($path, '/'));
    $firstSegment = $segments[0] ?? null;
    $route = $firstSegment === 'assurance' ? '/assurance' : '/addtransfer';

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link rel="stylesheet" href="/css/paymentbill.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container">
        <header>
            <i class="fas fa-arrow-left back-icon" onclick="window.location.href='{{ $route }}'"></i>
            <h2>Payment</h2>
        </header>
        @if (session()->has('transferData'))
            <form action="/transfer/paymentbill/transactionsuccess" method="POST">
                @csrf
                <section class="payment-details">

                    <h2>Payment details</h2>
                    <div class="detail">
                        <span class="label">Transfer To</span>
                        <span class="value">{{ session('transferData')['recipientName'] }}</span>
                        <input type="hidden" name="" id="">
                    </div>
                    <div class="detail">
                        <span class="label">Amount To Pay</span>
                        <span class="value">Rp
                            {{ number_format(session('transferData')['amount'], 2, ',', '.') }}</span>
                    </div>
                    <div class="detail">
                        <span class="label">After Tax</span>
                        <span class="value">Rp
                            {{ number_format(session('transferData')['amount'] + 5000, 2, ',', '.') }}</span>
                    </div>
                    <div class="detail">
                        <span class="label">Transfer before</span>
                        <span class="value">{{ $dateTimePlusFiveHours }}</span>
                    </div>
                    <div class="total">
                        <span>Total</span>
                        <span>Rp {{ number_format(session('transferData')['amount'] + 5000, 2, ',', '.') }}</span>
                    </div>
                    <div class="buttons">
                        <button id="cancelButton" onclick="window.location.href='{{ $route }}'">Cancel</button>
                        <button class="text-white" type="submit" style="background-color: #ff7f00">Confirm</button>
                    </div>

                </section>
            </form>
        @elseif (session()->has('insuranceData'))
            <form action="/assurance/paymentbill/transactionsuccess" method="POST">
                @csrf
                <section class="payment-details">
                    <h2>Payment details</h2>
                    <div class="detail">
                        <span class="label">Transfer To</span>
                        <span class="value">{{ session('insuranceData')['insurance_name'] }}</span>
                    </div>
                    <div class="detail">
                        <span class="label">Policy Number</span>
                        <span class="value">{{ session('insuranceData')['policy_number'] }}</span>
                    </div>
                    <div class="detail">
                        <span class="label">Amount To Pay</span>
                        <span class="value">Rp
                            {{ number_format(session('insuranceData')['insurance_cost'], 2, ',', '.') }}</span>
                    </div>
                    <div class="detail">
                        <span class="label">After Tax</span>
                        <span class="value">Rp
                            {{ number_format(session('insuranceData')['insurance_cost'] + 5000, 2, ',', '.') }}</span>
                    </div>
                    <div class="detail">
                        <span class="label">Transfer before</span>
                        <span class="value">{{ $dateTimePlusFiveHours }}</span>
                    </div>
                    <div class="total">
                        <span>Total</span>
                        <span>Rp
                            {{ number_format(session('insuranceData')['insurance_cost'] + 5000, 2, ',', '.') }}</span>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger my-3">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="buttons">
                        <button type="button" onclick="window.location.href='{{ $route }}'">Cancel</button>
                        <button class="text-white" type="submit" style="background-color: #ff7f00">Confirm</button>
                    </div>

                </section>
            </form>
        @else
            <section class="payment-details">
                <div class="text-center">

                    <div>No data, please add data transfer first</div>
                    <button class="transfer-button mt-3" onclick="window.location.href='{{ $route }}'">Add
                        Data</button>
                </div>
            </section>
        @endif

    </div>
    <script>
        function goBack() {
            window.location.href = '/transfer';
        }

        function goBackAssurance() {
            window.location.href = '/assurance';
        }
    </script>
    <script src="/js/paymentbill.js"></script>
</body>

</html>
