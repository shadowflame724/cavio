-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview` text COLLATE utf8mb4_unicode_ci,
  `preview_ru` text COLLATE utf8mb4_unicode_ci,
  `preview_it` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `body_ru` text COLLATE utf8mb4_unicode_ci,
  `body_it` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks`
--

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (1,1,'History','История','Mostra di più',NULL,NULL,NULL,'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.\n                ','Коллекция вдохновлена эпохой Возрождения Вероны, символом классического и высоко оцененного итальянского стиля, романтического и элегантного за один раз. Особое внимание уделяется деталям, выбору тканей и координации цветовых нюансов.','La collezione è ispirata alla città rinascimentale di Verona, simbolo del classico stile italiano molto apprezzato, romantico ed elegante alla volta. La cura particolare è dedicata ai dettagli, alla selezione dei tessuti e al coordinamento delle sfumature di colore.\n                ',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(2,1,'Expression of style','Выражение стиля','Espressione dello stile',NULL,NULL,NULL,'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details, in a hand manufacturing that exalt the textures, giving you furniture complements with a unique and timeless charm','Кроме того, в офисной зоне новая концепция пространства, адаптированная к вашим потребностям, оживляет элегантный и изысканный дизайн, который выражается в любящей заботе о деталях, в ручном производстве, которое превозносит текстуры, придавая вам мебельные дополнения с уникальным и Вневременное очарование','Anche nell\'area dell\'ufficio un nuovo concetto di spazio, adattato alle vostre esigenze, riesce a ripristinare un design elegante e raffinato che si esprime in una cura amorosa per i dettagli, in una lavorazione a mano che esalta le texture, dando complementi di mobili con un unico e Fascino senza tempo.\n                ','under-history-right.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(3,1,'','','',NULL,NULL,NULL,'The lifelong experience is being reflected in almost every project. At Cavio-Casa, we are welcoming challenges to foster our creativity. People inspire us and we want to inspire them too.<br>\n                        <br>Everything we do at Cavio-Casa is guided by our vision to ensure that we all go the extra mile to help our customers reach their audiences. So far, we have achieved to play a dynamic role in shaping the jewelry industry.\n                        ','Жизненный опыт отражается почти во всех проектах. В Cavio-Casa мы приветствуем проблемы, способствующие нашему творчеству. Люди вдохновляют нас, и мы хотим их вдохновить. <br>\n                         <br> Все, что мы делаем в Cavio-Casa, руководствуется нашим видением, чтобы все мы прошли лишнюю милю, чтобы помочь нашим клиентам достичь своей аудитории. До сих пор мы достигли динамичной роли в формировании ювелирной промышленности.','L\'esperienza permanente si riflette in quasi tutti i progetti. A Cavio-Casa, stiamo accogliendo sfide per promuovere la nostra creatività. La gente ci ispira e vogliamo ispirare anche loro<br>\n                         <br> Tutto quello che facciamo a Cavio-Casa è guidato dalla nostra visione per assicurarci che tutti noi passiamo il miglio supplementare per aiutare i nostri clienti a raggiungere il loro pubblico. Finora abbiamo raggiunto un ruolo dinamico nella progettazione dell\'industria dei gioielli.','under-history-left.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(4,1,'Philosofhy','Философия','Filosofia',NULL,NULL,NULL,'The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.\n                ','\nКоллекция вдохновлена эпохой Возрождения Вероны, символом классического и высоко оцененного итальянского стиля, романтического и элегантного за один раз. Особое внимание уделяется деталям, выбору тканей и координации цветовых нюансов.','La collezione è ispirata alla città rinascimentale di Verona, simbolo del classico stile italiano molto apprezzato, romantico ed elegante alla volta. La cura particolare è dedicata ai dettagli, alla selezione dei tessuti e al coordinamento delle sfumature di colore.\n                ',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(5,1,'','','',NULL,NULL,NULL,'Everything we do at Cavio-Casa is guided by our vision to ensure that we all go the extra mile to help our customers reach their audiences. So far, we have achieved to play a dynamic role in shaping the jewelry industry.<br>\n\nThe lifelong experience is being reflected in almost every project. At Cavio-Casa, we are welcoming challenges to foster our creativity. People inspire us and we want to inspire them too.','Все, что мы делаем в Cavio-Casa, руководствуется нашим видением, чтобы все мы прошли лишнюю милю, чтобы помочь нашим клиентам достичь своей аудитории. До сих пор мы достигли динамичной роли в формировании ювелирной промышленности.<br>\n\nЖизненный опыт отражается почти во всех проектах. В Cavio-Casa мы приветствуем проблемы, способствующие нашему творчеству. Люди вдохновляют нас, и мы хотим вдохновить их тоже.','Tutto quello che facciamo a Cavio-Casa è guidato dalla nostra visione per assicurare che tutti noi andiamo il miglio supplementare per aiutare i nostri clienti a raggiungere il loro pubblico. Finora abbiamo raggiunto un ruolo dinamico nella progettazione dell\'industria dei gioielli<br>\n                         <br> L\'esperienza permanente si riflette in quasi tutti i progetti. A Cavio-Casa, stiamo accogliendo sfide per promuovere la nostra creatività. Le persone ci ispirano e vogliamo ispirare anche loro.',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(6,1,'','','',NULL,NULL,NULL,'We have been renowned for the high quality of our hand-made products, the innovative ideas, the effective co-operation with clients around the world and the ability to tailor our services to each customer’s needs surpassing their expectations.<br>\n                        <br>We are always next to you, full of new ideas, determination and love because we believe in what we do.','Мы были известны высоким качеством наших изделий ручной работы, инновационными идеями, эффективным сотрудничеством с клиентами по всему миру и возможностью адаптировать наши услуги к потребностям каждого клиента, превосходящим их ожидания. <br>\n                         <br> Мы всегда рядом с вами, полны новых идей, решительности и любви, потому что мы верим в то, что делаем.','Siamo stati rinomati per l\'alta qualità dei nostri prodotti fatti a mano, le idee innovative, l\'efficace collaborazione con i clienti in tutto il mondo e la capacità di adattare i nostri servizi alle esigenze di ogni cliente che supera le loro aspettative.<br>\n                         <br> Siamo sempre accanto a voi, pieno di nuove idee, determinazione e amore perché crediamo in ciò che facciamo.',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(7,1,'','','',NULL,NULL,NULL,'The <span class=colored>freedom</span>\n                        to to juxtapose<br>\n                        different materials, finishes<br>\n                        and <span class=colored>stunning</span>\n                        visual.','<span class=colored>Свобода</span>\n                        для сопоставления<br>\n                        разных материалов и отделок<br>\n                        и <span class=colored>ошеломляющий</span>\n                        визуал.','La <span class=colored>libertà</span>\n                        Per giungere a destra<br>\n                         Materiali diversi, finiture<br>\n                        e <span class=colored>stunning</span>\n                        visivo.',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(8,1,'Mood','Настроение','Umore',NULL,NULL,NULL,'Special care is devoted to details, the selection of tissues, and the coordination of color nuances. The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time.\n                ','Особое внимание уделяется деталям, выбору тканей и координации цветовых нюансов. Коллекция вдохновлена эпохой Возрождения Вероны, символом классического и высоко оцененного итальянского стиля, романтического и элегантного за один раз.','La cura particolare è dedicata ai dettagli, alla selezione dei tessuti e al coordinamento delle sfumature di colore. La collezione è ispirata alla città rinascimentale di Verona, simbolo del classico stile italiano molto apprezzato, romantico ed elegante alla volta.',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(9,1,'','','',NULL,NULL,NULL,'','','',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(10,1,'Expression','Выражение','Espressione\n',NULL,NULL,NULL,'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details.\n                ','Кроме того, в офисе новая концепция пространства, адаптированная к вашим потребностям, оживляет элегантный и изысканный дизайн, который выражает себя в любящей заботе о деталях.','Anche nell\'area dell\'ufficio un nuovo concetto di spazio, adattato alle vostre esigenze, riesumina un design elegante e raffinato che si esprime in una cura amorosa per i dettagli.\n                ',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(11,1,'Style','Стиль','Stile',NULL,NULL,NULL,'In a hand manufacturing that exalt the textures, giving you furniture complements with a unique and timeless charm.\n                ','В ручном производстве, которые превозносят текстуры, дают вам комплименты мебели с уникальным и неподвластным времени очарованием.','In una produzione a mano che esalta le texture, dandovi complimenti per mobili con un fascino unico e senza tempo.',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(12,1,'Quality','Качество','Qualità\n',NULL,NULL,NULL,'Also in the office area a new concept of space, tailored to your needs, to revive an elegant and refined design that expresses itself in a loving care for details.\n                ','Кроме того, в офисе новая концепция пространства, адаптированная к вашим потребностям, оживляет элегантный и изысканный дизайн, который выражает себя в любящей заботе о деталях.','Anche nell\'area dell\'ufficio un nuovo concetto di spazio, adattato alle vostre esigenze, riesumina un design elegante e raffinato che si esprime in una cura amorosa per i dettagli.',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(13,2,'CAVIO Factory & Showroom','CAVIO Фабрики & Посредники','CAVIO Factory & Showroom',NULL,NULL,NULL,'Viale Europa, 6/a, 37050<br>San Pietro di Morubio (VR)\n                            Italia<br><br>Telefone: <a href=\"tel:+39 045 71 44 503\" class=tel>+39 045 71 44 503</a><br>Fax:\n                            <a href=\"tel:+39 045 71 44 277\" class=tel>+39 045 71 44 277</a><br><br><a\n                                    href=mailto:info@cavio.it class=\"colored_link anim-underline\">info@cavio.it</a>','Viale Europa, 6/a, 37050<br>San Pietro di Morubio (VR)\n                            Italia<br><br>Telefone: <a href=\"tel:+39 045 71 44 503\" class=tel>+39 045 71 44 503</a><br>Fax:\n                            <a href=\"tel:+39 045 71 44 277\" class=tel>+39 045 71 44 277</a><br><br><a\n                                    href=mailto:info@cavio.it class=\"colored_link anim-underline\">info@cavio.it</a>','Viale Europa, 6/a, 37050<br>San Pietro di Morubio (VR)\n                            Italia<br><br>Telefone: <a href=\"tel:+39 045 71 44 503\" class=tel>+39 045 71 44 503</a><br>Fax:\n                            <a href=\"tel:+39 045 71 44 277\" class=tel>+39 045 71 44 277</a><br><br><a\n                                    href=mailto:info@cavio.it class=\"colored_link anim-underline\">info@cavio.it</a>','cont-r.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(14,2,'','','',NULL,NULL,NULL,'','','','cont-map.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(15,2,'','','',NULL,NULL,NULL,'','','','cont-bottom.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(16,8,'Our philosofy','Наша философия','La nostra filosofia',NULL,NULL,NULL,'<div class=wrap-phil-p><p>Italian furniture showroom CAVIO found its adherents in 38\n                                    countries, including Switzerland, France, Sweden, Netherlands, Germany, Australia\n                                    and the United States.</div>\n                            <div class=wrap-phil-p><p>In Kiev, the Italian furniture CAVIO presented in several\n                                    showrooms, conveniently located on the left and right banks.</div>\n                            <div class=wrap-phil-p><p>Here, professional consultants will help you to implement a\n                                    holistic complete interior - from the kitchen, bedroom, living room and study to the\n                                    children\'s room <a href=# class=link-arrow>→</a></div>','<div class=wrap-phil-p><p>Итальянский мебельный салон CAVIO нашел своих приверженцев в 38\n                                     Страны, включая Швейцарию, Францию, Швецию, Нидерланды, Германию, Австралию\n                                     И Соединенные Штаты.</div>\n                            <div class=wrap-phil-p><p>В Киеве итальянская мебель CAVIO представлена в нескольких\n                                     Выставочные залы, удобно расположенные на левом и правом берегах.</div>\n                            <div class=wrap-phil-p><p>Здесь профессиональные консультанты помогут вам реализовать\n                                     Целостный полный интерьер - от кухни, спальни, гостиной и кабинета до\n                                     Детская комната<a href=# class=link-arrow>→</a></div>','<div class = wrap-phil-p> <p> Lo showroom di mobili italiani CAVIO ha trovato i suoi aderenti a 38 anni\n                                     Paesi, tra cui Svizzera, Francia, Svezia, Paesi Bassi, Germania, Australia\n                                     E gli Stati Uniti. </div>\n                             </div> <div class = wrap-phil-p> <p> A Kiev, l\'arredamento italiano CAVIO presentato in diversi\n                                     Showroom, situato convenientemente sulla banca sinistra e destra. </div>\n                             <div class = wrap-phil-p> <p> Qui, i consulenti professionali ti aiuteranno ad attuare una\n                                     Interni completi olistici - dalla cucina, camera da letto, soggiorno e studio al\n                                     Camera per bambini <a href=# class=link-arrow> → </a> </div>','phil-image.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(17,9,'Privacy Policy','Политика приватности','Politica sulla riservatezza\n',NULL,NULL,NULL,'','','',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(18,5,'','','',NULL,NULL,NULL,'','','','show_r-slide-2.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(19,5,'','','',NULL,NULL,NULL,'','','','show_r-slide-3.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(20,5,'','','',NULL,NULL,NULL,'','','','show_r-slide-1.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42'),(21,5,'','','',NULL,NULL,NULL,'Don’t found showroom<br>\n                        near you? <span class=colored>Contact main</span>\n                        <br>','Не нашли салон рядом<br>\n                       с вами? <span class=colored>Обратитесь в главный</span>\n                        <br>','Non ho trovato lo showroom<br>\n                        vicino a te? <span class=colored>Contatto principale</span>\n                        <br>',NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(22,5,'Main Showroom','Главный магазин','Showroom principale',NULL,NULL,NULL,'Viale Europa, 6/a, 37050<br>\n                            San Pietro di Morubio (VR) Italia<br>\n                            <br>\n                            Telefone: <a href=tel:+390457144503 class=tel>+39 045 71 44 503</a>\n                            <br>\n                            Fax: <a href=tel:+390457144277 class=tel>+39 045 71 44 277</a>\n                            <br>\n                            <br>\n                            <a href=mailto:info@cavio.it class=\"colored_link anim-underline\">info@cavio.it</a>','Viale Europa, 6/a, 37050<br>\n                            San Pietro di Morubio (VR) Italia<br>\n                            <br>\n                            Telefone: <a href=tel:+390457144503 class=tel>+39 045 71 44 503</a>\n                            <br>\n                            Fax: <a href=tel:+390457144277 class=tel>+39 045 71 44 277</a>\n                            <br>\n                            <br>\n                            <a href=mailto:info@cavio.it class=\"colored_link anim-underline\">info@cavio.it</a>','Viale Europa, 6/a, 37050<br>\n                            San Pietro di Morubio (VR) Italia<br>\n                            <br>\n                            Telefone: <a href=tel:+390457144503 class=tel>+39 045 71 44 503</a>\n                            <br>\n                            Fax: <a href=tel:+390457144277 class=tel>+39 045 71 44 277</a>\n                            <br>\n                            <br>\n                            <a href=mailto:info@cavio.it class=\"colored_link anim-underline\">info@cavio.it</a>','main-showroom.jpg','2017-07-04 07:10:42','2017-07-04 07:10:42');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_lft_index` (`lft`),
  KEY `categories_rgt_index` (`rgt`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,14,0,'STORAGE & CABINETS','ХРАНЕНИЕ И ШКАФЫ','IMMAGAZZINAGGIO E CABINET','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(2,NULL,15,26,0,'TABLES & CONSOLES','ТАБЛИЦЫ И КОНСОЛИ','TABELLE E CONSOLLE',NULL,'2017-07-04 07:10:45','2017-07-04 07:10:45'),(3,NULL,27,38,0,'BEDS, SOFAS & SITTINGS','КРОВАТИ, СОФИЯ И САЙТЫ','LETTI, SOFAS E SITTING',NULL,'2017-07-04 07:10:45','2017-07-04 07:10:45'),(4,NULL,39,50,0,'ACCESSORIES','АКСЕССУАРЫ','ACCESSORI\n',NULL,'2017-07-04 07:10:45','2017-07-04 07:10:45'),(5,1,2,3,1,'Cabinets','Кабинет','Armadietti\n','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(6,1,4,5,1,'Wardrobes','Шкафы\n','Armadi','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(7,1,6,7,1,'Sideboards','Бачки','Basette','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(8,1,8,9,1,'TV-stands','Столы для телевизоров','TV-stands','M164,109.8l-2.6,6l-1,4.5v16.3h0.7l2.9,6.7h-0.6c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4H155\n	c-1.3,0-2.4-1.1-2.4-2.4v-2c-0.5-0.7-0.7-1.5-0.9-2.3H47.3c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1\n	c-1.3,0-2.4-1.1-2.4-2.4v-2c-0.5-0.7-0.7-1.5-0.9-2.3H35l2.9-6.7h0.7v-16.3l-1-4.5l-2.6-6h50.2v-3.8H50.9V50h97.3v56.1h-34.3v3.8\n	H164z M154.4,144.7l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.6\n	C153.8,143.8,154,144.3,154.4,144.7z M37.7,143.3c0.1,0.5,0.3,0.9,0.6,1.3l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4H44\n	c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3H37.7z M38,141.3H161l-1.1-2.7h-41.1H80.3H39.2L38,141.3z M80.3,119.2\n	h38.4h40l0.6-2.7H39.7l0.6,2.7H80.3z M40.5,121.2v15.4h39.8v-15.4H40.5z M116.7,127.9v-6.7H82.3v6.7H116.7z M82.3,129.9v6.7h34.4\n	v-6.7H82.3z M118.7,121.2v15.4h39.8v-15.4H118.7z M146.2,104.1V52H52.9v52.1h32.3h28.6H146.2z M87.2,106.1v3.8h24.6v-3.8H87.2z\n	 M85.2,111.8H38l1.1,2.7h120.7l1.1-2.7h-47.1H85.2z M54.9,54h89.3v48.1H54.9V54z M56.9,100.1h85.3V56H56.9V100.1z M137.7,131.8\n	c-1.6,0-2.8-1.3-2.8-2.8c0-1.6,1.3-2.8,2.8-2.8c1.6,0,2.8,1.3,2.8,2.8C140.5,130.5,139.2,131.8,137.7,131.8z M137.7,128.1\n	c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8c0.5,0,0.8-0.4,0.8-0.8C138.5,128.5,138.1,128.1,137.7,128.1z M61.1,131.8\n	c-1.6,0-2.8-1.3-2.8-2.8c0-1.6,1.3-2.8,2.8-2.8c1.6,0,2.8,1.3,2.8,2.8C63.9,130.5,62.6,131.8,61.1,131.8z M61.1,128.1\n	c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8c0.5,0,0.8-0.4,0.8-0.8C61.9,128.5,61.5,128.1,61.1,128.1z','2017-07-04 07:10:45','2017-07-04 07:10:45'),(9,1,10,11,1,'Commodes & Bedsides','Комоды и постельные принадлежности','Commodes & Bedisdes','M154.4,57.3v77.6l1,4.4l2.6,5.9h-0.6c-0.1,0.8-0.4,1.6-0.9,2.2v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2\n	c-0.5-0.7-0.8-1.5-0.9-2.2H54.4c-0.1,0.8-0.4,1.6-0.9,2.2v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2\n	c-0.5-0.7-0.8-1.5-0.9-2.2H42l2.6-5.9l1-4.4V57.3l-1-4.4L42,46.9h116l-2.6,5.9L154.4,57.3z M148.3,146.6l0.2,0.3v2.6\n	c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.7C147.8,145.8,148,146.2,148.3,146.6z\n	 M45.3,146.6l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4H51c0.2,0,0.4-0.2,0.4-0.4v-2.6l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.7\n	C44.8,145.8,45,146.2,45.3,146.6z M45,143.3h109.9l-1.1-2.7H46.2L45,143.3z M152.6,56.2l0.6-2.7H46.8l0.6,2.7H152.6z M47.5,58.2V134\n	h104.9V58.2H47.5z M152.6,136H47.3l-0.6,2.7h106.4L152.6,136z M45,48.9l1.1,2.7h107.6l1.1-2.7H45z M55.4,110.6h89.2v17.8H55.4V110.6\n	z M57.4,126.4h85.2v-13.8H57.4V126.4z M123.6,122.9c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4\n	C127.1,121.4,125.5,122.9,123.6,122.9z M123.6,118.1c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5\n	C125.1,118.7,124.4,118.1,123.6,118.1z M76.4,122.9c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4\n	C79.8,121.4,78.3,122.9,76.4,122.9z M76.4,118.1c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5\n	C77.8,118.7,77.2,118.1,76.4,118.1z M55.4,87.2h89.2V105H55.4V87.2z M57.4,103h85.2V89.2H57.4V103z M123.6,99.6\n	c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4C127.1,98,125.5,99.6,123.6,99.6z M123.6,94.7\n	c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5C125.1,95.3,124.4,94.7,123.6,94.7z M76.4,99.6\n	c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4C79.8,98,78.3,99.6,76.4,99.6z M76.4,94.7\n	c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5C77.8,95.3,77.2,94.7,76.4,94.7z M55.4,64.2h89.2v17.8H55.4\n	V64.2z M57.4,79.9h85.2V66.2H57.4V79.9z M123.6,76.5c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4\n	C127.1,74.9,125.5,76.5,123.6,76.5z M123.6,71.6c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5\n	C125.1,72.2,124.4,71.6,123.6,71.6z M76.4,76.5c-1.9,0-3.5-1.5-3.5-3.4c0-1.9,1.6-3.4,3.5-3.4c1.9,0,3.5,1.5,3.5,3.4\n	C79.8,74.9,78.3,76.5,76.4,76.5z M76.4,71.6c-0.8,0-1.5,0.7-1.5,1.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5\n	C77.8,72.2,77.2,71.6,76.4,71.6z','2017-07-04 07:10:45','2017-07-04 07:10:45'),(10,1,12,13,1,'Drink Cabinets','Шкафы для напитков','Armadietti per bevande','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(11,2,16,17,1,'Dining Tables','Обеденные столы','Tavoli da pranzo',NULL,'2017-07-04 07:10:45','2017-07-04 07:10:45'),(12,2,18,19,1,'Consoles','Консоли','Console','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(13,2,20,21,1,'Coffee Tables','Журнальные столики','Tavolini da caffè','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(14,2,22,23,1,'Toilets','Ванная','Servizi igienici','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(15,2,24,25,1,'Writing Desks','Письменные столы','Scrivere scrivanie','M30,64.9v7.7h6v11.8h2.4c-0.4,0.6-0.6,1.4-0.6,2.2c0,1.3,0.6,2.4,1.5,3.2c-0.9,0.8-1.5,1.9-1.5,3.2\n	c0,1.1,0.5,2.2,1.2,2.9c-0.4,0.3-0.8,0.6-1.2,1c-1,1.1-1.4,2.5-1.3,4l2.2,19.5c0.1,0.9,0.5,1.6,1.1,2.2c-0.9,0.8-1.5,1.9-1.5,3.2\n	c0,0,0.1,3.6,0.6,5v1.2c0,1.1,0.9,1.9,1.9,1.9h3.3c1.1,0,1.9-0.9,1.9-1.9v-1.2c0.5-1.4,0.6-5,0.6-5c0-1.4-0.7-2.6-1.7-3.3\n	c0.5-0.6,0.9-1.3,1-2.1l2.2-19.5c0.2-1.4-0.3-2.9-1.3-4c-0.3-0.3-0.6-0.6-1-0.9c0.8-0.8,1.3-1.8,1.3-3c0-1.3-0.6-2.4-1.5-3.2\n	c0.9-0.8,1.5-1.9,1.5-3.2c0-0.8-0.2-1.5-0.6-2.2h2.1v-3.6h102.5v3.6h2.4c-0.4,0.6-0.6,1.4-0.6,2.2c0,1.3,0.6,2.4,1.5,3.2\n	c-0.9,0.8-1.5,1.9-1.5,3.2c0,1.1,0.5,2.2,1.2,2.9c-0.4,0.3-0.8,0.6-1.2,1c-1,1.1-1.4,2.5-1.3,4l2.2,19.5c0.1,0.9,0.5,1.6,1.1,2.2\n	c-0.9,0.8-1.5,1.9-1.5,3.2c0,0,0.1,3.6,0.6,5v1.2c0,1.1,0.9,1.9,1.9,1.9h3.3c1.1,0,1.9-0.9,1.9-1.9v-1.2c0.5-1.4,0.6-5,0.6-5\n	c0-1.4-0.7-2.6-1.7-3.3c0.5-0.6,0.9-1.3,1-2.1l2.2-19.5c0.2-1.4-0.3-2.9-1.3-4c-0.3-0.3-0.6-0.6-1-0.9c0.8-0.8,1.3-1.8,1.3-3\n	c0-1.3-0.6-2.4-1.5-3.2c0.9-0.8,1.5-1.9,1.5-3.2c0-0.8-0.2-1.5-0.6-2.2h2.1V72.7h6v-7.7H30z M44.3,130l-0.2,0.3v1.7h-3.1v-1.4l0-0.3\n	l-0.2-0.3c0-0.1-0.1-0.3-0.1-0.5c0.6,0.3,1.2,0.4,1.8,0.4c0.7,0,1.3-0.2,1.9-0.5C44.3,129.7,44.3,129.9,44.3,130z M42.5,128\n	c-1.2,0-2.2-1-2.2-2.2c0-1.2,1-2.2,2.2-2.2s2.2,1,2.2,2.2C44.7,127,43.7,128,42.5,128z M46.2,100.7L44,120.2\n	c-0.1,0.8-0.8,1.5-1.6,1.5s-1.6-0.6-1.6-1.5l-2.2-19.5c-0.1-0.9,0.2-1.8,0.8-2.4c0.6-0.7,1.4-1,2.3-1h0.3h1.1h0.1\n	c0.9,0,1.7,0.4,2.3,1C46.1,98.9,46.3,99.8,46.2,100.7z M41.9,90.9h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1\n	c-1.2,0-2.2-1-2.2-2.2C39.8,91.8,40.7,90.9,41.9,90.9z M39.8,86.7c0-1.2,1-2.2,2.2-2.2h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2\n	h-1.1C40.7,88.9,39.8,87.9,39.8,86.7z M46.8,80.9v1.6h-3.7h-1.1H38v-9.8h8.8V80.9z M151.3,78.9H48.8v-6.2h102.5V78.9z M159.5,130\n	l-0.2,0.3v1.7h-3.1v-1.4l0-0.3l-0.2-0.3c0-0.1-0.1-0.3-0.1-0.5c0.6,0.3,1.2,0.4,1.8,0.4c0.7,0,1.3-0.2,1.9-0.5\n	C159.6,129.7,159.5,129.9,159.5,130z M157.8,128c-1.2,0-2.2-1-2.2-2.2c0-1.2,1-2.2,2.2-2.2s2.2,1,2.2,2.2\n	C159.9,127,159,128,157.8,128z M161.5,100.7l-2.2,19.5c-0.1,0.8-0.8,1.5-1.6,1.5s-1.6-0.6-1.6-1.5l-2.2-19.5\n	c-0.1-0.9,0.2-1.8,0.8-2.4c0.6-0.7,1.4-1,2.3-1h0.3h1.1h0.1c0.9,0,1.7,0.4,2.3,1C161.3,98.9,161.6,99.8,161.5,100.7z M157.2,90.9\n	h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1c-1.2,0-2.2-1-2.2-2.2C155,91.8,156,90.9,157.2,90.9z M155,86.7\n	c0-1.2,1-2.2,2.2-2.2h1.1c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-1.1C156,88.9,155,87.9,155,86.7z M162,82.5h-3.7h-1.1h-3.9v-1.6\n	v-8.2h8.8V82.5z M168,70.7h-4h-10.8h-2H48.8h-2H36h-4v-3.7h136V70.7z','2017-07-04 07:10:45','2017-07-04 07:10:45'),(16,3,28,29,1,'Beds','Кровати','Letti','M166.5,61.7h-3.7c-1.3,0-2.4,1.1-2.4,2.5v0.7c-8-3.1-47.1-17.9-52.2-17.9c-2.1,0-3.6,0.5-4.6,1.5\n	c-1.4,1.4-1.4,3.5-1.4,5.3l0,0.7c0,1.9-1.8,2-2.2,2c-0.2,0-2.2-0.1-2.2-2l0-0.7c0-1.8,0-3.9-1.4-5.3c-1-1-2.5-1.5-4.6-1.5\n	c-5.1,0-44.3,14.9-52.2,17.9v-0.7c0-1.4-1.1-2.5-2.4-2.5h-3.7c-1.3,0-2.4,1.1-2.4,2.5v85.3c0,1.4,1.1,2.5,2.4,2.5h3.7\n	c0.5,0,1-0.2,1.4-0.5c0.4,0.3,0.9,0.5,1.4,0.5h120c0.5,0,1-0.2,1.4-0.5c0.4,0.3,0.9,0.5,1.4,0.5h3.7c1.4,0,2.4-1.1,2.4-2.5V64.2\n	C169,62.8,167.9,61.7,166.5,61.7z M37.6,120.8v8v2v18.7c0,0.3-0.2,0.5-0.5,0.5h-3.7c-0.3,0-0.5-0.2-0.5-0.5V75.5h4.6V120.8z\n	 M37.6,73.5H33v-9.4c0-0.3,0.2-0.5,0.5-0.5h3.7c0.3,0,0.5,0.2,0.5,0.5V73.5z M160.4,149.4L160.4,149.4c0,0.3-0.2,0.5-0.4,0.5H40\n	c-0.2,0-0.4-0.2-0.4-0.4v0v-18.6h120.8V149.4z M160.4,128.7H39.6v-8c0-2.6,2.1-4.8,4.7-4.8h111.4c2.6,0,4.7,2.1,4.7,4.8V128.7z\n	 M59.2,113.5V97.9c0-0.3,0.2-0.5,0.5-0.5h33.6c0.2,0,0.5,0.2,0.5,0.5v15.6c0,0.3-0.2,0.5-0.5,0.5H59.7\n	C59.4,113.9,59.2,113.7,59.2,113.5z M106.3,113.5V97.9c0-0.3,0.2-0.5,0.5-0.5h33.6c0.2,0,0.5,0.2,0.5,0.5v15.6\n	c0,0.3-0.2,0.5-0.5,0.5h-33.6C106.5,113.9,106.3,113.7,106.3,113.5z M160.4,115.9c-1.2-1.2-2.9-2-4.7-2h-13c0-0.2,0.1-0.3,0.1-0.5\n	V97.9c0-1.4-1.1-2.5-2.4-2.5h-33.6c-1.3,0-2.4,1.1-2.4,2.5v15.6c0,0.2,0,0.3,0.1,0.5h-8.7c0-0.2,0.1-0.3,0.1-0.5V97.9\n	c0-1.4-1.1-2.5-2.4-2.5H59.7c-1.3,0-2.4,1.1-2.4,2.5v15.6c0,0.2,0,0.3,0.1,0.5h-13c-1.8,0-3.5,0.8-4.7,2V75.5h120.8V115.9z\n	 M160.4,73.5H39.6v-3.9c20.6-7.9,49.1-17.8,52.2-17.9c0.6,0,0.9,0.1,1.1,0.1c0,0.3,0.1,1,0,1.8l0,0.7c0,4.5,3.6,6.9,7,6.9\n	c3.4,0,7-2.4,7-6.9l0-0.7c0-0.9,0-1.5,0-1.8c0.2,0,0.5-0.1,1.1-0.1c3.2,0.1,31.7,10,52.3,17.9V73.5z M160.4,67.5\n	c-18.9-7.2-48.4-17.7-52.2-17.8c-0.9,0-2.1,0.1-2.6,0.7c-0.5,0.5-0.6,1.4-0.5,3.3l0,0.7c0,3.2-2.6,4.9-5,4.9c-2.4,0-5-1.7-5-4.8\n	l0-0.7c0-1.9,0-2.8-0.5-3.3c-0.5-0.5-1.7-0.7-2.6-0.7c0,0,0,0,0,0C88,49.8,58.4,60.3,39.6,67.5V67c13.7-5.3,48-18.1,52.2-18.1\n	c1.5,0,2.6,0.3,3.2,0.9c0.8,0.8,0.8,2.3,0.8,3.9l0,0.7c0,2.9,2.5,4,4.2,4c1.7,0,4.2-1.1,4.2-4l0-0.7c0-1.6,0-3.1,0.8-3.9\n	c0.6-0.6,1.7-0.9,3.2-0.9c4.3,0,38.6,12.8,52.2,18.1V67.5z M167,149.4c0,0.3-0.2,0.5-0.5,0.5h-3.7c-0.3,0-0.5-0.2-0.5-0.5v-18.7v-2\n	v-8V75.5h4.6V149.4z M167,73.5h-4.6v-9.4c0-0.3,0.2-0.5,0.5-0.5h3.7c0.3,0,0.5,0.2,0.5,0.5V73.5z','2017-07-04 07:10:45','2017-07-04 07:10:45'),(17,3,30,31,1,'Benches & Poufs','Скамейки и пуфы','Panche e Pouf','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(18,3,32,33,1,'Sofas & Armchairs','Диваны и кресла','Divani e poltrone','M145.9,103.9v37.5h-0.1c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2\n	c-0.5-0.7-0.7-1.5-0.9-2.3H63.8c-0.1,0.8-0.4,1.6-0.9,2.3v2c0,1.3-1.1,2.4-2.4,2.4h-5.1c-1.3,0-2.4-1.1-2.4-2.4v-2\n	c-0.5-0.7-0.7-1.5-0.9-2.3H52v-37.6h0.3C45.3,102.2,40,95.9,40,88.3c0-8.7,7.1-15.7,15.7-15.7c1.8,0,3.5,0.3,5.1,0.9\n	C61.4,61.5,71.4,52,83.4,52h32c12.1,0,22,9.5,22.6,21.5c1.6-0.6,3.4-0.9,5.2-0.9c8.7,0,15.7,7.1,15.7,15.7\n	C159,96.1,153.3,102.6,145.9,103.9z M136.7,142.7l0.2,0.3v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1c0.2,0,0.4-0.2,0.4-0.4V143l0.2-0.3\n	c0.3-0.4,0.5-0.9,0.6-1.3h-7.6C136.2,141.8,136.4,142.3,136.7,142.7z M54.8,142.7L55,143v2.6c0,0.2,0.2,0.4,0.4,0.4h5.1\n	c0.2,0,0.4-0.2,0.4-0.4V143l0.2-0.3c0.3-0.4,0.5-0.9,0.6-1.3h-7.6C54.3,141.8,54.5,142.3,54.8,142.7z M54,139.4h89.9v-35.3\n	c-0.2,0-0.4,0-0.6,0c-5.9,0-11-3.3-13.7-8.1v27H69.5V96c-2.7,4.8-7.8,8.1-13.7,8.1c-0.6,0-1.2,0-1.7-0.1V139.4z M127.5,121v-11.9\n	c-0.5-0.5-4.1-3.2-28-3.2s-27.6,2.7-28,3.2V121H127.5z M55.7,74.6c-7.6,0-13.7,6.2-13.7,13.7c0,7.6,6.2,13.7,13.7,13.7\n	c7.6,0,13.7-6.2,13.7-13.7C69.5,80.8,63.3,74.6,55.7,74.6z M115.4,54h-32C72.2,54,63,63.1,62.8,74.3c5.1,2.6,8.7,7.9,8.7,14v18.5\n	c3.1-1.5,10.6-2.9,28-2.9s24.9,1.4,28,2.9V88.3c0-6.1,3.5-11.4,8.5-14C135.9,63.1,126.7,54,115.4,54z M143.3,74.6\n	c-7.6,0-13.7,6.2-13.7,13.7c0,7.6,6.2,13.7,13.7,13.7c7.6,0,13.7-6.2,13.7-13.7C157,80.8,150.8,74.6,143.3,74.6z M143.3,94.8\n	c-3.6,0-6.5-2.9-6.5-6.5c0-3.6,2.9-6.5,6.5-6.5c3.6,0,6.5,2.9,6.5,6.5C149.8,91.9,146.9,94.8,143.3,94.8z M143.3,83.8\n	c-2.5,0-4.5,2-4.5,4.5c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5C147.8,85.9,145.8,83.8,143.3,83.8z M115.5,94.5l-2-2l-2,2l-1.4-1.4\n	l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L115.5,94.5z M115.5,74.3l-2-2l-2,2l-1.4-1.4l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2\n	L115.5,74.3z M87.4,94.5l-2-2l-2,2l-1.4-1.4l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L87.4,94.5z M87.4,74.3l-2-2l-2,2l-1.4-1.4\n	l2-2l-2-2l1.4-1.4l2,2l2-2l1.4,1.4l-2,2l2,2L87.4,74.3z M55.7,94.8c-3.6,0-6.5-2.9-6.5-6.5c0-3.6,2.9-6.5,6.5-6.5\n	c3.6,0,6.5,2.9,6.5,6.5C62.2,91.9,59.3,94.8,55.7,94.8z M55.7,83.8c-2.5,0-4.5,2-4.5,4.5c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5\n	C60.2,85.9,58.2,83.8,55.7,83.8z','2017-07-04 07:10:45','2017-07-04 07:10:45'),(19,3,34,35,1,'Chairs','Cтулья','Sedie\n','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(20,3,36,37,1,'Work Chairs','Рабочие стулья','Sedie da lavoro','M133.9,163c-2.8,0-5.1-2.3-5.1-5.1c0-1.3,0.5-2.4,1.2-3.3c-0.7-0.1-1.5-0.2-2.2-0.4l-24.3-5.9v6.2h-0.1\n	c0.8,0.9,1.3,2.1,1.3,3.3c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1c0-1.3,0.5-2.4,1.3-3.3h-0.1v-6.2l-24.3,5.9\n	c-0.7,0.2-1.5,0.3-2.2,0.4c0.8,0.9,1.2,2,1.2,3.3c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1c0-1.4,0.6-2.6,1.4-3.5v-0.6\n	c0-3.7,2.5-6.9,6.1-7.8l25.5-6.5V124h2.4v-5.6H75l-0.2-0.5l-6-6.5c-1.5-1.6-2.3-3.7-2.3-5.9v-15c-1.4-1.2-2.4-2.9-2.4-4.9\n	c0-3.3,2.6-6.1,5.9-6.3l4.7-5.7V55.1c0-10.5,8.6-19.1,19.2-19.1H105c10.6,0,19.2,8.6,19.2,19.1v18.3l4.8,5.7c3.3,0.3,5.9,3,5.9,6.3\n	c0,2-0.9,3.8-2.4,4.9v15c0,2.2-0.8,4.3-2.3,5.9l-6.1,6.5l-0.2,0.5h-20.5v5.6h2.4v15.6l25.5,6.5c3.6,0.9,6.1,4.1,6.1,7.8v0.6\n	c0.9,0.9,1.4,2.2,1.4,3.5C139,160.7,136.7,163,133.9,163z M68.5,105.4c0,1.7,0.6,3.3,1.8,4.5l3,3.2l-0.2-0.5\n	c-0.2-0.5-0.2-0.9-0.2-1.4l-1.3-5.2c-0.2-0.9-0.3-1.8-0.3-2.7V91.8c-0.2,0-0.5,0-0.7,0c-0.7,0-1.4-0.1-2-0.3V105.4z M74.7,76.6\n	l-2.3,2.8c0.9,0.3,1.7,0.7,2.3,1.3V76.6z M74.7,84.4c-0.5-1.9-2.2-3.3-4.2-3.3c-2.4,0-4.4,2-4.4,4.4c0,2.4,2,4.4,4.4,4.4\n	c2,0,3.7-1.4,4.2-3.3V84.4z M74.7,90.2c-0.4,0.4-0.9,0.7-1.5,1v12.3c0,0.3,0,0.6,0.1,0.9l1.4-3.6V90.2z M128.7,110\n	c1.2-1.2,1.8-2.9,1.8-4.5V91.5c-0.6,0.2-1.3,0.3-2,0.3c-0.3,0-0.5,0-0.7,0v11.7c0,0.9-0.1,1.8-0.3,2.7l-1.4,5.3\n	c0,0.4-0.1,0.9-0.2,1.3l-0.2,0.5L128.7,110z M124.2,100.8l1.5,3.6c0-0.3,0.1-0.6,0.1-0.9V91.2c-0.6-0.3-1.1-0.6-1.5-1V100.8z\n	 M124.2,86.5c0.5,1.9,2.2,3.4,4.3,3.4c2.4,0,4.4-2,4.4-4.4c0-2.4-2-4.4-4.4-4.4c-2.1,0-3.8,1.4-4.3,3.4V86.5z M124.2,80.7\n	c0.7-0.6,1.5-1.1,2.4-1.4l-2.4-2.9V80.7z M99.5,161c1.7,0,3.1-1.4,3.1-3.1c0-1.7-1.4-3.1-3.1-3.1c-1.7,0-3.1,1.4-3.1,3.1\n	C96.4,159.6,97.8,161,99.5,161z M101.4,153.2v-11.9h-3.9v11.9c0.6-0.2,1.3-0.4,1.9-0.4C100.2,152.8,100.8,153,101.4,153.2z\n	 M62,157.9c0,1.7,1.4,3.1,3.1,3.1c1.7,0,3.1-1.4,3.1-3.1c0-1.7-1.4-3.1-3.1-3.1C63.4,154.8,62,156.2,62,157.9z M68,147.9\n	c-2.4,0.6-4.1,2.5-4.5,4.9h2.6c1.5,0,3.1-0.2,4.6-0.5l24.8-6v-5h-1.3L68,147.9z M122.2,86.7c-0.1-0.4-0.1-0.8-0.1-1.3\n	c0-0.4,0-0.8,0.1-1.3V55.1c0-9.4-7.7-17.1-17.2-17.1H93.9c-9.5,0-17.2,7.7-17.2,17.1v29c0.1,0.4,0.2,0.9,0.2,1.4\n	c0,0.5-0.1,0.9-0.2,1.4V100h45.5V86.7z M124,105.5l-1.4-3.5H76.4l-1.4,3.5c-0.2,0.5-0.1,0.9,0.1,1.3c0.3,0.4,0.7,0.6,1.2,0.6h46.3\n	c0.5,0,0.9-0.2,1.2-0.6C124.1,106.4,124.1,105.9,124,105.5z M122.5,116.3l1.4-4.2c0.2-0.7,0.1-1.5-0.3-2c-0.2-0.2-0.5-0.6-1.1-0.6\n	H76.4c-0.5,0-0.9,0.4-1.1,0.6c-0.4,0.6-0.5,1.3-0.3,2l1.4,4.2h19.1h7.9H122.5z M97.5,118.3v5.6h3.9v-5.6H97.5z M103.9,126h-0.4h-7.9\n	h-0.4v13.4h0.4h7.9h0.4V126z M130.9,147.9l-26.2-6.6h-1.3v5l24.8,6c1.5,0.4,3,0.5,4.6,0.5h2.6C135.1,150.5,133.3,148.5,130.9,147.9z\n	 M133.9,154.8c-1.7,0-3.1,1.4-3.1,3.1c0,1.7,1.4,3.1,3.1,3.1s3.1-1.4,3.1-3.1C137,156.2,135.6,154.8,133.9,154.8z M87.4,49.1\n	c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C85,50.2,86.1,49.1,87.4,49.1z M87.4,51.9\n	c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,51.7,87.2,51.9,87.4,51.9z M87.4,59.1\n	c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S86.1,59.1,87.4,59.1z M87.4,61.9c0.2,0,0.4-0.2,0.4-0.4\n	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,61.7,87.2,61.9,87.4,61.9z M87.4,69.1c1.3,0,2.4,1.1,2.4,2.4\n	c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C85,70.2,86.1,69.1,87.4,69.1z M87.4,71.9c0.2,0,0.4-0.2,0.4-0.4\n	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C87,71.7,87.2,71.9,87.4,71.9z M87.4,79.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4\n	c-1.3,0-2.4-1.1-2.4-2.4S86.1,79.1,87.4,79.1z M87.4,81.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4\n	C87,81.7,87.2,81.9,87.4,81.9z M87.4,89.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4\n	C85,90.1,86.1,89.1,87.4,89.1z M87.4,91.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4\n	C87,91.7,87.2,91.9,87.4,91.9z M99.5,49.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4\n	C97.1,50.2,98.2,49.1,99.5,49.1z M99.5,51.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4\n	C99.1,51.7,99.3,51.9,99.5,51.9z M99.5,59.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S98.2,59.1,99.5,59.1z\n	 M99.5,61.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,61.7,99.3,61.9,99.5,61.9z M99.5,69.1\n	c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C97.1,70.2,98.2,69.1,99.5,69.1z M99.5,71.9\n	c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,71.7,99.3,71.9,99.5,71.9z M99.5,79.1\n	c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S98.2,79.1,99.5,79.1z M99.5,81.9c0.2,0,0.4-0.2,0.4-0.4\n	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,81.7,99.3,81.9,99.5,81.9z M99.5,89.1c1.3,0,2.4,1.1,2.4,2.4\n	c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C97.1,90.1,98.2,89.1,99.5,89.1z M99.5,91.9c0.2,0,0.4-0.2,0.4-0.4\n	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C99.1,91.7,99.3,91.9,99.5,91.9z M111.5,49.1c1.3,0,2.4,1.1,2.4,2.4\n	c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4C109.1,50.2,110.2,49.1,111.5,49.1z M111.5,51.9c0.2,0,0.4-0.2,0.4-0.4\n	c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4C111.1,51.7,111.3,51.9,111.5,51.9z M111.5,59.1c1.3,0,2.4,1.1,2.4,2.4\n	s-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4S110.2,59.1,111.5,59.1z M111.5,61.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4\n	c-0.2,0-0.4,0.2-0.4,0.4C111.1,61.7,111.3,61.9,111.5,61.9z M111.5,69.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4\n	c-1.3,0-2.4-1.1-2.4-2.4C109.1,70.2,110.2,69.1,111.5,69.1z M111.5,71.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4\n	c-0.2,0-0.4,0.2-0.4,0.4C111.1,71.7,111.3,71.9,111.5,71.9z M111.5,79.1c1.3,0,2.4,1.1,2.4,2.4s-1.1,2.4-2.4,2.4\n	c-1.3,0-2.4-1.1-2.4-2.4S110.2,79.1,111.5,79.1z M111.5,81.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4\n	C111.1,81.7,111.3,81.9,111.5,81.9z M111.5,89.1c1.3,0,2.4,1.1,2.4,2.4c0,1.3-1.1,2.4-2.4,2.4c-1.3,0-2.4-1.1-2.4-2.4\n	C109.1,90.1,110.2,89.1,111.5,89.1z M111.5,91.9c0.2,0,0.4-0.2,0.4-0.4c0-0.2-0.2-0.4-0.4-0.4c-0.2,0-0.4,0.2-0.4,0.4\n	C111.1,91.7,111.3,91.9,111.5,91.9z','2017-07-04 07:10:45','2017-07-04 07:10:45'),(21,4,40,41,1,'Mirrors','Зеркала','Specchi','M122.4,154H77.6L46,122.3V77.6l31.6-31.6h44.7L154,77.6v44.7L122.4,154z M152,78.4l-30.5-30.5H78.4L48,78.4\n	v43.1L78.4,152h43.1l30.5-30.5V78.4z M79.1,150.5l-29.6-29.6V79l29.6-29.6h41.8L150.5,79v41.8l-29.6,29.6H79.1z M148.5,79.9\n	l-28.4-28.4H79.9L51.5,79.9V120l28.4,28.4h40.2l28.4-28.4V79.9z M83.8,139.1l-23-23V83.7l23-23h32.5l23,23v32.5l-23,23H83.8z\n	 M137.2,84.5l-21.8-21.8H84.6L62.8,84.5v30.8l21.8,21.8h30.8l21.8-21.8V84.5z M85.3,135.4l-20.8-20.8V85.2l20.8-20.8h29.4l20.8,20.8\n	v29.4l-20.8,20.8H85.3z M133.5,86.1l-19.6-19.6H86.1L66.5,86.1v27.8l19.6,19.6h27.8l19.6-19.6V86.1z','2017-07-04 07:10:45','2017-07-04 07:10:45'),(22,4,42,43,1,'Lighting','Осветительные приборы','Illuminazione','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(23,4,44,45,1,'Art & Frames Tables','Художественные и рамочные таблицы','Tavole di arte e cornici','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(24,4,46,47,1,'Textiles','Текстиль','Tessile','','2017-07-04 07:10:45','2017-07-04 07:10:45'),(25,4,48,49,1,'Carpets','Ковры','Tappet','','2017-07-04 07:10:45','2017-07-04 07:10:45');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_zone_zone`
--

DROP TABLE IF EXISTS `collection_zone_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection_zone_zone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collection_zone_id` tinyint(4) NOT NULL,
  `zone_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_zone_zone`
--

LOCK TABLES `collection_zone_zone` WRITE;
/*!40000 ALTER TABLE `collection_zone_zone` DISABLE KEYS */;
INSERT INTO `collection_zone_zone` VALUES (1,1,1),(2,7,2),(3,13,3),(4,19,4),(5,25,5),(6,31,6),(7,2,1),(8,8,2),(9,14,3),(10,20,4),(11,26,5),(12,32,6),(13,3,1),(14,9,2),(15,15,3),(16,21,4),(17,27,5),(18,33,6),(19,4,1),(20,10,2),(21,16,3),(22,22,4),(23,28,5),(24,34,6),(25,5,1),(26,11,2),(27,17,3),(28,23,4),(29,29,5),(30,35,6),(31,6,1),(32,12,2),(33,18,3),(34,24,4),(35,30,5),(36,36,6);
/*!40000 ALTER TABLE `collection_zone_zone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_zones`
--

DROP TABLE IF EXISTS `collection_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection_zones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zone_id` tinyint(4) DEFAULT NULL,
  `collection_id` tinyint(4) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_zones`
--

LOCK TABLES `collection_zones` WRITE;
/*!40000 ALTER TABLE `collection_zones` DISABLE KEYS */;
INSERT INTO `collection_zones` VALUES (1,1,4,'Entrance1',NULL,NULL,'entrance1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(2,1,5,'Entrance1',NULL,NULL,'entrance1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(3,1,6,'Entrance1',NULL,NULL,'entrance1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(4,1,7,'Entrance1',NULL,NULL,'entrance1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(5,1,8,'Entrance1',NULL,NULL,'entrance1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(6,1,9,'Entrance1',NULL,NULL,'entrance1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(7,2,4,'Living1',NULL,NULL,'living1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(8,2,5,'Living1',NULL,NULL,'living1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(9,2,6,'Living1',NULL,NULL,'living1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(10,2,7,'Living1',NULL,NULL,'living1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(11,2,8,'Living1',NULL,NULL,'living1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(12,2,9,'Living1',NULL,NULL,'living1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(13,3,4,'Dining1',NULL,NULL,'dining1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(14,3,5,'Dining1',NULL,NULL,'dining1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(15,3,6,'Dining1',NULL,NULL,'dining1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(16,3,7,'Dining1',NULL,NULL,'dining1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(17,3,8,'Dining1',NULL,NULL,'dining1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(18,3,9,'Dining1',NULL,NULL,'dining1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(19,4,4,'Bedrooms1',NULL,NULL,'bedrooms1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(20,4,5,'Bedrooms1',NULL,NULL,'bedrooms1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(21,4,6,'Bedrooms1',NULL,NULL,'bedrooms1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(22,4,7,'Bedrooms1',NULL,NULL,'bedrooms1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(23,4,8,'Bedrooms1',NULL,NULL,'bedrooms1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(24,4,9,'Bedrooms1',NULL,NULL,'bedrooms1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(25,5,4,'Studio1',NULL,NULL,'studio1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(26,5,5,'Studio1',NULL,NULL,'studio1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(27,5,6,'Studio1',NULL,NULL,'studio1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(28,5,7,'Studio1',NULL,NULL,'studio1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(29,5,8,'Studio1',NULL,NULL,'studio1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(30,5,9,'Studio1',NULL,NULL,'studio1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(31,6,4,'Kids Bedroom1',NULL,NULL,'kids-bedroom1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(32,6,5,'Kids Bedroom1',NULL,NULL,'kids-bedroom1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(33,6,6,'Kids Bedroom1',NULL,NULL,'kids-bedroom1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(34,6,7,'Kids Bedroom1',NULL,NULL,'kids-bedroom1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(35,6,8,'Kids Bedroom1',NULL,NULL,'kids-bedroom1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47'),(36,6,9,'Kids Bedroom1',NULL,NULL,'kids-bedroom1','zon-col-list-long.jpg','2017-07-04 07:10:47','2017-07-04 07:10:47');
/*!40000 ALTER TABLE `collection_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_it` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (1,'Villa Cannes','Вилла Каннес','Cannes','villa-cannes','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'banner-main-1.jpg',1,'2017-07-04 07:10:43','2017-07-04 07:10:43'),(2,'Penthouse','Пентхаус','Cannes','penthouse','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'banner-main-2.jpg',1,'2017-07-04 07:10:43','2017-07-04 07:10:43'),(3,'Verona','Верона','Cannes','verona','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'banner-main-3.jpg',1,'2017-07-04 07:10:43','2017-07-04 07:10:43'),(4,'Verona','Верона','Cannes','verona','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'verona-collection.jpg',0,'2017-07-04 07:10:43','2017-07-04 07:10:43'),(5,'Manhattan','Манхэтен','Cannes','manhattan','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'manhattan-collection.jpg',0,'2017-07-04 07:10:43','2017-07-04 07:10:43'),(6,'Cannes','Канес','Cannes','cannes','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'cannes-collection.jpg',0,'2017-07-04 07:10:43','2017-07-04 07:10:43'),(7,'Verona','Верона','Cannes','verona','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'verona-collection.jpg',0,'2017-07-04 07:10:43','2017-07-04 07:10:43'),(8,'Manhattan','Манхетен','Cannes','manhattan','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'manhattan-collection.jpg',0,'2017-07-04 07:10:43','2017-07-04 07:10:43'),(9,'Cannes','Канес','Cannes','cannes','Live your home. In all forms and architectural lines of tradition inspired by classical culture, in all the declinations of nature around us there is something magical','Жизнь вашего дома. Во всех формах и архитектурных линий, вдохновленных классической традиции культуры, во всех аспектах природы вокруг нас есть что-то магическое',NULL,'cannes-collection.jpg',0,'2017-07-04 07:10:43','2017-07-04 07:10:43');
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `f_a_q_s`
--

DROP TABLE IF EXISTS `f_a_q_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `f_a_q_s` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_ru` text COLLATE utf8mb4_unicode_ci,
  `question_it` text COLLATE utf8mb4_unicode_ci,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_ru` text COLLATE utf8mb4_unicode_ci,
  `answer_it` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `f_a_q_s`
--

LOCK TABLES `f_a_q_s` WRITE;
/*!40000 ALTER TABLE `f_a_q_s` DISABLE KEYS */;
INSERT INTO `f_a_q_s` VALUES (1,'What type of furniture does Resource Furniture sell?','Какую мебель продает мебель для мебели?','Qual è il tipo di mobili che i mobili di risorse vendono?\n','We have a dedicated customer service team committed to\n                                    making sure that you are happy. (with your furniture, that is) Please email <a\n                                            href=\"mailto:customerservice@cavio.it\" class=\"colored_link anim-underline\">customerservice@cavio\n                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>','У нас есть специализированная команда обслуживания клиентов, приверженная','Abbiamo un team dedicato di assistenza clienti impegnato','2017-07-04 07:10:45','2017-07-04 07:10:45'),(2,'I am already a customer, and I have a question or need\n                                some assistance with my product. Who should I contact?','Какую мебель продает мебель для мебели?','Qual è il tipo di mobili che i mobili di risorse vendono?\n','We have a dedicated customer service team committed to\n                                    making sure that you are happy. (with your furniture, that is) Please email <a\n                                            href=\"mailto:customerservice@cavio.it\" class=\"colored_link anim-underline\">customerservice@cavio\n                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>','У нас есть специализированная команда обслуживания клиентов, приверженная','Abbiamo un team dedicato di assistenza clienti impegnato','2017-07-04 07:10:45','2017-07-04 07:10:45'),(3,'Can Resource Furniture ship to any location?','Какую мебель продает мебель для мебели?','Qual è il tipo di mobili che i mobili di risorse vendono?\n','We have a dedicated customer service team committed to\n                                    making sure that you are happy. (with your furniture, that is) Please email <a\n                                            href=\"mailto:customerservice@cavio.it\" class=\"colored_link anim-underline\">customerservice@cavio\n                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>','У нас есть специализированная команда обслуживания клиентов, приверженная','Abbiamo un team dedicato di assistenza clienti impegnato','2017-07-04 07:10:45','2017-07-04 07:10:45'),(4,'What type of furniture does Resource Furniture sell?','Какую мебель продает мебель для мебели?','Qual è il tipo di mobili che i mobili di risorse vendono?\n','We have a dedicated customer service team committed to\n                                    making sure that you are happy. (with your furniture, that is) Please email <a\n                                            href=\"mailto:customerservice@cavio.it\" class=\"colored_link anim-underline\">customerservice@cavio\n                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>','У нас есть специализированная команда обслуживания клиентов, приверженная','Abbiamo un team dedicato di assistenza clienti impegnato','2017-07-04 07:10:45','2017-07-04 07:10:45'),(5,'What type of furniture does Resource Furniture sell?','Какую мебель продает мебель для мебели?','Qual è il tipo di mobili che i mobili di risorse vendono?\n','We have a dedicated customer service team committed to\n                                    making sure that you are happy. (with your furniture, that is) Please email <a\n                                            href=\"mailto:customerservice@cavio.it\" class=\"colored_link anim-underline\">customerservice@cavio\n                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>','У нас есть специализированная команда обслуживания клиентов, приверженная','Abbiamo un team dedicato di assistenza clienti impegnato','2017-07-04 07:10:45','2017-07-04 07:10:45'),(6,'What type of furniture does Resource Furniture sell?','Какую мебель продает мебель для мебели?','Qual è il tipo di mobili che i mobili di risorse vendono?\n','We have a dedicated customer service team committed to\n                                    making sure that you are happy. (with your furniture, that is) Please email <a\n                                            href=\"mailto:customerservice@cavio.it\" class=\"colored_link anim-underline\">customerservice@cavio\n                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>','У нас есть специализированная команда обслуживания клиентов, приверженная','Abbiamo un team dedicato di assistenza clienti impegnato','2017-07-04 07:10:45','2017-07-04 07:10:45'),(7,'What type of furniture does Resource Furniture sell?','Какую мебель продает мебель для мебели?','Qual è il tipo di mobili che i mobili di risorse vendono?\n','We have a dedicated customer service team committed to\n                                    making sure that you are happy. (with your furniture, that is) Please email <a\n                                            href=\"mailto:customerservice@cavio.it\" class=\"colored_link anim-underline\">customerservice@cavio\n                                        .it</a> and Kirk, Jay, Samantha or Pieter will get back to you pronto!</p>','У нас есть специализированная команда обслуживания клиентов, приверженная','Abbiamo un team dedicato di assistenza clienti impegnato','2017-07-04 07:10:45','2017-07-04 07:10:45');
/*!40000 ALTER TABLE `f_a_q_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finish_tissues`
--

DROP TABLE IF EXISTS `finish_tissues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finish_tissues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(4) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finish_tissues`
--

LOCK TABLES `finish_tissues` WRITE;
/*!40000 ALTER TABLE `finish_tissues` DISABLE KEYS */;
INSERT INTO `finish_tissues` VALUES (1,NULL,'Tessuti 2014',NULL,NULL,'finish',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(2,NULL,'Verona',NULL,NULL,'finish',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(3,NULL,'Neutri',NULL,NULL,'finish',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(4,NULL,'Oro',NULL,NULL,'finish',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(5,NULL,'Marrone',NULL,NULL,'finish',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(6,NULL,'Viola',NULL,NULL,'finish',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(7,NULL,'Entrances',NULL,NULL,'tissue',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(8,NULL,'Living',NULL,NULL,'tissue',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(9,NULL,'Dining',NULL,NULL,'tissue',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(10,NULL,'Studio',NULL,NULL,'tissue',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(11,NULL,'Some tissue',NULL,NULL,'tissue',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(12,NULL,'Some tissue 2',NULL,NULL,'tissue',NULL,'2017-07-04 07:10:49','2017-07-04 07:10:49'),(13,1,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(14,1,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(15,1,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(16,1,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(17,1,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(18,2,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(19,2,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(20,2,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(21,2,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(22,2,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(23,3,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(24,3,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(25,3,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(26,3,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(27,3,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(28,4,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(29,4,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(30,4,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(31,4,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(32,4,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(33,5,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(34,5,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(35,5,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(36,5,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(37,5,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(38,6,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(39,6,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(40,6,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(41,6,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(42,6,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(43,7,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(44,7,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(45,7,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(46,7,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(47,7,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:49','2017-07-04 07:10:49'),(48,8,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(49,8,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(50,8,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(51,8,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(52,8,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(53,9,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(54,9,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(55,9,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(56,9,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50'),(57,9,'TS437A',NULL,NULL,NULL,'fit_tis_1.jpg','2017-07-04 07:10:50','2017-07-04 07:10:50');
/*!40000 ALTER TABLE `finish_tissues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `collection_id` tinyint(4) NOT NULL,
  `zone_id` tinyint(4) NOT NULL,
  `finish_tissue_id` tinyint(4) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_it` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `entity_id` int(10) unsigned DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `history_type_id_foreign` (`type_id`),
  KEY `history_user_id_foreign` (`user_id`),
  CONSTRAINT `history_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `history_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_types`
--

DROP TABLE IF EXISTS `history_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_types`
--

LOCK TABLES `history_types` WRITE;
/*!40000 ALTER TABLE `history_types` DISABLE KEYS */;
INSERT INTO `history_types` VALUES (1,'User','2017-07-04 07:10:41','2017-07-04 07:10:41'),(2,'Role','2017-07-04 07:10:41','2017-07-04 07:10:41'),(3,'Page','2017-07-04 07:10:41','2017-07-04 07:10:41'),(4,'News','2017-07-04 07:10:41','2017-07-04 07:10:41'),(5,'Collection','2017-07-04 07:10:41','2017-07-04 07:10:41'),(6,'Category','2017-07-04 07:10:41','2017-07-04 07:10:41'),(7,'FAQ','2017-07-04 07:10:41','2017-07-04 07:10:41'),(8,'Zone','2017-07-04 07:10:41','2017-07-04 07:10:41'),(9,'Good','2017-07-04 07:10:41','2017-07-04 07:10:41'),(10,'Showroom','2017-07-04 07:10:41','2017-07-04 07:10:41'),(11,'FinishTissue','2017-07-04 07:10:41','2017-07-04 07:10:41');
/*!40000 ALTER TABLE `history_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markers`
--

DROP TABLE IF EXISTS `markers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x` double(8,2) NOT NULL,
  `y` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markers`
--

LOCK TABLES `markers` WRITE;
/*!40000 ALTER TABLE `markers` DISABLE KEYS */;
INSERT INTO `markers` VALUES (1,1,'#DG310','Writing desks',NULL,NULL,14.00,60.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(2,1,'#DG310','Writing desks',NULL,NULL,36.00,48.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(3,1,'#DG310','Writing desks',NULL,NULL,45.00,20.50,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(4,1,'#DG310','Writing desks',NULL,NULL,63.20,51.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(5,1,'#DG310','Writing desks',NULL,NULL,77.00,62.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(6,2,'#DG310','Writing desks',NULL,NULL,14.00,60.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(7,2,'#DG310','Writing desks',NULL,NULL,36.00,48.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(8,2,'#DG310','Writing desks',NULL,NULL,45.00,20.50,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(9,2,'#DG310','Writing desks',NULL,NULL,63.20,51.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(10,2,'#DG310','Writing desks',NULL,NULL,77.00,62.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(11,3,'#DG310','Writing desks',NULL,NULL,14.00,60.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(12,3,'#DG310','Writing desks',NULL,NULL,36.00,48.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(13,3,'#DG310','Writing desks',NULL,NULL,45.00,20.50,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(14,3,'#DG310','Writing desks',NULL,NULL,63.20,51.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(15,3,'#DG310','Writing desks',NULL,NULL,77.00,62.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(16,4,'#DG310','Writing desks',NULL,NULL,14.00,60.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(17,4,'#DG310','Writing desks',NULL,NULL,36.00,48.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(18,4,'#DG310','Writing desks',NULL,NULL,45.00,20.50,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(19,4,'#DG310','Writing desks',NULL,NULL,63.20,51.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(20,4,'#DG310','Writing desks',NULL,NULL,77.00,62.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(21,5,'#DG310','Writing desks',NULL,NULL,14.00,60.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(22,5,'#DG310','Writing desks',NULL,NULL,36.00,48.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(23,5,'#DG310','Writing desks',NULL,NULL,45.00,20.50,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(24,5,'#DG310','Writing desks',NULL,NULL,63.20,51.00,'2017-07-04 07:10:44','2017-07-04 07:10:44'),(25,5,'#DG310','Writing desks',NULL,NULL,77.00,62.00,'2017-07-04 07:10:44','2017-07-04 07:10:44');
/*!40000 ALTER TABLE `markers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'александр копытов','shadowflame724@gmail.com','Test message',1,'2017-07-04 07:12:00','2017-07-04 07:19:53'),(2,'александр копытов','shadowflame724@gmail.com','test message 2',1,'2017-07-04 07:12:22','2017-07-04 07:20:38'),(3,'александр копытов','shadowflame724@gmail.com','new message',1,'2017-07-04 07:30:21','2017-07-04 07:35:41');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=345 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (324,'2014_10_12_000000_create_users_table',1),(325,'2014_10_12_100000_create_password_resets_table',1),(326,'2015_12_28_171741_create_social_logins_table',1),(327,'2015_12_29_015055_setup_access_tables',1),(328,'2016_07_03_062439_create_history_tables',1),(329,'2017_04_04_131153_create_sessions_table',1),(330,'2017_06_01_105650_create_pages_table',1),(331,'2017_06_01_105739_create_blocks_table',1),(332,'2017_06_05_070036_create_categories_table',1),(333,'2017_06_07_070735_create_news_table',1),(334,'2017_06_08_074756_create_collections_table',1),(335,'2017_06_09_062536_create_faqs_table',1),(336,'2017_06_12_082546_create_markers_table',1),(337,'2017_06_22_121821_create_zones_table',1),(338,'2017_06_26_085530_create_goods_table',1),(339,'2017_06_26_140851_zones_collections',1),(340,'2017_06_27_135045_collection_zone_zone',1),(341,'2017_06_28_141921_showrooms',1),(342,'2017_06_29_123547_create_popups_table',1),(343,'2017_06_29_140332_finish_tissue',1),(344,'2017_07_04_074340_create_messages_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_it` text COLLATE utf8mb4_unicode_ci,
  `preview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview_ru` text COLLATE utf8mb4_unicode_ci,
  `preview_it` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_ru` text COLLATE utf8mb4_unicode_ci,
  `body_it` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Правильный свет или гармоничное освещение в интерьере',NULL,NULL,NULL,'',NULL,NULL,'Проводя эксперименты со светом, можно создать любое настроение в\n                                    помещении, будь то праздничное мероприятие или романтическое уединение.',NULL,NULL,'...',NULL,NULL,'news','news1.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(2,'CAVIO Official Promo',NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,'...',NULL,NULL,'news','news2.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(3,'Правильный свет или гармоничное освещение в интерьере',NULL,NULL,NULL,'',NULL,NULL,'Проводя эксперименты со светом, можно создать любое настроение в\n                                    помещении, будь то праздничное мероприятие или романтическое уединение.',NULL,NULL,'...',NULL,NULL,'news','news1.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(4,'CAVIO Official Promo',NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,'...',NULL,NULL,'news','news2.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(5,'Правильный свет или гармоничное освещение в интерьере',NULL,NULL,NULL,'',NULL,NULL,'Проводя эксперименты со светом, можно создать любое настроение в\n                                    помещении, будь то праздничное мероприятие или романтическое уединение.',NULL,NULL,'...',NULL,NULL,'news','news1.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(6,'CAVIO Official Promo',NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,'...',NULL,NULL,'news','news2.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(7,'Правильный свет или гармоничное освещение в интерьере',NULL,NULL,NULL,'',NULL,NULL,'Проводя эксперименты со светом, можно создать любое настроение в\n                                    помещении, будь то праздничное мероприятие или романтическое уединение.',NULL,NULL,'...',NULL,NULL,'news','news1.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(8,'CAVIO Official Promo',NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,'...',NULL,NULL,'news','news2.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(9,'Правильный свет или гармоничное освещение в интерьере',NULL,NULL,NULL,'',NULL,NULL,'Проводя эксперименты со светом, можно создать любое настроение в\n                                    помещении, будь то праздничное мероприятие или романтическое уединение.',NULL,NULL,'...',NULL,NULL,'news','news1.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(10,'CAVIO Official Promo',NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,'...',NULL,NULL,'news','news2.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(11,'Правильный свет или гармоничное освещение в интерьере',NULL,NULL,NULL,'',NULL,NULL,'Проводя эксперименты со светом, можно создать любое настроение в\n                                    помещении, будь то праздничное мероприятие или романтическое уединение.',NULL,NULL,'...',NULL,NULL,'news','news1.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43'),(12,'CAVIO Official Promo',NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,'...',NULL,NULL,'news','news2.jpg','2017-07-04 07:10:43','2017-07-04 07:10:43');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `body_ru` text COLLATE utf8mb4_unicode_ci,
  `body_it` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'About us',NULL,NULL,'about',' ','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(2,'Contact us',NULL,NULL,'contacts',' ','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(3,'Questions',NULL,NULL,'faq',' ','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(4,'News',NULL,NULL,'news',' ','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(5,'Showrooms',NULL,NULL,'showrooms',' ','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(6,'Payments and delivery',NULL,NULL,'payments',' ','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(7,'Zone/collections',NULL,NULL,'collections',' ',' ',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(8,'CAVIO CASA',NULL,NULL,'index',' ',' ',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(9,'Privacy policy',NULL,NULL,'privacy-policy',' ','<p>Our data protection practice adheres to UK law relating to data protection.\n                        The following privacy policy applies to your use of LuxDeco website:\n                    <p>We respect the privacy of users on LuxDeco. This means that we commit to ensuring that we treat\n                        all information provided by you with the highest diligence and integrity including where we\n                        utilise the services of partners and third parties. We do not, however, accept responsibility\n                        for third parties where this is not stated separately.\n                    <p>We collect, store and process personal data solely in accordance with applicable statutory\n                        provisions and to the extent necessary to fulfil the contractual relationship between us or to\n                        provide the requested services necessary and required. Data about you and/or products that you\n                        have put into the shopping cart can be used by us (including our sister company,\n                        www.ikandi-interiors.co.uk) solely for our own marketing purposes. Furthermore, as permitted by\n                        applicable law, anonymous user profiles may be used for internal market research purposes and to\n                        improve our range of products and services. For the purposes of this privacy policy \"personal\n                        information\" means any information that you provide to us and that may be used to identify you\n                        (for example, your first and last name, address and fixed and/or mobile phone number). Personal\n                        data will be transferred by means of the encoding system SSL, via the Internet. We secure the\n                        Website and other systems through appropriate technical and organizational measures against\n                        loss, destruction, access, modification and distribution of your data by unauthorised persons in\n                        accordance with UK legislation. Despite regular controls a complete protection against all\n                        dangers cannot be guaranteed.\n                    <p>To improve LuxDeco and our services we use \"cookies\" (small data packages with configuration\n                        information, which, for example, submit information about the display settings or the IP address\n                        a user has) and you agree to our use of cookies as set out in this privacy policy. We believe\n                        that we do not use any cookies that represent an undue intrusion into your privacy, however you\n                        can disable the saving of cookies in your browser settings (for example, in Internet Explorer\n                        you can refuse all cookies by clicking \"Tools\", \"Internet Options\", \"Privacy\", and selecting\n                        \"Block all cookies\" using the sliding selector). Please bear in mind that if you disable cookies\n                        then you will not be able to place orders on LuxDeco and LuxDeco may not work properly when\n                        viewed through your browser.\n                    <p>LuxDeco uses technologies provided by Google Analytics (www.google.com) to collect data for\n                        optimization purposes. This data is used in order to create user profiles under a pseudonym and\n                        cookies are used for this. The collected data can be used by us to present improved and\n                        individualised offers and services to a user on LuxDeco. This data will not be disclosed to\n                        third parties. You can prevent the installation of cookies as described under section 3.\n                        However, we want to emphasize that in this case the functionality of LuxDeco (including the\n                        ability to place an order) will be limited.',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(10,'Stash',NULL,NULL,'stash',' ',' ',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(11,'Catalogue',NULL,NULL,'catalogue',' ',' ',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(12,'Zones',NULL,NULL,'zones',' ',' ',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42'),(13,'Finish Tissue',NULL,NULL,'finish-tissue',' ',' ',NULL,NULL,'2017-07-04 07:10:42','2017-07-04 07:10:42');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,2);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view-backend','View Backend',1,'2017-07-04 07:10:40','2017-07-04 07:10:40');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `popups`
--

DROP TABLE IF EXISTS `popups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `popups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_ru` text COLLATE utf8mb4_unicode_ci,
  `body_it` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `popups`
--

LOCK TABLES `popups` WRITE;
/*!40000 ALTER TABLE `popups` DISABLE KEYS */;
INSERT INTO `popups` VALUES (1,'Salone del Milano Invintation','Приглашение Salone del Milano','Invito di Salone del Milano','<p>Lorem ipsum dolor sit amet, an illum soluta pri, pri nonumes luptatum petentium id, no nisl melius officiis qui. Ius malorum mandamus eloquentiam no. Quo in wisi expetenda.<br /><br />Has quem autem copiosae no, modus nostrum principes id nec.</p>','<p>Lorem ipsum dolor sit amet, an illum soluta pri, pri nonumes luptatum petentium id, no nisl melius officiis qui. Ius malorum mandamus eloquentiam no. Quo in wisi expetenda.<br /><br />Has quem autem copiosae no, modus nostrum principes id nec.</p>','<p>Lorem ipsum dolor sit amet, an illum soluta pri, pri nonumes luptatum petentium id, no nisl melius officiis qui. Ius malorum mandamus eloquentiam no. Quo in wisi expetenda.<br /><br />Has quem autem copiosae no, modus nostrum principes id nec.</p>','catalogue','ind_poppup.jpg',1,'2017-07-04 07:10:48','2017-07-04 07:10:48');
/*!40000 ALTER TABLE `popups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1),(2,2,2),(3,3,3);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator',1,1,'2017-07-04 07:10:39','2017-07-04 07:10:39'),(2,'Executive',0,2,'2017-07-04 07:10:39','2017-07-04 07:10:39'),(3,'User',0,3,'2017-07-04 07:10:39','2017-07-04 07:10:39');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('5l19lo2fsRt9HuqbJpWihVg8WQob9cF2RNGlW5Qb',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36','ZXlKcGRpSTZJbXRtVkdwVlJ6WXlPWE5CYm01NlFuUXdhblpCV2tFOVBTSXNJblpoYkhWbElqb2laV2xQU0RWY0wzVjFWMlUzU25SUFIwZDZjRUp0WjB4UmFGQTBTMGRJZVc1WlJrdHhkRmxJVUZsU1dFSnNhbkpJWmpCc2JWTnBTa3RpVGpVemJFUXhZMDF6VFVaSlUxcHZSWE40UXpkNVJIcExSelozZVZsamFHOU5Oa3R3UmtNM00xaGhWWGRxWlZwMWEwMWFNSHBuVTJKdk1VbHpiVUkwU0ZCT1JUaE9kMnQ0ZWxsQ2MxVXdhMWxtZGtOV1VHcHJPVFpWTmsxdU5uVXJhWEJZVkVsVlVHWkxVWHBHWEM5VmVXOXlUWEZsY2pkQ2FWVkhaWFJITTNsTFQyRklWVzVxUVROb1kxcHZOMnBPZUdOWFdUVllOMjQwUlRsQ01EQjVkM0J1ZHl0NlprSTBSM1ZWY0hoY0wwZHpRMjR6Ulhsa2MyOUxYQzlZSzB0TFFtZGlORWxRT0doWGVqVkdZakpyZUVkTE4zWm1UMnBEYm1aRFYzcFBRWGMyV0RsV2VFazVPVVpvU1V0eVl6aHphMlZxZVVKc2NuRTBTRmRjTDJFM1NqUkplSGxJVVRKNk5rRjBOekoxTUZsaFZtbHhRVWhLTkhGcFFrczRZM1JFY210cFRHNU1ieXRSYnpOMlJWRmFVems1UTIwd1NrdERORTU0WEM5R1JuWjVWMnB4VjJvMU1VaGtNekUzYUhjelYyWmxialpTYWxseU56aGNMemd5YjFSNWNHVjFWbmt4VjFweU0ybDRXRlJ1UkRaV00ydG1WMWx4VVROSFoyeHdRM0ZhYmtock4zWk5WalZCTkdRaUxDSnRZV01pT2lJeU5HTXdPR1F4TW1aaFpEZzBPVFV6T1RoaU0ySmpNekk1WmpZelkyRXpabUZsTnpCa1lqZG1aVE0wWVdRMU4yVXhNelppTnpjeE1XWTRPVEkyTVRGaUluMD0=',1499165317);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `showrooms`
--

DROP TABLE IF EXISTS `showrooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `showrooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double(8,2) DEFAULT NULL,
  `lng` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `showrooms`
--

LOCK TABLES `showrooms` WRITE;
/*!40000 ALTER TABLE `showrooms` DISABLE KEYS */;
INSERT INTO `showrooms` VALUES (1,'ITALY','Some city','CAVIO Authorised dealer','ABN 37956063382','+61 404 835 170','','','sales@cavio.com.ua',41.87,12.50,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(2,'FINLAND','Some city','Exclusiveforhome','Vaalimaa Pyöräkankantie 1, 49930,','+358 40 7161111','','','elena@exclusiveforhome.com',60.13,25.00,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(3,'ISRAEL','Some city','CAVIO Showroom, Dan Design Center','Tel Aviv','+97 239 050 577','','+97 239 050 577','',31.62,35.16,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(4,'USA','Some city','CAVIO Showroom, Dan Design Center','Viale Europa, 6/a, 37050\nSan Pietro di Morubio (VR) Italia','','','','',39.10,-94.44,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(5,'RUSSIA','Some city','CAVIO Showroom, Dan Design Center','Viale Europa, 6/a, 37050\nSan Pietro di Morubio (VR) Italia','+ 7 861 200 90 09','+ 7 861 200 90 09','','',55.83,37.53,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(6,'LATVIA','Some city','CAVIO Showroom, Dan Design Center','Viale Europa, 6/a, 37050\nSan Pietro di Morubio (VR) Italia','','','','',56.94,24.08,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(7,'UKRAINE','Some city','CAVIO Showroom, Dan Design Center','Kiev','','','','',49.67,30.67,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(8,'UKRAINE','Some city','CAVIO Showroom, Dan Design Center','Odessa','','','','',49.67,30.67,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(9,'UKRAINE','Some city','CAVIO Showroom, Dan Design Center','Zmerynka','','','','',49.67,30.67,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(10,'MOLDOVA','Some city','CAVIO Showroom, Dan Design Center','Viale Europa, 6/a, 37050\nSan Pietro di Morubio (VR) Italia','','','','',46.98,28.74,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(11,'AZERBAIJAN','Some city','CAVIO Showroom, Dan Design Center','Viale Europa, 6/a, 37050\nSan Pietro di Morubio (VR) Italia','','','','',42.42,61.70,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(12,'ROMANIA','Some city','CAVIO Showroom, Dan Design Center','Viale Europa, 6/a, 37050\nSan Pietro di Morubio (VR) Italia','','','','',45.64,24.61,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(13,'KYRGYZSTAN','Some city','CAVIO Showroom, Dan Design Center','Viale Europa, 6/a, 37050\nSan Pietro di Morubio (VR) Italia','','','','',41.31,74.18,'2017-07-04 07:10:48','2017-07-04 07:10:48'),(14,'KAZAKHSTAN','Some city','CAVIO Showroom, Dan Design Center','Viale Europa, 6/a, 37050\nSan Pietro di Morubio (VR) Italia','','','','',39.37,58.89,'2017-07-04 07:10:48','2017-07-04 07:10:48');
/*!40000 ALTER TABLE `showrooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_logins`
--

DROP TABLE IF EXISTS `social_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_logins_user_id_foreign` (`user_id`),
  CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_logins`
--

LOCK TABLES `social_logins` WRITE;
/*!40000 ALTER TABLE `social_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Istrator','admin@admin.com','$2y$10$Oohz3VnHl..FwhTHiiggG.eOegDe3aORTNFC7TH3rDVtclJ47xnHO',1,'8695b37b8154f98f20d85f97cd9acda3',1,NULL,'2017-07-04 07:10:38','2017-07-04 07:10:38',NULL),(2,'Backend','User','executive@executive.com','$2y$10$2LxoC6bVSogQt4oQe2JxceB3VimwCI47OBBEDPtK9e3JG6RPWcrOG',1,'d91f1bf7dd17d6ff657b248bce848b8d',1,NULL,'2017-07-04 07:10:38','2017-07-04 07:10:38',NULL),(3,'Default','User','user@user.com','$2y$10$v9oFw.ssFdfWhNCgIjAimurkskqhD6OiS0xMkX6fo3ysxzvyGK2za',1,'a8e506eefb85e589e9ef2cf2a9321f00',1,NULL,'2017-07-04 07:10:38','2017-07-04 07:10:38',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_it` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,'Entrances','Подъезды','Ingressi','entrances','2017-07-04 07:10:46','2017-07-04 07:10:46'),(2,'Living','Жизнь','Vita','living','2017-07-04 07:10:46','2017-07-04 07:10:46'),(3,'Dining','Обеденный','Cenare','dining','2017-07-04 07:10:46','2017-07-04 07:10:46'),(4,'Bedrooms','Cпальни','Camere da letto\n','bedrooms','2017-07-04 07:10:46','2017-07-04 07:10:46'),(5,'Studio','Cтудия','Studio','studio','2017-07-04 07:10:46','2017-07-04 07:10:46'),(6,'Kids Bedrooms','Детские спальни','Camere per bambini','kids-bedrooms','2017-07-04 07:10:46','2017-07-04 07:10:46');
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-04 13:50:37
