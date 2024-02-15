
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` int(128) NOT NULL
)

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

