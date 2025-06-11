-- phpMyAdmin SQL Dump
-- version 5.2.2-1.fc42
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2025 at 04:02 AM
-- Server version: 8.0.41
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_kategori` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi`, `gambar`, `tanggal`, `id_kategori`) VALUES
(2, 'Pembahasan RUU Perampasan Aset Hadapi Jalan Terjal, Oposisi Khawatirkan Potensi Penyalahgunaan Wewenang', 'RUU Perampasan Aset', 'SENAYAN, JAKARTA – Upaya pemerintah untuk mempercepat pengesahan Rancangan Undang-Undang (RUU) Perampasan Aset Tindak Pidana tampaknya masih menghadapi jalan terjal di Dewan Perwakilan Rakyat (DPR). Dalam rapat panitia kerja (panja) yang digelar pada Kamis malam, perdebatan sengit terjadi antara fraksi pendukung pemerintah dengan fraksi oposisi.\r\n\r\nPemerintah, didukung oleh mayoritas fraksi koalisi dan aktivis anti-korupsi, berargumen bahwa RUU ini adalah instrumen krusial untuk memiskinkan koruptor dan mengembalikan kerugian negara secara efektif. \"Tanpa RUU ini, upaya pemberantasan korupsi kita tumpul. Aset hasil kejahatan bisa dengan mudah disembunyikan,\" tegas perwakilan dari Kementerian Hukum dan HAM.\r\n\r\nNamun, fraksi-fraksi oposisi menyuarakan kekhawatiran serius mengenai potensi penyalahgunaan wewenang jika RUU tersebut disahkan tanpa mekanisme pengawasan yang ketat. \"Siapa yang menjamin alat bukti permulaan tidak akan disalahgunakan untuk kepentingan politik? Ini menyangkut hak asasi dan kepastian hukum warga negara,\" ungkap juru bicara salah satu fraksi oposisi dalam rapat tersebut, Jumat (6/6/2025).\r\n\r\nPerdebatan alot berpusat pada definisi \"aset yang tidak dapat dibuktikan asal-usulnya\" dan kewenangan jaksa untuk melakukan penyitaan tanpa putusan pengadilan pidana. Akibat belum adanya titik temu, pembahasan RUU ini kemungkinan akan kembali ditunda, sementara tekanan dari publik agar RUU ini segera disahkan terus menguat.', 'dpr.webp', '2025-06-06 16:08:51', 1),
(3, 'Gotong Royong Warga Ubah Bantaran Sungai Kumuh Jadi Ruang Terbuka Hijau Produktif', 'Gotong Royong', 'SURABAYA – Berawal dari keprihatinan melihat tumpukan sampah dan bau tak sedap, warga RT 05 RW 12, Kelurahan Wonorejo, Surabaya, berinisiatif mengubah bantaran sungai yang kumuh menjadi ruang terbuka hijau yang asri dan produktif. Melalui semangat gotong royong, lahan yang tadinya terabaikan kini disulap menjadi taman edukasi dan kebun sayur komunal.\r\n\r\nSetiap akhir pekan selama tiga bulan terakhir, puluhan warga, dari anak-anak hingga lansia, bahu-membahu membersihkan sampah plastik dan membangun petak-petak tanaman. Dana untuk membeli bibit dan peralatan didapat dari iuran swadaya serta sumbangan donatur lokal yang tergerak oleh aksi mereka.\r\n\r\n\"Dulu kalau lewat sini harus tutup hidung. Sekarang, anak-anak bisa bermain dengan nyaman, ibu-ibu bisa memetik cabai dan sawi langsung dari kebun,\" ujar Bapak Slamet, Ketua RT setempat, dengan bangga. \"Ini bukti kalau kita peduli, lingkungan pasti akan membalasnya dengan kebaikan.\"\r\n\r\nTaman yang diberi nama \"Asa Hijau\" ini tidak hanya berfungsi sebagai area resapan air, tetapi juga sebagai pusat kegiatan sosial warga. Di salah satu sudut, didirikan saung sederhana dari bambu sebagai tempat anak-anak belajar tentang pengelolaan sampah dan cara bercocok tanam. Hasil panen dari kebun komunal sebagian dibagikan kepada warga kurang mampu dan sebagian dijual untuk kas RT.\r\n\r\nInisiatif warga Wonorejo ini mendapat apresiasi dari pemerintah kota dan menjadi contoh bagi kelurahan lain. Aksi nyata dari level komunitas ini membuktikan bahwa solusi untuk masalah lingkungan sering kali tidak memerlukan proyek berskala besar, melainkan dimulai dari kesadaran dan kerja sama warga itu sendiri.', 'gambar1.jpg', '2025-06-06 16:10:45', 2),
(5, 'Isu Reshuffle Kabinet Kembali Menghangat, Istana Sebut Evaluasi Kinerja Merupakan Hal Rutin', 'Isu Reshuffle', 'JAKARTA – Memasuki pertengahan tahun kedua pemerintahan, isu perombakan atau reshuffle kabinet kembali berembus kencang di lingkungan istana dan elite politik. Sejumlah pos kementerian di bidang ekonomi dan energi dilaporkan tengah dalam evaluasi mendalam oleh Presiden, memicu spekulasi mengenai potensi masuknya nama-nama baru dalam waktu dekat.\r\n\r\nInformasi yang beredar di kalangan politisi menyebutkan bahwa evaluasi kinerja ini merupakan tindak lanjut dari rapat terbatas yang digelar Presiden pekan lalu. Beberapa menteri dinilai belum menunjukkan performa yang sesuai target, terutama dalam menghadapi tantangan perlambatan ekonomi global dan target investasi pemerintah.\r\n\r\nMenanggapi isu ini, Juru Bicara Kepresidenan pada hari Jumat (6/6/2025) menyatakan bahwa evaluasi kinerja menteri adalah proses rutin yang selalu dilakukan. \"Bapak Presiden memiliki hak prerogatif penuh untuk menilai dan menentukan pembantu-pembantunya. Evaluasi adalah hal wajar demi memastikan program pemerintah berjalan optimal. Soal reshuffle, kita tunggu saja keputusan Presiden,\" ujarnya di Kompleks Istana Kepresidenan.\r\n\r\nSementara itu, partai-partai politik anggota koalisi pemerintah mulai menunjukkan sikap. Sekretaris Jenderal salah satu partai besar menyatakan pihaknya menyerahkan sepenuhnya keputusan kepada Presiden, namun menegaskan bahwa kader-kader partainya di kabinet telah bekerja maksimal. Di sisi lain, pengamat politik menilai isu ini sengaja diembuskan untuk menguji soliditas koalisi sekaligus melihat respons publik.', 'bank.png', NULL, 1),
(6, 'test', 'test', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'eaec1b47-0470-4745-9c44-3553435ae1c5.jpg', '2025-06-07 12:49:00', 5),
(7, 'dasdasd', 'dasdasd', 'asdasdas', 'cff2871e-ce9b-48f9-b0c4-0967267acd01.jpeg', '2025-06-07 13:17:00', 2),
(8, 'Melakukan Perjalanan ke Mars', 'melakukan-perjalanan-ke-mars', 'Melakukan Perjalanan ke Mars', '288d77b9-3b8a-4e94-8f9b-227c00a8e2fe.jpeg', '2025-06-07 18:06:00', 4),
(9, 'Kerusuhan rendang di palembang', 'kerusuhan-rendang-di-palembang', 'Kerusuhan rendang di palembang', 'Cover (5).png', '2025-06-07 18:11:00', 2),
(10, 'rfregetgehyryhrhyrtrhyujtujrgtehyryh', 'rfregetgehyryhrhyrtrhyujtujrgtehyryh', 'wrfedbfvdgbfhnfnhgfnhgtjmyjymyjy', 'WhatsApp Image 2025-05-24 at 2.22.38 PM.jpeg', '2025-06-07 18:15:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Politik'),
(2, 'Sosial'),
(3, 'Olahraga'),
(4, 'Internasional'),
(5, 'F1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
