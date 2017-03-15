use ARS;

INSERT INTO flight_instance (FLIGHT_NUMBER, FLIGHT_DATE, no_avl_seats, AIRPLANE_ID, D_TIME, A_TIME) VALUES
(162, '2015-05-31', 10, 1929, '17:35:00', '20:27:00'),
(199, '2015-05-31', 8, 2010, '07:52:00', '10:36:00'),
(281, '2015-05-31', 16, 3964, '06:04:00', '08:33:00'),
(536, '2015-05-31', 10, 873, '07:59:00', '10:32:00'),
(811, '2015-05-31', 8, 1940, '06:46:00', '08:27:00'),
(1093, '2015-05-31', 8, 899, '11:50:00', '14:23:00'),
(1111, '2015-05-31', 10, 957, '06:34:00', '09:00:00'),
(1182, '2015-05-31', 8, 1988, '17:45:00', '19:26:00'),
(1486, '2015-05-31', 12, 1455, '18:33:00', '21:23:00'),
(1780, '2015-05-31', 14, 2480, '07:12:00', '10:03:00'),
(2419, '2015-05-31', 12, 1377, '17:39:00', '20:05:00'),
(3952, '2015-05-31', 10, 3090, '17:50:00', '19:50:00'),
(4009, '2015-05-31', 10, 979, '12:42:00', '15:08:00'),
(4447, '2015-05-31', 10, 2031, '12:08:00', '14:52:00'),
(4452, '2015-05-31', 12, 2504, '11:24:00', '14:15:00'),
(4495, '2015-05-31', 10, 1967, '12:14:00', '13:55:00'),
(4553, '2015-05-31', 16, 4010, '18:57:00', '21:26:00'),
(5075, '2015-05-31', 12, 1505, '11:22:00', '14:14:00'),
(5222, '2015-05-31', 12, 1473, '07:45:00', '10:37:00'),
(5358, '2015-05-31', 12, 2546, '06:16:00', '08:16:00'),
(5496, '2015-05-31', 12, 1431, '11:38:00', '14:28:00'),
(5817, '2015-05-31', 10, 927, '17:57:00', '20:30:00'),
(6259, '2015-05-31', 8, 3134, '12:29:00', '15:06:00'),
(6273, '2015-05-31', 14, 2517, '18:22:00', '21:13:00'),
(6836, '2015-05-31', 10, 3160, '17:42:00', '20:19:00'),
(7027, '2015-05-31', 12, 1404, '06:51:00', '09:41:00'),
(8835, '2015-05-31', 14, 2448, '18:13:00', '20:57:00'),
(8993, '2015-05-31', 16, 3987, '12:58:00', '15:27:00'),
(9449, '2015-05-31', 8, 3076, '11:51:00', '13:51:00'),
(9851, '2015-05-31', 8, 3111, '06:11:00', '08:48:00');



INSERT INTO seat_reservation (FLIGHT_NUMBER, resv_date, SEAT_NO, CUSTOMER_NAME, CUSTOMER_PHONE) VALUES
(7027, '2015-05-31', 'B4', 'Roy Cunningham', '7-(224)798-9872'),
(7027, '2015-05-31', 'B5', 'Steven Schmidt', '2-(611)614-7244'),
(7027, '2015-05-31', 'B6', 'Kathryn Johnston', '9-(224)200-3456'),
(7027, '2015-05-31', 'B7', 'Betty Peterson', '9-(235)442-3861'),
(8835, '2015-05-31', 'C6', 'Kevin Mcdonald', '3-(679)850-1937'),
(8835, '2015-05-31', 'C7', 'Benjamin Jenkins', '4-(809)277-6698'),
(8835, '2015-05-31', 'C8', 'Phyllis Elliott', '2-(525)192-1140'),
(8835, '2015-05-31', 'C9', 'Paula Ford', '8-(242)740-6864');

insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('162', '2015/05/31', 'K8', 'Jimmy Bowman', '7-(561)638-1921');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('162', '2015/05/31', 'T0', 'James Cunningham', '4-(427)218-7536');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('162', '2015/05/31', 'p8', 'Howard Fox', '7-(711)335-7996');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('162', '2015/05/31', 'G4', 'Phyllis Ward', '0-(384)263-1825');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('199', '2015/05/31', 'f9', 'Laura Ward', '5-(830)674-9865');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('199', '2015/05/31', 'm4', 'Earl Cole', '7-(367)202-3070');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('199', '2015/05/31', 'd0', 'Roger Bennett', '6-(955)324-5062');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('199', '2015/05/31', 'M5', 'John Wells', '4-(027)349-2632');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('281', '2015/05/31', 'f8', 'Thomas Flores', '3-(915)839-4253');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('281', '2015/05/31', 'l9', 'Barbara Austin', '0-(566)050-2391');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('281', '2015/05/31', 't1', 'Keith Hill', '2-(937)904-1802');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('281', '2015/05/31', 'x9', 'Aaron Jackson', '1-(068)465-2912');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('281', '2015/05/31', 's7', 'John Franklin', '3-(608)442-0148');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('281', '2015/05/31', 'a2', 'Eric Simpson', '1-(579)349-6029');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('536', '2015/05/31', 'u5', 'Dorothy Hernandez', '4-(869)314-1745');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('536', '2015/05/31', 'p1', 'Cheryl Morris', '6-(323)612-7697');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('536', '2015/05/31', 'S3', 'Carlos Willis', '4-(428)203-2325');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('536', '2015/05/31', 'g5', 'Janet Warren', '3-(600)202-7786');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('536', '2015/05/31', 'D8', 'Brian Grant', '0-(143)013-1295');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('811', '2015/05/31', 'T1', 'Sarah Webb', '4-(076)583-4337');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('811', '2015/05/31', 'F1', 'Joseph Reyes', '4-(612)455-7546');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1093', '2015/05/31', 'u1', 'Frank Weaver', '5-(308)510-4343');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1093', '2015/05/31', 's4', 'Matthew Holmes', '3-(683)806-3114');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1093', '2015/05/31', 'g5', 'Albert Rodriguez', '5-(850)171-9291');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1093', '2015/05/31', 'Z4', 'Lawrence Hughes', '2-(216)377-9951');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1093', '2015/05/31', 'n4', 'Edward Meyer', '7-(279)521-1720');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1111', '2015/05/31', 'B4', 'Randy Fowler', '3-(409)463-3692');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1111', '2015/05/31', 'g4', 'Jean Peters', '9-(043)506-4240');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1111', '2015/05/31', 'I8', 'Sharon Weaver', '8-(147)584-6999');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1111', '2015/05/31', 'm8', 'David Brown', '2-(205)227-7694');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1182', '2015/05/31', 'V4', 'Virginia Fowler', '5-(503)353-1261');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1182', '2015/05/31', 'b0', 'Lawrence Green', '2-(664)817-7353');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1182', '2015/05/31', 'e4', 'Marie Nichols', '7-(910)208-8761');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1182', '2015/05/31', 'U1', 'Sean Rodriguez', '1-(420)423-0975');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1486', '2015/05/31', 'q9', 'Joan Henderson', '5-(487)124-5690');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1486', '2015/05/31', 'e4', 'Shawn Bailey', '1-(442)397-7558');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1486', '2015/05/31', 'P7', 'Donna Vasquez', '8-(067)073-9651');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1780', '2015/05/31', 'r9', 'Johnny Collins', '5-(838)677-4046');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('1780', '2015/05/31', 'M8', 'Sharon Perez', '0-(280)691-0005');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('2419', '2015/05/31', 'j8', 'Shirley Thompson', '8-(507)523-3878');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('2419', '2015/05/31', 'Q1', 'Rachel Watson', '5-(671)600-4312');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('2419', '2015/05/31', 'D5', 'Pamela Carroll', '5-(456)584-9086');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('2419', '2015/05/31', 'M7', 'Katherine Gray', '6-(459)191-1317');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('2419', '2015/05/31', 'h3', 'Jeremy Fuller', '8-(978)288-7641');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('3952', '2015/05/31', 'Y0', 'Wanda Ramirez', '1-(022)932-8012');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('3952', '2015/05/31', 'q5', 'John Baker', '9-(457)781-0225');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('3952', '2015/05/31', 'n3', 'Frank Wheeler', '4-(342)675-3887');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('4447', '2015/05/31', 'b1', 'Janice Carter', '3-(954)691-2840');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('4447', '2015/05/31', 'B4', 'Wayne Watson', '6-(740)845-9699');
insert into Seat_Reservation (Flight_Number, resv_date, seat_no, Customer_Name, Customer_Phone) values ('4447', '2015/05/31', 'T1', 'Patrick Romero', '3-(814)302-4152');
