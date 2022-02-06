<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="w-3/5 mx-auto border my-3">
        <p class="p-0 m-0 text-2xl font-medium"><h1>Detail data Transaksi</h1></p>
        <hr>
        <div class="grid grid-cols-12">
            <div class="col-span-4 w-full">
                <div class="content">
                    <h3>Transaksi</h3>
                    <p class="p-0 m-0">Hash : {{ $transaction->slug }}</p>
                    <p class="p-0 m-0">Tanggal : {{ \Carbon\Carbon::parse($transaction->day_of_payment)->format('d/m/Y') }}</p>
                    <p class="p-0 m-0">Cost : {{ 'Rp.'.number_format($transaction->cost) }}</p>
                    <p class="p-0 m-0">Nominal : {{ 'Rp.'.number_format($transaction->nominal) }}</p>
                    <p class="p-0 m-0">Kembalian : {{ 'Rp.'.number_format($transaction->change) }}</p>
                </div>
            </div>
            <div class="col-span-4 w-full">
                <p class="p-0 m-0"><h3>Peminjam</h3></p>
                <p class="p-0 m-0">Nama : {{ $transaction->loan_report->user->name }}</p>
                <p class="p-0 m-0">Email : {{ $transaction->loan_report->user->email }}</p>
                <p class="p-0 m-0">Telp : {{ $transaction->loan_report->user->phone }}</p>
                <p class="p-0 m-0">Alamat : {{ $transaction->loan_report->user->address }}</p>
            </div>
            <div class="col-span-4 w-full">
                <p class="p-0 m-0"><h3>Pesan</h3></p>
                <p class="p-0 m-0">Jika kamu sudah mencapai h-1, persiapkan untuk mengembalikan buku tersebut ke perpustakaan kembali dan konfirmasilah ke admin!</p>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table" >
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Kode Rak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $transaction->loan_report->book->title }}</td>
                            <td>{{ $transaction->loan_report->type }}</td>
                            <td>{{ $transaction->status }}</td>
                            <td>{{ $transaction->loan_report->book->bookcase->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>