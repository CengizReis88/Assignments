

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
);

 

CREATE TABLE `tasks` (
  `tasks_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `taskname` int(100) NOT NULL,
  `completion` tinyint(15) DEFAULT NULL,
  PRIMARY KEY (`tasks_id`);
  
  CONSTRAINT 'username' FOREIGN KEY ('username') REFERENCES 'users' ('username')
);
