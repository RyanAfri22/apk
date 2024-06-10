@extends('template.v_template')
@section('content')
    <header>
        <div class="header-left">
            <img src="img/logo.png" alt="" class="small-logo"> Assurance.Pay
        </div>

        <div class="header-right d-flex align-items-center">
            <i class="fas fa-bell"></i>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn text-white">
                    <i class="fas fa-sign-out"></i> Logout
                </button>
            </form>
        </div>
    </header>

    <div class="balance-card mt-5">
        <div class="balance-text">Hello, {{ Auth::user()->username }}</div>
        <div class="balance-text">Balance Rp {{ number_format(Auth::user()->accounts->first()->balance, 2, ',', '.') }}
        </div>
        {{-- <div class="coin-reward">Coin Reward 5.400</div> --}}
        <div class="top-buttons">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-default-topup">
                <i class="fa-solid fa-plus" style="color: #FFD43B;"></i>
                Top Up
            </button>
            <button class="btn btn-warning" onclick="window.location.href='/addtransfer'">
                <i class="fa-solid fa-paper-plane" style="color: #FFD43B;"></i>
                Transfer
            </button>
        </div>
    </div>

    <div class="search-bar">
        <input type="text" placeholder="Enter your name">
    </div>

    <div class="payment-list">
        <button class="btn">
            <i class="fa-solid fa-file-invoice" style="color: #FFD43B;"></i>
            Assurance
        </button>
        <button class="btn" onclick="window.location.href='/assurance'">
            <i class="fa-solid fa-notes-medical" style="color: #ed1d1d;"></i>
            Assurance Payment
        </button>
        <button class="btn" data-bs-toggle="modal" data-bs-target="#modal-default-withdraw">
            <i class="fa-solid fa-money-bill-wave" style="color: #63E6BE;"></i>
            Withdraw
        </button>
    </div>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    {{-- Modal Topup --}}
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-default-topup" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/topup" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Top Up</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Jumlah Top Up</label>
                            <input name="topup" type="number" class="form-control" placeholder="Masukkan Jumlah Top Up"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Top Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Withdraw --}}
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-default-withdraw" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/withdraw" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Withdraw</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Jumlah Withdraw</label>
                            <input name="withdraw" type="number" class="form-control"
                                placeholder="Masukkan Jumlah Withdraw" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Withdraw</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
