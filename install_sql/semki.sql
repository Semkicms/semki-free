-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 24 2016 г., 14:00
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `semki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blocs`
--

CREATE TABLE `blocs` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `id_row` int(11) NOT NULL COMMENT 'id строки',
  `b_position` int(11) NOT NULL COMMENT 'позиция в ROW',
  `col_width` int(3) NOT NULL COMMENT 'ширина колонки - бутстрап',
  `image` text NOT NULL,
  `publish` tinyint(1) NOT NULL COMMENT 'публикация материала',
  `attach_form_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blocs`
--

INSERT INTO `blocs` (`b_id`, `b_title`, `text`, `id_row`, `b_position`, `col_width`, `image`, `publish`, `attach_form_id`) VALUES
(207, '', '', 58, 1, 4, 'summer-logo3.jpg', 0, '57b36c868bca4'),
(208, '', '', 58, 12, 4, '', 0, ''),
(209, '', '', 58, 0, 4, '', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `correspondence`
--

CREATE TABLE `correspondence` (
  `corr_id` int(11) NOT NULL,
  `form_id` varchar(44) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `correspondence`
--

INSERT INTO `correspondence` (`corr_id`, `form_id`, `post_time`, `user_ip`) VALUES
(112, '57b36c868bca4', '2016-08-24 11:34:29', '127.0.0.1'),
(113, '57b36c868bca4', '2016-08-24 11:38:19', '127.0.0.1'),
(114, '57b36c868bca4', '2016-08-24 11:39:11', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `correspondence_fields`
--

CREATE TABLE `correspondence_fields` (
  `id` int(11) NOT NULL,
  `field_id` text NOT NULL,
  `field_value` text NOT NULL,
  `reff_id` int(11) NOT NULL COMMENT 'номер письма (связь с полем corr_id из таблицы correspondence_forms) '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `correspondence_fields`
--

INSERT INTO `correspondence_fields` (`id`, `field_id`, `field_value`, `reff_id`) VALUES
(523, 'label_97', 'Ваше имя', 112),
(524, '97', 'kkk', 112),
(525, 'label_98', 'Ваше Email', 112),
(526, '98', 'ddddd099@mail.ru', 112),
(527, 'label_99', 'Ваш телефон', 112),
(528, '99', '', 112),
(529, 'label_100', 'Сообщение', 112),
(530, '100', 'j.bk', 112),
(531, 'label_97', 'Ваше имя', 113),
(532, '97', 'оддод', 113),
(533, 'label_98', 'Ваше Email', 113),
(534, '98', 'ddddd099@mail.ru', 113),
(535, 'label_99', 'Ваш телефон', 113),
(536, '99', '', 113),
(537, 'label_100', 'Сообщение', 113),
(538, '100', 'hh', 113),
(539, 'label_97', 'Ваше имя', 114),
(540, '97', 'kkmk', 114),
(541, 'label_98', 'Ваше Email', 114),
(542, '98', 'ddddd099@mail.ru', 114),
(543, 'label_99', 'Ваш телефон', 114),
(544, '99', '', 114),
(545, 'label_100', 'Сообщение', 114),
(546, '100', 'lknknl', 114);

-- --------------------------------------------------------

--
-- Структура таблицы `forms_id`
--

CREATE TABLE `forms_id` (
  `f_form_id` varchar(40) NOT NULL,
  `f_form_name` varchar(50) NOT NULL,
  `button` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `forms_id`
--

INSERT INTO `forms_id` (`f_form_id`, `f_form_name`, `button`) VALUES
('57b36c868bca4', 'Стандартная форма', 'Отправить');

-- --------------------------------------------------------

--
-- Структура таблицы `forms_status`
--

CREATE TABLE `forms_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `forms_status`
--

INSERT INTO `forms_status` (`id`, `name`) VALUES
(1, 'Новая'),
(2, 'Одобрена'),
(3, 'На обработке'),
(4, 'Обработана'),
(5, 'Отклонена');

-- --------------------------------------------------------

--
-- Структура таблицы `form_fields`
--

CREATE TABLE `form_fields` (
  `field_id` int(11) NOT NULL,
  `field_type` varchar(220) NOT NULL,
  `form_id` varchar(44) NOT NULL,
  `field_label` text NOT NULL,
  `veight` int(3) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `placeholder` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `form_fields`
--

INSERT INTO `form_fields` (`field_id`, `field_type`, `form_id`, `field_label`, `veight`, `required`, `placeholder`) VALUES
(97, 'text', '57b36c868bca4', 'Ваше имя', 0, 1, ''),
(98, 'email', '57b36c868bca4', 'Ваше Email', 1, 1, ''),
(99, 'text', '57b36c868bca4', 'Ваш телефон', 2, 0, ''),
(100, 'textarea', '57b36c868bca4', 'Сообщение', 3, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Структура таблицы `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `li_name` varchar(64) NOT NULL,
  `veight` int(2) NOT NULL,
  `visible` int(1) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `rows`
--

CREATE TABLE `rows` (
  `r_id` int(3) NOT NULL,
  `title` varchar(128) NOT NULL,
  `r_position` int(3) NOT NULL COMMENT 'номер строки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rows`
--

INSERT INTO `rows` (`r_id`, `title`, `r_position`) VALUES
(58, 'test', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `sitename` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `adress` text NOT NULL,
  `yandex_metrika` text NOT NULL,
  `description` text NOT NULL,
  `google_analytics` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`sitename`, `email`, `phone`, `adress`, `yandex_metrika`, `description`, `google_analytics`) VALUES
('Semki CMS', 'semki.org.ua@gmail.com', 'Phone', 'Adress', '<!-- yandex_metrika -->', 'Semci CMS - создание Landing Page', '<!-- google_analytics -->');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$t8krn65oefQ3giEJKMVXg.qrmogodO5BU4i7RTs/5Kc731T4Escy2', '', 'semki.org.ua@gmail.com', '', NULL, NULL, '3jn5I5SFR0NPtPlyL6nE2e', 1268889823, 1472028191, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(11, 1, 1),
(12, 1, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blocs`
--
ALTER TABLE `blocs`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `id_row` (`id_row`),
  ADD KEY `id_row_2` (`id_row`);

--
-- Индексы таблицы `correspondence`
--
ALTER TABLE `correspondence`
  ADD PRIMARY KEY (`corr_id`);

--
-- Индексы таблицы `correspondence_fields`
--
ALTER TABLE `correspondence_fields`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forms_id`
--
ALTER TABLE `forms_id`
  ADD PRIMARY KEY (`f_form_id`);

--
-- Индексы таблицы `forms_status`
--
ALTER TABLE `forms_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rows`
--
ALTER TABLE `rows`
  ADD PRIMARY KEY (`r_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blocs`
--
ALTER TABLE `blocs`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT для таблицы `correspondence`
--
ALTER TABLE `correspondence`
  MODIFY `corr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT для таблицы `correspondence_fields`
--
ALTER TABLE `correspondence_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=547;
--
-- AUTO_INCREMENT для таблицы `forms_status`
--
ALTER TABLE `forms_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `rows`
--
ALTER TABLE `rows`
  MODIFY `r_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blocs`
--
ALTER TABLE `blocs`
  ADD CONSTRAINT `blocs_ibfk_1` FOREIGN KEY (`id_row`) REFERENCES `rows` (`r_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
