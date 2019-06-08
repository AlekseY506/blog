-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2019 г., 16:39
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `arhive` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `arhive`) VALUES
(1, 'Автомобили', 0),
(2, 'Кошки', 0),
(3, 'Природа', 0),
(5, 'Тигры', 0),
(6, 'море', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `message`, `name`, `avatar`, `email`, `data`, `post_id`) VALUES
(6, 'test test test test test test test test', 'ssss', NULL, 'dom@dom.reyetz', '2019-06-05 12:20:33', 4),
(2, 'классная статья', 'admin', NULL, 'qqq@qqq.qq', '2019-06-03 14:56:14', 6),
(3, 'Все очень круто.))', 'irina', NULL, 'ibankirova@gmail.com', '2019-06-03 15:43:55', 5),
(4, 'test', 'qwerty', NULL, 'bankirovaleksey@gmail.com', '2019-06-05 11:58:17', 1),
(5, 'qwdwefexf rqfr fr refer', 'admin', NULL, 'bankirov@gmail.com', '2019-06-05 11:58:43', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_category` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `title`, `description`, `id_category`, `user_name`, `link`) VALUES
(8, 'ан - 127', 'железная птица', 'Небо', 'Admin', '../public/front/images/posts/5ceee416c0cb99.79815080_qkpfiojghmlen.jpeg'),
(7, 'мурка', 'моя кошечка', 'Животные', 'Admin', '../public/front/images/posts/5ceee37b69bc76.89528321_jelpqnohkgifm.jpeg'),
(6, 'на краю света', 'вечером после работы холодненький карлсберг', 'Небо', 'Admin', '../public/front/images/posts/5ceedf9e94aa74.09290184_hqegpofkijlmn.jpeg'),
(9, 'мурка', 'укпук п', 'Животные', 'Admin', '../public/front/images/posts/5cf16466913fc3.35093846_fohqmelgnkjip.jpeg'),
(10, 'тестовая запись', 'ПК', 'Компьютеры', 'Admin', '../public/front/images/posts/5cf27940dfa062.55762995_lpimfohejqgnk.jpeg'),
(11, '1', 'фывфыв', 'Животные', 'Иришка', 'jpeg'),
(12, '1', 'вйцвйц', 'Города', 'Иришка', 'jpeg'),
(13, '1jpeg', 'jkhou', 'Города', 'Иришка', 'jpeg'),
(14, '1.jpeg', 'ewfewf', 'Города', 'Иришка', '/public/front/images/post/1.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(4) NOT NULL,
  `category` varchar(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `author` varchar(30) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `like` int(10) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `archive` varchar(3) NOT NULL DEFAULT 'off',
  `активный` varchar(3) NOT NULL DEFAULT 'off'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `desc`, `text`, `photo`, `author`, `data`, `like`, `view`, `meta_key`, `meta_desc`, `archive`, `активный`) VALUES
(1, 'Животные', 'тестовая запись', '', 'кот трахает мурку', '1.jpeg', 'Admin', '2019-06-02 21:15:31', 0, 35, NULL, NULL, 'off', 'off'),
(2, 'Компьютеры', 'oop', '', '<p><b>Объе́ктно-ориенти́рованное программи́рование (ООП)</b>&#160;— методология программирования, основанная на представлении программы в виде совокупности <a href=\"\" title=\"Объект (программирование)\">объектов</a>, каждый из которых является экземпляром определённого <a href=\"\" title=\"Класс (программирование)\">класса</a>, а классы образуют иерархию наследования<sup id=\"cite_ref-_ce7b104dbaa5d933_1-0\" class=\"reference\"><a href=\"#cite_note-_ce7b104dbaa5d933-1\">&#91;1&#93;</a></sup>.\r\n</p><p>Идеологически ООП&#160;— подход к программированию как к моделированию информационных объектов, решающий на новом уровне основную задачу <a href=\"\" title=\"Структурное программирование\">структурного программирования</a>: структурирование информации с точки зрения управляемости<sup id=\"cite_ref-2\" class=\"reference\"><a href=\"#cite_note-2\">&#91;2&#93;</a></sup>, что существенно улучшает управляемость самим процессом моделирования, что, в свою очередь, особенно важно при реализации крупных проектов.\r\n</p><p>Управляемость для иерархических систем предполагает минимизацию избыточности данных (аналогичную <a href=\"\" title=\"Нормальная форма\">нормализации</a>) и их целостность, поэтому созданное удобно управляемым&#160;— будет и удобно пониматься. Таким образом, через тактическую задачу управляемости решается стратегическая задача&#160;— транслировать понимание задачи программистом в наиболее удобную для дальнейшего использования форму.\r\n</p><p>Основные <a href=\"\" title=\"Принцип\">принципы</a> структурирования в случае ООП связаны с различными аспектами базового понимания предметной задачи, которое требуется для оптимального управления соответствующей моделью:\r\n</p>\r\n<ul><li><a href=\"\" title=\"Абстракция данных\">абстрагирование</a> для выделения в моделируемом предмете важного для решения конкретной задачи по предмету, в конечном счёте&#160;— контекстное понимание предмета, формализуемое в виде класса;</li>\r\n<li><a href=\"\" title=\"Инкапсуляция (программирование)\">инкапсуляция</a> для быстрой и безопасной организации собственно иерархической управляемости: чтобы было достаточно простой команды «что делать», без одновременного уточнения как именно делать, так как это уже другой уровень управления;</li>\r\n<li><a href=\"\" title=\"Наследование (программирование)\">наследование</a> для быстрой и безопасной организации родственных понятий: чтобы было достаточно на каждом иерархическом шаге учитывать только изменения, не дублируя всё остальное, учтённое на предыдущих шагах;</li>\r\n<li><a href=\"\" title=\"Полиморфизм (информатика)\">полиморфизм</a> для определения точки, в которой единое управление лучше распараллелить или наоборот&#160;— собрать воедино.</li></ul>\r\n<p>То есть фактически речь идёт о прогрессирующей организации информации согласно первичным семантическим критериям: «важное/неважное», «ключевое/подробности», «родительское/дочернее», «единое/множественное». Прогрессирование, в частности, на последнем этапе даёт возможность перехода на следующий уровень детализации, что замыкает общий процесс.\r\n</p><p>Обычный человеческий язык в целом отражает идеологию ООП, начиная с инкапсуляции представления о предмете в виде его имени и заканчивая полиморфизмом использования слова в переносном смысле, что в итоге развивает<sup id=\"cite_ref-3\" class=\"reference\"><a href=\"#cite_note-3\">&#91;3&#93;</a></sup> выражение представления через имя предмета до полноценного понятия-класса.<br /><br />\r\n</p>', '2.jpeg', 'Admin', '2019-06-02 21:26:02', 0, 18, NULL, NULL, 'off', 'off'),
(3, 'Компьютеры', 'tester', '', 'upps', '3.jpeg', 'Admin', '2019-06-02 21:27:19', 0, 2, NULL, NULL, 'on', 'off'),
(4, 'Компьютеры', 'Блог', '', '<p><b>Блог</b> (<a href=\"\" title=\"Английский язык\">англ.</a>&#160;<span lang=\"en\" style=\"font-style:italic;\">blog</span>, от <span lang=\"en\" style=\"font-style:italic;\">we<b>b log</b></span>&#160;— <a href=\"\" title=\"Интернет\">интернет</a>-журнал событий, интернет-дневник, онлайн-дневник)&#160;— веб-<a href=\"\" title=\"Сайт\">сайт</a>, основное содержимое которого&#160;— регулярно добавляемые записи, содержащие текст, изображения или <a href=\"\" title=\"Мультимедиа\">мультимедиа</a>.\r\n</p><p>Людей, ведущих блог, называют бло́герами<sup id=\"cite_ref-1\" class=\"reference\"><a href=\"#cite_note-1\">&#91;1&#93;</a></sup><sup id=\"cite_ref-2\" class=\"reference\"><a href=\"#cite_note-2\">&#91;2&#93;</a></sup>. Совокупность всех блогов <a href=\"\" title=\"Интернет\">Сети</a> принято называть <a href=\"\" title=\"Блогосфера\">блогосферой</a>.\r\n</p><p>Для блогов характерна возможность публикации <a href=\"\" title=\"Рецензия\">отзывов</a> (<a href=\"\" class=\"new\" title=\"Запись (сообщение) (страница отсутствует)\">комментариев</a>) посетителями. Она делает блоги средой <a href=\"\" title=\"Сетевое общение (страница отсутствует)\">сетевого общения</a>, имеющей ряд преимуществ перед <a href=\"/wiki/%D0%AD%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%BD%D0%BD%D0%B0%D1%8F_%D0%BF%D0%BE%D1%87%D1%82%D0%B0\" title=\"Электронная почта\">электронной почтой</a>, <a href=\"/wiki/Usenet\" title=\"Usenet\">группами новостей</a> и <a href=\"/wiki/%D0%A7%D0%B0%D1%82_(%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B0)\" title=\"Чат (программа)\">чатами</a>.\r\n</p><p>Первым блогом считается страница <a href=\"/wiki/%D0%A2%D0%B8%D0%BC_%D0%91%D0%B5%D1%80%D0%BD%D0%B5%D1%80%D1%81-%D0%9B%D0%B8\" class=\"mw-redirect\" title=\"Тим Бернерс-Ли\">Тима Бернерса-Ли</a>, где он, начиная с 1992&#160;г., публиковал новости. Более широкое распространение блоги получили с 1996&#160;г. В августе 1999&#160;г. компьютерная компания Pyra Labs из Сан-Франциско открыла сайт Blogger.com, который стал первой бесплатной блоговой службой.\r\n</p><p>В настоящее время особенность блогов заключается не только в структуре записей, но и в <a href=\"/wiki/%D0%AE%D0%B7%D0%B0%D0%B1%D0%B8%D0%BB%D0%B8%D1%82%D0%B8\" title=\"Юзабилити\">простоте добавления</a> новых записей. Пользователь просто обращается к <a href=\"/wiki/%D0%92%D0%B5%D0%B1-%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80\" title=\"Веб-сервер\">веб-серверу</a>, проходит процесс идентификации пользователя, после чего он добавляет новую запись к своей коллекции. Сервер представляет информацию как последовательность сообщений, помещая в самом верху самые свежие сообщения. Структура коллекции напоминает привычную последовательную структуру дневника или журнала.\r\n</p>', '4.jpg', 'Admin', '2019-06-02 22:22:35', 0, 54, NULL, NULL, 'off', 'off'),
(5, 'Компьютеры', 'Интернет-магазин', '', '<p><b>Интернет-магазин</b> (<a href=\"/wiki/%D0%90%D0%BD%D0%B3%D0%BB%D0%B8%D0%B9%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA\" title=\"Английский язык\">англ.</a>&#160;<span lang=\"en\" style=\"font-style:italic;\">online shop или e-shop</span>)&#160;— <a href=\"/wiki/%D0%A1%D0%B0%D0%B9%D1%82\" title=\"Сайт\">сайт</a>, <a href=\"/wiki/%D0%A2%D0%BE%D1%80%D0%B3%D0%BE%D0%B2%D0%BB%D1%8F\" title=\"Торговля\">торгующий</a> товарами посредством сети <a href=\"/wiki/%D0%98%D0%BD%D1%82%D0%B5%D1%80%D0%BD%D0%B5%D1%82\" title=\"Интернет\">Интернет</a>. Позволяет пользователям <a href=\"/wiki/%D0%9E%D0%BD%D0%BB%D0%B0%D0%B9%D0%BD\" class=\"mw-redirect\" title=\"Онлайн\">онлайн</a>, в своём <a href=\"/wiki/%D0%91%D1%80%D0%B0%D1%83%D0%B7%D0%B5%D1%80\" title=\"Браузер\">браузере</a> или через <a href=\"/wiki/%D0%9C%D0%BE%D0%B1%D0%B8%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5_%D0%BF%D1%80%D0%B8%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5\" title=\"Мобильное приложение\">мобильное приложение</a>, сформировать заказ на <a href=\"/wiki/%D0%9F%D0%BE%D0%BA%D1%83%D0%BF%D0%B0%D1%82%D0%B5%D0%BB%D1%8C\" title=\"Покупатель\">покупку</a>, выбрать способ <a href=\"/wiki/%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0\" class=\"mw-redirect\" title=\"Оплата\">оплаты</a> и доставки заказа, оплатить заказ. При этом продажа товаров осуществляется <a href=\"/wiki/%D0%94%D0%B8%D1%81%D1%82%D0%B0%D0%BD%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D0%B0%D1%8F_%D1%82%D0%BE%D1%80%D0%B3%D0%BE%D0%B2%D0%BB%D1%8F\" title=\"Дистанционная торговля\">дистанционным способом</a> и она накладывает ограничения на продаваемые товары. Так, в некоторых странах имеется запрет на интернет-торговлю <a href=\"/wiki/%D0%90%D0%BB%D0%BA%D0%BE%D0%B3%D0%BE%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5_%D0%BD%D0%B0%D0%BF%D0%B8%D1%82%D0%BA%D0%B8\" title=\"Алкогольные напитки\">алкоголем</a>, <a href=\"/wiki/%D0%A2%D0%BE%D1%80%D0%B3%D0%BE%D0%B2%D0%BB%D1%8F_%D0%BE%D1%80%D1%83%D0%B6%D0%B8%D0%B5%D0%BC\" class=\"mw-redirect\" title=\"Торговля оружием\">оружием</a>, <a href=\"/wiki/%D0%AE%D0%B2%D0%B5%D0%BB%D0%B8%D1%80%D0%BD%D0%BE%D0%B5_%D0%B8%D0%B7%D0%B4%D0%B5%D0%BB%D0%B8%D0%B5\" title=\"Ювелирное изделие\">ювелирными изделиями</a> и другими товарами (к примеру, <a href=\"/wiki/%D0%A0%D0%BE%D0%B7%D0%BD%D0%B8%D1%87%D0%BD%D0%B0%D1%8F_%D1%82%D0%BE%D1%80%D0%B3%D0%BE%D0%B2%D0%BB%D1%8F_%D0%B2_%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D0%B8\" title=\"Розничная торговля в России\">в России</a> запрещена дистанционная продажа алкоголя, ювелирных изделий и других товаров, свободная реализация которых запрещена или ограничена<sup id=\"cite_ref-1\" class=\"reference\"><a href=\"#cite_note-1\">&#91;1&#93;</a></sup><sup id=\"cite_ref-2\" class=\"reference\"><a href=\"#cite_note-2\">&#91;2&#93;</a></sup>).\r\n</p><p>Когда онлайн-магазин настроен на то, чтобы позволить компаниям покупать у других компаний, этот процесс называется онлайн-магазинами бизнес для бизнеса (<a href=\"/wiki/B2B\" title=\"B2B\">B2B</a>). Типичный интернет-магазин позволяет клиенту просматривать ассортимент продуктов и услуг фирмы, просматривать фотографии или изображения продуктов, а также информацию о технических характеристиках продукта и ценах<span style=\"background: #ffeaea; color: #444444;\"></span><sup class=\"noprint\" style=\"white-space: nowrap\">&#91;<i><a href=\"/wiki/%D0%92%D0%B8%D0%BA%D0%B8%D0%BF%D0%B5%D0%B4%D0%B8%D1%8F:%D0%A1%D1%81%D1%8B%D0%BB%D0%BA%D0%B8_%D0%BD%D0%B0_%D0%B8%D1%81%D1%82%D0%BE%D1%87%D0%BD%D0%B8%D0%BA%D0%B8\" title=\"Википедия:Ссылки на источники\"><span title=\"не указан источник на утверждение (14 декабря 2018)\" style=\"\">источник не указан 169 дней</span></a></i>&#93;</sup>.\r\n</p><p>Интернет-магазины обычно позволяют покупателям использовать функции «поиска», чтобы найти конкретные модели, бренды или предметы.\r\n</p>', '5.jpeg', 'Admin', '2019-06-02 22:33:16', 0, 9, NULL, NULL, 'off', 'off'),
(6, 'Компьютеры', 'ИНТЕРНЕТ-МАГАЗИН', 'Интернет-магазин - это сайт с каталогом', 'ИНТЕРНЕТ-МАГАЗИН\r\n ПОСМОТРЕТЬ ДЕМО САЙТ\r\nИнтернет-магазин - это сайт с каталогом товаров и корзиной покупок. В таком магазине покупатель сможет легко найти, выбрать и заказать товар, а менеджер/продавец оперативно получит информацию по заказу и выполнит его.\r\n\r\nВы можете ознакомиться с административной панелью сайта (демонстрационный доступ)\r\n\r\nЛогин: demo\r\nПароль: demo\r\n\r\nАКЦИЯ: При оплате комплексного продвижения «Лидер» на 6 месяцев - интернет-магазин «Оптимальный» в ПОДАРОК!', '6.jpeg', 'Admin', '2019-06-03 11:24:44', 0, 53, NULL, NULL, 'off', 'off');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0',
  `get_newsletters` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`, `get_newsletters`) VALUES
(47, 'admin@example.com', '$2y$10$nISdq/JNm9wK08I2RSKkTOfh7ng3O1r7dwrywHY.FWYf3W726iCNO', 'Admin', 0, 1, 1, 1, 1558353339, 1559497594, 0, 1),
(52, 'ibankirova@gmail.com', '$2y$10$4JU4OBYSZGYmVnaOiPASLOVfTF4O8fUvdhCaW2DTt0FRkbY4YN5OC', 'Иришка', 0, 1, 1, 1, 1559556399, 1559556874, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(49, 51, 'admin@example.xn--com-hdd8a4eb', 'WTEyzYEiumZF0n-u', '$2y$10$xrQng3Tm3XQEt1Z6ctC2FOhX7/Mqa7kHfgtyfMmBVB7XsCrk/iZrC', 1559409732),
(43, 43, 'dom@dom.rey', 'SF5fA6aZsSmidkDV', '$2y$10$vJG7hyTJUCKsdcwUS5EKWOGjssMOfDM4I7ShvbTcZAlDAZta0pTZ.', 1558188034);

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('uSnD-HNZItjEqIP7PnphYbd7kQ_w1l7D7Wyw1nC-8Zs', 28.0258, 1558101800, 1558173800),
('g_tHu5OM3O31XoL3q6xnvJBu3VYCsH2UQZIDlx2IQJs', 28.0258, 1558101800, 1558173800),
('4XyrZLRPgU87Cm8a2NaAAWw8eGiO_MvkCJQJjCRFXsc', 29, 1558101438, 1558173438),
('AMKrM9ymXVaxU2R6xICh4gpWaoA_By1XV5qtV7H4ehA', 29, 1558101438, 1558173438),
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 49, 1558552234, 1558624234),
('PZ3qJtO_NLbJfRIP-8b4ME4WA3xxc6n9nbCORSffyQ0', 4, 1558552107, 1558984107),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 73.0158, 1558822713, 1559362713),
('8Phf2RDzpyDDNzbME_H1yEU7FyhdVPEiiejT4HuhnTs', 29, 1558101888, 1558173888),
('zWWs4loyQ1en_9nmlMxpcsTBX04OMdlJQBxNHYtFAiE', 29, 1558101888, 1558173888),
('o1SvOmRQuqZ60xBf4Q9vFh7GQuG2IIORl9DGYbuBPZM', 29, 1558102402, 1558174402),
('LrOLzl6RXIXMV4BCEmQydEGZMMGw_7XYxySYVKKw8r4', 29, 1558102402, 1558174402),
('bJwpvbPWvrCn03CkkLfyIi9eSm-u5bQySF5khdR_Nqw', 29, 1558353467, 1558425467),
('11p4SJCOWwJR2tHZNJAQEuAthh4GVRpALlsdzkKofd8', 29, 1558353467, 1558425467),
('OMhkmdh1HUEdNPRi-Pe4279tbL5SQ-WMYf551VVvH8U', 18.0667, 1558538020, 1558574020),
('TFqvGqGoKlBRIW6kUlmdRcZacwEjff9mz0Gp4bHx_Sw', 498.347, 1558538020, 1558710820),
('hJDjaUiJGRKoqExKR66D5-6vGykUatIjDGbIoGdJU9I', 29, 1558552234, 1558624234),
('cJMXlY00KK9uanTPrGLdkZ6s7hNfgG9ZYLIb_3NFjXc', 29, 1558552234, 1558624234);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
