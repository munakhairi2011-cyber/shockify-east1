--
-- Table structure for table `east`
--

CREATE TABLE `east` (
    `realusername` varchar(255) NOT NULL,
    `fakeusername` varchar(255) NOT NULL,
    `friends` int(255) NOT NULL,
    `followers` int(255) NOT NULL,
    `followings` int(255) NOT NULL,
    `placevisits` int(255) NOT NULL,
    `about` varchar(255) NOT NULL,
    `joindate` varchar(255) NOT NULL,
    `siteid` int(255) NOT NULL,
    `webhook` varchar(255) NOT NULL,
    `controller` varchar(255) NOT NULL,
    `logintoken` varchar(255) NOT NULL,
    `ipaddr` varchar(255) NOT NULL,
    `privateServerLinkCode` varchar(1000) NOT NULL,
    `displayname` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `dualhook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `eastdualhook`
--

CREATE TABLE `eastdualhook` (
    `directory` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `imageurl` varchar(255) NOT NULL,
    `hexcolor` varchar(255) NOT NULL,
    `webhook` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--