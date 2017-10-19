use Sofit_Food;

#CREATE TABLE `tbl_revis` (
#  `id` int(11) NOT NULL AUTO_INCREMENT,
#  `dt` datetime,
#  `user` int(11),
#  `place_id` int(11),
#  `desc` varchar(40),
#  PRIMARY KEY (`id`)
#) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#drop table `tbl_users_report`;
CREATE TABLE `tbl_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20),
  `phone` int(11),
  `Address` varchar(60),
  `check_string` varchar(120),
  `desc` varchar(40),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
