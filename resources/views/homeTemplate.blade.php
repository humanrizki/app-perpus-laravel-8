@extends('layouts.capp')
@section('content')
    <div class="container-img" style="
        width: 100%; 
        height:max-content; 
        background-image:url('img/cn.png');
        background-repeat:no-repeat;
        background-size:100% 100%;
        ">
        <div class=" w-100 h-50">
            <div class="img-gambar mt-5 w-100 h-100">
                <img src="img/logo.png" class="gambar" alt="" >
            </div>
            
        </div>
        <div class="w-4/5 mx-auto h-100 p-3">
            <div class="flex justify-around flex-wrap">
                    <div class="block p-6 max-w-sm mt-2 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" >
                            <p class="text-md font-medium my-1">
                                Visi
                            </p>
                            <p class="text-sm font-medium">
                                Terwujudnya Sekolah Kejuruan yang Religius, Disiplin dan Terampil dalam Menyongsong Generasi Emas di tahun 2045
                            </p>
                            <p class="text-md font-medium my-1">
                                Misi
                            </p>
                            <ol class="list-disc list-inside font-medium text-sm">
                                <li>Mewujudkan Insan yang taat beribadah, cinta kepada kitab suci dan pandai dalam dakwah keagamaan</li>
                                <li>Mewujudkan peserta didik yang berperilaku baik, patuh, dan memiliki jiwa kepemimpinan</li>
                                <li>Mewujudkan peserta didik yang ahli sesuai dengan kejuruannya, sinkronisasi kurikulum intrakurikuler dengan ekstrakurikuler, dan pengembangan kerjasama dengan dunia industri.</li>
                            </ol>
                    </div>
                    <div class="block p-6 max-w-sm mt-2 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" >
                            <p class="text-md font-medium my-1">
                                Profil yayasan
                            </p>
                            <p class="text-sm font-medium">
                                Inovasi Yayasan Pendidikan At-Taqwa Kemiri Jaya dalam Pengembangan dan Peningkatan Mutu Pendidikan
                            </p>
                            <p class="text-md font-medium my-1">
                                PERENCANAAN :
                            </p>
                            <ol class="list-disc list-inside text-sm font-medium">
                                <li>Merencanakan pendidikan yang bermutu dengan bertumpu kepada Keimanan, Ketakwaan,
                                Ilmu pengetahuan, dan Teknologi.
                                </li>
                                <li>Memberdayakan berbagai komponen untuk mencapai prestasi maksimal dan memberdaya
                                kan siswa melalui pembentukan kompetensi.
                                </li>
                                <li>Menyediakan pendidikan yang ekonomis namun bermutu.</li>
                            </ol>
                            <p class="text-sm my-2 font-medium">
                                Ketua Yayasan Pendidikan At-Taqwa Kemiri Jaya<br>
                                Drs. H. Nasan, MM
                            </p>
                    </div>
            </div>
        </div>
    </div>
@endsection