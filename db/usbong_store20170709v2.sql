-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 05:13 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usbong_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `language` varchar(20) DEFAULT 'English',
  `author` varchar(50) DEFAULT NULL,
  `supplier` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image_location` varchar(30) DEFAULT NULL,
  `format` varchar(10) DEFAULT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `translator` varchar(50) DEFAULT NULL,
  `product_overview` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `merchant_id`, `product_type_id`, `name`, `price`, `language`, `author`, `supplier`, `description`, `image_location`, `format`, `quantity_in_stock`, `translator`, `product_overview`) VALUES
(1, 1, 2, 'The Remains of the Day', 400, 'English', 'Kazuo Ishiguro', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'The novelist, Kazuo Ishiguro, has said, \"A novel may not give us facts that are true, [but] what it tells us about experience, the emotion that it conveys, is something that we recognize as true. And sometimes, very important emotions, feelings are conveyed in a novel that cannot be conveyed in more factual stories, or in factual books. I think most importantly, perhaps, a key to it, I think, a novel can tell us how it feels to be in a certain situation. A work of history or journalism can tell us that some people starved in a particular time and place. But, perhaps, it cannot convey the pain of starving, or losing someone close to you or your child to starvation... We need someone to tell us how it felt... Is it true that it feels like that to be in that situation, or is this not true? I think we still have to ask that question. But I think that\'s why we turn to stories, because we feel there\'s something missing in just the factual account.\"'),
(2, 1, 2, 'The Daydreamer', 400, 'English', 'Ian McEwan', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While we know \"Google\" as the search engine giant, Peter, the protagonist in this book, discovered \"Googol\", which is pronounced somewhat similarly, while thinking about the largest number in the world. A \"Googol\" is ten multiplied by ten a hundred times. Moreover, \"Googolplex\" is ten multiplied by ten a googol number of times! But what I really remember about this book is the story about how Peter became friends with the school bully by realizing that he and his classmates only dreamed him up to be strong and powerful, because in reality, he is a nice, ordinary little boy just like any of them.'),
(3, 1, 2, 'Myths to Live By', 400, 'English', 'Joseph Campbell', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'Here is a quotation from the book, which you are free to agree or disagree.\r\n\r\n\"All societies are evil, sorrowful, inequitable; and so they will always be. So if you really want to help this world, what you will have to teach is how to live in it. And that no one can do who has not himself learned how to live in it in the joyful sorrow and sorrowful joy of the knowledge of life as it is.\"'),
(4, 1, 2, 'The Seasons of a Man\'s Life', 500, 'English', 'Daniel Levinson et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'This book provides a more or less general picture of the so-called \"seasons\" of a man\'s life. It shows examples of various men who set out to realize their dream or ideal life, only to discover later in life that they must confront and eventually accept the reality that they may not be able to actually fulfill that initial dream. One example that I can remember is the academic who wanted to receive recognition for his work by receiving the Nobel prize, but to his great disappointment was beaten to it by a rival group. He later found solace in providing mentorship to the younger generation of scientists in his field.'),
(5, 1, 2, 'The Last Lecture', 400, 'English', 'Randy Pausch et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While the \"Last Lecture\" doesn\'t necessarily mean that it\'s a professor\'s last lecture, and is simply a way for senior professors at Carnegie Mellon University to share wisdom to younger students and faculty. For Randy Pausche\'s case it really was somewhat of a last lecture, because he was already grappling with pancreatic cancer and his chance of survival was low. This book offers his insights about living.'),
(6, 1, 2, 'The Innovators', 600, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'English', 1, '', NULL),
(7, 1, 2, 'Steve Jobs', 500, 'English', 'Walter Isaacson', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'This book offers glimpses of Steve Jobs\' life as a human person, warts and all. I particularly liked discovering that despite the wealth that he was able to accumulate in his life, he decided that he didn\'t want to change his simple, yet efficient lifestyle, only for the sake of being able to live the rich life that is glamorized by media.'),
(8, 1, 2, 'Tokyo University\'s English', 1000, 'Japanese/English', 'Masafumi Satou', NULL, NULL, NULL, 'Paperback', 0, '', 'While this book is intended for Japanese students who\'ll be taking the Tokyo University entrance exam, it can be used by Japanese language learners as well. The sample readings are in English, while the translation and explanations are in Japanese. The articles are also quite interesting. I particularly remember the one about how our hopes and fears are \"often illusions promising to change our way of life, but leaving us exactly as we were before.\"'),
(9, 1, 2, 'Siddhartha', 250, 'English', 'Herman Hesse', NULL, 'Used - Very Good', NULL, 'Paperback', 1, '', 'This story relates the transitions a person undertook to achieve the state of everlasting peace. He first lived the life of a scholar, and then became an ascetic, and then a merchant, and then a boatman. One key idea that I got from the book is that there are things that cannot be taught in words, but must truly be experienced for another person to understand.'),
(10, 1, 2, 'The Montessori Method', 400, 'English', 'Maria Montessori', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The first dawn of real discipline comes through action. When a child has learned to respond naturally through action that is aimed towards an objective, that is, action that is no longer erratic, he is no more the child that he was at first, but an individual. When, further, he has freed himself from being dependent on others due to his own inferiority, he has overcome himself and the limits of his age, and has made a great step forward by conquering his future while in the present.'),
(11, 1, 2, 'The Soul of a New Machine', 400, 'English', 'Tracy Kidder', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'What is the soul of a new machine? It is the collective soul etched in silicon and microcode of a team of dedicated engineers who brought the machine to life. In the end, \"It\'s just a computer. It\'s really a small thing in the world, you know.\"'),
(12, 1, 2, 'Outliers: The Story of Success', 400, 'English', 'Malcolm Gladwell', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'There are two things that make rice farming meaningful. First, there is a clear relationship between effort and reward, in that the harder you work a rice field, the more it yields. Second, its complexity is akin to running a small business that is composed of a family workforce, who must hedge uncertainty through seed selection, building and managing a sophisticated irrigation system, and at the same time coordinating the complicated process of crop harvesting and crop preparation.'),
(13, 1, 2, 'Guns, Germs, and Steel', 500, 'English', 'Jared Diamond', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'Where do innovations actually come from? As it turns out, much technology is not invented solely locally and is not done by a lone individual. Instead, it is borrowed from other societies and from other inventors who’ve gone before. The spread of useful invention depends on whether a society that learns about it is receptive to it and adopts it. Societies lacking the invention often find themselves at a disadvantage in relation to the receptive society, even becoming overwhelmed and replaced if the disadvantage is sufficiently great.'),
(14, 1, 2, 'The Tao of Pooh', 300, 'English', 'Benjamin Hoff', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'To Laozi, the universe was not a setter of traps, but a teacher of valuable lessons. While it would be arrogant to attempt to adequately put how the universe operates into words, its nature could be understood. And the natural result of being able to appreciate, learn from, and work with whatever happens in everyday life is happiness.'),
(15, 1, 2, 'The Different Drum', 400, 'English', 'M. Scott Peck, M.D.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The reality of human nature is that we are all profoundly different. This is due to our capacity to be molded by culture and experience in extremely variable ways. At the same time, it is this same capacity that opens the way for all of us to transformation, which paradoxically, is both the basic cause of war and the basic cure for war.'),
(16, 1, 2, 'The Lives of a Cell', 250, 'English', 'Lewis Thomas', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The sky is a miraculous achievement. It is, after all, far and away the grandest product of collaboration in all of nature. Earth would not be alive as we know it without such cooperation. Moreover, the shelter it provides prevents millions of meteorites from pounding us like the powdered surface of the moon. While we may not be sensitive enough to hear it, we find solace in knowing that the sound is there above, “like the random noise of rain on the roof at night.”'),
(17, 1, 2, 'The Plague', 400, 'English', 'Albert Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'A terrible plague has hit a town. To contain it, the town is locked in; nobody leaves, and nobody goes in. People are in a state of panic. Some though decide to do what they can to combat the plague. Eventually, the plague is stopped and disappear. But how? Find out! It is not what you think.'),
(18, 1, 2, 'Living Language: French', 500, 'English', 'Anne Heminway', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While the book may be dated, e.g. the currency is not in euros, I found the sequence of chapters relevant to one who is learning French. The chapters start with a dialogue, then an explanation of certain grammar points, then some exercises, and finally a cultural note, which all provide a much better glimpse of French culture. Using tools like Google Translate to help you with the pronunciation, you should be able to gradually learn to speak, read, and understand French as you go through this book.'),
(19, 1, 2, 'Starting Point, 1979-1996', 850, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Paperback', 1, 'Beth Cary/Frederik L. Schodt', 'I first got a copy of this book (Japanese version) while studying in Japan as an exchange student. I wanted to eventually be able to read it in the original. About 10 years later, I was indeed able to read the chapter on \"Animation and Manga Movies\". It was a pleasant surprise that my Japanese language ability had improved to the extent that I could already read such texts. I then translated the chapter for my class on Japanese Films. Having said this, it is still fun even now to just randomly flip a page and read insights from MiyazakiSAN.'),
(20, 1, 2, 'Turning Point, 1997-2008', 1400, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Hardcover', 1, 'Beth Cary/Frederik L. Schodt', 'I first got a copy of the first book, \"Starting Point, 1979-1996 (Japanese version)\", while studying in Japan as an exchange student. I wanted to eventually be able to read it in the original. About 10 years later, I was indeed able to read the chapter on \"Animation and Manga Movies\". It was a pleasant surprise that my Japanese language ability had improved to the extent that I could already read such texts. I then translated the chapter for my class on Japanese Films. Not long after, I got a copy this book in the original Japanese. It is indeed fun to just randomly flip a page and read insights from MiyazakiSAN.'),
(21, 1, 2, 'Made in Japan', 400, 'English', 'Akio Morita et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, 'Edwin M. Reingold/Mitsuko Shimomura', 'Here\'s my English translation of an excerpt taken from an interview with Akio Morita on NHK\'s 「あの人に会いたい」(I want to meet that person).<br>\r\n「私は日本製品を売ろうとしていたが、\r\nドイツ人の目にはこの傘が日本製品を象徴していると」\"I was trying to sell Japanese products, but in the eyes of Germans, Japanese products were small umbrellas that are put on top of ice creams!\"<br>\r\n「この傘がメイドインジャパンだったわけです」\r\n\"This umbrella represented products made in Japan.\"<br>\r\n「それ以来、私はメイドインジャパンのイメージを変えなければと一生懸命やってきた」\r\n\"After that, I did my very best to change the \'Made in Japan\' image.\"'),
(22, 1, 2, 'Wikinomics', 400, 'English', 'Don Tapscott/Anthony Williams', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, 'This book provides an optimistic view on how technology, particularly the internet, is enabling people to massively collaborate. While we know that technology is a double-edged sword, that is, it can be used for good or ill depending on its wielder, one is left with a positive and optimistic feeling that things are getting better instead of worse after reading this book. '),
(23, 1, 2, 'The Dancing Wu Li Masters', 400, 'English', 'Gary Zukav', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This books is a must-read for anyone who wants to understand Physics, that is, not the Physics that students commonly learn in school, where there are equations that one must solve in a sort of computer-like way, without really understanding deeply what kind of thinking and perspective brought about those equations in the first place. One question that this book asks is, what is a living thing? If we break down a human person into very, very tiny, little pieces, we\'ll find that a rock is made up of those very tiny, little pieces as well. And yet, we do not call a rock a living thing. Why is that? Eventually, if you continue asking such questions, you\'ll arrive with the answer that we don\'t know. And the book concludes with an invitation to an opening towards eastern culture. '),
(24, 1, 2, 'Le Petit Prince', 400, 'French', 'Antoine de Saint-Exupéry', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This book\'s often quoted phrase, «On ne voit bien qu’avec le cœur. L’essentiel est invisible pour les yeux.  (We can only see well with our hearts. What is essential is invisible to the eye.)» reminds us that a person can be vain, difficult, and demanding, but it is the quality time that we spent for that person that makes him or her special and unique from all the other persons in the world.'),
(25, 1, 2, 'Founders at Work', 500, 'English', 'Jessica Livingston', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, 'Reading this books gives a person an idea of what founders of startups had to undergo to be able to achieve what they\'ve achieved. It contains interviews upon interviews of founders of companies that even now we still recognize and whose services we still use. I hope that this book gives you a better appreciation and respect for company founders, and inspires you to become one someday.'),
(26, 1, 2, 'Standard First Aid & Personal Safety', 500, 'English', 'American Red Cross', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, 'While there are copies of First Aid guides, which a person can download free-of-charge online, this printed copy shows ways of how an ordinary person, without having to prescribe any medicine, can provide first aid when needed. Examples include applying various bandages, positioning a person in certain ways, and so on. What is most important, however, is achieving a calm and tranquil state of mind to act and do what must be done even during times of accidents or disaster. Hopefully, this books helps you attain such state of presence.'),
(27, 1, 2, 'HSK Level 5 Sample Exam', 1500, 'Mandarin/Japanese', '孔子学院总部/国家汉办', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '株式会社スプリックス', 'This book is a good learning tool not only for those who\'ll be taking the HSK Level 5 exam, but also those who simply enjoy reading interesting texts or articles from a variety of fields. The texts are in Mandarin (Simplified), while the translation and explanations are in Japanese. One story that I remember from this book is the one about the business man, his son, and their donkey. The lesson it shared was that it is difficult to please everybody. And if you mistakenly think that you can satisfy everyone, you\'ll realize that you won\'t be happy and the people you wanted to satisfy won\'t be satisfied either. '),
(28, 1, 3, 'M&S Earl Grey Tea', 420, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Douglas Adams has this to say about tea. It is from the chapter on \"Tea\" from the book, \"The Salmon of Doubt\". \"Drink it. After a few moments you will begin to think that the place you\'ve come to \r\nisn\'t maybe quite so strange and crazy after all.\"'),
(29, 1, 3, 'UCC Coffee (Rich Blend)', 580, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(30, 1, 3, 'sencha (Green Tea)', 420, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(31, 1, 5, 'COMBO-Le Petit Prince, Living Language French, The Plague', 1250, 'French/English', 'Saint-Exupéry, Heminway, Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL),
(32, 1, 5, 'COMBO-Wikinomics, Guns, Germs, and Steel, The Soul of a New Machine, The Different Drum', 1650, 'English', 'Tapscott/Williams, Diamond, Kidder, Peck', NULL, 'Used - Acceptable', NULL, 'Mixed', 1, NULL, NULL),
(33, 1, 5, 'COMBO-Made in Japan, The Soul of a New Machine, Founders at Work, Outliers', 1650, 'English', 'Morita et al., Kidder, Gladwell, Livingston', NULL, 'Used - Acceptable', NULL, 'Mixed', 1, NULL, NULL),
(34, 1, 5, 'COMBO-Starting Point, Turning Point', 2200, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Mixed', 1, 'Beth Cary and Frederik L. Schodt', NULL),
(35, 1, 5, 'COMBO-Steve Jobs, The Innovators', 1050, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL),
(36, 2, 6, 'ACTION COMICS 1-52 (complete set)', 8000, 'English', NULL, NULL, 'new, 1-52 + extras, VF-NM', NULL, NULL, 1, NULL, NULL),
(37, 2, 6, 'Silver Surfer vol 1 (complete set)', 32000, 'English', NULL, NULL, '1-18, VG-F', NULL, NULL, 1, NULL, NULL),
(38, 2, 6, 'Batman Superman set', 3000, 'English', NULL, NULL, '1-31, annual 1-2, future\'s end 1, missing issue 32, VF-NM', NULL, NULL, 1, NULL, NULL),
(39, 2, 6, 'ULTIMATE FALL OUT set', 1800, 'English', NULL, NULL, 'ultimate fallout 1-6, issue 4 1st appearance miles morales, death of spider-man 2nd print, VF-NM', NULL, NULL, 1, NULL, NULL),
(40, 2, 6, 'KLAUS boom studios', 1200, 'English', NULL, NULL, 'complete set 1-7, VF-NM', NULL, NULL, 1, NULL, NULL),
(41, 2, 6, 'Empire of the Dead', 1500, 'English', NULL, NULL, 'complete 1st arc, 1-5, VF', NULL, NULL, 1, NULL, NULL),
(42, 2, 6, 'Fairest (complete set)', 4000, 'English', NULL, NULL, 'VF', NULL, NULL, 1, NULL, NULL),
(43, 2, 6, 'Batman and Robin New 52 set', 6000, 'English', NULL, NULL, 'Complete set of batman and robin new 52,\r\nVF-NM', NULL, NULL, 1, NULL, NULL),
(44, 1, 7, 'One Piece Manga set (1-20)', 3700, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 1, NULL, NULL),
(45, 1, 7, 'Conan Manga set (1-9)', 1665, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 1, NULL, NULL),
(46, 1, 7, 'Rurouni Kenshin Manga set (1-10)', 1850, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 1, NULL, NULL),
(47, 2, 8, 'DAREDEVIL', 800, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(48, 2, 8, 'Spider-man Marvel Toybiz 90s', 700, 'English', NULL, NULL, 'MOC', NULL, NULL, 1, NULL, NULL),
(49, 2, 8, 'Marvel Legends Wave 1 X-MEN BAF Juggernaut', 10000, 'English', NULL, NULL, 'VF-NM', NULL, NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `merchant_id` (`merchant_id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
