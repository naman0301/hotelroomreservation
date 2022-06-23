CREATE TABLE `Form` (
  `FULLNAME` varchar(25) NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `ROOMS` decimal(10,0) NOT NULL,
  `ADULTS` decimal(10,0) NOT NULL,
  `CHILDRENS` decimal(10,0) NOT NULL,
  PRIMARY KEY (`EMAIL`)
)
