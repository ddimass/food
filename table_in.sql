use Sofit_Food;

CREATE TABLE `tbl_day_sum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` datetime,
  `count_in` int(11),
  `cost_in` decimal(10,2),
  `count_out` int(11),
  `cost_out` decimal(10,2),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
