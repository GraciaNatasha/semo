-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 10:16 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ltagama`
--

CREATE TABLE `ltagama` (
  `IDAgama` int(11) NOT NULL,
  `namaAgama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltagama`
--

INSERT INTO `ltagama` (`IDAgama`, `namaAgama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Buddha'),
(5, 'Hindu'),
(6, 'Konghucu'),
(7, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `ltcarabayar`
--

CREATE TABLE `ltcarabayar` (
  `IDCaraBayar` int(11) NOT NULL,
  `namaCaraBayar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltcarabayar`
--

INSERT INTO `ltcarabayar` (`IDCaraBayar`, `namaCaraBayar`) VALUES
(1, 'Manual'),
(2, 'Trf BCA');

-- --------------------------------------------------------

--
-- Table structure for table `ltjenisasuransi`
--

CREATE TABLE `ltjenisasuransi` (
  `IDJenisAsuransi` int(11) NOT NULL,
  `namaJenisAsuransi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltjenisasuransi`
--

INSERT INTO `ltjenisasuransi` (`IDJenisAsuransi`, `namaJenisAsuransi`) VALUES
(1, 'Asuransi Kredit'),
(2, 'Asuransi Tunai'),
(3, 'Non Asuransi ');

-- --------------------------------------------------------

--
-- Table structure for table `ltjeniskuitansi`
--

CREATE TABLE `ltjeniskuitansi` (
  `IDJenisKuitansi` varchar(2) NOT NULL,
  `namaJenisKuitansi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltjeniskuitansi`
--

INSERT INTO `ltjeniskuitansi` (`IDJenisKuitansi`, `namaJenisKuitansi`) VALUES
('L', 'Pengeluaran Apalis'),
('M', 'Pemasukan Apalis'),
('KL', 'Pengeluaran Kas BJM'),
('KM', 'Pemasukan Kas BJM');

-- --------------------------------------------------------

--
-- Table structure for table `mskendaraan`
--

CREATE TABLE `mskendaraan` (
  `IDKendaraan` int(11) NOT NULL,
  `merkKendaraan` varchar(20) DEFAULT NULL,
  `jenisKendaraan` varchar(6) DEFAULT NULL,
  `tipeKendaraan` varchar(6) DEFAULT NULL,
  `noRangkaKendaraan` varchar(15) DEFAULT NULL,
  `noMesinKendaraan` varchar(15) DEFAULT NULL,
  `warnaKendaraan` varchar(10) DEFAULT NULL,
  `tahunKendaraan` int(11) DEFAULT NULL,
  `noPolisiKendaraan` varchar(15) DEFAULT NULL,
  `statusKepemilikanKendaraan` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `noStok` varchar(10) DEFAULT NULL,
  `tglBeli` date DEFAULT NULL,
  `beliDari` varchar(50) DEFAULT NULL,
  `hargaBeli` int(11) DEFAULT NULL,
  `IDCaraBayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mskendaraan`
--

INSERT INTO `mskendaraan` (`IDKendaraan`, `merkKendaraan`, `jenisKendaraan`, `tipeKendaraan`, `noRangkaKendaraan`, `noMesinKendaraan`, `warnaKendaraan`, `tahunKendaraan`, `noPolisiKendaraan`, `statusKepemilikanKendaraan`, `username`, `noStok`, `tglBeli`, `beliDari`, `hargaBeli`, `IDCaraBayar`) VALUES
(6, '123456', '123456', '123456', '123456', '123456', '123456', 1233456, '123rty', 'BJM', 'gracia', 'asd123', '2019-04-29', 'test', 100000, 2),
(7, '123', '123', '123', '123', '123', '123', 1233, '123', 'BJM', 'gracia', '123', '0000-00-00', '', 0, 1),
(8, '123', '123', '123', '123', '123', '123', 1233, '123', 'disewakan', 'gracia', NULL, NULL, NULL, NULL, NULL),
(9, '123', '123', '123', '123', '123', '123', 1233, '123', 'disewakan', 'gracia', NULL, NULL, NULL, NULL, NULL),
(10, '123', '123', '123', '123', '123', '123', 1233, '123', 'disewakan', 'gracia', NULL, NULL, NULL, NULL, NULL),
(11, '123', '123', '123', '123', '123', '123', 1233, 'P1234BE', 'disewakan', 'gracia', NULL, NULL, NULL, NULL, NULL),
(12, '123', '123', '123', '123', '123', '123', 1231, 'P1234OI', 'disewakan', 'gracia', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `msnasabah`
--

CREATE TABLE `msnasabah` (
  `IDNasabah` int(11) NOT NULL,
  `namaNasabah` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `noTelp` varchar(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `IDAgama` int(11) DEFAULT NULL,
  `noKTP` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msnasabah`
--

INSERT INTO `msnasabah` (`IDNasabah`, `namaNasabah`, `alamat`, `tglLahir`, `noTelp`, `email`, `IDAgama`, `noKTP`, `username`) VALUES
(7, 'grac', '123', '2019-04-02', '123', NULL, 3, '123123', 'gracia'),
(8, 'grac', '123', '2019-04-02', '123', NULL, 3, '123123', 'gracia'),
(9, 'grac', '123', '2019-04-02', '123', NULL, 3, '123123', 'gracia'),
(10, 'grac', '123', '2019-04-02', '123', NULL, 3, '123123', 'gracia'),
(11, 'grac', '123', '2019-04-02', '123', NULL, 3, '123123', 'gracia'),
(12, 'grac12', '123', '2019-04-02', '123', NULL, 3, '123123', 'gracia'),
(13, 'grac13', '123', '2019-04-08', '123', NULL, 3, '123123', 'gracia'),
(14, 'grac1', '123123123', '2019-04-30', '123123', 'gracia.natasha.96@gmail.com', 3, '123123123', 'gracia');

-- --------------------------------------------------------

--
-- Table structure for table `msrole`
--

CREATE TABLE `msrole` (
  `IDRole` int(11) NOT NULL,
  `namaRole` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msrole`
--

INSERT INTO `msrole` (`IDRole`, `namaRole`) VALUES
(1, 'masteradmin');

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE `msuser` (
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `IDRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`username`, `password`, `IDRole`) VALUES
('gracia', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trbayarsewa`
--

CREATE TABLE `trbayarsewa` (
  `noKuitansi` varchar(10) NOT NULL,
  `IDDetailSewa` int(11) NOT NULL,
  `tglKuitansi` date NOT NULL,
  `bayarSewa` int(11) NOT NULL,
  `bayarDenda` int(11) NOT NULL,
  `totalNominalBayar` int(11) NOT NULL,
  `IDCaraBayar` varchar(1) NOT NULL,
  `tglBayar` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trdetailsewa`
--

CREATE TABLE `trdetailsewa` (
  `IDDetailSewa` int(11) NOT NULL,
  `noPiutang` varchar(5) NOT NULL,
  `sewaKe` int(11) NOT NULL,
  `tglJatuhTempo` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `statusLunas` varchar(1) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trdetailsewa`
--

INSERT INTO `trdetailsewa` (`IDDetailSewa`, `noPiutang`, `sewaKe`, `tglJatuhTempo`, `nominal`, `denda`, `statusLunas`, `username`) VALUES
(1, 'S1246', 1, '2019-04-17', 207000, 0, 'L', 'gracia'),
(2, 'S1246', 2, '2019-04-26', 207000, 0, 'B', 'gracia'),
(3, 'S1246', 3, '2019-07-01', 207000, 0, 'B', 'gracia'),
(4, 'S1246', 4, '2019-08-01', 207000, 0, 'B', 'gracia'),
(5, 'S1246', 5, '2019-09-01', 207000, 0, 'B', 'gracia'),
(6, 'S1246', 6, '2019-10-01', 207000, 0, 'B', 'gracia'),
(7, 'S1246', 7, '2019-11-01', 207000, 0, 'B', 'gracia'),
(8, 'S1246', 8, '2019-12-01', 207000, 0, 'B', 'gracia'),
(9, 'S1246', 9, '2020-01-01', 207000, 0, 'B', 'gracia'),
(10, 'S1246', 10, '2020-02-01', 207000, 0, 'B', 'gracia'),
(11, 'S1246', 11, '2020-03-01', 207000, 0, 'B', 'gracia'),
(12, 'S1246', 12, '2020-04-01', 207000, 0, 'B', 'gracia'),
(13, 'S1246', 13, '2020-05-01', 207000, 0, 'B', 'gracia'),
(14, 'S1246', 14, '2020-06-01', 207000, 0, 'B', 'gracia'),
(15, 'S1246', 15, '2020-07-01', 207000, 0, 'B', 'gracia'),
(16, 'S1246', 16, '2020-08-01', 207000, 0, 'B', 'gracia'),
(17, 'S1246', 17, '2020-09-01', 207000, 0, 'B', 'gracia'),
(18, 'S1246', 18, '2020-10-01', 207000, 0, 'B', 'gracia'),
(19, 'S1246', 19, '2020-11-01', 207000, 0, 'B', 'gracia'),
(20, 'S1246', 20, '2020-12-01', 207000, 0, 'B', 'gracia'),
(21, 'S1246', 21, '2021-01-01', 207000, 0, 'B', 'gracia'),
(22, 'S1246', 22, '2021-02-01', 207000, 0, 'B', 'gracia'),
(23, 'S1246', 23, '2021-03-01', 207000, 0, 'B', 'gracia'),
(24, 'S1246', 24, '2021-04-01', 207000, 0, 'B', 'gracia'),
(25, 'S1111', 1, '2019-03-01', 11309000, 0, 'B', 'gracia'),
(26, 'S1111', 2, '2019-04-01', 11309000, 0, 'B', 'gracia'),
(27, 'S1111', 3, '2019-05-01', 11309000, 0, 'B', 'gracia'),
(28, 'S1111', 4, '2019-06-01', 11309000, 0, 'B', 'gracia'),
(29, 'S1111', 5, '2019-07-01', 11309000, 0, 'B', 'gracia'),
(30, 'S1111', 6, '2019-08-01', 11309000, 0, 'B', 'gracia'),
(31, 'S1111', 7, '2019-09-01', 11309000, 0, 'B', 'gracia'),
(32, 'S1111', 8, '2019-10-01', 11309000, 0, 'B', 'gracia'),
(33, 'S1111', 9, '2019-11-01', 11309000, 0, 'B', 'gracia'),
(34, 'S1111', 10, '2019-12-01', 11309000, 0, 'B', 'gracia'),
(35, 'S1111', 11, '2020-01-01', 11309000, 0, 'B', 'gracia'),
(36, 'S1111', 12, '2020-02-01', 11309000, 0, 'B', 'gracia'),
(37, 'S4567', 1, '2019-05-04', 36667000, 0, 'B', 'gracia'),
(38, 'S4567', 2, '2019-06-04', 36667000, 0, 'B', 'gracia'),
(39, 'S4567', 3, '2019-07-04', 36667000, 0, 'B', 'gracia'),
(40, 'S4567', 4, '2019-08-04', 36667000, 0, 'B', 'gracia'),
(41, 'S4567', 5, '2019-09-04', 36667000, 0, 'B', 'gracia'),
(42, 'S4567', 6, '2019-10-04', 36667000, 0, 'B', 'gracia'),
(43, 'S4567', 7, '2019-11-04', 36667000, 0, 'B', 'gracia'),
(44, 'S4567', 8, '2019-12-04', 36667000, 0, 'B', 'gracia'),
(45, 'S4567', 9, '2020-01-04', 36667000, 0, 'B', 'gracia'),
(46, 'S4567', 10, '2020-02-04', 36667000, 0, 'B', 'gracia'),
(47, 'S4567', 11, '2020-03-04', 36667000, 0, 'B', 'gracia'),
(48, 'S4567', 12, '2020-04-04', 36667000, 0, 'B', 'gracia');

-- --------------------------------------------------------

--
-- Table structure for table `trpemasukanpengeluaran`
--

CREATE TABLE `trpemasukanpengeluaran` (
  `noKuitansi` varchar(10) NOT NULL,
  `dariUntuk` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tglTransaksi` date NOT NULL,
  `tipe` varchar(2) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trpemasukanpengeluaran`
--

INSERT INTO `trpemasukanpengeluaran` (`noKuitansi`, `dariUntuk`, `nominal`, `keterangan`, `tglTransaksi`, `tipe`, `username`) VALUES
('KL889', 'KL', 678, '67867', '2019-04-27', 'KL', 'gracia'),
('KM567', '567', 78, '78', '2019-04-27', 'KM', 'gracia'),
('KMe44', '45', 345, '34', '2019-04-27', 'KM', 'gracia'),
('L 66', '66', 66, '66', '2019-04-27', 'L', 'gracia'),
('L123', 'test L', 222, 'test aja', '2019-04-27', 'L', 'gracia'),
('L78', '88', 88, '88', '2019-04-27', 'L', 'gracia'),
('M567', '567', 567, '56756', '2019-04-27', 'M', 'gracia');

-- --------------------------------------------------------

--
-- Table structure for table `trsewa`
--

CREATE TABLE `trsewa` (
  `noPiutang` varchar(5) NOT NULL,
  `IDNasabah` int(11) NOT NULL,
  `IDKendaraan` int(11) NOT NULL,
  `HDKSewa` int(11) NOT NULL,
  `DPSewa` int(11) NOT NULL,
  `IDJenisAsuransi` int(11) NOT NULL,
  `asuransiSewa` int(11) NOT NULL,
  `bungaSewa` int(11) NOT NULL,
  `masaKreditSewa` int(11) NOT NULL,
  `angsuranPerBulan` int(11) NOT NULL,
  `biayaAdmSewa` int(11) NOT NULL,
  `jatuhTempoAngsuran1` date NOT NULL,
  `namaSales` varchar(50) NOT NULL,
  `tglPernyataanSewa` date NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trsewa`
--

INSERT INTO `trsewa` (`noPiutang`, `IDNasabah`, `IDKendaraan`, `HDKSewa`, `DPSewa`, `IDJenisAsuransi`, `asuransiSewa`, `bungaSewa`, `masaKreditSewa`, `angsuranPerBulan`, `biayaAdmSewa`, `jatuhTempoAngsuran1`, `namaSales`, `tglPernyataanSewa`, `username`) VALUES
('S1111', 13, 12, 130000000, 25000000, 1, 13000000, 17700000, 12, 11309000, 100000, '2019-03-01', 'grac', '2019-02-25', 'gracia'),
('S123', 1, 1, 5000000, 1000000, 1, 500000, 450000, 24, 207000, 10000, '2019-05-01', 'grac', '2019-04-18', 'gracia'),
('S1234', 1, 1, 5000000, 1000000, 1, 500000, 450000, 24, 207000, 10000, '2019-05-01', 'grac', '2019-04-18', 'gracia'),
('S1245', 10, 9, 5000000, 1000000, 1, 500000, 450000, 24, 207000, 10000, '2019-05-01', 'grac', '2019-04-18', 'gracia'),
('S1246', 12, 11, 5000000, 1000000, 1, 500000, 450000, 24, 207000, 10000, '2019-05-01', 'grac', '2019-04-18', 'gracia'),
('S4567', 8, 7, 500000000, 100000000, 2, 50000000, 40000000, 12, 36667000, 100000, '2019-05-04', 'grac', '2019-05-02', 'gracia');

-- --------------------------------------------------------

--
-- Table structure for table `trtarikkendaraan`
--

CREATE TABLE `trtarikkendaraan` (
  `IDTarikKendaraan` int(11) NOT NULL,
  `noPiutang` varchar(5) NOT NULL,
  `tglTarik` date NOT NULL,
  `penarik` varchar(50) DEFAULT NULL,
  `tglTebus` date DEFAULT NULL,
  `penebus` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trtarikkendaraan`
--

INSERT INTO `trtarikkendaraan` (`IDTarikKendaraan`, `noPiutang`, `tglTarik`, `penarik`, `tglTebus`, `penebus`, `username`) VALUES
(1, 'S1111', '0000-00-00', NULL, '2019-05-04', 'nasabah', 'gracia'),
(2, 'S1111', '2019-05-01', 'test', '2019-05-04', 'nasabah', 'gracia'),
(3, 'S1246', '2019-04-30', 'test123', '2019-05-10', 'BJM', 'gracia'),
(4, 'S1111', '2019-05-01', '123', '2019-05-10', 'nasabah', 'gracia'),
(5, 'S1111', '2019-05-10', 'test', '2019-05-17', 'nasabah', 'gracia');

-- --------------------------------------------------------

--
-- Table structure for table `trtransferanonim`
--

CREATE TABLE `trtransferanonim` (
  `IDTransferAnonim` int(11) NOT NULL,
  `tanggalTransfer` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `statusKonfirmasi` varchar(1) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ltagama`
--
ALTER TABLE `ltagama`
  ADD PRIMARY KEY (`IDAgama`);

--
-- Indexes for table `ltcarabayar`
--
ALTER TABLE `ltcarabayar`
  ADD PRIMARY KEY (`IDCaraBayar`);

--
-- Indexes for table `ltjenisasuransi`
--
ALTER TABLE `ltjenisasuransi`
  ADD PRIMARY KEY (`IDJenisAsuransi`);

--
-- Indexes for table `mskendaraan`
--
ALTER TABLE `mskendaraan`
  ADD PRIMARY KEY (`IDKendaraan`);

--
-- Indexes for table `msnasabah`
--
ALTER TABLE `msnasabah`
  ADD PRIMARY KEY (`IDNasabah`);

--
-- Indexes for table `msrole`
--
ALTER TABLE `msrole`
  ADD PRIMARY KEY (`IDRole`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `trbayarsewa`
--
ALTER TABLE `trbayarsewa`
  ADD PRIMARY KEY (`noKuitansi`);

--
-- Indexes for table `trdetailsewa`
--
ALTER TABLE `trdetailsewa`
  ADD PRIMARY KEY (`IDDetailSewa`);

--
-- Indexes for table `trpemasukanpengeluaran`
--
ALTER TABLE `trpemasukanpengeluaran`
  ADD PRIMARY KEY (`noKuitansi`);

--
-- Indexes for table `trsewa`
--
ALTER TABLE `trsewa`
  ADD PRIMARY KEY (`noPiutang`);

--
-- Indexes for table `trtarikkendaraan`
--
ALTER TABLE `trtarikkendaraan`
  ADD PRIMARY KEY (`IDTarikKendaraan`);

--
-- Indexes for table `trtransferanonim`
--
ALTER TABLE `trtransferanonim`
  ADD PRIMARY KEY (`IDTransferAnonim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ltagama`
--
ALTER TABLE `ltagama`
  MODIFY `IDAgama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ltcarabayar`
--
ALTER TABLE `ltcarabayar`
  MODIFY `IDCaraBayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ltjenisasuransi`
--
ALTER TABLE `ltjenisasuransi`
  MODIFY `IDJenisAsuransi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mskendaraan`
--
ALTER TABLE `mskendaraan`
  MODIFY `IDKendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `msnasabah`
--
ALTER TABLE `msnasabah`
  MODIFY `IDNasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `msrole`
--
ALTER TABLE `msrole`
  MODIFY `IDRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trdetailsewa`
--
ALTER TABLE `trdetailsewa`
  MODIFY `IDDetailSewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `trtarikkendaraan`
--
ALTER TABLE `trtarikkendaraan`
  MODIFY `IDTarikKendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trtransferanonim`
--
ALTER TABLE `trtransferanonim`
  MODIFY `IDTransferAnonim` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
