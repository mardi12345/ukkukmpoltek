-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2024 pada 18.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukkukmpoltek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alur`
--

CREATE TABLE `tbl_alur` (
  `id_alur` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_alur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_alur`
--

INSERT INTO `tbl_alur` (`id_alur`, `judul`, `deskripsi`, `gambar_alur`) VALUES
(1, 'Registerasi Akun', 'Sebelum Melakukan Pendaftaran silahkan Lakukan Registerasi Akun Terlebih Dahulu Supaya Memiliki Akun', 'alur-26012022da48f06eb9.png'),
(2, 'Lengkapi Data', 'Silahkan Untuk Melengkapi Data dan Foto Penneng Supaya Dapat Melanjutkan Ke Proses Selanjutnya', 'alur-2601202268e28289f3.png'),
(3, 'Klik Daftar AKun', 'Setelah Melengkapi Biodata Silahkan Untuk Klik Tombol Daftar Dan milikilah AKun UKK/UKM Poltek GT', 'alur-260120220846cd95ad.png'),
(4, 'Tunggu Verifikasi', 'Ketua Organisasi akan melakukan Verifikasi akun dan Pengelompokan Kelas/Tingkat kepada akun anda.', 'alur-26012022ae6d25274d.png'),
(5, 'Daftar dan Tunggu', 'Setelah Terverifikasi oleh ketua, anda dapat mendaftar UKK/UKM Melalui Navigasi Bar \"Keanggotaan\" Pilihlah Organisasi yang anda inginkan dan tunggu sampai diterima.', 'alur-260120227dc482823b.png'),
(6, 'Selesai', 'Semua Proses Wajib Di Ikuti Secara Urut Untuk Dapat Mendaftar Pada UKK/UKM Poltek GT. Setelah diterima Anda Secara Resmi terdaftar sebagai Mahasiswa Organisasi Dalam Database Kami.', 'alur-260120228d907c820f.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_kelas`
--

CREATE TABLE `tbl_detail_kelas` (
  `id_detail_kelas` int(11) NOT NULL,
  `id_murid` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_detail_kelas`
--

INSERT INTO `tbl_detail_kelas` (`id_detail_kelas`, `id_murid`, `id_kelas`, `id_users`) VALUES
(26, 12, 16, 1),
(27, 12, 17, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `galeri_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `galeri_gambar`) VALUES
(17, 'lomba1.jpg'),
(19, 'lomba2.jpg'),
(21, 'lomba3.jpg'),
(22, '216-foto pataka.jpeg'),
(23, '740-WhatsApp Image 2024-07-21 at 23.17.45_27443b06.jpg'),
(24, '337-WhatsApp Image 2024-07-21 at 23.17.27_a9c768d5.jpg'),
(25, '236-WhatsApp Image 2024-07-21 at 23.17.45_27443b06.jpg'),
(26, '930-WhatsApp Image 2024-07-21 at 23.17.26_92d45aaa.jpg'),
(27, '19-WhatsApp Image 2024-07-21 at 23.17.25_c9ebae43.jpg'),
(28, '977-WhatsApp Image 2024-07-21 at 23.21.53_00973c74.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `gambar_informasi` varchar(200) NOT NULL,
  `tgl_informasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id_informasi`, `judul`, `deskripsi`, `penulis`, `gambar_informasi`, `tgl_informasi`) VALUES
(4, 'Perayaan PGT CUP 2023 - Ajang Olahraga Mahasiswa Poltek GT selepas Ujian Semester.', '\r\nPoliteknik Gajah Tunggal (Poltek GT) kembali menggelar acara tahunan yang paling ditunggu-tunggu oleh para mahasiswanya, yaitu PGT CUP 2023. Acara yang diadakan setelah ujian semester ini menjadi wadah bagi para mahasiswa untuk melepaskan penat sekaligus menunjukkan bakat dan kemampuan mereka di berbagai cabang olahraga.\r\n\r\nPGT CUP 2023 berlangsung meriah dengan partisipasi yang antusias dari seluruh program studi. Berbagai cabang olahraga seperti sepak bola, bola voli, basket, bulu tangkis, dan atletik menjadi ajang persaingan sengit antar fakultas. Selain itu, ada juga lomba e-sports yang menarik perhatian para gamers dari seluruh kampus.\r\n\r\nPerayaan ini tidak hanya menjadi kompetisi olahraga, tetapi juga menjadi momen untuk mempererat kebersamaan dan kekompakan antar mahasiswa. Suasana riuh rendah penuh semangat terlihat di setiap pertandingan, diiringi sorak sorai para pendukung yang memadati tribun.\r\n\r\nDi samping kompetisi olahraga, PGT CUP 2023 juga menyuguhkan berbagai hiburan menarik seperti penampilan band kampus, bazar makanan, dan pertunjukan seni. Hal ini semakin menambah kemeriahan dan membuat acara ini menjadi salah satu momen yang tak terlupakan bagi seluruh civitas akademika Poltek GT.\r\n\r\nKetua panitia PGT CUP 2023, Rian Saputra, menyampaikan bahwa acara ini tidak hanya bertujuan untuk mencari yang terbaik di bidang olahraga, tetapi juga untuk memupuk jiwa sportivitas dan kerjasama antar mahasiswa. “Kami berharap PGT CUP bisa menjadi ajang untuk saling mengenal lebih dekat dan memperkuat rasa persatuan di antara mahasiswa Poltek GT,” ujarnya.\r\n\r\nPerayaan PGT CUP 2023 sukses besar dan diharapkan dapat terus menjadi tradisi tahunan yang semakin semarak di masa mendatang, memberikan warna dan semangat baru bagi seluruh mahasiswa Poltek GT.', '', 'pgtcup.jpg', '2024-07-18 04:17:14'),
(5, 'Naruto Uzumaki Kunjungi Politeknik Gajah Tunggal untuk Belajar Coding dengan Ardi', '<p>Naruto Uzumaki, pahlawan legendaris dari Desa Konoha, baru-baru ini mengejutkan dunia dengan kunjungannya ke Politeknik Gajah Tunggal (PGT). Dalam kunjungan yang tak terduga ini, Naruto mengungkapkan minat barunya dalam dunia teknologi dan pemrograman. Dengan semangat pantang menyerah yang selalu ia tunjukkan, Naruto memutuskan untuk belajar coding bersama Ardi, seorang mahasiswa berbakat di PGT yang dikenal dengan keahliannya dalam teknologi dan mikrokontroler.</p><p>Naruto mengungkapkan bahwa dunia ninja dan teknologi memiliki banyak kesamaan dalam hal dedikasi dan latihan keras. “Belajar coding adalah tantangan baru bagi saya, dan saya yakin dengan bimbingan Ardi, saya bisa menguasainya,” ujar Naruto dengan antusias.</p><p>Ardi, yang dikenal dengan proyek-proyek inovatifnya di PGT, merasa sangat terhormat dapat mengajar Naruto. \"Ini adalah kesempatan yang luar biasa bagi saya. Naruto adalah inspirasi bagi banyak orang, dan saya berharap dapat membantunya memahami dunia teknologi dengan baik,\" kata Ardi.</p><p>Kunjungan Naruto ke PGT bukan hanya menarik perhatian para mahasiswa dan dosen, tetapi juga menjadi topik hangat di media sosial. Banyak yang penasaran bagaimana Naruto akan menerapkan semangat ninja-nya dalam dunia coding. Dengan kolaborasi unik ini, siapa yang tahu inovasi apa yang mungkin muncul di masa depan? Kita tunggu saja perkembangan selanjutnya dari Naruto dan Ardi!</p>', '', '6-Temari.jpg', '2024-07-21 13:05:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(7, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `id_kategori`, `nama_kelas`, `id_periode`, `id_users`) VALUES
(16, 7, 'Kelas 1', 1, 7),
(17, 7, 'Kelas 2', 1, 7),
(18, 7, 'Kelas 3', 1, 7),
(19, 7, 'Staff / Dosen', 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsultasi`
--

CREATE TABLE `tbl_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `tanggal_konsultasi` date NOT NULL,
  `jam_konsultasi` time NOT NULL,
  `konsultasi` varchar(255) NOT NULL,
  `status_konsultasi` enum('diajukan','approve','ditunda') NOT NULL,
  `alasan_memilih` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_wali_murid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_konsultasi`
--

INSERT INTO `tbl_konsultasi` (`id_konsultasi`, `tanggal_konsultasi`, `jam_konsultasi`, `konsultasi`, `status_konsultasi`, `alasan_memilih`, `id_users`, `id_wali_murid`) VALUES
(36, '0000-00-00', '11:01:00', 'PATAKA', 'approve', '', 7, 8),
(40, '3333-03-23', '03:33:00', 'KOPMA', 'diajukan', '33333333333333333', 7, 8),
(41, '2222-02-12', '22:22:00', 'PATAKA', 'diajukan', '222222', 0, 11),
(42, '2024-07-06', '22:22:00', 'ROHIS', 'approve', '222222222222', 7, 8),
(43, '3333-03-31', '03:33:00', 'PATAKA', 'diajukan', '3333333333333', 3, 12),
(48, '1111-11-11', '11:11:00', 'BADMINTON', 'approve', '1111', 7, 8),
(56, '0000-00-00', '04:44:00', 'FUTSAL', 'diajukan', '4444444444', 7, 8),
(61, '1111-11-11', '11:11:00', 'PATAKA', 'diajukan', '111111111', 7, 14),
(63, '1111-11-11', '07:59:00', 'BADMINTHON', 'approve', '11111111111111', 7, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan_belajar`
--

CREATE TABLE `tbl_laporan_belajar` (
  `id_laporan_belajar` int(11) NOT NULL,
  `nilai_pengetahuan` int(11) NOT NULL,
  `deskripsi_pengetahuan` varchar(255) DEFAULT NULL,
  `id_murid` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `date_penilaian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_mata_pelajaran` int(11) NOT NULL,
  `nilai_ketrampilan` int(11) NOT NULL,
  `deskripsi_ketrampilan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_laporan_belajar`
--

INSERT INTO `tbl_laporan_belajar` (`id_laporan_belajar`, `nilai_pengetahuan`, `deskripsi_pengetahuan`, `id_murid`, `id_users`, `id_kelas`, `date_penilaian`, `id_mata_pelajaran`, `nilai_ketrampilan`, `deskripsi_ketrampilan`) VALUES
(7, 80, 'test', 12, 7, 6, '2023-09-25 13:21:44', 3, 70, 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mata_pelajaran`
--

CREATE TABLE `tbl_mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL,
  `mata_pelajaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_mata_pelajaran`
--

INSERT INTO `tbl_mata_pelajaran` (`id_mata_pelajaran`, `mata_pelajaran`) VALUES
(3, 'Pendidikan Agama dan Budi Pekerti'),
(4, 'Pendidikan Pancasila dan Kewarganegaraan'),
(5, 'Seni Budaya'),
(6, 'Bahasa Indonesia'),
(7, 'Bahasa Indonesia'),
(8, 'Matematika'),
(9, 'Pendidikan Jasmani, Olahraga dam Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_monitoring`
--

CREATE TABLE `tbl_monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `id_murid` int(11) NOT NULL,
  `perkembangan` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `date_monitoring` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_monitoring`
--

INSERT INTO `tbl_monitoring` (`id_monitoring`, `id_murid`, `perkembangan`, `id_users`, `date_monitoring`) VALUES
(3, 12, 'dsfdsfdsfdsfdsf', 7, '2023-11-25 13:18:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_murid`
--

CREATE TABLE `tbl_murid` (
  `id_murid` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `agama` varchar(200) NOT NULL DEFAULT 'admin',
  `status_murid` enum('menunggu hasil','diterima','tidak') NOT NULL DEFAULT 'diterima'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_murid`
--

INSERT INTO `tbl_murid` (`id_murid`, `nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `gambar`, `alamat`, `agama`, `status_murid`) VALUES
(12, '567890', 'Alfin Erfendo', 'Laki-laki', 'Pekalongan', '2023-11-14', '137-Rock Lee.jpg', 'Blora', 'Kristen', 'diterima'),
(13, '4444444444444', 'rrrrrrrrrr', 'Laki-laki', 'jjjjjjjjjjjjjjjjjjj', '9999-01-01', '228-kantin-sekolah.jpg', 'jjjjjjjjjjjjjjjjjjj', 'Islam', 'diterima'),
(14, '78888888888', 'ttttttt', 'Laki-laki', 'jjjjjjjjjjj', '2024-07-15', '816-WhatsApp Image 2024-07-17 at 15.02.33_c930aba6.jpg', 'yyyyyyyyy', 'Islam', 'menunggu hasil'),
(15, '7888888888899', 'ttttt', 'Laki-laki', 'SUKAJADI', '2024-07-03', '335-WhatsApp Image 2024-07-17 at 15.02.33_c930aba6.jpg', 'ttttttttttttttttttttttttttttttttttttttttttttt', 'Islam', 'menunggu hasil'),
(16, '2222222222', '', 'Laki-laki', 'SUKAJADI', '2024-07-16', '997-WhatsApp Image 2024-07-17 at 15.02.33_c930aba6.jpg', 'rrrrrrrrrrrrrr', 'Islam', 'menunggu hasil'),
(17, '6666666', 'yyyyyyyyy', 'Laki-laki', 'yyyyyyy', '2024-07-07', '791-WhatsApp Image 2024-07-17 at 15.02.33_c930aba6.jpg', 'yyyyyyyyy', 'Islam', 'menunggu hasil'),
(18, '22222222223333', 'ttttttt', 'Laki-laki', 'yyyyyyy', '3333-03-31', '816-WhatsApp Image 2024-07-17 at 15.02.33_c930aba6.jpg', '3333333333', 'Islam', 'diterima'),
(19, '2222222', 'ardiiiiiiiiiiii', 'Laki-laki', 'yyyyyyy', '2024-07-30', '317-WhatsApp Image 2024-07-17 at 15.02.33_c930aba6.jpg', 'Jalan Lintas Sumatra', 'Islam', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_periode`
--

CREATE TABLE `tbl_periode` (
  `id_periode` int(11) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_periode`
--

INSERT INTO `tbl_periode` (`id_periode`, `periode`) VALUES
(1, '2022-2023'),
(3, '2021-2022'),
(4, '2023-2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id_profile_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL,
  `gambar_sekolah` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_profile`
--

INSERT INTO `tbl_profile` (`id_profile_sekolah`, `nama_sekolah`, `deskripsi`, `visi`, `misi`, `no_hp`, `facebook`, `email`, `instagram`, `id_users`, `gambar_sekolah`, `alamat`) VALUES
(1, 'SLB NEGERI CENDONO KUDUS', 'SLB Negeri Cendono Kudus merupakan salah satu lembaga pendidikan khusus negeri yang berdomisili di kota Kudus.', 'Terwujudnya Pelayanan Bagi Peserta Didik Berkebutuhan Khusus Mencapai Profil Pelajar Pancasila Yang Beriman, Bertakwa, Berakhlak Mulia, Terampil dan Mandiri.', '<p>Menanamkan dan mengamalkan ajaran agama yang dianutnya, agar bijaksana dalam bersikap dan bertindak.\r\n\r\nMelaksanakan pembelajaran dan keterampilan sesuai dengan potensi peserta didik berkebutuhan khusus agar berkembang secara optimal.\r\n\r\nMenumbuhkan rasa percaya diri peserta didik dengan pembelajaran yang menyenangkan.\r\n</p><p>\r\nMenumbuhkembangkan kecintaan terhadap wawasan budaya nasional.</p>', '0852131231232', 'dsfdsfsdgf', 'slbnegericendonokudus@gmail.com', 'dsfdsfds', 1, 'pataka.jpg', 'Jl. Madu No 01 RT 05 RW 01 , Cendono, Kec. Dawe, Kab. Kudus Prov. Jawa Tengah'),
(6, 'u', 'u', 'u', 'u', '78', 'yu', 'yu@g.com', 'uuu', 9, 'drumband.jpg', 'yyy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_quisioner`
--

CREATE TABLE `tbl_quisioner` (
  `id_quisioner` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `id_wali_murid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_quisioner`
--

INSERT INTO `tbl_quisioner` (`id_quisioner`, `q1`, `q2`, `q3`, `q4`, `q5`, `id_wali_murid`) VALUES
(8, 5, 4, 4, 3, 2, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(255) DEFAULT NULL,
  `alamat_users` varchar(255) DEFAULT NULL,
  `email_users` varchar(200) DEFAULT NULL,
  `no_telp_users` varchar(15) DEFAULT NULL,
  `hak_akses` enum('kepala sekolah','admin','guru') DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('aktiv','non-aktiv') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `nama_users`, `alamat_users`, `email_users`, `no_telp_users`, `hak_akses`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '56464', 'admin', 'admin', 'admin', 'aktiv'),
(2, 'admin2 sad sadad', 'admin2', 'admin2@gmail.com', '38924829', 'admin', 'admin2', 'admin2', 'aktiv'),
(3, 'ketua', 'ketua', 'kepalasekolah@gmail.com', '08888838383393', 'kepala sekolah', 'ketua', 'ketua', 'aktiv'),
(5, 'test', 'test', 'test@gmail.com', '453534345', 'admin', 'test', '098f6bcd4621d373cade4e832627b4f6', 'non-aktiv'),
(6, 'update', 'yogyakarta', 'test@gmail.com', '85912628', 'admin', 'dsfdsf', 'guru', 'non-aktiv'),
(7, 'guru', 'teste', 'guru@gmail.com', '983243289', 'guru', 'guru', 'guru', 'aktiv'),
(8, 'sadsa', 'Menco, Berahan Wetan, Wedung,', 'zahwatulizzah@gmail.com', '081229677253', 'guru', 'as', '4d18db80e353e526ad6d42a62aaa29be', 'non-aktiv'),
(9, 'guru 2', 'Menco, Berahan ', 'guru@gmail.com', '32423432', 'guru', 'guru2', '440a21bd2b3a7c686cf3238883dd34e9', 'aktiv'),
(10, 'rrrr', 'rrrr', 'rrr', 'rr', 'admin', 'rrrr', 'rrrrrr', 'aktiv'),
(11, '11111', '1', '11@g.com', '1', 'admin', '1', '1', 'non-aktiv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wali_murid`
--

CREATE TABLE `tbl_wali_murid` (
  `id_wali_murid` int(11) NOT NULL,
  `nama_ayah` varchar(200) NOT NULL,
  `nama_ibu` varchar(200) NOT NULL,
  `pekerjaan_ayah` varchar(200) DEFAULT NULL,
  `pekerjaan_ibu` varchar(200) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_murid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_wali_murid`
--

INSERT INTO `tbl_wali_murid` (`id_wali_murid`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `no_telp`, `email`, `username`, `password`, `id_murid`) VALUES
(8, 'sayaA', 'saya', 'saya', 'saya', 'saya', '085326719122', 'saya@gmail.com', 'saya', 'saya', 12),
(9, 'jjjjjjjjjjjjjjjjj', 'kkkkkkkkkkk', 'jjjjjjjjjjj', 'uuuuuuu', 'jjjjjjjjjjjjjjjjjjj', '898787676556', 'kkkkkkkkkk@gmail.com', 'akumaukamu', 'ok', 13),
(10, 'jjjjjjjj', 'iiiiiiiiiiiiiii', 'uuuuuuuuu', 'jjjjjjjjjj', 'yyyyyyyyy', 'jjjjjjjjjj', 'iiiiiiii@g.com', 'test', 'test', 14),
(14, '', '', '', '', '3333333333', '089516267094', 'y@g.com', 'ok', 'ok', 18),
(15, 'ardiiiiiiiii', '2222222', '', '', 'Jalan Lintas Sumatra 7777777777', '99999999999', 'iiii@g.com', 'y', 'y', 19);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_alur`
--
ALTER TABLE `tbl_alur`
  ADD PRIMARY KEY (`id_alur`);

--
-- Indeks untuk tabel `tbl_detail_kelas`
--
ALTER TABLE `tbl_detail_kelas`
  ADD PRIMARY KEY (`id_detail_kelas`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_murid` (`id_murid`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tbl_konsultasi`
--
ALTER TABLE `tbl_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_wali_murid` (`id_wali_murid`);

--
-- Indeks untuk tabel `tbl_laporan_belajar`
--
ALTER TABLE `tbl_laporan_belajar`
  ADD PRIMARY KEY (`id_laporan_belajar`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_murid` (`id_murid`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`);

--
-- Indeks untuk tabel `tbl_mata_pelajaran`
--
ALTER TABLE `tbl_mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indeks untuk tabel `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  ADD PRIMARY KEY (`id_monitoring`),
  ADD KEY `id_murid` (`id_murid`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tbl_murid`
--
ALTER TABLE `tbl_murid`
  ADD PRIMARY KEY (`id_murid`);

--
-- Indeks untuk tabel `tbl_periode`
--
ALTER TABLE `tbl_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`id_profile_sekolah`);

--
-- Indeks untuk tabel `tbl_quisioner`
--
ALTER TABLE `tbl_quisioner`
  ADD PRIMARY KEY (`id_quisioner`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_wali_murid`
--
ALTER TABLE `tbl_wali_murid`
  ADD PRIMARY KEY (`id_wali_murid`),
  ADD KEY `tbl_wali_murid_ibfk_1` (`id_murid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_alur`
--
ALTER TABLE `tbl_alur`
  MODIFY `id_alur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_kelas`
--
ALTER TABLE `tbl_detail_kelas`
  MODIFY `id_detail_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_konsultasi`
--
ALTER TABLE `tbl_konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan_belajar`
--
ALTER TABLE `tbl_laporan_belajar`
  MODIFY `id_laporan_belajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_mata_pelajaran`
--
ALTER TABLE `tbl_mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_murid`
--
ALTER TABLE `tbl_murid`
  MODIFY `id_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_periode`
--
ALTER TABLE `tbl_periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id_profile_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_quisioner`
--
ALTER TABLE `tbl_quisioner`
  MODIFY `id_quisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_wali_murid`
--
ALTER TABLE `tbl_wali_murid`
  MODIFY `id_wali_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detail_kelas`
--
ALTER TABLE `tbl_detail_kelas`
  ADD CONSTRAINT `tbl_detail_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_kelas_ibfk_2` FOREIGN KEY (`id_murid`) REFERENCES `tbl_murid` (`id_murid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_kelas_ibfk_3` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD CONSTRAINT `tbl_kelas_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `tbl_periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kelas_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `tbl_konsultasi`
--
ALTER TABLE `tbl_konsultasi`
  ADD CONSTRAINT `tbl_konsultasi_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_konsultasi_ibfk_2` FOREIGN KEY (`id_wali_murid`) REFERENCES `tbl_wali_murid` (`id_wali_murid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_laporan_belajar`
--
ALTER TABLE `tbl_laporan_belajar`
  ADD CONSTRAINT `tbl_laporan_belajar_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_laporan_belajar_ibfk_2` FOREIGN KEY (`id_murid`) REFERENCES `tbl_murid` (`id_murid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_laporan_belajar_ibfk_3` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `tbl_mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_monitoring`
--
ALTER TABLE `tbl_monitoring`
  ADD CONSTRAINT `tbl_monitoring_ibfk_1` FOREIGN KEY (`id_murid`) REFERENCES `tbl_murid` (`id_murid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_monitoring_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_wali_murid`
--
ALTER TABLE `tbl_wali_murid`
  ADD CONSTRAINT `tbl_wali_murid_ibfk_1` FOREIGN KEY (`id_murid`) REFERENCES `tbl_murid` (`id_murid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
