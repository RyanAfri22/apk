<!DOCTYPE html>
<html>

<head>
    <title>Pembayaran Asuransi Berhasil</title>
</head>

<body>
    <h1>Pembayaran Asuransi Berhasil</h1>
    <p>Transaksi Anda telah berhasil dengan detail sebagai berikut:</p>
    <ul>
        @foreach ($dataInsurances as $item)
            <li>ID Transaksi: {{ $item->payment_id }}</li>
            <li>Nama Asuransi: {{ $item->insurance->name }}</li>
            <li>Nomor Polis: {{ $item->policy_number }}</li>
            <li>Jumlah: Rp {{ number_format($item->amount, 2, ',', '.') }}</li>
            <li>Tanggal: {{ $item->created_at }}</li>
        @endforeach
    </ul>
    <p>Terima kasih telah menggunakan layanan kami.</p>
</body>

</html>
