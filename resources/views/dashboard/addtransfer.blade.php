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
        <div class="content">
            <div class="input-group">
                <label for="recipientName">Recipient Name</label>
                <input type="text" id="recipientName" name="recipientName" placeholder="Enter recipient name" />
            </div>
            <div class="input-group">
                <label for="accountNumber">Account Number</label>
                <input type="text" id="accountNumber" name="accountNumber" placeholder="Enter account number" />
            </div>
            <div class="input-group">
                <label for="amount">Amount (Rp)</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount" />
            </div>
            <div class="input-group">
                <label for="note">Leave a note</label>
                <input type="text" id="note" name="note" placeholder="Enter a note" />
            </div>
            <button class="button" onclick="transfer()">Transfer</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = '/dashboard';
        }

        function transfer() {
            const recipientName = document.getElementById('recipientName').value;
            const accountNumber = document.getElementById('accountNumber').value;
            const amount = document.getElementById('amount').value;
            const note = document.getElementById('note').value;

            if (recipientName && accountNumber && amount) {
                // Simpan data ke local storage atau session storage
                localStorage.setItem('recipientName', recipientName);
                localStorage.setItem('accountNumber', accountNumber);
                localStorage.setItem('amount', amount);
                localStorage.setItem('note', note);

                // Redirect ke halaman /transfer
                window.location.href = '/transfer';
            } else {
                alert('Please fill in all fields');
            }
        }
    </script>
</body>
<script src="https://kit.fontawesome.com/03717f260b.js" crossorigin="anonymous"></script>

</html>
