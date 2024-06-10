<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/success.css">
</head>

<body>
    <div class="header-container">
        <header class="d-flex align-items-center justify-content-between">
            <i class="fas fa-arrow-left back-icon" style="color: #ffffff;" onclick="goBack()"></i>
            <h1>Payment Receipt</h1>
        </header>
    </div>
    <div class="container">

        @if (isset($dataTransactions))
            @foreach ($dataTransactions as $item)
                <div class="receipt">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2>Transaction Success!</h2>
                    <p>{{ now() }}</p>
                    <h3>Rp {{ number_format($item->amount, 2, ',', '.') }}</h3>
                    <div class="details">
                        <div class="detail-item">
                            <span class="label">Recipient</span>
                            <span class="value">{{ $item->receiver_name }}</span>
                        </div>
                        {{-- <div class="detail-item">
            <span class="label">Bank Destination</span>
            <span class="value">BCA</span>
        </div> --}}
                        <div class="detail-item">
                            <span class="label">Account Number</span>
                            <span class="value">{{ $item->receiver_account_number }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Transaction ID</span>
                            <span class="value">{{ $item->transaction_id }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Note</span>
                            @if (empty($item->note))
                                <span class="value">No note</span>
                            @else
                                <span class="value">{{ $item->note }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="action-buttons">
        <button class="btn btn-link" id="downloadButton"><i class="fas fa-download"></i> Download</button>
        <button class="btn btn-link" id="shareButton"><i class="fas fa-share"></i> Share</button>
    </div> --}}
                    <button class="btn btn-primary w-100" id="doneButton"
                        onclick="window.location.href='/dashboard'">Done</button>
                </div>
            @endforeach
        @else
            @foreach ($dataInsurance as $item)
                <div class="receipt">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2>Transaction Success!</h2>
                    <p>{{ now() }}</p>
                    <h3>Rp {{ number_format($item->amount, 2, ',', '.') }}</h3>
                    <div class="details">
                        <div class="detail-item">
                            <span class="label">Recipient</span>
                            <span class="value">{{ $item->insurance->name }}</span>
                        </div>
                        {{-- <div class="detail-item">
            <span class="label">Bank Destination</span>
            <span class="value">BCA</span>
        </div> --}}
                        <div class="detail-item">
                            <span class="label">Policy Number</span>
                            <span class="value">{{ $item->policy_number }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Transaction ID</span>
                            <span class="value">{{ $item->payment_id }}</span>
                        </div>
                    </div>
                    {{-- <div class="action-buttons">
        <button class="btn btn-link" id="downloadButton"><i class="fas fa-download"></i> Download</button>
        <button class="btn btn-link" id="shareButton"><i class="fas fa-share"></i> Share</button>
    </div> --}}
                    <button class="btn btn-primary w-100" id="doneButton"
                        onclick="window.location.href='/dashboard'">Done</button>
                </div>
            @endforeach
        @endif
    </div>
</body>

</html>
