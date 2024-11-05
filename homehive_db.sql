-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 11:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homehive_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bulletin_board`
--

CREATE TABLE `bulletin_board` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `post_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulletin_board`
--

INSERT INTO `bulletin_board` (`id`, `title`, `description`, `category_id`, `user_id`, `post_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Final Defense', '<p>Final Defense</p>', 12, NULL, '2024-11-05', '2024-10-17 04:52:24', '2024-10-21 07:44:25', '2024-10-21 07:44:25'),
(2, 'Final Defense 2nd Day', '<div>Final Def</div>', 6, NULL, '2024-11-07', '2024-10-18 08:44:07', '2024-10-21 07:44:21', '2024-10-21 07:44:21'),
(3, 'Christmas Party', '<p><span style=\"color: rgb(255, 0, 0); font-weight: bold;\">Christmas Party</span></p>', 20, NULL, '2024-12-20', '2024-10-19 17:45:43', '2024-11-03 04:28:17', NULL),
(4, 'Christmas Party 2', '<span style=\"font-family: &quot;Comic Sans MS&quot;; font-size: 36px; font-style: italic; font-weight: 700; background-color: rgb(255, 153, 0); text-decoration-line: underline;\">Hi</span>', 3, NULL, '2024-10-15', '2024-10-19 17:48:22', '2024-10-21 07:34:11', '2024-10-21 07:34:11'),
(5, 'Testing', '<p>\r\n\r\n<font size=\"+1\" style=\" font-family: &quot;Times New Roman&quot;; background-color: rgb(253, 253, 255)\"><p>In Britain’s Isle, no matter where,<br />&nbsp; &nbsp; An ancient pile of buildings stands:<br />The Huntingdons and Hattons there<br />&nbsp; &nbsp; Employ’d the power of Fairy hands<br /><br />To raise the ceiling’s fretted height,<br />&nbsp; &nbsp; Each pannel in achievements cloathing,<br />Rich windows that exclude the light,<br />&nbsp; &nbsp; And passages, that lead to nothing.<br /><br />Full oft within the spacious walls,<br />&nbsp; &nbsp; When he had fifty winters o’er him,<br />My grave Lord-Keeper<sup><font size=\"-1\">1</font></sup><span>&nbsp;</span>led the Brawls;<br />&nbsp; &nbsp; The Seal, and Maces, danc’d before him.<br /><br />His bushy beard, and shoe-strings green,<br />&nbsp; &nbsp; His high-crown’d hat, and satin-doublet,<br />Mov’d the stout heart of England’s Queen,<br />&nbsp; &nbsp; Tho’ Pope and Spaniard could not trouble it.<br /><br />What, in the very first beginning!<br />&nbsp; &nbsp; Shame of the versifying tribe!<br />Your Hist’ry whither are you spinning?<br />&nbsp; &nbsp; Can you do nothing but describe?<br /><br />A House there is, (and that’s enough)<br />&nbsp; &nbsp; From whence one fatal morning issues<br />A brace of Warriors, not in buff,<br />&nbsp; &nbsp; But rustling in their silks and tissues.<br /><br />The first came cap-a-pee from France<br />&nbsp; &nbsp; Her conqu’ring destiny fulfilling,<br />Whom meaner beauties eye askance,<br />&nbsp; &nbsp; And vainly ape her art of killing.<br /><br />The other Amazon kind heaven<br />&nbsp; &nbsp; Had armed with spirit, wit, and satire:<br />But C<font size=\"-1\">OBHAM</font><span>&nbsp;</span>had the polish given<br />&nbsp; &nbsp; And tip’d her arrows with good-nature.<br /><br />To celebrate her eyes, her air -<br />&nbsp; &nbsp; Coarse panegyricks would but teaze her.<br />Melissa is her Nom de Guerre.<br />&nbsp; &nbsp; Alas, who would not wish to please her!<br /><br />With bonnet blue and capucine,<br />&nbsp; &nbsp; And aprons long they hid their armour,<br />And veil’d their weapons bright and keen<br />&nbsp; &nbsp; In pity to the country-farmer.<br /><br />Fame, in the shape of Mr. Purt,<br />&nbsp; &nbsp; (By this time all the parish know it)<br />Had told, that thereabouts there lurk’d<br />&nbsp; &nbsp; A wicked Imp they call a Poet,<br /><br />Who prowl’d the country far and near,<br />&nbsp; &nbsp; Bewitch’d the children of the peasants,<br />Dried up the cows, and lam’d the deer,<br />&nbsp; &nbsp; And suck’d the eggs and kill’d the pheasants.<br /><br />My Lady heard their joint petition,<br />&nbsp; &nbsp; Swore by her coronet and ermine,<br />She’d issue out her high commission<br />&nbsp; &nbsp; To rid the manour of such vermin.<br /><br />The Heroines undertook the task,<br />&nbsp; &nbsp; Thro’ lanes unknown, o’er stiles they ventur’d,<br />Rap’d at the door nor stay’d to ask,<br />&nbsp; &nbsp; But bounce into the parlour enter’d.<br /><br />The trembling family they daunt,<br />&nbsp; &nbsp; They flirt, they sing, they laugh, they tattle,<br />Rummage his Mother, pinch his Aunt,<br />&nbsp; &nbsp; And up stairs in a whirlwind rattle.<br /><br />Each hole and cupboard they explore,<br />&nbsp; &nbsp; Each creek and cranny of his chamber,<br />Run hurry-skurry round the floor,<br />&nbsp; &nbsp; And o’er the bed and tester clamber,<br /><br />Into the Drawers and China pry,<br />&nbsp; &nbsp; Papers and books, a huge Imbroglio!<br />Under a tea-cup he might lie,<br />&nbsp; &nbsp; Or creased, like dogs-ears, in a folio.<br /><br />On the first marching of the troops<br />&nbsp; &nbsp; The Muses, hopeless of his pardon,<br />Convey’d him underneath their hoops<br />&nbsp; &nbsp; To a small closet in the garden.<br /><br />So Rumour says. (Who will, believe.)<br />&nbsp; &nbsp; But that they left the door a-jarr,<br />Where, safe and laughing in his sleeve,<br />&nbsp; &nbsp; He heard the distant din of war.<br /><br />Short was his joy. He little knew<br />&nbsp; &nbsp; The power of Magick was no fable.<br />Out of the window, whisk, they flew,<br />&nbsp; &nbsp; But left a spell upon the table.<br /><br />The words too eager to unriddle,<br />&nbsp; &nbsp; The poet felt a strange disorder:<br />Transparent birdlime form’d the middle,<br />&nbsp; &nbsp; And chains invisible the border.<br /><br />So cunning was the Apparatus,<br />&nbsp; &nbsp; The powerful pothooks did so move him,<br />That, will he, nill he, to the Great-house<br />&nbsp; &nbsp; He went, as if the Devil drove him.<br /><br />Yet on his way (no sign of grace,<br />&nbsp; &nbsp; For folks in fear are apt to pray)<br />To Phoebus he prefer’d his case,<br />&nbsp; &nbsp; And begged his aid that dreadful day.<br /><br />The Godhead would have back’d his quarrel,<br />&nbsp; &nbsp; But, with a blush on recollection,<br />Own’d that his quiver and his laurel<br />&nbsp; &nbsp; ’Gainst four such eyes were no protection.<br /><br />The Court was sate, the Culprit there,<br />&nbsp; &nbsp; Forth from their gloomy mansions creeping<br />The Lady<span>&nbsp;</span><i>Janes</i><span>&nbsp;</span>and<span>&nbsp;</span><i>Joans</i><span>&nbsp;</span>repair,<br />&nbsp; &nbsp; And from the gallery stand peeping:<br /><br />Such as in silence of the night<br />&nbsp; &nbsp; Come (sweep) along some winding entry<br />(<i>Styack</i><sup><font size=\"-1\">2</font></sup><span>&nbsp;</span>has often seen the sight)<br />&nbsp; &nbsp; Or at the chappel-door stand sentry;<br /><br />In peaked hoods and mantles tarnish’d,<br />&nbsp; &nbsp; Sour visages, enough to scare ye,<br />High dames of honour once, that garnish’d<br />&nbsp; &nbsp; The drawing-room of fierce Queen Mary.<br /><br />The Peeress comes. The Audience stare,<br />&nbsp; &nbsp; And doff their hats with due submission:<br />She curtsies, as she takes her chair,<br />&nbsp; &nbsp; To all the people of condition.<br /><br />The bard with many an artful fib,<br />&nbsp; &nbsp; Had in imagination fenc’d him,<br />Disproved the arguments of<span>&nbsp;</span><i>Squib</i>,<sup><font size=\"-1\">3</font></sup><br />&nbsp; &nbsp; And all that<span>&nbsp;</span><i>Groom</i><sup><font size=\"-1\">4</font></sup><span>&nbsp;</span>could urge against him.<br /><br />But soon his rhetorick forsook him,<br />&nbsp; &nbsp; When he the solemn hall had seen;<br />A sudden fit of ague shook him,<br />&nbsp; &nbsp; He stood as mute as poor<span>&nbsp;</span><i>Macleane</i>.<sup><font size=\"-1\">5</font></sup><br /><br />Yet something he was heard to mutter,<br />&nbsp; &nbsp; ‘‘How in the park beneath an old-tree<br />(Without design to hurt the butter,<br />&nbsp; &nbsp; Or any malice to the poultry,)<br /><br />‘‘He once or twice had pen’d a sonnet;<br />&nbsp; &nbsp; Yet hop’d that he might save his bacon:<br />Numbers would give their oaths upon it,<br />&nbsp; &nbsp; He ne’er was for a conj’rer taken.’’<br /><br />The ghostly Prudes with hagged face<br />&nbsp; &nbsp; Already had condemn’d the sinner.<br />My Lady rose, and with a grace -<br />&nbsp; &nbsp; She smiled, and bid him come to dinner.<br /><br />‘‘Jesu-Maria! Madam Bridget,<br />&nbsp; &nbsp; Why, what can the Viscountess mean?’’<br />(Cried the square Hoods in woeful fidget)<br />&nbsp; &nbsp; ‘‘The times are altered quite and clean!<br /><br />‘‘Decorum’s turned to mere civility;<br />&nbsp; &nbsp; Her air and all her manners show it.<br />Commend me to her affability!<br />&nbsp; &nbsp; Speak to a Commoner and Poet!’’<br /><br /><em>[Here 500 Stanzas are lost.]</em><br /><br />And so God save our noble King,<br />&nbsp; &nbsp; And guard us from long-winded Lubbers,<br />That to eternity would sing,<br />&nbsp; &nbsp; And keep my Lady from her Rubbers.<br /></p></font><p style=\" font-family: &quot;Times New Roman&quot;; background-color: rgb(253, 253, 255)\"><font size=\"+1\"></font><font color=\"#800000\">Gray’s own notes:</font></p><p style=\" font-family: &quot;Times New Roman&quot;; background-color: rgb(253, 253, 255)\">1. Hatton, prefer’d by Queen Elizabeth for his graceful Person and fine Dancing.<br />2. The House-Keeper.<br />3. Groom of the Chambers.<br />4. The Steward.<br />5. A famous Highwayman hang’d the week before.<br /><br /><br /><br /><br />(The Works of Thomas Gray in Prose and Verse, edited by Edmund Gosse, 4 vols. London, Macmillan and Co., 1912. Vol 1, p 81.)<font color=\"#800000\"><br /><br /></font></p><center style=\" font-family: &quot;Times New Roman&quot;; background-color: rgb(253, 253, 255)\"><font color=\"#800000\">* * *</font></center><font color=\"#800000\" style=\"font-family: &quot;Times New Roman&quot;; background-color: rgb(253, 253, 255)\"><br /><br />How long should a poem be? Gray himself never wrote, or at least never completed, any really large-scale poem, and was conscious of being a writer of short, intense lyrics. In this he was modern: the epics of the classical world, the mediaeval verse romances, the stories of Chaucer, the rambling popular ballads, and the huge narratives of the Renaissance are types of poetry not written any more, but they are what poetry used to be, and in Gray’s<span>&nbsp;</span><i>Long Story</i>, which is of course really a very short story, all of these forms are duly acknowledged.<p>So there is an epic touch, when the Muses spirit the poet away from his Amazonian assault like those guardian deities in Homer who remove their favourite heroes from the battlefield. The protests against the poem, which cause the poet to change tack,</p><blockquote><i>What, in the very first beginning!<br />Shame of the versifying tribe!</i></blockquote>- are like the protests of the Canterbury Pilgrims against Chaucer, which cause him to abandon completely his<span>&nbsp;</span><i>Tale of Sir Thopas</i>. The two Amazons, setting out on their quest in full armour, are mediaeval knights errant, but also remind us of Tasso’s Clorinda. (Gray translated a passage of the<span>&nbsp;</span><i>Gerusalemme Liberata</i><span>&nbsp;</span>into English heroic couplets.) The stanza form of four lines with alternate rhymes reminds us of an anonymous ballad. The very last stanza, with its health to the King,<blockquote><i>And so God save our noble King,<br />&nbsp; &nbsp;And guard us from long-winded Lubbers,<br />That to eternity would sing,<br />&nbsp; &nbsp;And keep my Lady from her Rubbers.</i></blockquote>is a deliberate echo of the ending of<span>&nbsp;</span><i>Chevy Chase</i>,<blockquote><i>God save our king, and bless this land<br />&nbsp; &nbsp; With plenty, joy, and peace,<br />And grant henceforth that foul debate<br />&nbsp; &nbsp; Twixt noble men may cease.</i></blockquote></font>\r\n<br /></p>', 20, NULL, '2024-10-21', '2024-10-19 19:13:17', '2024-11-03 04:28:17', NULL),
(6, 'testing 2', '<p>hello</p>', 21, NULL, '2024-10-21', '2024-10-19 19:14:39', '2024-11-03 04:28:25', NULL),
(7, 'Testing 3', '<p>oki</p>', 20, NULL, '2024-10-21', '2024-10-19 20:34:00', '2024-11-03 04:28:17', NULL),
(8, 'Test 34', '<p>hi</p>', 3, 20, '2024-10-21', '2024-10-19 20:39:51', '2024-11-01 00:15:36', '2024-11-01 00:15:36'),
(9, 'Hello', '<p>Okay</p>', 3, 20, '2024-10-22', '2024-10-19 20:46:41', '2024-10-21 07:34:00', '2024-10-21 07:34:00'),
(10, 'Title 1', '<p>dadadw</p>', 20, 20, '2024-10-22', '2024-10-20 00:36:41', '2024-11-03 04:28:17', NULL),
(11, 'hello', '<p>okay</p>', 3, 20, '2024-11-30', '2024-10-20 00:48:02', '2024-10-21 07:47:12', '2024-10-21 07:47:12'),
(12, 'Test', '<p>Test</p>', 3, NULL, '2024-10-23', '2024-10-20 22:02:39', '2024-10-22 00:12:57', '2024-10-22 00:12:57'),
(13, 'Testing Again', '<p>Okay</p>', 6, NULL, '2024-10-24', '2024-10-20 22:11:24', '2024-10-20 22:11:24', NULL),
(14, 'Test 3', '<p>Hello</p>', 8, NULL, '2024-10-23', '2024-10-20 22:21:44', '2024-10-21 05:39:11', NULL),
(15, 'Maybe Test', '<p>maybe</p>', 20, 20, '2024-10-23', '2024-10-20 22:38:18', '2024-11-03 04:28:17', NULL),
(16, 'New Test', '<p>New Test</p>', 20, 20, '2024-10-24', '2024-10-20 23:03:25', '2024-11-03 04:28:17', NULL),
(17, 'party', '<p>party</p>', 20, 20, '2024-10-23', '2024-10-20 23:28:46', '2024-11-03 04:28:17', NULL),
(18, 'Another Test', '<p>Another Test<br /></p>', 20, 20, '2024-10-23', '2024-10-20 23:48:42', '2024-11-03 04:28:17', NULL),
(19, 'Hello', '<p>Okay</p>', 6, 20, '2024-10-10', '2024-10-21 07:39:59', '2024-10-21 07:44:18', '2024-10-21 07:44:18'),
(20, 'Another Test', '<p>Another Test</p>', 16, 20, '2024-10-24', '2024-10-22 02:23:45', '2024-10-22 02:23:45', NULL),
(21, 'Test Christmas Party', '<p>Test Christmas Party<br /></p>', 3, 20, '2024-10-25', '2024-10-22 17:44:50', '2024-10-22 20:45:23', '2024-10-22 20:45:23'),
(22, 'New Year Party', '<p>New Year Party<br /></p>', 21, 20, '2024-10-24', '2024-10-22 20:45:41', '2024-11-03 04:28:25', NULL),
(23, 'New Year Party', '<p>New Year Party<br /></p>', 4, 20, '2024-10-24', '2024-10-22 20:46:51', '2024-10-22 21:11:15', '2024-10-22 21:11:15'),
(24, 'New Year Party', '<p>New Year Party<br /></p>', 4, 20, '2024-10-24', '2024-10-22 20:47:23', '2024-10-22 21:11:11', '2024-10-22 21:11:11'),
(25, 'New Year Party', '<p>New Year Party<br /></p>', 4, 20, '2024-10-24', '2024-10-22 20:48:06', '2024-10-22 21:11:07', '2024-10-22 21:11:07'),
(26, 'New Year Party', '<p>New Year Party<br /></p>', 4, 20, '2024-10-24', '2024-10-22 20:49:18', '2024-10-22 21:11:04', '2024-10-22 21:11:04'),
(27, 'New Year Party', '<p>New Year Party<br /></p>', 4, 20, '2024-10-24', '2024-10-22 20:50:30', '2024-10-22 21:11:00', '2024-10-22 21:11:00'),
(28, 'New Year Party', '<p>New Year Party<br /></p>', 4, 20, '2024-10-24', '2024-10-22 20:54:20', '2024-10-22 21:10:56', '2024-10-22 21:10:56'),
(29, 'New Year Party', '<p>New Year Party<br /></p>', 4, 20, '2024-10-24', '2024-10-22 20:56:20', '2024-10-22 21:10:52', '2024-10-22 21:10:52'),
(30, 'New Year Party', '<p>New Year Party<br /></p>', 4, 20, '2024-10-24', '2024-10-22 21:06:26', '2024-10-22 21:10:47', '2024-10-22 21:10:47'),
(31, 'Maintenance', '<p>Maintenance<br /></p>', 6, 20, '2024-10-17', '2024-10-22 21:18:27', '2024-10-22 21:19:08', '2024-10-22 21:19:08'),
(32, 'Maintenance', '<p>Maintenance<br /></p>', 6, 20, '2024-10-24', '2024-10-22 21:19:24', '2024-10-22 21:19:24', NULL),
(33, 'Maintenance', '<p>Maintenance<br /></p>', 6, 20, '2024-10-25', '2024-10-22 21:22:04', '2024-10-22 21:33:54', '2024-10-22 21:33:54'),
(34, 'Maintenance', '<p>Maintenance<br /></p>', 6, 20, '2024-10-26', '2024-10-22 21:23:57', '2024-10-22 21:33:50', '2024-10-22 21:33:50'),
(35, 'Christmas Party', 'at 1am the xmas party will start', 20, 20, '2024-10-25', '2024-10-22 21:34:19', '2024-11-03 04:28:17', NULL),
(36, 'Scheduled Maintenance', '<p>Scheduled Maintenance<br /></p>', 6, 20, '2024-10-25', '2024-10-22 21:39:19', '2024-10-22 21:39:19', NULL),
(37, 'Xmas Party', '<p>Xmas Party<br /></p>', 20, 20, '2024-10-25', '2024-10-22 23:31:28', '2024-11-03 04:28:17', NULL),
(38, 'Test Category', '<p>Test Category<br /></p>', 20, 20, '2024-10-26', '2024-10-26 00:01:06', '2024-11-03 04:28:17', NULL),
(39, 'Hello', '<p>Hello</p>', 20, 20, '2024-10-30', '2024-10-30 05:55:32', '2024-11-03 19:36:20', '2024-11-03 19:36:20'),
(40, 'Me', '<p>Me<br /></p>', 3, 20, '2024-10-19', '2024-10-30 08:05:09', '2024-11-01 00:15:42', '2024-11-01 00:15:42'),
(41, 'Test Category', '<p>Test Category<br /></p>', 20, 6, '2024-11-03', '2024-11-03 04:26:53', '2024-11-03 19:36:23', '2024-11-03 19:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `bulletin_board_category`
--

CREATE TABLE `bulletin_board_category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hex_code` varchar(7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulletin_board_category`
--

INSERT INTO `bulletin_board_category` (`id`, `name`, `hex_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Category 2', '#ffffff', '2024-10-14 07:14:42', '2024-10-17 00:38:53', '2024-10-17 00:38:53'),
(2, 'Test Category Hello', '#000000', '2024-10-17 00:39:11', '2024-10-17 02:49:32', '2024-10-17 02:49:32'),
(3, 'Christmas Party', '#ff0000', '2024-10-17 02:59:37', '2024-11-03 04:27:11', '2024-11-03 04:27:11'),
(4, 'New Year', '#000000', '2024-10-17 03:00:04', '2024-11-03 04:28:25', '2024-11-03 04:28:25'),
(5, 'Final Defense', '#00eb2f', '2024-10-17 03:54:37', '2024-10-20 03:51:35', '2024-10-20 03:51:35'),
(6, 'Swimming Pool Maintenance', '#0008ff', '2024-10-20 20:37:03', '2024-11-04 18:02:42', NULL),
(7, 'Test Category', '#00ff11', '2024-10-21 05:21:52', '2024-10-21 05:21:56', '2024-10-21 05:21:56'),
(8, 'Uncategorized', '#000000', '2024-10-21 05:21:56', '2024-10-21 05:39:11', '2024-10-21 05:39:11'),
(9, 'What If Category', '#ff0000', '2024-10-21 05:39:30', '2024-10-21 05:39:33', '2024-10-21 05:39:33'),
(10, 'Uncategorized', '#000000', '2024-10-21 05:39:33', '2024-10-21 05:39:41', '2024-10-21 05:39:41'),
(11, 'Test Category Hello', '#ff00f7', '2024-10-21 07:35:07', '2024-10-21 07:35:10', '2024-10-21 07:35:10'),
(12, 'Uncategorized', '#000000', '2024-10-21 07:35:10', '2024-10-21 07:35:33', '2024-10-21 07:35:33'),
(13, 'Test Category Hello', '#2bff00', '2024-10-21 07:46:36', '2024-10-21 07:46:39', '2024-10-21 07:46:39'),
(14, 'Uncategorized', '#000000', '2024-10-21 07:46:39', '2024-10-21 07:46:50', '2024-10-21 07:46:50'),
(15, 'Maintenance', '#00ff11', '2024-10-21 07:48:35', '2024-11-04 18:02:54', NULL),
(16, 'Another Category', '#00fbff', '2024-10-22 02:23:25', '2024-10-22 02:23:25', NULL),
(17, 'Will Delete', '#e100ff', '2024-10-22 02:25:13', '2024-10-22 02:25:53', '2024-10-22 02:25:53'),
(18, 'Hello', '#000000', '2024-10-22 02:25:53', '2024-10-22 02:31:57', '2024-10-22 02:31:57'),
(19, 'Uncategorized', '#000000', '2024-10-22 02:31:57', '2024-10-22 02:33:04', '2024-10-22 02:33:04'),
(20, 'Uncategorized', '#000000', '2024-11-03 04:27:11', '2024-11-03 04:28:17', '2024-11-03 04:28:17'),
(21, 'Uncategorized', '#000000', '2024-11-03 04:28:25', '2024-11-03 04:28:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('homehivesystem@gmail.com1|127.0.0.1', 'i:1;', 1730799812),
('homehivesystem@gmail.com1|127.0.0.1:timer', 'i:1730799812;', 1730799812);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facility_dates`
--

CREATE TABLE `facility_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` tinyint(3) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facility_reservation`
--

CREATE TABLE `facility_reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `facility_id` tinyint(3) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `fee` int(10) UNSIGNED NOT NULL,
  `payment_mode_id` smallint(5) UNSIGNED NOT NULL,
  `payment_collector_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `appt_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `receipt_path` varchar(255) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `appt_start_time` time DEFAULT NULL,
  `appt_end_time` time DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `payment_status` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facility_reservation`
--

INSERT INTO `facility_reservation` (`id`, `user_id`, `facility_id`, `start_date`, `end_date`, `fee`, `payment_mode_id`, `payment_collector_id`, `appt_date`, `created_at`, `updated_at`, `reference_no`, `receipt_path`, `payment_date`, `appt_start_time`, `appt_end_time`, `deleted_at`, `payment_status`) VALUES
(1, 27, 14, '2024-11-03', '2024-11-03', 550, 1, 12, '2024-11-03', '2024-10-31 20:26:28', '2024-11-01 01:53:04', NULL, NULL, NULL, NULL, NULL, '2024-11-01 01:53:04', NULL),
(2, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 20:27:47', '2024-11-01 01:53:07', NULL, NULL, NULL, NULL, NULL, '2024-11-01 01:53:07', NULL),
(3, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 20:31:17', '2024-11-01 01:53:08', NULL, NULL, NULL, NULL, NULL, '2024-11-01 01:53:08', NULL),
(4, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 16, '2024-11-02', '2024-10-31 20:38:03', '2024-11-01 01:53:09', NULL, NULL, NULL, NULL, NULL, '2024-11-01 01:53:09', NULL),
(5, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 22:18:58', '2024-11-01 01:53:11', NULL, NULL, NULL, NULL, NULL, '2024-11-01 01:53:11', NULL),
(6, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 22:19:30', '2024-11-01 01:53:12', NULL, NULL, NULL, NULL, NULL, '2024-11-01 01:53:12', NULL),
(7, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 22:27:39', '2024-11-01 01:53:14', NULL, NULL, NULL, NULL, NULL, '2024-11-01 01:53:14', NULL),
(8, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 22:31:17', '2024-11-01 01:53:16', NULL, 'https://homehivemedia.blob.core.windows.net/homehivemedia/user-gcash-receipt-payments/user-gcash-receipt-1730442677.jpg', NULL, NULL, NULL, '2024-11-01 01:53:16', NULL),
(9, 27, 14, '2024-11-03', '2024-11-03', 550, 1, 10, '2024-11-03', '2024-10-31 22:38:07', '2024-11-01 01:53:18', '1123123123', NULL, NULL, NULL, NULL, '2024-11-01 01:53:18', NULL),
(10, 27, 14, '2024-11-09', '2024-11-09', 550, 1, 10, '2024-11-09', '2024-10-31 22:40:03', '2024-11-01 01:53:20', '111', NULL, NULL, NULL, NULL, '2024-11-01 01:53:20', NULL),
(11, 27, 14, '2024-12-01', '2024-12-01', 550, 1, 10, '2024-12-01', '2024-10-31 22:42:27', '2024-11-01 01:53:21', '4444', NULL, NULL, NULL, NULL, '2024-11-01 01:53:21', NULL),
(12, 27, 14, '2024-11-03', '2024-11-03', 550, 2, NULL, '2024-11-03', '2024-10-31 23:08:36', '2024-11-01 01:53:29', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-01 01:53:29', NULL),
(13, 27, 14, '2024-11-09', '2024-11-09', 550, 2, NULL, '2024-11-09', '2024-10-31 23:08:54', '2024-11-01 01:53:35', NULL, NULL, NULL, '15:00:00', '16:00:00', '2024-11-01 01:53:35', NULL),
(14, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 16, '2024-11-02', '2024-10-31 23:09:59', '2024-11-01 01:53:37', NULL, 'https://homehivemedia.blob.core.windows.net/homehivemedia/user-gcash-receipt-payments/user-gcash-receipt-1730444999.jpg', NULL, '15:00:00', '16:00:00', '2024-11-01 01:53:37', NULL),
(15, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 23:14:50', '2024-11-01 01:53:38', '4234234', NULL, NULL, '13:00:00', '14:00:00', '2024-11-01 01:53:38', NULL),
(16, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 23:18:14', '2024-11-01 01:53:40', NULL, 'https://homehivemedia.blob.core.windows.net/homehivemedia/user-gcash-receipt-payments/user-gcash-receipt-1730445494.jpg', NULL, '15:00:00', '16:00:00', '2024-11-01 01:53:40', NULL),
(17, 27, 14, '2024-11-03', '2024-11-03', 550, 1, 10, '2024-11-03', '2024-10-31 23:23:36', '2024-11-01 01:53:42', '12312312', NULL, NULL, '13:00:00', '14:00:00', '2024-11-01 01:53:42', NULL),
(18, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 16, '2024-11-02', '2024-10-31 23:24:21', '2024-11-01 02:53:08', '12312312', NULL, '2024-11-01', '13:00:00', '14:00:00', '2024-11-01 02:53:08', 1),
(19, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 23:27:26', '2024-11-01 01:53:33', '1312312', NULL, NULL, '13:00:00', '14:00:00', '2024-11-01 01:53:33', NULL),
(20, 27, 14, '2024-11-02', '2024-11-02', 550, 1, 10, '2024-11-02', '2024-10-31 23:28:49', '2024-11-01 02:53:28', '123213123', NULL, '2024-11-01', '13:00:00', '14:00:00', '2024-11-01 02:53:28', 1),
(21, 24, 14, '2024-11-03', '2024-11-03', 550, 1, 16, '2024-11-03', '2024-11-01 00:30:18', '2024-11-01 02:53:37', '234234234', NULL, '2024-11-01', '13:00:00', '14:00:00', '2024-11-01 02:53:37', 1),
(22, 24, 14, '2024-12-15', '2024-12-15', 550, 2, 10, '2024-12-15', '2024-11-01 01:24:07', '2024-11-01 04:04:38', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-01 04:04:38', 1),
(23, 24, 14, '2024-11-03', '2024-11-03', 550, 1, 10, '2024-11-03', '2024-11-01 01:24:19', '2024-11-01 04:04:42', '3453453', NULL, '2024-11-01', '13:00:00', '14:00:00', '2024-11-01 04:04:42', NULL),
(24, 24, 14, '2024-11-16', '2024-11-16', 550, 1, 18, '2024-11-16', '2024-11-01 01:52:29', '2024-11-01 04:04:44', '21312312', NULL, '2024-11-01', '13:00:00', '14:00:00', '2024-11-01 04:04:44', NULL),
(25, 24, 14, '2024-12-22', '2024-12-22', 550, 1, 10, '2024-12-22', '2024-11-01 02:54:44', '2024-11-01 04:29:53', NULL, 'https://homehivemedia.blob.core.windows.net/homehivemedia/user-gcash-receipt-payments/user-gcash-receipt-1730458484.png', '2024-11-01', '13:00:00', '14:00:00', '2024-11-01 04:29:53', NULL),
(26, 24, 14, '2024-11-02', '2024-11-02', 550, 2, NULL, '2024-11-02', '2024-11-01 03:25:36', '2024-11-01 04:29:55', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-01 04:29:55', NULL),
(27, 27, 14, '2024-11-02', '2024-11-02', 550, 2, 10, '2024-11-02', '2024-11-01 03:26:25', '2024-11-01 04:29:56', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-01 04:29:56', 1),
(28, 27, 14, '2024-11-03', '2024-11-03', 550, 2, 10, '2024-11-03', '2024-11-01 04:30:04', '2024-11-04 22:48:13', NULL, NULL, '2024-11-01', '13:00:00', '14:00:00', '2024-11-04 22:48:13', 1),
(29, 24, 14, '2024-11-02', '2024-11-02', 550, 2, 10, '2024-11-02', '2024-11-01 04:30:30', '2024-11-04 22:48:15', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-04 22:48:15', 1),
(30, 24, 14, '2024-11-03', '2024-11-03', 550, 2, NULL, '2024-11-03', '2024-11-01 04:45:22', '2024-11-04 22:48:17', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-04 22:48:17', NULL),
(31, 24, 14, '2024-11-03', '2024-11-03', 550, 2, 10, '2024-11-03', '2024-11-01 04:46:39', '2024-11-04 22:48:19', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-04 22:48:19', 1),
(32, 24, 14, '2024-12-22', '2024-12-22', 550, 2, NULL, '2024-12-22', '2024-11-01 06:06:35', '2024-11-04 22:48:21', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-04 22:48:21', NULL),
(33, 24, 14, '2024-11-23', '2024-11-23', 550, 2, NULL, '2024-11-23', '2024-11-01 06:10:09', '2024-11-04 22:48:22', NULL, NULL, NULL, '13:00:00', '14:00:00', '2024-11-04 22:48:22', NULL),
(34, 27, 14, '2024-11-10', '2024-11-10', 550, 2, 10, '2024-11-10', '2024-11-01 06:18:55', '2024-11-04 22:48:24', NULL, NULL, '2024-11-01', '13:00:00', '14:00:00', '2024-11-04 22:48:24', 1),
(35, 27, 15, '2024-11-02', '2024-11-02', 250, 1, 10, '2024-11-03', '2024-11-04 22:52:17', '2024-11-04 22:52:47', NULL, 'https://homehivemedia.blob.core.windows.net/homehivemedia/user-gcash-receipt-payments/user-gcash-receipt-1730789536.jpg', '2024-11-05', '13:00:00', '14:00:00', NULL, 1),
(36, 27, 15, '2024-11-02', '2024-11-02', 250, 2, 10, '2024-11-03', '2024-11-04 23:38:10', '2024-11-05 00:03:30', NULL, NULL, '2024-11-05', '13:00:00', '14:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facility_time_slots`
--

CREATE TABLE `facility_time_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` tinyint(3) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facility_time_slots`
--

INSERT INTO `facility_time_slots` (`id`, `facility_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(5, 3, '23:14:00', '23:14:00', '2024-10-31 07:14:25', '2024-10-31 07:14:25'),
(6, 3, '23:13:00', '23:18:00', '2024-10-31 07:14:25', '2024-10-31 07:14:25'),
(7, 4, '23:24:00', '23:25:00', '2024-10-31 07:22:17', '2024-10-31 07:22:17'),
(8, 4, '23:27:00', '23:28:00', '2024-10-31 07:22:17', '2024-10-31 07:22:17'),
(9, 5, '13:09:00', '14:00:00', '2024-10-31 07:26:43', '2024-10-31 07:26:43'),
(10, 5, '14:00:00', '15:00:00', '2024-10-31 07:26:44', '2024-10-31 07:26:44'),
(12, 7, '23:57:00', '23:57:00', '2024-10-31 07:55:58', '2024-10-31 07:55:58'),
(13, 8, '23:58:00', '13:58:00', '2024-10-31 07:58:05', '2024-10-31 07:58:05'),
(14, 9, '14:59:00', '23:02:00', '2024-10-31 07:59:14', '2024-10-31 07:59:14'),
(15, 9, '23:03:00', '16:59:00', '2024-10-31 07:59:14', '2024-10-31 07:59:14'),
(16, 10, '23:01:00', '23:03:00', '2024-10-31 07:59:36', '2024-10-31 07:59:36'),
(19, 2, '23:14:00', '23:14:00', '2024-10-31 08:40:34', '2024-10-31 08:40:34'),
(20, 2, '23:13:00', '23:18:00', '2024-10-31 08:40:34', '2024-10-31 08:40:34'),
(21, 6, '23:36:00', '23:36:00', '2024-10-31 09:58:11', '2024-10-31 09:58:11'),
(22, 11, '02:19:00', '06:17:00', '2024-10-31 10:17:14', '2024-10-31 10:17:14'),
(23, 1, '23:12:00', '23:12:00', '2024-10-31 10:20:47', '2024-10-31 10:20:47'),
(24, 1, '23:12:00', '23:13:00', '2024-10-31 10:20:47', '2024-10-31 10:20:47'),
(25, 12, '05:21:00', '02:24:00', '2024-10-31 10:21:21', '2024-10-31 10:21:21'),
(26, 13, '13:00:00', '15:00:00', '2024-10-31 18:46:23', '2024-10-31 18:46:23'),
(27, 13, '16:00:00', '18:00:00', '2024-10-31 18:46:23', '2024-10-31 18:46:23'),
(28, 14, '13:00:00', '14:00:00', '2024-10-31 19:17:27', '2024-10-31 19:17:27'),
(29, 14, '15:00:00', '16:00:00', '2024-10-31 19:17:27', '2024-10-31 19:17:27'),
(30, 15, '13:00:00', '14:00:00', '2024-11-04 22:49:25', '2024-11-04 22:49:25'),
(31, 15, '15:00:00', '16:00:00', '2024-11-04 22:49:25', '2024-11-04 22:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"4d1f6e64-4de5-42fa-a053-590a30303697\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:20:\\\"SuperAdmin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(2, 'default', '{\"uuid\":\"6fe929a7-57b8-4716-93a0-741d56daad04\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel1Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(3, 'default', '{\"uuid\":\"e73cf484-d22a-4930-9bfe-d2fe245ea777\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel2Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(4, 'default', '{\"uuid\":\"a7e7ed6f-a5b6-4f66-bddc-92404cbb6ebc\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel1Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(5, 'default', '{\"uuid\":\"55a91985-2fbf-4bec-8028-26b8777f164e\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel2Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(6, 'default', '{\"uuid\":\"059b96d2-8a31-4d44-8afa-4644b440bc1b\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(7, 'default', '{\"uuid\":\"07731cff-7a17-443e-800a-9af30c5a4198\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"User3@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(8, 'default', '{\"uuid\":\"401cf146-4a05-4d31-bb91-62912f99de16\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"UnverifiedUser@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(9, 'default', '{\"uuid\":\"9e34a948-e22d-4ac2-86ee-1d48fce8751c\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:31;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"homehivesystem@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660707, 1729660707),
(10, 'default', '{\"uuid\":\"3a84374c-dc7f-47e0-b0cf-78dcf3ef285c\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:20:\\\"SuperAdmin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(11, 'default', '{\"uuid\":\"9e518b2e-72df-44c5-a228-5cf8c60d72c9\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel1Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(12, 'default', '{\"uuid\":\"38631eec-5461-4426-989d-4c91ca7f4b50\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel2Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(13, 'default', '{\"uuid\":\"b3019b9c-b62d-48cf-87dd-909761015f9d\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel1Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(14, 'default', '{\"uuid\":\"f279229e-9f39-47bc-8e8e-2098f9e556d6\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel2Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(15, 'default', '{\"uuid\":\"c24ecdb0-b0e2-4e66-bb4d-1fe4c0c2a3e8\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(16, 'default', '{\"uuid\":\"8e0f70a5-a17f-48d1-9868-6703a4f03ba9\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"User3@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(17, 'default', '{\"uuid\":\"dcf87b62-1410-49b6-a2f2-a65707f49f2c\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"UnverifiedUser@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(18, 'default', '{\"uuid\":\"20bed556-877d-4eb4-a0fe-1090e9fdd538\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:32;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"homehivesystem@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660764, 1729660764),
(19, 'default', '{\"uuid\":\"5bf7f2d1-cd9b-473c-b261-f32255599608\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:20:\\\"SuperAdmin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(20, 'default', '{\"uuid\":\"04437117-e38f-4da5-8308-a4bc286c715a\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel1Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(21, 'default', '{\"uuid\":\"b4ea15f1-ce83-4fac-b4dc-6ce672016167\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel2Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(22, 'default', '{\"uuid\":\"1370d449-1bac-4c6e-9e78-4cac9afeb185\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel1Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(23, 'default', '{\"uuid\":\"4b173d02-70b4-4059-836d-9b9d77036a8d\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel2Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(24, 'default', '{\"uuid\":\"d47d2295-4fd1-42c7-bf78-937d48c3f67d\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(25, 'default', '{\"uuid\":\"3ca5f385-73de-4cf1-8411-43656c302ce3\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"User3@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(26, 'default', '{\"uuid\":\"a2f21c38-f8d7-48da-9c56-2fc4b035f325\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"UnverifiedUser@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(27, 'default', '{\"uuid\":\"913af8ba-022f-4863-8398-9fbd2d5a0555\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:33;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"homehivesystem@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729660924, 1729660924),
(28, 'default', '{\"uuid\":\"601090b2-a6c4-44e6-a5d4-330bb72df7b2\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:20:\\\"SuperAdmin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666),
(29, 'default', '{\"uuid\":\"1dd7505c-8019-42ba-9628-d46c99e4ad8d\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel1Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666),
(30, 'default', '{\"uuid\":\"3ea7261a-c49b-4d98-ae49-825ebd14040d\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel2Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666),
(31, 'default', '{\"uuid\":\"e875068c-6f20-459e-bc0d-e2292d6bd077\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel1Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666),
(32, 'default', '{\"uuid\":\"01662557-3b1c-410a-9c37-99cb25003f46\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel2Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666),
(33, 'default', '{\"uuid\":\"1b580086-a793-4e78-8e46-32da3173237a\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666),
(34, 'default', '{\"uuid\":\"8ee73bf6-9a10-4c3b-b9eb-d81cd70b5c48\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"User3@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666),
(35, 'default', '{\"uuid\":\"377db08f-f2e4-4fcb-8792-fbf9ef3d3b9d\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"UnverifiedUser@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666),
(36, 'default', '{\"uuid\":\"ed99ff4d-a8e2-423b-b2ed-a357cc9d48d6\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:38;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"homehivesystem@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1729929666, 1729929666);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(37, 'default', '{\"uuid\":\"e9cc11db-e546-4852-94ec-a11aa50e789f\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:20:\\\"SuperAdmin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(38, 'default', '{\"uuid\":\"23e3912c-056e-4d73-8be6-a4af6ea1f806\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel1Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(39, 'default', '{\"uuid\":\"cc2e4040-038e-4df3-a9ff-d734f0b0c430\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel2Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(40, 'default', '{\"uuid\":\"25a8cd00-deb5-410a-b063-e7a1042508c0\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel1Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(41, 'default', '{\"uuid\":\"0a8826c1-bef0-49ed-a137-d9071380ccef\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel2Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(42, 'default', '{\"uuid\":\"783efb68-3bbd-4ba6-a0ba-1f43caaa5573\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(43, 'default', '{\"uuid\":\"ade5a421-bee4-4a1e-b34b-2c7711ae1661\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"User3@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(44, 'default', '{\"uuid\":\"ca36ef9f-3150-4b0e-89d9-8d77b40965b5\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"UnverifiedUser@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(45, 'default', '{\"uuid\":\"59a1b066-1fce-4d9b-a3ee-3f3cdb529bcc\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:39;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"homehivesystem@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730296532, 1730296532),
(46, 'default', '{\"uuid\":\"95a6f931-bd88-4981-ae27-ca5bfab83825\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:20:\\\"SuperAdmin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814),
(47, 'default', '{\"uuid\":\"82f5f10a-2b7b-4b86-ae4c-ec5acb0c1610\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel1Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814),
(48, 'default', '{\"uuid\":\"a2a6748f-dbeb-4fd2-9b02-5d963268c806\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:21:\\\"Panel2Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814),
(49, 'default', '{\"uuid\":\"7dbef7e0-8804-441a-8ed7-7af879826fda\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel1Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814),
(50, 'default', '{\"uuid\":\"1414807f-e016-4317-a1d4-ae447b94553b\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"Panel2Resident@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814),
(51, 'default', '{\"uuid\":\"37653c3e-d1de-463e-ac88-ef72d370e4cf\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"Admin@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814),
(52, 'default', '{\"uuid\":\"84ec1796-6e98-400a-bd8d-89885721c607\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"User3@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814),
(53, 'default', '{\"uuid\":\"6f6da5fb-2bd4-466a-8c53-057b6d6912ca\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"UnverifiedUser@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814),
(54, 'default', '{\"uuid\":\"127cc5ec-fa08-4e16-a818-1f9b2303ff9e\",\"displayName\":\"App\\\\Mail\\\\BulletinBoardNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:34:\\\"App\\\\Mail\\\\BulletinBoardNotification\\\":3:{s:13:\\\"bulletinEntry\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"App\\\\Models\\\\BulletinBoardEntry\\\";s:2:\\\"id\\\";i:41;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:24:\\\"homehivesystem@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1730636814, 1730636814);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(42, '0001_01_01_000001_create_cache_table', 1),
(43, '0001_01_01_000002_create_jobs_table', 1),
(44, '2024_07_24_183443_create_account_type_table', 1),
(45, '2024_07_24_183501_create_payment_category_table', 1),
(46, '2024_07_24_183520_create_payment_mode_table', 1),
(47, '2024_07_24_183539_create_payment_status_table', 1),
(48, '2024_07_24_183548_create_payment_collector_table', 1),
(49, '2024_07_24_183603_create_permission_table', 1),
(50, '2024_07_24_183615_create_privilege_table', 1),
(51, '2024_07_24_183630_create_subdivision_role_table', 1),
(52, '2024_07_24_183641_create_subdivision_facility_table', 1),
(53, '2024_07_24_183701_create_users_table', 1),
(54, '2024_07_24_183723_create_bulletin_board_category_table', 1),
(55, '2024_07_24_183737_create_bulletin_board_table', 1),
(56, '2024_07_24_183746_create_notification_table', 1),
(57, '2024_07_24_183753_create_payment_table', 1),
(58, '2024_07_24_183806_create_facility_reservation_table', 1),
(59, '2024_07_24_183818_create_vehicle_sticker_application_table', 1),
(60, '2024_08_29_060930_add_street_to_users_table', 1),
(61, '2024_09_01_065411_update_street_column_in_users_table', 1),
(62, '2024_09_11_120656_add_profile_picture_to_users_table', 2),
(63, '2024_10_13_034558_add_is_verified_to_users_table', 3),
(64, '2024_10_13_101703_add_deleted_at_to_users_table', 4),
(65, '2024_10_14_035100_modify_street_nullable', 5),
(66, '2024_10_14_084033_update_unique_constraints_on_users_table', 6),
(67, '2024_10_14_144949_add_hex_code_to_bulletin_board_category', 7),
(68, '2024_10_17_081744_add_deleted_at_to_bulletin_board_category_table', 8),
(69, '2024_10_19_094053_create_password_resets_table', 9),
(70, '2024_10_20_022343_modify_description_column_in_bulletin_board_table', 10),
(71, '2024_10_20_033339_add_user_id_to_bulletin_board_table', 11),
(72, '2024_10_20_040224_update_bulletin_board_table', 12),
(73, '2024_10_21_044608_add_deleted_at_to_bulletin_board', 12),
(74, '2024_10_23_063934_create_subdivisions_table', 13),
(75, '2024_10_23_070318_add_subdivision_id_to_users_table', 14),
(76, '2024_10_28_023731_add_collector_gcash_number_to_payment_collector_table', 15),
(77, '2024_10_28_084426_add_gcash_qr_code_to_payment_collector_table', 16),
(78, '2024_10_28_111922_add_deleted_at_to_payment_collector_table', 17),
(79, '2024_10_28_115818_add_hex_code_to_payment_category', 18),
(80, '2024_10_28_130712_add_deleted_at_to_payment_category_table', 19),
(81, '2024_10_29_110733_add_month_year_to_payment_table', 20),
(82, '2024_10_29_125242_drop_number_column_from_payment_table', 21),
(83, '2024_10_29_152520_make_receipt_img_nullable_in_payment_table', 22),
(84, '2024_10_29_164535_add_deleted_at_to_payment_table', 23),
(85, '2024_10_30_170554_add_fee_to_payment_category_table', 24),
(86, '2024_10_31_080403_add_reference_no_to_payment_table', 25),
(87, '2024_10_31_134824_add_columns_to_subdivision_facility_table', 26),
(88, '2024_10_31_140316_create_facility_time_slots_table', 27),
(89, '2024_10_31_141751_add_hex_code_to_subdivision_facility_table', 28),
(90, '2024_10_31_164619_add_deleted_at_to_subdivision_facility_table', 29),
(91, '2024_11_01_033905_remove_appt_time_from_facility_reservation', 30),
(92, '2024_11_01_034518_add_reference_no_and_receipt_path_to_facility_reservation_table', 31),
(94, '2024_11_01_042330_add_appt_start_time_and_appt_end_time_to_facility_reservation_table', 32),
(95, '2024_11_01_065638_update_payment_collector_id_in_facility_reservation', 32),
(96, '2024_11_01_072138_add_payment_date_to_facility_reservation_table', 33),
(98, '2024_11_01_080501_add_deleted_at_to_facility_reservation_table', 34),
(99, '2024_11_01_093901_create_facility_dates_table', 35),
(100, '2024_11_01_102600_add_payment_status_to_facility_reservation_table', 36),
(101, '2024_11_01_153053_create_vehicle_sticker_application_details_table', 37),
(102, '2024_11_01_154643_add_registered_vehicles_to_vehicle_sticker_application_details_table', 38),
(103, '2024_11_01_164010_add_date_of_payment_to_vehicle_sticker_application_table', 39),
(104, '2024_11_01_190830_add_receipt_img_to_vehicle_sticker_application_table', 40),
(105, '2024_11_01_191035_modify_appt_columns_nullable', 41),
(106, '2024_11_01_202515_add_status_to_vehicle_sticker_application_table', 42),
(107, '2024_11_01_204305_add_deleted_at_to_vehicle_sticker_application_table', 43);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('homehivesystem@gmail.com', 'FdocX4aWxgJG0FOs04ZVR4fkXaNTgFWEqxDleLAoMORdtqYamdw1jGnBvxcB', '2024-10-21 23:32:47'),
('User1@gmail.com', 'k2vr9XzaMpcpFYRAzYfv2sUEtPZyiCqrZku2jrtqxmstyGQAEg67jVCWa8EW', '2024-10-19 18:47:40'),
('SuperAdmin@gmail.com', 'XjW3xBEGtf3KKX0lmcNU9IHCj8eoGXW6WozF623A2llY6YWk0Ku5VQKoKUGx', '2024-10-19 18:54:41'),
('Panel1Admin@gmail.com', 'kbM3162h0gEkhej2VupqsSPv2Sbh3wddtwiY3ozXIdRTtZAtf7C0iOtsH9jr', '2024-10-19 18:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `fee` int(11) NOT NULL,
  `status_id` tinyint(3) UNSIGNED NOT NULL,
  `pay_date` date NOT NULL,
  `mode_id` smallint(5) UNSIGNED NOT NULL,
  `collector_id` tinyint(3) UNSIGNED NOT NULL,
  `receipt_img` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `title`, `user_id`, `category_id`, `fee`, `status_id`, `pay_date`, `mode_id`, `collector_id`, `receipt_img`, `reference_no`, `created_at`, `updated_at`, `month`, `year`, `deleted_at`) VALUES
(1, 'January Monthly Dues Dates', 7, 1, 550, 1, '2024-10-30', 2, 10, NULL, NULL, '2024-10-29 07:26:04', '2024-10-30 09:02:25', 'March', 2024, '2024-10-30 09:02:25'),
(2, 'January Monthly Dues', 15, 1, 1500, 2, '2024-10-30', 1, 10, NULL, NULL, '2024-10-29 08:23:20', '2024-10-29 08:47:11', 'March', 2024, '2024-10-29 08:47:11'),
(3, 'February Monthly Dues', 7, 1, 550, 1, '2024-10-30', 1, 10, NULL, NULL, '2024-10-29 08:56:32', '2024-10-30 09:02:27', 'January', 2024, '2024-10-30 09:02:27'),
(4, 'March Monthly Dues', 8, 1, 550, 1, '2024-10-30', 1, 10, NULL, NULL, '2024-10-29 09:46:08', '2024-10-30 09:02:30', 'March', 2024, '2024-10-30 09:02:30'),
(5, 'April Monthly Dues', 7, 1, 550, 1, '2024-10-30', 1, 16, NULL, NULL, '2024-10-29 09:48:02', '2024-10-30 09:02:32', 'April', 2024, '2024-10-30 09:02:32'),
(6, 'May Monthly Dues Payment', 7, 1, 550, 2, '2024-10-30', 1, 10, NULL, NULL, '2024-10-29 09:58:45', '2024-10-30 03:48:53', 'May', 2024, '2024-10-30 03:48:53'),
(7, 'August Monthly Dues', 7, 1, 550, 1, '2024-10-30', 2, 10, NULL, NULL, '2024-10-30 03:49:17', '2024-10-30 09:02:34', 'August', 2024, '2024-10-30 09:02:34'),
(8, 'December Monthly Dues', 7, 1, 1500, 1, '2024-10-30', 2, 10, NULL, NULL, '2024-10-30 05:48:07', '2024-10-30 09:02:35', 'November', 2024, '2024-10-30 09:02:35'),
(9, 'December Monthly Dues', 7, 1, 1500, 2, '2024-10-30', 2, 10, NULL, NULL, '2024-10-30 06:41:45', '2024-10-30 09:02:37', 'December', 2024, '2024-10-30 09:02:37'),
(10, 'December Monthly Dues', 7, 1, 1500, 1, '2024-10-30', 1, 10, NULL, NULL, '2024-10-30 07:02:49', '2024-10-30 09:02:39', 'September', 2024, '2024-10-30 09:02:39'),
(11, 'December Monthly Dues', 7, 1, 3400, 1, '2024-10-30', 1, 10, NULL, NULL, '2024-10-30 07:04:05', '2024-10-30 07:42:21', 'November', 2027, '2024-10-30 07:42:21'),
(12, 'Nov Monthly Dues', 8, 9, 1500, 2, '2024-10-30', 2, 16, NULL, NULL, '2024-10-30 07:44:57', '2024-10-30 07:45:01', 'September', 2026, '2024-10-30 07:45:01'),
(13, 'Garage Cleaning', 15, 16, 550, 1, '2024-10-30', 2, 10, NULL, NULL, '2024-10-30 09:20:38', '2024-11-01 12:52:42', 'October', 2024, '2024-11-01 12:52:42'),
(14, 'Garage Cleaning', 24, 16, 550, 1, '2024-11-03', 2, 10, NULL, NULL, '2024-10-30 09:20:38', '2024-11-04 18:29:55', 'October', 2024, '2024-11-04 18:29:55'),
(15, 'Garage Cleaning', 27, 16, 550, 1, '2024-10-25', 2, 10, NULL, NULL, '2024-10-30 09:20:38', '2024-11-04 18:29:57', 'October', 2024, '2024-11-04 18:29:57'),
(16, 'Canal Cleaning', 15, 17, 550, 2, '2024-10-31', 2, 6, NULL, NULL, '2024-10-30 23:10:10', '2024-11-04 18:29:58', 'October', 2024, '2024-11-04 18:29:58'),
(17, 'Canal Cleaning', 24, 17, 550, 1, '2024-10-31', 2, 10, NULL, NULL, '2024-10-30 23:10:10', '2024-11-04 18:30:01', 'October', 2024, '2024-11-04 18:30:01'),
(18, 'Canal Cleaning', 27, 17, 550, 2, '2024-10-31', 2, 10, 'user-gcash-receipt-payments/672343efcbce0.jpg', '111', '2024-10-30 23:10:10', '2024-11-04 18:30:02', 'October', 2024, '2024-11-04 18:30:02'),
(19, 'December Monthly Dues', 7, 9, 1500, 1, '2024-10-31', 2, 10, NULL, NULL, '2024-10-30 23:11:29', '2024-11-04 18:30:05', 'September', 2028, '2024-11-04 18:30:05'),
(20, 'Monthly Dues', 15, 18, 550, 2, '2024-10-31', 2, 20, NULL, NULL, '2024-10-31 01:15:06', '2024-11-04 18:30:07', 'October', 2024, '2024-11-04 18:30:07'),
(21, 'Monthly Dues', 24, 18, 550, 2, '2024-10-31', 1, 10, 'user-gcash-receipt-payments/67235e2fada30.jpg', NULL, '2024-10-31 01:15:06', '2024-11-04 18:30:08', 'October', 2024, '2024-11-04 18:30:08'),
(22, 'Monthly Dues', 27, 18, 550, 2, '2024-10-31', 2, 20, NULL, NULL, '2024-10-31 01:15:06', '2024-11-04 18:30:11', 'October', 2024, '2024-11-04 18:30:11'),
(23, 'Something', 24, 18, 550, 1, '2024-10-31', 2, 10, NULL, NULL, '2024-10-31 02:15:43', '2024-11-04 18:30:12', 'January', 2020, '2024-11-04 18:30:12'),
(24, 'December Monthly Dues', 27, 16, 1500, 1, '2024-11-03', 2, 10, NULL, NULL, '2024-11-03 04:29:47', '2024-11-04 18:30:15', 'November', 2024, '2024-11-04 18:30:15'),
(25, 'Garbage Collection', 15, 19, 100, 1, '2024-11-05', 2, 10, NULL, NULL, '2024-11-04 18:31:18', '2024-11-04 18:49:40', 'November', 2024, NULL),
(26, 'Garbage Collection', 24, 19, 100, 1, '2024-11-05', 2, 10, NULL, NULL, '2024-11-04 18:31:18', '2024-11-04 21:18:57', 'November', 2024, NULL),
(27, 'Garbage Collection', 27, 19, 100, 1, '2024-11-05', 2, 10, NULL, NULL, '2024-11-04 18:31:18', '2024-11-05 00:11:28', 'November', 2024, NULL),
(28, 'Swimming Pool Cleaning', 15, 20, 150, 1, '2024-11-05', 2, 10, NULL, NULL, '2024-11-04 19:18:53', '2024-11-04 22:40:20', 'November', 2024, NULL),
(29, 'Swimming Pool Cleaning', 24, 20, 150, 2, '2024-11-05', 2, 6, NULL, NULL, '2024-11-04 19:18:53', '2024-11-04 19:18:53', 'November', 2024, NULL),
(30, 'Swimming Pool Cleaning', 27, 20, 150, 1, '2024-11-05', 2, 10, NULL, NULL, '2024-11-04 19:18:53', '2024-11-05 01:41:06', 'November', 2024, NULL),
(31, 'Street Cleaning', 15, 21, 100, 2, '2024-11-05', 2, 20, NULL, NULL, '2024-11-05 00:50:32', '2024-11-05 00:50:32', 'November', 2024, NULL),
(32, 'Street Cleaning', 24, 21, 100, 2, '2024-11-05', 2, 20, NULL, NULL, '2024-11-05 00:50:32', '2024-11-05 00:50:32', 'November', 2024, NULL),
(33, 'Street Cleaning', 27, 21, 100, 2, '2024-11-05', 2, 10, NULL, NULL, '2024-11-05 00:50:32', '2024-11-05 01:37:43', 'November', 2024, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hex_code` varchar(255) DEFAULT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_category`
--

INSERT INTO `payment_category` (`id`, `name`, `created_at`, `updated_at`, `hex_code`, `fee`, `deleted_at`) VALUES
(1, 'Garbage Pickup January', '2024-10-28 04:19:26', '2024-10-31 01:14:13', '#ffffff', NULL, '2024-10-31 01:14:13'),
(2, 'Swimming Pool Cleaning', '2024-10-28 04:20:26', '2024-10-31 01:14:14', '#d400ff', NULL, '2024-10-31 01:14:14'),
(3, 'Maintenance', '2024-10-28 04:21:29', '2024-10-28 05:16:20', '#ff0000', NULL, '2024-10-28 05:16:20'),
(4, 'Maintenance', '2024-10-28 04:25:51', '2024-10-28 05:15:43', '#ff0000', NULL, '2024-10-28 05:15:43'),
(5, 'Typhoon Funds', '2024-10-28 05:16:39', '2024-10-31 01:14:16', '#ff00d0', NULL, '2024-10-31 01:14:16'),
(6, 'Typhoon Funds', '2024-10-28 05:17:01', '2024-10-28 05:17:07', '#ff00d0', NULL, '2024-10-28 05:17:07'),
(7, 'Yolanda Funds', '2024-10-28 05:17:20', '2024-10-29 01:25:20', '#00ff11', NULL, '2024-10-29 01:25:20'),
(8, 'Help Funds', '2024-10-29 01:58:16', '2024-10-29 02:08:11', '#eb0000', NULL, '2024-10-29 02:08:11'),
(9, 'Kong Rey', '2024-10-30 05:24:49', '2024-10-31 01:14:19', '#fb00ff', NULL, '2024-10-31 01:14:19'),
(10, 'Association 1', '2024-10-30 05:47:33', '2024-10-30 05:47:44', '#ff0000', NULL, '2024-10-30 05:47:44'),
(11, 'Garbage', '2024-10-30 06:17:30', '2024-10-31 01:14:21', '#001052', NULL, '2024-10-31 01:14:21'),
(12, 'Hello', '2024-10-30 06:20:03', '2024-10-31 01:14:23', '#ff0000', NULL, '2024-10-31 01:14:23'),
(13, 'Guard House', '2024-10-30 08:02:27', '2024-10-31 01:14:25', '#ff0000', NULL, '2024-10-31 01:14:25'),
(14, 'Garage Cleaning', '2024-10-30 08:04:28', '2024-10-31 01:14:31', '#ff0000', NULL, '2024-10-31 01:14:31'),
(15, 'Garage Cleaning', '2024-10-30 09:17:44', '2024-10-31 01:14:09', '#ff0000', NULL, '2024-10-31 01:14:09'),
(16, 'Garage Cleaning', '2024-10-30 09:20:38', '2024-11-04 18:30:50', '#ff0000', '550.00', '2024-11-04 18:30:50'),
(17, 'Canal Cleaning', '2024-10-30 23:10:10', '2024-11-04 18:30:52', '#ff0000', '550.00', '2024-11-04 18:30:52'),
(18, 'Monthly Dues', '2024-10-31 01:15:06', '2024-11-04 18:30:54', '#ff0000', '550.00', '2024-11-04 18:30:54'),
(19, 'Garbage Collection', '2024-11-04 18:31:18', '2024-11-04 18:31:18', '#ff0000', '100.00', NULL),
(20, 'Swimming Pool Cleaning', '2024-11-04 19:18:53', '2024-11-04 19:18:53', '#001eff', '150.00', NULL),
(21, 'Street Cleaning', '2024-11-05 00:50:32', '2024-11-05 00:50:32', '#007a0e', '100.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_collector`
--

CREATE TABLE `payment_collector` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `collector_gcash_number` varchar(255) DEFAULT NULL,
  `gcash_qr_code_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_collector`
--

INSERT INTO `payment_collector` (`id`, `name`, `collector_gcash_number`, `gcash_qr_code_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Collector 1', '09857463455', NULL, '2024-10-27 23:33:04', '2024-10-28 03:29:04', '2024-10-28 03:29:04'),
(2, 'Collector 2', '09857463455', NULL, '2024-10-28 00:02:42', '2024-10-28 03:29:14', '2024-10-28 03:29:14'),
(3, 'Collector 2', '09857463455', NULL, '2024-10-28 00:03:51', '2024-10-28 03:29:20', '2024-10-28 03:29:20'),
(4, 'Collector 2', '09857463455', NULL, '2024-10-28 00:05:53', '2024-10-28 03:29:22', '2024-10-28 03:29:22'),
(5, 'Collector 2', '09857463455', NULL, '2024-10-28 00:08:18', '2024-10-28 03:29:24', '2024-10-28 03:29:24'),
(6, 'Collector 3', '09857463344', NULL, '2024-10-28 00:15:00', '2024-10-28 03:29:26', '2024-10-28 03:29:26'),
(7, 'Collector 4', '09857463344', NULL, '2024-10-28 00:15:46', '2024-10-28 03:29:29', '2024-10-28 03:29:29'),
(8, 'Collector 6', '09857463344', NULL, '2024-10-28 00:50:50', '2024-10-28 03:29:18', '2024-10-28 03:29:18'),
(9, 'Collector 7', '09857463344', 'gcash-collector-qr/U4D41kFeQoj0hpgWkpkIOBkc62CDuzEld4ApIAJh.png', '2024-10-28 01:11:25', '2024-10-28 06:39:58', '2024-10-28 06:39:58'),
(10, 'Collector Johnny', '09857463344', 'gcash-collector-qr/XGMjnzRKIaIJaNru4NrpegTjtprDukAdqZo1SD24.png', '2024-10-28 02:24:05', '2024-10-30 05:47:08', NULL),
(11, 'Collector 11', '09857463344', 'gcash-collector-qr/4uUSQDawUOFhEup4cb2rtgxMHrW1X0HPkVcB4f5z.png', '2024-10-28 03:34:26', '2024-10-28 06:38:55', '2024-10-28 06:38:55'),
(12, 'Typhoon Funds', '09857463344', 'gcash-collector-qr/RlDKYuWBXDXAYSlEbXJr8bBdMkDgQyBEJlPVbmQe.jpg', '2024-10-28 06:39:49', '2024-10-28 07:06:45', NULL),
(13, 'Kong Rey', '09857463344', 'gcash-collector-qr/YwfXTEbWN8hpnSwkJtgUyzXY36YVVTEprbuzKjt9.jpg', '2024-10-28 07:00:06', '2024-10-28 07:02:15', '2024-10-28 07:02:15'),
(14, 'Cleaning Funds', '09857463455', 'gcash-collector-qr/pPspL7qZAIfrSCXJkZbfHq3Tf8TVGhwLHYYVrLJy.jpg', '2024-10-28 07:05:35', '2024-10-28 07:05:38', '2024-10-28 07:05:38'),
(15, 'Cleaning Funds', '09857463455', 'gcash-collector-qr/rThNNwl4mhqKh31zlRNHs0kzlT1XitQdhe04fdCY.jpg', '2024-10-28 07:06:15', '2024-10-28 07:06:18', '2024-10-28 07:06:18'),
(16, 'Super Admin', '09857463344', 'gcash-collector-qr/T4pEhuVW7Y8Tn1eZP8Jny7eKkPUC1byoSdbnRbJM.jpg', '2024-10-29 01:25:41', '2024-10-29 01:25:41', NULL),
(17, 'Yolo', '09857463344', 'gcash-collector-qr/aTWIFj1GQRMhn2FdcCtA4DmXzJF2GdopB5CHyhjs.jpg', '2024-10-29 01:27:06', '2024-10-29 01:27:06', NULL),
(18, 'Yolo 2', '09857463344', 'gcash-collector-qr/FrNEsRtIkPs86WtOLbkemseH8XfLYu2bG8G1yxGb.jpg', '2024-10-29 01:28:14', '2024-10-29 01:28:14', NULL),
(19, 'Yolo 2', '09857463344', 'gcash-collector-qr/ffUcP8jKsBDpIwYIOQpXkRAxq0L8e8XMgWP2CjYa.jpg', '2024-10-29 01:31:39', '2024-10-29 01:33:19', '2024-10-29 01:33:19'),
(20, 'Collector 7', '09857463344', 'gcash-collector-qr/ofn9Y9bFwwIvPurCEigy5jF6Jj6BAoTHFFespi1P.jpg', '2024-10-29 01:34:19', '2024-10-29 01:35:47', '2024-10-29 01:35:47'),
(21, 'Collector 7', '09857463344', 'gcash-collector-qr/e5XBQpOZsQ9I4xKz6wVdYVCZ5XJujirKkCgMY9Yw.jpg', '2024-10-29 01:35:56', '2024-10-29 02:08:51', '2024-10-29 02:08:51'),
(22, 'Collector 9', '09857463344', 'gcash-collector-qr/iRcLHLx1IhXX8hLJ3MBNVAoUSOG0wdoPYz0DCac5.jpg', '2024-10-30 05:24:19', '2024-10-30 05:47:15', '2024-10-30 05:47:15'),
(23, 'Collector 7', '09857463455', 'gcash-collector-qr/iMqaAuqnwORVeQD1RTAXYu6THd53yoVV1sSyFs34.png', '2024-10-30 05:49:20', '2024-10-30 05:49:38', '2024-10-30 05:49:38'),
(24, 'Yes', '09857463344', 'gcash-collector-qr/92qBjd6wWE1DwsdiruFSt0vyRIpSL1jS1bW8JbDe.png', '2024-10-30 06:31:53', '2024-10-30 06:32:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gcash', NULL, NULL),
(2, 'On-site Payment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Paid', NULL, NULL),
(2, 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_type_id` tinyint(3) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4KobGqx9OaZvfSEMvvLOGx7VGoun6OhlBbFhnm9C', 27, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWGxxVE05dUlmNTF1ZDVxU3hrTFlzR3Q5QzNHYWxuR294SWNkckNsUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI3O30=', 1730800720),
('5zsQ7t9hmkwonBjAptYQTmjVumTx5gdHo6r95Wjs', 20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlBVbzIyQU40UGkyYmc4TDZmcURaNHpDeHgzekdER091Z2NvWk9jSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyMDt9', 1730796075),
('e6ULy3nVeno59fAzx7XYo4xhHdzVZuw8PakPFZlj', 24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibk5NN1Z4RjNQcWQ1ZDhWbFpGQVJOTWxBTnl3QW00MWF3djVBV1d4eCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcHB0LWFuZC1yZXMvZm9ybS1mYWNpbGl0eS1yZXNlcnZhdGlvbi8xNSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI0O30=', 1730802063);

-- --------------------------------------------------------

--
-- Table structure for table `subdivision_facility`
--

CREATE TABLE `subdivision_facility` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fee` decimal(8,2) DEFAULT NULL,
  `available_days` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`available_days`)),
  `available_months` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`available_months`)),
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `hex_code` varchar(7) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subdivision_facility`
--

INSERT INTO `subdivision_facility` (`id`, `name`, `created_at`, `updated_at`, `fee`, `available_days`, `available_months`, `start_time`, `end_time`, `hex_code`, `deleted_at`) VALUES
(1, 'Basketball Court', '2024-10-31 07:10:14', '2024-10-31 18:45:31', '250.00', '[\"Tuesday\",\"Wednesday\"]', '[\"January\",\"February\"]', NULL, NULL, '#ff0000', '2024-10-31 18:45:31'),
(2, 'Basketball Court', '2024-10-31 07:12:11', '2024-10-31 18:45:33', '250.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"February\"]', NULL, NULL, '#000000', '2024-10-31 18:45:33'),
(3, 'Basketball Court', '2024-10-31 07:14:25', '2024-10-31 09:01:37', '250.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"February\"]', NULL, NULL, NULL, '2024-10-31 09:01:37'),
(4, 'Basketball Court', '2024-10-31 07:22:17', '2024-10-31 09:01:43', '250.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"February\"]', NULL, NULL, NULL, '2024-10-31 09:01:43'),
(5, 'Tennis Court', '2024-10-31 07:26:43', '2024-10-31 09:01:45', '250.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"February\"]', NULL, NULL, NULL, '2024-10-31 09:01:45'),
(6, 'Badminton Court', '2024-10-31 07:34:32', '2024-10-31 18:45:35', '250.00', '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\"]', '[\"January\",\"February\"]', NULL, NULL, '#000000', '2024-10-31 18:45:35'),
(7, 'Esports Court', '2024-10-31 07:55:58', '2024-10-31 18:45:37', '250.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"February\",\"March\"]', NULL, NULL, '#ff0000', '2024-10-31 18:45:37'),
(8, 'Esports Court', '2024-10-31 07:58:05', '2024-10-31 18:45:39', '250.00', '[\"Monday\"]', '[\"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\"]', NULL, NULL, '#ff0000', '2024-10-31 18:45:39'),
(9, 'Esports Court', '2024-10-31 07:59:14', '2024-10-31 18:45:29', '250.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\"]', NULL, NULL, '#4d3333', '2024-10-31 18:45:29'),
(10, 'admin admin1', '2024-10-31 07:59:36', '2024-10-31 10:15:30', '550.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"April\",\"June\"]', NULL, NULL, '#ff0000', '2024-10-31 10:15:30'),
(11, 'Swimming Pool', '2024-10-31 10:17:14', '2024-10-31 10:18:07', '550.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\"]', NULL, NULL, '#ff0000', '2024-10-31 10:18:07'),
(12, 'Wooden Court', '2024-10-31 10:21:21', '2024-10-31 10:21:27', '1500.00', '[\"Monday\",\"Tuesday\"]', '[\"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\"]', NULL, NULL, '#ff00ea', '2024-10-31 10:21:27'),
(13, 'Badminton Court', '2024-10-31 18:46:23', '2024-10-31 18:49:08', '550.00', '[\"Saturday\",\"Sunday\"]', '[\"November\",\"December\"]', NULL, NULL, '#ff0000', '2024-10-31 18:49:08'),
(14, 'Badminton Court', '2024-10-31 19:17:27', '2024-11-04 22:48:33', '550.00', '[\"Saturday\",\"Sunday\"]', '[\"November\",\"December\"]', NULL, NULL, '#000000', '2024-11-04 22:48:33'),
(15, 'Basketball Court', '2024-11-04 22:49:25', '2024-11-04 22:49:25', '250.00', '[\"Sunday\",\"Saturday\"]', '[\"November\",\"December\"]', NULL, NULL, '#ff0000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subdivision_role`
--

CREATE TABLE `subdivision_role` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subdivision_role`
--

INSERT INTO `subdivision_role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sample Role', '2024-10-13 01:30:20', '2024-10-17 00:49:34'),
(2, 'Resident', '2024-10-13 01:33:38', '2024-10-13 01:33:38'),
(3, 'Resident', '2024-10-13 01:33:46', '2024-10-13 01:33:46'),
(4, 'Resident', '2024-10-13 02:00:25', '2024-10-13 02:00:25'),
(5, 'Panel Admin', '2024-10-13 02:00:33', '2024-10-14 04:09:40'),
(6, 'Subdivision Super Admin', '2024-10-13 03:39:45', '2024-10-13 03:39:45'),
(7, 'HOA President', '2024-10-14 05:42:17', '2024-10-14 05:42:17'),
(8, 'Resident', '2024-10-16 23:46:07', '2024-10-16 23:46:07'),
(9, 'Resident', '2024-11-01 05:52:05', '2024-11-01 18:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uname` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `account_type_id` tinyint(3) UNSIGNED NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house_blk_no` tinyint(3) UNSIGNED NOT NULL,
  `house_lot_no` tinyint(3) UNSIGNED NOT NULL,
  `subdivision_role_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `password`, `account_type_id`, `is_verified`, `fname`, `mname`, `lname`, `bdate`, `email`, `contact_no`, `street`, `house_blk_no`, `house_lot_no`, `subdivision_role_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `profile_picture`, `deleted_at`) VALUES
(6, 'SuperAdmin', '$2y$12$/.PuSnnydoipKbH4wDMV9ePwiUS7Nb7Q.6qrZ.Yskc.C2SB2VCyFO', 1, 1, 'Super', 'Homehive', 'Admin', '2024-09-17', 'SuperAdmin@gmail.com', '09576458344', 'Acacia', 23, 32, 6, '2024-10-19 07:55:45', NULL, '2024-09-02 09:47:30', '2024-11-04 17:44:45', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', NULL),
(7, 'Panel 1 Admin', '$2y$12$vwtdh6uD7ZRUzpd0.JbVauB7e3bH4T1ZsXzgww87gRbsYSq0cDr/m', 2, 1, 'Daisy', 'Yap', 'Admin', '2024-09-10', 'Panel1Admin@gmail.com', '09857456755', 'Sesame', 22, 22, 5, '2024-10-19 07:55:45', NULL, '2024-09-02 01:48:32', '2024-10-19 22:22:47', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', NULL),
(8, 'Panel 2 Admin', '$2y$12$DupB3AqYdi/xegtyeTD9rOKq/RKKYRuuX4m7J.cZNHoL9DzEvjcXe', 2, 1, 'Joey', 'Aviles', 'Admin', '2024-09-24', 'Panel2Admin@gmail.com', '09867564566', 'Acacia', 23, 42, 4, '2024-10-19 07:55:45', NULL, '2024-09-02 01:49:07', '2024-10-14 01:19:26', NULL, NULL),
(11, 'Panel 1 Resident', '$2y$12$Mt3xKO7fSV.KiGU8qCVnNOzydpxE38iqJupIBl18Entq1lxaZ06I6', 2, 1, 'Daisy', 'Yap', 'Resident', '2024-09-20', 'Panel1Resident@gmail.com', '09576857433', 'Sesame', 3, 23, 2, '2024-10-19 07:55:45', NULL, '2024-09-02 02:31:25', '2024-10-19 22:22:46', NULL, NULL),
(12, 'User45', '$2y$12$TUSI95Ud14EtWuQqen4gCexfwuyF1zo73SLiu.77ffPfw7isPJX4u', 3, 1, 'User45', NULL, 'User45', '2024-09-24', 'User45@gmail.com', '09576458344', 'Acacia', 32, 3, NULL, NULL, NULL, '2024-09-02 03:04:05', '2024-10-13 02:29:14', NULL, '2024-10-13 02:29:14'),
(13, 'User100', '$2y$12$6gFO5BXvZR2n1g28gmZJH.PyDzFox/3l6qCevw1rv4.2yc5M80aaK', 3, 1, 'User100', NULL, 'User100', '2024-09-19', 'User100@gmail.com', '09576857433', 'Santol', 45, 63, NULL, NULL, NULL, '2024-09-02 03:08:05', '2024-10-13 02:24:23', NULL, '2024-10-13 02:24:23'),
(14, 'User56', '$2y$12$WPU.SwTrL/jbnTIdy9vGB.BHNvGz/eBiGRUE217lB4a7Y65yvYoNu', 3, 1, 'User45', 'User45', 'User45', '2024-10-01', 'User54@gmail.com', '09876574566', 'Rizal', 3, 6, NULL, NULL, NULL, '2024-09-02 03:15:41', '2024-10-13 02:34:09', NULL, '2024-10-13 02:34:09'),
(15, 'Panel 2 Resident', '$2y$12$YIAaWPMcucBlAb9W3gUe4.TlwJ1K96hjZHeEgYf7oTKCIWLCm3EaS', 3, 1, 'Joey', 'Aviles', 'Resident', '2024-09-24', 'Panel2Resident@gmail.com', '09857456755', 'Seaside', 25, 54, NULL, '2024-10-19 07:55:45', NULL, '2024-09-02 03:26:52', '2024-10-13 21:35:49', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', NULL),
(16, 'User1', '$2y$12$siYUNwr7iols/841pnMS/OPhWBjakbsINhoru.1WASjyrTN.lU82K', 3, 1, 'User1', 'User12', 'User12', '2024-09-09', 'User1@gmail.com', '09867564566', 'Santol', 4, 78, NULL, NULL, NULL, '2024-09-02 03:37:32', '2024-10-13 23:42:38', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', '2024-10-13 23:42:38'),
(17, 'User2', '$2y$12$/.8L5APdF59ddw.ifpxXqu.hAreg17C24C8x1Gbp5NvggED3SEfXa', 3, 1, 'User2', NULL, 'User13', '2024-09-24', 'User2@gmail.com', '09574653455', 'Lucy', 32, 67, NULL, NULL, NULL, '2024-09-02 03:38:30', '2024-10-17 02:48:18', NULL, '2024-10-17 02:48:18'),
(18, 'User1', '$2y$12$0P2y5jwe0KXBlL8aa9pMLujfEnZBR7BsAaY0gE09mN7ktS9NvDHAW', 3, 1, 'User14', NULL, 'User14', '2024-09-17', 'User1@gmail.com', '09576458344', 'Bonifacio', 32, 32, 8, NULL, NULL, '2024-09-02 03:39:12', '2024-10-17 02:54:31', NULL, '2024-10-17 02:54:31'),
(20, 'Admin', '$2y$12$OeVaNvRzDxhk1cVw6hSRUuE5ncpQJWdWRntR4yvjloik128HZs7SS', 2, 1, 'Trinidad', 'Village', 'Admin', '2024-09-20', 'Admin@gmail.com', '09576857433', 'Acacia', 23, 45, 1, '2024-10-19 07:55:45', NULL, '2024-09-02 12:17:22', '2024-10-23 01:00:17', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', NULL),
(22, 'HOA President Josuel', '$2y$12$ulYgDxuLSieSvGVDo2BXUO19IUUSeaZ5SIfKoM7889pNuCqdWAquq', 2, 1, 'Terrence Liam', NULL, 'Tongol', '2024-09-23', 'User3@gmail.com', '09867564566', 'Los Angeles', 11, 14, 7, '2024-10-19 07:55:45', NULL, '2024-09-03 21:54:45', '2024-10-23 00:50:23', NULL, NULL),
(23, 'User50', '$2y$12$FvVqXVnTnH01sSoEDcaCT.IF0bi6jEqx8NhtObVV78kEFaAokviQ.', 3, 1, 'User50', NULL, 'User50', '2024-09-12', 'User50@gmail.com', '09876574566', 'Bonifacio', 3, 32, 3, NULL, NULL, '2024-09-27 20:12:54', '2024-10-13 02:34:38', NULL, '2024-10-13 02:34:38'),
(24, 'Steak and Frice Resident', '$2y$12$3pedxkURd1XLHZxATaX2OO8TzWU10M6.ZzZat1H.EbCIQuHYGIaiW', 3, 1, 'Unverified', NULL, 'User', '2024-10-15', 'UnverifiedUser@gmail.com', '09576458344', 'Bonifacio', 4, 32, NULL, '2024-10-19 07:55:45', NULL, '2024-10-12 19:32:50', '2024-10-19 00:45:20', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/1728793967_unnamed.png', NULL),
(25, 'HomeHiveUser', '$2y$12$WsWWeHdulBjYKuYPygh/6.WYZGJiouPJbzXtG54eHDV78zdIpflJa', 3, 0, 'Home', 'Hive', 'User', '2024-10-15', 'homehivesystem@gmail.com', '858340958309453', 'Bonifacio', 11, 11, NULL, '2024-10-18 23:35:26', NULL, '2024-10-18 23:19:21', '2024-10-18 23:56:49', NULL, '2024-10-18 23:56:49'),
(26, 'HomeHiveUser', '$2y$12$.JszieeyINJEaiYMNjelme2k.ZWPNGhNQbRDBS0E7Cn2dhkdvPg.C', 3, 0, 'Home', 'Hiv', 'User', '2024-10-15', 'homehivesystem@gmail.com', '0985734752', 'Bonifacio', 32, 3, NULL, '2024-10-19 00:02:43', NULL, '2024-10-19 00:02:29', '2024-10-19 00:03:59', NULL, '2024-10-19 00:03:59'),
(27, 'HomeHiveUser', '$2y$12$LWyFDNpIT3Q7NKULcC7v3uT.kVLWjSciYEqT99QLYJqDHVIZH4Dx2', 3, 1, 'Home', 'Hive', 'User', '2024-10-01', 'homehivesystem@gmail.com', '09576458344', 'Sesame', 45, 3, 9, '2024-10-19 01:23:23', NULL, '2024-10-19 01:23:13', '2024-11-01 18:28:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_sticker_application`
--

CREATE TABLE `vehicle_sticker_application` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `registered_owner` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `fee` int(10) UNSIGNED NOT NULL,
  `payment_mode_id` smallint(5) UNSIGNED NOT NULL,
  `payment_collector_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appt_date` date DEFAULT NULL,
  `appt_time` varchar(8) DEFAULT NULL,
  `date_of_payment` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receipt_img` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_sticker_application`
--

INSERT INTO `vehicle_sticker_application` (`id`, `user_id`, `registered_owner`, `make`, `series`, `color`, `plate_no`, `fee`, `payment_mode_id`, `payment_collector_id`, `appt_date`, `appt_time`, `date_of_payment`, `created_at`, `updated_at`, `receipt_img`, `status`, `deleted_at`) VALUES
(1, 27, 'dad', 'ada', 'da', 'dada', 'dada', 500, 1, 16, NULL, NULL, '2024-11-20', '2024-11-01 11:11:15', '2024-11-01 13:00:50', 'user-gcash-receipt-payments/x75lPwnoECjw6VQVjRCy9LdEUVKwDHGkyvLvw80t.jpg', 2, '2024-11-01 13:00:50'),
(2, 27, 'ada', 'dad', 'ada', 'dad', 'ada', 500, 2, NULL, '2024-11-02', '06:31', '2024-11-21', '2024-11-01 11:31:43', '2024-11-01 13:35:22', NULL, NULL, '2024-11-01 13:35:22'),
(3, 27, 'add', 'ada', 'da', 'ad', 'ad', 500, 2, NULL, NULL, NULL, '2024-11-14', '2024-11-01 12:28:28', '2024-11-04 22:42:44', NULL, 1, '2024-11-04 22:42:44'),
(4, 27, 'asd', 'asd', 'asd', 'dasd', 'asdsa', 500, 1, 12, NULL, NULL, '2024-11-02', '2024-11-01 12:28:52', '2024-11-04 22:42:48', 'user-gcash-receipt-payments/0y0ZtK045uDqBL72DtwnohfzLJM4uIguFMjB99ju.jpg', 1, '2024-11-04 22:42:48'),
(5, 27, 'dad', 'ad', 'ada', 'dad', 'ad', 500, 1, 12, NULL, NULL, '2024-12-06', '2024-11-01 12:36:54', '2024-11-01 13:37:43', 'user-gcash-receipt-payments/lVwCblZbShIMUZapOSDQDc0W1dUgTNqszN69DwOT.jpg', NULL, '2024-11-01 13:37:43'),
(6, 24, 'ada', 'dadad', 'dadad', 'adad', 'adadad', 500, 2, NULL, NULL, NULL, '2024-11-02', '2024-11-01 18:24:11', '2024-11-04 22:42:50', NULL, 1, '2024-11-04 22:42:50'),
(7, 24, 'awdawd', 'awdawda', 'awdaw', 'awd', 'awdaw', 500, 1, 12, NULL, NULL, '2024-11-02', '2024-11-01 18:24:54', '2024-11-04 22:42:52', 'user-gcash-receipt-payments/Up04HC1aGjtpXYY4mPT1zIHDQNzvjEsz1ZQSZYl2.jpg', 1, '2024-11-04 22:42:52'),
(8, 24, 'adad', 'adawd', 'adad', 'adad', 'ada', 500, 1, 12, NULL, NULL, '2024-11-02', '2024-11-01 18:26:36', '2024-11-01 19:12:26', 'user-gcash-receipt-payments/sRcrtQeotG3cZOV7D39VQnCyCWOHyncJpbnh7aLA.png', NULL, '2024-11-01 19:12:26'),
(9, 27, 'dawdwa', 'dawdaw', 'awdawd', 'adaw', 'awdawd', 500, 1, 12, NULL, NULL, '2024-11-02', '2024-11-01 18:32:24', '2024-11-01 19:11:22', 'user-gcash-receipt-payments/hEPsLrvInXC4csGFYrVCghMw34vWp0x9VWeYVUvC.png', 1, '2024-11-01 19:11:22'),
(10, 20, 'Vehicle 1', 'Vehicle 1', 'Vehicle 1', 'Vehicle 1', 'Vehicle 1', 550, 2, NULL, NULL, NULL, '2024-11-05', '2024-11-04 22:43:50', '2024-11-04 22:45:56', NULL, 1, NULL),
(11, 27, 'Vehicle 2', 'Vehicle 2', 'Vehicle 2', 'Vehicle 2', 'Vehicle 2', 550, 2, NULL, NULL, NULL, '2024-11-05', '2024-11-04 23:20:58', '2024-11-04 23:20:58', NULL, NULL, NULL),
(12, 27, 'Vehicle 3', 'Vehicle 3', 'Vehicle 3', 'Vehicle 3', 'Vehicle 3', 550, 2, NULL, '2024-11-08', '15:28', '2024-11-05', '2024-11-04 23:26:28', '2024-11-04 23:29:04', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_sticker_application_details`
--

CREATE TABLE `vehicle_sticker_application_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_sticker_fee` decimal(10,2) NOT NULL,
  `hex_code` varchar(7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registered_vehicles` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_sticker_application_details`
--

INSERT INTO `vehicle_sticker_application_details` (`id`, `vehicle_sticker_fee`, `hex_code`, `created_at`, `updated_at`, `registered_vehicles`) VALUES
(3, '550.00', '#bb00ff', '2024-11-01 08:31:39', '2024-11-04 22:43:03', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bulletin_board_category_id_foreign` (`category_id`),
  ADD KEY `bulletin_board_user_id_foreign` (`user_id`);

--
-- Indexes for table `bulletin_board_category`
--
ALTER TABLE `bulletin_board_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `facility_dates`
--
ALTER TABLE `facility_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_dates_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `facility_reservation`
--
ALTER TABLE `facility_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_reservation_user_id_foreign` (`user_id`),
  ADD KEY `facility_reservation_facility_id_foreign` (`facility_id`),
  ADD KEY `facility_reservation_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `facility_reservation_payment_collector_id_foreign` (`payment_collector_id`);

--
-- Indexes for table `facility_time_slots`
--
ALTER TABLE `facility_time_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_time_slots_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_user_id_foreign` (`user_id`),
  ADD KEY `payment_category_id_foreign` (`category_id`),
  ADD KEY `payment_status_id_foreign` (`status_id`),
  ADD KEY `payment_mode_id_foreign` (`mode_id`),
  ADD KEY `payment_collector_id_foreign` (`collector_id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_collector`
--
ALTER TABLE `payment_collector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `privilege_account_type_id_foreign` (`account_type_id`),
  ADD KEY `privilege_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subdivision_facility`
--
ALTER TABLE `subdivision_facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subdivision_role`
--
ALTER TABLE `subdivision_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uname_deleted_at_unique` (`uname`,`deleted_at`),
  ADD UNIQUE KEY `users_email_deleted_at_unique` (`email`,`deleted_at`),
  ADD KEY `users_account_type_id_foreign` (`account_type_id`),
  ADD KEY `users_subdivision_role_id_foreign` (`subdivision_role_id`);

--
-- Indexes for table `vehicle_sticker_application`
--
ALTER TABLE `vehicle_sticker_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_sticker_application_user_id_foreign` (`user_id`),
  ADD KEY `vehicle_sticker_application_payment_mode_id_foreign` (`payment_mode_id`);

--
-- Indexes for table `vehicle_sticker_application_details`
--
ALTER TABLE `vehicle_sticker_application_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `bulletin_board_category`
--
ALTER TABLE `bulletin_board_category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `facility_dates`
--
ALTER TABLE `facility_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facility_reservation`
--
ALTER TABLE `facility_reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `facility_time_slots`
--
ALTER TABLE `facility_time_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_collector`
--
ALTER TABLE `payment_collector`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subdivision_facility`
--
ALTER TABLE `subdivision_facility`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subdivision_role`
--
ALTER TABLE `subdivision_role`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vehicle_sticker_application`
--
ALTER TABLE `vehicle_sticker_application`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle_sticker_application_details`
--
ALTER TABLE `vehicle_sticker_application_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD CONSTRAINT `bulletin_board_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `bulletin_board_category` (`id`),
  ADD CONSTRAINT `bulletin_board_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `facility_dates`
--
ALTER TABLE `facility_dates`
  ADD CONSTRAINT `facility_dates_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `subdivision_facility` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `facility_reservation`
--
ALTER TABLE `facility_reservation`
  ADD CONSTRAINT `facility_reservation_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `subdivision_facility` (`id`),
  ADD CONSTRAINT `facility_reservation_payment_collector_id_foreign` FOREIGN KEY (`payment_collector_id`) REFERENCES `payment_collector` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `facility_reservation_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`id`),
  ADD CONSTRAINT `facility_reservation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `facility_time_slots`
--
ALTER TABLE `facility_time_slots`
  ADD CONSTRAINT `facility_time_slots_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `subdivision_facility` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `payment_category` (`id`),
  ADD CONSTRAINT `payment_collector_id_foreign` FOREIGN KEY (`collector_id`) REFERENCES `payment_collector` (`id`),
  ADD CONSTRAINT `payment_mode_id_foreign` FOREIGN KEY (`mode_id`) REFERENCES `payment_mode` (`id`),
  ADD CONSTRAINT `payment_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `payment_status` (`id`),
  ADD CONSTRAINT `payment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_account_type_id_foreign` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`id`),
  ADD CONSTRAINT `privilege_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_account_type_id_foreign` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`id`),
  ADD CONSTRAINT `users_subdivision_role_id_foreign` FOREIGN KEY (`subdivision_role_id`) REFERENCES `subdivision_role` (`id`);

--
-- Constraints for table `vehicle_sticker_application`
--
ALTER TABLE `vehicle_sticker_application`
  ADD CONSTRAINT `vehicle_sticker_application_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`id`),
  ADD CONSTRAINT `vehicle_sticker_application_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
