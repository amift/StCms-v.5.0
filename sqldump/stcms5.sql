-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 20 2016 г., 18:32
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `stcms5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text,
  `name` text NOT NULL,
  `title` text,
  `description` text,
  `keywords` text,
  `summary` text,
  `content` text,
  `is_published` int(11) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL DEFAULT '0',
  `updated` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `slug`, `name`, `title`, `description`, `keywords`, `summary`, `content`, `is_published`, `created`, `updated`, `views`) VALUES
(4, 'ophviamwydi', 'Тестовая статья', '', '', '', '', '', 1, 1458056960, 1458471698, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text,
  `name` text NOT NULL,
  `title` text,
  `description` text,
  `keywords` text,
  `summary` text,
  `content` text,
  `is_published` int(11) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL DEFAULT '0',
  `updated` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `slug`, `name`, `title`, `description`, `keywords`, `summary`, `content`, `is_published`, `created`, `updated`, `parent_id`, `views`) VALUES
(1, 'main', 'Главный элемент', '', '', '', '', '', 1, 1457626194, 1457628284, 0, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `imagesarticles`
--

CREATE TABLE IF NOT EXISTS `imagesarticles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `title` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `imagescatalog`
--

CREATE TABLE IF NOT EXISTS `imagescatalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `title` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `imagesnews`
--

CREATE TABLE IF NOT EXISTS `imagesnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `title` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `imagespages`
--

CREATE TABLE IF NOT EXISTS `imagespages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `title` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `imagesproducts`
--

CREATE TABLE IF NOT EXISTS `imagesproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `title` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `imagesusers`
--

CREATE TABLE IF NOT EXISTS `imagesusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `title` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text,
  `name` text NOT NULL,
  `title` text,
  `description` text,
  `keywords` text,
  `summary` text,
  `content` text,
  `is_published` int(11) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL DEFAULT '0',
  `updated` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `slug`, `name`, `title`, `description`, `keywords`, `summary`, `content`, `is_published`, `created`, `updated`, `views`) VALUES
(2, 'aldklwrusek', 'Тестовая новость', 'Тестовая новость', 'Тестовая новость', 'Тестовая новость', 'Тестовая новость', 'Тестовая новость', 1, 1457966387, 1457966391, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(300) DEFAULT NULL,
  `name` text NOT NULL,
  `title` text,
  `description` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `summary` text,
  `content` text,
  `is_published` int(11) NOT NULL DEFAULT '1',
  `is_menu` int(11) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL DEFAULT '0',
  `updated` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `slug`, `name`, `title`, `description`, `keywords`, `summary`, `content`, `is_published`, `is_menu`, `created`, `updated`, `views`, `parent_id`, `type`) VALUES
(1, 'main', 'Главная страница', 'Главная страница', 'Главная страница', 'Главная страница', 'Главная страница summary', 'Главная страница content', 1, 0, 1455389920, 1457419532, 173, 0, 'main'),
(3, 'kbshcapnctj', 'Текстовая страница', '', '', '', 'Текстовая страница summary', '', 1, 1, 1455438951, 1458487429, 267, 1, 'text'),
(4, 'xxhucelmsry', 'Каталожная страница', '', '', '', 'Каталожная страница summary', '', 1, 1, 1458054370, 1458487446, 227, 1, 'cats'),
(5, 'rixwopdehqc', 'Пользовательская страница', '', '', '', 'Пользовательская страница  summary', '', 1, 1, 1458054398, 1458487459, 114, 1, 'users'),
(6, 'nvptmlcesnc', 'Новостная страница', '', '', '', 'Новостная страница  summary', '', 1, 1, 1458054421, 1458487470, 103, 1, 'news'),
(7, 'osgokmcrqsi', 'Статейная страница', '', '', '', 'Статейная страница  summary', '', 1, 1, 1458412935, 1458487480, 176, 1, 'articles');

-- --------------------------------------------------------

--
-- Структура таблицы `pagetypes`
--

CREATE TABLE IF NOT EXISTS `pagetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `pagetypes`
--

INSERT INTO `pagetypes` (`id`, `ident`, `name`, `status`) VALUES
(1, 'main', 'Главная страница', 1),
(2, 'text', 'Текстовая страница', 1),
(3, 'users', 'Страница пользователей', 1),
(4, 'cats', 'Страница категорий', 1),
(5, 'news', 'Страница новостей', 1),
(6, 'articles', 'Страница статей', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text,
  `name` text NOT NULL,
  `title` text,
  `description` text,
  `keywords` text,
  `summary` text,
  `content` text,
  `current_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `old_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_published` int(11) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL DEFAULT '0',
  `updated` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text,
  `lastname` text,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `views` int(11) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `status`, `role`, `views`, `created`) VALUES
(2, 'Администратор', 'WebMaster', 'admin@admin.ru', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
