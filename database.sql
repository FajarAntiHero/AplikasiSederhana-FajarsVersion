/* Create Table */
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100),
  `kelas` varchar(100),
  `kontak` varchar(15),
  `alamat` varchar(100),
  PRIMARY KEY  (`id`)
);
