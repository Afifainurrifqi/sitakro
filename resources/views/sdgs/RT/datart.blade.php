@extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            @if (session('msg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil</strong> {{ session('msg') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <h2 class="card-title">DATA RT</h2>
                            <div class="form-group">
                                <label for="search_nik">Cari berdasarkan NIK:</label>
                                <input type="text" id="search_nik" class="form-control" placeholder="Masukkan NIK">
                            </div>
                            <button type="button" class="btn mb-1 btn-primary"
                                onclick="window.location='{{ route('datart.create') }}'">
                                Tambah Data RT<span class="btn-icon-right"><i class="fa fa-plus-circle"></i></span>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tabledatart">
                                <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tr>
                                        <th rowspan="2">Action</th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NIK</th>
                                        <th rowspan="2">NAMA KETUA RT</th>
                                        <th rowspan="2">ALAMAT</th>
                                        <th rowspan="2">RT</th>
                                        <th rowspan="2">RW</th>
                                        <th rowspan="2">NO. HP / TELEPON</th>
                                        <th rowspan="2">LOKASI RT TERLETAK DI PULAU</th>
                                        <th rowspan="2">TOPOGRAFI TERLUAS WILAYAH RT</th>
                                        <th rowspan="2">JUMLAH WARGA DI LERENG / PUNCAK</th>
                                        <th rowspan="2">PENANAMAN / PEMELIHARAAN PEPOHONAN DI LAHAN KRITIS</th>
                                        <th rowspan="2">PANJANG GARIS PANTAI</th>
                                        <th rowspan="2">PEMANFAATAN LAUT PERIKANAN TANGKAP</th>
                                        <th rowspan="2">PEMANFAATAN LAUT PERIKANAN BUDIDAYA</th>
                                        <th rowspan="2">PEMANFAATAN LAUT TAMBAK GARAM</th>
                                        <th rowspan="2">PEMANFAATAN LAUT WISATA BAHARI</th>
                                        <th rowspan="2">PEMANFAATAN LAUT TRANSPORTASI UMUM</th>
                                        <th rowspan="2">KONDISI MANGROVE</th>
                                        <th rowspan="2">PENANAMAN MANGROVE</th>
                                        <th rowspan="2">JUMLAH WARGA DI WILAYAH PESISIR</th>
                                        <th rowspan="2">JUMLAH WARGA TINGGAL DI ATAS AIR</th>
                                        <th rowspan="2">WILAYAH DESA DI DALAM HUTAN (ha)</th>
                                        <th rowspan="2">WILAYAH DESA DI TEPI HUTAN (ha)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">FUNGSI
                                            HUTAN</th>
                                        <th rowspan="2">JUMLAH WARGA YANG TINGGAL DI DALAM HUTAN</th>
                                        <th rowspan="2">JUMLAH WARGA YANG TINGGAL DI SEKITAR HUTAN</th>
                                        <th rowspan="2">KETERGANTUNGAN WARGA TERHADAP HUTAN</th>
                                        <th rowspan="2">REBOISASI (PENGHIJAUAN) HUTAN</th>
                                        <th rowspan="2">JUMLAH PENDUDUK LUAR DESA YANG MASUK DAN MENETAP DI DESA SETAHUN
                                            TERAKHIR</th>
                                        <th rowspan="2">JUMLAH PENDUDUK YANG KELUAR DARI DESA SETAHUN TERAKHIR</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KETUA RW
                                        </th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SEKRETARIS
                                            RW</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BENDAHARA
                                            RW</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KETUA RT
                                        </th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SEKRETARIS
                                            RT</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BENDAHARA
                                            RT</th>

                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">AGEN
                                            PENGERAHAN TKI KE LUAR NEGERI</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH TATA
                                            RUANG INDUSTRI</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEBERADAAN
                                            PUB/DISKOTIK/TEMPAT KARAOKE</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PANGKALAN
                                            MINYAK TANAH DAN LPG</th>
                                        <th colspan="8"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH
                                            KEBERADAAN KOPERASI</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KIOS SARANA
                                            PRODUKSI PETANI/NELAYAN</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Barang dari Kulit (Tas, Sepatu, Sandal, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Barang dari Kayu (Meja, Kursi, Lemari, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Barang dari Logam Mulia atau bahan Logam (Perabot, Perhiasan, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Logam Berat</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Barang dari Kain (Tenun, Konveksi, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            gerabah/keramik/batu (porselen, keramik, tegel, dll)</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Genteng dan Batu Bata</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            Anyaman dari Rotan / Bambu / Rumput / Pandan, dll</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            makanan dan minuman</th>
                                        <th colspan="4"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">Industri
                                            lainnya, tuliskan di bawah</th>

                                        <th colspan="4">Kelompok Pertokoan</th>
                                        <th colspan="4">Pasar dengan Bangunan Permanen</th>
                                        <th colspan="4">Pasar dengan Bangunan Semi Permanen</th>
                                        <th colspan="4">Pasar Tanpa Bangunan</th>
                                        <th colspan="4">Jumlah Minimarket/Swalayan</th>
                                        <th colspan="4">Toko/Warung Kelontong</th>
                                        <th colspan="4">Toko/Warung Kelontong (Bahan Pangan)</th>
                                        <th colspan="4">Restoran/Rumah Makan</th>
                                        <th colspan="4">Warung/Kedai Makanan Minuman</th>
                                        <th colspan="4">Hotel</th>
                                        <th colspan="4">Penginapan (Hostel/Motel/Losmen/Wisma)</th>
                                        <th colspan="4">Bengkel Mobil/Motor</th>
                                        <th colspan="4">Salon Kecantikan</th>
                                        <th colspan="4">Agen Tiket/Travel/Biro Perjalanan</th>
                                        <th colspan="4">Bank BRI</th>
                                        <th colspan="4">Agen BRI</th>
                                        <th colspan="4">Bank BNI</th>
                                        <th colspan="4">Agen BNI</th>
                                        <th colspan="4">Bank Mandiri</th>
                                        <th colspan="4">Agen Mandiri</th>
                                        <th colspan="4">Bank BPD</th>
                                        <th colspan="4">Agen BPD</th>
                                        <th colspan="4">Bank Umum Pemerintah Lainnya</th>
                                        <th colspan="4">Bank BCA</th>
                                        <th colspan="4">Bank CIMB/Niaga/Maybank</th>
                                        <th colspan="4">Bank Sinarmas</th>
                                        <th colspan="4">Bank Permata</th>
                                        <th colspan="4">Bank Swasta Lainnya</th>
                                        <th colspan="4">BPR (Bank Perkreditan Rakyat)</th>
                                        <th colspan="4">Baitul Maal Wa Tamwil (BMT)</th>
                                        <th colspan="4">Pegadaian</th>
                                        <th colspan="4">Anjungan Tunai Mandiri (ATM)</th>
                                        <th colspan="4">Sarana Ekonomi Lain</th>

                                        <th rowspan="2">KREDIT USAHA RAKYAT</th>
                                        <th rowspan="2">KREDIT KETAHANAN PANGAN DAN ENERGI</th>
                                        <th rowspan="2">KREDIT USAHA KECIL</th>
                                        <th rowspan="2">KELOMPOK USAHA BERSAMA</th>

                                        <th rowspan="2">PENERANGAN DI JALAN</th>
                                        <th rowspan="2">PRASARANA TRANSPORTASI ANTAR RT</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PANJANG
                                            JALAN (KM)</th>
                                        <th rowspan="2">JALAN DARAT DAPAT DILALUI KENDARAAN BERMOTOR RODA 4 ATAU LEBIH
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEBERADAAN
                                            ANGKUTAN UMUM</th>
                                        <th rowspan="2">DERMAGA LAUT / SUNGAI</th>
                                        <th colspan="8"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SINYAL HP
                                        </th>
                                        <th rowspan="2">KANTOR POS PEMBANTU</th>
                                        <th rowspan="2">LAYANAN POS KELILING</th>
                                        <th rowspan="2">PERUSAHAAN / AGEN JASA EKSPEDISI SWASTA</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN
                                            TVRI
                                        </th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN
                                            TVRI
                                            DAERAH</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN TV
                                            SWASTA</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN TV
                                            LUAR NEGERI</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN RRI
                                        </th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN RRI
                                            DAERAH</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN
                                            RADIO SWASTA</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SIARAN
                                            RADIO KOMUNITAS</th>
                                        <th rowspan="2">JUMLAH LOKASI PEMUKIMAN LIAR</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH
                                            FASILITAS UMUM YANG DITINGGALI PENDUDUK</th>
                                        <th colspan="7"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH
                                            LOKASI PEMUKIMAN KHUSUS</th>

                                        <th rowspan="2">LAHAN SAWAH IRIGASI (Ha)</th>
                                        <th rowspan="2">LAHAN SAWAH NON IRIGASI (Ha)</th>
                                        <th rowspan="2">KEBUN (Ha)</th>
                                        <th rowspan="2">HUMA / LADANG (Ha)</th>
                                        <th rowspan="2">TAMBAK (Ha)</th>
                                        <th rowspan="2">KOLAM / TEBAT / EMPANG (Ha)</th>
                                        <th rowspan="2">LAHAN GEMBALA TERNAK (Ha)</th>
                                        <th rowspan="2">LAHAN PERUSAHAAN PERKEBUNAN (Ha)</th>
                                        <th rowspan="2">AREA HUTAN (Ha)</th>
                                        <th rowspan="2">LAHAN PERTANIAN NON SAWAH LAINNYA (Ha)</th>
                                        <th rowspan="2">LAHAN PERTAMBANGAN (Ha)</th>
                                        <th rowspan="2">LAHAN PERUMAHAN (Ha)</th>
                                        <th rowspan="2">LAHAN PERKANTORAN (Ha)</th>
                                        <th rowspan="2">LAHAN INDUSTRI (Ha)</th>
                                        <th rowspan="2">FASILITAS UMUM (Lapangan, Jalan, dll) (Ha)</th>
                                        <th rowspan="2">LAHAN LAINNYA (Ha)</th>
                                        <th rowspan="2">NAMA SUNGAI YANG MELINTASI</th>
                                        <th rowspan="2">NAMA DANAU / WADUK / SITU</th>
                                        <th rowspan="2">JUMLAH MATA AIR</th>
                                        <th rowspan="2">JUMLAH EMBUNG</th>
                                        <th rowspan="2">KETERSEDIAAN SUMUR BOR</th>
                                        <th rowspan="2">KONDISI SUNGAI</th>
                                        <th rowspan="2">KONDISI IRIGASI</th>
                                        <th rowspan="2">KONDISI DANAU</th>
                                        <th rowspan="2">KONDISI EMBUNG</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENCEMARAN
                                            1 TAHUN TERAKHIR</th>
                                        <th rowspan="2">PENGOLAHAN / DAUR ULANG SAMPAH / LIMBAH</th>
                                        <th rowspan="2">KEBIASAAN MASYARAKAT MEMBAKAR LADANG UNTUK PROSES USAHA
                                            PERTANIAN
                                        </th>
                                        <th rowspan="2">KEBERADAAN LOKASI PENGGALIAN GOLONGAN C</th>

                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TANAH
                                            LONGSOR</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BANJIR
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">BANJIR
                                            BANDANG</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">GEMPA BUMI
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TSUNAMI
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANGIN
                                            PUYUH
                                            / PUTING BELIUNG / TOPAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">GUNUNG
                                            MELETUS</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEBAKARAN
                                            HUTAN / LAHAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEKERINGAN
                                        </th>

                                        <th rowspan="2">SISTEM PERINGATAN DINI BENCANA ALAM</th>
                                        <th rowspan="2">SISTEM PERINGATAN DINI KHUSUS TSUNAMI</th>
                                        <th rowspan="2">PERLENGKAPAN KESELAMATAN</th>
                                        <th rowspan="2">RAMBU-RAMBU JALUR EVAKUASI BENCANA</th>
                                        <th rowspan="2">PEMBUATAN / PERAWATAN / NORMALISASI SUNGAI, KANAL, PARIT,
                                            DRAINASE, DLL</th>

                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            POS PAUD</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            TK/RA/BA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SD/MI</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMP/MTs</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMPLB</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMA/MA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMK</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SMA/LB</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            AKADEMI/PERGURUAN TINGGI</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PESANTREN</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            MADRASAH DINIYAH</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SEMINARI/SEJENISNYA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            SEKOLAH AGAMA LAINYA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KEGIATAN PEMBERANTASAN BUTA AKSARA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KEGIATAN KEJAR PAKET A</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KEGIATAN KEJAR PAKET B</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KEGIATAN KEJAR PAKET C</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KELOMPOK BERMAIN/PLAYGRUP</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            TEMPAT PENITIPAN ANAK</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            TAMAN PENDIDIKAN AL QURAN</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS BAHASA ASING</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS KOMPUTER</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KURSUS
                                            MENJAHIT / TATA BUSANA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS KECANTIKAN</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS MONTIR MOBIL/MOTOR</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS MENYETIR</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS ELEKTRONIKA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS MEMASAK/TATABOGA</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS MENGETIK</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS AKUNTANSI</th>
                                        <th
                                            colspan="6"style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            KURSUS LAINNYA</th>

                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH
                                            SAKIT
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH
                                            SAKIT
                                            BERSALIN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PUSKESMAS
                                            DENGAN RAWAT INAP</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PUSKESMAS
                                            TANPA RAWAT INAP</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PUSKESMAS
                                            PEMBANTU</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            POLIKLINIK/BALAI PENGOBATAN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TEMPAT
                                            PRAKTIK DOKTER</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">RUMAH
                                            BERSALIN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TEMPAT
                                            PRAKTEK BIDAN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POSKESDES
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POLINDES
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">APOTIK
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TOKO
                                            KHUSUS
                                            OBAT / JAMU</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POSYANDU
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">POSBINDU
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">TEMPAT
                                            PRAKTEK DUKUN</th>

                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            MUNTABER/DIARE</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DEMAM
                                            BERDARAH</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">CAMPAK
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">MALARIA
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">FLU
                                            BURUNG/SARS</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">COVID-19
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">HEPATITIS
                                            B
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">HEPATITIS
                                            E
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">DIPTERI
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            CHIKUNGUNYA
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            LEPTOSPIROSIS</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KOLERA
                                        </th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">GIZI BURUK
                                            (MARASMUS KWASHIORKOR)</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">LAINNYA
                                        </th>

                                        <th rowspan="2">JUMLAH WARGA PESERTA JAMSKES</th>
                                        <th rowspan="2">JUMLAH WARGA PESERTA JAMS KETENAGAKERJAAN</th>
                                        <th colspan="9"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH
                                            TEMPAT IBADAH</th>
                                        <th colspan="3"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">SITUS
                                            CAGAR
                                            BUDAYA</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KEBERADAAN
                                            SUKU TERASING</th>
                                        <th rowspan="2">RUANG PUBLIK TERBUKA UNTUK SANTAI/ BERMAIN</th>
                                        <th colspan="7"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">NAMA
                                            KEARIFAN LOKAL ATAU ADAT</th>

                                        <th rowspan="2">NAMA LEMBAGA AGAMA</th>
                                        <th rowspan="2">JUMLAH PENGURUS</th>
                                        <th rowspan="2">JUMLAH ANGGOTA</th>
                                        <th rowspan="2">FASILITAS</th>

                                        <th rowspan="2">NAMA LEMBAGA MASYARAKAT</th>
                                        <th rowspan="2">JUMLAH KELOMPOK</th>
                                        <th rowspan="2">JUMLAH PENGURUS</th>
                                        <th rowspan="2">JUMLAH ANGGOTA</th>
                                        <th rowspan="2">FASILITAS</th>

                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANTAR
                                            KELOMPOK MASYARAKAT</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KELOMPOK
                                            MASYARAKAT ANTAR DESA</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KELOMPOK
                                            MASYARAKAT DENGAN APARAT KEAMANAN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KELOMPOK
                                            MASYARAKAT DENGAN APARAT PEMERINTAH</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANTAR
                                            APARAT KEAMANAN</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANTAR
                                            APARAT PEMERINTAH</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PELAJAR/MAHASISWA</th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">ANTAR SUKU
                                        </th>
                                        <th colspan="6"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">LAINNYA
                                        </th>

                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENCURIAN
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENCURIAN
                                            DENGAN KEKERASAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PENIPUAN /
                                            PENGGELAPAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PENGANIAYAAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PEMBAKARAN
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PEMERKOSAAN
                                            / KEJAHATAN KESUSILAAN</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PENYALAHGUNAAN / PEREDARAN NARKOBA</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PERJUDIAN
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">PEMBUNUHAN
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                            PERDAGANGAN
                                            ORANG</th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">KORUPSI
                                        </th>
                                        <th colspan="5"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">LAINYA
                                        </th>


                                        <th rowspan="2">JUMLAH KEGIATAN PEMBANGUNAN / PEMELIHARAAN POSKAMLING</th>
                                        <th rowspan="2">JUMLAH KEGIATAN PEMBENTUKAN / PENGATURAN REGU KEAMANAN</th>
                                        <th rowspan="2">JUMLAH ANGGOTA HANSIP / LINMAS YANG DITAMBAHKAN</th>
                                        <th rowspan="2">PELAPORAN TAMU YANG MENGINAP LEBIH DARI 24 JAM KE APARAT
                                            LINGKUNGAN</th>
                                        <th rowspan="2">PENGAKTIFAN SISTEM KEAMANAN LINGKUNGAN BERASAL DARI INISIATIF
                                            WARGA</th>
                                        <th rowspan="2">JUMLAH ANGGOTA LINMAS ATAU HANSIP</th>
                                        <th colspan="2"
                                            style="border-bottom: 1px solid #000; border-right: 1px solid #000;">JUMLAH POS
                                            POLISI</th>
                                        <th rowspan="2">JARAK KE POS POLISI TERDEKAT</th>
                                        <th rowspan="2">KEMUDAHAN UNTUK MENCAPAI POS POLISI</th>
                                        <th rowspan="2">JUMLAH KORBAN (TERMASUK PERCOBAAN) BUNUH DIRI</th>
                                        <th rowspan="2">JUMLAH LOKASI BERKUMPUL / MANGKAL ANAK JALANAN</th>
                                        <th rowspan="2">JUMLAH TEMPAT MANGKAL GELANDANGAN / PENGEMIS</th>
                                        <th rowspan="2">JUMLAH LOKALISASI / LOKASI / TEMPAT MANGKAL PEKERJA SEKS
                                            KOMERSIAL (PSK)</th>


                                    </tr>

                                    {{-- BATASSSSS --}}


                                    <tr>
                                        <th>Konservasi (ha)</th>
                                        <th>Lindung (ha)</th>
                                        <th>Produksi (ha)</th>
                                        <th style="border-right: 1px solid #000;">Hutan Desa (ha)</th>


                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>

                                        <th>NAMA</th>
                                        <th>NIK</th>
                                        <th>NO. HP</th>
                                        <th style="border-right: 1px solid #000;">MENJABAT SEJAK</th>


                                        <th>Jumlah Perusahaan</th>
                                        <th style="border-right: 1px solid #000;">Jumlah Tenaga Kerja</th>
                                        <th>Sentra Industri</th>
                                        <th>Lingkungan Industri Kecil</th>
                                        <th style="border-right: 1px solid #000;">Perkampungan Industri Kecil</th>
                                        <th>Keberadaan PUB/Diskotik/Tempat Karaoke</th>
                                        <th style="border-right: 1px solid #000;">Jarak terdekat ke Lokasi</th>
                                        <th>Keberadaan pangkalan/agen/penjual minyak tanah</th>
                                        <th style="border-right: 1px solid #000;">Keberadaan pangkalan/agen/penjual LPG
                                        </th>
                                        <th>Jumlah KUD</th>
                                        <th>KUD yang membeli/menjual hasil/produksi pertanian</th>
                                        <th>KUD yang menyediakan Kredit Usaha</th>
                                        <th>KUD kegiatan lainnya</th>
                                        <th>Koperasi Industri Kecil dan Kerajinan Rakyat</th>
                                        <th>Koperasi Simpan Pinjam</th>
                                        <th>Koperasi Serba Usaha</th>
                                        <th style="border-right: 1px solid #000;">Koperasi Lainnya</th>
                                        <th>Milik KUD (unit)</th>
                                        <th>Milik BUMDES (unit)</th>
                                        <th style="border-right: 1px solid #000;">Milik selain KUD dan BUMDES</th>



                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>

                                        <th>JUMLAH INDUSTRI KECIL DAN RUMAH TANGGA</th>
                                        <th>JUMLAH INDUSTRI SEDANG DAN BESAR</th>
                                        <th>JUMLAH MANAJEMEN</th>
                                        <th tyle="border-right: 1px solid #000;">JUMLAH PEKERJA</th>


                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Jarak Terdekat</th>
                                        <th style="border-right: 1px solid #000;">Kemudahan untuk Mencapai</th>

                                        <th>JALAN ASPAL</th>
                                        <th>JALAN MAKADAM/TELFORD</th>
                                        <th>JALAN TANAH</th>
                                        <th>JALAN PAPAN DI ATAS AIR</th>
                                        <th>JALAN SETAPAK</th>
                                        <th style="border-right: 1px solid #000;">JALAN LAINNYA</th>

                                        <th>Trayek Angkutan Umum</th>
                                        <th>Operasional Angkutan Umum</th>
                                        <th style="border-right: 1px solid #000;">Jam Operasional Angkutan Umum</th>

                                        <th>JUMLAH MENARA BTS</th>
                                        <th>TELKOMSEL</th>
                                        <th>INDOSAT</th>
                                        <th>XL/AXIS</th>
                                        <th>HUTCHISON 3</th>
                                        <th>PSN by RU</th>
                                        <th>SMARTFREN</th>
                                        <th style="border-right: 1px solid #000;">BAKRIE TELCOM</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>

                                        <th>CHANEL DAPAT DITERIMA ATAU TIDAK</th>
                                        <th style="border-right: 1px solid #000;">PERLU PARABOLA</th>





                                        <th>PASAR</th>
                                        <th>STASIUN</th>
                                        <th>TERMINAL</th>
                                        <th>KOLONG JEMBATAN</th>
                                        <th style="border-right: 1px solid #000;">PELABUHAN</th>


                                        <th>PERUMAHAN MEWAH</th>
                                        <th>APARTEMEN</th>
                                        <th>RUMAH SUSUN</th>
                                        <th>BOARDING SCHOOL</th>
                                        <th>KOS-KOSAN</th>
                                        <th>ASRAMA/BARAK MILITER</th>
                                        <th style="border-right: 1px solid #000;">LP/RUTAN</th>

                                        <th>AIR</th>
                                        <th>TANAH</th>
                                        <th style="border-right: 1px solid #000;">UDARA</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>KEJADIAN</th>
                                        <th>FREKUENSI KEJADIAN</th>
                                        <th>KORBAN JIWA</th>
                                        <th>JUMLAH PENGUNGSI</th>
                                        <th style="border-right: 1px solid #000;">WARGA TERDAMPAK</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>KONDISI BANGUNAN</th>
                                        <th>JUMLAH GURU</th>
                                        <th>JUMLAH MURID</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>


                                        <th>NAMA</th>
                                        <th>PEMILIK</th>
                                        <th>JUMLAH DOKTER</th>
                                        <th>JUMLAH BIDAN</th>
                                        <th>JUMLAH TENAGA KESEHATAN</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH PEGAWAI</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>KEJADIAN</th>
                                        <th>JUMLAH PENDERITA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH MENINGGAL</th>

                                        <th>MASJID</th>
                                        <th>MUSHOLLAH</th>
                                        <th>GEREJA KRISTEN</th>
                                        <th>GEREJA KATOLIK</th>
                                        <th>KAPEL</th>
                                        <th>PURA</th>
                                        <th>WIHARA</th>
                                        <th>KELENTENG</th>
                                        <th style="border-right: 1px solid #000;">LAINNYA</th>


                                        <th>SITUS CAGAR BUDAYA 1</th>
                                        <th>SITUS CAGAR BUDAYA 2</th>
                                        <th style="border-right: 1px solid #000;">SITUS CAGAR BUDAYA 3</th>


                                        <th>JUMLAH KELUARGA</th>
                                        <th style="border-right: 1px solid #000;">JUMLAH JIWA</th>


                                        <th>KEHAMILAN</th>
                                        <th>KELAHIRAN</th>
                                        <th>PEKERJAAN</th>
                                        <th>ALAM / LINGKUNGAN HIDUP</th>
                                        <th>PERKAWINAN</th>
                                        <th>KEHIDUPAN WARGA</th>
                                        <th style="border-right: 1px solid #000;">KEMATIAN</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>

                                        <th>PENYEBAB UTAMA</th>
                                        <th>JUMLAH KEJADIAN</th>
                                        <th>JUMLAH KORBAN LUKA</th>
                                        <th>JUMLAH TEWAS</th>
                                        <th>PENYELESAIAN</th>
                                        <th style="border-right: 1px solid #000;">PIHAK PENDAMAI</th>


                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>JUMLAH KASUS</th>
                                        <th>JUMLAH SELESAI KASUS YANG DITANGANI</th>
                                        <th>JUMLAH KASUS TIDAK BISA DITANGANI</th>
                                        <th>KORBAN LUKA-LUKA</th>
                                        <th style="border-right: 1px solid #000;">KORBAN TEWAS</th>

                                        <th>YANG DIGUNAKAN</th>
                                        <th style="border-right: 1px solid #000;">YANG TIDAK DIGUNAKAN</th>



                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function() {
            $('#tabledatart').DataTable({
                processing: true,
                // serverSide: true,
                // dom: 'Bfrtip',
                scrollX: true,
 searching: false,
                ajax: {
                    url: '{!! route('datart.json') !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                                d.nik = $('#search_nik').val(); // Pass the NIK input value
                            }
                },
                "buttons": [{
                    "extend": 'excel',
                    "text": '<button class="btn"><i class="fa fa-file-excel-o" style="color: green;"></i>  EXPORT EXCEL</button>',
                    "titleAttr": 'Excel',
                    "action": newexportaction
                }, ],
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'rt',
                        name: 'rt'
                    },
                    {
                        data: 'rw',
                        name: 'rw'
                    },
                    {
                        data: 'nohp',
                        name: 'nohp'
                    },

                    {
                        data: 'lokasi_rt_pulau',
                        name: 'lokasi_rt_pulau',
                    },
                    {
                        data: 'topo_terluas_rt',
                        name: 'topo_terluas_rt',
                    },
                    {
                        data: 'jumlah_warga_lereng',
                        name: 'jumlah_warga_lereng',
                    },
                    {
                        data: 'penanaman_pohon_lahan_kritis',
                        name: 'penanaman_pohon_lahan_kritis',
                    },
                    {
                        data: 'pantai_garis_panjang',
                        name: 'pantai_garis_panjang',
                    },
                    {
                        data: 'pemanfaatan_laut_perangkap',
                        name: 'pemanfaatan_laut_perangkap',
                    },
                    {
                        data: 'pemanfaatan_laut_budidaya',
                        name: 'pemanfaatan_laut_budidaya',
                    },
                    {
                        data: 'pemanfaatan_laut_tambakg',
                        name: 'pemanfaatan_laut_tambakg',
                    },
                    {
                        data: 'pemanfaatan_laut_bahari',
                        name: 'pemanfaatan_laut_bahari',
                    },
                    {
                        data: 'pemanfaatan_laut_transport',
                        name: 'pemanfaatan_laut_transport',
                    },
                    {
                        data: 'kondisi_mangrove',
                        name: 'kondisi_mangrove',
                    },
                    {
                        data: 'penanaman_mangrove',
                        name: 'penanaman_mangrove',
                    },
                    {
                        data: 'jumlah_warga_pesisir',
                        name: 'jumlah_warga_pesisir',
                    },
                    {
                        data: 'jumlah_warga_atasair',
                        name: 'jumlah_warga_atasair',
                    },
                    {
                        data: 'wilayah_desa_dalamhutan',
                        name: 'wilayah_desa_dalamhutan',
                    },
                    {
                        data: 'wilayah_desa_tepihutan',
                        name: 'wilayah_desa_tepihutan',
                    },
                    {
                        data: 'fungsihutan_kons',
                        name: 'fungsihutan_kons',
                    },
                    {
                        data: 'fungsihutan_lindung',
                        name: 'fungsihutan_lindung',
                    },
                    {
                        data: 'fungsihutan_produk',
                        name: 'fungsihutan_produk',
                    },
                    {
                        data: 'fungsihutan_hutandes',
                        name: 'fungsihutan_hutandes',
                    },
                    {
                        data: 'jumlahwarga_tinggal_dalamhutan',
                        name: 'jumlahwarga_tinggal_dalamhutan',
                    },
                    {
                        data: 'jumlahwarga_tinggal_sekitarhutan',
                        name: 'jumlahwarga_tinggal_sekitarhutan',
                    },
                    {
                        data: 'ketergantungan_hutan',
                        name: 'ketergantungan_hutan',
                    },
                    {
                        data: 'reboisasi',
                        name: 'reboisasi',
                    },
                    {
                        data: 'jumlah_produk_luardesa_masuk',
                        name: 'jumlah_produk_luardesa_masuk',
                    },
                    {
                        data: 'jumlah_produk_luardesa_keluar',
                        name: 'jumlah_produk_luardesa_keluar',
                    },

                    {
                        data: 'nama_ketuarw',
                        name: 'nama_ketuarw'
                    },
                    {
                        data: 'nik_ketuarw',
                        name: 'nik_ketuarw'
                    },
                    {
                        data: 'nohp_ketuarw',
                        name: 'nohp_ketuarw'
                    },
                    {
                        data: 'menjabat_ketuarw',
                        name: 'menjabat_ketuarw'
                    },

                    // Columns related to 'nama_sekrw'
                    {
                        data: 'nama_sekrw',
                        name: 'nama_sekrw'
                    },
                    {
                        data: 'nik_sekrw',
                        name: 'nik_sekrw'
                    },
                    {
                        data: 'nohp_sekrw',
                        name: 'nohp_sekrw'
                    },
                    {
                        data: 'menjabat_sekrw',
                        name: 'menjabat_sekrw'
                    },

                    // Columns related to 'nama_benrw'
                    {
                        data: 'nama_benrw',
                        name: 'nama_benrw'
                    },
                    {
                        data: 'nik_benrw',
                        name: 'nik_benrw'
                    },
                    {
                        data: 'nohp_benrw',
                        name: 'nohp_benrw'
                    },
                    {
                        data: 'menjabat_benrw',
                        name: 'menjabat_benrw'
                    },

                    // Columns related to 'nama_ketuart'
                    {
                        data: 'nama_ketuart',
                        name: 'nama_ketuart'
                    },
                    {
                        data: 'nik_ketuart',
                        name: 'nik_ketuart'
                    },
                    {
                        data: 'nohp_ketuart',
                        name: 'nohp_ketuart'
                    },
                    {
                        data: 'menjabat_ketuart',
                        name: 'menjabat_ketuart'
                    },

                    // Columns related to 'nama_sekrt'
                    {
                        data: 'nama_sekrt',
                        name: 'nama_sekrt'
                    },
                    {
                        data: 'nik_sekrt',
                        name: 'nik_sekrt'
                    },
                    {
                        data: 'nohp_sekrt',
                        name: 'nohp_sekrt'
                    },
                    {
                        data: 'menjabat_sekrt',
                        name: 'menjabat_sekrt'
                    },

                    // Columns related to 'nama_benrt'
                    {
                        data: 'nama_benrt',
                        name: 'nama_benrt'
                    },
                    {
                        data: 'nik_benrt',
                        name: 'nik_benrt'
                    },
                    {
                        data: 'nohp_benrt',
                        name: 'nohp_benrt'
                    },
                    {
                        data: 'menjabat_benrt',
                        name: 'menjabat_benrt'
                    },

                    {
                        data: 'agentik_jp',
                        name: 'agentik_jp'
                    },

                    // Columns related to 'agentik_jtk'
                    {
                        data: 'agentik_jtk',
                        name: 'agentik_jtk'
                    },

                    // Columns related to 'jtri_sentra'
                    {
                        data: 'jtri_sentra',
                        name: 'jtri_sentra'
                    },

                    // Columns related to 'jtri_lingkungan'
                    {
                        data: 'jtri_lingkungan',
                        name: 'jtri_lingkungan'
                    },

                    // Columns related to 'jtri_kampung'
                    {
                        data: 'jtri_kampung',
                        name: 'jtri_kampung'
                    },

                    // Columns related to 'diskotik_kpd'
                    {
                        data: 'diskotik_kpd',
                        name: 'diskotik_kpd'
                    },

                    // Columns related to 'diskotik_jtl'
                    {
                        data: 'diskotik_jtl',
                        name: 'diskotik_jtl'
                    },

                    // Columns related to 'lpg_kpapm'
                    {
                        data: 'lpg_kpapm',
                        name: 'lpg_kpapm'
                    },

                    // Columns related to 'lpg_kpapg'
                    {
                        data: 'lpg_kpapg',
                        name: 'lpg_kpapg'
                    },

                    // Columns related to 'koperasi_jumlah'
                    {
                        data: 'koperasi_jumlah',
                        name: 'koperasi_jumlah'
                    },

                    // Columns related to 'koperasi_kudproduksi'
                    {
                        data: 'koperasi_kudproduksi',
                        name: 'koperasi_kudproduksi'
                    },

                    // Columns related to 'koperasi_kudkredit'
                    {
                        data: 'koperasi_kudkredit',
                        name: 'koperasi_kudkredit'
                    },

                    // Columns related to 'koperasi_kudkegiatan'
                    {
                        data: 'koperasi_kudkegiatan',
                        name: 'koperasi_kudkegiatan'
                    },

                    // Columns related to 'koperasi_kudindustrik'
                    {
                        data: 'koperasi_kudindustrik',
                        name: 'koperasi_kudindustrik'
                    },

                    // Columns related to 'koperasi_kudksp'
                    {
                        data: 'koperasi_kudksp',
                        name: 'koperasi_kudksp'
                    },

                    // Columns related to 'koperasi_kudksu'
                    {
                        data: 'koperasi_kudksu',
                        name: 'koperasi_kudksu'
                    },

                    // Columns related to 'koperasi_kudlainnya'
                    {
                        data: 'koperasi_kudlainnya',
                        name: 'koperasi_kudlainnya'
                    },

                    // Columns related to 'kos_kud'
                    {
                        data: 'kos_kud',
                        name: 'kos_kud'
                    },

                    // Columns related to 'kos_bumdes'
                    {
                        data: 'kos_bumdes',
                        name: 'kos_bumdes'
                    },

                    // Columns related to 'kos_selain'
                    {
                        data: 'kos_selain',
                        name: 'kos_selain'
                    },
                    {
                        data: 'jumlahindustrik_kulit',
                        name: 'jumlahindustrik_kulit',
                    },
                    {
                        data: 'jumlahindustris_kulit',
                        name: 'jumlahindustris_kulit',
                    },
                    {
                        data: 'jumlahmanajemen_kulit',
                        name: 'jumlahmanajemen_kulit',
                    },
                    {
                        data: 'jumlahpekerja_kulit',
                        name: 'jumlahpekerja_kulit',
                    },
                    {
                        data: 'jumlahindustrik_kayu',
                        name: 'jumlahindustrik_kayu',
                    },
                    {
                        data: 'jumlahindustris_kayu',
                        name: 'jumlahindustris_kayu',
                    },
                    {
                        data: 'jumlahmanajemen_kayu',
                        name: 'jumlahmanajemen_kayu',
                    },
                    {
                        data: 'jumlahpekerja_kayu',
                        name: 'jumlahpekerja_kayu',
                    },
                    {
                        data: 'jumlahindustrik_logam',
                        name: 'jumlahindustrik_logam',
                    },
                    {
                        data: 'jumlahindustris_logam',
                        name: 'jumlahindustris_logam',
                    },
                    {
                        data: 'jumlahmanajemen_logam',
                        name: 'jumlahmanajemen_logam',
                    },
                    {
                        data: 'jumlahpekerja_logam',
                        name: 'jumlahpekerja_logam',
                    },
                    {
                        data: 'jumlahindustrik_logamb',
                        name: 'jumlahindustrik_logamb',
                    },
                    {
                        data: 'jumlahindustris_logamb',
                        name: 'jumlahindustris_logamb',
                    },
                    {
                        data: 'jumlahmanajemen_logamb',
                        name: 'jumlahmanajemen_logamb',
                    },
                    {
                        data: 'jumlahpekerja_logamb',
                        name: 'jumlahpekerja_logamb',
                    },
                    {
                        data: 'jumlahindustrik_kain',
                        name: 'jumlahindustrik_kain',
                    },
                    {
                        data: 'jumlahindustris_kain',
                        name: 'jumlahindustris_kain',
                    },
                    {
                        data: 'jumlahmanajemen_kain',
                        name: 'jumlahmanajemen_kain',
                    },
                    {
                        data: 'jumlahpekerja_kain',
                        name: 'jumlahpekerja_kain',
                    },
                    {
                        data: 'jumlahindustrik_keramik',
                        name: 'jumlahindustrik_keramik',
                    },
                    {
                        data: 'jumlahindustris_keramik',
                        name: 'jumlahindustris_keramik',
                    },
                    {
                        data: 'jumlahmanajemen_keramik',
                        name: 'jumlahmanajemen_keramik',
                    },
                    {
                        data: 'jumlahpekerja_keramik',
                        name: 'jumlahpekerja_keramik',
                    },
                    {
                        data: 'jumlahindustrik_genteng',
                        name: 'jumlahindustrik_genteng',
                    },
                    {
                        data: 'jumlahindustris_genteng',
                        name: 'jumlahindustris_genteng',
                    },
                    {
                        data: 'jumlahmanajemen_genteng',
                        name: 'jumlahmanajemen_genteng',
                    },
                    {
                        data: 'jumlahpekerja_genteng',
                        name: 'jumlahpekerja_genteng',
                    },
                    {
                        data: 'jumlahindustrik_anyaman',
                        name: 'jumlahindustrik_anyaman',
                    },
                    {
                        data: 'jumlahindustris_anyaman',
                        name: 'jumlahindustris_anyaman',
                    },
                    {
                        data: 'jumlahmanajemen_anyaman',
                        name: 'jumlahmanajemen_anyaman',
                    },
                    {
                        data: 'jumlahpekerja_anyaman',
                        name: 'jumlahpekerja_anyaman',
                    },
                    {
                        data: 'jumlahindustrik_makanan',
                        name: 'jumlahindustrik_makanan',
                    },
                    {
                        data: 'jumlahindustris_makanan',
                        name: 'jumlahindustris_makanan',
                    },
                    {
                        data: 'jumlahmanajemen_makanan',
                        name: 'jumlahmanajemen_makanan',
                    },
                    {
                        data: 'jumlahpekerja_makanan',
                        name: 'jumlahpekerja_makanan',
                    },
                    {
                        data: 'jumlahindustrik_lainnya',
                        name: 'jumlahindustrik_lainnya',
                    },
                    {
                        data: 'jumlahindustris_lainnya',
                        name: 'jumlahindustris_lainnya',
                    },
                    {
                        data: 'jumlahmanajemen_lainnya',
                        name: 'jumlahmanajemen_lainnya',
                    },
                    {
                        data: 'jumlahpekerja_lainnya',
                        name: 'jumlahpekerja_lainnya',
                    },
                    {
                        data: 'jumlah_toko',
                        name: 'jumlah_toko'
                    },
                    {
                        data: 'kondisi_toko',
                        name: 'kondisi_toko'
                    },
                    {
                        data: 'Jarak_toko',
                        name: 'Jarak_toko'
                    },
                    {
                        data: 'kemudahan_toko',
                        name: 'kemudahan_toko'
                    },
                    {
                        data: 'jumlah_pasar_permanen',
                        name: 'jumlah_pasar_permanen'
                    },
                    {
                        data: 'kondisi_pasar_permanen',
                        name: 'kondisi_pasar_permanen'
                    },
                    {
                        data: 'Jarak_pasar_permanen',
                        name: 'Jarak_pasar_permanen'
                    },
                    {
                        data: 'kemudahan_pasar_permanen',
                        name: 'kemudahan_pasar_permanen'
                    },
                    {
                        data: 'jumlah_semip',
                        name: 'jumlah_semip'
                    },
                    {
                        data: 'kondisi_semip',
                        name: 'kondisi_semip'
                    },
                    {
                        data: 'Jarak_semip',
                        name: 'Jarak_semip'
                    },
                    {
                        data: 'kemudahan_semip',
                        name: 'kemudahan_semip'
                    },
                    {
                        data: 'jumlah_tanpap',
                        name: 'jumlah_tanpap'
                    },
                    {
                        data: 'kondisi_tanpap',
                        name: 'kondisi_tanpap'
                    },
                    {
                        data: 'Jarak_tanpap',
                        name: 'Jarak_tanpap'
                    },
                    {
                        data: 'kemudahan_tanpap',
                        name: 'kemudahan_tanpap'
                    },
                    {
                        data: 'jumlah_minimarket',
                        name: 'jumlah_minimarket'
                    },
                    {
                        data: 'kondisi_minimarket',
                        name: 'kondisi_minimarket'
                    },
                    {
                        data: 'Jarak_minimarket',
                        name: 'Jarak_minimarket'
                    },
                    {
                        data: 'kemudahan_minimarket',
                        name: 'kemudahan_minimarket'
                    },
                    {
                        data: 'jumlah_warungk',
                        name: 'jumlah_warungk'
                    },
                    {
                        data: 'kondisi_warungk',
                        name: 'kondisi_warungk'
                    },
                    {
                        data: 'Jarak_warungk',
                        name: 'Jarak_warungk'
                    },
                    {
                        data: 'kemudahan_warungk',
                        name: 'kemudahan_warungk'
                    },
                    {
                        data: 'jumlah_warungp',
                        name: 'jumlah_warungp'
                    },
                    {
                        data: 'kondisi_warungp',
                        name: 'kondisi_warungp'
                    },
                    {
                        data: 'Jarak_warungp',
                        name: 'Jarak_warungp'
                    },
                    {
                        data: 'kemudahan_warungp',
                        name: 'kemudahan_warungp'
                    },
                    {
                        data: 'jumlah_restoran',
                        name: 'jumlah_restoran'
                    },
                    {
                        data: 'kondisi_restoran',
                        name: 'kondisi_restoran'
                    },
                    {
                        data: 'Jarak_restoran',
                        name: 'Jarak_restoran'
                    },
                    {
                        data: 'kemudahan_restoran',
                        name: 'kemudahan_restoran'
                    },
                    {
                        data: 'jumlah_kedaim',
                        name: 'jumlah_kedaim'
                    },
                    {
                        data: 'kondisi_kedaim',
                        name: 'kondisi_kedaim'
                    },
                    {
                        data: 'Jarak_kedaim',
                        name: 'Jarak_kedaim'
                    },
                    {
                        data: 'kemudahan_kedaim',
                        name: 'kemudahan_kedaim'
                    },
                    {
                        data: 'jumlah_hotel',
                        name: 'jumlah_hotel'
                    },
                    {
                        data: 'kondisi_hotel',
                        name: 'kondisi_hotel'
                    },
                    {
                        data: 'Jarak_hotel',
                        name: 'Jarak_hotel'
                    },
                    {
                        data: 'kemudahan_hotel',
                        name: 'kemudahan_hotel'
                    },
                    {
                        data: 'jumlah_hostel',
                        name: 'jumlah_hostel'
                    },
                    {
                        data: 'kondisi_hostel',
                        name: 'kondisi_hostel'
                    },
                    {
                        data: 'Jarak_hostel',
                        name: 'Jarak_hostel'
                    },
                    {
                        data: 'kemudahan_hostel',
                        name: 'kemudahan_hostel'
                    },
                    {
                        data: 'jumlah_bengkelm',
                        name: 'jumlah_bengkelm'
                    },
                    {
                        data: 'kondisi_bengkelm',
                        name: 'kondisi_bengkelm'
                    },
                    {
                        data: 'Jarak_bengkelm',
                        name: 'Jarak_bengkelm'
                    },
                    {
                        data: 'kemudahan_bengkelm',
                        name: 'kemudahan_bengkelm'
                    },
                    {
                        data: 'jumlah_salonk',
                        name: 'jumlah_salonk'
                    },
                    {
                        data: 'kondisi_salonk',
                        name: 'kondisi_salonk'
                    },
                    {
                        data: 'Jarak_salonk',
                        name: 'Jarak_salonk'
                    },
                    {
                        data: 'kemudahan_salonk',
                        name: 'kemudahan_salonk'
                    },
                    {
                        data: 'jumlah_agent',
                        name: 'jumlah_agent'
                    },
                    {
                        data: 'kondisi_agent',
                        name: 'kondisi_agent'
                    },
                    {
                        data: 'Jarak_agent',
                        name: 'Jarak_agent'
                    },
                    {
                        data: 'kemudahan_agent',
                        name: 'kemudahan_agent'
                    },
                    {
                        data: 'jumlah_bankbri',
                        name: 'jumlah_bankbri'
                    },
                    {
                        data: 'kondisi_bankbri',
                        name: 'kondisi_bankbri'
                    },
                    {
                        data: 'Jarak_bankbri',
                        name: 'Jarak_bankbri'
                    },
                    {
                        data: 'kemudahan_bankbri',
                        name: 'kemudahan_bankbri'
                    },
                    {
                        data: 'jumlah_briag',
                        name: 'jumlah_briag'
                    },
                    {
                        data: 'kondisi_briag',
                        name: 'kondisi_briag'
                    },
                    {
                        data: 'Jarak_briag',
                        name: 'Jarak_briag'
                    },
                    {
                        data: 'kemudahan_briag',
                        name: 'kemudahan_briag'
                    },
                    {
                        data: 'jumlah_bankbni',
                        name: 'jumlah_bankbni'
                    },
                    {
                        data: 'kondisi_bankbni',
                        name: 'kondisi_bankbni'
                    },
                    {
                        data: 'Jarak_bankbni',
                        name: 'Jarak_bankbni'
                    },
                    {
                        data: 'kemudahan_bankbni',
                        name: 'kemudahan_bankbni'
                    },
                    {
                        data: 'jumlah_bniag',
                        name: 'jumlah_bniag'
                    },
                    {
                        data: 'kondisi_bniag',
                        name: 'kondisi_bniag'
                    },
                    {
                        data: 'Jarak_bniag',
                        name: 'Jarak_bniag'
                    },
                    {
                        data: 'kemudahan_bniag',
                        name: 'kemudahan_bniag'
                    },
                    {
                        data: 'jumlah_bankmandiri',
                        name: 'jumlah_bankmandiri'
                    },
                    {
                        data: 'kondisi_bankmandiri',
                        name: 'kondisi_bankmandiri'
                    },
                    {
                        data: 'Jarak_bankmandiri',
                        name: 'Jarak_bankmandiri'
                    },
                    {
                        data: 'kemudahan_bankmandiri',
                        name: 'kemudahan_bankmandiri'
                    },
                    {
                        data: 'jumlah_mandiriag',
                        name: 'jumlah_mandiriag'
                    },
                    {
                        data: 'kondisi_mandiriag',
                        name: 'kondisi_mandiriag'
                    },
                    {
                        data: 'Jarak_mandiriag',
                        name: 'Jarak_mandiriag'
                    },
                    {
                        data: 'kemudahan_mandiriag',
                        name: 'kemudahan_mandiriag'
                    },
                    {
                        data: 'jumlah_bankbpd',
                        name: 'jumlah_bankbpd'
                    },
                    {
                        data: 'kondisi_bankbpd',
                        name: 'kondisi_bankbpd'
                    },
                    {
                        data: 'Jarak_bankbpd',
                        name: 'Jarak_bankbpd'
                    },
                    {
                        data: 'kemudahan_bankbpd',
                        name: 'kemudahan_bankbpd'
                    },
                    {
                        data: 'jumlah_bpdag',
                        name: 'jumlah_bpdag'
                    },
                    {
                        data: 'kondisi_bpdag',
                        name: 'kondisi_bpdag'
                    },
                    {
                        data: 'Jarak_bpdag',
                        name: 'Jarak_bpdag'
                    },
                    {
                        data: 'kemudahan_bpdag',
                        name: 'kemudahan_bpdag'
                    },
                    {
                        data: 'jumlah_bankumum',
                        name: 'jumlah_bankumum'
                    },
                    {
                        data: 'kondisi_bankumum',
                        name: 'kondisi_bankumum'
                    },
                    {
                        data: 'Jarak_bankumum',
                        name: 'Jarak_bankumum'
                    },
                    {
                        data: 'kemudahan_bankumum',
                        name: 'kemudahan_bankumum'
                    },
                    {
                        data: 'jumlah_bankbca',
                        name: 'jumlah_bankbca'
                    },
                    {
                        data: 'kondisi_bankbca',
                        name: 'kondisi_bankbca'
                    },
                    {
                        data: 'Jarak_bankbca',
                        name: 'Jarak_bankbca'
                    },
                    {
                        data: 'kemudahan_bankbca',
                        name: 'kemudahan_bankbca'
                    },
                    {
                        data: 'jumlah_bankcimb',
                        name: 'jumlah_bankcimb'
                    },
                    {
                        data: 'kondisi_bankcimb',
                        name: 'kondisi_bankcimb'
                    },
                    {
                        data: 'Jarak_bankcimb',
                        name: 'Jarak_bankcimb'
                    },
                    {
                        data: 'kemudahan_bankcimb',
                        name: 'kemudahan_bankcimb'
                    },
                    {
                        data: 'jumlah_banksinarm',
                        name: 'jumlah_banksinarm'
                    },
                    {
                        data: 'kondisi_banksinarm',
                        name: 'kondisi_banksinarm'
                    },
                    {
                        data: 'Jarak_banksinarm',
                        name: 'Jarak_banksinarm'
                    },
                    {
                        data: 'kemudahan_banksinarm',
                        name: 'kemudahan_banksinarm'
                    },
                    {
                        data: 'jumlah_bankpermata',
                        name: 'jumlah_bankpermata'
                    },
                    {
                        data: 'kondisi_bankpermata',
                        name: 'kondisi_bankpermata'
                    },
                    {
                        data: 'Jarak_bankpermata',
                        name: 'Jarak_bankpermata'
                    },
                    {
                        data: 'kemudahan_bankpermata',
                        name: 'kemudahan_bankpermata'
                    },
                    {
                        data: 'jumlah_bankswastalain',
                        name: 'jumlah_bankswastalain'
                    },
                    {
                        data: 'kondisi_bankswastalain',
                        name: 'kondisi_bankswastalain'
                    },
                    {
                        data: 'Jarak_bankswastalain',
                        name: 'Jarak_bankswastalain'
                    },
                    {
                        data: 'kemudahan_bankswastalain',
                        name: 'kemudahan_bankswastalain'
                    },
                    {
                        data: 'jumlah_bankbpr',
                        name: 'jumlah_bankbpr'
                    },
                    {
                        data: 'kondisi_bankbpr',
                        name: 'kondisi_bankbpr'
                    },
                    {
                        data: 'Jarak_bankbpr',
                        name: 'Jarak_bankbpr'
                    },
                    {
                        data: 'kemudahan_bankbpr',
                        name: 'kemudahan_bankbpr'
                    },
                    {
                        data: 'jumlah_bmt',
                        name: 'jumlah_bmt'
                    },
                    {
                        data: 'kondisi_bmt',
                        name: 'kondisi_bmt'
                    },
                    {
                        data: 'Jarak_bmt',
                        name: 'Jarak_bmt'
                    },
                    {
                        data: 'kemudahan_bmt',
                        name: 'kemudahan_bmt'
                    },
                    {
                        data: 'jumlah_pegadaian',
                        name: 'jumlah_pegadaian'
                    },
                    {
                        data: 'kondisi_pegadaian',
                        name: 'kondisi_pegadaian'
                    },
                    {
                        data: 'Jarak_pegadaian',
                        name: 'Jarak_pegadaian'
                    },
                    {
                        data: 'kemudahan_pegadaian',
                        name: 'kemudahan_pegadaian'
                    },
                    {
                        data: 'jumlah_atm',
                        name: 'jumlah_atm'
                    },
                    {
                        data: 'kondisi_atm',
                        name: 'kondisi_atm'
                    },
                    {
                        data: 'Jarak_atm',
                        name: 'Jarak_atm'
                    },
                    {
                        data: 'kemudahan_atm',
                        name: 'kemudahan_atm'
                    },
                    {
                        data: 'jumlah_saranalain',
                        name: 'jumlah_saranalain'
                    },
                    {
                        data: 'kondisi_saranalain',
                        name: 'kondisi_saranalain'
                    },
                    {
                        data: 'Jarak_saranalain',
                        name: 'Jarak_saranalain'
                    },
                    {
                        data: 'kemudahan_saranalain',
                        name: 'kemudahan_saranalain'
                    },

                    {
                        data: 'kredit_usaha_rakyat',
                        name: 'kredit_usaha_rakyat',
                    },
                    {
                        data: 'kredit_ketahanan_pangan_energi',
                        name: 'kredit_ketahanan_pangan_energi',
                    },
                    {
                        data: 'kredit_usaha_kecil',
                        name: 'kredit_usaha_kecil',
                    },
                    {
                        data: 'kelompok_usaha_bersama',
                        name: 'kelompok_usaha_bersama',
                    },

                    {
                        data: 'penerangan_jalan',
                        name: 'penerangan_jalan',
                    },
                    {
                        data: 'pra_transportrt',
                        name: 'pra_transportrt',
                    },
                    {
                        data: 'jalan_aspal',
                        name: 'jalan_aspal',
                    },
                    {
                        data: 'jalan_makadam',
                        name: 'jalan_makadam',
                    },
                    {
                        data: 'jalan_tanah',
                        name: 'jalan_tanah',
                    },
                    {
                        data: 'jalan_papan_atasaair',
                        name: 'jalan_papan_atasaair',
                    },
                    {
                        data: 'jalan_setapak',
                        name: 'jalan_setapak',
                    },
                    {
                        data: 'jalan_lainnya',
                        name: 'jalan_lainnya',
                    },
                    {
                        data: 'jalan_darat_roda4',
                        name: 'jalan_darat_roda4',
                    },
                    {
                        data: 'angkutanumum_trayek',
                        name: 'angkutanumum_trayek',
                    },
                    {
                        data: 'angkutanumum_opra',
                        name: 'angkutanumum_opra',
                    },
                    {
                        data: 'angkutanumum_jamopra',
                        name: 'angkutanumum_jamopra',
                    },
                    {
                        data: 'dermaga_laut',
                        name: 'dermaga_laut',
                    },
                    {
                        data: 'sinyalhp_bts',
                        name: 'sinyalhp_bts',
                    },
                    {
                        data: 'sinyalhp_telkom',
                        name: 'sinyalhp_telkom',
                    },
                    {
                        data: 'sinyalhp_indo',
                        name: 'sinyalhp_indo',
                    },
                    {
                        data: 'sinyalhp_xl',
                        name: 'sinyalhp_xl',
                    },
                    {
                        data: 'sinyalhp_hut',
                        name: 'sinyalhp_hut',
                    },
                    {
                        data: 'sinyalhp_psn',
                        name: 'sinyalhp_psn',
                    },
                    {
                        data: 'sinyalhp_smart',
                        name: 'sinyalhp_smart',
                    },
                    {
                        data: 'sinyalhp_bakrie',
                        name: 'sinyalhp_bakrie',
                    },
                    {
                        data: 'pos_pembantu',
                        name: 'pos_pembantu',
                    },
                    {
                        data: 'pos_keliling',
                        name: 'pos_keliling',
                    },
                    {
                        data: 'agen_jasa',
                        name: 'agen_jasa',
                    },
                    {
                        data: 'chanel_tvri',
                        name: 'chanel_tvri',
                    },
                    {
                        data: 'parabola_tvri',
                        name: 'parabola_tvri',
                    },
                    {
                        data: 'chanel_tvrid',
                        name: 'chanel_tvrid',
                    },
                    {
                        data: 'parabola_tvrid',
                        name: 'parabola_tvrid',
                    },
                    {
                        data: 'chanel_s',
                        name: 'chanel_s',
                    },
                    {
                        data: 'parabola_s',
                        name: 'parabola_s',
                    },
                    {
                        data: 'chanel_ln',
                        name: 'chanel_ln',
                    },
                    {
                        data: 'parabola_ln',
                        name: 'parabola_ln',
                    },
                    {
                        data: 'chanel_rri',
                        name: 'chanel_rri',
                    },
                    {
                        data: 'parabola_rri',
                        name: 'parabola_rri',
                    },
                    {
                        data: 'chanel_rrid',
                        name: 'chanel_rrid',
                    },
                    {
                        data: 'parabola_rrid',
                        name: 'parabola_rrid',
                    },
                    {
                        data: 'chanel_radios',
                        name: 'chanel_radios',
                    },
                    {
                        data: 'parabola_radios',
                        name: 'parabola_radios',
                    },
                    {
                        data: 'chanel_radiok',
                        name: 'chanel_radiok',
                    },
                    {
                        data: 'parabola_radiok',
                        name: 'parabola_radiok',
                    },
                    {
                        data: 'jumlah_lokasi_air',
                        name: 'jumlah_lokasi_air',
                    },
                    {
                        data: 'fasilitas_umump_pasar',
                        name: 'fasilitas_umump_pasar',
                    },
                    {
                        data: 'fasilitas_umump_stasiun',
                        name: 'fasilitas_umump_stasiun',
                    },
                    {
                        data: 'fasilitas_umump_terminal',
                        name: 'fasilitas_umump_terminal',
                    },
                    {
                        data: 'fasilitas_umump_kolong',
                        name: 'fasilitas_umump_kolong',
                    },
                    {
                        data: 'fasilitas_umump_pelabuhan',
                        name: 'fasilitas_umump_pelabuhan',
                    },
                    {
                        data: 'pemukiman_khusus_mewah',
                        name: 'pemukiman_khusus_mewah',
                    },
                    {
                        data: 'pemukiman_khusus_apart',
                        name: 'pemukiman_khusus_apart',
                    },
                    {
                        data: 'pemukiman_khusus_susun',
                        name: 'pemukiman_khusus_susun',
                    },
                    {
                        data: 'pemukiman_khusus_school',
                        name: 'pemukiman_khusus_school',
                    },
                    {
                        data: 'pemukiman_khusus_kos',
                        name: 'pemukiman_khusus_kos',
                    },
                    {
                        data: 'pemukiman_khusus_asrama',
                        name: 'pemukiman_khusus_asrama',
                    },
                    {
                        data: 'pemukiman_khusus_lp',
                        name: 'pemukiman_khusus_lp',
                    },

                    {
                        data: 'lingkungan_lsi',
                        name: 'lingkungan_lsi',
                    },
                    {
                        data: 'lingkungan_slno',
                        name: 'lingkungan_slno',
                    },
                    {
                        data: 'lingkungan_k',
                        name: 'lingkungan_k',
                    },
                    {
                        data: 'lingkungan_hl',
                        name: 'lingkungan_hl',
                    },
                    {
                        data: 'lingkungan_t',
                        name: 'lingkungan_t',
                    },
                    {
                        data: 'lingkungan_kte',
                        name: 'lingkungan_kte',
                    },
                    {
                        data: 'lingkungan_lgt',
                        name: 'lingkungan_lgt',
                    },
                    {
                        data: 'lingkungan_lpp',
                        name: 'lingkungan_lpp',
                    },
                    {
                        data: 'lingkungan_ah',
                        name: 'lingkungan_ah',
                    },
                    {
                        data: 'lingkungan_lpns',
                        name: 'lingkungan_lpns',
                    },
                    {
                        data: 'lingkungan_lpertambangan',
                        name: 'lingkungan_lpertambangan',
                    },
                    {
                        data: 'lingkungan_lperumahan',
                        name: 'lingkungan_lperumahan',
                    },
                    {
                        data: 'lingkungan_lperkantoran',
                        name: 'lingkungan_lperkantoran',
                    },
                    {
                        data: 'lingkungan_lindustri',
                        name: 'lingkungan_lindustri',
                    },
                    {
                        data: 'lingkungan_fu',
                        name: 'lingkungan_fu',
                    },
                    {
                        data: 'lingkungan_ll',
                        name: 'lingkungan_ll',
                    },
                    {
                        data: 'lingkungan_nsym',
                        name: 'lingkungan_nsym',
                    },
                    {
                        data: 'lingkungan_ndws',
                        name: 'lingkungan_ndws',
                    },
                    {
                        data: 'lingkungan_jma',
                        name: 'lingkungan_jma',
                    },
                    {
                        data: 'lingkungan_je',
                        name: 'lingkungan_je',
                    },
                    {
                        data: 'lingkungan_ksb',
                        name: 'lingkungan_ksb',
                    },
                    {
                        data: 'lingkungan_ks',
                        name: 'lingkungan_ks',
                    },
                    {
                        data: 'lingkungan_ki',
                        name: 'lingkungan_ki',
                    },
                    {
                        data: 'lingkungan_kd',
                        name: 'lingkungan_kd',
                    },
                    {
                        data: 'lingkungan_ke',
                        name: 'lingkungan_ke',
                    },
                    {
                        data: 'lingkungan_pair',
                        name: 'lingkungan_pair',
                    },
                    {
                        data: 'lingkungan_ptanah',
                        name: 'lingkungan_ptanah',
                    },
                    {
                        data: 'lingkungan_pudara',
                        name: 'lingkungan_pudara',
                    },
                    {
                        data: 'lingkungan_pdusl',
                        name: 'lingkungan_pdusl',
                    },
                    {
                        data: 'lingkungan_kmml',
                        name: 'lingkungan_kmml',
                    },
                    {
                        data: 'lingkungan_klpg',
                        name: 'lingkungan_klpg',
                    },

                    {
                        data: 'k_longsor',
                        name: 'k_longsor'
                    },
                    {
                        data: 'f_longsor',
                        name: 'f_longsor'
                    },
                    {
                        data: 'kj_longsor',
                        name: 'kj_longsor'
                    },
                    {
                        data: 'jp_longsor',
                        name: 'jp_longsor'
                    },
                    {
                        data: 'wt_longsor',
                        name: 'wt_longsor'
                    },
                    {
                        data: 'k_banjir',
                        name: 'k_banjir'
                    },
                    {
                        data: 'f_banjir',
                        name: 'f_banjir'
                    },
                    {
                        data: 'kj_banjir',
                        name: 'kj_banjir'
                    },
                    {
                        data: 'jp_banjir',
                        name: 'jp_banjir'
                    },
                    {
                        data: 'wt_banjir',
                        name: 'wt_banjir'
                    },
                    {
                        data: 'k_bandang',
                        name: 'k_bandang'
                    },
                    {
                        data: 'f_bandang',
                        name: 'f_bandang'
                    },
                    {
                        data: 'kj_bandang',
                        name: 'kj_bandang'
                    },
                    {
                        data: 'jp_bandang',
                        name: 'jp_bandang'
                    },
                    {
                        data: 'wt_bandang',
                        name: 'wt_bandang'
                    },
                    {
                        data: 'k_gempa',
                        name: 'k_gempa'
                    },
                    {
                        data: 'f_gempa',
                        name: 'f_gempa'
                    },
                    {
                        data: 'kj_gempa',
                        name: 'kj_gempa'
                    },
                    {
                        data: 'jp_gempa',
                        name: 'jp_gempa'
                    },
                    {
                        data: 'wt_gempa',
                        name: 'wt_gempa'
                    },
                    {
                        data: 'k_tsunami',
                        name: 'k_tsunami'
                    },
                    {
                        data: 'f_tsunami',
                        name: 'f_tsunami'
                    },
                    {
                        data: 'kj_tsunami',
                        name: 'kj_tsunami'
                    },
                    {
                        data: 'jp_tsunami',
                        name: 'jp_tsunami'
                    },
                    {
                        data: 'wt_tsunami',
                        name: 'wt_tsunami'
                    },
                    {
                        data: 'k_puyuh',
                        name: 'k_puyuh'
                    },
                    {
                        data: 'f_puyuh',
                        name: 'f_puyuh'
                    },
                    {
                        data: 'kj_puyuh',
                        name: 'kj_puyuh'
                    },
                    {
                        data: 'jp_puyuh',
                        name: 'jp_puyuh'
                    },
                    {
                        data: 'wt_puyuh',
                        name: 'wt_puyuh'
                    },
                    {
                        data: 'k_gunungm',
                        name: 'k_gunungm'
                    },
                    {
                        data: 'f_gunungm',
                        name: 'f_gunungm'
                    },
                    {
                        data: 'kj_gunungm',
                        name: 'kj_gunungm'
                    },
                    {
                        data: 'jp_gunungm',
                        name: 'jp_gunungm'
                    },
                    {
                        data: 'wt_gunungm',
                        name: 'wt_gunungm'
                    },
                    {
                        data: 'k_hutank',
                        name: 'k_hutank'
                    },
                    {
                        data: 'f_hutank',
                        name: 'f_hutank'
                    },
                    {
                        data: 'kj_hutank',
                        name: 'kj_hutank'
                    },
                    {
                        data: 'jp_hutank',
                        name: 'jp_hutank'
                    },
                    {
                        data: 'wt_hutank',
                        name: 'wt_hutank'
                    },
                    {
                        data: 'k_kekeringan',
                        name: 'k_kekeringan'
                    },
                    {
                        data: 'f_kekeringan',
                        name: 'f_kekeringan'
                    },
                    {
                        data: 'kj_kekeringan',
                        name: 'kj_kekeringan'
                    },
                    {
                        data: 'jp_kekeringan',
                        name: 'jp_kekeringan'
                    },
                    {
                        data: 'wt_kekeringan',
                        name: 'wt_kekeringan'
                    },

                    {
                        data: 'mitigasi_sp',
                        name: 'mitigasi_sp',
                    },
                    {
                        data: 'mitigasi_spd',
                        name: 'mitigasi_spd',
                    },
                    {
                        data: 'mitigasi_pk',
                        name: 'mitigasi_pk',
                    },
                    {
                        data: 'mitigasi_rrj',
                        name: 'mitigasi_rrj',
                    },
                    {
                        data: 'mitigasi_ppn',
                        name: 'mitigasi_ppn',
                    },

                    {
                        data: 'nama_paud',
                        name: 'nama_paud'
                    },
                    {
                        data: 'pemilik_paud',
                        name: 'pemilik_paud'
                    },
                    {
                        data: 'kondisi_paud',
                        name: 'kondisi_paud'
                    },
                    {
                        data: 'jumlahguru_paud',
                        name: 'jumlahguru_paud'
                    },
                    {
                        data: 'jumlahmurid_paud',
                        name: 'jumlahmurid_paud'
                    },
                    {
                        data: 'jumlahpegawai_paud',
                        name: 'jumlahpegawai_paud'
                    },
                    //2
                    {
                        data: 'nama_tk',
                        name: 'nama_tk'
                    },
                    {
                        data: 'pemilik_tk',
                        name: 'pemilik_tk'
                    },
                    {
                        data: 'kondisi_tk',
                        name: 'kondisi_tk'
                    },
                    {
                        data: 'jumlahguru_tk',
                        name: 'jumlahguru_tk'
                    },
                    {
                        data: 'jumlahmurid_tk',
                        name: 'jumlahmurid_tk'
                    },
                    {
                        data: 'jumlahpegawai_tk',
                        name: 'jumlahpegawai_tk'
                    },
                    //3
                    {
                        data: 'nama_sd',
                        name: 'nama_sd'
                    },
                    {
                        data: 'pemilik_sd',
                        name: 'pemilik_sd'
                    },
                    {
                        data: 'kondisi_sd',
                        name: 'kondisi_sd'
                    },
                    {
                        data: 'jumlahguru_sd',
                        name: 'jumlahguru_sd'
                    },
                    {
                        data: 'jumlahmurid_sd',
                        name: 'jumlahmurid_sd'
                    },
                    {
                        data: 'jumlahpegawai_sd',
                        name: 'jumlahpegawai_sd'
                    },
                    //4
                    {
                        data: 'nama_smp',
                        name: 'nama_smp'
                    },
                    {
                        data: 'pemilik_smp',
                        name: 'pemilik_smp'
                    },
                    {
                        data: 'kondisi_smp',
                        name: 'kondisi_smp'
                    },
                    {
                        data: 'jumlahguru_smp',
                        name: 'jumlahguru_smp'
                    },
                    {
                        data: 'jumlahmurid_smp',
                        name: 'jumlahmurid_smp'
                    },
                    {
                        data: 'jumlahpegawai_smp',
                        name: 'jumlahpegawai_smp'
                    },
                    //5
                    {
                        data: 'nama_smplb',
                        name: 'nama_smplb'
                    },
                    {
                        data: 'pemilik_smplb',
                        name: 'pemilik_smplb'
                    },
                    {
                        data: 'kondisi_smplb',
                        name: 'kondisi_smplb'
                    },
                    {
                        data: 'jumlahguru_smplb',
                        name: 'jumlahguru_smplb'
                    },
                    {
                        data: 'jumlahmurid_smplb',
                        name: 'jumlahmurid_smplb'
                    },
                    {
                        data: 'jumlahpegawai_smplb',
                        name: 'jumlahpegawai_smplb'
                    },
                    //6
                    {
                        data: 'nama_sma',
                        name: 'nama_sma'
                    },
                    {
                        data: 'pemilik_sma',
                        name: 'pemilik_sma'
                    },
                    {
                        data: 'kondisi_sma',
                        name: 'kondisi_sma'
                    },
                    {
                        data: 'jumlahguru_sma',
                        name: 'jumlahguru_sma'
                    },
                    {
                        data: 'jumlahmurid_sma',
                        name: 'jumlahmurid_sma'
                    },
                    {
                        data: 'jumlahpegawai_sma',
                        name: 'jumlahpegawai_sma'
                    },
                    //7
                    {
                        data: 'nama_smk',
                        name: 'nama_smk'
                    },
                    {
                        data: 'pemilik_smk',
                        name: 'pemilik_smk'
                    },
                    {
                        data: 'kondisi_smk',
                        name: 'kondisi_smk'
                    },
                    {
                        data: 'jumlahguru_smk',
                        name: 'jumlahguru_smk'
                    },
                    {
                        data: 'jumlahmurid_smk',
                        name: 'jumlahmurid_smk'
                    },
                    {
                        data: 'jumlahpegawai_smk',
                        name: 'jumlahpegawai_smk'
                    },
                    //8
                    {
                        data: 'nama_smalb',
                        name: 'nama_smalb'
                    },
                    {
                        data: 'pemilik_smalb',
                        name: 'pemilik_smalb'
                    },
                    {
                        data: 'kondisi_smalb',
                        name: 'kondisi_smalb'
                    },
                    {
                        data: 'jumlahguru_smalb',
                        name: 'jumlahguru_smalb'
                    },
                    {
                        data: 'jumlahmurid_smalb',
                        name: 'jumlahmurid_smalb'
                    },
                    {
                        data: 'jumlahpegawai_smalb',
                        name: 'jumlahpegawai_smalb'
                    },
                    //9
                    {
                        data: 'nama_akademi',
                        name: 'nama_akademi'
                    },
                    {
                        data: 'pemilik_akademi',
                        name: 'pemilik_akademi'
                    },
                    {
                        data: 'kondisi_akademi',
                        name: 'kondisi_akademi'
                    },
                    {
                        data: 'jumlahguru_akademi',
                        name: 'jumlahguru_akademi'
                    },
                    {
                        data: 'jumlahmurid_akademi',
                        name: 'jumlahmurid_akademi'
                    },
                    {
                        data: 'jumlahpegawai_akademi',
                        name: 'jumlahpegawai_akademi'
                    },
                    //10
                    {
                        data: 'nama_pesantren',
                        name: 'nama_pesantren'
                    },
                    {
                        data: 'pemilik_pesantren',
                        name: 'pemilik_pesantren'
                    },
                    {
                        data: 'kondisi_pesantren',
                        name: 'kondisi_pesantren'
                    },
                    {
                        data: 'jumlahguru_pesantren',
                        name: 'jumlahguru_pesantren'
                    },
                    {
                        data: 'jumlahmurid_pesantren',
                        name: 'jumlahmurid_pesantren'
                    },
                    {
                        data: 'jumlahpegawai_pesantren',
                        name: 'jumlahpegawai_pesantren'
                    },
                    //11
                    {
                        data: 'nama_madrasahdn',
                        name: 'nama_madrasahdn'
                    },
                    {
                        data: 'pemilik_madrasahdn',
                        name: 'pemilik_madrasahdn'
                    },
                    {
                        data: 'kondisi_madrasahdn',
                        name: 'kondisi_madrasahdn'
                    },
                    {
                        data: 'jumlahguru_madrasahdn',
                        name: 'jumlahguru_madrasahdn'
                    },
                    {
                        data: 'jumlahmurid_madrasahdn',
                        name: 'jumlahmurid_madrasahdn'
                    },
                    {
                        data: 'jumlahpegawai_madrasahdn',
                        name: 'jumlahpegawai_madrasahdn'
                    },
                    //12
                    {
                        data: 'nama_seminari',
                        name: 'nama_seminari'
                    },
                    {
                        data: 'pemilik_seminari',
                        name: 'pemilik_seminari'
                    },
                    {
                        data: 'kondisi_seminari',
                        name: 'kondisi_seminari'
                    },
                    {
                        data: 'jumlahguru_seminari',
                        name: 'jumlahguru_seminari'
                    },
                    {
                        data: 'jumlahmurid_seminari',
                        name: 'jumlahmurid_seminari'
                    },
                    {
                        data: 'jumlahpegawai_seminari',
                        name: 'jumlahpegawai_seminari'
                    },
                    //13
                    {
                        data: 'nama_sekolahag',
                        name: 'nama_sekolahag'
                    },
                    {
                        data: 'pemilik_sekolahag',
                        name: 'pemilik_sekolahag'
                    },
                    {
                        data: 'kondisi_sekolahag',
                        name: 'kondisi_sekolahag'
                    },
                    {
                        data: 'jumlahguru_sekolahag',
                        name: 'jumlahguru_sekolahag'
                    },
                    {
                        data: 'jumlahmurid_sekolahag',
                        name: 'jumlahmurid_sekolahag'
                    },
                    {
                        data: 'jumlahpegawai_sekolahag',
                        name: 'jumlahpegawai_sekolahag'
                    },
                    //13
                    {
                        data: 'nama_butaaksara',
                        name: 'nama_butaaksara'
                    },
                    {
                        data: 'pemilik_butaaksara',
                        name: 'pemilik_butaaksara'
                    },
                    {
                        data: 'kondisi_butaaksara',
                        name: 'kondisi_butaaksara'
                    },
                    {
                        data: 'jumlahguru_butaaksara',
                        name: 'jumlahguru_butaaksara'
                    },
                    {
                        data: 'jumlahmurid_butaaksara',
                        name: 'jumlahmurid_butaaksara'
                    },
                    {
                        data: 'jumlahpegawai_butaaksara',
                        name: 'jumlahpegawai_butaaksara'
                    },

                    //14
                    {
                        data: 'nama_paketa',
                        name: 'nama_paketa'
                    },
                    {
                        data: 'pemilik_paketa',
                        name: 'pemilik_paketa'
                    },
                    {
                        data: 'kondisi_paketa',
                        name: 'kondisi_paketa'
                    },
                    {
                        data: 'jumlahguru_paketa',
                        name: 'jumlahguru_paketa'
                    },
                    {
                        data: 'jumlahmurid_paketa',
                        name: 'jumlahmurid_paketa'
                    },
                    {
                        data: 'jumlahpegawai_paketa',
                        name: 'jumlahpegawai_paketa'
                    },

                    //15
                    {
                        data: 'nama_paketb',
                        name: 'nama_paketb'
                    },
                    {
                        data: 'pemilik_paketb',
                        name: 'pemilik_paketb'
                    },
                    {
                        data: 'kondisi_paketb',
                        name: 'kondisi_paketb'
                    },
                    {
                        data: 'jumlahguru_paketb',
                        name: 'jumlahguru_paketb'
                    },
                    {
                        data: 'jumlahmurid_paketb',
                        name: 'jumlahmurid_paketb'
                    },
                    {
                        data: 'jumlahpegawai_paketb',
                        name: 'jumlahpegawai_paketb'
                    },
                    //16
                    {
                        data: 'nama_paketc',
                        name: 'nama_paketc'
                    },
                    {
                        data: 'pemilik_paketc',
                        name: 'pemilik_paketc'
                    },
                    {
                        data: 'kondisi_paketc',
                        name: 'kondisi_paketc'
                    },
                    {
                        data: 'jumlahguru_paketc',
                        name: 'jumlahguru_paketc'
                    },
                    {
                        data: 'jumlahmurid_paketc',
                        name: 'jumlahmurid_paketc'
                    },
                    {
                        data: 'jumlahpegawai_paketc',
                        name: 'jumlahpegawai_paketc'
                    },
                    //17
                    {
                        data: 'nama_playgrup',
                        name: 'nama_playgrup'
                    },
                    {
                        data: 'pemilik_playgrup',
                        name: 'pemilik_playgrup'
                    },
                    {
                        data: 'kondisi_playgrup',
                        name: 'kondisi_playgrup'
                    },
                    {
                        data: 'jumlahguru_playgrup',
                        name: 'jumlahguru_playgrup'
                    },
                    {
                        data: 'jumlahmurid_playgrup',
                        name: 'jumlahmurid_playgrup'
                    },
                    {
                        data: 'jumlahpegawai_playgrup',
                        name: 'jumlahpegawai_playgrup'
                    },
                    //18
                    {
                        data: 'nama_penitipananak',
                        name: 'nama_penitipananak'
                    },
                    {
                        data: 'pemilik_penitipananak',
                        name: 'pemilik_penitipananak'
                    },
                    {
                        data: 'kondisi_penitipananak',
                        name: 'kondisi_penitipananak'
                    },
                    {
                        data: 'jumlahguru_penitipananak',
                        name: 'jumlahguru_penitipananak'
                    },
                    {
                        data: 'jumlahmurid_penitipananak',
                        name: 'jumlahmurid_penitipananak'
                    },
                    {
                        data: 'jumlahpegawai_penitipananak',
                        name: 'jumlahpegawai_penitipananak'
                    },
                    //19
                    {
                        data: 'nama_pendidikanq',
                        name: 'nama_pendidikanq'
                    },
                    {
                        data: 'pemilik_pendidikanq',
                        name: 'pemilik_pendidikanq'
                    },
                    {
                        data: 'kondisi_pendidikanq',
                        name: 'kondisi_pendidikanq'
                    },
                    {
                        data: 'jumlahguru_pendidikanq',
                        name: 'jumlahguru_pendidikanq'
                    },
                    {
                        data: 'jumlahmurid_pendidikanq',
                        name: 'jumlahmurid_pendidikanq'
                    },
                    {
                        data: 'jumlahpegawai_pendidikanq',
                        name: 'jumlahpegawai_pendidikanq'
                    },
                    //20
                    {
                        data: 'nama_bahasaas',
                        name: 'nama_bahasaas'
                    },
                    {
                        data: 'pemilik_bahasaas',
                        name: 'pemilik_bahasaas'
                    },
                    {
                        data: 'kondisi_bahasaas',
                        name: 'kondisi_bahasaas'
                    },
                    {
                        data: 'jumlahguru_bahasaas',
                        name: 'jumlahguru_bahasaas'
                    },
                    {
                        data: 'jumlahmurid_bahasaas',
                        name: 'jumlahmurid_bahasaas'
                    },
                    {
                        data: 'jumlahpegawai_bahasaas',
                        name: 'jumlahpegawai_bahasaas'
                    },
                    //21
                    {
                        data: 'nama_kursuskomp',
                        name: 'nama_kursuskomp'
                    },
                    {
                        data: 'pemilik_kursuskomp',
                        name: 'pemilik_kursuskomp'
                    },
                    {
                        data: 'kondisi_kursuskomp',
                        name: 'kondisi_kursuskomp'
                    },
                    {
                        data: 'jumlahguru_kursuskomp',
                        name: 'jumlahguru_kursuskomp'
                    },
                    {
                        data: 'jumlahmurid_kursuskomp',
                        name: 'jumlahmurid_kursuskomp'
                    },
                    {
                        data: 'jumlahpegawai_kursuskomp',
                        name: 'jumlahpegawai_kursuskomp'
                    },
                    //22
                    {
                        data: 'nama_kursusmenjahit',
                        name: 'nama_kursusmenjahit'
                    },
                    {
                        data: 'pemilik_kursusmenjahit',
                        name: 'pemilik_kursusmenjahit'
                    },
                    {
                        data: 'kondisi_kursusmenjahit',
                        name: 'kondisi_kursusmenjahit'
                    },
                    {
                        data: 'jumlahguru_kursusmenjahit',
                        name: 'jumlahguru_kursusmenjahit'
                    },
                    {
                        data: 'jumlahmurid_kursusmenjahit',
                        name: 'jumlahmurid_kursusmenjahit'
                    },
                    {
                        data: 'jumlahpegawai_kursusmenjahit',
                        name: 'jumlahpegawai_kursusmenjahit'
                    },
                    //23
                    {
                        data: 'nama_kursuskecantikan',
                        name: 'nama_kursuskecantikan'
                    },
                    {
                        data: 'pemilik_kursuskecantikan',
                        name: 'pemilik_kursuskecantikan'
                    },
                    {
                        data: 'kondisi_kursuskecantikan',
                        name: 'kondisi_kursuskecantikan'
                    },
                    {
                        data: 'jumlahguru_kursuskecantikan',
                        name: 'jumlahguru_kursuskecantikan'
                    },
                    {
                        data: 'jumlahmurid_kursuskecantikan',
                        name: 'jumlahmurid_kursuskecantikan'
                    },
                    {
                        data: 'jumlahpegawai_kursuskecantikan',
                        name: 'jumlahpegawai_kursuskecantikan'
                    },
                    //24
                    {
                        data: 'nama_kursusmontir',
                        name: 'nama_kursusmontir'
                    },
                    {
                        data: 'pemilik_kursusmontir',
                        name: 'pemilik_kursusmontir'
                    },
                    {
                        data: 'kondisi_kursusmontir',
                        name: 'kondisi_kursusmontir'
                    },
                    {
                        data: 'jumlahguru_kursusmontir',
                        name: 'jumlahguru_kursusmontir'
                    },
                    {
                        data: 'jumlahmurid_kursusmontir',
                        name: 'jumlahmurid_kursusmontir'
                    },
                    {
                        data: 'jumlahpegawai_kursusmontir',
                        name: 'jumlahpegawai_kursusmontir'
                    },
                    //25
                    {
                        data: 'nama_kursussetir',
                        name: 'nama_kursussetir'
                    },
                    {
                        data: 'pemilik_kursussetir',
                        name: 'pemilik_kursussetir'
                    },
                    {
                        data: 'kondisi_kursussetir',
                        name: 'kondisi_kursussetir'
                    },
                    {
                        data: 'jumlahguru_kursussetir',
                        name: 'jumlahguru_kursussetir'
                    },
                    {
                        data: 'jumlahmurid_kursussetir',
                        name: 'jumlahmurid_kursussetir'
                    },
                    {
                        data: 'jumlahpegawai_kursussetir',
                        name: 'jumlahpegawai_kursussetir'
                    },
                    //26
                    {
                        data: 'nama_kursuselektronik',
                        name: 'nama_kursuselektronik'
                    },
                    {
                        data: 'pemilik_kursuselektronik',
                        name: 'pemilik_kursuselektronik'
                    },
                    {
                        data: 'kondisi_kursuselektronik',
                        name: 'kondisi_kursuselektronik'
                    },
                    {
                        data: 'jumlahguru_kursuselektronik',
                        name: 'jumlahguru_kursuselektronik'
                    },
                    {
                        data: 'jumlahmurid_kursuselektronik',
                        name: 'jumlahmurid_kursuselektronik'
                    },
                    {
                        data: 'jumlahpegawai_kursuselektronik',
                        name: 'jumlahpegawai_kursuselektronik'
                    },
                    //27
                    {
                        data: 'nama_tataboga',
                        name: 'nama_tataboga'
                    },
                    {
                        data: 'pemilik_tataboga',
                        name: 'pemilik_tataboga'
                    },
                    {
                        data: 'kondisi_tataboga',
                        name: 'kondisi_tataboga'
                    },
                    {
                        data: 'jumlahguru_tataboga',
                        name: 'jumlahguru_tataboga'
                    },
                    {
                        data: 'jumlahmurid_tataboga',
                        name: 'jumlahmurid_tataboga'
                    },
                    {
                        data: 'jumlahpegawai_tataboga',
                        name: 'jumlahpegawai_tataboga'
                    },
                    //28
                    {
                        data: 'nama_kursusketik',
                        name: 'nama_kursusketik'
                    },
                    {
                        data: 'pemilik_kursusketik',
                        name: 'pemilik_kursusketik'
                    },
                    {
                        data: 'kondisi_kursusketik',
                        name: 'kondisi_kursusketik'
                    },
                    {
                        data: 'jumlahguru_kursusketik',
                        name: 'jumlahguru_kursusketik'
                    },
                    {
                        data: 'jumlahmurid_kursusketik',
                        name: 'jumlahmurid_kursusketik'
                    },
                    {
                        data: 'jumlahpegawai_kursusketik',
                        name: 'jumlahpegawai_kursusketik'
                    },
                    //29
                    {
                        data: 'nama_kursusakuntan',
                        name: 'nama_kursusakuntan'
                    },
                    {
                        data: 'pemilik_kursusakuntan',
                        name: 'pemilik_kursusakuntan'
                    },
                    {
                        data: 'kondisi_kursusakuntan',
                        name: 'kondisi_kursusakuntan'
                    },
                    {
                        data: 'jumlahguru_kursusakuntan',
                        name: 'jumlahguru_kursusakuntan'
                    },
                    {
                        data: 'jumlahmurid_kursusakuntan',
                        name: 'jumlahmurid_kursusakuntan'
                    },
                    {
                        data: 'jumlahpegawai_kursusakuntan',
                        name: 'jumlahpegawai_kursusakuntan'
                    },
                    //30
                    {
                        data: 'nama_kursuslain',
                        name: 'nama_kursuslain'
                    },
                    {
                        data: 'pemilik_kursuslain',
                        name: 'pemilik_kursuslain'
                    },
                    {
                        data: 'kondisi_kursuslain',
                        name: 'kondisi_kursuslain'
                    },
                    {
                        data: 'jumlahguru_kursuslain',
                        name: 'jumlahguru_kursuslain'
                    },
                    {
                        data: 'jumlahmurid_kursuslain',
                        name: 'jumlahmurid_kursuslain'
                    },
                    {
                        data: 'jumlahpegawai_kursuslain',
                        name: 'jumlahpegawai_kursuslain'
                    },

                    {
                        data: 'nama_rs',
                        name: 'nama_rs'
                    },
                    {
                        data: 'pemilik_rs',
                        name: 'pemilik_rs'
                    },
                    {
                        data: 'jd_rs',
                        name: 'jd_rs'
                    },
                    {
                        data: 'jb_rs',
                        name: 'jb_rs'
                    },
                    {
                        data: 'jts_rs',
                        name: 'jts_rs'
                    },
                    {
                        data: 'jp_rs',
                        name: 'jp_rs'
                    },
                    {
                        data: 'nama_rsb',
                        name: 'nama_rsb'
                    },
                    {
                        data: 'pemilik_rsb',
                        name: 'pemilik_rsb'
                    },
                    {
                        data: 'jd_rsb',
                        name: 'jd_rsb'
                    },
                    {
                        data: 'jb_rsb',
                        name: 'jb_rsb'
                    },
                    {
                        data: 'jts_rsb',
                        name: 'jts_rsb'
                    },
                    {
                        data: 'jp_rsb',
                        name: 'jp_rsb'
                    },
                    {
                        data: 'nama_pdri',
                        name: 'nama_pdri'
                    },
                    {
                        data: 'pemilik_pdri',
                        name: 'pemilik_pdri'
                    },
                    {
                        data: 'jd_pdri',
                        name: 'jd_pdri'
                    },
                    {
                        data: 'jb_pdri',
                        name: 'jb_pdri'
                    },
                    {
                        data: 'jts_pdri',
                        name: 'jts_pdri'
                    },
                    {
                        data: 'jp_pdri',
                        name: 'jp_pdri'
                    },
                    {
                        data: 'nama_ptri',
                        name: 'nama_ptri'
                    },
                    {
                        data: 'pemilik_ptri',
                        name: 'pemilik_ptri'
                    },
                    {
                        data: 'jd_ptri',
                        name: 'jd_ptri'
                    },
                    {
                        data: 'jb_ptri',
                        name: 'jb_ptri'
                    },
                    {
                        data: 'jts_ptri',
                        name: 'jts_ptri'
                    },
                    {
                        data: 'jp_ptri',
                        name: 'jp_ptri'
                    },
                    {
                        data: 'nama_pp',
                        name: 'nama_pp'
                    },
                    {
                        data: 'pemilik_pp',
                        name: 'pemilik_pp'
                    },
                    {
                        data: 'jd_pp',
                        name: 'jd_pp'
                    },
                    {
                        data: 'jb_pp',
                        name: 'jb_pp'
                    },
                    {
                        data: 'jts_pp',
                        name: 'jts_pp'
                    },
                    {
                        data: 'jp_pp',
                        name: 'jp_pp'
                    },
                    {
                        data: 'nama_pbp',
                        name: 'nama_pbp'
                    },
                    {
                        data: 'pemilik_pbp',
                        name: 'pemilik_pbp'
                    },
                    {
                        data: 'jd_pbp',
                        name: 'jd_pbp'
                    },
                    {
                        data: 'jb_pbp',
                        name: 'jb_pbp'
                    },
                    {
                        data: 'jts_pbp',
                        name: 'jts_pbp'
                    },
                    {
                        data: 'jp_pbp',
                        name: 'jp_pbp'
                    },
                    {
                        data: 'nama_tpd',
                        name: 'nama_tpd'
                    },
                    {
                        data: 'pemilik_tpd',
                        name: 'pemilik_tpd'
                    },
                    {
                        data: 'jd_tpd',
                        name: 'jd_tpd'
                    },
                    {
                        data: 'jb_tpd',
                        name: 'jb_tpd'
                    },
                    {
                        data: 'jts_tpd',
                        name: 'jts_tpd'
                    },
                    {
                        data: 'jp_tpd',
                        name: 'jp_tpd'
                    },
                    {
                        data: 'nama_rb',
                        name: 'nama_rb'
                    },
                    {
                        data: 'pemilik_rb',
                        name: 'pemilik_rb'
                    },
                    {
                        data: 'jd_rb',
                        name: 'jd_rb'
                    },
                    {
                        data: 'jb_rb',
                        name: 'jb_rb'
                    },
                    {
                        data: 'jts_rb',
                        name: 'jts_rb'
                    },
                    {
                        data: 'jp_rb',
                        name: 'jp_rb'
                    },
                    {
                        data: 'nama_tpb',
                        name: 'nama_tpb'
                    },
                    {
                        data: 'pemilik_tpb',
                        name: 'pemilik_tpb'
                    },
                    {
                        data: 'jd_tpb',
                        name: 'jd_tpb'
                    },
                    {
                        data: 'jb_tpb',
                        name: 'jb_tpb'
                    },
                    {
                        data: 'jts_tpb',
                        name: 'jts_tpb'
                    },
                    {
                        data: 'jp_tpb',
                        name: 'jp_tpb'
                    },
                    {
                        data: 'nama_poskedes',
                        name: 'nama_poskedes'
                    },
                    {
                        data: 'pemilik_poskedes',
                        name: 'pemilik_poskedes'
                    },
                    {
                        data: 'jd_poskedes',
                        name: 'jd_poskedes'
                    },
                    {
                        data: 'jb_poskedes',
                        name: 'jb_poskedes'
                    },
                    {
                        data: 'jts_poskedes',
                        name: 'jts_poskedes'
                    },
                    {
                        data: 'jp_poskedes',
                        name: 'jp_poskedes'
                    },

                    {
                        data: 'nama_polindes',
                        name: 'nama_polindes'
                    },
                    {
                        data: 'pemilik_polindes',
                        name: 'pemilik_polindes'
                    },
                    {
                        data: 'jd_polindes',
                        name: 'jd_polindes'
                    },
                    {
                        data: 'jb_polindes',
                        name: 'jb_polindes'
                    },
                    {
                        data: 'jts_polindes',
                        name: 'jts_polindes'
                    },
                    {
                        data: 'jp_polindes',
                        name: 'jp_polindes'
                    },
                    {
                        data: 'nama_apotik',
                        name: 'nama_apotik'
                    },
                    {
                        data: 'pemilik_apotik',
                        name: 'pemilik_apotik'
                    },
                    {
                        data: 'jd_apotik',
                        name: 'jd_apotik'
                    },
                    {
                        data: 'jb_apotik',
                        name: 'jb_apotik'
                    },
                    {
                        data: 'jts_apotik',
                        name: 'jts_apotik'
                    },
                    {
                        data: 'jp_apotik',
                        name: 'jp_apotik'
                    },
                    {
                        data: 'nama_tokojamu',
                        name: 'nama_tokojamu'
                    },
                    {
                        data: 'pemilik_tokojamu',
                        name: 'pemilik_tokojamu'
                    },
                    {
                        data: 'jd_tokojamu',
                        name: 'jd_tokojamu'
                    },
                    {
                        data: 'jb_tokojamu',
                        name: 'jb_tokojamu'
                    },
                    {
                        data: 'jts_tokojamu',
                        name: 'jts_tokojamu'
                    },
                    {
                        data: 'jp_tokojamu',
                        name: 'jp_tokojamu'
                    },
                    {
                        data: 'nama_posyandu',
                        name: 'nama_posyandu'
                    },
                    {
                        data: 'pemilik_posyandu',
                        name: 'pemilik_posyandu'
                    },
                    {
                        data: 'jd_posyandu',
                        name: 'jd_posyandu'
                    },
                    {
                        data: 'jb_posyandu',
                        name: 'jb_posyandu'
                    },
                    {
                        data: 'jts_posyandu',
                        name: 'jts_posyandu'
                    },
                    {
                        data: 'jp_posyandu',
                        name: 'jp_posyandu'
                    },
                    {
                        data: 'nama_posbindu',
                        name: 'nama_posbindu'
                    },
                    {
                        data: 'pemilik_posbindu',
                        name: 'pemilik_posbindu'
                    },
                    {
                        data: 'jd_posbindu',
                        name: 'jd_posbindu'
                    },
                    {
                        data: 'jb_posbindu',
                        name: 'jb_posbindu'
                    },
                    {
                        data: 'jts_posbindu',
                        name: 'jts_posbindu'
                    },
                    {
                        data: 'jp_posbindu',
                        name: 'jp_posbindu'
                    },
                    {
                        data: 'nama_tpd',
                        name: 'nama_tpd'
                    },
                    {
                        data: 'pemilik_tpd',
                        name: 'pemilik_tpd'
                    },
                    {
                        data: 'jd_tpd',
                        name: 'jd_tpd'
                    },
                    {
                        data: 'jb_tpd',
                        name: 'jb_tpd'
                    },
                    {
                        data: 'jts_tpd',
                        name: 'jts_tpd'
                    },
                    {
                        data: 'jp_tpd',
                        name: 'jp_tpd'
                    },

                    {
                        data: 'nama_muntaber',
                        name: 'nama_muntaber'
                    },
                    {
                        data: 'jp_muntaber',
                        name: 'jp_muntaber'
                    },
                    {
                        data: 'jm_muntaber',
                        name: 'jm_muntaber'
                    },
                    {
                        data: 'nama_dbd',
                        name: 'nama_dbd'
                    },
                    {
                        data: 'jp_dbd',
                        name: 'jp_dbd'
                    },
                    {
                        data: 'jm_dbd',
                        name: 'jm_dbd'
                    },
                    {
                        data: 'nama_campak',
                        name: 'nama_campak'
                    },
                    {
                        data: 'jp_campak',
                        name: 'jp_campak'
                    },
                    {
                        data: 'jm_campak',
                        name: 'jm_campak'
                    },
                    {
                        data: 'nama_malaria',
                        name: 'nama_malaria'
                    },
                    {
                        data: 'jp_malaria',
                        name: 'jp_malaria'
                    },
                    {
                        data: 'jm_malaria',
                        name: 'jm_malaria'
                    },
                    {
                        data: 'nama_fluburung',
                        name: 'nama_fluburung'
                    },
                    {
                        data: 'jp_fluburung',
                        name: 'jp_fluburung'
                    },
                    {
                        data: 'jm_fluburung',
                        name: 'jm_fluburung'
                    },
                    {
                        data: 'nama_covid19',
                        name: 'nama_covid19'
                    },
                    {
                        data: 'jp_covid19',
                        name: 'jp_covid19'
                    },
                    {
                        data: 'jm_covid19',
                        name: 'jm_covid19'
                    },
                    {
                        data: 'nama_hepatitisb',
                        name: 'nama_hepatitisb'
                    },
                    {
                        data: 'jp_hepatitisb',
                        name: 'jp_hepatitisb'
                    },
                    {
                        data: 'jm_hepatitisb',
                        name: 'jm_hepatitisb'
                    },
                    {
                        data: 'nama_hepatitise',
                        name: 'nama_hepatitise'
                    },
                    {
                        data: 'jp_hepatitise',
                        name: 'jp_hepatitise'
                    },
                    {
                        data: 'jm_hepatitise',
                        name: 'jm_hepatitise'
                    },
                    {
                        data: 'nama_dipteri',
                        name: 'nama_dipteri'
                    },
                    {
                        data: 'jp_dipteri',
                        name: 'jp_dipteri'
                    },
                    {
                        data: 'jm_dipteri',
                        name: 'jm_dipteri'
                    },
                    {
                        data: 'nama_chikung',
                        name: 'nama_chikung'
                    },
                    {
                        data: 'jp_chikung',
                        name: 'jp_chikung'
                    },
                    {
                        data: 'jm_chikung',
                        name: 'jm_chikung'
                    },
                    {
                        data: 'nama_leptos',
                        name: 'nama_leptos'
                    },
                    {
                        data: 'jp_leptos',
                        name: 'jp_leptos'
                    },
                    {
                        data: 'jm_leptos',
                        name: 'jm_leptos'
                    },
                    {
                        data: 'nama_kolera',
                        name: 'nama_kolera'
                    },
                    {
                        data: 'jp_kolera',
                        name: 'jp_kolera'
                    },
                    {
                        data: 'jm_kolera',
                        name: 'jm_kolera'
                    },
                    {
                        data: 'nama_giziburuk',
                        name: 'nama_giziburuk'
                    },
                    {
                        data: 'jp_giziburuk',
                        name: 'jp_giziburuk'
                    },
                    {
                        data: 'jm_giziburuk',
                        name: 'jm_giziburuk'
                    },
                    {
                        data: 'nama_lainnya',
                        name: 'nama_lainnya'
                    },
                    {
                        data: 'jp_lainnya',
                        name: 'jp_lainnya'
                    },
                    {
                        data: 'jm_lainnya',
                        name: 'jm_lainnya'
                    },

                    {
                        data: 'jumlahwarga_jamkes',
                        name: 'jumlahwarga_jamkes',
                    },
                    {
                        data: 'jumlahwarga_jamketerangan',
                        name: 'jumlahwarga_jamketerangan',
                    },
                    {
                        data: 'jumlahtempat_masjid',
                        name: 'jumlahtempat_masjid',
                    },
                    {
                        data: 'jumlahtempat_musholla',
                        name: 'jumlahtempat_musholla',
                    },
                    {
                        data: 'jumlahtempat_kristen',
                        name: 'jumlahtempat_kristen',
                    },
                    {
                        data: 'jumlahtempat_katolik',
                        name: 'jumlahtempat_katolik',
                    },
                    {
                        data: 'jumlahtempat_kapel',
                        name: 'jumlahtempat_kapel',
                    },
                    {
                        data: 'jumlahtempat_pura',
                        name: 'jumlahtempat_pura',
                    },
                    {
                        data: 'jumlahtempat_wihara',
                        name: 'jumlahtempat_wihara',
                    },
                    {
                        data: 'jumlahtempat_kelenteng',
                        name: 'jumlahtempat_kelenteng',
                    },
                    {
                        data: 'jumlahtempat_lainnya',
                        name: 'jumlahtempat_lainnya',
                    },
                    {
                        data: 'cagar_bud1',
                        name: 'cagar_bud1',
                    },
                    {
                        data: 'cagar_bud2',
                        name: 'cagar_bud2',
                    },
                    {
                        data: 'cagar_bud3',
                        name: 'cagar_bud3',
                    },
                    {
                        data: 'sukuasing_keluarga',
                        name: 'sukuasing_keluarga',
                    },
                    {
                        data: 'sukuasing_jiwa',
                        name: 'sukuasing_jiwa',
                    },
                    {
                        data: 'ruangpublik_terbuka',
                        name: 'ruangpublik_terbuka',
                    },
                    {
                        data: 'adat_kehamilan',
                        name: 'adat_kehamilan',
                    },
                    {
                        data: 'adat_kelahiran',
                        name: 'adat_kelahiran',
                    },
                    {
                        data: 'adat_pekerjaan',
                        name: 'adat_pekerjaan',
                    },
                    {
                        data: 'adat_alam',
                        name: 'adat_alam',
                    },
                    {
                        data: 'adat_perkawinan',
                        name: 'adat_perkawinan',
                    },
                    {
                        data: 'adat_kehidupanwarga',
                        name: 'adat_kehidupanwarga',
                    },
                    {
                        data: 'adat_kematian',
                        name: 'adat_kematian',
                    },
                    {
                        data: 'namalembaga',
                        name: 'namalembaga',
                    },
                    {
                        data: 'jumlah_peng',
                        name: 'jumlah_peng',
                    },
                    {
                        data: 'jumlah_ang',
                        name: 'jumlah_ang',
                    },
                    {
                        data: 'fasilitas',
                        name: 'fasilitas',
                    },

                    {
                        data: 'namalembagamas',
                        name: 'namalembagamas',
                    },
                    {
                        data: 'jumlah_kel',
                        name: 'jumlah_kel',
                    },
                    {
                        data: 'jumlah_peng',
                        name: 'jumlah_peng',
                    },
                    {
                        data: 'jumlah_ang',
                        name: 'jumlah_ang',
                    },
                    {
                        data: 'fasilitas',
                        name: 'fasilitas',
                    },
                    {
                        data: 'penyebabu_antarkelompokmas',
                        name: 'penyebabu_antarkelompokmas',
                    },
                    {
                        data: 'jk_antarkelompokmas',
                        name: 'jk_antarkelompokmas',
                    },
                    {
                        data: 'jkl_antarkelompokmas',
                        name: 'jkl_antarkelompokmas',
                    },
                    {
                        data: 'jt_antarkelompokmas',
                        name: 'jt_antarkelompokmas',
                    },
                    {
                        data: 'pen_antarkelompokmas',
                        name: 'pen_antarkelompokmas',
                    },
                    {
                        data: 'pp_antarkelompokmas',
                        name: 'pp_antarkelompokmas',
                    },
                    {
                        data: 'penyebabu_antardesa',
                        name: 'penyebabu_antardesa',
                    },
                    {
                        data: 'jk_antardesa',
                        name: 'jk_antardesa',
                    },
                    {
                        data: 'jkl_antardesa',
                        name: 'jkl_antardesa',
                    },
                    {
                        data: 'jt_antardesa',
                        name: 'jt_antardesa',
                    },
                    {
                        data: 'pen_antardesa',
                        name: 'pen_antardesa',
                    },
                    {
                        data: 'pp_antardesa',
                        name: 'pp_antardesa',
                    },
                    {
                        data: 'penyebabu_aparatmk',
                        name: 'penyebabu_aparatmk',
                    },
                    {
                        data: 'jk_aparatmk',
                        name: 'jk_aparatmk',
                    },
                    {
                        data: 'jkl_aparatmk',
                        name: 'jkl_aparatmk',
                    },
                    {
                        data: 'jt_aparatmk',
                        name: 'jt_aparatmk',
                    },
                    {
                        data: 'pen_aparatmk',
                        name: 'pen_aparatmk',
                    },
                    {
                        data: 'pp_aparatmk',
                        name: 'pp_aparatmk',
                    },
                    {
                        data: 'penyebabu_aparatmp',
                        name: 'penyebabu_aparatmp',
                    },
                    {
                        data: 'jk_aparatmp',
                        name: 'jk_aparatmp',
                    },
                    {
                        data: 'jkl_aparatmp',
                        name: 'jkl_aparatmp',
                    },
                    {
                        data: 'jt_aparatmp',
                        name: 'jt_aparatmp',
                    },
                    {
                        data: 'pen_aparatmp',
                        name: 'pen_aparatmp',
                    },
                    {
                        data: 'pp_aparatmp',
                        name: 'pp_aparatmp',
                    },
                    {
                        data: 'penyebabu_aparatk',
                        name: 'penyebabu_aparatk',
                    },
                    {
                        data: 'jk_aparatk',
                        name: 'jk_aparatk',
                    },
                    {
                        data: 'jkl_aparatk',
                        name: 'jkl_aparatk',
                    },
                    {
                        data: 'jt_aparatk',
                        name: 'jt_aparatk',
                    },
                    {
                        data: 'pen_aparatk',
                        name: 'pen_aparatk',
                    },
                    {
                        data: 'pp_aparatk',
                        name: 'pp_aparatk',
                    },
                    {
                        data: 'penyebabu_aparatp',
                        name: 'penyebabu_aparatp',
                    },
                    {
                        data: 'jk_aparatp',
                        name: 'jk_aparatp',
                    },
                    {
                        data: 'jkl_aparatp',
                        name: 'jkl_aparatp',
                    },
                    {
                        data: 'jt_aparatp',
                        name: 'jt_aparatp',
                    },
                    {
                        data: 'pen_aparatp',
                        name: 'pen_aparatp',
                    },
                    {
                        data: 'pp_aparatp',
                        name: 'pp_aparatp',
                    },
                    {
                        data: 'penyebabu_pelajar',
                        name: 'penyebabu_pelajar',
                    },
                    {
                        data: 'jk_pelajar',
                        name: 'jk_pelajar',
                    },
                    {
                        data: 'jkl_pelajar',
                        name: 'jkl_pelajar',
                    },
                    {
                        data: 'jt_pelajar',
                        name: 'jt_pelajar',
                    },
                    {
                        data: 'pen_pelajar',
                        name: 'pen_pelajar',
                    },
                    {
                        data: 'pp_pelajar',
                        name: 'pp_pelajar',
                    },
                    {
                        data: 'penyebabu_suku',
                        name: 'penyebabu_suku',
                    },
                    {
                        data: 'jk_suku',
                        name: 'jk_suku',
                    },
                    {
                        data: 'jkl_suku',
                        name: 'jkl_suku',
                    },
                    {
                        data: 'jt_suku',
                        name: 'jt_suku',
                    },
                    {
                        data: 'pen_suku',
                        name: 'pen_suku',
                    },
                    {
                        data: 'pp_suku',
                        name: 'pp_suku',
                    },
                    {
                        data: 'penyebabu_lainnya',
                        name: 'penyebabu_lainnya',
                    },
                    {
                        data: 'jk_lainnya',
                        name: 'jk_lainnya',
                    },
                    {
                        data: 'jkl_lainnya',
                        name: 'jkl_lainnya',
                    },
                    {
                        data: 'jt_lainnya',
                        name: 'jt_lainnya',
                    },
                    {
                        data: 'pen_lainnya',
                        name: 'pen_lainnya',
                    },
                    {
                        data: 'pp_lainnya',
                        name: 'pp_lainnya',
                    },

                    {
                        data: 'jk_pencurian',
                        name: 'jk_pencurian'
                    },
                    {
                        data: 'jumlahselesai_pencurian',
                        name: 'jumlahselesai_pencurian'
                    },
                    {
                        data: 'jktbd_pencurian',
                        name: 'jktbd_pencurian'
                    },
                    {
                        data: 'kll_pencurian',
                        name: 'kll_pencurian'
                    },
                    {
                        data: 'kt_pencurian',
                        name: 'kt_pencurian'
                    },
                    {
                        data: 'jk_pencuriankeras',
                        name: 'jk_pencuriankeras'
                    },
                    {
                        data: 'jumlahselesai_pencuriankeras',
                        name: 'jumlahselesai_pencuriankeras'
                    },
                    {
                        data: 'jktbd_pencuriankeras',
                        name: 'jktbd_pencuriankeras'
                    },
                    {
                        data: 'kll_pencuriankeras',
                        name: 'kll_pencuriankeras'
                    },
                    {
                        data: 'kt_pencuriankeras',
                        name: 'kt_pencuriankeras'
                    },
                    {
                        data: 'jk_penipuan',
                        name: 'jk_penipuan'
                    },
                    {
                        data: 'jumlahselesai_penipuan',
                        name: 'jumlahselesai_penipuan'
                    },
                    {
                        data: 'jktbd_penipuan',
                        name: 'jktbd_penipuan'
                    },
                    {
                        data: 'kll_penipuan',
                        name: 'kll_penipuan'
                    },
                    {
                        data: 'kt_penipuan',
                        name: 'kt_penipuan'
                    },
                    {
                        data: 'jk_penganiyayaan',
                        name: 'jk_penganiyayaan'
                    },
                    {
                        data: 'jumlahselesai_penganiyayaan',
                        name: 'jumlahselesai_penganiyayaan'
                    },
                    {
                        data: 'jktbd_penganiyayaan',
                        name: 'jktbd_penganiyayaan'
                    },
                    {
                        data: 'kll_penganiyayaan',
                        name: 'kll_penganiyayaan'
                    },
                    {
                        data: 'kt_penganiyayaan',
                        name: 'kt_penganiyayaan'
                    },
                    {
                        data: 'jk_pembakaran',
                        name: 'jk_pembakaran'
                    },
                    {
                        data: 'jumlahselesai_pembakaran',
                        name: 'jumlahselesai_pembakaran'
                    },
                    {
                        data: 'jktbd_pembakaran',
                        name: 'jktbd_pembakaran'
                    },
                    {
                        data: 'kll_pembakaran',
                        name: 'kll_pembakaran'
                    },
                    {
                        data: 'kt_pembakaran',
                        name: 'kt_pembakaran'
                    },
                    {
                        data: 'jk_pemerkosaan',
                        name: 'jk_pemerkosaan'
                    },
                    {
                        data: 'jumlahselesai_pemerkosaan',
                        name: 'jumlahselesai_pemerkosaan'
                    },
                    {
                        data: 'jktbd_pemerkosaan',
                        name: 'jktbd_pemerkosaan'
                    },
                    {
                        data: 'kll_pemerkosaan',
                        name: 'kll_pemerkosaan'
                    },
                    {
                        data: 'kt_pemerkosaan',
                        name: 'kt_pemerkosaan'
                    },
                    {
                        data: 'jk_narkoba',
                        name: 'jk_narkoba'
                    },
                    {
                        data: 'jumlahselesai_narkoba',
                        name: 'jumlahselesai_narkoba'
                    },
                    {
                        data: 'jktbd_narkoba',
                        name: 'jktbd_narkoba'
                    },
                    {
                        data: 'kll_narkoba',
                        name: 'kll_narkoba'
                    },
                    {
                        data: 'kt_narkoba',
                        name: 'kt_narkoba'
                    },
                    {
                        data: 'jk_perjudian',
                        name: 'jk_perjudian'
                    },
                    {
                        data: 'jumlahselesai_perjudian',
                        name: 'jumlahselesai_perjudian'
                    },
                    {
                        data: 'jktbd_perjudian',
                        name: 'jktbd_perjudian'
                    },
                    {
                        data: 'kll_perjudian',
                        name: 'kll_perjudian'
                    },
                    {
                        data: 'kt_perjudian',
                        name: 'kt_perjudian'
                    },
                    {
                        data: 'jk_pembunuhan',
                        name: 'jk_pembunuhan'
                    },
                    {
                        data: 'jumlahselesai_pembunuhan',
                        name: 'jumlahselesai_pembunuhan'
                    },
                    {
                        data: 'jktbd_pembunuhan',
                        name: 'jktbd_pembunuhan'
                    },
                    {
                        data: 'kll_pembunuhan',
                        name: 'kll_pembunuhan'
                    },
                    {
                        data: 'kt_pembunuhan',
                        name: 'kt_pembunuhan'
                    },
                    {
                        data: 'jk_perdaganganorang',
                        name: 'jk_perdaganganorang'
                    },
                    {
                        data: 'jumlahselesai_perdaganganorang',
                        name: 'jumlahselesai_perdaganganorang'
                    },
                    {
                        data: 'jktbd_perdaganganorang',
                        name: 'jktbd_perdaganganorang'
                    },
                    {
                        data: 'kll_perdaganganorang',
                        name: 'kll_perdaganganorang'
                    },
                    {
                        data: 'kt_perdaganganorang',
                        name: 'kt_perdaganganorang'
                    },
                    {
                        data: 'jk_korupsi',
                        name: 'jk_korupsi'
                    },
                    {
                        data: 'jumlahselesai_korupsi',
                        name: 'jumlahselesai_korupsi'
                    },
                    {
                        data: 'jktbd_korupsi',
                        name: 'jktbd_korupsi'
                    },
                    {
                        data: 'kll_korupsi',
                        name: 'kll_korupsi'
                    },
                    {
                        data: 'kt_korupsi',
                        name: 'kt_korupsi'
                    },
                    {
                        data: 'jk_lainnya',
                        name: 'jk_lainnya'
                    },
                    {
                        data: 'jumlahselesai_lainnya',
                        name: 'jumlahselesai_lainnya'
                    },
                    {
                        data: 'jktbd_lainnya',
                        name: 'jktbd_lainnya'
                    },
                    {
                        data: 'kll_lainnya',
                        name: 'kll_lainnya'
                    },
                    {
                        data: 'kt_lainnya',
                        name: 'kt_lainnya'
                    },

                    {
                        data: 'jumlah_kpp',
                        name: 'jumlah_kpp',
                    },
                    {
                        data: 'jumlah_ppr',
                        name: 'jumlah_ppr',
                    },
                    {
                        data: 'jumlah_hansip',
                        name: 'jumlah_hansip',
                    },
                    {
                        data: 'pelaporan_tamu_lebih24',
                        name: 'pelaporan_tamu_lebih24',
                    },
                    {
                        data: 'sistem_keamanan',
                        name: 'sistem_keamanan',
                    },
                    {
                        data: 'sistem_linmas',
                        name: 'sistem_linmas',
                    },
                    {
                        data: 'jumlahpos_digunakan',
                        name: 'jumlahpos_digunakan',
                    },
                    {
                        data: 'jumlahpos_tidakdigunakan',
                        name: 'jumlahpos_tidakdigunakan',
                    },
                    {
                        data: 'jarak_ppt',
                        name: 'jarak_ppt',
                    },
                    {
                        data: 'kemudahan_ppt',
                        name: 'kemudahan_ppt',
                    },
                    {
                        data: 'jarak_korban',
                        name: 'jarak_korban',
                    },
                    {
                        data: 'jarak_lokasikumpul',
                        name: 'jarak_lokasikumpul',
                    },
                    {
                        data: 'jarak_mangkal',
                        name: 'jarak_mangkal',
                    },
                    {
                        data: 'jarak_lokalisasi',
                        name: 'jarak_lokalisasi',
                    },
                ],
            });

            $('#search_nik').on('keyup', function() {
                        $('#tabledatart').DataTable().ajax.reload();
                    });


            function newexportaction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function(e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function(e, settings) {
                        // Call the original action function
                        if (button[0].className.indexOf('buttons-copy') >= 0) {
                            $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button,
                                config);
                        } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                            $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt,
                                    button, config) :
                                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt,
                                    button, config);
                        } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                            $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button,
                                    config) :
                                $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button,
                                    config);
                        } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                            $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button,
                                    config) :
                                $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button,
                                    config);
                        } else if (button[0].className.indexOf('buttons-print') >= 0) {
                            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                        }
                        dt.one('preXhr', function(e, s, data) {
                            // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                            // Set the property to what it was before exporting.
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export settings
                dt.ajax.reload();
            }
        });
    </script>


@endsection
