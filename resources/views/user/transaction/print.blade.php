<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="alert-1" class="flex mt-2 mb-2 w-3/5 mx-auto p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                Klik ctrl+p atau klik kanan pada mouse dan pilih cetak. Jika sudah, pilih tata letak menjadi landscape / lanskap dan pilih warna untuk warna. Setelahnya ke setelan lanjutan ubas skala ke option sesuaikan dan atur dengan skala 96. Centng Menu "Option" / "Opsi", centang pada "header dan footer" dan "Grafis latar belakang". Lalu cetak!
            </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <div class="w-3/5 mx-auto border my-3">
        <h1 class="font-medium text-2xl p-2">Detail data Transaksi</h1>
        <hr>
        <div class="grid grid-cols-12 gap-x-3 p-3">
            <div class="col-span-4 w-full">
                <div class="content">
                    <h3 class="text-1xl font-medium">Transaksi</h3>
                    <p class="p-0 m-0">Hash : {{ $transaction->slug }}</p>
                    <p class="p-0 m-0">Tanggal : {{ \Carbon\Carbon::parse($transaction->day_of_payment)->format('d/m/Y') }}</p>
                    <p class="p-0 m-0">Cost : {{ 'Rp.'.number_format($transaction->cost) }}</p>
                    <p class="p-0 m-0">Nominal : {{ 'Rp.'.number_format($transaction->nominal) }}</p>
                    <p class="p-0 m-0">Kembalian : {{ 'Rp.'.number_format($transaction->change) }}</p>
                </div>
            </div>
            <div class="col-span-4 w-full">
                <p class="p-0 m-0"><h3 class="text-1xl font-medium">Peminjam</h3></p>
                <p class="p-0 m-0">Nama : {{ $transaction->loan_report->user->name }}</p>
                <p class="p-0 m-0">Email : {{ $transaction->loan_report->user->email }}</p>
                <p class="p-0 m-0">Telp : {{ $transaction->loan_report->user->phone }}</p>
                <p class="p-0 m-0">Kelas : {{ $transaction->loan_report->user->detail_class_department->class_user->class.' '.$transaction->loan_report->user->detail_class_department->department->department }}</p>
                <p class="p-0 m-0">Alamat : {{ $transaction->loan_report->user->address }}</p>
            </div>
            <div class="col-span-4 w-full">
                <p class="p-0 m-0"><h3 class="text-1xl font-medium">Pesan</h3></p>
                <p class="p-0 m-0">Jika kamu sudah mencapai h-1, persiapkan untuk mengembalikan buku tersebut ke perpustakaan kembali dan konfirmasilah ke admin!</p>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table w-full" >
                    <thead>
                        <tr>
                            <th class="p-2 bg-emerald-300 border">Title</th>
                            <th class="p-2 bg-emerald-300 border">Type</th>
                            <th class="p-2 bg-emerald-300 border">Status</th>
                            <th class="p-2 bg-emerald-300 border">Kode Rak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 bg-neutral-50 border">{{ $transaction->loan_report->book->title }}</td>
                            <td class="p-2 bg-neutral-50 border">{{ $transaction->loan_report->type }}</td>
                            <td class="p-2 bg-neutral-50 border">{{ $transaction->status }}</td>
                            <td class="p-2 bg-neutral-50 border">{{ $transaction->loan_report->book->bookcase->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
</body>
</html>