<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

// ==== Semua model RT ====
use App\Models\lembaga_masyarakat;
use App\Models\rt_agama;
use App\Models\rt_bencana;
use App\Models\rt_fasilitas_ekonomi;
use App\Models\rt_infrastuktur;
use App\Models\rt_keamanan;
use App\Models\rt_kejadianluarbiasa;
use App\Models\rt_kesehatan;
use App\Models\rt_lingkungan;
use App\Models\rt_mitigasib;
use App\Models\rt_sarana_ekonomi;
use App\Models\rt_saranapendidikan;
use App\Models\rt_tkejahatan;
use App\Models\rtindustri;
use App\Models\rtkegiatan_warga;
use App\Models\rtlembaga_ekonomi;
use App\Models\rtlembaga_keagamaan;
use App\Models\rtlokasi;
use App\Models\rtpuengurus;

class DataRtImport implements ToCollection
{
    /**
     * SUSUNAN KOLOM UMUM (index mulai 0)
     *  0: KK
     *  1: NIK
     *  2: Gelar Awal
     *  3: Nama
     *  4: Gelar Akhir
     *  5: Jenis Kelamin   (Jeniskelamin)
     *  6: Tempat Lahir    (tempatlahir)
     *
     *  Mulai index 7 ke atas = kolom spesifik RT.
     */
    private array $idx = [
    // ====== KOLOM UMUM (0–6) ======
    // 0: kk, 1: nik, 2: gelarawal, 3: nama, 4: gelarakhir, 5: Jeniskelamin, 6: tempatlahir

    // ====== 1) rtlokasi ======
    'lokasi_rt_pulau'                    => 7,
    'topo_terluas_rt'                    => 8,
    'jumlah_warga_lereng'                => 9,
    'penanaman_pohon_lahan_kritis'       => 10,
    'pantai_garis_panjang'               => 11,
    'pemanfaatan_laut_perangkap'         => 12,
    'pemanfaatan_laut_budidaya'          => 13,
    'pemanfaatan_laut_tambakg'           => 14,
    'pemanfaatan_laut_bahari'            => 15,
    'pemanfaatan_laut_transport'         => 16,
    'kondisi_mangrove'                   => 17,
    'penanaman_mangrove'                 => 18,
    'jumlah_warga_pesisir'               => 19,
    'jumlah_warga_atasair'               => 20,
    'wilayah_desa_dalamhutan'            => 21,
    'wilayah_desa_tepihutan'             => 22,
    'fungsihutan_kons'                   => 23,
    'fungsihutan_lindung'                => 24,
    'fungsihutan_produk'                 => 25,
    'fungsihutan_hutandes'               => 26,
    'jumlahwarga_tinggal_dalamhutan'     => 27,
    'jumlahwarga_tinggal_sekitarhutan'   => 28,
    'ketergantungan_hutan'               => 29,
    'reboisasi'                          => 30,
    'jumlah_produk_luardesa_masuk'       => 31,
    'jumlah_produk_luardesa_keluar'      => 32,

    // ====== 2) rtpuengurus ======
    'nama_ketuarw'                       => 33,
    'nik_ketuarw'                        => 34,
    'nohp_ketuarw'                       => 35,
    'menjabat_ketuarw'                   => 36,
    'nama_sekrw'                         => 37,
    'nik_sekrw'                          => 38,
    'nohp_sekrw'                         => 39,
    'menjabat_sekrw'                     => 40,
    'nama_benrw'                         => 41,
    'nik_benrw'                          => 42,
    'nohp_benrw'                         => 43,
    'menjabat_benrw'                     => 44,
    'nama_ketuart'                       => 45,
    'nik_ketuart'                        => 46,
    'nohp_ketuart'                       => 47,
    'menjabat_ketuart'                   => 48,
    'nama_sekrt'                         => 49,
    'nik_sekrt'                          => 50,
    'nohp_sekrt'                         => 51,
    'menjabat_sekrt'                     => 52,
    'nama_benrt'                         => 53,
    'nik_benrt'                          => 54,
    'nohp_benrt'                         => 55,
    'menjabat_benrt'                     => 56,

    // ====== 3) rtlembaga_ekonomi ======
    'agentik_jp'                         => 57,
    'agentik_jtk'                        => 58,
    'jtri_sentra'                        => 59,
    'jtri_lingkungan'                    => 60,
    'jtri_kampung'                       => 61,
    'diskotik_kpd'                       => 62,
    'diskotik_jtl'                       => 63,
    'lpg_kpapm'                          => 64,
    'lpg_kpapg'                          => 65,
    'koperasi_jumlah'                    => 66,
    'koperasi_kudproduksi'               => 67,
    'koperasi_kudkredit'                 => 68,
    'koperasi_kudkegiatan'               => 69,
    'koperasi_kudindustrik'              => 70,
    'koperasi_kudksp'                    => 71,
    'koperasi_kudksu'                    => 72,
    'koperasi_kudlainnya'                => 73,
    'kos_kud'                            => 74,
    'kos_bumdes'                         => 75,
    'kos_selain'                         => 76,

    // ====== 4) rtindustri ======
    'jumlahindustrik_kulit'              => 77,
    'jumlahindustris_kulit'              => 78,
    'jumlahmanajemen_kulit'              => 79,
    'jumlahpekerja_kulit'                => 80,
    'jumlahindustrik_kayu'               => 81,
    'jumlahindustris_kayu'               => 82,
    'jumlahmanajemen_kayu'               => 83,
    'jumlahpekerja_kayu'                 => 84,
    'jumlahindustrik_logam'              => 85,
    'jumlahindustris_logam'              => 86,
    'jumlahmanajemen_logam'              => 87,
    'jumlahpekerja_logam'                => 88,
    'jumlahindustrik_logamb'             => 89,
    'jumlahindustris_logamb'             => 90,
    'jumlahmanajemen_logamb'             => 91,
    'jumlahpekerja_logamb'               => 92,
    'jumlahindustrik_kain'               => 93,
    'jumlahindustris_kain'               => 94,
    'jumlahmanajemen_kain'               => 95,
    'jumlahpekerja_kain'                 => 96,
    'jumlahindustrik_keramik'            => 97,
    'jumlahindustris_keramik'            => 98,
    'jumlahmanajemen_keramik'            => 99,
    'jumlahpekerja_keramik'              => 100,
    'jumlahindustrik_genteng'            => 101,
    'jumlahindustris_genteng'            => 102,
    'jumlahmanajemen_genteng'            => 103,
    'jumlahpekerja_genteng'              => 104,
    'jumlahindustrik_anyaman'            => 105,
    'jumlahindustris_anyaman'            => 106,
    'jumlahmanajemen_anyaman'            => 107,
    'jumlahpekerja_anyaman'              => 108,
    'jumlahindustrik_makanan'            => 109,
    'jumlahindustris_makanan'            => 110,
    'jumlahmanajemen_makanan'            => 111,
    'jumlahpekerja_makanan'              => 112,
    'jumlahindustrik_lainnya'            => 113,
    'jumlahindustris_lainnya'            => 114,
    'jumlahmanajemen_lainnya'            => 115,
    'jumlahpekerja_lainnya'              => 116,

    // ====== 5) rt_sarana_ekonomi ======
    'jumlah_toko'                        => 117,
    'kondisi_toko'                       => 118,
    'Jarak_toko'                         => 119,
    'kemudahan_toko'                     => 120,

    'jumlah_pasar_permanen'              => 121,
    'kondisi_pasar_permanen'             => 122,
    'Jarak_pasar_permanen'               => 123,
    'kemudahan_pasar_permanen'           => 124,

    'jumlah_semip'                       => 125,
    'kondisi_semip'                      => 126,
    'Jarak_semip'                        => 127,
    'kemudahan_semip'                    => 128,

    'jumlah_tanpap'                      => 129,
    'kondisi_tanpap'                     => 130,
    'Jarak_tanpap'                       => 131,
    'kemudahan_tanpap'                   => 132,

    'jumlah_minimarket'                  => 133,
    'kondisi_minimarket'                 => 134,
    'Jarak_minimarket'                   => 135,
    'kemudahan_minimarket'               => 136,

    'jumlah_warungk'                     => 137,
    'kondisi_warungk'                    => 138,
    'Jarak_warungk'                      => 139,
    'kemudahan_warungk'                  => 140,

    'jumlah_warungp'                     => 141,
    'kondisi_warungp'                    => 142,
    'Jarak_warungp'                      => 143,
    'kemudahan_warungp'                  => 144,

    'jumlah_restoran'                    => 145,
    'kondisi_restoran'                   => 146,
    'Jarak_restoran'                     => 147,
    'kemudahan_restoran'                 => 148,

    'jumlah_kedaim'                      => 149,
    'kondisi_kedaim'                     => 150,
    'Jarak_kedaim'                       => 151,
    'kemudahan_kedaim'                   => 152,

    'jumlah_hotel'                       => 153,
    'kondisi_hotel'                      => 154,
    'Jarak_hotel'                        => 155,
    'kemudahan_hotel'                    => 156,

    'jumlah_hostel'                      => 157,
    'kondisi_hostel'                     => 158,
    'Jarak_hostel'                       => 159,
    'kemudahan_hostel'                   => 160,

    'jumlah_bengkelm'                    => 161,
    'kondisi_bengkelm'                   => 162,
    'Jarak_bengkelm'                     => 163,
    'kemudahan_bengkelm'                 => 164,

    'jumlah_salonk'                      => 165,
    'kondisi_salonk'                     => 166,
    'Jarak_salonk'                       => 167,
    'kemudahan_salonk'                   => 168,

    'jumlah_agent'                       => 169,
    'kondisi_agent'                      => 170,
    'Jarak_agent'                        => 171,
    'kemudahan_agent'                    => 172,

    'jumlah_bankbri'                     => 173,
    'kondisi_bankbri'                    => 174,
    'Jarak_bankbri'                      => 175,
    'kemudahan_bankbri'                  => 176,

    'jumlah_briag'                       => 177,
    'kondisi_briag'                      => 178,
    'Jarak_briag'                        => 179,
    'kemudahan_briag'                    => 180,

    'jumlah_bankbni'                     => 181,
    'kondisi_bankbni'                    => 182,
    'Jarak_bankbni'                      => 183,
    'kemudahan_bankbni'                  => 184,

    'jumlah_bniag'                       => 185,
    'kondisi_bniag'                      => 186,
    'Jarak_bniag'                        => 187,
    'kemudahan_bniag'                    => 188,

    'jumlah_bankmandiri'                 => 189,
    'kondisi_bankmandiri'                => 190,
    'Jarak_bankmandiri'                  => 191,
    'kemudahan_bankmandiri'              => 192,

    'jumlah_mandiriag'                   => 193,
    'kondisi_mandiriag'                  => 194,
    'Jarak_mandiriag'                    => 195,
    'kemudahan_mandiriag'                => 196,

    'jumlah_bankbpd'                     => 197,
    'kondisi_bankbpd'                    => 198,
    'Jarak_bankbpd'                      => 199,
    'kemudahan_bankbpd'                  => 200,

    'jumlah_bpdag'                       => 201,
    'kondisi_bpdag'                      => 202,
    'Jarak_bpdag'                        => 203,
    'kemudahan_bpdag'                    => 204,

    'jumlah_bankumum'                    => 205,
    'kondisi_bankumum'                   => 206,
    'Jarak_bankumum'                     => 207,
    'kemudahan_bankumum'                 => 208,

    'jumlah_bankbca'                     => 209,
    'kondisi_bankbca'                    => 210,
    'Jarak_bankbca'                      => 211,
    'kemudahan_bankbca'                  => 212,

    'jumlah_bankcimb'                    => 213,
    'kondisi_bankcimb'                   => 214,
    'Jarak_bankcimb'                     => 215,
    'kemudahan_bankcimb'                 => 216,

    'jumlah_banksinarm'                  => 217,
    'kondisi_banksinarm'                 => 218,
    'Jarak_banksinarm'                   => 219,
    'kemudahan_banksinarm'               => 220,

    'jumlah_bankpermata'                 => 221,
    'kondisi_bankpermata'                => 222,
    'Jarak_bankpermata'                  => 223,
    'kemudahan_bankpermata'              => 224,

    'jumlah_bankswastalain'              => 225,
    'kondisi_bankswastalain'             => 226,
    'Jarak_bankswastalain'               => 227,
    'kemudahan_bankswastalain'           => 228,

    'jumlah_bankbpr'                     => 229,
    'kondisi_bankbpr'                    => 230,
    'Jarak_bankbpr'                      => 231,
    'kemudahan_bankbpr'                  => 232,

    'jumlah_bmt'                         => 233,
    'kondisi_bmt'                        => 234,
    'Jarak_bmt'                          => 235,
    'kemudahan_bmt'                      => 236,

    'jumlah_pegadaian'                   => 237,
    'kondisi_pegadaian'                  => 238,
    'Jarak_pegadaian'                    => 239,
    'kemudahan_pegadaian'                => 240,

    'jumlah_atm'                         => 241,
    'kondisi_atm'                        => 242,
    'Jarak_atm'                          => 243,
    'kemudahan_atm'                      => 244,

    'jumlah_saranalain'                  => 245,
    'kondisi_saranalain'                 => 246,
    'Jarak_saranalain'                   => 247,
    'kemudahan_saranalain'               => 248,

    // ====== 6) rt_fasilitas_ekonomi (nama field sesuai import) ======
    'kredit_usaha'                       => 249,
    'kredit_ketahanan'                   => 250,
    'kredit_kecil'                       => 251,
    'kelompok_usaha'                     => 252,

    // ====== 7) rt_infrastuktur ======
    'penerangan_jalan'                   => 253,
    'pra_transportrt'                    => 254,
    'jalan_aspal'                        => 255,
    'jalan_makadam'                      => 256,
    'jalan_tanah'                        => 257,
    'jalan_papan_atasaair'               => 258,
    'jalan_setapak'                      => 259,
    'jalan_lainnya'                      => 260,
    'jalan_darat_roda4'                  => 261,
    'angkutanumum_trayek'                => 262,
    'angkutanumum_opra'                  => 263,
    'angkutanumum_jamopra'               => 264,
    'dermaga_laut'                       => 265,
    'sinyalhp_bts'                       => 266,
    'sinyalhp_telkom'                    => 267,
    'sinyalhp_indo'                      => 268,
    'sinyalhp_xl'                        => 269,
    'sinyalhp_hut'                       => 270,
    'sinyalhp_psn'                       => 271,
    'sinyalhp_smart'                     => 272,
    'sinyalhp_bakrie'                    => 273,
    'pos_pembantu'                       => 274,
    'pos_keliling'                       => 275,
    'agen_jasa'                          => 276,
    'chanel_tvri'                        => 277,
    'parabola_tvri'                      => 278,
    'chanel_tvrid'                       => 279,
    'parabola_tvrid'                     => 280,
    'chanel_s'                           => 281,
    'parabola_s'                         => 282,
    'chanel_ln'                          => 283,
    'parabola_ln'                        => 284,
    'chanel_rri'                         => 285,
    'parabola_rri'                       => 286,
    'chanel_rrid'                        => 287,
    'parabola_rrid'                      => 288,
    'chanel_radios'                      => 289,
    'parabola_radios'                    => 290,
    'chanel_radiok'                      => 291,
    'parabola_radiok'                    => 292,
    'jumlah_lokasi_air'                  => 293,
    'fasilitas_umump_pasar'              => 294,
    'fasilitas_umump_stasiun'            => 295,
    'fasilitas_umump_terminal'           => 296,
    'fasilitas_umump_kolong'             => 297,
    'fasilitas_umump_pelabuhan'          => 298,
    'pemukiman_khusus_mewah'             => 299,
    'pemukiman_khusus_apart'             => 300,
    'pemukiman_khusus_susun'             => 301,
    'pemukiman_khusus_school'            => 302,
    'pemukiman_khusus_kos'               => 303,
    'pemukiman_khusus_asrama'            => 304,
    'pemukiman_khusus_lp'                => 305,

    // ====== 8) rt_lingkungan ======
    'lingkungan_lsi'                     => 306,
    'lingkungan_slno'                    => 307,
    'lingkungan_k'                       => 308,
    'lingkungan_hl'                      => 309,
    'lingkungan_t'                       => 310,
    'lingkungan_kte'                     => 311,
    'lingkungan_lgt'                     => 312,
    'lingkungan_lpp'                     => 313,
    'lingkungan_ah'                      => 314,
    'lingkungan_lpns'                    => 315,
    'lingkungan_lpertambangan'           => 316,
    'lingkungan_lperumahan'              => 317,
    'lingkungan_lperkantoran'            => 318,
    'lingkungan_lindustri'               => 319,
    'lingkungan_fu'                      => 320,
    'lingkungan_ll'                      => 321,
    'lingkungan_nsym'                    => 322,
    'lingkungan_ndws'                    => 323,
    'lingkungan_jma'                     => 324,
    'lingkungan_je'                      => 325,
    'lingkungan_ksb'                     => 326,
    'lingkungan_ks'                      => 327,
    'lingkungan_ki'                      => 328,
    'lingkungan_kd'                      => 329,
    'lingkungan_ke'                      => 330,
    'lingkungan_pair'                    => 331,
    'lingkungan_ptanah'                  => 332,
    'lingkungan_pudara'                  => 333,
    'lingkungan_pdusl'                   => 334,
    'lingkungan_kmml'                    => 335,
    'lingkungan_klpg'                    => 336,

    // ====== 9) rt_bencana ======
    'k_longsor'                          => 337,
    'f_longsor'                          => 338,
    'kj_longsor'                         => 339,
    'jp_longsor'                         => 340,
    'wt_longsor'                         => 341,

    'k_banjir'                           => 342,
    'f_banjir'                           => 343,
    'kj_banjir'                          => 344,
    'jp_banjir'                          => 345,
    'wt_banjir'                          => 346,

    'k_bandang'                          => 347,
    'f_bandang'                          => 348,
    'kj_bandang'                         => 349,
    'jp_bandang'                         => 350,
    'wt_bandang'                         => 351,

    'k_gempa'                            => 352,
    'f_gempa'                            => 353,
    'kj_gempa'                           => 354,
    'jp_gempa'                           => 355,
    'wt_gempa'                           => 356,

    'k_tsunami'                          => 357,
    'f_tsunami'                          => 358,
    'kj_tsunami'                         => 359,
    'jp_tsunami'                         => 360,
    'wt_tsunami'                         => 361,

    'k_puyuh'                            => 362,
    'f_puyuh'                            => 363,
    'kj_puyuh'                           => 364,
    'jp_puyuh'                           => 365,
    'wt_puyuh'                           => 366,

    'k_gunungm'                          => 367,
    'f_gunungm'                          => 368,
    'kj_gunungm'                         => 369,
    'jp_gunungm'                         => 370,
    'wt_gunungm'                         => 371,

    'k_hutank'                           => 372,
    'f_hutank'                           => 373,
    'kj_hutank'                          => 374,
    'jp_hutank'                          => 375,
    'wt_hutank'                          => 376,

    'k_kekeringan'                       => 377,
    'f_kekeringan'                       => 378,
    'kj_kekeringan'                      => 379,
    'jp_kekeringan'                      => 380,
    'wt_kekeringan'                      => 381,

    // ====== 10) rt_mitigasib ======
    'mitigasi_sp'                        => 382,
    'mitigasi_spd'                       => 383,
    'mitigasi_pk'                        => 384,
    'mitigasi_rrj'                       => 385,
    'mitigasi_ppn'                       => 386,

    // ====== 11) rt_saranapendidikan ======
    'nama_paud'                          => 387,
    'pemilik_paud'                       => 388,
    'kondisi_paud'                       => 389,
    'jumlahguru_paud'                    => 390,
    'jumlahmurid_paud'                   => 391,
    'jumlahpegawai_paud'                 => 392,

    'nama_tk'                            => 393,
    'pemilik_tk'                         => 394,
    'kondisi_tk'                         => 395,
    'jumlahguru_tk'                      => 396,
    'jumlahmurid_tk'                     => 397,
    'jumlahpegawai_tk'                   => 398,

    'nama_sd'                            => 399,
    'pemilik_sd'                         => 400,
    'kondisi_sd'                         => 401,
    'jumlahguru_sd'                      => 402,
    'jumlahmurid_sd'                     => 403,
    'jumlahpegawai_sd'                   => 404,

    'nama_smp'                           => 405,
    'pemilik_smp'                        => 406,
    'kondisi_smp'                        => 407,
    'jumlahguru_smp'                     => 408,
    'jumlahmurid_smp'                    => 409,
    'jumlahpegawai_smp'                  => 410,

    'nama_smplb'                         => 411,
    'pemilik_smplb'                      => 412,
    'kondisi_smplb'                      => 413,
    'jumlahguru_smplb'                   => 414,
    'jumlahmurid_smplb'                  => 415,
    'jumlahpegawai_smplb'                => 416,

    'nama_sma'                           => 417,
    'pemilik_sma'                        => 418,
    'kondisi_sma'                        => 419,
    'jumlahguru_sma'                     => 420,
    'jumlahmurid_sma'                    => 421,
    'jumlahpegawai_sma'                  => 422,

    'nama_smk'                           => 423,
    'pemilik_smk'                        => 424,
    'kondisi_smk'                        => 425,
    'jumlahguru_smk'                     => 426,
    'jumlahmurid_smk'                    => 427,
    'jumlahpegawai_smk'                  => 428,

    'nama_smalb'                         => 429,
    'pemilik_smalb'                      => 430,
    'kondisi_smalb'                      => 431,
    'jumlahguru_smalb'                   => 432,
    'jumlahmurid_smalb'                  => 433,
    'jumlahpegawai_smalb'                => 434,

    'nama_akademi'                       => 435,
    'pemilik_akademi'                    => 436,
    'kondisi_akademi'                    => 437,
    'jumlahguru_akademi'                 => 438,
    'jumlahmurid_akademi'                => 439,
    'jumlahpegawai_akademi'              => 440,

    'nama_pesantren'                     => 441,
    'pemilik_pesantren'                  => 442,
    'kondisi_pesantren'                  => 443,
    'jumlahguru_pesantren'               => 444,
    'jumlahmurid_pesantren'              => 445,
    'jumlahpegawai_pesantren'            => 446,

    'nama_madrasahdn'                    => 447,
    'pemilik_madrasahdn'                 => 448,
    'kondisi_madrasahdn'                 => 449,
    'jumlahguru_madrasahdn'              => 450,
    'jumlahmurid_madrasahdn'             => 451,
    'jumlahpegawai_madrasahdn'           => 452,

    'nama_seminari'                      => 453,
    'pemilik_seminari'                   => 454,
    'kondisi_seminari'                   => 455,
    'jumlahguru_seminari'                => 456,
    'jumlahmurid_seminari'               => 457,
    'jumlahpegawai_seminari'             => 458,

    'nama_sekolahag'                     => 459,
    'pemilik_sekolahag'                  => 460,
    'kondisi_sekolahag'                  => 461,
    'jumlahguru_sekolahag'               => 462,
    'jumlahmurid_sekolahag'              => 463,
    'jumlahpegawai_sekolahag'            => 464,

    'nama_butaaksara'                    => 465,
    'pemilik_butaaksara'                 => 466,
    'kondisi_butaaksara'                 => 467,
    'jumlahguru_butaaksara'              => 468,
    'jumlahmurid_butaaksara'             => 469,
    'jumlahpegawai_butaaksara'           => 470,

    'nama_paketa'                        => 471,
    'pemilik_paketa'                     => 472,
    'kondisi_paketa'                     => 473,
    'jumlahguru_paketa'                  => 474,
    'jumlahmurid_paketa'                 => 475,
    'jumlahpegawai_paketa'               => 476,

    'nama_paketb'                        => 477,
    'pemilik_paketb'                     => 478,
    'kondisi_paketb'                     => 479,
    'jumlahguru_paketb'                  => 480,
    'jumlahmurid_paketb'                 => 481,
    'jumlahpegawai_paketb'               => 482,

    'nama_paketc'                        => 483,
    'pemilik_paketc'                     => 484,
    'kondisi_paketc'                     => 485,
    'jumlahguru_paketc'                  => 486,
    'jumlahmurid_paketc'                 => 487,
    'jumlahpegawai_paketc'               => 488,

    'nama_playgrup'                      => 489,
    'pemilik_playgrup'                   => 490,
    'kondisi_playgrup'                   => 491,
    'jumlahguru_playgrup'                => 492,
    'jumlahmurid_playgrup'               => 493,
    'jumlahpegawai_playgrup'             => 494,

    'nama_penitipananak'                 => 495,
    'pemilik_penitipananak'              => 496,
    'kondisi_penitipananak'              => 497,
    'jumlahguru_penitipananak'           => 498,
    'jumlahmurid_penitipananak'          => 499,
    'jumlahpegawai_penitipananak'        => 500,

    'nama_pendidikanq'                   => 501,
    'pemilik_pendidikanq'                => 502,
    'kondisi_pendidikanq'                => 503,
    'jumlahguru_pendidikanq'             => 504,
    'jumlahmurid_pendidikanq'            => 505,
    'jumlahpegawai_pendidikanq'          => 506,

    'nama_bahasaas'                      => 507,
    'pemilik_bahasaas'                   => 508,
    'kondisi_bahasaas'                   => 509,
    'jumlahguru_bahasaas'                => 510,
    'jumlahmurid_bahasaas'               => 511,
    'jumlahpegawai_bahasaas'             => 512,

    'nama_kursuskomp'                    => 513,
    'pemilik_kursuskomp'                 => 514,
    'kondisi_kursuskomp'                 => 515,
    'jumlahguru_kursuskomp'              => 516,
    'jumlahmurid_kursuskomp'             => 517,
    'jumlahpegawai_kursuskomp'           => 518,

    'nama_kursusmenjahit'                => 519,
    'pemilik_kursusmenjahit'             => 520,
    'kondisi_kursusmenjahit'             => 521,
    'jumlahguru_kursusmenjahit'          => 522,
    'jumlahmurid_kursusmenjahit'         => 523,
    'jumlahpegawai_kursusmenjahit'       => 524,

    'nama_kursuskecantikan'              => 525,
    'pemilik_kursuskecantikan'           => 526,
    'kondisi_kursuskecantikan'           => 527,
    'jumlahguru_kursuskecantikan'        => 528,
    'jumlahmurid_kursuskecantikan'       => 529,
    'jumlahpegawai_kursuskecantikan'     => 530,

    'nama_kursusmontir'                  => 531,
    'pemilik_kursusmontir'               => 532,
    'kondisi_kursusmontir'               => 533,
    'jumlahguru_kursusmontir'            => 534,
    'jumlahmurid_kursusmontir'           => 535,
    'jumlahpegawai_kursusmontir'         => 536,

    'nama_kursussetir'                   => 537,
    'pemilik_kursussetir'                => 538,
    'kondisi_kursussetir'                => 539,
    'jumlahguru_kursussetir'             => 540,
    'jumlahmurid_kursussetir'            => 541,
    'jumlahpegawai_kursussetir'          => 542,

    'nama_kursuselektronik'              => 543,
    'pemilik_kursuselektronik'           => 544,
    'kondisi_kursuselektronik'           => 545,
    'jumlahguru_kursuselektronik'        => 546,
    'jumlahmurid_kursuselektronik'       => 547,
    'jumlahpegawai_kursuselektronik'     => 548,

    'nama_tataboga'                      => 549,
    'pemilik_tataboga'                   => 550,
    'kondisi_tataboga'                   => 551,
    'jumlahguru_tataboga'                => 552,
    'jumlahmurid_tataboga'               => 553,
    'jumlahpegawai_tataboga'             => 554,

    'nama_kursusketik'                   => 555,
    'pemilik_kursusketik'                => 556,
    'kondisi_kursusketik'                => 557,
    'jumlahguru_kursusketik'             => 558,
    'jumlahmurid_kursusketik'            => 559,
    'jumlahpegawai_kursusketik'          => 560,

    'nama_kursusakuntan'                 => 561,
    'pemilik_kursusakuntan'              => 562,
    'kondisi_kursusakuntan'              => 563,
    'jumlahguru_kursusakuntan'           => 564,
    'jumlahmurid_kursusakuntan'          => 565,
    'jumlahpegawai_kursusakuntan'        => 566,

    'nama_kursuslain'                    => 567,
    'pemilik_kursuslain'                 => 568,
    'kondisi_kursuslain'                 => 569,
    'jumlahguru_kursuslain'              => 570,
    'jumlahmurid_kursuslain'             => 571,
    'jumlahpegawai_kursuslain'           => 572,

    // ====== 12) rt_kesehatan ======
    'nama_rs'                            => 573,
    'pemilik_rs'                         => 574,
    'jd_rs'                              => 575,
    'jb_rs'                              => 576,
    'jts_rs'                             => 577,
    'jp_rs'                              => 578,

    'nama_rsb'                           => 579,
    'pemilik_rsb'                        => 580,
    'jd_rsb'                             => 581,
    'jb_rsb'                             => 582,
    'jts_rsb'                            => 583,
    'jp_rsb'                             => 584,

    'nama_pdri'                          => 585,
    'pemilik_pdri'                       => 586,
    'jd_pdri'                            => 587,
    'jb_pdri'                            => 588,
    'jts_pdri'                           => 589,
    'jp_pdri'                            => 590,

    'nama_ptri'                          => 591,
    'pemilik_ptri'                       => 592,
    'jd_ptri'                            => 593,
    'jb_ptri'                            => 594,
    'jts_ptri'                           => 595,
    'jp_ptri'                            => 596,

    'nama_pp'                            => 597,
    'pemilik_pp'                         => 598,
    'jd_pp'                              => 599,
    'jb_pp'                              => 600,
    'jts_pp'                             => 601,
    'jp_pp'                              => 602,

    'nama_pbp'                           => 603,
    'pemilik_pbp'                        => 604,
    'jd_pbp'                             => 605,
    'jb_pbp'                             => 606,
    'jts_pbp'                            => 607,
    'jp_pbp'                             => 608,

    'nama_tpd'                           => 609,
    'pemilik_tpd'                        => 610,
    'jd_tpd'                             => 611,
    'jb_tpd'                             => 612,
    'jts_tpd'                            => 613,
    'jp_tpd'                             => 614,

    'nama_rb'                            => 615,
    'pemilik_rb'                         => 616,
    'jd_rb'                              => 617,
    'jb_rb'                              => 618,
    'jts_rb'                             => 619,
    'jp_rb'                              => 620,

    'nama_tpb'                           => 621,
    'pemilik_tpb'                        => 622,
    'jd_tpb'                             => 623,
    'jb_tpb'                             => 624,
    'jts_tpb'                            => 625,
    'jp_tpb'                             => 626,

    'nama_poskedes'                      => 627,
    'pemilik_poskedes'                   => 628,
    'jd_poskedes'                        => 629,
    'jb_poskedes'                        => 630,
    'jts_poskedes'                       => 631,
    'jp_poskedes'                        => 632,

    'nama_polindes'                      => 633,
    'pemilik_polindes'                   => 634,
    'jd_polindes'                        => 635,
    'jb_polindes'                        => 636,
    'jts_polindes'                       => 637,
    'jp_polindes'                        => 638,

    'nama_apotik'                        => 639,
    'pemilik_apotik'                     => 640,
    'jd_apotik'                          => 641,
    'jb_apotik'                          => 642,
    'jts_apotik'                         => 643,
    'jp_apotik'                          => 644,

    'nama_tokojamu'                      => 645,
    'pemilik_tokojamu'                   => 646,
    'jd_tokojamu'                        => 647,
    'jb_tokojamu'                        => 648,
    'jts_tokojamu'                       => 649,
    'jp_tokojamu'                        => 650,

    'nama_posyandu'                      => 651,
    'pemilik_posyandu'                   => 652,
    'jd_posyandu'                        => 653,
    'jb_posyandu'                        => 654,
    'jts_posyandu'                       => 655,
    'jp_posyandu'                        => 656,

    'nama_posbindu'                      => 657,
    'pemilik_posbindu'                   => 658,
    'jd_posbindu'                        => 659,
    'jb_posbindu'                        => 660,
    'jts_posbindu'                       => 661,
    'jp_posbindu'                        => 662,

    // (duplikasi "nama_tpd" di akhir kode kesehatan kamu kemungkinan typo — di sini sudah ter-cover di atas)
    // ====== 13) rt_kejadianluarbiasa ======
    'nama_muntaber'                      => 663,
    'jp_muntaber'                        => 664,
    'jm_muntaber'                        => 665,
    'nama_dbd'                           => 666,
    'jp_dbd'                             => 667,
    'jm_dbd'                             => 668,
    'nama_campak'                        => 669,
    'jp_campak'                          => 670,
    'jm_campak'                          => 671,
    'nama_malaria'                       => 672,
    'jp_malaria'                         => 673,
    'jm_malaria'                         => 674,
    'nama_fluburung'                     => 675,
    'jp_fluburung'                       => 676,
    'jm_fluburung'                       => 677,
    'nama_covid19'                       => 678,
    'jp_covid19'                         => 679,
    'jm_covid19'                         => 680,
    'nama_hepatitisb'                    => 681,
    'jp_hepatitisb'                      => 682,
    'jm_hepatitisb'                      => 683,
    'nama_hepatitise'                    => 684,
    'jp_hepatitise'                      => 685,
    'jm_hepatitise'                      => 686,
    'nama_dipteri'                       => 687,
    'jp_dipteri'                         => 688,
    'jm_dipteri'                         => 689,
    'nama_chikung'                       => 690,
    'jp_chikung'                         => 691,
    'jm_chikung'                         => 692,
    'nama_leptos'                        => 693,
    'jp_leptos'                          => 694,
    'jm_leptos'                          => 695,
    'nama_kolera'                        => 696,
    'jp_kolera'                          => 697,
    'jm_kolera'                          => 698,
    'nama_giziburuk'                     => 699,
    'jp_giziburuk'                       => 700,
    'jm_giziburuk'                       => 701,
    'nama_lainnya'                       => 702,
    'jp_lainnya'                         => 703,
    'jm_lainnya'                         => 704,

    // ====== 14) rt_agama ======
    'jumlahwarga_jamkes'                 => 705,
    'jumlahwarga_jamketerangan'          => 706,
    'jumlahtempat_masjid'                => 707,
    'jumlahtempat_musholla'              => 708,
    'jumlahtempat_kristen'               => 709,
    'jumlahtempat_katolik'               => 710,
    'jumlahtempat_kapel'                 => 711,
    'jumlahtempat_pura'                  => 712,
    'jumlahtempat_wihara'                => 713,
    'jumlahtempat_kelenteng'             => 714,
    'jumlahtempat_lainnya'               => 715,
    'cagar_bud1'                         => 716,
    'cagar_bud2'                         => 717,
    'cagar_bud3'                         => 718,
    'sukuasing_keluarga'                 => 719,
    'sukuasing_jiwa'                     => 720,
    'ruangpublik_terbuka'                => 721,
    'adat_kehamilan'                     => 722,
    'adat_kelahiran'                     => 723,
    'adat_pekerjaan'                     => 724,
    'adat_alam'                          => 725,
    'adat_perkawinan'                    => 726,
    'adat_kehidupanwarga'                => 727,
    'adat_kematian'                      => 728,

    // ====== 15) rtlembaga_keagamaan ======
    'nama'                               => 729, // nama lembaga (bukan kolom umum)
    'jumlah_peng'                        => 730,
    'jumlah_ang'                         => 731,
    'fasilitas'                          => 732,

    // ====== 16) rt_keamanan ======
    'penyebabu_antarkelompokmas'         => 733,
    'jk_antarkelompokmas'                => 734,
    'jkl_antarkelompokmas'               => 735,
    'jt_antarkelompokmas'                => 736,
    'pen_antarkelompokmas'               => 737,
    'pp_antarkelompokmas'                => 738,

    'penyebabu_antardesa'                => 739,
    'jk_antardesa'                       => 740,
    'jkl_antardesa'                      => 741,
    'jt_antardesa'                       => 742,
    'pen_antardesa'                      => 743,
    'pp_antardesa'                       => 744,

    'penyebabu_aparatmk'                 => 745,
    'jk_aparatmk'                        => 746,
    'jkl_aparatmk'                       => 747,
    'jt_aparatmk'                        => 748,
    'pen_aparatmk'                       => 749,
    'pp_aparatmk'                        => 750,

    'penyebabu_aparatmp'                 => 751,
    'jk_aparatmp'                        => 752,
    'jkl_aparatmp'                       => 753,
    'jt_aparatmp'                        => 754,
    'pen_aparatmp'                       => 755,
    'pp_aparatmp'                        => 756,

    'penyebabu_aparatk'                  => 757,
    'jk_aparatk'                         => 758,
    'jkl_aparatk'                        => 759,
    'jt_aparatk'                         => 760,
    'pen_aparatk'                        => 761,
    'pp_aparatk'                         => 762,

    'penyebabu_aparatp'                  => 763,
    'jk_aparatp'                         => 764,
    'jkl_aparatp'                        => 765,
    'jt_aparatp'                         => 766,
    'pen_aparatp'                        => 767,
    'pp_aparatp'                         => 768,

    'penyebabu_pelajar'                  => 769,
    'jk_pelajar'                         => 770,
    'jkl_pelajar'                        => 771,
    'jt_pelajar'                         => 772,
    'pen_pelajar'                        => 773,
    'pp_pelajar'                         => 774,

    'penyebabu_suku'                     => 775,
    'jk_suku'                            => 776,
    'jkl_suku'                           => 777,
    'jt_suku'                            => 778,
    'pen_suku'                           => 779,
    'pp_suku'                            => 780,

    'penyebabu_lainnya'                  => 781,
    'jk_lainnya'                         => 782,
    'jkl_lainnya'                        => 783,
    'jt_lainnya'                         => 784,
    'pen_lainnya'                        => 785,
    'pp_lainnya'                         => 786,

    // ====== 17) rt_tkejahatan ======
    'jk_pencurian'                       => 787,
    'jumlahselesai_pencurian'            => 788,
    'jktbd_pencurian'                    => 789,
    'kll_pencurian'                      => 790,
    'kt_pencurian'                       => 791,

    'jk_pencuriankeras'                  => 792,
    'jumlahselesai_pencuriankeras'       => 793,
    'jktbd_pencuriankeras'               => 794,
    'kll_pencuriankeras'                 => 795,
    'kt_pencuriankeras'                  => 796,

    'jk_penipuan'                        => 797,
    'jumlahselesai_penipuan'             => 798,
    'jktbd_penipuan'                     => 799,
    'kll_penipuan'                       => 800,
    'kt_penipuan'                        => 801,

    'jk_penganiyayaan'                   => 802,
    'jumlahselesai_penganiyayaan'        => 803,
    'jktbd_penganiyayaan'                => 804,
    'kll_penganiyayaan'                  => 805,
    'kt_penganiyayaan'                   => 806,

    'jk_pembakaran'                      => 807,
    'jumlahselesai_pembakaran'           => 808,
    'jktbd_pembakaran'                   => 809,
    'kll_pembakaran'                     => 810,
    'kt_pembakaran'                      => 811,

    'jk_pemerkosaan'                     => 812,
    'jumlahselesai_pemerkosaan'          => 813,
    'jktbd_pemerkosaan'                  => 814,
    'kll_pemerkosaan'                    => 815,
    'kt_pemerkosaan'                     => 816,

    'jk_narkoba'                         => 817,
    'jumlahselesai_narkoba'              => 818,
    'jktbd_narkoba'                      => 819,
    'kll_narkoba'                        => 820,
    'kt_narkoba'                         => 821,

    'jk_perjudian'                       => 822,
    'jumlahselesai_perjudian'            => 823,
    'jktbd_perjudian'                    => 824,
    'kll_perjudian'                      => 825,
    'kt_perjudian'                       => 826,

    'jk_pembunuhan'                      => 827,
    'jumlahselesai_pembunuhan'           => 828,
    'jktbd_pembunuhan'                   => 829,
    'kll_pembunuhan'                     => 830,
    'kt_pembunuhan'                      => 831,

    'jk_perdaganganorang'                => 832,
    'jumlahselesai_perdaganganorang'     => 833,
    'jktbd_perdaganganorang'             => 834,
    'kll_perdaganganorang'               => 835,
    'kt_perdaganganorang'                => 836,

    'jk_korupsi'                         => 837,
    'jumlahselesai_korupsi'              => 838,
    'jktbd_korupsi'                      => 839,
    'kll_korupsi'                        => 840,
    'kt_korupsi'                         => 841,

    'jk_lainnya'                         => 842,
    'jumlahselesai_lainnya'              => 843,
    'jktbd_lainnya'                      => 844,
    'kll_lainnya'                        => 845,
    'kt_lainnya'                         => 846,

    // ====== 18) rtkegiatan_warga ======
    'jumlah_kpp'                         => 847,
    'jumlah_ppr'                         => 848,
    'jumlah_hansip'                      => 849,
    'pelaporan_tamu_lebih24'             => 850,
    'sistem_keamanan'                    => 851,
    'sistem_linmas'                      => 852,
    'jumlahpos_digunakan'                => 853,
    'jumlahpos_tidakdigunakan'           => 854,
    'jarak_ppt'                          => 855,
    'kemudahan_ppt'                      => 856,
    'jarak_korban'                       => 857,
    'jarak_lokasikumpul'                 => 858,
    'jarak_mangkal'                      => 859,
    'jarak_lokalisasi'                   => 860,
];


    public function collection(Collection $rows)
    {
        // Lewati header baris pertama
        $rows->skip(1)->each(function ($row) {
            // ------ KOLOM UMUM ------
            $kk           = $this->asString($row[0] ?? null);
            $nik          = $this->asString($row[1] ?? null);
            $gelarAwal    = $this->asString($row[2] ?? null);
            $nama         = $this->asString($row[3] ?? null);
            $gelarAkhir   = $this->asString($row[4] ?? null);
            $jenisKelamin = $this->asString($row[5] ?? null);
            $tempatLahir  = $this->asString($row[6] ?? null);

            if (!$nik) return;

            $namaFull = trim(implode(' ', array_filter([$gelarAwal, $nama, $gelarAkhir])));

            // =========================
            // 1) rtlokasi
            // =========================
            $mLok = rtlokasi::firstOrNew(['nik' => $nik]);
            $this->setUmum($mLok, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mLok->lokasi_rt_pulau = $this->colString($row, 'lokasi_rt_pulau');
            $mLok->topo_terluas_rt = $this->colString($row, 'topo_terluas_rt');
            $mLok->jumlah_warga_lereng = $this->colString($row, 'jumlah_warga_lereng');
            $mLok->penanaman_pohon_lahan_kritis = $this->colString($row, 'penanaman_pohon_lahan_kritis');
            $mLok->pantai_garis_panjang = $this->colString($row, 'pantai_garis_panjang');
            $mLok->pemanfaatan_laut_perangkap = $this->colString($row, 'pemanfaatan_laut_perangkap');
            $mLok->pemanfaatan_laut_budidaya = $this->colString($row, 'pemanfaatan_laut_budidaya');
            $mLok->pemanfaatan_laut_tambakg = $this->colString($row, 'pemanfaatan_laut_tambakg');
            $mLok->pemanfaatan_laut_bahari = $this->colString($row, 'pemanfaatan_laut_bahari');
            $mLok->pemanfaatan_laut_transport = $this->colString($row, 'pemanfaatan_laut_transport');
            $mLok->kondisi_mangrove = $this->colString($row, 'kondisi_mangrove');
            $mLok->penanaman_mangrove = $this->colString($row, 'penanaman_mangrove');
            $mLok->jumlah_warga_pesisir = $this->colString($row, 'jumlah_warga_pesisir');
            $mLok->jumlah_warga_atasair = $this->colString($row, 'jumlah_warga_atasair');
            $mLok->wilayah_desa_dalamhutan = $this->colString($row, 'wilayah_desa_dalamhutan');
            $mLok->wilayah_desa_tepihutan = $this->colString($row, 'wilayah_desa_tepihutan');
            $mLok->fungsihutan_kons = $this->colString($row, 'fungsihutan_kons');
            $mLok->fungsihutan_lindung = $this->colString($row, 'fungsihutan_lindung');
            $mLok->fungsihutan_produk = $this->colString($row, 'fungsihutan_produk');
            $mLok->fungsihutan_hutandes = $this->colString($row, 'fungsihutan_hutandes');
            $mLok->jumlahwarga_tinggal_dalamhutan = $this->colString($row, 'jumlahwarga_tinggal_dalamhutan');
            $mLok->jumlahwarga_tinggal_sekitarhutan = $this->colString($row, 'jumlahwarga_tinggal_sekitarhutan');
            $mLok->ketergantungan_hutan = $this->colString($row, 'ketergantungan_hutan');
            $mLok->reboisasi = $this->colString($row, 'reboisasi');
            $mLok->jumlah_produk_luardesa_masuk = $this->colString($row, 'jumlah_produk_luardesa_masuk');
            $mLok->jumlah_produk_luardesa_keluar = $this->colString($row, 'jumlah_produk_luardesa_keluar');
            $mLok->save();

            // =========================
            // 2) rtpuengurus
            // =========================
            $mPeng = rtpuengurus::firstOrNew(['nik' => $nik]);
            $this->setUmum($mPeng, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mPeng->nama_ketuarw = $this->colString($row, 'nama_ketuarw');
            $mPeng->nik_ketuarw = $this->colString($row, 'nik_ketuarw');
            $mPeng->nohp_ketuarw = $this->colString($row, 'nohp_ketuarw');
            $mPeng->menjabat_ketuarw = $this->colString($row, 'menjabat_ketuarw');
            $mPeng->nama_sekrw = $this->colString($row, 'nama_sekrw');
            $mPeng->nik_sekrw = $this->colString($row, 'nik_sekrw');
            $mPeng->nohp_sekrw = $this->colString($row, 'nohp_sekrw');
            $mPeng->menjabat_sekrw = $this->colString($row, 'menjabat_sekrw');
            $mPeng->nama_benrw = $this->colString($row, 'nama_benrw');
            $mPeng->nik_benrw = $this->colString($row, 'nik_benrw');
            $mPeng->nohp_benrw = $this->colString($row, 'nohp_benrw');
            $mPeng->menjabat_benrw = $this->colString($row, 'menjabat_benrw');
            $mPeng->nama_ketuart = $this->colString($row, 'nama_ketuart');
            $mPeng->nik_ketuart = $this->colString($row, 'nik_ketuart');
            $mPeng->nohp_ketuart = $this->colString($row, 'nohp_ketuart');
            $mPeng->menjabat_ketuart = $this->colString($row, 'menjabat_ketuart');
            $mPeng->nama_sekrt = $this->colString($row, 'nama_sekrt');
            $mPeng->nik_sekrt = $this->colString($row, 'nik_sekrt');
            $mPeng->nohp_sekrt = $this->colString($row, 'nohp_sekrt');
            $mPeng->menjabat_sekrt = $this->colString($row, 'menjabat_sekrt');
            $mPeng->nama_benrt = $this->colString($row, 'nama_benrt');
            $mPeng->nik_benrt = $this->colString($row, 'nik_benrt');
            $mPeng->nohp_benrt = $this->colString($row, 'nohp_benrt');
            $mPeng->menjabat_benrt = $this->colString($row, 'menjabat_benrt');
            $mPeng->save();

            // =========================
            // 3) rtlembaga_ekonomi
            // =========================
            $mLemEko = rtlembaga_ekonomi::firstOrNew(['nik' => $nik]);
            $this->setUmum($mLemEko, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mLemEko->agentik_jp = $this->colString($row, 'agentik_jp');
            $mLemEko->agentik_jtk = $this->colString($row, 'agentik_jtk');
            $mLemEko->jtri_sentra = $this->colString($row, 'jtri_sentra');
            $mLemEko->jtri_lingkungan = $this->colString($row, 'jtri_lingkungan');
            $mLemEko->jtri_kampung = $this->colString($row, 'jtri_kampung');
            $mLemEko->diskotik_kpd = $this->colString($row, 'diskotik_kpd');
            $mLemEko->diskotik_jtl = $this->colString($row, 'diskotik_jtl');
            $mLemEko->lpg_kpapm = $this->colString($row, 'lpg_kpapm');
            $mLemEko->lpg_kpapg = $this->colString($row, 'lpg_kpapg');
            $mLemEko->koperasi_jumlah = $this->colString($row, 'koperasi_jumlah');
            $mLemEko->koperasi_kudproduksi = $this->colString($row, 'koperasi_kudproduksi');
            $mLemEko->koperasi_kudkredit = $this->colString($row, 'koperasi_kudkredit');
            $mLemEko->koperasi_kudkegiatan = $this->colString($row, 'koperasi_kudkegiatan');
            $mLemEko->koperasi_kudindustrik = $this->colString($row, 'koperasi_kudindustrik');
            $mLemEko->koperasi_kudksp = $this->colString($row, 'koperasi_kudksp');
            $mLemEko->koperasi_kudksu = $this->colString($row, 'koperasi_kudksu');
            $mLemEko->koperasi_kudlainnya = $this->colString($row, 'koperasi_kudlainnya');
            $mLemEko->kos_kud = $this->colString($row, 'kos_kud');
            $mLemEko->kos_bumdes = $this->colString($row, 'kos_bumdes');
            $mLemEko->kos_selain = $this->colString($row, 'kos_selain');
            $mLemEko->save();

            // =========================
            // 3) industri
            // =========================

            $mindustri = rtindustri::firstOrNew(['nik' => $nik]);
            $this->setUmum($mindustri, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mindustri->jumlahindustrik_kulit = $this->colString($row, 'jumlahindustrik_kulit');
            $mindustri->jumlahindustris_kulit = $this->colString($row, 'jumlahindustris_kulit');
            $mindustri->jumlahmanajemen_kulit = $this->colString($row, 'jumlahmanajemen_kulit');
            $mindustri->jumlahpekerja_kulit = $this->colString($row, 'jumlahpekerja_kulit');
            $mindustri->jumlahindustrik_kayu = $this->colString($row, 'jumlahindustrik_kayu');
            $mindustri->jumlahindustris_kayu = $this->colString($row, 'jumlahindustris_kayu');
            $mindustri->jumlahmanajemen_kayu = $this->colString($row, 'jumlahmanajemen_kayu');
            $mindustri->jumlahpekerja_kayu = $this->colString($row, 'jumlahpekerja_kayu');
            $mindustri->jumlahindustrik_logam = $this->colString($row, 'jumlahindustrik_logam');
            $mindustri->jumlahindustris_logam = $this->colString($row, 'jumlahindustris_logam');
            $mindustri->jumlahmanajemen_logam = $this->colString($row, 'jumlahmanajemen_logam');
            $mindustri->jumlahpekerja_logam = $this->colString($row, 'jumlahpekerja_logam');
            $mindustri->jumlahindustrik_logamb = $this->colString($row, 'jumlahindustrik_logamb');
            $mindustri->jumlahindustris_logamb = $this->colString($row, 'jumlahindustris_logamb');
            $mindustri->jumlahmanajemen_logamb = $this->colString($row, 'jumlahmanajemen_logamb');
            $mindustri->jumlahpekerja_logamb = $this->colString($row, 'jumlahpekerja_logamb');
            $mindustri->jumlahindustrik_kain = $this->colString($row, 'jumlahindustrik_kain');
            $mindustri->jumlahindustris_kain = $this->colString($row, 'jumlahindustris_kain');
            $mindustri->jumlahmanajemen_kain = $this->colString($row, 'jumlahmanajemen_kain');
            $mindustri->jumlahpekerja_kain = $this->colString($row, 'jumlahpekerja_kain');
            $mindustri->jumlahindustrik_keramik = $this->colString($row, 'jumlahindustrik_keramik');
            $mindustri->jumlahindustris_keramik = $this->colString($row, 'jumlahindustris_keramik');
            $mindustri->jumlahmanajemen_keramik = $this->colString($row, 'jumlahmanajemen_keramik');
            $mindustri->jumlahpekerja_keramik = $this->colString($row, 'jumlahpekerja_keramik');
            $mindustri->jumlahindustrik_genteng = $this->colString($row, 'jumlahindustrik_genteng');
            $mindustri->jumlahindustris_genteng = $this->colString($row, 'jumlahindustris_genteng');
            $mindustri->jumlahmanajemen_genteng = $this->colString($row, 'jumlahmanajemen_genteng');
            $mindustri->jumlahpekerja_genteng = $this->colString($row, 'jumlahpekerja_genteng');
            $mindustri->jumlahindustrik_anyaman = $this->colString($row, 'jumlahindustrik_anyaman');
            $mindustri->jumlahindustris_anyaman = $this->colString($row, 'jumlahindustris_anyaman');
            $mindustri->jumlahmanajemen_anyaman = $this->colString($row, 'jumlahmanajemen_anyaman');
            $mindustri->jumlahpekerja_anyaman = $this->colString($row, 'jumlahpekerja_anyaman');
            $mindustri->jumlahindustrik_makanan = $this->colString($row, 'jumlahindustrik_makanan');
            $mindustri->jumlahindustris_makanan = $this->colString($row, 'jumlahindustris_makanan');
            $mindustri->jumlahmanajemen_makanan = $this->colString($row, 'jumlahmanajemen_makanan');
            $mindustri->jumlahpekerja_makanan = $this->colString($row, 'jumlahpekerja_makanan');
            $mindustri->jumlahindustrik_lainnya = $this->colString($row, 'jumlahindustrik_lainnya');
            $mindustri->jumlahindustris_lainnya = $this->colString($row, 'jumlahindustris_lainnya');
            $mindustri->jumlahmanajemen_lainnya = $this->colString($row, 'jumlahmanajemen_lainnya');
            $mindustri->jumlahpekerja_lainnya = $this->colString($row, 'jumlahpekerja_lainnya');
            $mindustri->save();



            $msarekonomi = rt_sarana_ekonomi::firstOrNew(['nik' => $nik]);
            $this->setUmum($msarekonomi, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $msarekonomi->jumlah_toko = $this->colString($row, 'jumlah_toko');
            $msarekonomi->kondisi_toko = $this->colString($row, 'kondisi_toko');
            $msarekonomi->Jarak_toko = $this->colString($row, 'Jarak_toko');
            $msarekonomi->kemudahan_toko = $this->colString($row, 'kemudahan_toko');
            $msarekonomi->jumlah_pasar_permanen = $this->colString($row, 'jumlah_pasar_permanen');
            $msarekonomi->kondisi_pasar_permanen = $this->colString($row, 'kondisi_pasar_permanen');
            $msarekonomi->Jarak_pasar_permanen = $this->colString($row, 'Jarak_pasar_permanen');
            $msarekonomi->kemudahan_pasar_permanen = $this->colString($row, 'kemudahan_pasar_permanen');
            $msarekonomi->jumlah_semip = $this->colString($row, 'jumlah_semip');
            $msarekonomi->kondisi_semip = $this->colString($row, 'kondisi_semip');
            $msarekonomi->Jarak_semip = $this->colString($row, 'Jarak_semip');
            $msarekonomi->kemudahan_semip = $this->colString($row, 'kemudahan_semip');
            $msarekonomi->jumlah_tanpap = $this->colString($row, 'jumlah_tanpap');
            $msarekonomi->kondisi_tanpap = $this->colString($row, 'kondisi_tanpap');
            $msarekonomi->Jarak_tanpap = $this->colString($row, 'Jarak_tanpap');
            $msarekonomi->kemudahan_tanpap = $this->colString($row, 'kemudahan_tanpap');
            $msarekonomi->jumlah_minimarket = $this->colString($row, 'jumlah_minimarket');
            $msarekonomi->kondisi_minimarket = $this->colString($row, 'kondisi_minimarket');
            $msarekonomi->Jarak_minimarket = $this->colString($row, 'Jarak_minimarket');
            $msarekonomi->kemudahan_minimarket = $this->colString($row, 'kemudahan_minimarket');
            $msarekonomi->jumlah_warungk = $this->colString($row, 'jumlah_warungk');
            $msarekonomi->kondisi_warungk = $this->colString($row, 'kondisi_warungk');
            $msarekonomi->Jarak_warungk = $this->colString($row, 'Jarak_warungk');
            $msarekonomi->kemudahan_warungk = $this->colString($row, 'kemudahan_warungk');
            $msarekonomi->jumlah_warungp = $this->colString($row, 'jumlah_warungp');
            $msarekonomi->kondisi_warungp = $this->colString($row, 'kondisi_warungp');
            $msarekonomi->Jarak_warungp = $this->colString($row, 'Jarak_warungp');
            $msarekonomi->kemudahan_warungp = $this->colString($row, 'kemudahan_warungp');
            $msarekonomi->jumlah_restoran = $this->colString($row, 'jumlah_restoran');
            $msarekonomi->kondisi_restoran = $this->colString($row, 'kondisi_restoran');
            $msarekonomi->Jarak_restoran = $this->colString($row, 'Jarak_restoran');
            $msarekonomi->kemudahan_restoran = $this->colString($row, 'kemudahan_restoran');
            $msarekonomi->jumlah_kedaim = $this->colString($row, 'jumlah_kedaim');
            $msarekonomi->kondisi_kedaim = $this->colString($row, 'kondisi_kedaim');
            $msarekonomi->Jarak_kedaim = $this->colString($row, 'Jarak_kedaim');
            $msarekonomi->kemudahan_kedaim = $this->colString($row, 'kemudahan_kedaim');
            $msarekonomi->jumlah_hotel = $this->colString($row, 'jumlah_hotel');
            $msarekonomi->kondisi_hotel = $this->colString($row, 'kondisi_hotel');
            $msarekonomi->Jarak_hotel = $this->colString($row, 'Jarak_hotel');
            $msarekonomi->kemudahan_hotel = $this->colString($row, 'kemudahan_hotel');
            $msarekonomi->jumlah_hostel = $this->colString($row, 'jumlah_hostel');
            $msarekonomi->kondisi_hostel = $this->colString($row, 'kondisi_hostel');
            $msarekonomi->Jarak_hostel = $this->colString($row, 'Jarak_hostel');
            $msarekonomi->kemudahan_hostel = $this->colString($row, 'kemudahan_hostel');
            $msarekonomi->jumlah_bengkelm = $this->colString($row, 'jumlah_bengkelm');
            $msarekonomi->kondisi_bengkelm = $this->colString($row, 'kondisi_bengkelm');
            $msarekonomi->Jarak_bengkelm = $this->colString($row, 'Jarak_bengkelm');
            $msarekonomi->kemudahan_bengkelm = $this->colString($row, 'kemudahan_bengkelm');
            $msarekonomi->jumlah_salonk = $this->colString($row, 'jumlah_salonk');
            $msarekonomi->kondisi_salonk = $this->colString($row, 'kondisi_salonk');
            $msarekonomi->Jarak_salonk = $this->colString($row, 'Jarak_salonk');
            $msarekonomi->kemudahan_salonk = $this->colString($row, 'kemudahan_salonk');
            $msarekonomi->jumlah_agent = $this->colString($row, 'jumlah_agent');
            $msarekonomi->kondisi_agent = $this->colString($row, 'kondisi_agent');
            $msarekonomi->Jarak_agent = $this->colString($row, 'Jarak_agent');
            $msarekonomi->kemudahan_agent = $this->colString($row, 'kemudahan_agent');
            $msarekonomi->jumlah_bankbri = $this->colString($row, 'jumlah_bankbri');
            $msarekonomi->kondisi_bankbri = $this->colString($row, 'kondisi_bankbri');
            $msarekonomi->Jarak_bankbri = $this->colString($row, 'Jarak_bankbri');
            $msarekonomi->kemudahan_bankbri = $this->colString($row, 'kemudahan_bankbri');
            $msarekonomi->jumlah_briag = $this->colString($row, 'jumlah_briag');
            $msarekonomi->kondisi_briag = $this->colString($row, 'kondisi_briag');
            $msarekonomi->Jarak_briag = $this->colString($row, 'Jarak_briag');
            $msarekonomi->kemudahan_briag = $this->colString($row, 'kemudahan_briag');
            $msarekonomi->jumlah_bankbni = $this->colString($row, 'jumlah_bankbni');
            $msarekonomi->kondisi_bankbni = $this->colString($row, 'kondisi_bankbni');
            $msarekonomi->Jarak_bankbni = $this->colString($row, 'Jarak_bankbni');
            $msarekonomi->kemudahan_bankbni = $this->colString($row, 'kemudahan_bankbni');
            $msarekonomi->jumlah_bniag = $this->colString($row, 'jumlah_bniag');
            $msarekonomi->kondisi_bniag = $this->colString($row, 'kondisi_bniag');
            $msarekonomi->Jarak_bniag = $this->colString($row, 'Jarak_bniag');
            $msarekonomi->kemudahan_bniag = $this->colString($row, 'kemudahan_bniag');
            $msarekonomi->jumlah_bankmandiri = $this->colString($row, 'jumlah_bankmandiri');
            $msarekonomi->kondisi_bankmandiri = $this->colString($row, 'kondisi_bankmandiri');
            $msarekonomi->Jarak_bankmandiri = $this->colString($row, 'Jarak_bankmandiri');
            $msarekonomi->kemudahan_bankmandiri = $this->colString($row, 'kemudahan_bankmandiri');
            $msarekonomi->jumlah_mandiriag = $this->colString($row, 'jumlah_mandiriag');
            $msarekonomi->kondisi_mandiriag = $this->colString($row, 'kondisi_mandiriag');
            $msarekonomi->Jarak_mandiriag = $this->colString($row, 'Jarak_mandiriag');
            $msarekonomi->kemudahan_mandiriag = $this->colString($row, 'kemudahan_mandiriag');
            $msarekonomi->jumlah_bankbpd = $this->colString($row, 'jumlah_bankbpd');
            $msarekonomi->kondisi_bankbpd = $this->colString($row, 'kondisi_bankbpd');
            $msarekonomi->Jarak_bankbpd = $this->colString($row, 'Jarak_bankbpd');
            $msarekonomi->kemudahan_bankbpd = $this->colString($row, 'kemudahan_bankbpd');
            $msarekonomi->jumlah_bpdag = $this->colString($row, 'jumlah_bpdag');
            $msarekonomi->kondisi_bpdag = $this->colString($row, 'kondisi_bpdag');
            $msarekonomi->Jarak_bpdag = $this->colString($row, 'Jarak_bpdag');
            $msarekonomi->kemudahan_bpdag = $this->colString($row, 'kemudahan_bpdag');
            $msarekonomi->jumlah_bankumum = $this->colString($row, 'jumlah_bankumum');
            $msarekonomi->kondisi_bankumum = $this->colString($row, 'kondisi_bankumum');
            $msarekonomi->Jarak_bankumum = $this->colString($row, 'Jarak_bankumum');
            $msarekonomi->kemudahan_bankumum = $this->colString($row, 'kemudahan_bankumum');
            $msarekonomi->jumlah_bankbca = $this->colString($row, 'jumlah_bankbca');
            $msarekonomi->kondisi_bankbca = $this->colString($row, 'kondisi_bankbca');
            $msarekonomi->Jarak_bankbca = $this->colString($row, 'Jarak_bankbca');
            $msarekonomi->kemudahan_bankbca = $this->colString($row, 'kemudahan_bankbca');
            $msarekonomi->jumlah_bankcimb = $this->colString($row, 'jumlah_bankcimb');
            $msarekonomi->kondisi_bankcimb = $this->colString($row, 'kondisi_bankcimb');
            $msarekonomi->Jarak_bankcimb = $this->colString($row, 'Jarak_bankcimb');
            $msarekonomi->kemudahan_bankcimb = $this->colString($row, 'kemudahan_bankcimb');
            $msarekonomi->jumlah_banksinarm = $this->colString($row, 'jumlah_banksinarm');
            $msarekonomi->kondisi_banksinarm = $this->colString($row, 'kondisi_banksinarm');
            $msarekonomi->Jarak_banksinarm = $this->colString($row, 'Jarak_banksinarm');
            $msarekonomi->kemudahan_banksinarm = $this->colString($row, 'kemudahan_banksinarm');
            $msarekonomi->jumlah_bankpermata = $this->colString($row, 'jumlah_bankpermata');
            $msarekonomi->kondisi_bankpermata = $this->colString($row, 'kondisi_bankpermata');
            $msarekonomi->Jarak_bankpermata = $this->colString($row, 'Jarak_bankpermata');
            $msarekonomi->kemudahan_bankpermata = $this->colString($row, 'kemudahan_bankpermata');
            $msarekonomi->jumlah_bankswastalain = $this->colString($row, 'jumlah_bankswastalain');
            $msarekonomi->kondisi_bankswastalain = $this->colString($row, 'kondisi_bankswastalain');
            $msarekonomi->Jarak_bankswastalain = $this->colString($row, 'Jarak_bankswastalain');
            $msarekonomi->kemudahan_bankswastalain = $this->colString($row, 'kemudahan_bankswastalain');
            $msarekonomi->jumlah_bankbpr = $this->colString($row, 'jumlah_bankbpr');
            $msarekonomi->kondisi_bankbpr = $this->colString($row, 'kondisi_bankbpr');
            $msarekonomi->Jarak_bankbpr = $this->colString($row, 'Jarak_bankbpr');
            $msarekonomi->kemudahan_bankbpr = $this->colString($row, 'kemudahan_bankbpr');
            $msarekonomi->jumlah_bmt = $this->colString($row, 'jumlah_bmt');
            $msarekonomi->kondisi_bmt = $this->colString($row, 'kondisi_bmt');
            $msarekonomi->Jarak_bmt = $this->colString($row, 'Jarak_bmt');
            $msarekonomi->kemudahan_bmt = $this->colString($row, 'kemudahan_bmt');
            $msarekonomi->jumlah_pegadaian = $this->colString($row, 'jumlah_pegadaian');
            $msarekonomi->kondisi_pegadaian = $this->colString($row, 'kondisi_pegadaian');
            $msarekonomi->Jarak_pegadaian = $this->colString($row, 'Jarak_pegadaian');
            $msarekonomi->kemudahan_pegadaian = $this->colString($row, 'kemudahan_pegadaian');
            $msarekonomi->jumlah_atm = $this->colString($row, 'jumlah_atm');
            $msarekonomi->kondisi_atm = $this->colString($row, 'kondisi_atm');
            $msarekonomi->Jarak_atm = $this->colString($row, 'Jarak_atm');
            $msarekonomi->kemudahan_atm = $this->colString($row, 'kemudahan_atm');
            $msarekonomi->jumlah_saranalain = $this->colString($row, 'jumlah_saranalain');
            $msarekonomi->kondisi_saranalain = $this->colString($row, 'kondisi_saranalain');
            $msarekonomi->Jarak_saranalain = $this->colString($row, 'Jarak_saranalain');
            $msarekonomi->kemudahan_saranalain = $this->colString($row, 'kemudahan_saranalain');
            $msarekonomi->save();


            $mfasilekonomi = rt_fasilitas_ekonomi::firstOrNew(['nik' => $nik]);
            $this->setUmum($mfasilekonomi, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mfasilekonomi->kredit_usaha =  $this->colString($row, 'kredit_usaha');
            $mfasilekonomi->kredit_ketahanan =  $this->colString($row, 'kredit_ketahanan');
            $mfasilekonomi->kredit_kecil =  $this->colString($row, 'kredit_kecil');
            $mfasilekonomi->kelompok_usaha =  $this->colString($row, 'kelompok_usaha');
            $mfasilekonomi->save();


            $minfrastuktur = rt_infrastuktur::firstOrNew(['nik' => $nik]);
            $this->setUmum($minfrastuktur, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $minfrastuktur->penerangan_jalan = $this->colString($row, 'penerangan_jalan');
            $minfrastuktur->pra_transportrt = $this->colString($row, 'pra_transportrt');
            $minfrastuktur->jalan_aspal = $this->colString($row, 'jalan_aspal');
            $minfrastuktur->jalan_makadam = $this->colString($row, 'jalan_makadam');
            $minfrastuktur->jalan_tanah = $this->colString($row, 'jalan_tanah');
            $minfrastuktur->jalan_papan_atasaair = $this->colString($row, 'jalan_papan_atasaair');
            $minfrastuktur->jalan_setapak = $this->colString($row, 'jalan_setapak');
            $minfrastuktur->jalan_lainnya = $this->colString($row, 'jalan_lainnya');
            $minfrastuktur->jalan_darat_roda4 = $this->colString($row, 'jalan_darat_roda4');
            $minfrastuktur->angkutanumum_trayek = $this->colString($row, 'angkutanumum_trayek');
            $minfrastuktur->angkutanumum_opra = $this->colString($row, 'angkutanumum_opra');
            $minfrastuktur->angkutanumum_jamopra = $this->colString($row, 'angkutanumum_jamopra');
            $minfrastuktur->dermaga_laut = $this->colString($row, 'dermaga_laut');
            $minfrastuktur->sinyalhp_bts = $this->colString($row, 'sinyalhp_bts');
            $minfrastuktur->sinyalhp_telkom = $this->colString($row, 'sinyalhp_telkom');
            $minfrastuktur->sinyalhp_indo = $this->colString($row, 'sinyalhp_indo');
            $minfrastuktur->sinyalhp_xl = $this->colString($row, 'sinyalhp_xl');
            $minfrastuktur->sinyalhp_hut = $this->colString($row, 'sinyalhp_hut');
            $minfrastuktur->sinyalhp_psn = $this->colString($row, 'sinyalhp_psn');
            $minfrastuktur->sinyalhp_smart = $this->colString($row, 'sinyalhp_smart');
            $minfrastuktur->sinyalhp_bakrie = $this->colString($row, 'sinyalhp_bakrie');
            $minfrastuktur->pos_pembantu = $this->colString($row, 'pos_pembantu');
            $minfrastuktur->pos_keliling = $this->colString($row, 'pos_keliling');
            $minfrastuktur->agen_jasa = $this->colString($row, 'agen_jasa');
            $minfrastuktur->chanel_tvri = $this->colString($row, 'chanel_tvri');
            $minfrastuktur->parabola_tvri = $this->colString($row, 'parabola_tvri');
            $minfrastuktur->chanel_tvrid = $this->colString($row, 'chanel_tvrid');
            $minfrastuktur->parabola_tvrid = $this->colString($row, 'parabola_tvrid');
            $minfrastuktur->chanel_s = $this->colString($row, 'chanel_s');
            $minfrastuktur->parabola_s = $this->colString($row, 'parabola_s');
            $minfrastuktur->chanel_ln = $this->colString($row, 'chanel_ln');
            $minfrastuktur->parabola_ln = $this->colString($row, 'parabola_ln');
            $minfrastuktur->chanel_rri = $this->colString($row, 'chanel_rri');
            $minfrastuktur->parabola_rri = $this->colString($row, 'parabola_rri');
            $minfrastuktur->chanel_rrid = $this->colString($row, 'chanel_rrid');
            $minfrastuktur->parabola_rrid = $this->colString($row, 'parabola_rrid');
            $minfrastuktur->chanel_radios = $this->colString($row, 'chanel_radios');
            $minfrastuktur->parabola_radios = $this->colString($row, 'parabola_radios');
            $minfrastuktur->chanel_radiok = $this->colString($row, 'chanel_radiok');
            $minfrastuktur->parabola_radiok = $this->colString($row, 'parabola_radiok');
            $minfrastuktur->jumlah_lokasi_air = $this->colString($row, 'jumlah_lokasi_air');
            $minfrastuktur->fasilitas_umump_pasar = $this->colString($row, 'fasilitas_umump_pasar');
            $minfrastuktur->fasilitas_umump_stasiun = $this->colString($row, 'fasilitas_umump_stasiun');
            $minfrastuktur->fasilitas_umump_terminal = $this->colString($row, 'fasilitas_umump_terminal');
            $minfrastuktur->fasilitas_umump_kolong = $this->colString($row, 'fasilitas_umump_kolong');
            $minfrastuktur->fasilitas_umump_pelabuhan = $this->colString($row, 'fasilitas_umump_pelabuhan');
            $minfrastuktur->pemukiman_khusus_mewah = $this->colString($row, 'pemukiman_khusus_mewah');
            $minfrastuktur->pemukiman_khusus_apart = $this->colString($row, 'pemukiman_khusus_apart');
            $minfrastuktur->pemukiman_khusus_susun = $this->colString($row, 'pemukiman_khusus_susun');
            $minfrastuktur->pemukiman_khusus_school = $this->colString($row, 'pemukiman_khusus_school');
            $minfrastuktur->pemukiman_khusus_kos = $this->colString($row, 'pemukiman_khusus_kos');
            $minfrastuktur->pemukiman_khusus_asrama = $this->colString($row, 'pemukiman_khusus_asrama');
            $minfrastuktur->pemukiman_khusus_lp = $this->colString($row, 'pemukiman_khusus_lp');
            $minfrastuktur->save();


            $mlingkungan = rt_lingkungan::firstOrNew(['nik' => $nik]);
            $this->setUmum($mlingkungan, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mlingkungan->lingkungan_lsi = $this->colString($row, 'lingkungan_lsi');
            $mlingkungan->lingkungan_slno = $this->colString($row, 'lingkungan_slno');
            $mlingkungan->lingkungan_k = $this->colString($row, 'lingkungan_k');
            $mlingkungan->lingkungan_hl = $this->colString($row, 'lingkungan_hl');
            $mlingkungan->lingkungan_t = $this->colString($row, 'lingkungan_t');
            $mlingkungan->lingkungan_kte = $this->colString($row, 'lingkungan_kte');
            $mlingkungan->lingkungan_lgt = $this->colString($row, 'lingkungan_lgt');
            $mlingkungan->lingkungan_lpp = $this->colString($row, 'lingkungan_lpp');
            $mlingkungan->lingkungan_ah = $this->colString($row, 'lingkungan_ah');
            $mlingkungan->lingkungan_lpns = $this->colString($row, 'lingkungan_lpns');
            $mlingkungan->lingkungan_lpertambangan = $this->colString($row, 'lingkungan_lpertambangan');
            $mlingkungan->lingkungan_lperumahan = $this->colString($row, 'lingkungan_lperumahan');
            $mlingkungan->lingkungan_lperkantoran = $this->colString($row, 'lingkungan_lperkantoran');
            $mlingkungan->lingkungan_lindustri = $this->colString($row, 'lingkungan_lindustri');
            $mlingkungan->lingkungan_fu = $this->colString($row, 'lingkungan_fu');
            $mlingkungan->lingkungan_ll = $this->colString($row, 'lingkungan_ll');
            $mlingkungan->lingkungan_nsym = $this->colString($row, 'lingkungan_nsym');
            $mlingkungan->lingkungan_ndws = $this->colString($row, 'lingkungan_ndws');
            $mlingkungan->lingkungan_jma = $this->colString($row, 'lingkungan_jma');
            $mlingkungan->lingkungan_je = $this->colString($row, 'lingkungan_je');
            $mlingkungan->lingkungan_ksb = $this->colString($row, 'lingkungan_ksb');
            $mlingkungan->lingkungan_ks = $this->colString($row, 'lingkungan_ks');
            $mlingkungan->lingkungan_ki = $this->colString($row, 'lingkungan_ki');
            $mlingkungan->lingkungan_kd = $this->colString($row, 'lingkungan_kd');
            $mlingkungan->lingkungan_ke = $this->colString($row, 'lingkungan_ke');
            $mlingkungan->lingkungan_pair = $this->colString($row, 'lingkungan_pair');
            $mlingkungan->lingkungan_ptanah = $this->colString($row, 'lingkungan_ptanah');
            $mlingkungan->lingkungan_pudara = $this->colString($row, 'lingkungan_pudara');
            $mlingkungan->lingkungan_pdusl = $this->colString($row, 'lingkungan_pdusl');
            $mlingkungan->lingkungan_kmml = $this->colString($row, 'lingkungan_kmml');
            $mlingkungan->lingkungan_klpg = $this->colString($row, 'lingkungan_klpg');
            $mlingkungan->save();


            $mbencana = rt_bencana::firstOrNew(['nik' => $nik]);
            $this->setUmum($mbencana, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mbencana->k_longsor = $this->colString($row, 'k_longsor');
            $mbencana->f_longsor = $this->colString($row, 'f_longsor');
            $mbencana->kj_longsor = $this->colString($row, 'kj_longsor');
            $mbencana->jp_longsor = $this->colString($row, 'jp_longsor');
            $mbencana->wt_longsor = $this->colString($row, 'wt_longsor');
            $mbencana->k_banjir = $this->colString($row, 'k_banjir');
            $mbencana->f_banjir = $this->colString($row, 'f_banjir');
            $mbencana->kj_banjir = $this->colString($row, 'kj_banjir');
            $mbencana->jp_banjir = $this->colString($row, 'jp_banjir');
            $mbencana->wt_banjir = $this->colString($row, 'wt_banjir');
            $mbencana->k_bandang = $this->colString($row, 'k_bandang');
            $mbencana->f_bandang = $this->colString($row, 'f_bandang');
            $mbencana->kj_bandang = $this->colString($row, 'kj_bandang');
            $mbencana->jp_bandang = $this->colString($row, 'jp_bandang');
            $mbencana->wt_bandang = $this->colString($row, 'wt_bandang');
            $mbencana->k_gempa = $this->colString($row, 'k_gempa');
            $mbencana->f_gempa = $this->colString($row, 'f_gempa');
            $mbencana->kj_gempa = $this->colString($row, 'kj_gempa');
            $mbencana->jp_gempa = $this->colString($row, 'jp_gempa');
            $mbencana->wt_gempa = $this->colString($row, 'wt_gempa');
            $mbencana->k_tsunami = $this->colString($row, 'k_tsunami');
            $mbencana->f_tsunami = $this->colString($row, 'f_tsunami');
            $mbencana->kj_tsunami = $this->colString($row, 'kj_tsunami');
            $mbencana->jp_tsunami = $this->colString($row, 'jp_tsunami');
            $mbencana->wt_tsunami = $this->colString($row, 'wt_tsunami');
            $mbencana->k_puyuh = $this->colString($row, 'k_puyuh');
            $mbencana->f_puyuh = $this->colString($row, 'f_puyuh');
            $mbencana->kj_puyuh = $this->colString($row, 'kj_puyuh');
            $mbencana->jp_puyuh = $this->colString($row, 'jp_puyuh');
            $mbencana->wt_puyuh = $this->colString($row, 'wt_puyuh');
            $mbencana->k_gunungm = $this->colString($row, 'k_gunungm');
            $mbencana->f_gunungm = $this->colString($row, 'f_gunungm');
            $mbencana->kj_gunungm = $this->colString($row, 'kj_gunungm');
            $mbencana->jp_gunungm = $this->colString($row, 'jp_gunungm');
            $mbencana->wt_gunungm = $this->colString($row, 'wt_gunungm');
            $mbencana->k_hutank = $this->colString($row, 'k_hutank');
            $mbencana->f_hutank = $this->colString($row, 'f_hutank');
            $mbencana->kj_hutank = $this->colString($row, 'kj_hutank');
            $mbencana->jp_hutank = $this->colString($row, 'jp_hutank');
            $mbencana->wt_hutank = $this->colString($row, 'wt_hutank');
            $mbencana->k_kekeringan = $this->colString($row, 'k_kekeringan');
            $mbencana->f_kekeringan = $this->colString($row, 'f_kekeringan');
            $mbencana->kj_kekeringan = $this->colString($row, 'kj_kekeringan');
            $mbencana->jp_kekeringan = $this->colString($row, 'jp_kekeringan');
            $mbencana->wt_kekeringan = $this->colString($row, 'wt_kekeringan');
            $mbencana->save();

            $mitigasibencana = rt_mitigasib::firstOrNew(['nik' => $nik]);
            $this->setUmum($mitigasibencana, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mitigasibencana->mitigasi_sp = $this->colString($row, 'mitigasi_sp');
            $mitigasibencana->mitigasi_spd = $this->colString($row, 'mitigasi_spd');
            $mitigasibencana->mitigasi_pk = $this->colString($row, 'mitigasi_pk');
            $mitigasibencana->mitigasi_rrj = $this->colString($row, 'mitigasi_rrj');
            $mitigasibencana->mitigasi_ppn = $this->colString($row, 'mitigasi_ppn');
            $mitigasibencana->save();

            $saranapend = rt_saranapendidikan::firstOrNew(['nik' => $nik]);
            $this->setUmum($saranapend, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $saranapend->nama_paud =  $this->colString($row, 'nama_paud');
            $saranapend->pemilik_paud =  $this->colString($row, 'pemilik_paud');
            $saranapend->kondisi_paud =  $this->colString($row, 'kondisi_paud');
            $saranapend->jumlahguru_paud =  $this->colString($row, 'jumlahguru_paud');
            $saranapend->jumlahmurid_paud =  $this->colString($row, 'jumlahmurid_paud');
            $saranapend->jumlahpegawai_paud =  $this->colString($row, 'jumlahpegawai_paud');
            $saranapend->nama_tk =  $this->colString($row, 'nama_tk');
            $saranapend->pemilik_tk =  $this->colString($row, 'pemilik_tk');
            $saranapend->kondisi_tk =  $this->colString($row, 'kondisi_tk');
            $saranapend->jumlahguru_tk =  $this->colString($row, 'jumlahguru_tk');
            $saranapend->jumlahmurid_tk =  $this->colString($row, 'jumlahmurid_tk');
            $saranapend->jumlahpegawai_tk =  $this->colString($row, 'jumlahpegawai_tk');
            $saranapend->nama_sd =  $this->colString($row, 'nama_sd');
            $saranapend->pemilik_sd =  $this->colString($row, 'pemilik_sd');
            $saranapend->kondisi_sd =  $this->colString($row, 'kondisi_sd');
            $saranapend->jumlahguru_sd =  $this->colString($row, 'jumlahguru_sd');
            $saranapend->jumlahmurid_sd =  $this->colString($row, 'jumlahmurid_sd');
            $saranapend->jumlahpegawai_sd =  $this->colString($row, 'jumlahpegawai_sd');
            $saranapend->nama_smp =  $this->colString($row, 'nama_smp');
            $saranapend->pemilik_smp =  $this->colString($row, 'pemilik_smp');
            $saranapend->kondisi_smp =  $this->colString($row, 'kondisi_smp');
            $saranapend->jumlahguru_smp =  $this->colString($row, 'jumlahguru_smp');
            $saranapend->jumlahmurid_smp =  $this->colString($row, 'jumlahmurid_smp');
            $saranapend->jumlahpegawai_smp =  $this->colString($row, 'jumlahpegawai_smp');
            $saranapend->nama_smplb =  $this->colString($row, 'nama_smplb');
            $saranapend->pemilik_smplb =  $this->colString($row, 'pemilik_smplb');
            $saranapend->kondisi_smplb =  $this->colString($row, 'kondisi_smplb');
            $saranapend->jumlahguru_smplb =  $this->colString($row, 'jumlahguru_smplb');
            $saranapend->jumlahmurid_smplb =  $this->colString($row, 'jumlahmurid_smplb');
            $saranapend->jumlahpegawai_smplb =  $this->colString($row, 'jumlahpegawai_smplb');
            $saranapend->nama_sma =  $this->colString($row, 'nama_sma');
            $saranapend->pemilik_sma =  $this->colString($row, 'pemilik_sma');
            $saranapend->kondisi_sma =  $this->colString($row, 'kondisi_sma');
            $saranapend->jumlahguru_sma =  $this->colString($row, 'jumlahguru_sma');
            $saranapend->jumlahmurid_sma =  $this->colString($row, 'jumlahmurid_sma');
            $saranapend->jumlahpegawai_sma =  $this->colString($row, 'jumlahpegawai_sma');
            $saranapend->nama_smk =  $this->colString($row, 'nama_smk');
            $saranapend->pemilik_smk =  $this->colString($row, 'pemilik_smk');
            $saranapend->kondisi_smk =  $this->colString($row, 'kondisi_smk');
            $saranapend->jumlahguru_smk =  $this->colString($row, 'jumlahguru_smk');
            $saranapend->jumlahmurid_smk =  $this->colString($row, 'jumlahmurid_smk');
            $saranapend->jumlahpegawai_smk =  $this->colString($row, 'jumlahpegawai_smk');
            $saranapend->nama_smalb =  $this->colString($row, 'nama_smalb');
            $saranapend->pemilik_smalb =  $this->colString($row, 'pemilik_smalb');
            $saranapend->kondisi_smalb =  $this->colString($row, 'kondisi_smalb');
            $saranapend->jumlahguru_smalb =  $this->colString($row, 'jumlahguru_smalb');
            $saranapend->jumlahmurid_smalb =  $this->colString($row, 'jumlahmurid_smalb');
            $saranapend->jumlahpegawai_smalb =  $this->colString($row, 'jumlahpegawai_smalb');
            $saranapend->nama_akademi =  $this->colString($row, 'nama_akademi');
            $saranapend->pemilik_akademi =  $this->colString($row, 'pemilik_akademi');
            $saranapend->kondisi_akademi =  $this->colString($row, 'kondisi_akademi');
            $saranapend->jumlahguru_akademi =  $this->colString($row, 'jumlahguru_akademi');
            $saranapend->jumlahmurid_akademi =  $this->colString($row, 'jumlahmurid_akademi');
            $saranapend->jumlahpegawai_akademi =  $this->colString($row, 'jumlahpegawai_akademi');
            $saranapend->nama_pesantren =  $this->colString($row, 'nama_pesantren');
            $saranapend->pemilik_pesantren =  $this->colString($row, 'pemilik_pesantren');
            $saranapend->kondisi_pesantren =  $this->colString($row, 'kondisi_pesantren');
            $saranapend->jumlahguru_pesantren =  $this->colString($row, 'jumlahguru_pesantren');
            $saranapend->jumlahmurid_pesantren =  $this->colString($row, 'jumlahmurid_pesantren');
            $saranapend->jumlahpegawai_pesantren =  $this->colString($row, 'jumlahpegawai_pesantren');
            $saranapend->nama_madrasahdn =  $this->colString($row, 'nama_madrasahdn');
            $saranapend->pemilik_madrasahdn =  $this->colString($row, 'pemilik_madrasahdn');
            $saranapend->kondisi_madrasahdn =  $this->colString($row, 'kondisi_madrasahdn');
            $saranapend->jumlahguru_madrasahdn =  $this->colString($row, 'jumlahguru_madrasahdn');
            $saranapend->jumlahmurid_madrasahdn =  $this->colString($row, 'jumlahmurid_madrasahdn');
            $saranapend->jumlahpegawai_madrasahdn =  $this->colString($row, 'jumlahpegawai_madrasahdn');
            $saranapend->nama_seminari =  $this->colString($row, 'nama_seminari');
            $saranapend->pemilik_seminari =  $this->colString($row, 'pemilik_seminari');
            $saranapend->kondisi_seminari =  $this->colString($row, 'kondisi_seminari');
            $saranapend->jumlahguru_seminari =  $this->colString($row, 'jumlahguru_seminari');
            $saranapend->jumlahmurid_seminari =  $this->colString($row, 'jumlahmurid_seminari');
            $saranapend->jumlahpegawai_seminari =  $this->colString($row, 'jumlahpegawai_seminari');
            $saranapend->nama_sekolahag =  $this->colString($row, 'nama_sekolahag');
            $saranapend->pemilik_sekolahag =  $this->colString($row, 'pemilik_sekolahag');
            $saranapend->kondisi_sekolahag =  $this->colString($row, 'kondisi_sekolahag');
            $saranapend->jumlahguru_sekolahag =  $this->colString($row, 'jumlahguru_sekolahag');
            $saranapend->jumlahmurid_sekolahag =  $this->colString($row, 'jumlahmurid_sekolahag');
            $saranapend->jumlahpegawai_sekolahag =  $this->colString($row, 'jumlahpegawai_sekolahag');
            $saranapend->nama_butaaksara =  $this->colString($row, 'nama_butaaksara');
            $saranapend->pemilik_butaaksara =  $this->colString($row, 'pemilik_butaaksara');
            $saranapend->kondisi_butaaksara =  $this->colString($row, 'kondisi_butaaksara');
            $saranapend->jumlahguru_butaaksara =  $this->colString($row, 'jumlahguru_butaaksara');
            $saranapend->jumlahmurid_butaaksara =  $this->colString($row, 'jumlahmurid_butaaksara');
            $saranapend->jumlahpegawai_butaaksara =  $this->colString($row, 'jumlahpegawai_butaaksara');
            $saranapend->nama_paketa =  $this->colString($row, 'nama_paketa');
            $saranapend->pemilik_paketa =  $this->colString($row, 'pemilik_paketa');
            $saranapend->kondisi_paketa =  $this->colString($row, 'kondisi_paketa');
            $saranapend->jumlahguru_paketa =  $this->colString($row, 'jumlahguru_paketa');
            $saranapend->jumlahmurid_paketa =  $this->colString($row, 'jumlahmurid_paketa');
            $saranapend->jumlahpegawai_paketa =  $this->colString($row, 'jumlahpegawai_paketa');
            $saranapend->nama_paketb =  $this->colString($row, 'nama_paketb');
            $saranapend->pemilik_paketb =  $this->colString($row, 'pemilik_paketb');
            $saranapend->kondisi_paketb =  $this->colString($row, 'kondisi_paketb');
            $saranapend->jumlahguru_paketb =  $this->colString($row, 'jumlahguru_paketb');
            $saranapend->jumlahmurid_paketb =  $this->colString($row, 'jumlahmurid_paketb');
            $saranapend->jumlahpegawai_paketb =  $this->colString($row, 'jumlahpegawai_paketb');
            $saranapend->nama_paketc =  $this->colString($row, 'nama_paketc');
            $saranapend->pemilik_paketc =  $this->colString($row, 'pemilik_paketc');
            $saranapend->kondisi_paketc =  $this->colString($row, 'kondisi_paketc');
            $saranapend->jumlahguru_paketc =  $this->colString($row, 'jumlahguru_paketc');
            $saranapend->jumlahmurid_paketc =  $this->colString($row, 'jumlahmurid_paketc');
            $saranapend->jumlahpegawai_paketc =  $this->colString($row, 'jumlahpegawai_paketc');
            $saranapend->nama_playgrup =  $this->colString($row, 'nama_playgrup');
            $saranapend->pemilik_playgrup =  $this->colString($row, 'pemilik_playgrup');
            $saranapend->kondisi_playgrup =  $this->colString($row, 'kondisi_playgrup');
            $saranapend->jumlahguru_playgrup =  $this->colString($row, 'jumlahguru_playgrup');
            $saranapend->jumlahmurid_playgrup =  $this->colString($row, 'jumlahmurid_playgrup');
            $saranapend->jumlahpegawai_playgrup =  $this->colString($row, 'jumlahpegawai_playgrup');
            $saranapend->nama_penitipananak =  $this->colString($row, 'nama_penitipananak');
            $saranapend->pemilik_penitipananak =  $this->colString($row, 'pemilik_penitipananak');
            $saranapend->kondisi_penitipananak =  $this->colString($row, 'kondisi_penitipananak');
            $saranapend->jumlahguru_penitipananak =  $this->colString($row, 'jumlahguru_penitipananak');
            $saranapend->jumlahmurid_penitipananak =  $this->colString($row, 'jumlahmurid_penitipananak');
            $saranapend->jumlahpegawai_penitipananak =  $this->colString($row, 'jumlahpegawai_penitipananak');
            $saranapend->nama_pendidikanq =  $this->colString($row, 'nama_pendidikanq');
            $saranapend->pemilik_pendidikanq =  $this->colString($row, 'pemilik_pendidikanq');
            $saranapend->kondisi_pendidikanq =  $this->colString($row, 'kondisi_pendidikanq');
            $saranapend->jumlahguru_pendidikanq =  $this->colString($row, 'jumlahguru_pendidikanq');
            $saranapend->jumlahmurid_pendidikanq =  $this->colString($row, 'jumlahmurid_pendidikanq');
            $saranapend->jumlahpegawai_pendidikanq =  $this->colString($row, 'jumlahpegawai_pendidikanq');
            $saranapend->nama_bahasaas =  $this->colString($row, 'nama_bahasaas');
            $saranapend->pemilik_bahasaas =  $this->colString($row, 'pemilik_bahasaas');
            $saranapend->kondisi_bahasaas =  $this->colString($row, 'kondisi_bahasaas');
            $saranapend->jumlahguru_bahasaas =  $this->colString($row, 'jumlahguru_bahasaas');
            $saranapend->jumlahmurid_bahasaas =  $this->colString($row, 'jumlahmurid_bahasaas');
            $saranapend->jumlahpegawai_bahasaas =  $this->colString($row, 'jumlahpegawai_bahasaas');
            $saranapend->nama_kursuskomp =  $this->colString($row, 'nama_kursuskomp');
            $saranapend->pemilik_kursuskomp =  $this->colString($row, 'pemilik_kursuskomp');
            $saranapend->kondisi_kursuskomp =  $this->colString($row, 'kondisi_kursuskomp');
            $saranapend->jumlahguru_kursuskomp =  $this->colString($row, 'jumlahguru_kursuskomp');
            $saranapend->jumlahmurid_kursuskomp =  $this->colString($row, 'jumlahmurid_kursuskomp');
            $saranapend->jumlahpegawai_kursuskomp =  $this->colString($row, 'jumlahpegawai_kursuskomp');
            $saranapend->nama_kursusmenjahit =  $this->colString($row, 'nama_kursusmenjahit');
            $saranapend->pemilik_kursusmenjahit =  $this->colString($row, 'pemilik_kursusmenjahit');
            $saranapend->kondisi_kursusmenjahit =  $this->colString($row, 'kondisi_kursusmenjahit');
            $saranapend->jumlahguru_kursusmenjahit =  $this->colString($row, 'jumlahguru_kursusmenjahit');
            $saranapend->jumlahmurid_kursusmenjahit =  $this->colString($row, 'jumlahmurid_kursusmenjahit');
            $saranapend->jumlahpegawai_kursusmenjahit =  $this->colString($row, 'jumlahpegawai_kursusmenjahit');
            $saranapend->nama_kursuskecantikan =  $this->colString($row, 'nama_kursuskecantikan');
            $saranapend->pemilik_kursuskecantikan =  $this->colString($row, 'pemilik_kursuskecantikan');
            $saranapend->kondisi_kursuskecantikan =  $this->colString($row, 'kondisi_kursuskecantikan');
            $saranapend->jumlahguru_kursuskecantikan =  $this->colString($row, 'jumlahguru_kursuskecantikan');
            $saranapend->jumlahmurid_kursuskecantikan =  $this->colString($row, 'jumlahmurid_kursuskecantikan');
            $saranapend->jumlahpegawai_kursuskecantikan =  $this->colString($row, 'jumlahpegawai_kursuskecantikan');
            $saranapend->nama_kursusmontir =  $this->colString($row, 'nama_kursusmontir');
            $saranapend->pemilik_kursusmontir =  $this->colString($row, 'pemilik_kursusmontir');
            $saranapend->kondisi_kursusmontir =  $this->colString($row, 'kondisi_kursusmontir');
            $saranapend->jumlahguru_kursusmontir =  $this->colString($row, 'jumlahguru_kursusmontir');
            $saranapend->jumlahmurid_kursusmontir =  $this->colString($row, 'jumlahmurid_kursusmontir');
            $saranapend->jumlahpegawai_kursusmontir =  $this->colString($row, 'jumlahpegawai_kursusmontir');
            $saranapend->nama_kursussetir =  $this->colString($row, 'nama_kursussetir');
            $saranapend->pemilik_kursussetir =  $this->colString($row, 'pemilik_kursussetir');
            $saranapend->kondisi_kursussetir =  $this->colString($row, 'kondisi_kursussetir');
            $saranapend->jumlahguru_kursussetir =  $this->colString($row, 'jumlahguru_kursussetir');
            $saranapend->jumlahmurid_kursussetir =  $this->colString($row, 'jumlahmurid_kursussetir');
            $saranapend->jumlahpegawai_kursussetir =  $this->colString($row, 'jumlahpegawai_kursussetir');
            $saranapend->nama_kursuselektronik =  $this->colString($row, 'nama_kursuselektronik');
            $saranapend->pemilik_kursuselektronik =  $this->colString($row, 'pemilik_kursuselektronik');
            $saranapend->kondisi_kursuselektronik =  $this->colString($row, 'kondisi_kursuselektronik');
            $saranapend->jumlahguru_kursuselektronik =  $this->colString($row, 'jumlahguru_kursuselektronik');
            $saranapend->jumlahmurid_kursuselektronik =  $this->colString($row, 'jumlahmurid_kursuselektronik');
            $saranapend->jumlahpegawai_kursuselektronik =  $this->colString($row, 'jumlahpegawai_kursuselektronik');
            $saranapend->nama_tataboga =  $this->colString($row, 'nama_tataboga');
            $saranapend->pemilik_tataboga =  $this->colString($row, 'pemilik_tataboga');
            $saranapend->kondisi_tataboga =  $this->colString($row, 'kondisi_tataboga');
            $saranapend->jumlahguru_tataboga =  $this->colString($row, 'jumlahguru_tataboga');
            $saranapend->jumlahmurid_tataboga =  $this->colString($row, 'jumlahmurid_tataboga');
            $saranapend->jumlahpegawai_tataboga =  $this->colString($row, 'jumlahpegawai_tataboga');
            $saranapend->nama_kursusketik =  $this->colString($row, 'nama_kursusketik');
            $saranapend->pemilik_kursusketik =  $this->colString($row, 'pemilik_kursusketik');
            $saranapend->kondisi_kursusketik =  $this->colString($row, 'kondisi_kursusketik');
            $saranapend->jumlahguru_kursusketik =  $this->colString($row, 'jumlahguru_kursusketik');
            $saranapend->jumlahmurid_kursusketik =  $this->colString($row, 'jumlahmurid_kursusketik');
            $saranapend->jumlahpegawai_kursusketik =  $this->colString($row, 'jumlahpegawai_kursusketik');
            $saranapend->nama_kursusakuntan =  $this->colString($row, 'nama_kursusakuntan');
            $saranapend->pemilik_kursusakuntan =  $this->colString($row, 'pemilik_kursusakuntan');
            $saranapend->kondisi_kursusakuntan =  $this->colString($row, 'kondisi_kursusakuntan');
            $saranapend->jumlahguru_kursusakuntan =  $this->colString($row, 'jumlahguru_kursusakuntan');
            $saranapend->jumlahmurid_kursusakuntan =  $this->colString($row, 'jumlahmurid_kursusakuntan');
            $saranapend->jumlahpegawai_kursusakuntan =  $this->colString($row, 'jumlahpegawai_kursusakuntan');
            $saranapend->nama_kursuslain =  $this->colString($row, 'nama_kursuslain');
            $saranapend->pemilik_kursuslain =  $this->colString($row, 'pemilik_kursuslain');
            $saranapend->kondisi_kursuslain =  $this->colString($row, 'kondisi_kursuslain');
            $saranapend->jumlahguru_kursuslain =  $this->colString($row, 'jumlahguru_kursuslain');
            $saranapend->jumlahmurid_kursuslain =  $this->colString($row, 'jumlahmurid_kursuslain');
            $saranapend->jumlahpegawai_kursuslain =  $this->colString($row, 'jumlahpegawai_kursuslain');
            $saranapend->save();

            $rtkesehatan = rt_kesehatan::firstOrNew(['nik' => $nik]);
            $this->setUmum($rtkesehatan, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $rtkesehatan->nama_rs =  $this->colString($row, 'nama_rs');
            $rtkesehatan->pemilik_rs =  $this->colString($row, 'pemilik_rs');
            $rtkesehatan->jd_rs =  $this->colString($row, 'jd_rs');
            $rtkesehatan->jb_rs =  $this->colString($row, 'jb_rs');
            $rtkesehatan->jts_rs =  $this->colString($row, 'jts_rs');
            $rtkesehatan->jp_rs =  $this->colString($row, 'jp_rs');
            $rtkesehatan->nama_rsb =  $this->colString($row, 'nama_rsb');
            $rtkesehatan->pemilik_rsb =  $this->colString($row, 'pemilik_rsb');
            $rtkesehatan->jd_rsb =  $this->colString($row, 'jd_rsb');
            $rtkesehatan->jb_rsb =  $this->colString($row, 'jb_rsb');
            $rtkesehatan->jts_rsb =  $this->colString($row, 'jts_rsb');
            $rtkesehatan->jp_rsb =  $this->colString($row, 'jp_rsb');
            $rtkesehatan->nama_pdri =  $this->colString($row, 'nama_pdri');
            $rtkesehatan->pemilik_pdri =  $this->colString($row, 'pemilik_pdri');
            $rtkesehatan->jd_pdri =  $this->colString($row, 'jd_pdri');
            $rtkesehatan->jb_pdri =  $this->colString($row, 'jb_pdri');
            $rtkesehatan->jts_pdri =  $this->colString($row, 'jts_pdri');
            $rtkesehatan->jp_pdri =  $this->colString($row, 'jp_pdri');
            $rtkesehatan->nama_ptri =  $this->colString($row, 'nama_ptri');
            $rtkesehatan->pemilik_ptri =  $this->colString($row, 'pemilik_ptri');
            $rtkesehatan->jd_ptri =  $this->colString($row, 'jd_ptri');
            $rtkesehatan->jb_ptri =  $this->colString($row, 'jb_ptri');
            $rtkesehatan->jts_ptri =  $this->colString($row, 'jts_ptri');
            $rtkesehatan->jp_ptri =  $this->colString($row, 'jp_ptri');
            $rtkesehatan->nama_pp =  $this->colString($row, 'nama_pp');
            $rtkesehatan->pemilik_pp =  $this->colString($row, 'pemilik_pp');
            $rtkesehatan->jd_pp =  $this->colString($row, 'jd_pp');
            $rtkesehatan->jb_pp =  $this->colString($row, 'jb_pp');
            $rtkesehatan->jts_pp =  $this->colString($row, 'jts_pp');
            $rtkesehatan->jp_pp =  $this->colString($row, 'jp_pp');
            $rtkesehatan->nama_pbp =  $this->colString($row, 'nama_pbp');
            $rtkesehatan->pemilik_pbp =  $this->colString($row, 'pemilik_pbp');
            $rtkesehatan->jd_pbp =  $this->colString($row, 'jd_pbp');
            $rtkesehatan->jb_pbp =  $this->colString($row, 'jb_pbp');
            $rtkesehatan->jts_pbp =  $this->colString($row, 'jts_pbp');
            $rtkesehatan->jp_pbp =  $this->colString($row, 'jp_pbp');
            $rtkesehatan->nama_tpd =  $this->colString($row, 'nama_tpd');
            $rtkesehatan->pemilik_tpd =  $this->colString($row, 'pemilik_tpd');
            $rtkesehatan->jd_tpd =  $this->colString($row, 'jd_tpd');
            $rtkesehatan->jb_tpd =  $this->colString($row, 'jb_tpd');
            $rtkesehatan->jts_tpd =  $this->colString($row, 'jts_tpd');
            $rtkesehatan->jp_tpd =  $this->colString($row, 'jp_tpd');
            $rtkesehatan->nama_rb =  $this->colString($row, 'nama_rb');
            $rtkesehatan->pemilik_rb =  $this->colString($row, 'pemilik_rb');
            $rtkesehatan->jd_rb =  $this->colString($row, 'jd_rb');
            $rtkesehatan->jb_rb =  $this->colString($row, 'jb_rb');
            $rtkesehatan->jts_rb =  $this->colString($row, 'jts_rb');
            $rtkesehatan->jp_rb =  $this->colString($row, 'jp_rb');
            $rtkesehatan->nama_tpb =  $this->colString($row, 'nama_tpb');
            $rtkesehatan->pemilik_tpb =  $this->colString($row, 'pemilik_tpb');
            $rtkesehatan->jd_tpb =  $this->colString($row, 'jd_tpb');
            $rtkesehatan->jb_tpb =  $this->colString($row, 'jb_tpb');
            $rtkesehatan->jts_tpb =  $this->colString($row, 'jts_tpb');
            $rtkesehatan->jp_tpb =  $this->colString($row, 'jp_tpb');
            $rtkesehatan->nama_poskedes =  $this->colString($row, 'nama_poskedes');
            $rtkesehatan->pemilik_poskedes =  $this->colString($row, 'pemilik_poskedes');
            $rtkesehatan->jd_poskedes =  $this->colString($row, 'jd_poskedes');
            $rtkesehatan->jb_poskedes =  $this->colString($row, 'jb_poskedes');
            $rtkesehatan->jts_poskedes =  $this->colString($row, 'jts_poskedes');
            $rtkesehatan->jp_poskedes =  $this->colString($row, 'jp_poskedes');
            $rtkesehatan->nama_polindes =  $this->colString($row, 'nama_polindes');
            $rtkesehatan->pemilik_polindes =  $this->colString($row, 'pemilik_polindes');
            $rtkesehatan->jd_polindes =  $this->colString($row, 'jd_polindes');
            $rtkesehatan->jb_polindes =  $this->colString($row, 'jb_polindes');
            $rtkesehatan->jts_polindes =  $this->colString($row, 'jts_polindes');
            $rtkesehatan->jp_polindes =  $this->colString($row, 'jp_polindes');
            $rtkesehatan->nama_apotik =  $this->colString($row, 'nama_apotik');
            $rtkesehatan->pemilik_apotik =  $this->colString($row, 'pemilik_apotik');
            $rtkesehatan->jd_apotik =  $this->colString($row, 'jd_apotik');
            $rtkesehatan->jb_apotik =  $this->colString($row, 'jb_apotik');
            $rtkesehatan->jts_apotik =  $this->colString($row, 'jts_apotik');
            $rtkesehatan->jp_apotik =  $this->colString($row, 'jp_apotik');
            $rtkesehatan->nama_tokojamu =  $this->colString($row, 'nama_tokojamu');
            $rtkesehatan->pemilik_tokojamu =  $this->colString($row, 'pemilik_tokojamu');
            $rtkesehatan->jd_tokojamu =  $this->colString($row, 'jd_tokojamu');
            $rtkesehatan->jb_tokojamu =  $this->colString($row, 'jb_tokojamu');
            $rtkesehatan->jts_tokojamu =  $this->colString($row, 'jts_tokojamu');
            $rtkesehatan->jp_tokojamu =  $this->colString($row, 'jp_tokojamu');
            $rtkesehatan->nama_posyandu =  $this->colString($row, 'nama_posyandu');
            $rtkesehatan->pemilik_posyandu =  $this->colString($row, 'pemilik_posyandu');
            $rtkesehatan->jd_posyandu =  $this->colString($row, 'jd_posyandu');
            $rtkesehatan->jb_posyandu =  $this->colString($row, 'jb_posyandu');
            $rtkesehatan->jts_posyandu =  $this->colString($row, 'jts_posyandu');
            $rtkesehatan->jp_posyandu =  $this->colString($row, 'jp_posyandu');
            $rtkesehatan->nama_posbindu =  $this->colString($row, 'nama_posbindu');
            $rtkesehatan->pemilik_posbindu =  $this->colString($row, 'pemilik_posbindu');
            $rtkesehatan->jd_posbindu =  $this->colString($row, 'jd_posbindu');
            $rtkesehatan->jb_posbindu =  $this->colString($row, 'jb_posbindu');
            $rtkesehatan->jts_posbindu =  $this->colString($row, 'jts_posbindu');
            $rtkesehatan->jp_posbindu =  $this->colString($row, 'jp_posbindu');
            $rtkesehatan->nama_tpd =  $this->colString($row, 'nama_tpd');
            $rtkesehatan->pemilik_tpd =  $this->colString($row, 'pemilik_tpd');
            $rtkesehatan->jd_tpd =  $this->colString($row, 'jd_tpd');
            $rtkesehatan->jb_tpd =  $this->colString($row, 'jb_tpd');
            $rtkesehatan->jts_tpd =  $this->colString($row, 'jts_tpd');
            $rtkesehatan->jp_tpd =  $this->colString($row, 'jp_tpd');
            $rtkesehatan->save();

            $mkejadianluarb = rt_kejadianluarbiasa::firstOrNew(['nik' => $nik]);
            $this->setUmum($mkejadianluarb, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mkejadianluarb->nama_muntaber = $this->colString($row, 'nama_muntaber');
            $mkejadianluarb->jp_muntaber = $this->colString($row, 'jp_muntaber');
            $mkejadianluarb->jm_muntaber = $this->colString($row, 'jm_muntaber');
            $mkejadianluarb->nama_dbd = $this->colString($row, 'nama_dbd');
            $mkejadianluarb->jp_dbd = $this->colString($row, 'jp_dbd');
            $mkejadianluarb->jm_dbd = $this->colString($row, 'jm_dbd');
            $mkejadianluarb->nama_campak = $this->colString($row, 'nama_campak');
            $mkejadianluarb->jp_campak = $this->colString($row, 'jp_campak');
            $mkejadianluarb->jm_campak = $this->colString($row, 'jm_campak');
            $mkejadianluarb->nama_malaria = $this->colString($row, 'nama_malaria');
            $mkejadianluarb->jp_malaria = $this->colString($row, 'jp_malaria');
            $mkejadianluarb->jm_malaria = $this->colString($row, 'jm_malaria');
            $mkejadianluarb->nama_fluburung = $this->colString($row, 'nama_fluburung');
            $mkejadianluarb->jp_fluburung = $this->colString($row, 'jp_fluburung');
            $mkejadianluarb->jm_fluburung = $this->colString($row, 'jm_fluburung');
            $mkejadianluarb->nama_covid19 = $this->colString($row, 'nama_covid19');
            $mkejadianluarb->jp_covid19 = $this->colString($row, 'jp_covid19');
            $mkejadianluarb->jm_covid19 = $this->colString($row, 'jm_covid19');
            $mkejadianluarb->nama_hepatitisb = $this->colString($row, 'nama_hepatitisb');
            $mkejadianluarb->jp_hepatitisb = $this->colString($row, 'jp_hepatitisb');
            $mkejadianluarb->jm_hepatitisb = $this->colString($row, 'jm_hepatitisb');
            $mkejadianluarb->nama_hepatitise = $this->colString($row, 'nama_hepatitise');
            $mkejadianluarb->jp_hepatitise = $this->colString($row, 'jp_hepatitise');
            $mkejadianluarb->jm_hepatitise = $this->colString($row, 'jm_hepatitise');
            $mkejadianluarb->nama_dipteri = $this->colString($row, 'nama_dipteri');
            $mkejadianluarb->jp_dipteri = $this->colString($row, 'jp_dipteri');
            $mkejadianluarb->jm_dipteri = $this->colString($row, 'jm_dipteri');
            $mkejadianluarb->nama_chikung = $this->colString($row, 'nama_chikung');
            $mkejadianluarb->jp_chikung = $this->colString($row, 'jp_chikung');
            $mkejadianluarb->jm_chikung = $this->colString($row, 'jm_chikung');
            $mkejadianluarb->nama_leptos = $this->colString($row, 'nama_leptos');
            $mkejadianluarb->jp_leptos = $this->colString($row, 'jp_leptos');
            $mkejadianluarb->jm_leptos = $this->colString($row, 'jm_leptos');
            $mkejadianluarb->nama_kolera = $this->colString($row, 'nama_kolera');
            $mkejadianluarb->jp_kolera = $this->colString($row, 'jp_kolera');
            $mkejadianluarb->jm_kolera = $this->colString($row, 'jm_kolera');
            $mkejadianluarb->nama_giziburuk = $this->colString($row, 'nama_giziburuk');
            $mkejadianluarb->jp_giziburuk = $this->colString($row, 'jp_giziburuk');
            $mkejadianluarb->jm_giziburuk = $this->colString($row, 'jm_giziburuk');
            $mkejadianluarb->nama_lainnya = $this->colString($row, 'nama_lainnya');
            $mkejadianluarb->jp_lainnya = $this->colString($row, 'jp_lainnya');
            $mkejadianluarb->jm_lainnya = $this->colString($row, 'jm_lainnya');
            $mkejadianluarb->save();

            $mrtagama = rt_agama::firstOrNew(['nik' => $nik]);
            $this->setUmum($mrtagama, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mrtagama->jumlahwarga_jamkes = $this->colString($row, 'jumlahwarga_jamkes');
            $mrtagama->jumlahwarga_jamketerangan = $this->colString($row, 'jumlahwarga_jamketerangan');
            $mrtagama->jumlahtempat_masjid = $this->colString($row, 'jumlahtempat_masjid');
            $mrtagama->jumlahtempat_musholla = $this->colString($row, 'jumlahtempat_musholla');
            $mrtagama->jumlahtempat_kristen = $this->colString($row, 'jumlahtempat_kristen');
            $mrtagama->jumlahtempat_katolik = $this->colString($row, 'jumlahtempat_katolik');
            $mrtagama->jumlahtempat_kapel = $this->colString($row, 'jumlahtempat_kapel');
            $mrtagama->jumlahtempat_pura = $this->colString($row, 'jumlahtempat_pura');
            $mrtagama->jumlahtempat_wihara = $this->colString($row, 'jumlahtempat_wihara');
            $mrtagama->jumlahtempat_kelenteng = $this->colString($row, 'jumlahtempat_kelenteng');
            $mrtagama->jumlahtempat_lainnya = $this->colString($row, 'jumlahtempat_lainnya');
            $mrtagama->cagar_bud1 = $this->colString($row, 'cagar_bud1');
            $mrtagama->cagar_bud2 = $this->colString($row, 'cagar_bud2');
            $mrtagama->cagar_bud3 = $this->colString($row, 'cagar_bud3');
            $mrtagama->sukuasing_keluarga = $this->colString($row, 'sukuasing_keluarga');
            $mrtagama->sukuasing_jiwa = $this->colString($row, 'sukuasing_jiwa');
            $mrtagama->ruangpublik_terbuka = $this->colString($row, 'ruangpublik_terbuka');
            $mrtagama->adat_kehamilan = $this->colString($row, 'adat_kehamilan');
            $mrtagama->adat_kelahiran = $this->colString($row, 'adat_kelahiran');
            $mrtagama->adat_pekerjaan = $this->colString($row, 'adat_pekerjaan');
            $mrtagama->adat_alam = $this->colString($row, 'adat_alam');
            $mrtagama->adat_perkawinan = $this->colString($row, 'adat_perkawinan');
            $mrtagama->adat_kehidupanwarga = $this->colString($row, 'adat_kehidupanwarga');
            $mrtagama->adat_kematian = $this->colString($row, 'adat_kematian');
            $mrtagama->save();

            $mlembagakeagamaan = rtlembaga_keagamaan::firstOrNew(['nik' => $nik]);
            $this->setUmum($mlembagakeagamaan, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mlembagakeagamaan->nama =  $this->colString($row, 'nama');
            $mlembagakeagamaan->jumlah_peng =  $this->colString($row, 'jumlah_peng');
            $mlembagakeagamaan->jumlah_ang =  $this->colString($row, 'jumlah_ang');
            $mlembagakeagamaan->fasilitas =  $this->colString($row, 'fasilitas');
            $mlembagakeagamaan->save();

            $rtkeamanan = rt_keamanan::firstOrNew(['nik' => $nik]);
            $this->setUmum($rtkeamanan, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $rtkeamanan->penyebabu_antarkelompokmas = $this->colString($row, 'penyebabu_antarkelompokmas');
            $rtkeamanan->jk_antarkelompokmas = $this->colString($row, 'jk_antarkelompokmas');
            $rtkeamanan->jkl_antarkelompokmas = $this->colString($row, 'jkl_antarkelompokmas');
            $rtkeamanan->jt_antarkelompokmas = $this->colString($row, 'jt_antarkelompokmas');
            $rtkeamanan->pen_antarkelompokmas = $this->colString($row, 'pen_antarkelompokmas');
            $rtkeamanan->pp_antarkelompokmas = $this->colString($row, 'pp_antarkelompokmas');
            $rtkeamanan->penyebabu_antardesa = $this->colString($row, 'penyebabu_antardesa');
            $rtkeamanan->jk_antardesa = $this->colString($row, 'jk_antardesa');
            $rtkeamanan->jkl_antardesa = $this->colString($row, 'jkl_antardesa');
            $rtkeamanan->jt_antardesa = $this->colString($row, 'jt_antardesa');
            $rtkeamanan->pen_antardesa = $this->colString($row, 'pen_antardesa');
            $rtkeamanan->pp_antardesa = $this->colString($row, 'pp_antardesa');
            $rtkeamanan->penyebabu_aparatmk = $this->colString($row, 'penyebabu_aparatmk');
            $rtkeamanan->jk_aparatmk = $this->colString($row, 'jk_aparatmk');
            $rtkeamanan->jkl_aparatmk = $this->colString($row, 'jkl_aparatmk');
            $rtkeamanan->jt_aparatmk = $this->colString($row, 'jt_aparatmk');
            $rtkeamanan->pen_aparatmk = $this->colString($row, 'pen_aparatmk');
            $rtkeamanan->pp_aparatmk = $this->colString($row, 'pp_aparatmk');
            $rtkeamanan->penyebabu_aparatmp = $this->colString($row, 'penyebabu_aparatmp');
            $rtkeamanan->jk_aparatmp = $this->colString($row, 'jk_aparatmp');
            $rtkeamanan->jkl_aparatmp = $this->colString($row, 'jkl_aparatmp');
            $rtkeamanan->jt_aparatmp = $this->colString($row, 'jt_aparatmp');
            $rtkeamanan->pen_aparatmp = $this->colString($row, 'pen_aparatmp');
            $rtkeamanan->pp_aparatmp = $this->colString($row, 'pp_aparatmp');
            $rtkeamanan->penyebabu_aparatk = $this->colString($row, 'penyebabu_aparatk');
            $rtkeamanan->jk_aparatk = $this->colString($row, 'jk_aparatk');
            $rtkeamanan->jkl_aparatk = $this->colString($row, 'jkl_aparatk');
            $rtkeamanan->jt_aparatk = $this->colString($row, 'jt_aparatk');
            $rtkeamanan->pen_aparatk = $this->colString($row, 'pen_aparatk');
            $rtkeamanan->pp_aparatk = $this->colString($row, 'pp_aparatk');
            $rtkeamanan->penyebabu_aparatp = $this->colString($row, 'penyebabu_aparatp');
            $rtkeamanan->jk_aparatp = $this->colString($row, 'jk_aparatp');
            $rtkeamanan->jkl_aparatp = $this->colString($row, 'jkl_aparatp');
            $rtkeamanan->jt_aparatp = $this->colString($row, 'jt_aparatp');
            $rtkeamanan->pen_aparatp = $this->colString($row, 'pen_aparatp');
            $rtkeamanan->pp_aparatp = $this->colString($row, 'pp_aparatp');
            $rtkeamanan->penyebabu_pelajar = $this->colString($row, 'penyebabu_pelajar');
            $rtkeamanan->jk_pelajar = $this->colString($row, 'jk_pelajar');
            $rtkeamanan->jkl_pelajar = $this->colString($row, 'jkl_pelajar');
            $rtkeamanan->jt_pelajar = $this->colString($row, 'jt_pelajar');
            $rtkeamanan->pen_pelajar = $this->colString($row, 'pen_pelajar');
            $rtkeamanan->pp_pelajar = $this->colString($row, 'pp_pelajar');
            $rtkeamanan->penyebabu_suku = $this->colString($row, 'penyebabu_suku');
            $rtkeamanan->jk_suku = $this->colString($row, 'jk_suku');
            $rtkeamanan->jkl_suku = $this->colString($row, 'jkl_suku');
            $rtkeamanan->jt_suku = $this->colString($row, 'jt_suku');
            $rtkeamanan->pen_suku = $this->colString($row, 'pen_suku');
            $rtkeamanan->pp_suku = $this->colString($row, 'pp_suku');
            $rtkeamanan->penyebabu_lainnya = $this->colString($row, 'penyebabu_lainnya');
            $rtkeamanan->jk_lainnya = $this->colString($row, 'jk_lainnya');
            $rtkeamanan->jkl_lainnya = $this->colString($row, 'jkl_lainnya');
            $rtkeamanan->jt_lainnya = $this->colString($row, 'jt_lainnya');
            $rtkeamanan->pen_lainnya = $this->colString($row, 'pen_lainnya');
            $rtkeamanan->pp_lainnya = $this->colString($row, 'pp_lainnya');
            $rtkeamanan->save();

            $rtkejahatan = rt_tkejahatan::firstOrNew(['nik' => $nik]);
            $this->setUmum($rtkejahatan, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $rtkejahatan->jk_pencurian = $this->colString($row, 'jk_pencurian');
            $rtkejahatan->jumlahselesai_pencurian = $this->colString($row, 'jumlahselesai_pencurian');
            $rtkejahatan->jktbd_pencurian = $this->colString($row, 'jktbd_pencurian');
            $rtkejahatan->kll_pencurian = $this->colString($row, 'kll_pencurian');
            $rtkejahatan->kt_pencurian = $this->colString($row, 'kt_pencurian');
            $rtkejahatan->jk_pencuriankeras = $this->colString($row, 'jk_pencuriankeras');
            $rtkejahatan->jumlahselesai_pencuriankeras = $this->colString($row, 'jumlahselesai_pencuriankeras');
            $rtkejahatan->jktbd_pencuriankeras = $this->colString($row, 'jktbd_pencuriankeras');
            $rtkejahatan->kll_pencuriankeras = $this->colString($row, 'kll_pencuriankeras');
            $rtkejahatan->kt_pencuriankeras = $this->colString($row, 'kt_pencuriankeras');
            $rtkejahatan->jk_penipuan = $this->colString($row, 'jk_penipuan');
            $rtkejahatan->jumlahselesai_penipuan = $this->colString($row, 'jumlahselesai_penipuan');
            $rtkejahatan->jktbd_penipuan = $this->colString($row, 'jktbd_penipuan');
            $rtkejahatan->kll_penipuan = $this->colString($row, 'kll_penipuan');
            $rtkejahatan->kt_penipuan = $this->colString($row, 'kt_penipuan');
            $rtkejahatan->jk_penganiyayaan = $this->colString($row, 'jk_penganiyayaan');
            $rtkejahatan->jumlahselesai_penganiyayaan = $this->colString($row, 'jumlahselesai_penganiyayaan');
            $rtkejahatan->jktbd_penganiyayaan = $this->colString($row, 'jktbd_penganiyayaan');
            $rtkejahatan->kll_penganiyayaan = $this->colString($row, 'kll_penganiyayaan');
            $rtkejahatan->kt_penganiyayaan = $this->colString($row, 'kt_penganiyayaan');
            $rtkejahatan->jk_pembakaran = $this->colString($row, 'jk_pembakaran');
            $rtkejahatan->jumlahselesai_pembakaran = $this->colString($row, 'jumlahselesai_pembakaran');
            $rtkejahatan->jktbd_pembakaran = $this->colString($row, 'jktbd_pembakaran');
            $rtkejahatan->kll_pembakaran = $this->colString($row, 'kll_pembakaran');
            $rtkejahatan->kt_pembakaran = $this->colString($row, 'kt_pembakaran');
            $rtkejahatan->jk_pemerkosaan = $this->colString($row, 'jk_pemerkosaan');
            $rtkejahatan->jumlahselesai_pemerkosaan = $this->colString($row, 'jumlahselesai_pemerkosaan');
            $rtkejahatan->jktbd_pemerkosaan = $this->colString($row, 'jktbd_pemerkosaan');
            $rtkejahatan->kll_pemerkosaan = $this->colString($row, 'kll_pemerkosaan');
            $rtkejahatan->kt_pemerkosaan = $this->colString($row, 'kt_pemerkosaan');
            $rtkejahatan->jk_narkoba = $this->colString($row, 'jk_narkoba');
            $rtkejahatan->jumlahselesai_narkoba = $this->colString($row, 'jumlahselesai_narkoba');
            $rtkejahatan->jktbd_narkoba = $this->colString($row, 'jktbd_narkoba');
            $rtkejahatan->kll_narkoba = $this->colString($row, 'kll_narkoba');
            $rtkejahatan->kt_narkoba = $this->colString($row, 'kt_narkoba');
            $rtkejahatan->jk_perjudian = $this->colString($row, 'jk_perjudian');
            $rtkejahatan->jumlahselesai_perjudian = $this->colString($row, 'jumlahselesai_perjudian');
            $rtkejahatan->jktbd_perjudian = $this->colString($row, 'jktbd_perjudian');
            $rtkejahatan->kll_perjudian = $this->colString($row, 'kll_perjudian');
            $rtkejahatan->kt_perjudian = $this->colString($row, 'kt_perjudian');
            $rtkejahatan->jk_pembunuhan = $this->colString($row, 'jk_pembunuhan');
            $rtkejahatan->jumlahselesai_pembunuhan = $this->colString($row, 'jumlahselesai_pembunuhan');
            $rtkejahatan->jktbd_pembunuhan = $this->colString($row, 'jktbd_pembunuhan');
            $rtkejahatan->kll_pembunuhan = $this->colString($row, 'kll_pembunuhan');
            $rtkejahatan->kt_pembunuhan = $this->colString($row, 'kt_pembunuhan');
            $rtkejahatan->jk_perdaganganorang = $this->colString($row, 'jk_perdaganganorang');
            $rtkejahatan->jumlahselesai_perdaganganorang = $this->colString($row, 'jumlahselesai_perdaganganorang');
            $rtkejahatan->jktbd_perdaganganorang = $this->colString($row, 'jktbd_perdaganganorang');
            $rtkejahatan->kll_perdaganganorang = $this->colString($row, 'kll_perdaganganorang');
            $rtkejahatan->kt_perdaganganorang = $this->colString($row, 'kt_perdaganganorang');
            $rtkejahatan->jk_korupsi = $this->colString($row, 'jk_korupsi');
            $rtkejahatan->jumlahselesai_korupsi = $this->colString($row, 'jumlahselesai_korupsi');
            $rtkejahatan->jktbd_korupsi = $this->colString($row, 'jktbd_korupsi');
            $rtkejahatan->kll_korupsi = $this->colString($row, 'kll_korupsi');
            $rtkejahatan->kt_korupsi = $this->colString($row, 'kt_korupsi');
            $rtkejahatan->jk_lainnya = $this->colString($row, 'jk_lainnya');
            $rtkejahatan->jumlahselesai_lainnya = $this->colString($row, 'jumlahselesai_lainnya');
            $rtkejahatan->jktbd_lainnya = $this->colString($row, 'jktbd_lainnya');
            $rtkejahatan->kll_lainnya = $this->colString($row, 'kll_lainnya');
            $rtkejahatan->kt_lainnya = $this->colString($row, 'kt_lainnya');
            $rtkejahatan->save();

            $mkegiatan = rtkegiatan_warga::firstOrNew(['nik' => $nik]);
            $this->setUmum($mkegiatan, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir);
            $mkegiatan->jumlah_kpp = $this->colString($row, 'jumlah_kpp');
            $mkegiatan->jumlah_ppr = $this->colString($row, 'jumlah_ppr');
            $mkegiatan->jumlah_hansip = $this->colString($row, 'jumlah_hansip');
            $mkegiatan->pelaporan_tamu_lebih24 = $this->colString($row, 'pelaporan_tamu_lebih24');
            $mkegiatan->sistem_keamanan = $this->colString($row, 'sistem_keamanan');
            $mkegiatan->sistem_linmas = $this->colString($row, 'sistem_linmas');
            $mkegiatan->jumlahpos_digunakan = $this->colString($row, 'jumlahpos_digunakan');
            $mkegiatan->jumlahpos_tidakdigunakan = $this->colString($row, 'jumlahpos_tidakdigunakan');
            $mkegiatan->jarak_ppt = $this->colString($row, 'jarak_ppt');
            $mkegiatan->kemudahan_ppt = $this->colString($row, 'kemudahan_ppt');
            $mkegiatan->jarak_korban = $this->colString($row, 'jarak_korban');
            $mkegiatan->jarak_lokasikumpul = $this->colString($row, 'jarak_lokasikumpul');
            $mkegiatan->jarak_mangkal = $this->colString($row, 'jarak_mangkal');
            $mkegiatan->jarak_lokalisasi = $this->colString($row, 'jarak_lokalisasi');
            $mkegiatan->save();
        });


        // =========================
        // 3) industri
        // =========================


    }

    // ============== Helpers ==============

    private function setUmum($m, $kk, $nik, $gelarAwal, $nama, $namaFull, $gelarAkhir, $jenisKelamin, $tempatLahir)
    {
        $m->kk           = $kk;
        $m->nik          = $nik;
        $m->gelarawal    = $gelarAwal;
        $m->nama         = $nama ?: $namaFull;
        $m->gelarakhir   = $gelarAkhir;
        $m->Jeniskelamin = $jenisKelamin;
        $m->tempatlahir  = $tempatLahir;
    }

    private function asString($val): ?string
    {
        if ($val === null) return null;
        return trim((string)$val);
    }

    private function colString($row, string $key): ?string
    {
        $i = $this->idx[$key] ?? null;
        if ($i === null) return null;
        return $this->asString($row[$i] ?? null);
    }

    private function colInt($row, string $key): ?int
    {
        $i = $this->idx[$key] ?? null;
        if ($i === null) return null;
        $val = $row[$i] ?? null;
        if ($val === null || $val === '') return null;
        if (is_string($val)) $val = str_replace(['.', ',', ' '], '', $val);
        return (int)$val;
    }
}
