<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/transfer.css">
</head>

<body>
    <header>
        <i class="fas fa-arrow-left back-icon" onclick="goBack()"></i>
        <h2>Transfer</h2>
        <div></div>
    </header>
    <div class="container">
        @if (session('transferData') != null)
            <div class="recipient-card">
                <h5>Send to :</h5>
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-circle fa-3x" style="color: #00aaff;"></i>
                    <div class="ms-3 mt-3">
                        <h5>{{ session('transferData')['recipientName'] }}</h5>
                        <p>{{ session('transferData')['accountNumber'] }}</p>
                    </div>
                </div>
            </div>

            <div class="amount-card">
                <h5>Enter your amount</h5>
                <input class="mb-3" type="text" id="amount"
                    value="Rp {{ number_format(session('transferData')['amount'], 2, ',', '.') }}" readonly>
                <textarea id="note" placeholder="No note" rows="3" readonly>{{ session('transferData')['note'] }}</textarea>
            </div>

            {{-- <div class="method-card position-relative">
            <h5>Select top up method</h5>
            <div class="d-flex align-items-center">
                <i class="fab fa-cc-mastercard fa-3x" style="color: #ff5f00;"></i>
                <div class="ms-3">
                    <h5>Master Card</h5>
                    <p>Ending card 7658</p>
                </div>
            </div>
            <i class="fas fa-pen edit-icon"></i>
        </div> --}}

            <button class="transfer-button" onclick="window.location.href='/transfer/paymentbill'">
                Transfer Rp {{ number_format(session('transferData')['amount'], 2, ',', '.') }}
                <i class="fas fa-solid fa-paper-plane" style="color: #ffffff; margin-left:10px"></i>
            </button>
        @else
            <div class="text-center">No data, please add data transfer first</div>
            <button class="transfer-button mt-3" onclick="window.location.href='/addtransfer'">Add Data</button>
        @endif
    </div>

    <script>
        function goBack() {
            window.location.href = '/addtransfer';
        }
    </script>
</body>
<script src="https://kit.fontawesome.com/03717f260b.js" crossorigin="anonymous"></script>

</html>
