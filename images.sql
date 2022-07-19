CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
    `image` longblob NOT NULL,
  `created_at` datetime DEFAULT CUR
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  
) ENGINE=InnoDB DEFAULT CHARSET=utf_general_ci;