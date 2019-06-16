-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 16, 2019 la 07:06 PM
-- Versiune server: 10.1.32-MariaDB
-- Versiune PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `anaiddelicia`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Desert'),
(2, 'Salate'),
(3, 'Ciorbe'),
(4, 'Fripturi'),
(5, 'Aperitive'),
(7, 'Garnituri');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `message`, `phone`, `email`) VALUES
(1, 'Alin', 'ma-ta', 'Test ', '0784858343 ', 'alin@asd.com '),
(2, 'Alin', 'ma-ta', 'test ', '0784858343 ', 'alin@asd.com ');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `content_pages`
--

CREATE TABLE `content_pages` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cooking_tips`
--

CREATE TABLE `cooking_tips` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date_from` date NOT NULL,
  `time_from` time NOT NULL,
  `date_to` date NOT NULL,
  `time_to` time NOT NULL,
  `signup_open` tinyint(1) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `details` longtext,
  `id_winner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `events`
--

INSERT INTO `events` (`id`, `name`, `date_from`, `time_from`, `date_to`, `time_to`, `signup_open`, `enabled`, `details`, `id_winner`) VALUES
(1, 'Dansul tocanitei', '2019-06-28', '16:00:00', '2019-06-30', '19:00:00', 1, 1, NULL, 0),
(7, 'Dansul tocanitei 21', '2019-06-27', '12:31:00', '2019-06-27', '21:31:00', 0, 1, 'Instructiuni', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `event_participants`
--

CREATE TABLE `event_participants` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_recipe` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `event_participants`
--

INSERT INTO `event_participants` (`id`, `id_event`, `id_user`, `id_recipe`, `approved`) VALUES
(9, 1, 2, 32, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `event_votes`
--

CREATE TABLE `event_votes` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `id_recipe` int(11) NOT NULL,
  `id_voter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `event_votes`
--

INSERT INTO `event_votes` (`id`, `id_event`, `id_participant`, `id_recipe`, `id_voter`) VALUES
(8, 1, 2, 32, 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `favorite_recipes`
--

CREATE TABLE `favorite_recipes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_recipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `favorite_recipes`
--

INSERT INTO `favorite_recipes` (`id`, `id_user`, `id_recipe`) VALUES
(15, 3, 33);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_recipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `images`
--

INSERT INTO `images` (`id`, `name`, `id_recipe`) VALUES
(7, '5c7af3b3ddf60pexels-photo-769289.jpeg', 28),
(9, '5c7af9c7b7015herbal-tea-herbs-tee-mint-159203.jpeg', 28),
(10, '5c7af9dd41140pexels-photo-1268551.jpeg', 28),
(11, '5c7ba8e2c5746pexels-photo-1095550.jpeg', 28);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_type` varchar(50) NOT NULL,
  `event_date` varchar(12) NOT NULL,
  `servings_no` int(11) NOT NULL,
  `contact_person` varchar(55) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `location_name` varchar(55) NOT NULL,
  `location_address` varchar(55) NOT NULL,
  `details` longtext NOT NULL,
  `appetizer_standard` int(11) DEFAULT NULL,
  `appetizer_custom` longtext,
  `first_type_steak` int(11) NOT NULL,
  `first_type_side_dish` int(11) NOT NULL,
  `first_type_salad` int(11) NOT NULL,
  `second_type` int(11) NOT NULL,
  `desert` int(11) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'asteptare',
  `comments` longtext NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `orders`
--

INSERT INTO `orders` (`id`, `date`, `event_type`, `event_date`, `servings_no`, `contact_person`, `phone`, `location_name`, `location_address`, `details`, `appetizer_standard`, `appetizer_custom`, `first_type_steak`, `first_type_side_dish`, `first_type_salad`, `second_type`, `desert`, `status`, `comments`, `id_user`) VALUES
(1, '2019-05-23 21:03:15', 'Zi de Nastere', '2019-05-31', 34, 'Alina', '08574856844', 'Acolo', 'dincolor, nr. 12', '', 31, '', 32, 33, 34, 30, 35, 'asteptare', 'Detaliis', 3),
(2, '2019-06-01 13:57:33', 'Nunta', '2019-07-06', 250, 'Ioan', '07873848540', 'Frumosu', 'Str. Principala, nr. 21', 'Detalii', 31, 'Discutam ulterior', 32, 33, 34, 30, 29, 'asteptare', '', 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `order_messages`
--

CREATE TABLE `order_messages` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `order_messages`
--

INSERT INTO `order_messages` (`id`, `id_order`, `id_user`, `message`, `date`, `seen`) VALUES
(1, 1, 2, 'test', '2019-06-01 12:43:12', 0),
(2, 1, 3, 'test', '2019-06-01 12:43:12', 0),
(3, 1, 3, ' un fapt bine stabilit c? cititorul va fi sustras de con?inutul citibil al unei pagini atunci când se uit? la a?ezarea în pagin?. Scopul ut', '2019-06-01 13:02:21', 0),
(4, 1, 2, 'test', '2019-06-01 16:42:20', 0),
(5, 1, 2, 'what do you say about it?', '2019-06-01 16:42:46', 0),
(6, 1, 2, 'test', '2019-06-01 16:47:00', 0),
(7, 1, 2, 'asdadasd', '2019-06-01 16:47:49', 0),
(8, 1, 2, 'asdasd', '2019-06-01 16:48:14', 0),
(9, 1, 3, 'other test', '2019-06-01 17:05:25', 0),
(10, 1, 3, 'another test', '2019-06-01 17:08:24', 0),
(11, 1, 2, 'let\'s write something so we can test again.', '2019-06-01 17:15:09', 0),
(12, 1, 2, 'hkjh uh khu', '2019-06-01 17:58:03', 0),
(13, 1, 2, 'salut', '2019-06-01 18:28:32', 0),
(14, 1, 3, 'salut', '2019-06-01 18:28:40', 0),
(15, 1, 2, 'cum stai eventul?', '2019-06-01 18:29:04', 0),
(16, 1, 3, 'na, nu prea bine...', '2019-06-01 18:29:18', 0),
(17, 1, 3, 'nu prea am chef de el :D', '2019-06-01 18:29:36', 0),
(18, 1, 3, 'sdfsdfsdfdsdf', '2019-06-01 19:04:58', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `directions` longtext NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_region` int(11) DEFAULT NULL,
  `ingredients` longtext NOT NULL,
  `cooking_time` varchar(25) NOT NULL,
  `complexity` varchar(10) NOT NULL,
  `servings_no` int(11) NOT NULL,
  `de_post` tinyint(1) NOT NULL,
  `image` text,
  `video` text,
  `status` varchar(20) NOT NULL DEFAULT 'asteptare'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `description`, `directions`, `id_user`, `id_category`, `id_region`, `ingredients`, `cooking_time`, `complexity`, `servings_no`, `de_post`, `image`, `video`, `status`) VALUES
(28, 'salata de fructe', 'Iï¿½ve been making variations of this salad for years. I recently learned how to massage the kale and it makes a huge difference. I had a friend ask for my recipe and I realized I donï¿½t have one. This is my first attempt at writing a recipe, so please let me know how it works out! I like to change up the ingredients: sometimes a pear instead of an apple, cranberries instead of currants, Parmesan instead of feta, etc. Great as a side dish or by itself the next day for lunch!', 'Step 1\r\nPlace the eggs, milk, water, melted butter, flour, and salt in the pitcher of a blender; blend until smooth.\r\n\r\nStep 2\r\nHeat a lightly oiled griddle or non-stick skillet over medium heat. Pour or scoop the batter onto the griddle, using approximately 2 tablespoons for each crepe. Tip and rotate pan to spread batter as thinly as possible. Flip over when the batter is set and the edges are beginning to brown. Cook until the other side begins to brown. Stack finished crepes on a plate, cover with a damp towel and set aside.\r\n\r\nStep 3\r\nBlend the cream cheese, confectionersï¿½ sugar, lemon juice, lemon zest, and vanilla with an electric mixer until smooth. Gently fold in the whipped cream.\r\n\r\nStep 4\r\nTo serve, fill each crepe with 1/4 cup sliced strawberries and 1/3 cup of the cream cheese filling, roll up and top with a small dollop of the cream cheese filling and more sliced strawberries.', 2, 3, 4, '3 eggs\r\n1/2 cup milk\r\n1/2 cup water\r\n3 tablespoons butter, melted\r\n3/4 cup all-purpose flour\r\n1/2 teaspoon salt\r\n1 (8 ounce) package cream cheese, softened\r\n1 1/4 cups sifted confectioners\' sugar\r\n1 tablespoon lemon juice\r\n1 teaspoon lemon zest\r\n1/2 teaspoon vanilla extract\r\n1 cup heavy cream, whipped\r\n4 cups sliced strawberries', '1 ora', 'usor', 1, 0, '5c77132fdb368pexels-photo-1266003.jpeg', '8FnePi55DS8', 'refuzat'),
(29, 'Salata de fructe', 'I\'ve been making variations of this salad for years. I recently learned how to massage the kale and it makes a huge difference. I had a friend ask for my recipe and I realized I don\'t have one. This is my first attempt at writing a recipe, so please let me know how it works out! I like to change up the ingredients: sometimes a pear instead of an apple, cranberries instead of currants, Parmesan instead of feta, etc. Great as a side dish or by itself the next day for lunch!', 'Step 1\r\nPlace the eggs, milk, water, melted butter, flour, and salt in the pitcher of a blender; blend until smooth.\r\n\r\nStep 2\r\nHeat a lightly oiled griddle or non-stick skillet over medium heat. Pour or scoop the batter onto the griddle, using approximately 2 tablespoons for each crepe. Tip and rotate pan to spread batter as thinly as possible. Flip over when the batter is set and the edges are beginning to brown. Cook until the other side begins to brown. Stack finished crepes on a plate, cover with a damp towel and set aside.\r\n\r\nStep 3\r\nBlend the cream cheese, confectionersï¿½ sugar, lemon juice, lemon zest, and vanilla with an electric mixer until smooth. Gently fold in the whipped cream.\r\n\r\nStep 4\r\nTo serve, fill each crepe with 1/4 cup sliced strawberries and 1/3 cup of the cream cheese filling, roll up and top with a small dollop of the cream cheese filling and more sliced strawberries.', 2, 1, 0, '3 eggs\r\n1/2 cup milk\r\n1/2 cup water\r\n3 tablespoons butter, melted\r\n3/4 cup all-purpose flour\r\n1/2 teaspoon salt\r\n1 (8 ounce) package cream cheese, softened\r\n1 1/4 cups sifted confectioners\' sugar\r\n1 tablespoon lemon juice\r\n1 teaspoon lemon zest\r\n1/2 teaspoon vanilla extract\r\n1 cup heavy cream, whipped\r\n4 cups sliced strawberries', '1 ora', 'usor', 1, 0, '5c7c2cc07375bpexels-photo-1266003.jpeg', '8FnePi55DS8', 'aprobat'),
(30, 'Bla', 'Iï¿½ve been making variations of this salad for years. I recently learned how to massage the kale and it makes a huge difference. I had a friend ask for my recipe and I realized I donï¿½t have one. This is my first attempt at writing a recipe, so please let me know how it works out! I like to change up the ingredients: sometimes a pear instead of an apple, cranberries instead of currants, Parmesan instead of feta, etc. Great as a side dish or by itself the next day for lunch!', 'Step 1\r\nPlace the eggs, milk, water, melted butter, flour, and salt in the pitcher of a blender; blend until smooth.\r\n\r\nStep 2\r\nHeat a lightly oiled griddle or non-stick skillet over medium heat. Pour or scoop the batter onto the griddle, using approximately 2 tablespoons for each crepe. Tip and rotate pan to spread batter as thinly as possible. Flip over when the batter is set and the edges are beginning to brown. Cook until the other side begins to brown. Stack finished crepes on a plate, cover with a damp towel and set aside.\r\n\r\nStep 3\r\nBlend the cream cheese, confectionersï¿½ sugar, lemon juice, lemon zest, and vanilla with an electric mixer until smooth. Gently fold in the whipped cream.\r\n\r\nStep 4\r\nTo serve, fill each crepe with 1/4 cup sliced strawberries and 1/3 cup of the cream cheese filling, roll up and top with a small dollop of the cream cheese filling and more sliced strawberries.', 2, 3, 0, '3 eggs\r\n1/2 cup milk\r\n1/2 cup water\r\n3 tablespoons butter, melted\r\n3/4 cup all-purpose flour\r\n1/2 teaspoon salt\r\n1 (8 ounce) package cream cheese, softened\r\n1 1/4 cups sifted confectioners\' sugar\r\n1 tablespoon lemon juice\r\n1 teaspoon lemon zest\r\n1/2 teaspoon vanilla extract\r\n1 cup heavy cream, whipped\r\n4 cups sliced strawberries', '1 ora', 'usor', 1, 0, '5c77132fdb368pexels-photo-1266003.jpeg', '8FnePi55DS8', 'aprobat'),
(31, 'Aperitiv Standard', 'Aperitiv standard pentru zile festive', 'Pasul 1:\r\nLe tai pe toate bucati\r\n\r\nPasul 2:\r\nLe arunci asa la misto in farfurie\r\n\r\nPasul 3:\r\nNu mai stiu ca nu mananc.', 2, 5, 1, 'Salam\r\nSunca\r\nMasline\r\nRosii\r\nMuschi file\r\nChec Aperitiv\r\nBranza\r\nCascaval\r\nTelemea', '30 Minute', 'usor', 1, 0, '', '', 'asteptare'),
(32, 'Friptura de Porc', 'Some lorem ipsum', 'Pas1:\r\nLorem Ipsum\r\n\r\nPas2:\r\nLorem ipsum 2', 2, 4, 0, 'Carne de porc\r\nCondimente\r\nMustar,\r\nKetchup', '1 ora', 'mediu', 5, 0, '5ce6d7a782348baked-baker-ball-shaped-745988.jpg', '', 'aprobat'),
(33, 'Piure', 'Some lorem ipsum', 'Pas1:\r\nLorem Ipsum\r\n\r\nPas2:\r\nLorem ipsum 2', 2, 7, 0, 'Cartofi\r\nSare,\r\nSmantana', '1 ora', 'usor', 5, 0, '5ce6d7f5a0d685cbc28df4af1a131812.jpg', '', 'aprobat'),
(34, 'Salata de varza', 'Some lorem ipsum', 'Pas1:\r\nLorem Ipsum\r\n\r\nPas2:\r\nLorem ipsum 2', 2, 2, 0, 'Varza\r\nUlei\r\nSare\r\nPiper\r\nOtet', '20 minute', 'usor', 5, 1, '5ce6d84b06fedbake-baking-bread-209291.jpg', '', 'aprobat'),
(35, 'Ingheta', 'Some lorem ipsum', 'Pas1:\r\nLorem Ipsum\r\n\r\nPas2:\r\nLorem ipsum 2', 2, 1, 0, 'Vanilie\r\nLapte\r\nCrema\r\nCiocolata', '1.5 Ore', 'mediu', 5, 0, '5ce6d8ad6b2f3logo.png', '', 'aprobat');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `regions`
--

INSERT INTO `regions` (`id`, `name`) VALUES
(1, 'Moldova'),
(2, 'Transilvania'),
(3, 'Bucovina'),
(4, 'Banat'),
(5, 'Oltenia'),
(6, 'Muntenia');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `social_facebook` text,
  `social_instagram` text,
  `social_linkedin` text,
  `social_youtube` text,
  `description` longtext,
  `image` varchar(255) NOT NULL DEFAULT 'anaiddelicia_923455_blank.png',
  `rights` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `register_date`, `social_facebook`, `social_instagram`, `social_linkedin`, `social_youtube`, `description`, `image`, `rights`) VALUES
(2, 'Alin', 'alin@alin.com', '$2y$10$H.gzfhUjlJ3lsyhZeXmjze.4Z05TNldT4bz3.ljYyLmyDUcIzNuC6', '2019-02-21 15:52:11', '', '', '', '', '', 'anaiddelicia_923455_blank.png', 'admin'),
(3, 'AlinDoi', 'alin2@alin.com', '$2y$10$PHn7QN0OBYJFXYeNt.If.OsV49VHAvNfpqap4A0oFZv0B5reQodhW', '2019-03-03 20:15:52', NULL, NULL, NULL, NULL, NULL, 'anaiddelicia_923455_blank.png', NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `content_pages`
--
ALTER TABLE `content_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `cooking_tips`
--
ALTER TABLE `cooking_tips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_cooking_tips` (`id_user`);

--
-- Indexuri pentru tabele `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `event_votes`
--
ALTER TABLE `event_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `favorite_recipes`
--
ALTER TABLE `favorite_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_favorite_recipe` (`id_user`),
  ADD KEY `fk_favorite_recipe_recipe` (`id_recipe`);

--
-- Indexuri pentru tabele `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_recipe` (`id_recipe`);

--
-- Indexuri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `order_messages`
--
ALTER TABLE `order_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_recipe` (`id_user`),
  ADD KEY `fk_region_recipe` (`id_region`),
  ADD KEY `fk_categories_recipe` (`id_category`) USING BTREE,
  ADD KEY `id_region` (`id_region`) USING BTREE;

--
-- Indexuri pentru tabele `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `content_pages`
--
ALTER TABLE `content_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `cooking_tips`
--
ALTER TABLE `cooking_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `event_votes`
--
ALTER TABLE `event_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `favorite_recipes`
--
ALTER TABLE `favorite_recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pentru tabele `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pentru tabele `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `order_messages`
--
ALTER TABLE `order_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pentru tabele `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pentru tabele `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
