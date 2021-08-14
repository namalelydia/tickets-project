<?php
$mysqli_connection = new mysqli("localhost","root","");

$mysqli_connection->query("CREATE DATABASE IF NOT EXISTS tourism");

mysqli_select_db($mysqli_connection,"tourism");

$mysqli_connection->query("CREATE TABLE IF NOT EXISTS country(COUNTRY_ID INT(11) NOT NULL AUTO_INCREMENT,PRIMARY KEY(COUNTRY_ID),NAME VARCHAR(20) NOT NULL UNIQUE)");

$string = $mysqli_connection->query("INSERT INTO country(COUNTRY_ID,NAME)VALUES('011','JORDAN')");
$string = $mysqli_connection->query("INSERT INTO country(COUNTRY_ID,NAME)VALUES('012','EGYPT')");
$string = $mysqli_connection->query("INSERT INTO country(COUNTRY_ID,NAME)VALUES('013','UGANDA')");
$string = $mysqli_connection->query("INSERT INTO country(COUNTRY_ID,NAME)VALUES('014','CHICAGO')");



$string=$mysqli_connection->query("CREATE TABLE IF NOT EXISTS tourists(TOURIST_ID INT(11) NOT NULL AUTO_INCREMENT,PRIMARY KEY(TOURIST_ID),NAME VARCHAR(20) NOT NULL UNIQUE,EMAIL_ADDRESS VARCHAR(100) NOT NULL UNIQUE)");

$mysqli_connection->query("INSERT INTO tourists(TOURIST_ID,NAME,EMAIL_ADDRESS) VALUES ('01','JONNAH','jonnah@gmail.com')");

$mysqli_connection->query("INSERT INTO tourists(TOURIST_ID,NAME,EMAIL_ADDRESS) VALUES ('02','CHOI','choi@gmail.com')");
$mysqli_connection->query("INSERT INTO tourists(TOURIST_ID,NAME,EMAIL_ADDRESS) VALUES ('03','TANDEKA','tandeka@gmail.com')");
$mysqli_connection->query("INSERT INTO tourists(TOURIST_ID,NAME,EMAIL_ADDRESS) VALUES ('04','BULARI','bulari@gmail.com')");



$string = $mysqli_connection->query("CREATE TABLE  IF NOT EXISTS tourist_attractions(TOURIST_ATTRACTION_ID INT(11) NOT NULL AUTO_INCREMENT,PRIMARY KEY(TOURIST_ATTRACTION_ID),TOURIST_ATTRACTION_NAME VARCHAR(20) NOT NULL,COUNTRY_ID INT(11) NOT NULL,FOREIGN KEY(COUNTRY_ID) REFERENCES country(COUNTRY_ID),PHONE_NUMBER VARCHAR(11) NOT NULL,EMAIL_ADDRESS VARCHAR(100) NOT NULl ,AMOUNT DECIMAL(9,2) NOT NULL )");

$mysqli_connection->query("INSERT INTO tourist_attractions(TOURIST_ATTRACTION_ID,TOURIST_ATTRACTION_NAME,COUNTRY_ID,PHONE_NUMBER,EMAIL_ADDRESS)VALUES('0003','NGAHINGA_NP','013','0800300500','ngahinganp@gmail.com','1200000.00')");
$mysqli_connection->query("INSERT INTO tourist_attractions(TOURIST_ATTRACTION_ID,TOURIST_ATTRACTION_NAME,COUNTRY_ID,PHONE_NUMBER,EMAIL_ADDRESS)VALUES('0004','MTRWENZOZI_NP','014','0800300700','mtrwenzorinp@gmail.com','1300000.00')");
$mysqli_connection->query("INSERT INTO tourist_attractions(TOURIST_ATTRACTION_ID,TOURIST_ATTRACTION_NAME,COUNTRY_ID,PHONE_NUMBER,EMAIL_ADDRESS)VALUES('0006','LAKEMBURO_NP','013','0800300600','lakemburonp@gmail.com','1400000.00')");
$mysqli_connection->query("INSERT INTO tourist_attractions(TOURIST_ATTRACTION_ID,TOURIST_ATTRACTION_NAME,COUNTRY_ID,PHONE_NUMBER,EMAIL_ADDRESS)VALUES('0005','MUCHISIONFALLS_NP','014','0800300700','murchisionfallsnp@gmail.com','1500000.00')");



$string = $mysqli_connection->query("CREATE TABLE  IF NOT EXISTS hotel(HOTEL_ID INT(11)NOT NULL ,HOTEL_NAME VARCHAR(20) NOT NULL UNIQUE,AMOUNT DECIMAL(7,2))");

 $insert = $mysqli_connection->query("INSERT INTO hotel(HOTEL_ID ,HOTEL_NAME,AMOUNT)VALUES('00040','michelle','50000.2')");
 $insert = $mysqli_connection->query("INSERT INTO hotel(HOTEL_ID ,HOTEL_NAME,AMOUNT)VALUES('00041','gardencourts','36000.3')"); 
 $insert = $mysqli_connection->query("INSERT INTO hotel(HOTEL_ID ,HOTEL_NAME,AMOUNT)VALUES('00042','axille','46000.4')");
 $insert = $mysqli_connection->query("INSERT INTO hotel(HOTEL_ID ,HOTEL_NAME,AMOUNT)VALUES('00043','austyn','58000.6')");

$mysqli_connection->query("CREATE TABLE tickets(TICKET_ID INT(11) NOT NULL UNIQUE,TICKET_NAME VARCHAR(20) NOT NULL ,TICKET_AMOUNT DECIMAL(5,2) NOT NULL)");

$mysqli_connection->query("INSERT INTO tickets(TICKET_ID ,TICKET_NAME  ,TICKET_AMOUNT)VALUES('10','MUCHISIONFALLS_NP_TICKET','1500000.00')");
$mysqli_connection->query("INSERT INTO tickets(TICKET_ID ,TICKET_NAME  ,TICKET_AMOUNT)VALUES('11','MTRWENZORI_NP_TICKET','1300000.00')");
$mysqli_connection->query("INSERT INTO tickets(TICKET_ID ,TICKET_NAME  ,TICKET_AMOUNT)VALUES('12','LAKEMBURO_NP_TICKET','1400000.00')");
$mysqli_connection->query("INSERT INTO tickets(TICKET_ID ,TICKET_NAME  ,TICKET_AMOUNT)VALUES('13','NGAHINGA_NP_TICKET','1200000.00')");


if($mysqli_connection){

    echo "SUCCESSFUL";

}else{

    echo "FAILED";
}
