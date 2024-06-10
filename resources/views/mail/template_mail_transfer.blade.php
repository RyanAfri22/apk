<!DOCTYPE html>
<html>

<head>
    <title>Transfer Berhasil</title>
</head>

<body>
    <h1>Transfer Berhasil</h1>
    <p>Transaksi Anda telah berhasil dengan detail sebagai berikut:</p>
    <ul>
        @foreach ($dataTransactions as $transaction)
            <li>ID Transaksi: {{ $transaction->transaction_id }}</li>
            <li>Nama Penerima: {{ $transaction->receiver_name }}</li>
            <li>Nomor Rekening Penerima: {{ $transaction->receiver_account_number }}</li>
            <li>Jumlah: Rp {{ number_format($transaction->amount, 2, ',', '.') }}</li>
            <li>Catatan: {{ $transaction->note }}</li>
            <li>Tanggal: {{ $transaction->created_at }}</li>
        @endforeach
    </ul>
    <p>Terima kasih telah menggunakan layanan kami.</p>
</body>

</html>
