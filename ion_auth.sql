# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     ci_template
# Server version:               5.1.37-1ubuntu5
# Server OS:                    debian-linux-gnu
# Target compatibility:         ANSI SQL
# HeidiSQL version:             4.0
# Date/time:                    2010-01-20 14:14:54
# --------------------------------------------------------

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ANSI,NO_BACKSLASH_ESCAPES';*/
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


DROP TABLE IF EXISTS "groups";

#
# Table structure for table 'groups'
#

CREATE TABLE "groups" (
  "id" tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  "name" varchar(20) NOT NULL,
  "description" varchar(100) NOT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=3;



#
# Dumping data for table 'groups'
#

LOCK TABLES "groups" WRITE;
/*!40000 ALTER TABLE "groups" DISABLE KEYS;*/
INSERT INTO "groups" ("id", "name", "description") VALUES
	(1,'admin','Administrator');
INSERT INTO "groups" ("id", "name", "description") VALUES
	(2,'members','General User');
/*!40000 ALTER TABLE "groups" ENABLE KEYS;*/
UNLOCK TABLES;


DROP TABLE IF EXISTS "meta";

#
# Table structure for table 'meta'
#

CREATE TABLE "meta" (
  "id" int(10) unsigned NOT NULL AUTO_INCREMENT,
  "user_id" int(10) unsigned DEFAULT NULL,
  "first_name" varchar(50) DEFAULT NULL,
  "last_name" varchar(50) DEFAULT NULL,
  "company" varchar(100) DEFAULT NULL,
  "phone" varchar(20) DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=3;



#
# Dumping data for table 'meta'
#

LOCK TABLES "meta" WRITE;
/*!40000 ALTER TABLE "meta" DISABLE KEYS;*/
INSERT INTO "meta" ("id", "user_id", "first_name", "last_name", "company", "phone") VALUES
	('2','2','Ben','Edmunds',NULL,'706-289-4115');
INSERT INTO "meta" ("id", "user_id", "first_name", "last_name", "company", "phone") VALUES
	('1','1','Admin','istrator','ADMIN','0');
/*!40000 ALTER TABLE "meta" ENABLE KEYS;*/
UNLOCK TABLES;


DROP TABLE IF EXISTS "users";

#
# Table structure for table 'users'
#

CREATE TABLE "users" (
  "id" mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  "group_id" mediumint(8) unsigned NOT NULL,
  "ip_address" char(16) NOT NULL,
  "username" varchar(15) NOT NULL,
  "password" varchar(40) NOT NULL,
  "email" varchar(40) NOT NULL,
  "activation_code" varchar(40) DEFAULT NULL,
  "forgotten_password_code" varchar(40) DEFAULT NULL,
  "active" int(1) unsigned DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=3;



#
# Dumping data for table 'users'
#

LOCK TABLES "users" WRITE;
/*!40000 ALTER TABLE "users" DISABLE KEYS;*/
INSERT INTO "users" ("id", "group_id", "ip_address", "username", "password", "email", "activation_code", "forgotten_password_code", "active") VALUES
	('2','1','127.0.0.1','benedmunds','90f225662006e51062179b5dc74ff9636f2c1ca5','ben.edmunds@gmail.com','0','0','1');
INSERT INTO "users" ("id", "group_id", "ip_address", "username", "password", "email", "activation_code", "forgotten_password_code", "active") VALUES
	('1','1','127.0.0.1','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','admin@admin.com','',NULL,'1');
/*!40000 ALTER TABLE "users" ENABLE KEYS;*/
UNLOCK TABLES;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE;*/
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/
