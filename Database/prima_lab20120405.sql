# MySQL-Front 3.2  (Build 14.3)

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='SYSTEM' */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


# Host: localhost    Database: prima_lab
# ------------------------------------------------------
# Server version 5.0.16-nt

/*!40101 SET NAMES utf8 */;

#
# Table structure for table admin
#

CREATE TABLE `admin` (
  `username` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
  `password` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Dumping data for table admin
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `admin` VALUES ('root','1234','Patcharaporn Munchupaiboon');

/*!40101 SET NAMES utf8 */;

#
# Table structure for table category
#

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_name` varchar(50) default NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

#
# Dumping data for table category
#

INSERT INTO `category` VALUES (1,'Metal');
INSERT INTO `category` VALUES (2,'Metal Frame');
INSERT INTO `category` VALUES (3,'Plastic');
INSERT INTO `category` VALUES (4,'Pocelain');
INSERT INTO `category` VALUES (5,'Teeth');
INSERT INTO `category` VALUES (6,'Treatment');

#
# Table structure for table customer
#

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL auto_increment,
  `customer_name` varchar(50) default NULL,
  `customer_address` varchar(80) default NULL,
  `customer_tel` varchar(15) character set latin1 NOT NULL,
  `shipping_address` varchar(80) default NULL,
  PRIMARY KEY  (`cus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

#
# Dumping data for table customer
#

INSERT INTO `customer` VALUES (1,'Google','USA','081234567','Empire');
INSERT INTO `customer` VALUES (2,'Stream IT','Q.House','0831234567','Paris');
INSERT INTO `customer` VALUES (5,'Dental Lab11','K.Villa','076254982','Nonthaburi');
INSERT INTO `customer` VALUES (7,'โรงพยาบาลนภาลัย','โรงพยาบาลนภาลัย','021234567','โรงพยาบาลนภาลัย');
INSERT INTO `customer` VALUES (8,'โรงพยาบาลกรุงเทพ','Bangkok','024567891','Bangkok');
INSERT INTO `customer` VALUES (9,'abc','abcdefg','021234567','test');
INSERT INTO `customer` VALUES (11,'test','Bkk','021234567','Bkk');

#
# Table structure for table order_detail
#

CREATE TABLE `order_detail` (
  `product_id` int(11) NOT NULL,
  `price` int(11) default NULL,
  `qty` int(11) NOT NULL,
  `order_id` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Dumping data for table order_detail
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `order_detail` VALUES (1,800,4,14);
INSERT INTO `order_detail` VALUES (1,800,3,13);
INSERT INTO `order_detail` VALUES (38,100,2,12);
INSERT INTO `order_detail` VALUES (5,1200,3,12);
INSERT INTO `order_detail` VALUES (4,1400,2,12);
INSERT INTO `order_detail` VALUES (54,140,3,11);
INSERT INTO `order_detail` VALUES (4,1400,1,11);
INSERT INTO `order_detail` VALUES (53,140,1,10);
INSERT INTO `order_detail` VALUES (37,700,2,10);
INSERT INTO `order_detail` VALUES (2,1200,2,9);
INSERT INTO `order_detail` VALUES (1,800,2,8);
INSERT INTO `order_detail` VALUES (12,150,2,14);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table order_detail2
#

CREATE TABLE `order_detail2` (
  `product_id` int(11) NOT NULL,
  `price` int(11) default NULL,
  `qty` int(11) default NULL,
  `order_id` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

#
# Dumping data for table order_detail2
#

INSERT INTO `order_detail2` VALUES (1,800,2,8);
INSERT INTO `order_detail2` VALUES (1,800,2,9);
INSERT INTO `order_detail2` VALUES (37,700,2,9);

#
# Table structure for table orders
#

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL auto_increment,
  `Date` datetime default NULL,
  `customer_name` varchar(40) default NULL,
  `phone` varchar(20) default NULL,
  `address` text NOT NULL,
  `cus_id` int(11) default NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

#
# Dumping data for table orders
#

INSERT INTO `orders` VALUES (9,'2012-03-15 22:02:15','Dental Lab11','026897534','test',5);
INSERT INTO `orders` VALUES (10,'2012-03-15 22:06:02','โรงพยาบาลนภาลัย','0851234567','test',7);
INSERT INTO `orders` VALUES (11,'2012-03-15 22:07:03','โรงพยาบาลนภาลัย','02345598','test',7);
INSERT INTO `orders` VALUES (12,'2012-03-18 19:48:32','Google','021234456','testtt',1);
INSERT INTO `orders` VALUES (13,'2012-03-18 20:35:41','Google','026897534','test',1);
INSERT INTO `orders` VALUES (14,'2012-03-18 20:47:04','test','026897534','Bkk',11);

#
# Table structure for table orders2
#

CREATE TABLE `orders2` (
  `order_id` int(11) NOT NULL auto_increment,
  `Date` date default NULL,
  `customer_name` varchar(50) default NULL,
  `phone` varchar(11) default NULL,
  `address` text,
  `cus_id` int(11) default NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

#
# Dumping data for table orders2
#

INSERT INTO `orders2` VALUES (8,'2012-03-14','Googlea11111','026897534','test',1);
INSERT INTO `orders2` VALUES (9,'2012-03-14','Googlea11111','026897534','test',1);

#
# Table structure for table product
#

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL auto_increment,
  `product_name` varchar(50) default NULL,
  `price` int(11) default NULL,
  `category_id` int(11) default NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table product
#

INSERT INTO `product` VALUES (1,'Palladium1',800,1);
INSERT INTO `product` VALUES (2,'Semi-precious',1200,1);
INSERT INTO `product` VALUES (3,'Semi-precious(ทอง)',1500,1);
INSERT INTO `product` VALUES (4,'Framework',1400,2);
INSERT INTO `product` VALUES (5,'Full Denture Metal',1200,2);
INSERT INTO `product` VALUES (6,'Removebridge(RB)_1',700,2);
INSERT INTO `product` VALUES (7,'Removebridge(RB)_2',100,2);
INSERT INTO `product` VALUES (8,'Solder Service',150,2);
INSERT INTO `product` VALUES (9,'Metal Clasp',150,2);
INSERT INTO `product` VALUES (10,'Metal Tooth',150,2);
INSERT INTO `product` VALUES (11,'ต่อเติมโครงโลหะ (เฉพาะค่าโครง)',150,2);
INSERT INTO `product` VALUES (12,'Temporary Plate_1',150,3);
INSERT INTO `product` VALUES (13,'Temporary Plate_2',30,3);
INSERT INTO `product` VALUES (14,'Full Denture',1200,3);
INSERT INTO `product` VALUES (15,'CD',1200,3);
INSERT INTO `product` VALUES (16,'Clasp',30,3);
INSERT INTO `product` VALUES (17,'Repair',100,3);
INSERT INTO `product` VALUES (18,'Reline',400,3);
INSERT INTO `product` VALUES (19,'Rebase',500,3);
INSERT INTO `product` VALUES (20,'Individual Tray',120,3);
INSERT INTO `product` VALUES (21,'Bite Block',120,3);
INSERT INTO `product` VALUES (22,'Boxing and Master Cast',100,3);
INSERT INTO `product` VALUES (23,'High Impact',100,3);
INSERT INTO `product` VALUES (24,'ตะแกรงทอง',100,3);
INSERT INTO `product` VALUES (25,'ตะแกรงกลมโลหะ',100,3);
INSERT INTO `product` VALUES (26,'Wax รูปร่างและแพ็คสีฟัน',100,3);
INSERT INTO `product` VALUES (27,'Gum Slip',250,3);
INSERT INTO `product` VALUES (28,'Surgical Stent_1',300,3);
INSERT INTO `product` VALUES (29,'Surgical Stent_2',100,3);
INSERT INTO `product` VALUES (30,'Guaige_1',300,3);
INSERT INTO `product` VALUES (31,'Guaige_2',100,3);
INSERT INTO `product` VALUES (32,'Hard Splint',400,3);
INSERT INTO `product` VALUES (33,'Mount Hanau Articulator',200,3);
INSERT INTO `product` VALUES (34,'Soft Splint',300,3);
INSERT INTO `product` VALUES (35,'Night Guard',300,3);
INSERT INTO `product` VALUES (36,'Rest',30,3);
INSERT INTO `product` VALUES (37,'Porcelain Fused To Metal(PFM)',700,4);
INSERT INTO `product` VALUES (38,'Margin Pocelain',100,4);
INSERT INTO `product` VALUES (39,'Porcelain For RPD',700,4);
INSERT INTO `product` VALUES (40,'Crown รับตะขอ',300,4);
INSERT INTO `product` VALUES (41,'Full Metal Crown(FMC)',650,4);
INSERT INTO `product` VALUES (42,'Full Metal Crown for RPD',650,4);
INSERT INTO `product` VALUES (43,'Temp Crown/Bridge(waxing)',150,4);
INSERT INTO `product` VALUES (44,'Temp Crown/Bridge( ไม่ waxing)',120,4);
INSERT INTO `product` VALUES (45,'Pin Tooth',180,4);
INSERT INTO `product` VALUES (46,'Post and Core',180,4);
INSERT INTO `product` VALUES (47,'Pin Tooth แบบเสียบ',120,4);
INSERT INTO `product` VALUES (48,'Metal Inlay',350,4);
INSERT INTO `product` VALUES (49,'Onlay',350,4);
INSERT INTO `product` VALUES (50,'Marylanand',350,1);
INSERT INTO `product` VALUES (51,'Each Bridge(Wing)',350,4);
INSERT INTO `product` VALUES (52,'Rest',30,4);
INSERT INTO `product` VALUES (53,'Major Dent',140,5);
INSERT INTO `product` VALUES (54,'Cosmo',140,5);
INSERT INTO `product` VALUES (55,'Yamahachi',120,5);
INSERT INTO `product` VALUES (56,'Ivoclar_Front',300,5);
INSERT INTO `product` VALUES (57,'Ivoclar_Back',350,5);
INSERT INTO `product` VALUES (58,'Ivoclar(PE)',650,5);
INSERT INTO `product` VALUES (59,'เศษฟันของแลป',30,5);
INSERT INTO `product` VALUES (60,'Active Plate',350,6);
INSERT INTO `product` VALUES (61,'Wraparound Retainer',350,6);
INSERT INTO `product` VALUES (62,'คาด อคิลิก',400,6);
INSERT INTO `product` VALUES (63,'Hawley Retainer',300,6);
INSERT INTO `product` VALUES (64,'Transpalatal Bar',800,6);
INSERT INTO `product` VALUES (65,'Repid Expansion Screw(Hyrex Screw)',1500,6);
INSERT INTO `product` VALUES (66,'Quad Helex',500,6);
INSERT INTO `product` VALUES (67,'Band and Loop',300,6);
INSERT INTO `product` VALUES (68,'Distal Shoe',350,6);
INSERT INTO `product` VALUES (69,'Lingual Holding Arch',350,6);
INSERT INTO `product` VALUES (70,'Nance Appliance',350,6);
INSERT INTO `product` VALUES (71,'Fixed Band',150,6);
INSERT INTO `product` VALUES (72,'Lip Bumper',50,6);
INSERT INTO `product` VALUES (73,'Solder',50,6);
INSERT INTO `product` VALUES (74,'Rais Bite',50,6);
INSERT INTO `product` VALUES (76,'Test Metal Frame',500,2);
INSERT INTO `product` VALUES (79,'test33',200,1);
INSERT INTO `product` VALUES (80,'test11',200,1);
INSERT INTO `product` VALUES (81,'test1',200,1);

/*!40101 SET NAMES latin1 */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
