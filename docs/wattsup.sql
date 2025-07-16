-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2025 at 05:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wattsup`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` varchar(128) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
('LVL001', 'ADMIN'),
('LVL002', 'PETUGAS');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(128) NOT NULL,
  `nama_pelanggan` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_kwh` varchar(128) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_tarif` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username`, `password`, `nomor_kwh`, `alamat`, `id_tarif`) VALUES
('PLG2209010001', 'aditya', 'adit', '$2y$10$IGQjPHGs7nhrE3mT2i0ivuiPd2vfP6gUQ3Sy2BgdqMb71nxJ2ZoV2', '00000000000', 'Jln. Cendana', 'TRF20230205002'),
('PLG2209120003', 'Makarizo', 'izo', '$2y$10$Sk5hTXYQtGtBrvs0JfLx0u65HhYh1HZ.kmY58f41/PGzEqZpDXdKi', '888888888', 'Jln.kenangan pahit', 'TRF20230205007'),
('PLG2210060004', 'Lalita', 'lita', '$2y$10$pMLeth.kT9ISPrmDWQZAFu/qwFlwGvrW3K5jxEZeyCEm.758DkASO', '0251823230800', 'Jl. Jatiwaringin 7', 'TRF20230205009'),
('PLG2210100001', 'rahman', 'rahman', '$2y$10$uBS4h11n2oE5CYAA7czaoOWD7gS1n2m8lKO..Myi8N75B0Rt4PPeW', '025180150800', 'JL. KKK RT.22/RW.22', 'TRF20230205009'),
('PLG2302040001', 'Dilan\'da', 'dilan', '$2y$10$VUJ7BuaGNnL1uXWK4P/VSesof2HNc2uaaIlNzEbutH6CIlp9Wtl0O', '9000', 'Jl. Antara no 48', 'TRF20230205007'),
('PLG2302050001', 'Rose', 'rose', '$2y$10$ZaE/iIWDsw2zAMZtp3SBpuLq8RN62kJ4jWqjp61Me5Vks0C.NIG/C', '800004545', 'Jln. tulip', 'TRF20230205002'),
('PLG2302050002', 'seraphina', 'phina', '$2y$10$xxIc.PRr7.r1D9ceCY7hleMHYUpS3GzLTpu/lzIScUrpzzO2bwjBe', '800004545', 'jln. cendana', 'TRF20230205002'),
('PLG2302060001', 'sore', 'sore', '$2y$10$fnxnbxWPfpdrsehZHeG9keA2SWs5fmx4PEUeEs0MZBq1ICZMsDERS', '66666666', 'Bekasi Raya', 'TRF20230205002'),
('PLG2302060002', 'Cinta kasih', 'cinta', '$2y$10$a1ervVeNULyzB.eZto2byeXlSXpW91T5rDWmmoUeDkMGeUiena0ye', '025180150800', 'Jatiwaringin 2', 'TRF20230205007'),
('PLG2302080001', 'Harry Potter', 'potter', '$2y$10$gQJ97faAnqsXbO2zUDrTIONmE3wDSD2793bEphEfF9kymg/UvCL6i', '94849368435', 'Jatiwaringin', 'TRF20230205007'),
('PLG2302080002', 'emma watson', 'emma', '$2y$10$kP/t5Bma05iehnEmA/A56uXRT1VuJGszN08D0IuGCPdlM4e5eRpeq', '3593480249', 'hufflepuff', 'TRF20230205009'),
('PLG2302090001', 'Draco Malfoy', 'draco', '$2y$10$fdgKijKfdKND.USAjNBFfegbKmKquwKiVkLIjUL1v2VcqthfC0eKe', '9248937520', 'Cipinang 3', 'TRF20230205010'),
('PLG2302120001', 'Tom Felton', 'Tom', '$2y$10$1rZCh91deEPQKtn5sgg6LOkbkX6klm6Uv6ZqBEdAN08U1qfUEx0Cm', '02803132932', 'hogwarts', 'TRF20230205009'),
('PLG2302120002', 'Ron Weasley', 'ron', '$2y$10$kup0pc210G0HJzXXgqnsPuTEQVY2E6b4RMMVJDBUZv3l.kotMgRTC', '09302981031', 'cikoko', 'TRF20230205002'),
('PLG2302120003', 'Luna lovegood', 'luna', '$2y$10$W11GRU2CXccfUyTynfDqH.sjIeC9tdoy4mhAMT5alinFjl5vneRoO', '151515155115', 'kampung melayu', 'TRF20230205007'),
('PLG2507140001', 'Anita Adelia', 'nit', '$2y$10$Ag5L0tv4N3/rB1bNyQNYU.RfMxfRvARcKbdRMAf0TeA/uID71cd6a', '77772882637', 'Singapur', 'TRF20230205009');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(128) NOT NULL,
  `id_tagihan` varchar(128) NOT NULL,
  `id_pelanggan` varchar(128) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `id_pelanggan`, `tgl_bayar`, `biaya_admin`, `total_bayar`, `id_user`) VALUES
('PAY230210001', 'TG2302100002', 'PLG2302040001', '2023-02-10', 2500, 102500, 'USR0001'),
('PAY230210002', 'TG2302100003', 'PLG2302090001', '2023-02-10', 2500, 202500, 'USR0001'),
('PAY230210003', 'TG2209100005', 'PLG2210100001', '2022-10-01', 2500, 202500, 'USR0001'),
('PAY230210004', 'TG2211100005', 'PLG2210100001', '2022-11-01', 2500, 262500, 'USR0001'),
('PAY230210005', 'TG2302100005', 'PLG2210100001', '2023-01-01', 2500, 242500, 'USR0001'),
('PAY230211001', 'TG2302100006', 'PLG2210100001', '2023-02-01', 2500, 302500, 'USR0001'),
('PAY230211002', 'TG2302110001', 'PLG2209010001', '2023-02-01', 2500, 152500, 'USR0001'),
('PAY230211003', 'TG2302110002', 'PLG2302080001', '2023-02-01', 2500, 102500, 'USR0001'),
('PAY230212001', 'TG2302120001', 'PLG2210060004', '2023-02-01', 2500, 252500, 'ADM0000'),
('PAY230212002', 'TG2302120002', 'PLG2210060004', '2023-01-29', 2500, 552500, 'ADM0000'),
('PAY230212003', 'TG2302120003', 'PLG2210060004', '2023-02-04', 2500, 232500, 'ADM0000'),
('PAY230212004', 'TG2302120004', 'PLG2210060004', '2023-02-05', 2500, 252500, 'ADM0000'),
('PAY250712001', 'TG2302100004', 'PLG2302040001', '2025-07-12', 2500, 102500, 'USR0007'),
('PAY250713001', 'TG2302110003', 'PLG2302080001', '2025-07-11', 2500, 112500, 'ADM0000'),
('PAY250713002', 'TG2507135406', 'PLG2507120001', '2025-07-13', 2500, 10002500, 'ADM0000'),
('PAY250713003', 'TG2302110004', 'PLG2210100001', '2025-07-13', 2500, 402500, 'ADM0000');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` varchar(128) NOT NULL,
  `id_pelanggan` varchar(128) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `meter_awal` int(11) NOT NULL,
  `meter_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`) VALUES
('PN220101002', 'PLG2302080001', 1, 2023, 0, 100),
('PN220910005', 'PLG2210100001', 9, 2022, 0, 100),
('PN221012001', 'PLG2210060004', 10, 2022, 0, 125),
('PN221016005', 'PLG2210100001', 10, 2022, 100, 230),
('PN221101001', 'PLG2210060004', 11, 2022, 125, 400),
('PN221201001', 'PLG2210060004', 12, 2022, 400, 515),
('PN230101001', 'PLG2210060004', 1, 2023, 515, 640),
('PN230210002', 'PLG2302040001', 1, 2023, 200, 300),
('PN230210003', 'PLG2302090001', 1, 2023, 0, 100),
('PN230210004', 'PLG2302040001', 2, 2023, 300, 400),
('PN230210005', 'PLG2210100001', 12, 2022, 230, 350),
('PN230210006', 'PLG2210100001', 1, 2023, 350, 500),
('PN230211001', 'PLG2209010001', 1, 2023, 0, 100),
('PN230211002', 'PLG2302080001', 2, 2023, 100, 210),
('PN230211003', 'PLG2210100001', 2, 2023, 500, 700),
('PN230211004', 'PLG2302090001', 2, 2023, 100, 300),
('PN230212001', 'PLG2210060004', 2, 2023, 640, 800),
('PN250714001', 'PLG2507120001', 6, 2025, 0, 100),
('PN250714002', 'PLG2507120001', 6, 2025, 100, 1000),
('PN250714003', 'PLG2507120001', 6, 2025, 1000, 90000),
('PN250714004', 'PLG2507120001', 6, 2025, 90000, 99000);

--
-- Triggers `penggunaan`
--
DELIMITER $$
CREATE TRIGGER `tr_create_tagihan` AFTER INSERT ON `penggunaan` FOR EACH ROW BEGIN
  DECLARE jumlah INT;
  SET jumlah = NEW.meter_akhir - NEW.meter_awal;

  INSERT INTO tagihan (
    id_tagihan, id_penggunaan, id_pelanggan, bulan, tahun, jumlah_meter, status
  ) VALUES (
    CONCAT('TG', DATE_FORMAT(NOW(), '%y%m%d'), LPAD(FLOOR(RAND() * 10000), 4, '0')),
    NEW.id_penggunaan,
    NEW.id_pelanggan,
    NEW.bulan,
    NEW.tahun,
    jumlah,
    'UNPAID'
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` varchar(128) NOT NULL,
  `id_penggunaan` varchar(128) NOT NULL,
  `id_pelanggan` varchar(128) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah_meter` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `status`) VALUES
('TG2209100005', 'PN220910005', 'PLG2210100001', 9, 2022, 100, 'PAID'),
('TG2211100005', 'PN221016005', 'PLG2210100001', 10, 2022, 130, 'PAID'),
('TG2302100002', 'PN230210002', 'PLG2302040001', 1, 2023, 100, 'PAID'),
('TG2302100003', 'PN230210003', 'PLG2302090001', 1, 2023, 100, 'PAID'),
('TG2302100004', 'PN230210004', 'PLG2302040001', 2, 2023, 100, 'PAID'),
('TG2302100005', 'PN230210005', 'PLG2210100001', 12, 2022, 120, 'PAID'),
('TG2302100006', 'PN230210006', 'PLG2210100001', 1, 2023, 150, 'PAID'),
('TG2302110001', 'PN230211001', 'PLG2209010001', 1, 2023, 100, 'PAID'),
('TG2302110002', 'PN220101002', 'PLG2302080001', 1, 2023, 100, 'PAID'),
('TG2302110003', 'PN230211002', 'PLG2302080001', 2, 2023, 110, 'PAID'),
('TG2302110004', 'PN230211003', 'PLG2210100001', 2, 2023, 200, 'PAID'),
('TG2302110005', 'PN230211004', 'PLG2302090001', 2, 2023, 200, 'UNPAID'),
('TG2302120001', 'PN221012001', 'PLG2210060004', 10, 2022, 125, 'PAID'),
('TG2302120002', 'PN221101001', 'PLG2210060004', 11, 2022, 275, 'PAID'),
('TG2302120003', 'PN221201001', 'PLG2210060004', 12, 2022, 115, 'PAID'),
('TG2302120004', 'PN230101001', 'PLG2210060004', 1, 2023, 125, 'PAID'),
('TG2302120005', 'PN230212001', 'PLG2210060004', 2, 2023, 160, 'UNPAID'),
('TG2507140832', 'PN250714002', 'PLG2507120001', 6, 2025, 900, 'UNPAID'),
('TG2507141244', 'PN250714004', 'PLG2507120001', 6, 2025, 9000, 'UNPAID'),
('TG2507143912', 'PN250714003', 'PLG2507120001', 6, 2025, 89000, 'UNPAID'),
('TG2507146876', 'PN250714001', 'PLG2507120001', 6, 2025, 100, 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` varchar(128) NOT NULL,
  `daya` varchar(25) NOT NULL,
  `tarif_perkwh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `daya`, `tarif_perkwh`) VALUES
('TRF20230205002', '900VA', 1400),
('TRF20230205007', '450VA', 1000),
('TRF20230205009', '1500VA', 2000),
('TRF20230205010', '1300VA', 1700);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `id_level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_admin`, `id_level`) VALUES
('ADM0000', 'superadmin', 'superadmin', 'superadmin', 'LVL001'),
('USR0000', 'superadmin', 'USER123', 'superuser', 'LVL002'),
('USR0001', 'admin', '$2y$10$7uSfHcX.wg4V9HnFZQE4YelqD4dMvjj/nbDMwoo3EhY2drtKJvAC.', 'Admin', 'LVL001'),
('USR0007', 'tahu', '$2y$10$n4fc9IWYDHK2gzLA0szPW.Lfw9qWQsfr2qMoGCat8APKBkUxZJVj2', 'tahu crispy', 'LVL002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
