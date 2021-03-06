-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2012 at 09:04 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sunny_duep`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tbl_name` varchar(50) NOT NULL,
  `tbl_id` int(11) NOT NULL,
  `contents_alias` varchar(100) NOT NULL,
  `users_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  `checked` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `tbl_name`, `tbl_id`, `contents_alias`, `users_id`, `text`, `created`, `published`, `checked`) VALUES
(1, 'contemnts', 0, 'business-administration', 1, 'Hello', 1341395430, 1, 0),
(2, '', 0, 'vidbuvsja-drugij-vipusk-magistriv-za-programoju-«biznes-administruvannja»', 12, 'туманов дибил (он сам сказал)', 1345119496, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contents_id` int(11) NOT NULL,
  `contents_categories_id` int(11) DEFAULT NULL,
  `contents_groups_id` int(11) NOT NULL,
  `contents_photogallery_id` int(11) NOT NULL,
  `contents_videogallery_id` int(11) NOT NULL,
  `contents_multigallery_id` int(11) NOT NULL,
  `contents_events_announcement_id` int(11) NOT NULL,
  `contents_gallery_of_images_hidden` tinyint(1) NOT NULL,
  `media_files_id` text NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `in_presentation` int(11) NOT NULL,
  `frontend_date` int(11) NOT NULL,
  `tizer` text,
  `description` text,
  `media_id` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `sheduled` int(11) NOT NULL,
  `publicate_on_index` int(11) NOT NULL,
  `languages_alias` varchar(11) DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='таблица контента, являет собой сборную солянку всех требуемы' AUTO_INCREMENT=69 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `contents_id`, `contents_categories_id`, `contents_groups_id`, `contents_photogallery_id`, `contents_videogallery_id`, `contents_multigallery_id`, `contents_events_announcement_id`, `contents_gallery_of_images_hidden`, `media_files_id`, `title`, `alias`, `in_presentation`, `frontend_date`, `tizer`, `description`, `media_id`, `ordering`, `published`, `sheduled`, `publicate_on_index`, `languages_alias`, `seo_title`, `seo_description`, `seo_keywords`, `name_main`, `name_bc`, `date_created`, `user_created`, `date_modified`, `user_modified`, `admin_comment`, `line_id`, `staff_name`, `staff_lastname`, `staff_secondname`, `adress`, `requisitites`, `phone_work`, `phone_personal`, `email`, `qr_code`, `gps`, `list_of_staff`, `list_of_teachers`, `director`, `parent_direction`, `parent_kafedra`, `parent_group`, `parent_user_account`, `history`, `contacts`, `enable_comments`, `enable_rss`, `enable_email`, `enable_callback`, `enable_feedback`, `enable_calendar`, `admin_email`) VALUES
(26, 0, 10, 4, 0, 0, 0, 0, 0, '', 'Метода по экономике', 'economics', 0, 0, 'Я хозяйка бассет-хаунда. Для тех, кто не знает, это такая кривоногая, низкая, толстенькая, смешная собачка с большими ушами и грустным взглядом. Собак таких в моём городе немного, потому на нас обращают внимание. Я не против дать возможность сфотографироваться или погладить, но как же задолбали люди, которые лезут без спросу в лицо псу или не держат своих детей!', 'Я хозяйка бассет-хаунда. Для тех, кто не знает, это такая кривоногая, низкая, толстенькая, смешная собачка с большими ушами и грустным взглядом. Собак таких в моём городе немного, потому на нас обращают внимание. Я не против дать возможность сфотографироваться или погладить, но как же задолбали люди, которые лезут без спросу в лицо псу или не держат своих детей!\r\n\r\n— А ваша собачка не кусается? — верещит через весь сквер мамаша, чья милая трёхлетняя дочурка уже находится в метре от нас.\r\n— Нет, но заберите ребёнка, пожалуйста!\r\n— А зачем забирать, если не кусается?\r\n\r\nИ правда, зачем, если ты не будешь кричать на меня и мою собаку, когда твоя дочка вымажется в собачьей слюне? И да, абсолютно все собаки кусаются, если им сделать больно. Может, твоя дочь своим крохотным ботиночком собаке на лапу наступит, я же не знаю. Ещё вариант:\r\n\r\n— Ну как я её удержу, это же ребёнок, она хочет бегать!\r\n\r\nОкей, тогда я отцеплю поводок, ведь это же пёс, он хочет играть. И, воспользовавшись свободой, он опрокинет девочку на лопатки в две секунды и наступит на неё играючи своими 35 килограммами.\r\n\r\nЕсть и приятные случаи, когда родители, у которых ребёнок боится собак, приучают его быть аккуратными с животными: «Давай спросим у тёти, можно ли погладить собачку и как её зовут». Малыш неуверенно тянет ручку, радуется, когда собака большими коричневыми глазами смотрит на него и принюхивается. Надеюсь, что благодаря нам несколько детей стали лучше относиться к животным.\r\n\r\nВторая категория задолбавших — это пьяные. Кажется, все знают: собаки не любят пьяных, потому что чувствуют, как выделяется адреналин, и начинают нервничать. Я понимаю, что по моему псу так сразу не скажешь, что он может укусить, но, ёлки, зачем лезть ему в морду проверять? Пасть у него размером с овчарочью, да и со скоростью реакции всё в порядке. Правда хочется, чтобы тебя покусали? Нет? Тогда зачем перегораживаешь нам дорогу, пошатывающийся человек с красным лицом и неприятным запахом?', NULL, NULL, 1, 0, 0, NULL, '', '', '', NULL, '', 1341395430, NULL, 1341395430, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL),
(28, 0, 12, 6, 0, 0, 0, 0, 0, '', 'Тест', 'test', 0, 0, 'eer', 'tretrtrt', NULL, NULL, 1, 0, 0, NULL, '', '', '', NULL, '', 1342511867, NULL, 1342511867, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL),
(29, 0, 15, 2, 65, 0, 0, 0, 0, '', 'Відбувся другий випуск магістрів за програмою «Бізнес-адміністрування»', 'vidbuvsja-drugij-vipusk-magistriv-za-programoju-«biznes-administruvannja»', 0, 8, '<p>В Школі Бізнесу Дніпропетровського університету імені Альфреда Нобеля 9 червня 2012 року відбувся другий випуск магістрів за програмою &laquo;Бізнес-адміністрування&raquo;. Цього року 24 слухачі успішно захистили дипломні роботи та отримали дипломи державного зразка, серед яких чотири &ndash; з відзнакою. Окрім співробітників Школи Бізнесу та викладачів, випускників привітав перший проректор університету, д.е.н., професор Анатолій Олександрович Задоя, побажавши їм успішного розвитку та добрих друзів, які завжди підтримають у будь-якій ситуації.</p>', '<p>В Школі Бізнесу Дніпропетровського університету імені Альфреда Нобеля 9 червня 2012 року відбувся другий випуск магістрів за програмою &laquo;Бізнес-адміністрування&raquo;. Цього року 24 слухачі успішно захистили дипломні роботи та отримали дипломи державного зразка, серед яких чотири &ndash; з відзнакою. Окрім співробітників Школи Бізнесу та викладачів, випускників привітав перший проректор університету, д.е.н., професор Анатолій Олександрович Задоя, побажавши їм успішного розвитку та добрих друзів, які завжди підтримають у будь-якій ситуації. Протягом двох років слухачі двічі на тиждень старанно відвідували заняття після виснажливих робочих днів та навіть у вихідні. Але ці зусилля безумовно були вартими досягнутих результатів. Опанував такі дисципліни, як економіка, стратегічне управління, маркетинг, фінанси, управлінський облік та багато інших, а також скористувавшись можливістю використати отримані знання на практиці, випускники щиро зізнаються, що вже значно розширили свої уявлення про світ бізнесу. Але ж це тільки початок, перший крок до нових успіхів та досягнень. Вчорашні слухачі сміливо дивляться у майбутнє, добре усвідомлюючи, що вони вже володіють необхідними інструментами для ефективного вирішення проблем та подальшого професійного розвитку. Серед двох десятків випускників є представники різних сфер бізнесу, але немає сумніву, що отримані знання та навички обов&rsquo;язково стануть їм у нагоді. Навчання на програмі МВА для слухачів вже завершено, але Школа Бізнесу не прощається з ними. Восени планується зустріч випускників, де вони зможуть поділитися отриманим досвідом та розповісти своїм наставникам, як продовжується їх життя після отримання заповітного ступеню МВА, та які якісні зміни відбулися на їх кар&rsquo;єрному шляху. Окрім того, ця зустріч може стати початком плідного співробітництва, реалізації сумісних проектів та втілення нових ідей. Школа Бізнесу з нетерпінням чекає на нові зустрічі зі своїми улюбленими випускниками !</p>', '2', NULL, 1, 0, 1, 'uk', 'Відбувся другий випуск магістрів за програмою «Бізнес-адміністрування»', 'В Школі Бізнесу Дніпропетровського університету імені Альфреда Нобеля 9 червня 2012 року відбувся другий випуск магістрів за програмою «Бізнес-адміністрування».', '', NULL, '', 1343974549, NULL, 1343974549, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, NULL, 0, NULL),
(62, 0, 19, 1, 67, 0, 0, 0, 0, '', 'Увага ! Новини від Видавництва Університету імені Альфреда Нобеля', 'uvaga-novini-vid-vidavnitstva-universitetu-imeni-alfreda-nobelja', 1, 8, '<p>Інформацію про нові видання Видавництва Університету імені Альфреда Нобеля дивись: http://duep.edu/section/science/print-work/new-druk/uk.html</p>', '<p>Інформацію про нові видання Видавництва Університету імені Альфреда Нобеля дивись:</p>\r\n<p>http://duep.edu/section/science/print-work/new-druk/uk.html</p>', '3', NULL, 1, 0, 0, 'uk', '', '', '', NULL, '', 1344504080, NULL, 1344504080, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL),
(63, 0, 20, 1, 0, 0, 0, 0, 0, '', 'Польська мова', 'polish_language', 1, 0, '<p>Українсько-польський центр сприяння розвитку менеджменту, підприємництва та інвестицій і Польський мовний клуб запрошують на програму з вивчення польської мови.</p>', '<p>Українсько-польський центр сприяння розвитку менеджменту, підприємництва та інвестицій і Польський мовний клуб запрошують на програму з вивчення польської мови.</p>\r\n<p>По закінченню програми слухачі одержують сертифікат Українсько-польського центру, мають можливість отримати сертифікат Міністерства науки та вищої освіти Республіки Польща. В рамках діяльності Українсько-польського центру слухачів клубу інформують про наукові, освітні та культурні програми Польщі, а також надають підтримку щодо прийняття участі в них.</p>\r\n<p>Додаткова інформація: (056) 744 49 73, upc@duep.edu</p>', '1', NULL, 0, 0, 0, 'uk', '', '', '', NULL, '', 1343937728, NULL, 1343937728, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL),
(61, 0, 17, 1, 0, 0, 0, 0, 0, '', 'New!Інформація від Міжнародного відділу', 'international_departament_information', 1, 0, '<p>"Гарячі" міжнародні можливості-2012 Інформацію про конкурси, гранти, конференції тощо дивись http://duep.edu/section/student/grants/uk.html До уваги студентів та викладачів Університету !</p>', '<p>"Гарячі" міжнародні можливості-2012 Інформацію про конкурси, гранти, конференції тощо дивись http://duep.edu/section/student/grants/uk.html До уваги студентів та викладачів Університету ! Завдяки членству Університету імені Альфреда Нобеля у Міжнародній Асоціації Університетів http://www.iau-aiu.net/ (IAU), у нас є доступ до міжнародної бібліотеки. Так New in HEDBIB являє собою ресурс, що містить посилання на нові публікації в HEDBIB, IAU Міжнародна Бібліографічна База Даних з Вищої Освіти (http://hedbib.iau-aiu.net/ ). New in HEDBIB виходить п''ять разів на рік та надcилається електронною поштою членам IAU і партнерським організаціям, а також дає можливість завантажити цю інформацію з сайту IAU. New in HEDBIB ділиться на шість основних пріоритетних тем IAU: Рівний Доступ і Успіх в галузі Вищої Освіти, Дослідження та Докторантура, Інтернаціоналізація, Вища Освіта та Освіта для Всіх, Міжкультурний діалог; Сталий Розвиток, а також інші теми. Теми IAU поділяються за регіонами. Кожен номер доповнюється щомісячним відбором IAU &laquo;Ми рекомендуємо&raquo;, який передбачає крупний план однієї або кількох публікацій. Ми сподіваємося, що New in HEDBIB є для Вас корисним і інформативним. Читай про це також на http://duep.edu/section/student/library/uk.html</p>', '18', NULL, 1, 0, 0, 'uk', '', '', '', NULL, '', 1343945641, NULL, 1343945641, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL),
(65, 0, 29, 5, 0, 0, 0, 0, 0, '', 'Тестовая галерея', 'test', 0, 0, '<p>weweqq</p>', '<p>wewewew</p>', '', NULL, 1, 0, 0, 'uk', '', '', '', NULL, '', 1343945384, NULL, 1343945384, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL),
(67, 0, 29, 5, 0, 0, 0, 0, 0, '', 'Обкаточный фотоальбом', 'obkatochnyj-fotoalbom', 0, 0, '<p>Сушить зонтик в открытым полностью нельзя. Сушить зонт в раскрытом виде считается единственно правильным способом только у нас. А вот за границей так зонт никто не сушит. Часто можно увидеть такую картину: человек, войдя в дом или офис, тут же бросает мокрый сложенный зонт прямо на пол.</p>', '<p>Сушить зонтик в открытым полностью нельзя. Сушить зонт в раскрытом виде считается единственно правильным способом только у нас. А вот за границей так зонт никто не сушит. Часто можно увидеть такую картину: человек, войдя в дом или офис, тут же бросает мокрый сложенный зонт прямо на пол. С него, разумеется, натекает лужа, но это никого не смущает. В лучшем случае слипшийся от воды зонт ставят в специальное ведро-подставку, где он остается безо всякого внимания до следующего дождя.<br /><br />Оказывается, ткань зонта дольше сохраняет прочность, цвет, водоотталкивающие свойства и прочие полезные качества, если сушить ее в "расслабленном" виде. Сохнет сложенный зонт, конечно, дольше открытого, зато служит долго.<br /><br />Таким образом правильно сушить зонт следует так: раскройте его и сушите, но раскрывайте не до конца, лишь наполовину, чтобы не растянуть слишком ткань.</p>', '62', NULL, 1, 0, 0, 'uk', 'Обкаточный фотоальбом', 'Сушить зонтик в открытым полностью нельзя. Сушить зонт в раскрытом виде считается единственно правильным способом только у нас. А вот за границей так зонт никто не сушит. Часто можно увидеть такую картину: человек, войдя в дом или офис, тут же бросает мокрый сложенный зонт прямо на пол.', 'мокрый, зонтик', NULL, '', 1344839664, NULL, 1344839664, NULL, 'После прочтения сжечь', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, NULL);

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
  `language` varchar(11) DEFAULT NULL,
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
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `contents_categories`
--

INSERT INTO `contents_categories` (`id`, `contents_groups_id`, `contents_categories_id`, `title`, `alias`, `description`, `enable_comments`, `enable_rss`, `enable_email`, `language`, `ordering`, `published`, `admin_comment`, `seo_title`, `seo_description`, `seo_keywords`, `name_main`, `name_bc`, `date_created`, `user_created`, `date_modified`, `user_modified`, `system`) VALUES
(1, 1, 0, 'Анонси', 'announcements', '', 0, 0, 0, 'uk', 1, 1, 'Создано в phpMyAdmin', 'Анонсы', '', '', 'Анонсы', 'анонсы', 1341330239, NULL, 1341330239, NULL, 1),
(18, 1, 1, 'Абітурієнту', 'for_entrant', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903544, NULL, 1343903544, NULL, 0),
(19, 1, 1, 'Навчання і наука', 'education_and_science', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903548, NULL, 1343903548, NULL, 0),
(7, 2, 16, 'Студенту', 'for_students', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343044884, NULL, 1343044884, NULL, 0),
(17, 1, 1, 'Студенту', 'for_students', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903553, NULL, 1343903553, NULL, 0),
(21, 3, 0, 'Події', 'events', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903746, NULL, 1343903746, NULL, 1),
(10, 4, 0, 'Методички', 'metodical', '', 0, 0, 0, 'uk', NULL, 0, NULL, '', '', '', NULL, '', 1341395336, NULL, 1341395336, NULL, 0),
(11, 5, 0, 'Галерея изображений', 'gallery', '123', 0, 0, 0, 'uk', NULL, 0, NULL, '', '', '', NULL, '', 1342426383, NULL, 1342426383, NULL, 0),
(13, 2, 16, 'Абурієнту', 'for_abiturients', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343044865, NULL, 1343044865, NULL, 0),
(14, 2, 16, 'Навчання і наука', 'education_and_science', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343044872, NULL, 1343044872, NULL, 0),
(15, 2, 16, 'Університет', 'univercity', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343044878, NULL, 1343044878, NULL, 0),
(16, 2, 0, 'Новини', 'news', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343044859, NULL, 1343044859, NULL, 1),
(20, 1, 1, 'Університет', 'univercity', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903556, NULL, 1343903556, NULL, 0),
(22, 3, 21, 'Студенту', 'for_students', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903797, NULL, 1343903797, NULL, 0),
(23, 3, 21, 'Абітурієнту', 'for_entrant', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903818, NULL, 1343903818, NULL, 0),
(24, 3, 21, 'Навчання і наука', 'education_and_science', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903838, NULL, 1343903838, NULL, 0),
(25, 3, 21, 'Університет', 'univercity', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343903854, NULL, 1343903854, NULL, 0),
(29, 5, 11, 'Анонсы', 'announces_gallery', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1343944876, NULL, 1343944876, NULL, 0),
(30, 5, 11, 'Події', 'events_gallerys', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', 1344840020, NULL, 1344840020, NULL, 0),
(31, 7, 0, 'Мультигалереи', 'multi_gallerys', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', NULL, NULL, NULL, NULL, 0),
(33, 6, 0, 'Відео галереї', 'video-galereji', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', NULL, NULL, NULL, NULL, 0),
(34, 6, 33, 'Анонси', 'anonsi', '', 0, 0, 0, 'uk', NULL, 1, NULL, '', '', '', NULL, '', NULL, NULL, NULL, NULL, 0);

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
  `system` int(11) NOT NULL DEFAULT '0',
  `date_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `contents_groups`
--

INSERT INTO `contents_groups` (`id`, `title`, `alias`, `description`, `ordering`, `published`, `admin_comment`, `system`, `date_created`, `date_modified`) VALUES
(1, 'Анонсы', 'announcements', 'Группа контента, относящаяся к разделу анонсов', 1, 1, 'Создано в phpMyAdmin', 1, 1341217522, 1341217564),
(2, 'Новости', 'news', 'Группа новостного контента', 2, 1, 'Создано в phpMyAdmin', 1, 1341388284, 1341388309),
(3, 'События', 'events', 'Группа контента событий', 3, 1, 'Создано в phpMyAdmin', 1, 1341393799, 1341393811),
(4, 'Архив публикаций', 'publications_archive', 'Группа архива публикаций', 4, 1, 'Создано в phpMyAdmin', 1, 1341394795, 1341394814),
(5, 'Галерея изображений', 'gallery_of_images', 'Группа галерей изображений', 5, 1, 'Создано в phpMyAdmin', 1, 1341394795, 1341394814),
(6, 'Галерея видео', 'gallery_of_videos', 'Группа галерей видео', 6, 1, 'Создано в phpMyAdmin', 1, 1341394795, 1341394814),
(8, 'Актуальное', 'actual_info', 'Группа актуальной информации', 8, 1, 'Создано в phpMyAdmin', 1, 1341394795, 1341394814),
(9, 'Мультигалереи', 'multi_gallerys', 'Группа Мультигалерей', 9, 1, 'Создано в phpMyAdmin', 1, 1341394795, 1341394814);

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
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `default` tinyint(1) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `default`, `alias`, `title`, `image`, `ordering`, `published`) VALUES
(1, 1, 'uk', 'Українська', '', 1, 1),
(2, 0, 'ru', 'Русский', '', 2, 1),
(3, 0, 'en', 'English', '', 3, 1);

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
  `public_url` text,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `type` varchar(32) DEFAULT NULL,
  `thumbnail` text,
  `keywords` text,
  `admin_comment` text,
  `date_created` int(11) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media_categories_id`, `name`, `server_path`, `public_url`, `title`, `description`, `type`, `thumbnail`, `keywords`, `admin_comment`, `date_created`, `user_created`, `date_modified`, `user_modified`, `published`) VALUES
(1, 5, '1_images.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '1_images.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039671, NULL, 1343039671, NULL, NULL),
(2, 5, '5_images.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '5_images.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039673, NULL, 1343039673, NULL, NULL),
(3, 5, '54350main_MM_image_feature_101_jw4.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '54350main_MM_image_feature_101_jw4.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039675, NULL, 1343039675, NULL, NULL),
(4, 5, 'fantasy-5.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'fantasy-5.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039677, NULL, 1343039677, NULL, NULL),
(5, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039679, NULL, 1343039679, NULL, NULL),
(6, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039681, NULL, 1343039681, NULL, NULL),
(7, 5, 'images-Autumn1600x1200.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'images-Autumn1600x1200.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039683, NULL, 1343039683, NULL, NULL),
(8, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1343039685, NULL, 1343039685, NULL, NULL),
(9, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039688, NULL, 1343039688, NULL, NULL),
(10, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039690, NULL, 1343039690, NULL, NULL),
(11, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039692, NULL, 1343039692, NULL, NULL),
(12, 5, 'nature-images-62.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'nature-images-62.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039694, NULL, 1343039694, NULL, NULL),
(13, 5, 'pia12832-browse.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'pia12832-browse.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039699, NULL, 1343039699, NULL, NULL),
(14, 5, 'Random-Picture-I-have-in-my-images-folder-PART-1-random-4862339-1024-1024.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Random-Picture-I-have-in-my-images-folder-PART-1-random-4862339-1024-1024.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343039703, NULL, 1343039703, NULL, NULL),
(15, 5, 'img_bibo_10_.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'img_bibo_10_.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343040535, NULL, 1343040535, NULL, NULL),
(16, 5, 'teddy2.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'teddy2.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343040577, NULL, 1343040577, NULL, NULL),
(17, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343049940, NULL, 1343049940, NULL, NULL),
(18, 0, '1_images.jpg', 'W:\\home\\duep\\public\\uploads', '', '1_images.jpg', '', 'jpg', '', '', '', 1343049973, NULL, 1343050000, NULL, 0),
(19, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343050177, NULL, 1343050177, NULL, NULL),
(20, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343050355, NULL, 1343050355, NULL, NULL),
(21, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343050394, NULL, 1343050394, NULL, NULL),
(22, 5, 'SENIC-Заставка-на-нерабочий-сайт4.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'SENIC-Заставка-на-нерабочий-сайт4.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343050439, NULL, 1343050439, NULL, NULL),
(23, 5, 'i5P8C1Kljyw.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'i5P8C1Kljyw.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343051455, NULL, 1343051455, NULL, NULL),
(24, 5, 'otkritki-0028.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'otkritki-0028.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343227849, NULL, 1343227849, NULL, NULL),
(33, 5, 'Q_cLuikCuqk.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Q_cLuikCuqk.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343299545, NULL, 1343299545, NULL, NULL),
(32, 5, 'Q_cLuikCuqk.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Q_cLuikCuqk.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343299147, NULL, 1343299147, NULL, NULL),
(31, 5, 'SENIC-Заставка-на-нерабочий-сайт3.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'SENIC-Заставка-на-нерабочий-сайт3.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343299094, NULL, 1343299094, NULL, NULL),
(30, 5, 'otkritki-0028.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'otkritki-0028.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343299019, NULL, 1343299019, NULL, NULL),
(34, 5, 'images-Autumn1600x1200.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'images-Autumn1600x1200.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343299722, NULL, 1343299722, NULL, NULL),
(35, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343299807, NULL, 1343299807, NULL, NULL),
(36, 5, 'img_bibo_10_.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'img_bibo_10_.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343299846, NULL, 1343299846, NULL, NULL),
(37, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343299856, NULL, 1343299856, NULL, NULL),
(38, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343300210, NULL, 1343300210, NULL, NULL),
(39, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343300406, NULL, 1343300406, NULL, NULL),
(40, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343302680, NULL, 1343302680, NULL, NULL),
(41, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343973415, NULL, 1343973415, NULL, NULL),
(42, 5, 'teddy2.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'teddy2.jpg', NULL, 'jpg', NULL, NULL, NULL, 1343974300, NULL, 1343974300, NULL, NULL),
(43, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344257255, NULL, 1344257255, NULL, NULL),
(44, 5, 'images-Autumn1600x1200.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'images-Autumn1600x1200.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344257283, NULL, 1344257283, NULL, NULL),
(45, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344257356, NULL, 1344257356, NULL, NULL),
(46, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344257438, NULL, 1344257438, NULL, NULL),
(47, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344257579, NULL, 1344257579, NULL, NULL),
(48, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344411743, NULL, 1344411743, NULL, NULL),
(49, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344411873, NULL, 1344411873, NULL, NULL),
(50, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344411925, NULL, 1344411925, NULL, NULL),
(51, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344411972, NULL, 1344411972, NULL, NULL),
(52, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344412087, NULL, 1344412087, NULL, NULL),
(53, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344412529, NULL, 1344412529, NULL, NULL),
(54, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344412811, NULL, 1344412811, NULL, NULL),
(55, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344412842, NULL, 1344412842, NULL, NULL),
(56, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344412875, NULL, 1344412875, NULL, NULL),
(57, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344412943, NULL, 1344412943, NULL, NULL),
(58, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344413085, NULL, 1344413085, NULL, NULL),
(59, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344413904, NULL, 1344413904, NULL, NULL),
(60, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344415124, NULL, 1344415124, NULL, NULL),
(61, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344417765, NULL, 1344417765, NULL, NULL),
(62, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344418103, NULL, 1344418103, NULL, NULL),
(63, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344418142, NULL, 1344418142, NULL, NULL),
(64, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344418888, NULL, 1344418888, NULL, NULL),
(65, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344419682, NULL, 1344419682, NULL, NULL),
(66, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344420395, NULL, 1344420395, NULL, NULL),
(67, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344420412, NULL, 1344420412, NULL, NULL),
(68, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344420451, NULL, 1344420451, NULL, NULL),
(69, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344422313, NULL, 1344422313, NULL, NULL),
(70, 5, 'images-Autumn1600x1200.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'images-Autumn1600x1200.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344422336, NULL, 1344422336, NULL, NULL),
(71, 5, 'img_bibo_10_.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'img_bibo_10_.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344422349, NULL, 1344422349, NULL, NULL),
(72, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344422382, NULL, 1344422382, NULL, NULL),
(73, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344422740, NULL, 1344422740, NULL, NULL),
(74, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344422773, NULL, 1344422773, NULL, NULL),
(75, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344423178, NULL, 1344423178, NULL, NULL),
(76, 5, 'teddy2.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'teddy2.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344423194, NULL, 1344423194, NULL, NULL),
(77, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344423391, NULL, 1344423391, NULL, NULL),
(78, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344423418, NULL, 1344423418, NULL, NULL),
(79, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344425797, NULL, 1344425797, NULL, NULL),
(80, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344425972, NULL, 1344425972, NULL, NULL),
(81, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344425976, NULL, 1344425976, NULL, NULL),
(82, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344425992, NULL, 1344425992, NULL, NULL),
(83, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344425996, NULL, 1344425996, NULL, NULL),
(84, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344426002, NULL, 1344426002, NULL, NULL),
(85, 5, 'fantasy-5.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'fantasy-5.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344426012, NULL, 1344426012, NULL, NULL),
(86, 5, '1_images.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '1_images.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344426023, NULL, 1344426023, NULL, NULL),
(87, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344431779, NULL, 1344431779, NULL, NULL),
(88, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344432143, NULL, 1344432143, NULL, NULL),
(89, 5, 'teddy2.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'teddy2.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344432300, NULL, 1344432300, NULL, NULL),
(90, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344432332, NULL, 1344432332, NULL, NULL),
(91, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344432354, NULL, 1344432354, NULL, NULL),
(92, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344432364, NULL, 1344432364, NULL, NULL),
(93, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344432502, NULL, 1344432502, NULL, NULL),
(94, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344432525, NULL, 1344432525, NULL, NULL),
(95, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344432552, NULL, 1344432552, NULL, NULL),
(96, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344496397, NULL, 1344496397, NULL, NULL),
(97, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344496413, NULL, 1344496413, NULL, NULL),
(98, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344496434, NULL, 1344496434, NULL, NULL),
(99, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344496450, NULL, 1344496450, NULL, NULL),
(100, 5, '5_images.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '5_images.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344496497, NULL, 1344496497, NULL, NULL),
(101, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344496547, NULL, 1344496547, NULL, NULL),
(102, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344496556, NULL, 1344496556, NULL, NULL),
(103, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344496679, NULL, 1344496679, NULL, NULL),
(104, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344497056, NULL, 1344497056, NULL, NULL),
(105, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344497070, NULL, 1344497070, NULL, NULL),
(106, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344497083, NULL, 1344497083, NULL, NULL),
(107, 5, 'images-Autumn1600x1200.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'images-Autumn1600x1200.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344497124, NULL, 1344497124, NULL, NULL),
(108, 5, '54350main_MM_image_feature_101_jw4.jpg', 'W:\\home\\duep\\public\\uploads', NULL, '54350main_MM_image_feature_101_jw4.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344497146, NULL, 1344497146, NULL, NULL),
(109, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344497659, NULL, 1344497659, NULL, NULL),
(110, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344499675, NULL, 1344499675, NULL, NULL),
(111, 5, 'images-Autumn1600x1200.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'images-Autumn1600x1200.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344499684, NULL, 1344499684, NULL, NULL),
(112, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344500464, NULL, 1344500464, NULL, NULL),
(113, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344500489, NULL, 1344500489, NULL, NULL),
(114, 5, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', 'W:\\home\\duep\\public\\uploads', NULL, 'JSNaturePhotos-JSNaturePhotosFeaturedImages2007239.JPG', NULL, 'jpg', NULL, NULL, NULL, 1344501053, NULL, 1344501053, NULL, NULL),
(115, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344501114, NULL, 1344501114, NULL, NULL),
(116, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344501177, NULL, 1344501177, NULL, NULL),
(117, 5, 'FD_image.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'FD_image.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344501187, NULL, 1344501187, NULL, NULL),
(118, 5, 'myspace-sunset-images-dam7-0012.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0012.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344501219, NULL, 1344501219, NULL, NULL),
(119, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344501233, NULL, 1344501233, NULL, NULL),
(120, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344501571, NULL, 1344501571, NULL, NULL),
(121, 5, 'Lake-Images-11.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'Lake-Images-11.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344501581, NULL, 1344501581, NULL, NULL),
(122, 5, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'GettyImages_144127204_0.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344502792, NULL, 1344502792, NULL, NULL),
(123, 5, 'myspace-sunset-images-dam7-0002.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'myspace-sunset-images-dam7-0002.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344502805, NULL, 1344502805, NULL, NULL),
(124, 5, 'images-Autumn1600x1200.jpg', 'W:\\home\\duep\\public\\uploads', NULL, 'images-Autumn1600x1200.jpg', NULL, 'jpg', NULL, NULL, NULL, 1344504058, NULL, 1344504058, NULL, NULL),
(125, 0, 'GettyImages_144127204_0.jpg', 'W:\\home\\duep\\public\\uploads', '', 'GettyImages_144127204_0.jpg', '', 'jpg', '', '', '', 1345117454, NULL, 1345117454, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `media_categories`
--

DROP TABLE IF EXISTS `media_categories`;
CREATE TABLE IF NOT EXISTS `media_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `alias` text NOT NULL,
  `public_url` text,
  `name_bc` varchar(255) DEFAULT NULL,
  `name_menu` varchar(255) DEFAULT NULL,
  `enable_rss` int(11) DEFAULT NULL,
  `enable_email` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `media_categories_id` int(11) DEFAULT NULL,
  `admin_comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `media_categories`
--

INSERT INTO `media_categories` (`id`, `title`, `alias`, `public_url`, `name_bc`, `name_menu`, `enable_rss`, `enable_email`, `date_created`, `user_created`, `date_modified`, `user_modified`, `published`, `media_categories_id`, `admin_comment`) VALUES
(5, 'Бейджи - иконки', 'content_thumbnails', '', '', '', 0, 0, 1342879667, NULL, 1342879667, NULL, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_relations`
--

DROP TABLE IF EXISTS `media_relations`;
CREATE TABLE IF NOT EXISTS `media_relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_id` int(11) NOT NULL,
  `relation_tbl_name` varchar(50) NOT NULL,
  `relation_tbl_id` int(11) NOT NULL,
  `relation_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `media_relations`
--

INSERT INTO `media_relations` (`id`, `media_id`, `relation_tbl_name`, `relation_tbl_id`, `relation_type`) VALUES
(1, 11, 'contents', 67, 'gallery_of_images'),
(2, 12, 'contents', 67, 'gallery_of_images'),
(3, 13, 'contents', 67, 'gallery_of_images'),
(4, 14, 'contents', 67, 'gallery_of_images'),
(5, 15, 'contents', 67, 'gallery_of_images'),
(7, 17, 'contents', 67, 'gallery_of_images'),
(8, 18, 'contents', 67, 'gallery_of_images');

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
(2, 'Шмалий', 'Максим', 'Владимирович', NULL, NULL, NULL, NULL, 1, 1, 12, NULL, NULL);

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
-- Table structure for table `structure`
--

DROP TABLE IF EXISTS `structure`;
CREATE TABLE IF NOT EXISTS `structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `structure_id` int(11) NOT NULL,
  `languages_alias` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `route_name` text NOT NULL,
  `params` text NOT NULL,
  `date_created` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL,
  `user_modified` int(11) NOT NULL,
  `admin_comment` text NOT NULL,
  `published` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`id`, `structure_id`, `languages_alias`, `title`, `url`, `route_name`, `params`, `date_created`, `user_created`, `date_modified`, `user_modified`, `admin_comment`, `published`, `ordering`) VALUES
(6, 5, 'uk', 'Університет', '/uk/university', '', '', 0, 0, 0, 0, '', 1, 0),
(5, 0, 'uk', 'Головна', '/uk', '', '', 0, 0, 0, 0, '', 1, 0),
(7, 0, 'ru', 'Главная', '/ru', '', '', 1345211011, 0, 0, 0, '', 1, 0),
(8, 0, 'en', 'Main page', '/en', '', '', 1345211041, 0, 0, 0, '', 0, 0);

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
