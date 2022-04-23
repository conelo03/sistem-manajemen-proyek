<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        .page-break {
            page-break-after: always;
        }
    </style>
    <style type="text/css">
        #footer {
          position: fixed;
          left: 0;
            right: 0;
            color: #aaa;
            font-size: 0.9em;
        }

        #footer {
          bottom: 0;
          border-top: 0.1pt solid #aaa;
        }

        .page-number {
          text-align: center;
        }

        .page-number:before {
          content: counter(page);
        }
/*        .page-number:before {
          content: "Page " counter(page);
        }*/
    </style>
</head>
<body>
    <div id="footer">
        <div class="page-number"></div>
    </div>
    <div class="container mt-0">
        <div class="mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-left: 50px;margin-right: 50px">
                        <div class="card-body">
                            
                            <table class="" border="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td class="text-center" width="25%"><img src="<?= base_url('assets/img/inti.PNG') ?>" style="width: 100px;"></td>
                                        <td class="text-center" width="50%"><p><b>BERITA ACARA PROGRESS PEKERJAAN</b></p><p><b>TAHAP : .....................................</b></p></td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr style="border: 1px solid black; margin-top: 0px;">
                            <table class="" border="0" width="100%">
                                <tr>
                                    <td class="text-center" colspan="2"><b>Nomor : /PI...../BAPP/&nbsp;&nbsp;/2022</b></td>
                                </tr>
                            </table>
                            <br>
                            <table class="" border="0" width="100%">
                                <tr>
                                    <td colspan="2">Pada <?= tanggal(date('Y-m-d')) ?>, kami yang bertanda tangan di bawah ini :</td>
                                </tr>
                            </table>
                            <br>
                            <table class="" border="0" width="100%">
                                <tr>
                                    <td width="2%" style="vertical-align: text-top;"><b>I.</b></td>
                                    <td width="15%" style="vertical-align: text-top;"><b>INTI</b></td>
                                    <td width="2%" style="vertical-align: text-top;">:</td>
                                    <td colspan="4"><b>PT. INDUSTRI TELEKOMUNIKASI INDONESIA (Persero)</b>, berkedudukan di jalan Mochamand Toha 77 Bandung, dalam hal ini diwakili oleh :</td>
                                </tr>
                                <tr>
                                    <td width="2%"></td>
                                    <td width="15%"></td>
                                    <td width="2%" style="vertical-align: text-top;">a. </td>
                                    <td width="">Nama</td>
                                    <td width="">:</td>
                                    <td width="30%"></td>
                                    <td width="40%">, <b>Sebagai Penerima Pekerjaan</b></td>
                                </tr>
                                <tr>
                                    <td width="2%"></td>
                                    <td width="15%"></td>
                                    <td width="2%" style="vertical-align: text-top;"></td>
                                    <td width="">Jabatan</td>
                                    <td width="">:</td>
                                    <td width="30%"></td>
                                    <td width="40%"></td>
                                </tr>   
                            </table>
                            <table class="" border="0" width="100%">
                                <tr>
                                    <td width="2%" style="vertical-align: text-top;"><b>II.</b></td>
                                    <td width="15%" style="vertical-align: text-top;"><b>MITRA</b></td>
                                    <td width="2%" style="vertical-align: text-top;">:</td>
                                    <td colspan="4"><b>PT. ...................................................</b>, berkedudukan di .................................., dalam hal ini diwakili oleh :</td>
                                </tr>
                                <tr>
                                    <td width="2%"></td>
                                    <td width="15%"></td>
                                    <td width="2%" style="vertical-align: text-top;">a. </td>
                                    <td width="">Nama</td>
                                    <td width="">:</td>
                                    <td width="30%"></td>
                                    <td width="40%">, <b>Sebagai Penyedia Jasa</b></td>
                                </tr>
                                <tr>
                                    <td width="2%"></td>
                                    <td width="15%"></td>
                                    <td width="2%" style="vertical-align: text-top;"></td>
                                    <td width="">Jabatan</td>
                                    <td width="">:</td>
                                    <td width="30%"></td>
                                    <td width="40%"></td>
                                </tr>   
                            </table>
                            <br>
                            <table class="" border="0" width="100%">
                                <tr>
                                    <td colspan="5">Berdasarkan Kepada : </td>
                                </tr>
                                <tr>
                                    <td width="2%">1. </td>
                                    <td width="25%">NO. KONTRAK</td>
                                    <td width="2%">:</td>
                                    <td width="35%">.......................................................</td>
                                    <td>Tgl : ............................................</td>
                                </tr>
                                <tr>
                                    <td width="2%">2. </td>
                                    <td width="25%">Nomor Purchase Order</td>
                                    <td width="2%">:</td>
                                    <td width="35%">.......................................................</td>
                                    <td>Tgl : ............................................</td>
                                </tr>
                                <tr>
                                    <td width="2%">3. </td>
                                    <td width="25%">Nomor Surat MITRA</td>
                                    <td width="2%">:</td>
                                    <td width="35%">.......................................................</td>
                                    <td>Tgl : ............................................</td>
                                </tr>
                            </table>
                            <br>
                            <table class="" border="0" width="100%">
                                <tr>
                                    <td>Dengan ini Para Pihak menyatakan sebagai berikut : </td>
                                </tr>
                                <tr>
                                    <td class="text-justify"><b>INTI</b> dengan disaksikan <b>MITRA</b> telah melakukan pemeriksaan/pengujian dan Penerima Progress Pekerjaan Tahap : ......................... yang telah dilaksanakan oleh <b>MITRA</b> dengan hasil (BAIK DAN DAPAT DITERIMA / TIDAK DAPAT DITERIMA)* rincian hasil pemeriksaan /Pengujian yang tercantum pada lampiran BAPP ini. Berdasarkan BAPP ini <b>MITRA</b> dapat melaksanakan penagihan pekerjaan Tahap : .........................</td>
                                </tr>
                            </table>
                            <br>
                            <table class="" border="0" width="100%">
                                <tr>
                                    <td class="text-justify">Demikian Berita Acara Progress Pekerjaan ini dibuat dalam rangkap 2 (dua) asli yang masing-masing mempunyai kekuatan hukum yang sama setelah ditandatangani dan dibubuhi cap perusahaan oleh kedua belah pihak untuk dapat dipergunakan sebagaimana mestinya.</td>
                                </tr>
                            </table>
                            <br/>
                            <table class="" border="0" width="100%">
                                
                                <tr>
                                    <td class="text-center" width="35%">
                                        a.n. INTI,
                                        <br/><br/><br/><br/><br/><br/>
                                        <u>....................................</u><br>
                                        JABATAN
                                    </td>
                                    <td class="text-center" width="30%"></td>
                                    <td class="text-center" width="35%">
                                        a.n. MITRA,
                                        <br/><br/><br/><br/><br/><br/>
                                        <u>....................................</u><br>
                                        JABATAN
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-break"></div>
    <div class="container mt-2">
        <div class="mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="" border="0" width="100%">
                                <tr>
                                    <td colspan="3">Berdasarkan Kepada : </td>
                                </tr>
                                <tr>
                                    <td width="2%">1. </td>
                                    <td width="30%">BAPP Nomor</td>
                                    <td width="">:</td>
                                </tr>
                                <tr>
                                    <td width="2%">2. </td>
                                    <td width="30%">PROJECT ID</td>
                                    <td width="">:</td>
                                </tr>
                            </table>
                            <br>
                            <!--<table class="table table-striped table-bordered">-->
                            <table class="" border="1" width="100%">
                                <thead>                                  
                                    <tr>
                                        <th class="text-center" style="width: 20px;font-size: 8pt;">NO</th>
                                        <th class="text-center" style="width: 17%;font-size: 8pt;">SOW (Scope of Work)(Bobot%)</th>
                                        <th class="text-center" style="width: 17%;font-size: 8pt;">Deadline</th>
                                        <th class="text-center" style="width: 17%;font-size: 8pt;">Realisasi (Tanggal)</th>
                                        <th class="text-center" style="width: 17%;font-size: 8pt;">Hasil</th>
                                        <th class="text-center" style="width: 17%;font-size: 8pt;">RKAP</th>
                                        <th class="text-center" style="width: 17%;font-size: 8pt;">Realisasi (Anggaran)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($activities): ?>
                                        <?php 
                                        $no = 1; 
                                        $total=0;
                                        foreach($activities as $i):
                                           ?>
                                        
                                        <tr>
                                            <td class="text-center" style="font-size: 8pt;"><?= $no++;?></td>
                                            <td class="text-center" style="font-size: 8pt;"><?= $i['bobot'];?>%</td>
                                            <td class="text-center" style="font-size: 8pt;"><?= $i['date_plan_end'];?></td>
                                            <td class="text-center" style="font-size: 8pt;"><?= $i['date_end'];?></td>
                                            <td class="" style="font-size: 8pt;"></td>
                                            <td class="text-right" style="font-size: 8pt;">Rp <?= number_format($i['budget_planning'], 0, '.', '.');?></td>
                                            <td class="text-right" style="font-size: 8pt;"></td>
                                        </tr>
     
                                        <?php endforeach;?>
                                    <?php else: ?>
                                        <tr>
                                            <td class="bg-light" colspan="5">Tidak ada data.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    function finish($tanggal){
        $day =  date('D', strtotime($tanggal));
        $hari = '';
        switch ($day) {
            case 'Sun':
                $hari = 'Sunday';
                break;
            case 'Mon':
                $hari = 'Monday';
                break;
            case 'Tue':
                $hari = 'Tuesday';
                break;
            case 'Wed':
                $hari = 'Wednesday';
                break;
            case 'Thu':
                $hari = 'Thursday';
                break;
            case 'Fri':
                $hari = 'Friday';
                break;
            case 'Sat':
                $hari = 'Saturday';
                break;
            default:
                $hari = 'hari error';
                break;
        }
        $full = $hari.', '.date('F d, Y', strtotime($tanggal));
        return $full;
    }

    function tanggal($tanggal){
        $day =  date('D', strtotime($tanggal));
        $bulan =  date('F', strtotime($tanggal));
        $hari = '';
        switch ($day) {
            case 'Sun':
                $hari = 'Minggu';
                break;
            case 'Mon':
                $hari = 'Senin';
                break;
            case 'Tue':
                $hari = 'Selasa';
                break;
            case 'Wed':
                $hari = 'Rabu';
                break;
            case 'Thu':
                $hari = 'Kamis';
                break;
            case 'Fri':
                $hari = 'Jumat';
                break;
            case 'Sat':
                $hari = 'Sabtu';
                break;
            default:
                $hari = 'hari error';
                break;
        }

        switch ($bulan) {
          case 'January':
            $bulan= "Januari";
            break;
          case 'February':
            $bulan= "Februari";
            break;
          case 'March':
            $bulan= "Maret";
            break;
          case 'April':
            $bulan= "April";
            break;
          case 'May':
            $bulan= "Mei";
            break;
          case 'June':
            $bulan= "Juni";
            break;
          case 'July':
            $bulan= "Juli";
            break;
          case 'August':
            $bulan= "Agustus";
            break;
          case 'September':
            $bulan= "September";
            break;
          case 'October':
            $bulan= "Oktober";
            break;
          case 'November':
            $bulan= "November";
            break;
          case 'December':
            $bulan= "Desember";
            break;
          default:
            $bulan= "Isi variabel tidak di temukan";
            break;
        }

        $full = 'Pada Hari '.$hari.' Tanggal '.date('d', strtotime($tanggal)).' Bulan '.$bulan.' Tahun '.date('Y', strtotime($tanggal));
        return $full;
    }

    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai))." RUPIAH";
        } else {
            $hasil = trim(penyebut($nilai))." RUPIAH";
        }           
        return $hasil;
    }

    ?>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
