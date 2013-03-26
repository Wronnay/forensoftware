CREATE TABLE IF NOT EXISTS `$PREFIX_designs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `url` varchar(220) NOT NULL,
  `pic` varchar(220) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_designs` (`id`, `name`, `url`, `pic`, `date`) VALUES
(1, 'Standard', 'colors/blue.css.php', 'standard.png', '2013-02-10 00:00:00'),
(2, 'Fall', 'colors/fall.css.php', 'fall.png', '2013-02-10 00:00:00'),
(3, 'Green', 'colors/green.css.php', 'green.png', '2013-02-15 00:00:00'),
(4, 'Red', 'colors/red.css.php', 'red.png', '2013-02-15 00:00:00');
