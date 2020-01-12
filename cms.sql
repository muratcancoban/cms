-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 05 Oca 2020, 20:34:18
-- Sunucu sürümü: 5.6.34
-- PHP Sürümü: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_template` varchar(255) NOT NULL,
  `category_seo` varchar(1500) NOT NULL,
  `category_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_url`, `category_template`, `category_seo`, `category_date`, `category_order`) VALUES
(1, 'PHP', 'php', '', '{\"title\":\"PHP\",\"description\":\"Php \\u00d6\\u011freniyoruz\"}', '2020-01-04 14:50:25', 0),
(2, 'Unity', 'unity', '', '{\"title\":\"\",\"description\":\"unity\"}', '2020-01-04 14:51:04', 0),
(3, 'Grafik Tasarım', 'grafik-tasarim', '', '{\"title\":\"Grafik Tasar\\u0131m\\u0131 Yap\\u0131yorum!\",\"description\":\"En sevdi\\u011fim grafik tasarlamak\"}', '2020-01-05 16:28:19', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_user_id`, `comment_post_id`, `comment_name`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(11, 2, 1, 'muratcan', 'muratcancoban@outlook.com.tr', 'Ben Yaptım!', 1, '2020-01-05 12:31:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_read` int(11) NOT NULL DEFAULT '0',
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_subject`, `contact_message`, `contact_read`, `contact_date`) VALUES
(2, 'Muratcan Coban', 'deneme@gmail.com', '05319024600', 'denem', 'supersin', 0, '2020-01-04 11:12:42'),
(4, 'deneme', 'muratcancobain@gmail.com', '05319024600', 'denem', 'deneme', 0, '2020-01-04 13:53:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `menu_content` text NOT NULL,
  `menu_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_title`, `menu_content`, `menu_date`) VALUES
(1, 'Header Menu', '[{\"title\":\"Blog\",\"url\":\"blog\"},{\"title\":\"Hakk\\u0131mda\",\"url\":\"sayfa\\/hakkimda\"},{\"title\":\"\\u0130letisim\",\"url\":\"iletisim\"}]', '2019-12-30 20:44:25'),
(2, 'Footer Sosyal Aglar', '[{\"title\":\"&lt;i class=&quot;fab fa-instagram&quot;&gt;&lt;\\/i&gt; muratcancoban\",\"url\":\"https:\\/\\/www.instagram.com\\/muragrim\"}]', '2019-12-30 21:17:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `page_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_seo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_url`, `page_content`, `page_date`, `page_seo`) VALUES
(2, 'Hakkımda', 'hakkimda', '&lt;p&gt;&lt;strong&gt;Merhaba, ben Muratcan &amp;Ccedil;oban &lt;img alt=&quot;&quot; src=&quot;https://ilkayuyarkaba.av.tr/wp-content/uploads/2018/12/muratcan-coban.jpg&quot; style=&quot;border-style:solid; border-width:1px; float:left; height:100px; margin:1px 10px; width:100px&quot; /&gt;1998 yılında Ankara&amp;#39;da doğdum.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Arkadaşlarım ile birlikte gezmeyi ve &amp;ccedil;alışmayı &amp;ccedil;ok seviyorum.&amp;nbsp;Yeni fikirler&amp;nbsp;her zaman beni heyecanlandırıyor. &amp;Uuml;zerinde &amp;ccedil;alıştığım bir fikrim var ise, bitirene kadar rahat bir uyku &amp;ccedil;ekemem.&lt;/p&gt;', '2020-01-04 16:18:42', '{\"title\":\"\",\"description\":\"hakkimda\"}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_categories` varchar(255) NOT NULL,
  `post_short_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_status` int(11) NOT NULL,
  `post_seo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_url`, `post_content`, `post_categories`, `post_short_content`, `post_date`, `post_status`, `post_seo`) VALUES
(1, 'Unity Nedir?', 'unity-game', '&lt;p&gt;&lt;em&gt;&lt;strong&gt;Unity3D rusyada geliştirilen ve yayınlanan bir oyun motorudur.Aslında amacı oyun yapmak değildi daha farklı birşey i&amp;ccedil;in kullanılacaktı,oyunları bilgisayarınıza y&amp;uuml;klemeden Unity Web Player ile oyunları internet &amp;uuml;zerinden oynayabilmekti.Bu &amp;ccedil;ok iyi olacaktı , hem oyunlarda korsanın &amp;ouml;n&amp;uuml;ne ge&amp;ccedil;ilecek ve oyununu sadece kendi internet sitesinden dahi oynatabilecekti.Fakat Unity3D bununla yetinmeyerek dahada kendini geliştirdi.&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;', '2', '&lt;p&gt;&lt;strong&gt;Unity3D rusyada geliştirilen ve yayınlanan bir oyun motorudur.&lt;/strong&gt;&lt;/p&gt;', '2020-01-04 20:06:36', 1, '{\"title\":\"Unity kullanarak oyun yapmak\",\"description\":\"\"}'),
(3, 'Kalimba Nedir?', 'kalimba', '&lt;h2&gt;&lt;strong&gt;&lt;img alt=&quot;&quot; src=&quot;https://gloimg.gbtcdn.com/soa/gb/pdm-provider-img/straight-product-img/20180312/T021203/T0212030002/goods_img_big-v1/114439-6979.jpg&quot; style=&quot;border-style:solid; border-width:1px; float:left; height:100px; margin:1px; width:100px&quot; /&gt;Kalimba&lt;/strong&gt;, bir diğer adıyla&amp;nbsp;&lt;em&gt;mbira&lt;/em&gt;, G&amp;uuml;ney Afrika&amp;rsquo;da doğmuş bir m&amp;uuml;zik aletidir. Tahta bir taban &amp;uuml;zerine farklı boyutlarda metal par&amp;ccedil;alarının yerleştirilmesiyle oluşturulmuştur. 1960 &amp;ndash; 1970 yılları arasında&amp;nbsp;&lt;em&gt;Likembe, mbile, mbira huru, matepe, karimbao&lt;/em&gt;&amp;nbsp;gibi isimlerle de anılmıştır. Birka&amp;ccedil; yerde &amp;rdquo;parmak piyanosu&amp;rdquo; olarak da ge&amp;ccedil;mektedir.&lt;/h2&gt;', '1,2', '&lt;p&gt;&lt;strong&gt;Kalimba&lt;/strong&gt;, bir diğer adıyla&amp;nbsp;&lt;em&gt;mbira&lt;/em&gt;, G&amp;uuml;ney Afrika&amp;rsquo;da doğmuş bir m&amp;uuml;zik aletidir.&lt;/p&gt;', '2020-01-04 22:17:02', 1, '{\"title\":\"kalimba ile muzik nas\\u0131l yap\\u0131l\\u0131r\",\"description\":\"\"}'),
(4, 'Grafik Tasarımı', 'grafik', '&lt;h2&gt;Grafik Tasarımın Alanları Nelerdir?&lt;/h2&gt;\r\n\r\n&lt;p&gt;Aslında bakarsanız g&amp;ouml;zlerimizi kapayıp a&amp;ccedil;tığımız her an bir grafik tasarım &amp;uuml;r&amp;uuml;n&amp;uuml;n&amp;uuml; g&amp;ouml;rebilmekteyiz. Yolda y&amp;uuml;r&amp;uuml;rken billboardlarda, televizyonda, marketten alınan herhangi bir &amp;uuml;r&amp;uuml;nde, kitap, dergi, gazetelerde, elimize verilen broş&amp;uuml;rlerde, film-marka-dizi afişlerinde, ambalaj ve alb&amp;uuml;m kapaklarında, severek aldığımız t-shirt veya ev aksesuarlarında.. Yani g&amp;ouml;r&amp;uuml;p g&amp;ouml;rebileceğimiz her şey grafik tasarımın alanının i&amp;ccedil;erisine girmektedir.&lt;/p&gt;', '3', '&lt;p&gt;Ge&amp;ccedil;mişten g&amp;uuml;n&amp;uuml;m&amp;uuml;ze duvarlarda, kitaplarda, dergilerde, afişlerde, logolarda yazılı veya g&amp;ouml;rsel olarak dikkatimizi &amp;ccedil;eken tasarımların aslında bir mesleğe ait olduğunu biliyor muydunuz? Severek yapılan her meslek gibi grafik tasarım mesleği de size her işinizde yenilikler katıyor hem de para kazandırıyor. Peki bu &amp;lsquo;grafik tasarım&amp;rsquo; nedir?&lt;/p&gt;', '2020-01-05 16:29:52', 1, '{\"title\":\"Grafik Tasarla\",\"description\":\"deneme\"}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(11) NOT NULL,
  `tag_post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `post_tags`
--

INSERT INTO `post_tags` (`id`, `tag_post_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 3, 6),
(8, 4, 8),
(9, 4, 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_url` varchar(255) NOT NULL,
  `tag_seo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `tag_url`, `tag_seo`) VALUES
(1, 'unity\r', 'unity', ''),
(2, 'cms\r', 'cms', ''),
(3, 'oyun', 'oyun', ''),
(6, 'müzik\r', 'muzik', ''),
(8, 'grafik\r', 'grafik', ''),
(9, 'tasarim', 'tasarim', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_url` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_rank` int(11) NOT NULL DEFAULT '3',
  `user_permissions` varchar(2000) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_url`, `user_email`, `user_password`, `user_rank`, `user_permissions`, `user_date`) VALUES
(1, 'cobain', 'cobain', 'muratcancobain@gmail.com', '$2y$10$gKsWM4uvX6L040MWYfRl3.31vKWFnbz8WJpC5gls2EEgd0cMFLvym', 3, '{\"index\":{\"show\":\"1\"}}', '2019-12-30 18:50:32'),
(2, 'muratcan', 'muratcan', 'muratcancoban@outlook.com.tr', '$2y$10$gKsWM4uvX6L040MWYfRl3.31vKWFnbz8WJpC5gls2EEgd0cMFLvym', 1, '{\"index\":{\"show\":\"1\"},\"users\":{\"show\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"contact\":{\"show\":\"1\",\"edit\":\"1\",\"send\":\"1\",\"delete\":\"1\"},\"posts\":{\"show\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"tags\":{\"show\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"categories\":{\"show\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"comments\":{\"show\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"pages\":{\"show\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"menu\":{\"show\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"settings\":{\"show\":\"1\",\"edit\":\"1\"}}', '2019-12-30 22:02:14');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
