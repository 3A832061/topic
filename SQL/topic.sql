-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `actives`;
CREATE TABLE `actives` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `actives` (`id`, `url`, `content`, `type`, `created_at`, `updated_at`) VALUES
(1,	'1752447139.jpg',	'2020預言音樂會',	'音樂會',	'2025-07-13 14:52:19',	'2025-07-13 14:52:19'),
(2,	'1752447209.jpg',	'2020 社慶',	'音樂會',	'2025-07-13 14:53:29',	'2025-07-13 14:53:29');

DROP TABLE IF EXISTS `awards`;
CREATE TABLE `awards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `awards` (`id`, `year`, `content`, `created_at`, `updated_at`) VALUES
(1,	'2020',	'社團評鑑第一名',	'2025-07-13 14:51:46',	'2025-07-13 14:51:46');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `information`;
CREATE TABLE `information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `information` (`id`, `title`, `type`, `content`, `picture`, `remark`, `created_at`, `updated_at`) VALUES
(1,	'109學年',	'evaluation',	'簡報的報告時間要注意\r\n記得要提早開始準備，平常籌備活動的時候資料都要留好',	NULL,	'https://drive.google.com/drive/folders/1p5r77M5n1TcTraiyF-bpaMhNcF7WgTu5?usp=sharing',	NULL,	'2022-06-04 10:25:26'),
(2,	'108學年以前',	'evaluation',	'以往的社評資料都是紙本資料，放在社辦內',	NULL,	NULL,	NULL,	NULL),
(4,	'試樂器',	'precaution',	NULL,	NULL,	NULL,	NULL,	NULL),
(5,	'社慶',	'precaution',	NULL,	NULL,	NULL,	NULL,	NULL),
(6,	'迎新',	'precaution',	'日期不一定要安排在假日，要統計新生可以的時間，以這個時間為主。\r\n盡量訂在連假後的那個禮拜,新生比較不會放假回家\r\n不一定要辦在假日,參與的人不一定會比較多,可能新生要回家或不願意假日還要跑來學校。\r\n活動中，可以安排一個介紹社團和幹部的環節\r\n多上網找一些大地遊戲和破冰遊戲,可以多找一些以往沒有玩過的遊戲,而且之後還要驗收遊戲是否適合用在迎新,可以多選一些為備案。\r\n關主要很清楚關卡的遊戲規則與如何進行。\r\n總召或主持要盡量嗨能夠帶動氣氛。\r\n每位社員都要盡量參與活動的進行,多跟新生有互動最好。\r\n每位幹部都要清楚活動的每個過程。',	NULL,	NULL,	NULL,	'2022-06-04 10:00:28'),
(7,	'講座',	'precaution',	NULL,	NULL,	NULL,	NULL,	NULL),
(8,	'寒/暑輔',	'precaution',	'學期末,幹部與社員討論出適合的練習時間,約為一個禮拜,確定時間的同時也要詢問老師時間是否 OK,最後統計社員的出席率再給老師決定寒/暑訓中上課的日期。\r\n在安排練習進度時,可以多參考其他學校的寒訓是怎麼做的?或詢問老師說怎麼安排會更好?\r\n時間不一定要長,集中在幾天內完成,從早到晚,重點是練習要【有效率】和【有趣】,大家可能有空的時間都不多,所以要做到在最短時間得到最好的效果\r\n要注意與社員之間的溝通,任何資訊一旦確定就必須及時公布出來,寒/暑訓的曲子也必須與老師討論決定,讓活動照著進度執行。\r\n寒訓通常是練習比賽的曲目\r\n暑訓通常是練習社博之夜的曲目\r\n若是提早練習完畢,也可以先來試一下音樂會的曲目\r\n寒/暑訓開始後,幹部或要找各聲部的負責人要注意社員的出席是否確實,還有組練時間是否有準時出現。\r\n學指方面也要隨時注意社團的團練進度並回報給老師,這樣才能有效率的提升樂團實力。',	NULL,	NULL,	NULL,	NULL),
(9,	'幹部訓練',	'precaution',	NULL,	NULL,	NULL,	NULL,	NULL),
(11,	'諾曼本管樂社',	'introduction',	'諾曼本管樂社於94學年度11月在國立勤益科技大學所成立，本社以推廣管樂活動、拓展校園音樂文化為衷旨。在余文凱老師的指導下，不斷推廣校園樂理講座以及音樂會等有助於提升全校師生音樂素養之活動，歷年來的成果廣受好評，更在104年中旬舉辦了創社十週年紀念音樂會，象徵社團邁入嶄新的里程。在音樂比賽方面，本社參與了107學年度全國學生音樂比賽銅管五重奏決賽，獲得優等佳績，為校爭取榮譽。未來，本社將以提升社員們的音樂素養及演奏技巧為目標，期許更多新生代的加入。',	'1752446661.jpg',	NULL,	NULL,	'2025-07-13 14:44:22'),
(12,	'社長',	'architecture',	'除了活動企畫為該活動總召以外，其餘社團行政皆為社長之例行公事。社長需要各地人脈，並凝聚社團向心力。',	NULL,	NULL,	NULL,	'2022-06-04 23:11:13'),
(13,	'團長',	'architecture',	'協助社團之行政運作，並負責監督音樂會的排程和提醒不要重蹈覆轍',	NULL,	NULL,	NULL,	NULL),
(14,	'副社長',	'architecture',	'輔佐社長的社團行政，尤其”提醒”與”預想”更為重要。比社長更為需要裁決與思考能力，處理人員以外的社團行政問題。',	NULL,	NULL,	NULL,	NULL),
(15,	'學生指揮',	'architecture',	'沒有社團課時協助指導老師指揮樂團練習曲子，指導老師會訓練，並與指導老師及譜務討論學期練習曲目，規劃音樂發表會相關事宜。',	NULL,	NULL,	NULL,	NULL),
(16,	'總務',	'architecture',	'管理本社財務收支並統一保管及管理社團財產等，一般分有財物及帳務，礙於人員關係目前為統一處理。',	NULL,	NULL,	NULL,	NULL),
(17,	'譜務',	'architecture',	'與指揮和社員間接洽存譜相關事宜，需要細心與耐心並完全了解各聲部人員數與分配，避免多印譜和少印譜。',	NULL,	NULL,	NULL,	NULL),
(18,	'器材',	'architecture',	'負責社團財產之保管及借還登記、社內用品和樂器耗材等數量掌握、編列器材購置預算、編列社團一般財產並將其歸檔。',	NULL,	NULL,	NULL,	NULL),
(19,	'文書',	'architecture',	'管理本社團之文書事宜、協助社長管理社團網站、統整會議記錄的檔案並監督社員們是否確實詳讀會議紀錄。',	NULL,	NULL,	NULL,	NULL),
(20,	'文書',	'architecture',	'管理本社團之文書事宜、協助社長管理社團網站、統整會議記錄的檔案並監督社員們是否確實詳讀會議紀錄。',	NULL,	NULL,	NULL,	NULL),
(21,	'公關',	'architecture',	'社團門面，管理本社團對外、募款及交流事宜，協助社長拓展社團人脈，並公關函皆為工作範圍。',	NULL,	NULL,	NULL,	NULL),
(22,	'美宣',	'architecture',	'協助有關美化與設計的相關工作等。',	NULL,	NULL,	NULL,	NULL),
(24,	'總則',	'organize',	'本社團定名為「諾曼本管樂社」（以下簡稱本社）\r\n本社以推廣管樂活動為發展宗旨。其目的為推展校園音樂文化，並提供學生一個良好的課外活動空間。\r\n本社社址位於國立勤益科技大學校區。',	NULL,	NULL,	NULL,	'2022-06-05 00:50:47'),
(25,	'社員資格',	'organize',	'凡本校師生認同並願力行本社宗旨，可經社團網頁辦理入社手續後成為本社社員。\r\n請先至招生表單填寫資料',	NULL,	NULL,	NULL,	NULL),
(26,	'社員之權利',	'organize',	'優先參加本社各項活動。\r\n有權使用或借用社團之樂器（借用保管辦法另參考本組織章程第八章社團財產篇）。\r\n其他應享之權利。',	NULL,	NULL,	NULL,	'2022-06-05 01:06:41'),
(27,	'社員之義務',	'organize',	'凡本社所籌辦之活動，每位社員皆有分責之義務。\r\n宣揚本社各項活動，共創全體之榮譽。\r\n遵行社內決議。\r\n皆應繳交社費，其社費金額皆經由幹部會議視所需議定。以每學期收繳一次新台幣500元為原則，若有赤字或額外需求時再由社員大會決議。\r\n社員凡已退社者，皆需將借用之財物歸還且確認無損，若有損壞需做賠償。當期繳交之社費概不退還。',	NULL,	NULL,	NULL,	NULL),
(28,	'幹部選舉權',	'organize',	'投票資格為入社半年以上(含)社員、有繳社費、且當學年度參與社團活動含籌會至少過半。',	NULL,	NULL,	NULL,	NULL),
(29,	'社務要則',	'organize',	'本社每星期二、四為社團時間集社，集社練習時間以一至二小時，加強練習時間視所需而定。\r\n練習場地應保持清潔，必要時以輪值推派打掃。\r\n練習分配以小組為單位，分銅管、木管及打擊三部份。\r\n參與之社員皆應負起社務推動之，分配之事務應盡力以赴。不得有苟且之行為。',	NULL,	NULL,	NULL,	NULL),
(30,	'社員大會',	'organize',	'社員大會由全體社員組成，為本社最高權力機構。但日常事務由幹部會議議決執行之。\r\n社員大會每學期至少召開一次，由社長召開之，必要時得由社員總額五分之三以上連署請求，召開社員大會臨時會議。社員大會應有全體社員四分之三以上出席；其決議方式除重大提案至少應經出席社員三分之二以上同意外，一般提案以相對多數通過。\r\n社長缺位時由副社長繼任至任期屆滿，社長、副社長均缺位時，由總務代行其職權並召開社員大會補選社長、副社長。本社除創社第一學期於學期末外，每學年度結束前，舉行的社員大會中依第十二條第一款之規定改選幹部，並於次一學年度正式辦理移交。',	NULL,	NULL,	NULL,	NULL),
(31,	'組織權限',	'organize',	'本社設置社長、副社長、團長各一人，經社員四分之三以上出席，出席人數四分之三以上同意選出。\r\n社長、副社長、團長經全社選舉產生，但參選人僅一人時，至少需要出席者二分之一以上同意通過。\r\n社長及副社長及團長之權限及任期如下：\r\n社長、副社長、團長任期除創社第一學期為半年外均為一年，連選不得連任。\r\n總務代行社長職權不得逾二個月。\r\n本社為維持社務順利發展，經幹部會議認可，將轉移幹部權責並重新分配。',	NULL,	NULL,	NULL,	NULL),
(32,	'社團財產',	'organize',	'凡具本社社員資格者，於社團開放運作期間皆可借用本社樂器或其他器材，如有損壞，由借用人員賠償責任。\r\n欲外借樂器之社員，需填寫樂器借用申請表，交予社長及器材部幹事審核同意並簽字後方可外借。\r\n樂器歸還時，需經由器材部幹事及外借者雙方簽字。社長需檢查樂器是否有重大損害或不當使用。\r\n樂器外借間不可擅意借由他人使用，否則由外借者自行承擔責任。\r\n器材借出後的損害，若因人為疏失所引起，外借人需自行修理復原後歸還。若經由送修後，確定無法修復，外借人需賠償原型號器材或照價賠償。\r\n社團之消耗物品，應予以正當使用，不可有貪圖破壞之行為。',	NULL,	NULL,	NULL,	NULL),
(33,	'附則',	'organize',	'本章程之變更應由全體社員五分之三連署，經社長召開社員大會討論。變更章程之決議應經全體社員四分之三以上出席，出席社員五分之四以上同意通過。\r\n本社解散應由全體社員五分之三以上連署召開臨時會議或社長召開社員大會討論。解散之決議經全體社員五分之四以上出席，出席社員五分之四以上同意始得解散。\r\n有關本社解散後社團財產之處理事項，依本校學生社團輔導辦法及其他相關規定辦理。\r\n幹部之罷免由全體社員三分之一以上連署，二分之一以上同意成立。\r\n本章程經由社員大會討論通過，並呈校長核定後實施，修正時亦同。',	NULL,	NULL,	NULL,	NULL),
(34,	'余文凱',	'teacher',	'台中市豐原區人，東海大學音樂研究所碩士\r\n主修小號，師事許榮富老師。\r\n由張鈺老師及黃茂村教練啟蒙學習小號；\r\n衛道中學馬良神父啟蒙指導學習指揮與音樂的詮釋。\r\n曾擔任東海大學音樂系管樂團以及管弦樂團小號首席；\r\n2006年始受邀加入台灣銅管五重奏擔任第二小號。\r\n\r\n多次指導勤益科大、中臺科大、雲林馬光國中、弘文中學參加全國音樂比賽銅管五重奏決賽獲得優等佳績。\r\n\r\n現擔任：大葉大學、勤益科大、中臺科大、豐原高中、衛道中學、大甲高工、后綜高中管樂社指導老師，\r\n以及衛道中學、明道中學、苗栗高商、弘文中學管樂社、馬光國中藝才班小號分部指導老師。\r\n\r\n更於 97學年度 指導豐原高中管樂合奏 音樂比賽台中縣第一名，決賽優等\r\n     103學年度 指導竹南高中林懷恩 小號獨奏 音樂比賽苗栗縣特優第一名，全國賽優等 ;\r\n     106學年度 指導弘文中學 銅管五重奏 音樂比賽中區決賽第一名;\r\n     107學年度指導中臺科大木管五重奏音樂比賽中區決賽第一名。',	'1752446973.jpg',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(262,	'2022_05_05_070810_create_attend_table',	1),
(573,	'2022_05_29_080701_create_equipments_table',	2),
(732,	'2014_10_12_000000_create_users_table',	3),
(733,	'2014_10_12_100000_create_password_resets_table',	3),
(734,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	3),
(735,	'2019_08_19_000000_create_failed_jobs_table',	3),
(736,	'2019_12_14_000001_create_personal_access_tokens_table',	3),
(737,	'2022_03_30_031112_create_sessions_table',	3),
(738,	'2022_04_09_154638_create_posts_table',	3),
(739,	'2022_04_09_165410_create_information_table',	3),
(740,	'2022_04_09_165459_create_sheet__music_table',	3),
(741,	'2022_04_09_165517_create_sheet__requs_table',	3),
(742,	'2022_05_05_083413_create_actives_table',	3),
(743,	'2022_05_28_092838_create_awards_table',	3);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `tag`, `link`, `user_id`, `remark`, `created_at`, `updated_at`) VALUES
(2,	'110學年度開始招生',	'勤益諾曼本管樂社110學年度開始招生啦~        🎉🎉🎉\r\n歡迎所有管樂人才和有興趣的夥伴熱烈報名，成為我們的一員，一起享受音樂，完成一場場精采絕倫的音樂會🤩\r\nig:勤益諾曼本管樂社\r\n入社表單👇👇👇\r\nhttps://forms.gle/T7g1ydHH7yL8NymX9',	'2022-06-06',	'招生宣傳',	NULL,	'1',	NULL,	NULL,	'2022-06-13 01:59:05');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BS6cJ8Ias3hi0udpGOfxOl24Goa6GrP7tQLp2Kxl',	7,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZnJaOEZGSHhJb1BHVjBlRnllWjBCOUNWNTZKakFyWmZOYU1naTdRbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zaGVldCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==',	1752448187),
('KXXAZq62OnWyi2oBwodXKaqTG7l2xxoAWi46t96v',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnZ1QnhOOTd5Skw0dTAxWVNuZGtZbFlrTm5ucDJJdlc2RVluMWc0TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hY3RpdmUvc2hvdy8lRTklOUYlQjMlRTYlQTglODIlRTYlOUMlODMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1752443503);

DROP TABLE IF EXISTS `sheet__music`;
CREATE TABLE `sheet__music` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zhname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `composer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arranger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saveform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `change1` tinyint(1) NOT NULL DEFAULT '1',
  `check1` tinyint(1) NOT NULL,
  `checkyear` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sheet__music` (`id`, `type`, `name`, `zhname`, `composer`, `arranger`, `lost`, `saveform`, `authorize`, `year`, `price`, `change1`, `check1`, `checkyear`, `remark`, `pin`, `created_at`, `updated_at`) VALUES
(1,	'外文譜',	'Goddess Of Fire',	'火焰女神',	'Steven Reineke',	NULL,	NULL,	'紙本譜',	'紙本譜',	NULL,	NULL,	1,	0,	NULL,	NULL,	'莊怡萱',	NULL,	NULL),
(2,	'日文譜',	'紅蓮華',	NULL,	'草野華余子',	NULL,	NULL,	'電子譜',	'電子譜',	NULL,	NULL,	1,	0,	NULL,	NULL,	'莊怡萱',	NULL,	NULL);

DROP TABLE IF EXISTS `sheet__requs`;
CREATE TABLE `sheet__requs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mem_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_page` int(11) NOT NULL DEFAULT '1',
  `quan` int(11) NOT NULL DEFAULT '1',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  `day` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` tinyint(1) DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '社員',
  `now` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `part`, `class`, `acc`, `phone`, `pay`, `remark`, `pos`, `now`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'莊怡萱',	'Sax',	'四資三乙',	'12344545',	'02135546',	1,	NULL,	'社長',	1,	'admin@gmail.com',	NULL,	'$2y$10$c/FTkureFsjFuKXvAebw4.lojDx8D2jEveEJ5d8v1mOeTplbNefx2',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-05-28 16:38:57',	'2025-07-13 14:56:58'),
(2,	'王小明',	'Eup',	'四工一甲',	'123',	'0912345678',	0,	NULL,	'社員',	1,	'1@gmail.com',	NULL,	'$2y$10$PwEyFI9EKBZsEZkRi2ofjulAQRuYPDvLJg3e9IL70W/FOzCsir9fu',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-05-31 19:27:27',	'2022-06-04 19:38:03'),
(3,	'張大華',	'Fl',	'四化一乙',	NULL,	'0912345678',	0,	NULL,	'器材',	1,	'2@gmail.com',	NULL,	'$2y$10$jK32iS6SgLgqPYpk/UH9WO9kxiZTndkeMgWewpee7vMXsrbiHiUCe',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-05-31 19:27:51',	'2022-06-04 10:28:57'),
(4,	'陳小美',	'Cl',	'四工二丙',	NULL,	'0912345678',	0,	NULL,	'社員',	1,	'3@gmail.com',	NULL,	'$2y$10$NisUPI/dylwOTJynUNYS/.wsoc/7vVfww/dsWQqqkkLwFIixk9Kce',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-05-31 19:28:10',	'2022-06-05 07:54:21'),
(5,	'郭泡芙',	'Tp',	'四資二乙',	NULL,	'0912345678',	0,	NULL,	'文書',	1,	'n@gmail.com',	NULL,	'$2y$10$O0wTiuKQ28K03/hi4wUL9ePLefZeeP51rJzCuN1PpW5w71rSYWq5y',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-05-31 19:34:16',	'2022-06-05 07:54:21'),
(6,	'陳布丁',	'Sax',	'四機四乙',	NULL,	'0912345678',	0,	NULL,	'副社',	1,	'h@gmail.com',	NULL,	'$2y$10$wlribbUAovXQLwKRiDfqTO6YU2d1olnYQLJgWGi2mG4G0PsFgvURS',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-05-31 19:34:36',	'2022-06-04 10:28:40'),
(7,	'孫悟空',	'Horn',	'四工三甲',	NULL,	'0912345678',	0,	NULL,	'社員',	1,	'abc@gmail.com',	NULL,	'$2y$10$V06aLiU0UsfJh2Nhm0QzIOmGz04Y1QuYeQAZ1kB7baFu/B3ZMCcOi',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-06-04 10:30:13',	'2022-06-04 19:38:03');

-- 2025-07-13 23:10:30
