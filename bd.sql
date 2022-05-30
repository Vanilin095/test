CREATE TABLE `users` (
	  `id` int(11) NOT NULL,
	  `login` varchar(255) NOT NULL,
	  `pass` varchar(255) NOT NULL,
	  `email` varchar(255) NOT NULL,
	  `fio` varchar(255) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;