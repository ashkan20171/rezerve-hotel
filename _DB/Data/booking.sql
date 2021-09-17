# Host: localhost  (Version: 5.6.14-log)
# Date: 2013-11-24 13:27:55
# Generator: MySQL-Front 5.3  (Build 4.68)

/*!40101 SET NAMES utf8 */;

#
# Data for table "account"
#

REPLACE INTO `account` (`username`,`password`) VALUES ('admin','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

#
# Data for table "guest"
#


#
# Data for table "room_type"
#

REPLACE INTO `room_type` (`idroom_type`,`type_name`,`capacity`,`price`,`desc`) VALUES (1,'\r\n\r\nسوییت جونیور\r\n',2,350000,'تلفن، تلويزيون، يخچال، مبلمان، صندوق امانات، سرو يس فرنگي، حمام، سرو يس فرنگي'),(2,'\r\n\r\nاتاق یک تخته\r\n',1,232000,'تلفن، تلويزيون، يخچال، مبلمان، صندوق امانات، سرو يس فرنگي، حمام، سرو يس فرنگي'),(3,'\r\n\r\nاتاق دوتخته\r\n',2,283000,'تلفن، تلويزيون، يخچال، مبلمان، صندوق امانات، سرو يس فرنگي، حمام، سرو يس فرنگي');

#
# Data for table "rooms"
#

REPLACE INTO `rooms` (`idrooms`,`name`,`desc`,`type`) VALUES (1,'101',NULL,2),(2,'102',NULL,2),(3,'103',NULL,3),(4,'104',NULL,2),(5,'105',NULL,3),(6,'106',NULL,3),(7,'107',NULL,3),(8,'108',NULL,3),(9,'109',NULL,1),(10,'110',NULL,1);

#
# Data for table "reservation"
#

