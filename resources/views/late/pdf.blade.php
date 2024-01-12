<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan</title>
    <style>
        .size {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .left .wakil {
            padding-bottom: 120px
        }

        .right .wakil2 {
            padding-bottom: 100px
        }
    </style>
</head>

<body>
    <div class="size">
        <center>
            <h3>Surat Pernyataan <br>
                Tidak Akan Datang Terlambat ke Sekolah</h3>
        </center>
        <p>Yang bertanda tangan dibawah ini : </p>
        <p>NIS : {{ $student->nis }}</p>
        <p>Nama : {{ $student->name }}</p>
        <p>Rombel : {{ $student->rombelid->rombel }}</p>
        <p>Rayon : {{ $student->rayonid->rayon }}</p>
        <br>
        <p>
            Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke
            sekolah sebanyak <b>
                {{ $count }} Kali</b> yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan.
            Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi
            saya siap diberikan
            sanksi yang sesuai dengan peraturan sekolah. <br><br>

            Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan.</p>
        <div class="left">
            <p> </p>
            <p class="wakil">Peserta Didik</p>
            <p>( {{ $student->name }} )</p>
            <br>
            <p class="wakil">Pembimbing Siswa</p>
            <p>( PS {{ $student->rombelid->rombel }} )</p>
        </div>

        <div class="right">
            <p>Bogor, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p class="wakil2">Orang Tua/wali Peserta Didik</p>
            <p>( ....................... )</p>
            <br>
            <p class="wakil2">Kesiswaan</p>
            <p>( ....................... )</p>
        </div>
    </div>
</body>

</html>
