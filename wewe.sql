-- --------------------------------------------------------
-- 호스트:                          db.itempang.gabia.io
-- 서버 버전:                        5.7.21-log - Source distribution
-- 서버 OS:                        Linux
-- HeidiSQL 버전:                  12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- information_schema 데이터베이스 구조 내보내기

-- dbitempang 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `dbitempang` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbitempang`;

-- 테이블 dbitempang.account 구조 내보내기
CREATE TABLE IF NOT EXISTS `account` (
  `bank` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.admin 구조 내보내기
CREATE TABLE IF NOT EXISTS `admin` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `diss_date` datetime DEFAULT NULL,
  `miss_cnt` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.area 구조 내보내기
CREATE TABLE IF NOT EXISTS `area` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) NOT NULL,
  `cate` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `time_info` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.attached_files 구조 내보내기
CREATE TABLE IF NOT EXISTS `attached_files` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `upload_type` varchar(20) NOT NULL,
  `parent_idx` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `real_path` varchar(100) NOT NULL,
  `keyval` int(11) DEFAULT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.autochat 구조 내보내기
CREATE TABLE IF NOT EXISTS `autochat` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.banner 구조 내보내기
CREATE TABLE IF NOT EXISTS `banner` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `position` char(50) DEFAULT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.board_comment 구조 내보내기
CREATE TABLE IF NOT EXISTS `board_comment` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `board_code` varchar(20) NOT NULL,
  `parent_idx` int(11) NOT NULL,
  `comment_idx` int(11) DEFAULT NULL,
  `member_idx` int(11) NOT NULL,
  `content` text NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.board_config 구조 내보내기
CREATE TABLE IF NOT EXISTS `board_config` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `board_code` varchar(20) NOT NULL,
  `board_type` varchar(10) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.board_data 구조 내보내기
CREATE TABLE IF NOT EXISTS `board_data` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `member_idx` int(11) NOT NULL,
  `board_code` varchar(20) NOT NULL,
  `writer` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `answer` text,
  `answer_date` datetime DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.board_view 구조 내보내기
CREATE TABLE IF NOT EXISTS `board_view` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `board_idx` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.chat_room 구조 내보내기
CREATE TABLE IF NOT EXISTS `chat_room` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `member_idx` int(11) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=187345 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.construction 구조 내보내기
CREATE TABLE IF NOT EXISTS `construction` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.coupon 구조 내보내기
CREATE TABLE IF NOT EXISTS `coupon` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `service_idx` int(11) DEFAULT NULL,
  `NAME` varchar(255) NOT NULL,
  `min_by_cnt` int(11) NOT NULL,
  `max_by_cnt` int(11) NOT NULL,
  `limit_unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.couponplayer 구조 내보내기
CREATE TABLE IF NOT EXISTS `couponplayer` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.faq 구조 내보내기
CREATE TABLE IF NOT EXISTS `faq` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.greetings 구조 내보내기
CREATE TABLE IF NOT EXISTS `greetings` (
  `greetings` text NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.inquiry 구조 내보내기
CREATE TABLE IF NOT EXISTS `inquiry` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `memo` text,
  `status` char(1) NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.member 구조 내보내기
CREATE TABLE IF NOT EXISTS `member` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(255) NOT NULL,
  `userPassword` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cellphone` varchar(11) NOT NULL,
  `login_type` varchar(255) NOT NULL,
  `gameId` varchar(255) NOT NULL,
  `gamePassword` varchar(255) NOT NULL,
  `gameSecondPassword` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=33021 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.mycoupon 구조 내보내기
CREATE TABLE IF NOT EXISTS `mycoupon` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `member_idx` int(11) NOT NULL,
  `coupon_idx` int(11) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `service_idx` int(11) NOT NULL,
  `useYn` char(1) DEFAULT '0',
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=1736105 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.notice 구조 내보내기
CREATE TABLE IF NOT EXISTS `notice` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `viewFlag` char(1) NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.orderinfo 구조 내보내기
CREATE TABLE IF NOT EXISTS `orderinfo` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `member_idx` int(11) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `depositor` varchar(255) NOT NULL,
  `cellphone` varchar(20) NOT NULL,
  `login_type` varchar(30) DEFAULT NULL,
  `otp` char(1) DEFAULT NULL,
  `gameId` varchar(255) DEFAULT NULL,
  `gamePassword` varchar(255) DEFAULT NULL,
  `gameSecondPassword` varchar(255) DEFAULT NULL,
  `service` varchar(255) NOT NULL,
  `topc` char(1) DEFAULT NULL,
  `tbuy` char(1) DEFAULT NULL,
  `cbuy` char(1) DEFAULT NULL,
  `cnt_result` int(11) DEFAULT NULL,
  `memo` text,
  `coupon_idx` int(11) DEFAULT NULL,
  `coupon_cnt` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `usec` char(1) DEFAULT NULL,
  `useCoupon` int(11) DEFAULT NULL,
  `pname` text,
  `pjo` text,
  `puk` text,
  `pcoupon` text,
  `agent` text NOT NULL,
  `status` char(1) NOT NULL,
  `reg_date` datetime NOT NULL,
  `rec` varchar(255) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=317405 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.product 구조 내보내기
CREATE TABLE IF NOT EXISTS `product` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subCategory` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.rec 구조 내보내기
CREATE TABLE IF NOT EXISTS `rec` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.service 구조 내보내기
CREATE TABLE IF NOT EXISTS `service` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dn` char(1) DEFAULT NULL,
  `cp` char(1) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `memo` text,
  `reg_date` longblob NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.terms 구조 내보내기
CREATE TABLE IF NOT EXISTS `terms` (
  `terms_1` text,
  `terms_2` text,
  `terms_3` text,
  `terms_4` text,
  `terms_5` text,
  `terms_6` text,
  `ins` char(1) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 dbitempang.visitor 구조 내보내기
CREATE TABLE IF NOT EXISTS `visitor` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=748552 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
