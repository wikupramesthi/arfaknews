-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 28 Des 2017 pada 08.14
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarfaknews`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `id_channel` int(11) DEFAULT NULL,
  `id_categories` int(11) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tanggal_tayang` date DEFAULT '0000-00-00',
  `waktu` time DEFAULT '00:00:00',
  `isi` longtext,
  `lead` text,
  `judul` text,
  `headline` enum('0','1') NOT NULL DEFAULT '0',
  `publish` enum('0','1') NOT NULL DEFAULT '1',
  `breaking` enum('0','1') NOT NULL DEFAULT '0',
  `analisis` enum('0','1') NOT NULL DEFAULT '0',
  `featured` enum('0','1') NOT NULL DEFAULT '0',
  `hot` enum('0','1') NOT NULL DEFAULT '0',
  `tag` varchar(255) DEFAULT NULL,
  `gambar_detail` varchar(255) DEFAULT NULL,
  `fokus` int(11) DEFAULT '1',
  `caption` varchar(255) DEFAULT NULL,
  `counter` bigint(20) DEFAULT '0',
  `media` int(1) DEFAULT '0',
  `media_data` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `id_channel`, `id_categories`, `penulis`, `tanggal_tayang`, `waktu`, `isi`, `lead`, `judul`, `headline`, `publish`, `breaking`, `analisis`, `featured`, `hot`, `tag`, `gambar_detail`, `fokus`, `caption`, `counter`, `media`, `media_data`) VALUES
(954, 2, 0, 'AN', '2017-12-26', '09:22:00', '<p><strong>JAKARTA, KOMPAS.com</strong>&nbsp;- Sejumlah pelatih olahraga disabilitas Indonesia mengikuti pelatihan di Hotel Ambhara Blok M, Jakarta,&nbsp;pada 5-9 Desember 2017.</p>\n\n<p>Acara bertajuk Pelatihan Nasional Pelatih Olahraga Disabilitas ini&nbsp;dibuka oleh Asisten Deputi Peningkatan Tenaga dan Organisasi Keolahragaan Marheni Dyah Kusumawati pada Rabu (6/12/2017). Kegiatan tersebut diharapkan bisa memberikan kontribusi pelatih nasional disabilitas untuk Asian Para Games (APG) 2018.</p>\n\n<p>&quot;Pelatihan ini merupakan bentuk komitmen&nbsp;<a href=\"http://indeks.kompas.com/tag/Kemenpora\" target=\"_blank\">Kemenpora</a>&nbsp;dalam mendukung pembinaan olahraga disabilitas demi meningkatkan prestasi para atletnya dalam berbagai ajang internasional,&quot; kata Marheni.</p>\n\n<p>Lulusan pelatihan ini bakal menjadi kandidat pelatih kontingen Indonesia dalam rangka persiapan mengikuti APG 2018.</p>\n\n<p>&quot;Kami berharap dapat meraih prestasi optimal pada&nbsp;<a href=\"http://indeks.kompas.com/tag/Asian-Para-Games-2018\" target=\"_blank\">Asian Para Games 2018</a>. Tentu lawan-lawannya akan lebih berat. Oleh karena itu, para pelatih harus menjawab tantangan tersebut,&quot; tutur Marheni menambahkan.</p>\n\n<p>Salah satu narasumber, Dr Sapta Kunta Purnama, mengatakan bahwa pelatih memiliki peranan penting dalam menyiapkan kontingen APG.</p>\n\n<p>Ia berharap prestasi atlet Indonesia bisa melampaui pencapaian pada APG 2014.</p>\n\n<p>&quot;Semoga saja kita bisa dapat emas 19-20 medali emas,&quot; ujar Sapta.</p>\n\n<p>Ketua Pelaksana Kegiatan Yayan Rubaeni mengatakan, kegiatan ini diikuti oleh 50 orang yang berasal dari 21 provinsi. Semua peserta merupakan pelatih yang telah memiliki atlet berprestasi. Selama pelatihan, peserta akan menerima materi berupa teori dan praktek dari narasumber.</p>\n', 'JAKARTA, KOMPAS.com - Sejumlah pelatih olahraga disabilitas Indonesia mengikuti pelatihan di Hotel Ambhara Blok M, Jakarta, pada 5-9 Desember 2017.', 'Pelatih Olahraga Disabilitas Timba Ilmu Jelang Asian Para Games 2018', '1', '1', '', '1', '', '', 'kemenpora, Asian Para Games 2018', '954.jpg', 1, 'Sejumlah pelatih olahraga disabilitas mengikuti pelatihan untuk meningkat prestasi atlet Indonesia pada Asian Para Games 2018, di Hotel Ambhara Blok M, Jakarta, pada 5-9 Desember 2017.(KEMENPORA)', 3, 0, ''),
(951, 1, 132, 'AN', '2017-12-26', '07:34:00', '<p><strong>JAKARTA, KOMPAS.com</strong>&nbsp;- Istri Setya Novanto&nbsp;Deisti Astriani Tagor membawa makanan untuk sang suami saat membesuk di Rumah Tahanan Komisi Pemberantasan Korupsi (&nbsp;<a href=\"http://indeks.kompas.com/tag/KPK\" target=\"_blank\">KPK</a>), Jakarta, pada libur Hari Natal, Senin (25/12/2017).</p>\n\n<p>Ia membawa menu bihun bebek untuk suaminya. Itu ia ungkapkan saat hendak pulang dan berjalan menuju mobilnya. Deisti keluar sekitar pukul 13.08 WIB.</p>\n\n<p>&quot;Bebek bihun,&quot; ujar Deisti menjawab pertanyaan wartawan ihwal makanan yang dibawanya untuk&nbsp;<a href=\"http://indeks.kompas.com/tag/Novanto\" target=\"_blank\">Novanto</a>.</p>\n\n<p>Ia juga mengatakan Novanto dalam kondisi sehat. Hanya dua pertanyaan yang wartawan yang dijawab Deisti yakni soal makanan yang dibawa dan kesehatan Novanto. Selepas itu ia langsung memasuki mobil Toyota Innova yang menantinya.</p>\n\n<p>&quot;Sehat, sehat,&quot; ucap Deisti singkat.</p>\n\n<p>Berbeda dengan Deisti, putra-putri Novanto, Rheza Herwindo dan Dwina Michaella yang keluar lebih dulu yakni sekitar pukul 13.00 WIB, bungkam saat ditanya wartawan. Keduanya hanya berjalan melengos menuju mobilnya lantas pergi.</p>\n\n<p>Putra Setya Novanto diperiksa KPK sebagai saksi dalam kasus korupsi E-KTP.(Kompas TV)</p>\n', 'JAKARTA, KOMPAS.com - Istri Setya Novanto Deisti Astriani Tagor membawa makanan untuk sang suami saat membesuk di Rumah Tahanan Komisi Pemberantasan Korupsi ( KPK), Jakarta, pada libur Hari Natal, Senin (25/12/2017).', 'Jenguk ke Rutan KPK, Istri Setya Novanto Bawa Bihun Bebek', '', '1', '1', '', '', '1', 'KPK, Setya, Novanto Novanto', '951.jpg', 1, 'Istri Setya Novanto Deisti Astriani Tahor membesuk suaminya di rutan KPK(Kompas.com/Rakhmat Nur Hakim)', 16, 0, ''),
(953, 2, 0, 'AN', '2017-12-26', '09:17:00', '<p><strong>JAKARTA, KOMPAS.com&nbsp;</strong>- Maria Goreti Samiyati merupakan atlet paralimpiade berprestasi Indonesia. Atlet balap kursi roda itu telah mengharumkan nama bangsa lewat medali emas yang diraihnya.&nbsp;</p>\n\n<p>Maria Goreti Samiyati hadir saat Indonesia Asian Para Games Organizing Committee (Inapgoc) melakukan sosialisasi&nbsp;<a href=\"http://indeks.kompas.com/tag/Asian-Para-Games-2018\" target=\"_blank\">Asian Para Games 2018</a>&nbsp;di Cilandak Town Square, Jakarta, pada Jumat (22/12/2017).</p>\n\n<p>Atlet yang akrab disapa Ami itu akan bertarung pada Asian Para Games 2018 dalam nomor 100 meter, 200 meter, dan 400 meter.</p>\n\n<p>Dia patut menjadi contoh lantaran mampu berprestasi meski kakinya telah diamputasi. Perempuan berusia 29 tahun ini menceritakan kisah di balik satu kakinya yang telah hilang.</p>\n\n<p>&quot;Saya mengalami kecelakaan kereta,&quot; kata Ami kepada&nbsp;<em>BolaSport.com</em>.</p>\n\n<p>&quot;Saat itu, tahun 2003, saya sedang lari-larian di rel kereta api bersama teman. Lalu, saya mendengar ada yang berteriak &#39;Awas mbak, ada kereta&#39;,&quot; ucap Ami.</p>\n\n<p>Perempuan asal Cilacap ini melanjutkan ceritanya.</p>\n \n <p><img alt=\"\" src=\"http://ads3.kompasads.com/new/www/delivery/lg.php?bannerid=0&campaignid=0&z  /></p>\n\n<p>&quot;Tiba-tiba kereta tersebut lewat. Saya terkena angin dari kereta yang melintas sehingga terpental jauh dan terbanting,&quot; ujar Ami.</p>\n\n<p>Kejadian tersebut membuat Ami harus kehilangan kakinya. Namun, dia tidak putus asa.</p>\n\n<p>Pada 2014, Ami bergabung dengan National Paralympic Committee (NPC), yang merupakan wadah untuk olahraga bagi penyandang disabilitas.</p>\n\n<p><strong>(Baca Juga:&nbsp;<a href=\"https://www.bolasport.com/read/bola/spanyol/229608-gareth-bale-selalu-bawa-sial-saat-real-madrid-menjamu-barcelona\" target=\"_blank\">Gareth Bale Selalu Bawa Sial Saat Real Madrid Menjamu Barcelona</a>)</strong></p>\n\n<p>Ami pun langsung menyabet tiga emas dalam kejurnas pertamanya di Solo, Jawa Tengah, pada 2015. Dia memenangi nomor 100 meter, 200 meter, dan 400 meter.</p>\n\n<p>Pencapaian tersebut yang diharapkan Ami dapat terulang pada Asian Para Games 2018 di Jakarta.&nbsp;<strong>(Septian Tambunan)&nbsp;</strong></p>\n', 'JAKARTA, KOMPAS.com - Maria Goreti Samiyati merupakan atlet paralimpiade berprestasi Indonesia. Atlet balap kursi roda itu telah mengharumkan nama bangsa lewat medali emas yang diraihnya. ', 'Kisah Ami, Atlet Balap Kursi Roda Indonesia untuk Asian Para Games', '', '1', '', '1', '', '', 'Asian Gmes, Asian Para Games 2018, Atlit Kursi Roda', '953.jpg', 1, 'Atlet balap kursi roda dari National Paralympic Committee DKI Jakarta, Maria Goreti Samiyati, berpose dalam acara sosialisasi Asian Para Games 2018 di Cilandak Town Square, Jakarta, pada 22 Desember 2017. (BolaSport.com/Septian Tambunan)', 3, 0, ''),
(952, 1, 132, 'AN', '2017-12-26', '09:03:00', '<p><strong>JAKARTA, KOMPAS.com</strong>&nbsp;- Istri dan putri&nbsp;<a href=\"http://indeks.kompas.com/tag/Setya-Novanto\" target=\"_blank\">Setya Novanto</a>,&nbsp;<a href=\"http://indeks.kompas.com/tag/Deisti-Astriani-Tagor\" target=\"_blank\">Deisti Astriani Tagor</a>&nbsp;serta&nbsp;<a href=\"http://indeks.kompas.com/tag/Dwina-Michaella\" target=\"_blank\">Dwina Michaella</a>, terlihat tengah menunggu dibukanya jam besuk tahanan di Rumah Tahanan (Rutan) Komisi Pemberantasan Korupsi (&nbsp;<a href=\"http://indeks.kompas.com/tag/KPK\" target=\"_blank\">KPK</a>), Kuningan, Jakarta Selatan, Senin (25/12/2017).</p>\n\n<p>Mereka hendak menjenguk Novanto dalam kesempatan libur Hari Natal kali ini. Keduanya tampak berbincang dengan anggota keluarga lainnya yang turut menjenguk.</p>\n\n<p>Dwina tampak santai dengan mengenakan kaos sporty berwarna hijau dipadu dengan celana jeans warna hitam. Sementara itu Deisti mengenakan gamis dan celana panjang berwarna abu-abu, serta dipadu kerudung yang senada.</p>\n\n<p>Keduanya juga tak memedulikan sorotan kamera awak media yang sedari awal menyasar mereka. Dwina dan Deisti santai mengobrol tanpa merasa terganggu kehadiran awak media.</p>\n\n<p><strong>Baca juga:&nbsp;<a href=\"http://nasional.kompas.com/read/2017/12/24/06000031/setya-novanto-kasus-hukum-dan-kisahnya-di-panggung-politik\" target=\"_blank\">Setya Novanto, Kasus Hukum, dan Kisahnya di Panggung Politik</a></strong></p>\n\n<p>Padahal, sebelumnya setelah diperiksa KPK pada Kamis (21/12/2017), Dwina sempat menghindari kejaran para para wartawan.</p>\n\n<p>Pada Kamis pagi, Dwina datang memenuhi panggilan KPK untuk diperiksa sebagai saksi bagi salah satu tersangka kasus e-KTP, Dirut PT Quadra Solution Anang Sugiana Sudiharjo.</p>\n\n<p>Kepala Bagian Pemberitaan dan Publikasi Komisi Pemberantasan Korupsi, Priharsa Nugraha mengatakan, pada pemeriksaan Dwina, penyidik ingin mendalami soal saham PT Murakabi Sejahtera.</p>\n\n<p>Dwina diketahui merupakan mantan komisaris perusahaan yang pernah menjadi salah satu konsorsium peserta lelang proyek e-KTP itu.</p>\n\n<p>&quot;Yang coba didalami berkaitan dengan kepemilikan saham Murakabi, dan siapa pihak yang menyerahkan saham tersebut kepada yang bersangkutan,&quot; kata Priharsa, di Gedung KPK, Kuningan, Jakarta, Kamis (21/12/2017).</p>\n\n<p>Bersama keponakan Novanto, Irvanto Hendra Pambudi, Dwina disebut memiliki saham di Murakabi. Murakabi sendiri merupakan perusahaan yang pernah menjadi salah satu konsorsium peserta lelang proyek e-KTP.</p>\n\n<p>Atas pengaturan Andi Agustinus alias Andi Narogong, PT Murakabi hanya sebagai perusahaan pendamping. Saham mayoritas Murakabi dikuasai oleh PT Mondialindo Graha Perdana. Putra Novanto, Rheza Herwindo, dan istri Novanto, Deisti Astriani Tagor, memiliki saham di Mondialindo.</p>\n\n<p>Adapun, PT Murakabi Sejahtera dan PT Mondialindo sama-sama berkantor di Lantai 27 Gedung Menara Imperium, Kuningan, Jakarta. Kantor tersebut dimiliki oleh Setya Novanto.</p>\n', 'JAKARTA, KOMPAS.com - Istri dan putri Setya Novanto, Deisti Astriani Tagor serta Dwina Michaella, terlihat tengah menunggu dibukanya jam besuk tahanan di Rumah Tahanan (Rutan) Komisi Pemberantasan Korupsi ( KPK), Kuningan, Jakarta Selatan, Senin (25/12/2017).', 'Istri dan Anak Jenguk Setya Novanto di Hari Natal', '', '1', '', '1', '1', '', 'KPK, Setya Novanto, Deisti Astriani, Tagor Dwina Michaella', '952.jpg', 1, 'Putri Setya Novanto Dwina Michaella (berdiri di samping loker) saat tiba di Rutan KPK, Senin (25/12/2017).', 1, 0, ''),
(950, 1, 132, 'AN', '2017-12-26', '07:12:00', '<p><strong>JAKARTA, KOMPAS.com</strong>&nbsp;&mdash; Panglima TNI Marsekal Hadi Tjahjanto membatalkan keputusan panglima TNI sebelumnya, Jenderal&nbsp;<a href=\"http://indeks.kompas.com/tag/Gatot-Nurmantyo\" target=\"_blank\">Gatot Nurmantyo</a>, tentang mutasi sejumlah perwira tinggi TNI.</p>\n\n<p>Surat yang diterbitkan Gatot bernomor Kep/982/XII/2017 tertanggal 4 Desember dianulir lewat penerbitan surat keputusan baru dari Panglima Hadi bernomor Kep/928.a/XII/2017 tertanggal 19 Desember.</p>\n\n<p>Dalam surat keputusan yang diteken pada akhir masa jabatannya sebagai panglima TNI, Gatot Nurmantyo memutasi 85 perwira tinggi TNI.</p>\n\n<p>Namun, melalui surat keputusan baru ini, rotasi terhadap 16 perwira tinggi TNI yang sebelumnya dilakukan Gatot dinyatakan tidak ada.</p>\n\n<p>Salah satu perwira tinggi yang batal dirotasi adalah Letjen TNI Edy Rahmayadi. Edy sebelumnya dirotasi Gatot dari jabatan Pangkostrad menjadi Perwira Tinggi Mabes TNI AD dalam rangka pensiun dini. Namun, rotasi itu dinyatakan tidak ada dan Edy tetap menjabat Pangkostrad.</p>\n\n<p>Kepala Pusat Penerangan (Kapuspen) TNI Mayjen TNI Fahdhilah membenarkan adanya surat baru yang diteken Hadi.</p>\n\n<p>&quot;Benar, itu suratnya benar,&quot; kata Fadhilah di Landasan Udara Halim Perdanakusuma, Jakarta, Rabu (20/12/2017).</p>\n\n<p>(Baca juga:&nbsp;<a href=\"http://nasional.kompas.com/read/2017/12/06/23125431/wiranto-minta-rotasi-85-perwira-tinggi-tni-tak-diributkan\" target=\"_blank\">Wiranto Minta Rotasi 85 Perwira Tinggi TNI Tak Diributkan</a>)</p>\n\n<p>Fadhilah beralasan bahwa keputusan Hadi tersebut diambil atas kebutuhan organisasi. Fadhilah menegaskan bahwa Hadi mempunyai wewenang menganulir keputusan Gatot.</p>\n\n<p>&quot;Kan, Pak Gatot sendiri sudah sampaikan akan diserahkan ke Pak Hadi untuk dilakukan evaluasi,&quot; ucap Fadhilah.</p>\n\n<p>Berikut 16 mutasi yang dianulir Hadi:</p>\n\n<p>1. Letjen TNI Edy Rahmayadi NRP 30442, Pangkostrad jabatan baru sebagai Perwira Tinggi Mabes TNI AD</p>\n\n<p>2. Mayjen TNI Sudirman NRP 30786, Asops Kasad jabatan baru sebagai Pangkostrad</p>\n\n<p>3. Mayjen TNI AM Putranto, S.Sos. NRP 31102, Pangdam II/Swj jabatan baru sebagai Asops Kasad</p>\n\n<p>4. Mayjen TNI Subiyanto NRP 32290, Aspers Kasad jabatan baru sebagai Pangdam II/Swj</p>\n\n<p>5. Brigjen TNI Heri Wiranto, S.E., M.M., M. Tr (han) NRP 32589, Waaspers Panglima TNI jabatan barus sebagai Aspers Kasad</p>\n\n<p>6. Brigjen TNI Gunung Iskandar NRP 32736, Waaspers Kasad jabatan baru sebagai Waaspers Panglima TNI</p>\n\n<p>7. Kolonel Inf Agus Setiawan, S.E. NRP 1900010990668, Pamen Denma Mabesad jabatan baru sebagai Waaspers Kasad</p>\n\n<p>8. Mayjen TNI Agung Risdhianto, M.B.A. NRP 30404, Dankodiklat TNI jabatan baru sebagai Staf Khusus Kasad</p>\n\n<p>9. Mayjen TNI (Mar) Bambang Suswantono, S.H., M.H., M.Tr (Han) NRP 8971/P, Dankormar jabatan baru sebagai Dankodiklat TNI</p>\n\n<p>10. Brigjen TNI (Mar) Hasanudin NRP 9320/P, Kas Kormar jabatan baru sebagai Dankormar</p>\n\n<p>11. Brigjen TNI (Mar) Nur Almsyah, M.Tr.(Han) NRP 9645/P, Danpasmar II Kormar jabatan baru sebagai Kas Kormar</p>\n\n<p>12. Kolonel (Mar) Edi Juardi NRP 9646/P, Asops Kormar jabatan baru sebagai Danpasmar II Kormar</p>\n\n<p>13. Brigjen TNI Edison Simanjuntak, S.I.P NRP 30431, Pa Sahli Tk. II Ekku Sajli Bid. Ekkudag Panglima TNI jabatan baru sebagai Staf Khusus Panglima TNI</p>\n\n<p>14. Brigjen TNI Herawan Adji, M. Si (han) NRP 30465, Dir F BAis TNI jabatan baru sebagai Pa Sahli Tk II Ekku Sahli Bid. Ekkudag Panglima TNI</p>\n\n<p>15. Kolonel Kav Steverly Christmas P. NRP 1900016361267, Pa Sahli Tk. II Poldagri Sahli Bid. Polkamnas Panglima TNI jabatan baru sebagai Dir F Bais TNI</p>\n\n<p>16. Kolonel Inf Syafruddin NRP 32602, Paban IV/Ops Sops TNI jabatan baru sebagai Sahli Tk. II Poldagri Sahli Bid. Polkamnas Panglima TNI</p>\n\n<p><strong>Penjelasan Panglima TNI</strong></p>\n\n<p>Terkait keputusan tersebut, Marsekal Hadi menjelaskan, sejak resmi menjabat sebagai panglima TNI, ia telah melaksanakan evaluasi secara berkesinambungan terhadap sumber daya manusia.</p>\n\n<p>Hal itu untuk memenuhi kebutuhan organisasi dan tantangan tugas.</p>\n\n<p>&quot;Kedua, dasar untuk penilaian sumber daya manusia adalah profesionalitas dan&nbsp;<em>merit system</em>,&quot; kata Hadi.</p>\n\n<p>(baca:&nbsp;<a href=\"http://nasional.kompas.com/read/2017/12/20/10595691/anulir-keputusan-jenderal-gatot-ini-penjelasan-panglima-tni\" target=\"_blank\">Anulir Keputusan Jenderal Gatot, Ini Penjelasan Panglima TNI</a>)</p>\n\n<p>Ketiga, lanjut Hadi, petunjuk administrasi terkait pembinaan karier prajurit TNI sudah baku. Semuanya berdasarkan profesionalitas merit sistem yang selalu dilakukan di tubuh TNI.</p>\n\n<p>&quot;Tidak ada istilah di dalam pembinaan karier adalah&nbsp;<em>like and dislike</em>,&quot; kata Hadi di Landasan Udara Halim Perdanakusuma, Jakarta, Rabu.</p>\n\n<p>Tak ada sesi tanya jawab dengan wartawan. Setelah menyampaikan pernyataannya, Hadi langsung meninggalkan ruangan meskipun sejumlah wartawan masih berupaya mengajukan pertanyaan.</p>\n', 'JAKARTA, KOMPAS.com — Panglima TNI Marsekal Hadi Tjahjanto membatalkan keputusan panglima TNI sebelumnya, Jenderal Gatot Nurmantyo, tentang mutasi sejumlah perwira tinggi TNI.', 'Panglima TNI Anulir Rotasi yang Dilakukan Gatot Nurmantyo', '1', '1', '', '', '', '1', 'Gatot Nurmantyo, Panglima TNI Hadi Tjahjanto', '950.jpg', 1, 'Panglima TNI Marsekal TNI Hadi Tjahjanto (kiri) berfoto bersama mantan Panglima TNI Gatot Nurmantyo (kanan) usai upacara pelantikan di Istana Negara, Jakarta, Jumat (8/12/2017). Marsekal TNI Hadi Tjahjanto resmi menjabat sebagai Panglima TNI menggantikan ', 34, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `id_channel` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `flag` varchar(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `id_channel`, `nama`, `flag`) VALUES
(132, 1, 'Daerah', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_channel`
--

CREATE TABLE `tbl_channel` (
  `id` int(11) NOT NULL,
  `nama_channel` varchar(100) DEFAULT NULL,
  `tipe` enum('1','2','3','4') NOT NULL DEFAULT '1',
  `navigasi` enum('0','1') NOT NULL DEFAULT '1',
  `flag` varchar(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_channel`
--

INSERT INTO `tbl_channel` (`id`, `nama_channel`, `tipe`, `navigasi`, `flag`) VALUES
(1, 'Nasional', '2', '1', '1'),
(2, 'Olahraga', '2', '1', '1'),
(3, 'Wisata dan Kuliner', '2', '1', '1'),
(4, 'Kesehatan', '2', '1', '1'),
(5, 'Papua 24 jam', '2', '1', '1'),
(6, 'Lintas Papua Barat', '2', '1', '1'),
(7, 'Statik Footer', '1', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `id_berita` int(11) DEFAULT NULL,
  `id_channel` int(11) DEFAULT '0',
  `id_categories` int(11) DEFAULT '0',
  `tanggal` date DEFAULT '0000-00-00',
  `waktu` time DEFAULT '00:00:00',
  `nama` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isi` longtext COLLATE utf8_unicode_ci,
  `publish` varchar(1) COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_link`
--

CREATE TABLE `tbl_link` (
  `id` int(11) NOT NULL,
  `id_channel` int(11) DEFAULT NULL,
  `id_categories` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `link` text,
  `urutan` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_link`
--

INSERT INTO `tbl_link` (`id`, `id_channel`, `id_categories`, `nama`, `link`, `urutan`) VALUES
(5, 0, 4, 'Facebook', 'https://www.facebook.com/', 1),
(6, 0, 4, 'Twitter', 'https://twitter.com/', 2),
(7, 0, 4, 'Instagram', '-', 5),
(8, 0, 4, 'Youtube', '-', 4),
(9, 0, 4, 'RSS', '-', 6),
(10, 0, 4, 'Google Plus', '-', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `id_channel` varchar(100) COLLATE utf8_unicode_ci DEFAULT '0',
  `nama` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stts` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_statis`
--

CREATE TABLE `tbl_statis` (
  `id_statis` int(20) UNSIGNED NOT NULL,
  `id_channel` int(11) DEFAULT '0',
  `id_categories` int(11) DEFAULT '0',
  `urutan` int(11) DEFAULT NULL,
  `isi` longtext COLLATE utf8_unicode_ci,
  `judul` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gambar_detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tag`
--

CREATE TABLE `tbl_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_channel` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT '0000-00-00',
  `publish` varchar(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `id_channel`, `tag`, `tanggal`, `publish`) VALUES
(11, 6, 'DPRD DKI Jakarta', '2015-03-09', '1'),
(4, 5, 'Ahok', '2015-03-08', '1'),
(10, 6, 'DPR RI', '2015-03-08', '1'),
(9, 6, 'Kabinet Kerja', '2015-03-08', '1'),
(8, 6, 'Jokowi', '2015-03-08', '1'),
(12, 5, 'Eksekusi Mati', '2015-03-08', '1'),
(14, 1, 'Gatot Nurmantyo', '2017-08-19', '1'),
(15, 2, 'Asian Para Games 2018', '2017-12-26', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `stts` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `status`, `username`, `password`, `stts`) VALUES
(8, 'Admin', 'superadmin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(20, 'Editor', 'admin', 'editor', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `type_status_date` (`id_berita`),
  ADD KEY `post_author` (`penulis`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_channel`
--
ALTER TABLE `tbl_channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`publish`,`id`);
ALTER TABLE `tbl_komentar` ADD FULLTEXT KEY `post_content_index` (`isi`);

--
-- Indexes for table `tbl_link`
--
ALTER TABLE `tbl_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`stts`,`id`);

--
-- Indexes for table `tbl_statis`
--
ALTER TABLE `tbl_statis`
  ADD PRIMARY KEY (`id_statis`),
  ADD KEY `type_status_date` (`id_statis`);
ALTER TABLE `tbl_statis` ADD FULLTEXT KEY `post_content_index` (`isi`);
ALTER TABLE `tbl_statis` ADD FULLTEXT KEY `post_title_index` (`judul`);

--
-- Indexes for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=955;
--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `tbl_channel`
--
ALTER TABLE `tbl_channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `tbl_link`
--
ALTER TABLE `tbl_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_statis`
--
ALTER TABLE `tbl_statis`
  MODIFY `id_statis` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
