<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/profile.css">
</head>

<body>
    <div class="account-container">
        <div class="header">
            <i class="fas fa-arrow-left back-icon" onclick="goBack()"></i>
            <div class="header-title">Akun</div>
        </div>
        <div class="profile">
            <div><img class="profile-pic" src="img/logo.png" alt=""></div>
            <div class="profile-name">{{ Auth::user()->username }}</div>
        </div>
        <div class="options">
            <div class="option">
                <span>Data Anda Akan Terlihat Disini</span>
            </div>
            <div class="option">
                <span>Pembaruan Data</span>
            </div>
            <div class="info">
                <span>Balance</span>
                <span>{{ number_format(Auth::user()->accounts->first()->balance, 2, ',', '.') }}</span>
            </div>
            <div class="info">
                <span>Alamat Email</span>
                <span>{{ Auth::user()->email }}</span>
            </div>
            <div class="info">
                <span>Perangkat Terhubung</span>
                <span>iPhone 11</span>
            </div>
            <div class="info">
                <span>Versi Aplikasi</span>
                <span>2.61.0</span>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.location.href = '/dashboard';
        }
    </script>
    <script src="script.js"></script>
</body>

</html>
