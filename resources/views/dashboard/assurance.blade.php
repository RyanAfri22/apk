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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .back-icon {
            font-size: 24px;
            cursor: pointer;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #f57c00;
            color: #ffffff;
            padding: 10px 20px;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .button {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            color: #ffffff;
            background-color: #f57c00;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
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
                <label for="recipientName">Nama</label>
                <input type="text" id="recipientName" name="recipientName" placeholder="Masukkan Nama Anda" />
            </div>
            <div class="input-group">
                <label for="accountNumber">No Rekening</label>
                <input type="text" id="accountNumber" name="accountNumber" placeholder="Masukkan Nomor Rekening" />
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Masukkan Email" />
            </div>
            <div class="input-group">
                <label for="nope">No Hp</label>
                <input type="text" id="nope" name="nope" placeholder="Masukkan No Hp" />
            </div>
            <div class="input-group">
                <label for="amount">Amount (Rp)</label>
                <input type="number" id="amount" name="amount" placeholder="Masukkan Nominal Pembayaran" />
            </div>
            <div class="input-group">
                <label for="note">Leave a note</label>
                <input type="text" id="note" name="note" placeholder="Masukkan Catatan" />
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
            const email = document.getElementById('email').value;
            const nope = document.getElementById('nope').value;
            const amount = document.getElementById('amount').value;
            const note = document.getElementById('note').value;

            if (recipientName && accountNumber && email && nope && amount) {
                // Simpan data ke local storage atau session storage
                localStorage.setItem('recipientName', recipientName);
                localStorage.setItem('accountNumber', accountNumber);
                localStorage.setItem('email', email);
                localStorage.setItem('nope', nope);
                localStorage.setItem('amount', amount);
                localStorage.setItem('note', note);

                alert('Pembayaran sukses');
                window.location.href = '/dashboard';
            } else {
                alert('Please fill in all fields'); //abc
            }
        }
    </script>
</body>
<script src="https://kit.fontawesome.com/03717f260b.js" crossorigin="anonymous"></script>

</html>
