﻿-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2012 at 05:23 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `sunny_duep`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contents_categories_id` int(11) DEFAULT NULL,
  `contents_groups_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `tizer` text,
  `description` text,
  `img` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `sheduled` int(11) NOT NULL,
  `publicate_on_index` int(11) NOT NULL,
  `language` int(11) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text,
  `seo_keywords` text,
  `name_main` varchar(255) DEFAULT NULL,
  `name_bc` varchar(255) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `admin_comment` text,
  `line_id` int(11) DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `staff_lastname` varchar(255) DEFAULT NULL,
  `staff_secondname` varchar(255) DEFAULT NULL,
  `adress` text,
  `requisitites` text,
  `phone_work` varchar(45) DEFAULT NULL,
  `phone_personal` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `qr_code` text,
  `gps` text,
  `list_of_staff` text,
  `list_of_teachers` text,
  `director` int(11) DEFAULT NULL,
  `parent_direction` int(11) DEFAULT NULL,
  `parent_kafedra` int(11) DEFAULT NULL,
  `contents_id` int(11) DEFAULT NULL,
  `parent_group` int(11) DEFAULT NULL,
  `parent_user_account` int(11) DEFAULT NULL,
  `history` text,
  `contacts` text,
  `enable_comments` int(11) DEFAULT NULL,
  `enable_rss` int(11) DEFAULT NULL,
  `enable_email` int(11) DEFAULT NULL,
  `enable_callback` int(11) DEFAULT NULL,
  `enable_feedback` int(11) DEFAULT NULL,
  `enable_calendar` int(11) NOT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='таблица контента, являет собой сборную солянку всех требуемы' AUTO_INCREMENT=27 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `contents_categories_id`, `contents_groups_id`, `title`, `alias`, `tizer`, `description`, `img`, `ordering`, `published`, `sheduled`, `publicate_on_index`, `language`, `seo_title`, `seo_description`, `seo_keywords`, `name_main`, `name_bc`, `date_created`, `user_created`, `date_modified`, `user_modified`, `admin_comment`, `line_id`, `staff_name`, `staff_lastname`, `staff_secondname`, `adress`, `requisitites`, `phone_work`, `phone_personal`, `email`, `qr_code`, `gps`, `list_of_staff`, `list_of_teachers`, `director`, `parent_direction`, `parent_kafedra`, `contents_id`, `parent_group`, `parent_user_account`, `history`, `contacts`, `enable_comments`, `enable_rss`, `enable_email`, `enable_callback`, `enable_feedback`, `enable_calendar`, `admin_email`) VALUES
(23, 2, 1, 'Сапожник без носков', '', 'Есть у меня один товарищ. Великий человек. Изобретает хитромудрые приборы, сам схемы придумывает-разводит-печатает-паяет. Технику всякую чинит на раз. Свет у него в туалете загорается только тогда, когда там кто-то есть.', 'Есть у меня один товарищ. Великий человек. Изобретает хитромудрые приборы, сам схемы придумывает-разводит-печатает-паяет. Технику всякую чинит на раз. Свет у него в туалете загорается только тогда, когда там кто-то есть. Регуляторы программирует, в достаточно зрелом возрасте на линукс перешёл. Поднял на том линуксе всё, что можно, от спутникового интернета до «Сталкера».\r\n\r\nЧасто хожу я к нему за советом и стучу в его дверь. Стучу, потому что звонок не работает…', NULL, NULL, 1, 0, 1, NULL, 'Сапожник без носков', 'Есть у меня один товарищ. Великий человек. Изобретает хитромудрые приборы, сам схемы придумывает-разводит-печатает-паяет. Технику всякую чинит на раз. Свет у него в туалете загорается только тогда, когда там кто-то есть.', 'испытание, рыба, карась', NULL, 'Сапожник без носков', 1341323876, NULL, 1341323876, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, NULL, 1, NULL),
(22, 2, 1, 'Маленький свечной детсадик', 'test2', 'Вот читаю я про битву заказчиков и разработчиков. У одних программисты тупые, у других клиенты идиоты. И скупая мужская слеза скользит по моей небритой щеке. Как же вам хорошо! А вот в нашей кое-что добывающей компании всё ещё хуже.', 'Вот читаю я про битву заказчиков и разработчиков. У одних программисты тупые, у других клиенты идиоты. И скупая мужская слеза скользит по моей небритой щеке. Как же вам хорошо! А вот в нашей кое-что добывающей компании всё ещё хуже.\r\n\r\nМежду производством и разработчиком ПО находится ещё одна контора, которая берёт деньги у производства и отдаёт их разработчику, половину оставляя себе. Потом проект исполняется, причём неважно как (обычно плохо). Аплодисменты и премии выдаются той самой конторке посередине. Потом на производстве пытаются как-то применить мертворожденного уродца. Но самое смешное, что претензии не принимаются: всё подписано. Правда, не теми, кто потом пользуется, а теми, кто фабрику от детского сада не отличит.', NULL, NULL, 0, 0, 0, NULL, 'Маленький свечной детсадик', 'Вот читаю я про битву заказчиков и разработчиков. У одних программисты тупые, у других клиенты идиоты. И скупая мужская слеза скользит по моей небритой щеке. Как же вам хорошо! А вот в нашей кое-что добывающей компании всё ещё хуже.', 'проверка, тест', NULL, 'Маленький свечной детсадик', 1341304995, NULL, 1341304995, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, 1, NULL),
(21, 2, 1, 'Чудо чудное, диво дивное', 'announcement_1', 'Все имели несчастье сталкиваться с бабками-проповедницами. Так вот, они эволюционируют и изыскивают новые способы затеять душевную беседу.', 'Все имели несчастье сталкиваться с бабками-проповедницами. Так вот, они эволюционируют и изыскивают новые способы затеять душевную беседу.\r\n\r\nИду я утром на работу. Солнышко, птички, в ушах Кипелов, в голове мысли о вечном, в руках телефон, посредством которого на домашний ПК водворяется очередной демон… Вот она, типичная бабка с большой сумкой. Вопрошает голосом человечьим:\r\n\r\n— Молодой человек, а для вас телефон — это чудо?\r\n— Нет.\r\n— А для нас — чудо.\r\n\r\nНу вот как надо было отреагировать, кроме как поздравить их и пойти дальше?', NULL, NULL, 1, 0, 1, NULL, 'Чудо чудное, диво дивное', 'Все имели несчастье сталкиваться с бабками-проповедницами. Так вот, они эволюционируют и изыскивают новые способы затеять душевную беседу.', 'проба, эксперимент', NULL, 'Чудо чудное, диво дивное', 1341305012, NULL, 1341305012, NULL, 'Экспериментируем', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 1, NULL),
(24, 8, 2, 'Стойка с железом', 'news_test_1', 'Было это год назад. После довольно длительной и нудной командировки я возвращался домой из города N очень дальнего района. До поезда оставалось ещё полдня, поэтому решил перекусить, выпить пару чашечек чая и просто подышать свежим воздухом, подставив лицо яркому солнышку, забыв о своей специальности и всех злоключениях.\r\n', 'Было это год назад. После довольно длительной и нудной командировки я возвращался домой из города N очень дальнего района. До поезда оставалось ещё полдня, поэтому решил перекусить, выпить пару чашечек чая и просто подышать свежим воздухом, подставив лицо яркому солнышку, забыв о своей специальности и всех злоключениях.\r\n\r\n— Молодой человек, я вижу, вы в серверах что-то понимаете?\r\n\r\nНу что, у меня на лице это написано, что ли? Брючки, рубашечка отглаженная, чемоданчик недешёвый — типичный клерк. Почему они ко мне все пристают?\r\n\r\n— Допустим…\r\n— У нас тут сервер сломался. Не могли бы вы помочь за разумную плату? Магазин работать не может.\r\n\r\nЧто ж делать? Мы как врачи — и в дождь, и в снег… Время есть, настроение благодушное.\r\n\r\n— Пойдёмте.\r\n\r\nПервые неприятные мысли меня начали посещать, когда мы подошли к какому-то магазину-палатке. Ну думаю, попал на гоп-стоп, но уж больно нетрадиционно. Заходим внутрь — какие-то прилавки с сапогами, калошами, валенками и прочей утварью.\r\n\r\n— Ну, показывайте, любезный.\r\n— Вот.\r\n\r\n«Сервером» оказался стеллаж высотой пять метров и длиной метров десять с отвалившимися креплениями полок. Пришлось разочаровать человека, но теперь частенько меня начинает смешить фраза: «Я тут недавно сервер поднимал». Так и стоит перед глазами эта стойка весом в полтонны.', NULL, NULL, 1, 0, 0, NULL, '', '', '', NULL, '', 1341394133, NULL, 1341394133, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL),
(25, 9, 3, 'Палка палке рознь', 'another_stick', 'Жили-были два товарища. Впрочем, почему жили — и сейчас живы и здоровы. И объединяло их одно увлечение. Впрочем, почему объединяло — и сейчас объединяет. А увлечение это — старый добрый DOS.\r\n', 'Жили-были два товарища. Впрочем, почему жили — и сейчас живы и здоровы. И объединяло их одно увлечение. Впрочем, почему объединяло — и сейчас объединяет. А увлечение это — старый добрый DOS.\r\n\r\nИ один товарищ для другого решил утилиту написать. Утилита та состояла из двух файлов — EXE и BAT. Впрочем, почему состояла — и сейчас состоит. Первый товарищ второму готовую утилиту переслал. А у того не фурычит.\r\n\r\nДолго думали, почему у первого фурычит, а у второго нет. Неделю разбирались. Чуть дружба врозь у них не стала. А потом причину нашли.\r\n\r\nУ первого товарища на специально выделенной машине FreeDOS, у второго — MS-DOS. И первый товарищ, когда утилиту писал, в BAT-файле прямые слэши использовал по линуксовой привычке. FreeDOS по фигу, какой слэш — прямой или обратный, а микрософтовскому только обратный подавай.\r\n\r\nИстория закончилась хорошо. Второй товарищ тоже поставил на «испытательную машину» FreeDOS и уже потихоньку интересуется, что за зверь такой — линукс.', NULL, NULL, 1, 0, 0, NULL, 'Палка палке рознь', '', '', NULL, '', 1341394181, NULL, 1341394181, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 1, NULL),
(26, 10, 4, 'Метода по экономике', 'economics', 'Я хозяйка бассет-хаунда. Для тех, кто не знает, это такая кривоногая, низкая, толстенькая, смешная собачка с большими ушами и грустным взглядом. Собак таких в моём городе немного, потому на нас обращают внимание. Я не против дать возможность сфотографироваться или погладить, но как же задолбали люди, которые лезут без спросу в лицо псу или не держат своих детей!', 'Я хозяйка бассет-хаунда. Для тех, кто не знает, это такая кривоногая, низкая, толстенькая, смешная собачка с большими ушами и грустным взглядом. Собак таких в моём городе немного, потому на нас обращают внимание. Я не против дать возможность сфотографироваться или погладить, но как же задолбали люди, которые лезут без спросу в лицо псу или не держат своих детей!\r\n\r\n— А ваша собачка не кусается? — верещит через весь сквер мамаша, чья милая трёхлетняя дочурка уже находится в метре от нас.\r\n— Нет, но заберите ребёнка, пожалуйста!\r\n— А зачем забирать, если не кусается?\r\n\r\nИ правда, зачем, если ты не будешь кричать на меня и мою собаку, когда твоя дочка вымажется в собачьей слюне? И да, абсолютно все собаки кусаются, если им сделать больно. Может, твоя дочь своим крохотным ботиночком собаке на лапу наступит, я же не знаю. Ещё вариант:\r\n\r\n— Ну как я её удержу, это же ребёнок, она хочет бегать!\r\n\r\nОкей, тогда я отцеплю поводок, ведь это же пёс, он хочет играть. И, воспользовавшись свободой, он опрокинет девочку на лопатки в две секунды и наступит на неё играючи своими 35 килограммами.\r\n\r\nЕсть и приятные случаи, когда родители, у которых ребёнок боится собак, приучают его быть аккуратными с животными: «Давай спросим у тёти, можно ли погладить собачку и как её зовут». Малыш неуверенно тянет ручку, радуется, когда собака большими коричневыми глазами смотрит на него и принюхивается. Надеюсь, что благодаря нам несколько детей стали лучше относиться к животным.\r\n\r\nВторая категория задолбавших — это пьяные. Кажется, все знают: собаки не любят пьяных, потому что чувствуют, как выделяется адреналин, и начинают нервничать. Я понимаю, что по моему псу так сразу не скажешь, что он может укусить, но, ёлки, зачем лезть ему в морду проверять? Пасть у него размером с овчарочью, да и со скоростью реакции всё в порядке. Правда хочется, чтобы тебя покусали? Нет? Тогда зачем перегораживаешь нам дорогу, пошатывающийся человек с красным лицом и неприятным запахом?', NULL, NULL, 1, 0, 0, NULL, '', '', '', NULL, '', 1341395430, NULL, 1341395430, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contents_categories`
--

DROP TABLE IF EXISTS `contents_categories`;
CREATE TABLE IF NOT EXISTS `contents_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contents_groups_id` int(11) DEFAULT NULL,
  `contents_categories_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text,
  `enable_comments` int(11) DEFAULT NULL,
  `enable_rss` int(11) DEFAULT NULL,
  `enable_email` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `admin_comment` text,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text,
  `seo_keywords` text,
  `name_main` varchar(255) DEFAULT NULL,
  `name_bc` varchar(255) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contents_categories`
--

INSERT INTO `contents_categories` (`id`, `contents_groups_id`, `contents_categories_id`, `title`, `alias`, `description`, `enable_comments`, `enable_rss`, `enable_email`, `language`, `ordering`, `published`, `admin_comment`, `seo_title`, `seo_description`, `seo_keywords`, `name_main`, `name_bc`, `date_created`, `user_created`, `date_modified`, `user_modified`) VALUES
(1, 1, 0, 'Анонсы', 'announcements', '', 0, 0, 0, NULL, 1, 1, 'Создано в phpMyAdmin', 'Анонсы', '', '', 'Анонсы', 'анонсы', 1341330239, NULL, 1341330239, NULL),
(2, 1, 1, 'Лента 1', 'strip_1', '', 1, 1, 1, NULL, 1, 1, 'создано в phpMyAdmin', 'Лента 1', '', '', 'Лента 1', 'лента 1', 1341326917, NULL, 1341326917, NULL),
(7, 2, 0, 'Категория 1', 'cat_1', '', 0, 0, 0, NULL, NULL, 1, NULL, '', '', '', NULL, '', 1341388914, NULL, 1341388914, NULL),
(6, 1, 1, 'Лента 2', '', '', 0, 0, 0, NULL, NULL, 0, NULL, '', '', '', NULL, '', 1341330281, NULL, 1341330281, NULL),
(8, 2, 1, 'Лента 1', 'strip_1', '', 0, 0, 0, NULL, NULL, 1, NULL, '', '', '', NULL, '', 1341388929, NULL, 1341388929, NULL),
(9, 3, 0, 'Категория 1', 'events_cat_1', '', 0, 0, 0, NULL, NULL, 1, NULL, '', '', '', NULL, '', 1341394037, NULL, 1341394037, NULL),
(10, 4, 0, 'Методички', 'metodical', '', 0, 0, 0, NULL, NULL, 0, NULL, '', '', '', NULL, '', 1341395336, NULL, 1341395336, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contents_groups`
--

DROP TABLE IF EXISTS `contents_groups`;
CREATE TABLE IF NOT EXISTS `contents_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text,
  `ordering` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `admin_comment` text,
  `system` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contents_groups`
--

INSERT INTO `contents_groups` (`id`, `title`, `alias`, `description`, `ordering`, `published`, `admin_comment`, `system`, `date_created`, `date_modified`) VALUES
(1, 'Анонсы', 'announcements', 'Группа контента, относящаяся к разделу анонсов', 1, 1, 'Создано в phpMyAdmin', 1, 1341217522, 1341217564),
(2, 'Новости', 'news', 'Группа новостного контента', 2, 1, 'Создано в phpMyAdmin', 1, 1341388284, 1341388309),
(3, 'События', 'events', 'Группа контента событий', 3, 1, 'Создано в phpMyAdmin', 1, 1341393799, 1341393811),
(4, 'Архив публикаций', 'publications_archive', 'Группа архива публикаций', 4, 1, 'Создано в phpMyAdmin', 1, 1341394795, 1341394814);

-- --------------------------------------------------------

--
-- Table structure for table `contents_sheduler`
--

DROP TABLE IF EXISTS `contents_sheduler`;
CREATE TABLE IF NOT EXISTS `contents_sheduler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contents_id` int(11) DEFAULT NULL,
  `start` int(11) DEFAULT NULL,
  `stop` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Расписание отображения контента' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contents_sheduler`
--


-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_categories_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `server_path` text,
  `public_path` text,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `type` varchar(32) DEFAULT NULL,
  `thumbnail` text,
  `keywords` text,
  `admin_comment` text,
  `date_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media_categories_id`, `name`, `server_path`, `public_path`, `title`, `description`, `type`, `thumbnail`, `keywords`, `admin_comment`, `date_created`, `date_modified`, `published`) VALUES
(3, NULL, 'msysGit-fullinstall-1.7.10-preview20120409.exe', 'D:\\Zend\\Apache2\\htdocs\\duep\\public/uploads', '', 'Test', '', '', '', '', '', 1340205468, 1340205468, 0),
(4, NULL, 'transcend.zip', 'D:\\Zend\\Apache2\\htdocs\\duep\\public/uploads', '', 'ttttttt', '', '', '', '', '', 1340206960, 1340206970, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_categories`
--

DROP TABLE IF EXISTS `media_categories`;
CREATE TABLE IF NOT EXISTS `media_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `public_url` text,
  `cookie_name` varchar(255) DEFAULT NULL,
  `menu_title` varchar(255) DEFAULT NULL,
  `enable_rss` int(11) DEFAULT NULL,
  `enable_email` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `media_categories_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `media_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `media_statistic`
--

DROP TABLE IF EXISTS `media_statistic`;
CREATE TABLE IF NOT EXISTS `media_statistic` (
  `id` int(11) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `download_time` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media_statistic`
--


-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `private_phone` varchar(255) DEFAULT NULL,
  `interoffice_phone` varchar(255) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `description` text,
  `published` int(11) DEFAULT NULL,
  `mode` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `last_name`, `first_name`, `middle_name`, `private_phone`, `interoffice_phone`, `file_id`, `description`, `published`, `mode`, `users_id`, `date_created`, `date_modified`) VALUES
(1, 'Павленко2', 'Евгений', 'Витальевич', '066', '', NULL, '', 0, 0, NULL, NULL, NULL),
(2, 'Шмалий', 'Максим', 'Владимирович', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_references`
--

DROP TABLE IF EXISTS `staff_references`;
CREATE TABLE IF NOT EXISTS `staff_references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `staff_references`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `admin_comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Users list' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `published`, `ordering`, `date_created`, `date_modified`, `admin_comment`) VALUES
(1, 'pavlenko.obs@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 1, 1339570107, 1339570107, NULL),
(2, 'git@github.com', '111', 1, 2, 1339663069, 1339663069, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text,
  `ordering` int(11) DEFAULT '0',
  `published` int(11) DEFAULT '0',
  `admin_comment` text,
  `users_groups_id` int(11) DEFAULT NULL,
  `system` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_users_groups1` (`users_groups_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Группы юзеров' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `title`, `alias`, `description`, `ordering`, `published`, `admin_comment`, `users_groups_id`, `system`, `date_created`, `date_modified`) VALUES
(1, 'Суперадминистраторы', 'superadmin', 'Системная группа', 1, 1, 'Участники имеют все права', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

DROP TABLE IF EXISTS `users_permissions`;
CREATE TABLE IF NOT EXISTS `users_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `allow` int(11) DEFAULT NULL,
  `assertion_class` text,
  `date_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Список прав доступа' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `title`, `ordering`, `allow`, `assertion_class`, `date_created`, `date_modified`) VALUES
(1, 'Редактирование', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_references`
--

DROP TABLE IF EXISTS `users_references`;
CREATE TABLE IF NOT EXISTS `users_references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `users_groups_id` int(11) DEFAULT NULL,
  `users_permissions_id` int(11) DEFAULT NULL,
  `admin_comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Cвязи пользователь - группа, пользователь - права' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_references`
--

INSERT INTO `users_references` (`id`, `users_id`, `users_groups_id`, `users_permissions_id`, `admin_comment`) VALUES
(1, 1, 1, 0, NULL),
(2, 2, 1, 0, NULL);
