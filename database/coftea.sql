-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 09:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coftea`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `username`, `password`, `role`) VALUES
(9, 'admin@gmail.com', 'admin', '$2y$10$BnUorU1ba0/VQlp9i35wE.B4svOKGFl7whT4U2Qokqrs/NEbb.koy', 1),
(10, 'davidhartono04@gmail.com', 'david', '$2y$10$SGaFroou0Uti5gJglR/J4.nfPcZ5J6BOjm6v5SgimNWBIFcjX9XA.', 2),
(13, 'saidmuhammad572@gmail.com', 'said', '$2y$10$THMAbPJGt8YtYOfazgFkF.lgFtZjcmKDmGwzsCYU9es.r1LvE7Hp.', 1),
(28, 'saidmazaya654@gmail.com', 'saiduser', '$2y$10$RpRPy3uQSc.a3g0Y6Qdoq.9WptH4PDAc0fRjzF0Tj7ueHVr8.0wqO', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `metode` enum('ovo','gopay','dana') NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bukti`
--

INSERT INTO `bukti` (`id`, `orderid`, `username`, `metode`, `foto`) VALUES
(23, 202560402, 'saiduser', 'gopay', '202560402_65863723_blooming fruit youthberry tea.jpg'),
(24, 84546693, 'david', 'gopay', '84546693_119981893_iced  black tea.png'),
(25, 126510342, 'david', 'ovo', '126510342_84376606_buktipembayaran.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `kategori` enum('Cold Coffee','Hot Coffee','Cold Tea','Hot Tea') NOT NULL,
  `foto` varchar(300) NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `no` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `produk` varchar(256) NOT NULL,
  `item` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','ongoing','done','cancelled') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`no`, `orderid`, `username`, `produk`, `item`, `harga`, `tanggal`, `status`) VALUES
(92, 202560402, 'saiduser', 'iced jeju organic green tea', 4, 25000, '2023-01-07', 'done'),
(93, 202560402, 'saiduser', 'iced honey earl grey milk tea', 2, 25000, '2023-01-07', 'cancelled'),
(96, 84546693, 'david', 'americano', 3, 20000, '2023-01-07', 'done'),
(97, 84546693, 'david', 'caramel macchiato', 1, 30000, '2023-01-07', 'pending'),
(98, 126510342, 'david', 'iced honey earl grey milk tea', 2, 25000, '2023-01-07', 'pending'),
(99, 126510342, 'david', 'Iced Americano', 1, 20000, '2023-01-07', 'ongoing'),
(100, 126510342, 'david', 'caramel macchiato', 3, 30000, '2023-01-07', 'done'),
(101, 126510342, 'david', 'english breakfast tea', 1, 15000, '2023-01-07', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `harga` double NOT NULL,
  `kategori` enum('Cold Coffee','Hot Coffee','Cold Tea','Hot Tea') DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `kategori`, `foto`, `detail`) VALUES
(11, 'Iced Americano', 20000, 'Cold Coffee', 'Ewt2uVVtZwUTDyTgRvOF1a994_iced americano.png', '&lt;p&gt;cold water, over ice followed by shots of espresso.&lt;/p&gt;\r\n'),
(12, 'vanilla cream cold brew', 25000, 'Cold Coffee', 'BDUsfV8WImjWHNMPI4CBf2868_vanilla cream cold brew.png', '&lt;p&gt;Our&amp;nbsp;slow-steeped custom blend of CofTea&amp;reg; Cold Brew coffee accented with vanilla and topped with a delicate float of house-made vanilla cream that cascades throughout the cup. It&amp;#39;s over-the-top and super-smooth.&lt;/p&gt;\r\n'),
(13, 'Shakerato Bianco', 27000, 'Cold Coffee', 'abwCyuZ25CBzDDX8KFbA1cf20_Shakerato Bianco.png', '&lt;p&gt;an&amp;nbsp;espresso-based iced coffee drink.&amp;nbsp;The vanilla sweet cream is a mixture of vanilla syrup, heavy cream, and milk&lt;/p&gt;\r\n'),
(14, 'cold brew with vanilla sweet cream', 25000, 'Cold Coffee', '92ZzdfKFzLkWqCHMNIOT41b4f_cold brew with vanilla sweet cream.png', '&lt;p&gt;Our&amp;nbsp;slow-steeped custom blend of Starbucks&amp;reg; Cold Brew coffee accented with vanilla and topped with a delicate float of house-made vanilla sweet cream that cascades throughout the cup. It&amp;#39;s over-the-top and super-smooth.&lt;/p&gt;\r\n'),
(15, 'cold brew with milk', 28000, 'Cold Coffee', 'HSCVPtWFanQkLmIdGUeJ78def_cold brew with milk.png', '&lt;p&gt;Handcrafted in small batches daily, slow-steeped in cool water for 20 hours, without touching heat and finished with a splash of milk&amp;mdash;CofTea&amp;reg; Cold Brew is made from our custom blend of beans grown to steep long and cold for a super-smooth flavor.&lt;/p&gt;\r\n'),
(16, 'iced cappucino', 25000, 'Cold Coffee', 'wZNNrO20FDyYPfyqIHvkb9b95_iced cappucino.png', '&lt;p&gt;espresso cooled with ice and then topped with a thick layer of foam.&lt;/p&gt;\r\n'),
(17, 'iced caramel macchiato', 27000, 'Cold Coffee', 'lztI8nLCBMYIrq8FPGn9c8f93_iced caramel macchiato.png', '&lt;p&gt;We combine our rich, full-bodied espresso with vanilla-flavored syrup, milk and ice, then top it off with a caramel drizzle for an oh-so-sweet finish.&lt;/p&gt;\r\n'),
(18, 'toffee nut crunch cold brew', 27000, 'Cold Coffee', 'm35Ka2KlNBTMQGuNvWNE03986_toffee nut crunch cold brew.png', '&lt;p&gt;Our&amp;nbsp;slow-steeped Cold Brew Coffee, infused with moreish toffee nut sauce, topped with cold foam and a crunchy topping.&amp;nbsp;&lt;/p&gt;\r\n'),
(19, 'jeju forest cold brew', 37000, 'Cold Coffee', 'CjUMkbNmvVWqr4oPWCNK237a5_jeju forest cold brew.png', '&lt;p&gt;A combination of organic malcha from Jeju island and CofTea signature cold brew, creating a clean taste and colors reminiscent of a summer forest. Only available at CofTea in Jeju.&lt;/p&gt;\r\n'),
(20, 'iced honey oatmilk latte', 30000, 'Cold Coffee', 'KiIBEEVtsqLWk88DDDsS65dff_iced latte.png', '&lt;p&gt;CofTea signature Made with Our Blonde Espresso Roast, Oatly oat milk, honey blend, and ice. Toasted honey topping is sprinkled on at the end.&lt;/p&gt;\r\n'),
(21, 'salted caramel cloud macchiato', 30000, 'Cold Coffee', 'ZRzvgfc1gOUuo9PsIklNb5767_salted caramel cloud macchiato.png', '&lt;p&gt;milk steamed with &amp;ldquo;cloud powder,&amp;rdquo; layered with espresso, salted caramel syrup, and then topped with caramel drizzle.&lt;/p&gt;\r\n'),
(22, 'mint cold brew', 20000, 'Cold Coffee', 'lbUkTs95Kqp7XDqparjJa1ef3_mint cold brew.png', '&lt;p&gt;Cold brew with mint.&amp;nbsp;&lt;em&gt;Cold and refreshing&lt;/em&gt;.&lt;/p&gt;\r\n'),
(23, 'lotus biscoff coffee', 28000, 'Cold Coffee', 'hbTpWz4gsSaoyKnz0rlyc24b2_lotus biscoff coffee.png', '&lt;p&gt;Dalgona coffee with crushed lotus biscoff cookies inside, and a whole cookie on the top.&lt;/p&gt;\r\n'),
(24, 'iced espresso and matcha fusion', 25000, 'Cold Coffee', 'o1L73o4SZiPKhN8PTndC70177_iced espresso and matcha fusion.png', '&lt;p&gt;We&amp;#39;ve&amp;nbsp;&lt;em&gt;combined our signature Espresso Roast with fine Matcha powder and milk&lt;/em&gt;&amp;nbsp;to create the beautifully-layered Matcha &amp;amp; Espresso Fusion.&lt;/p&gt;\r\n'),
(25, 'nitro vanilla cream', 25000, 'Cold Coffee', '5AW1bB5ttESHA4UluY0u1097e_nitro vanilla cream.png', '&lt;p&gt;Served cold, our Nitro Cold Brew is topped with a float of house-made vanilla sweet cream. The result: a cascade of velvety coffee more sippable than ever.&lt;/p&gt;\r\n'),
(26, 'brown sugar iced shaken espresso', 25000, 'Cold Coffee', 'uFuIKg8Lkd2C3UlgnO7c20229_brown sugar iced shaken espresso.png', '&lt;p&gt;made with a delicious brown sugar simple syrup, espresso, milk, and ice.&lt;/p&gt;\r\n'),
(27, 'classic affogato', 25000, 'Cold Coffee', 'kIZ5R0DQ3dbbC31pxtCo6b524_classic affogato.png', '&lt;p&gt;espresso shot over a ball of ice cream.&amp;nbsp;served in a glass with a teaspoon.&lt;/p&gt;\r\n'),
(28, 'americano', 20000, 'Hot Coffee', 'cbOhdfDkUm6jXOYzNy6P3b7d7_caffe americano.png', '&lt;p&gt;Rich, full-bodied espresso with hot water.&lt;/p&gt;\r\n'),
(29, 'cappucino', 25000, 'Hot Coffee', 'Z1IklADpPtPTdFcsMNpS6c7a1_cappucino.png', '&lt;p&gt;Espresso with steamed milk, topped with a deep layer of foam.&lt;/p&gt;\r\n'),
(30, 'caramel macchiato', 30000, 'Hot Coffee', 'Uarw6nOarupZZKZBWbcWb9dff_caramel macchiato.png', '&lt;p&gt;Espresso combined with vanilla-flavoured syrup, milk and caramel sauce. A CofTea classic.To our signature espresso we add a creamy mix of vanilla syrup and milk. it&amp;#39;s then topped with our proprietary buttery caramel sauce. Sweet!&lt;/p&gt;\r\n'),
(31, 'caffee latte', 20000, 'Hot Coffee', '3BBlykQO2cCWGV6GeJ8qba9a0_latte.png', '&lt;p&gt;Rich, full-bodied espresso in steamed milk, lightly topped with foam. A caff&amp;egrave; latte is simply a shot or two of bold, tasty espresso with fresh, sweet steamed milk over it.&lt;/p&gt;\r\n'),
(32, 'caffe mocha', 27000, 'Hot Coffee', 'irvdRTrz9YIHyXE5JuwN29dc7_caffe mocha.png', '&lt;p&gt;Espresso with bittersweet mocha sauce and steamed milk, topped with sweetened whipped cream. Delightful.&lt;/p&gt;\r\n'),
(33, 'honey almondmilk  flat white', 27000, 'Hot Coffee', 'gci6FQ72NzCyVUmIhc1e63129_honey almondmilk  flat white.png', '&lt;p&gt;The Almondmilk Honey Flat White&amp;nbsp;combines ristretto shots of CofTea Blonde Espresso with steamed almond milk and a nice hint of honey. It&amp;#39;s super smooth with some nice richness in espresso flavor.&lt;/p&gt;\r\n'),
(34, 'espresso con panna', 25000, 'Hot Coffee', 'E7cpB5M7fshq2z3NNErRa87fb_espresso con panna.png', '&lt;p&gt;Espresso con panna (&amp;#39;espresso with cream&amp;#39; in Italian) is&amp;nbsp;a coffee drink with a single or double shot of espresso topped with a dollop of whipped cream.&lt;/p&gt;\r\n'),
(35, 'espresso', 20000, 'Hot Coffee', 'NkOEXY0Zc8VV6AiXoH7ree55f_espresso.png', '&lt;p&gt;Espresso is&amp;nbsp;a kind of strong coffee made by forcing steam or boiling water through ground, dark-roast coffee beans.&lt;/p&gt;\r\n'),
(36, 'vanilla bean latte', 28000, 'Hot Coffee', 'vsFusatCAE0AqnHD9QBB26fc6_vanilla bean latte.png', '&lt;p&gt;Rich shots of CofTea signature espresso.&amp;nbsp;a blend of vanilla bean powder and milk&amp;nbsp;are poured on top.&lt;/p&gt;\r\n'),
(37, 'dalgona coffee', 25000, 'Hot Coffee', 'eYxfe6fujd7tw7kKSNK8ae539_dalgona.png', '&lt;p&gt;Dalgona coffee is&amp;nbsp;a whipped, frothy iced coffee drink made with instant coffee, sugar, water, and milk. Also known as &amp;quot;whipped coffee&amp;quot;, &amp;quot;frothy coffee&amp;quot;, or &amp;quot;fluffy coffee&amp;quot;, dalgona coffee has two distinct layers made from whipped coffee cream sitting on top of milk.&lt;/p&gt;\r\n'),
(38, 'coconut milk latte', 25000, 'Hot Coffee', 'VdICY5XBZn2hEGkCI3qw64798_coconut milk latte.png', '&lt;p&gt;shots of CofTea Blonde Espresso with steamed coconut milk, and it&amp;#39;s topped off with a strike of Cascara sugar, so every sip you take has subtle notes of dark brown sugar and sweet maple.&lt;/p&gt;\r\n'),
(39, 'chamomile tea', 15000, 'Hot Tea', 'kpM9MBNrmFSLFz0bM5Cj6e5d3_chamomile tea.jpg', '&lt;p&gt;Chamomile has&amp;nbsp;gentle notes of apple, and there is a mellow, honey-like sweetness in the cup. It has a silky mouthfeel and yet remains a clean, delicately floral herbal tea, and even from the very first sip it feels wonderfully soothing.&lt;/p&gt;\r\n'),
(40, 'english breakfast tea', 15000, 'Hot Tea', 'zcClEW2SKGKZur7YYB9e29b26_english breakfast tea.jpg', '&lt;p&gt;a traditional blend of black tea. f&lt;em&gt;ull-bodied, robust, rich and blended to go well with milk and sugar&lt;/em&gt;,&lt;/p&gt;\r\n'),
(41, 'hibiscus tea', 20000, 'Hot Tea', 'DXVikWT6C9sq1NZppxAA6381c_hibiscus tea.jpg', '&lt;p&gt;also called Sorrell tea or &amp;ldquo;sour tea&amp;rdquo; is&amp;nbsp;a fragrant tea made from the dried calyxes of the tropical&amp;nbsp;Hibiscus sabdariffa&amp;nbsp;flowers. Hibiscus sabdariffa flowers are native to Africa and grow in many tropical and subtropical regions around the world&lt;/p&gt;\r\n'),
(42, 'blooming fruit youthberry tea', 25000, 'Hot Tea', 'hJ0reBoAxxCzvDrZIDVr7d662_blooming fruit youthberry tea.jpg', '&lt;p&gt;Sweet pineapple &amp;amp; a&amp;ccedil;a&amp;iacute; infusion with a subtle floral finish blended with white tea. with pieces of refreshing oranges inside.&lt;/p&gt;\r\n'),
(43, 'Jeju Sunset Earl Grey Tea', 25000, 'Hot Tea', 'vaXat83FpsYpnPVqRdEQ6e6f5_jeju sunset tea.jpg', '&lt;p&gt;An attractive tea drink with Jeju tangerine, lemon, and earl gray tea. Only available in CofTea in Jeju island&lt;/p&gt;\r\n'),
(44, 'joyful medley tea latte', 25000, 'Hot Tea', 'Q7GrOQKM7QcmYxWh9lcK5e6a9_joyful medley tea latte.jpg', '&lt;p&gt;a blend of black tea, the smooth sweetness of oolong tea, and the floral aroma of jasmine tea, which is popular as a standard tea during the holiday season, accented with the gorgeous flavor of apricot. CofTea Joyful Medley is a gently flavored tea latte finished with steamed milk.&lt;/p&gt;\r\n'),
(45, 'matcha tea latte', 25000, 'Hot Tea', 'RGh9xGYXk918FDVK8Omwa47be_matcha tea latte.png', '&lt;p&gt;Smooth and creamy&amp;nbsp;&lt;em&gt;matcha&lt;/em&gt;&amp;nbsp;sweetened just right and served with steamed milk. This favorite will transport your senses to pure&amp;nbsp;&lt;em&gt;green&lt;/em&gt;&amp;nbsp;delight.&lt;/p&gt;\r\n'),
(46, 'oolong tea latte', 25000, 'Hot Tea', 'cWnfQDWsa4kYad9QADBU6b170_oolong tea latte.jpg', '&lt;p&gt;a traditional Chinese tea. It&amp;#39;s made from the leaves of the Camellia sinensis plant. oolong latte is&amp;nbsp;&lt;strong&gt;less sugary, more mature, and exquisitely balanced&lt;/strong&gt;. The milk softens the bitterness the oolong would have by itself, but there&amp;#39;s not so much creaminess as to leave any lingering oiliness, and each sip comes to a clean, smooth finish.&amp;nbsp;Fresh floral notes of aromatic&lt;em&gt; &lt;/em&gt;Oolong&amp;nbsp;for satisfying and refreshing sips.&lt;/p&gt;\r\n'),
(47, 'oolong tea', 25000, 'Hot Tea', 'DZlfRn3Y6NXqxJeWjpawfa507_oolong tea.jpg', '&lt;p&gt;a traditional Chinese tea. It&amp;#39;s made from the leaves of the Camellia sinensis plant.&lt;/p&gt;\r\n'),
(48, 'peach tranquility tea', 25000, 'Hot Tea', 'CwqlWuoqHK22O6Ooaded865f2_peach tranquility tea.png', '&lt;p&gt;A sweet fusion of&amp;nbsp;&lt;em&gt;peach&lt;/em&gt;, candied pineapple, chamomile blossoms, lemon verbena and rose hips come together in this caffeine-free herbal&amp;nbsp;&lt;em&gt;tea&lt;/em&gt;.&lt;/p&gt;\r\n'),
(49, 'roasted green tea', 20000, 'Hot Tea', 'lfnPUdvbM04CLEY8ZetYe4ae9_roasted green tea.jpg', '&lt;p&gt;Made from the pan-roasted leaves and stems of tea, roasted green tea was first developed in Kyoto, Japan, in the 1920s and has become popular worldwide.&lt;/p&gt;\r\n'),
(50, 'youthberry tea', 20000, 'Hot Tea', 'tIey0asDfOp998gZBvbg2fe93_youthberry tea.jpg', '&lt;p&gt;Sweet pineapple &amp;amp; a&amp;ccedil;a&amp;iacute; infusion with a subtle floral finish blended with white&amp;nbsp;&lt;em&gt;tea&lt;/em&gt;.&lt;/p&gt;\r\n'),
(51, 'iced blooming fruit youthberry tea', 25000, 'Cold Tea', 'sNWqrWeEJ6hwPXF1hIzt47909_iced blooming fruit youthberry tea.png', '&lt;p&gt;Sweet pineapple &amp;amp; a&amp;ccedil;a&amp;iacute; infusion with a subtle floral finish blended with white tea. with pieces of refreshing oranges inside.&lt;/p&gt;\r\n'),
(52, 'iced honey earl grey milk tea', 25000, 'Cold Tea', 'UqDRptpJh52Xi0xzzjnNb398c_iced honey earl grey milk tea.png', '&lt;p&gt;Made with&amp;nbsp;&lt;em&gt;cold&lt;/em&gt;&amp;nbsp;brew tea and sweetened with brown sugar syrup and honey, &lt;em&gt;Honey&lt;/em&gt;&amp;nbsp;&lt;em&gt;Earl Grey Milk Tea&lt;/em&gt;&amp;nbsp;is perfect for hot days.&lt;/p&gt;\r\n'),
(53, 'iced jeju organic green tea', 25000, 'Cold Tea', 'kfbKDjeKBNynCd2w4qzu05a62_iced jeju organic green tea.png', '&lt;p&gt;Super quality&lt;em&gt;&amp;nbsp;Organic&amp;nbsp;Green tea&lt;/em&gt;&amp;nbsp;from Jeju island, blended with mint, lemongrass and lemon verbena, and given a good shake with ice. Lightly flavored and oh-so-refreshing!&lt;/p&gt;\r\n'),
(54, 'iced black tea', 25000, 'Cold Tea', 'zc1RBMCJuMCoKooX7kaPb039e_iced black tea.png', '&lt;p&gt;Premium&amp;nbsp;&lt;em&gt;black tea&lt;/em&gt;&amp;nbsp;sweetened just right and shaken with ice to create an ideal&amp;nbsp;&lt;em&gt;iced&lt;/em&gt;&amp;nbsp;tea&amp;mdash;a rich and flavorful&amp;nbsp;&lt;em&gt;black tea&lt;/em&gt;&amp;nbsp;journey awaits you.&lt;/p&gt;\r\n'),
(55, 'iced chamomile blend tea', 25000, 'Cold Tea', '0OwYQJanhXfEc8UVZfWAce6a2_iced chamomile blend tea.png', '&lt;p&gt;A comforting&amp;nbsp;&lt;em&gt;blend&lt;/em&gt;&amp;nbsp;of&amp;nbsp;&lt;em&gt;chamomile&lt;/em&gt;, rose petals and soothing herbs with ice. Couldn&amp;#39;t be more refreshing!&lt;/p&gt;\r\n'),
(56, 'iced fruity hibiscus tea', 25000, 'Cold Tea', 'j9KsrkvmsiGA4CsA5pYP62926_iced hibiscus blend.png', '&lt;p&gt;Real fruit juice and hibiscus tea shaken with Green&amp;nbsp;&lt;em&gt;Coffee&lt;/em&gt;&amp;nbsp;Extract for a boost of natural energy,&lt;/p&gt;\r\n'),
(57, 'iced english breakfast tea', 25000, 'Cold Tea', '3II6S4ZC6Ue78wMVjpz0b760e_iced english breakfast tea.png', '&lt;p&gt;A selected blend of rich, full-leaf black&amp;nbsp;&lt;em&gt;teas&lt;/em&gt;&amp;nbsp;from India and Sri Lanka sweetened with liquid cane sugar. shaken with ice.&lt;/p&gt;\r\n'),
(58, 'iced mint blend tea', 25000, 'Cold Tea', '4GkX1SDIOOuuSm6FEEPA9461d_iced mint blend tea.png', '&lt;p&gt;&lt;em&gt;Spearmint&lt;/em&gt;,&amp;nbsp;&lt;em&gt;peppermint&lt;/em&gt;&amp;nbsp;&amp;amp; a touch of lemon verbena.&lt;/p&gt;\r\n'),
(59, 'iced chai tea latte ', 25000, 'Cold Tea', 'OcEU5Fe1n8YbuFhbgunf23b04_iced chai tea latte -.png', '&lt;p&gt;Black&amp;nbsp;&lt;em&gt;tea&lt;/em&gt;&amp;nbsp;infused with cinnamon, clove, and other warming spices are combined with milk and ice for the perfect balance of sweet and spicy..&lt;/p&gt;\r\n'),
(60, 'iced passion tea', 25000, 'Cold Tea', 'Hm47LU9GywxS3IsJihpY82d69_passion tea.png', '&lt;p&gt;A blend of hibiscus, lemongrass and apple hand-shaken with ice: a refreshingly vibrant&amp;nbsp;&lt;em&gt;tea&lt;/em&gt;&amp;nbsp;infused with the color of&amp;nbsp;&lt;em&gt;passion&lt;/em&gt;.&lt;/p&gt;\r\n'),
(61, 'iced shaken strawberry greentea lemonade', 25000, 'Cold Tea', '8G17GsUShtLvN1wkYTEs1c580_iced shaken strawberry greentea lemonade.png', '&lt;p&gt;&lt;em&gt;Green tea&lt;/em&gt;. Refreshing&amp;nbsp;&lt;em&gt;lemonade&lt;/em&gt;. Bold&amp;nbsp;&lt;em&gt;strawberry&lt;/em&gt;. What&amp;#39;s not to love?&lt;/p&gt;\r\n'),
(62, 'Iced Matcha Tea Latte', 25000, 'Cold Tea', '1q2IRDb34ofoQhDM1lbK8aa84_Iced-Matcha-Tea-Latte.png', '&lt;p&gt;Smooth and creamy&amp;nbsp;&lt;em&gt;matcha&lt;/em&gt;&amp;nbsp;sweetened just right and served with milk over ice.&amp;nbsp;&lt;em&gt;Green&lt;/em&gt;&amp;nbsp;has never tasted so good.&lt;/p&gt;\r\n'),
(63, 'iced jeju sunset tea', 28000, 'Cold Tea', 'G5TAzZerkUX8W2OVN5UU6873a_iced jeju sunset tea.png', '&lt;p&gt;An attractive tea drink with Jeju tangerine, lemon, and earl gray tea. Only available in CofTea in Jeju island&lt;/p&gt;\r\n'),
(64, 'caramel frappucino', 35000, 'Cold Coffee', 'fPoeRBVtMO5vdwZotgMEc7381_caramel frappucino.png', '&lt;p&gt;Buttery&amp;nbsp;&lt;em&gt;caramel&lt;/em&gt;&amp;nbsp;syrup meets coffee, milk and ice for a rendezvous in the blender. Then whipped cream and&amp;nbsp;&lt;em&gt;caramel&lt;/em&gt;&amp;nbsp;sauce layer the love on top.&lt;/p&gt;\r\n'),
(65, 'mint chocolate chip frappucino', 30000, 'Cold Coffee', 'xeFJ6bz2J52A7HP9Cx5o2b17e_mint chocolate chip frappucino.png', '&lt;p&gt;&lt;em&gt;Bright, eye catching and packed with minty flavour&lt;/em&gt;, our mint chocolate chip frappucino is just what you need to brighten up your mood!&lt;/p&gt;\r\n'),
(66, 'red velvet frappucino', 30000, 'Cold Coffee', 'zSV4yMIiEwZvC3q6LFSQ35675_red velvet frappucino.png', '&lt;p&gt;&lt;strong&gt;Red velvet flavored sauce combined with milk, blended with ice.&lt;/strong&gt;&amp;nbsp;&lt;strong&gt;Topped with whipped cream and red velvet cookies&lt;/strong&gt;. This product cannot be made plant-based.&lt;/p&gt;\r\n'),
(67, 'jeju black sesame cream frappucino', 30000, 'Cold Coffee', 'CdA69PmRK4f7uDLJ4QbAcf5f4_jeju black sesame cream frappucino.png', '&lt;p&gt;frappucino with black sesame cream and crumbles of black sesame cookie on top. Only available in jeju CofTea.&lt;/p&gt;\r\n'),
(68, 'jeju mugwort cream frappucino', 30000, 'Cold Coffee', 'GWOcLJr9Do1P4v0KyETQ3af51_jeju mugwort cream frappucino.png', '&lt;p&gt;The Jeju Mugwort Cream Frappuccino is the blended version of the Mugwort Latte. Mugwort is an herb that grows exclusively in jeju. This product only available in jeju CofTea.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
