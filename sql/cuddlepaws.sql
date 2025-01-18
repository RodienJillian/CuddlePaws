-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 04:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuddlepaws`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(6) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `Username`, `Password`) VALUES
(1, 'cuddlepawspandi', 'cuddlepaws24-25');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_Id` int(4) NOT NULL,
  `User_Id` int(5) NOT NULL,
  `Product_Id` int(4) NOT NULL,
  `Quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `Address_Id` int(5) NOT NULL,
  `User_Id` int(5) NOT NULL,
  `Phase` text NOT NULL,
  `Barangay` text NOT NULL,
  `Municipality` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(4) NOT NULL,
  `User_Id` int(5) NOT NULL,
  `Total_Amount` decimal(10,2) NOT NULL,
  `Order_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Order_ItemId` int(4) NOT NULL,
  `Order_Id` int(4) NOT NULL,
  `Product_Id` int(4) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(4) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Product_Description` text NOT NULL,
  `Product_ImageUrl` text NOT NULL,
  `Product_Category` text NOT NULL,
  `Product_Quantity` int(4) NOT NULL,
  `Product_Stocks` int(4) NOT NULL,
  `Product_Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Description`, `Product_ImageUrl`, `Product_Category`, `Product_Quantity`, `Product_Stocks`, `Product_Price`) VALUES
(2, 'Brit Premium By Nature 400g', 'The ideal addition to granules. As a complete food or snack, or to add extra flavour to granules for junior dogs of all breeds. Improves food intake and hydration. Contains chamomile for sensitive digestion, salmon oil, fruit and herbs. Excellent digestibility and exquisite flavour Balanced content of nutrients, vitamins, and minerals No GRAINSâ€“No SALTâ€“No GMOs', 'https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224064/turkeywithliver_khsioz.webp', 'Dog Food', 0, 55, 86.00),
(3, 'Vitality Classic Lamb and Beef', 'Made from the high quality protein of real lamb and beef from Australia, wheat, corn, rice and barley â€“ and various minerals and vitamins, that provides balanced nutrition for adults and puppies. The use of lamb meat helps protect your dog from allergies that may be caused by other meat sources. In addition to high quality nutritional values, VITALITY is fortified with premium quality fatty acids such as: Omega-6 which enhances development of shiny, thick lustrous coat and Omega-3 which helps sustain healthy skin condition', 'https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224140/903ce3ff199a72ce41e647b92a0d2d08_jpg_fiedqz.webp', 'Dog Food', 0, 20, 2910.00),
(4, 'Optimum Betta Food 20g', 'Highly Nutrition Food for All Betta Fish & Other Small Fish 20g, Promotes Growth, Enhances Color by Spirulina, Rich in Vitamins C & E, Complete Nutrition, Non-Water Fouling.', 'https://res.cloudinary.com/dpjhzyge9/image/upload/v1728913852/betta_cgo30v.webp', 'Fish Food', 0, 10, 75.00),
(5, 'Mazuri Rat & Mouse Diet 560g', 'Features and Benefits: Contains dried Yucca schidigera extract to help reduce waste odor, Large block shape to encourage chewing and help support dental health, Nutritionally complete, no supplementation needed, No artificial colors or flavors', 'https://res.cloudinary.com/dpjhzyge9/image/upload/v1728915641/MazuriRat_Mouse_scqsdr.webp', 'Small Pet Food', 0, 10, 535.00),
(6, 'Smart Heart Cat Dry Food', 'For Adult Cats & Kitten Cats of All Breeds,Complete and balanced nutrition to meets their requirements to maintain good health and condition. Promote Brain Function - DHA (from fish oil) and choline to enhance brain and nervous system function, Healthy Heart - Omega 3 Fatty acids from fish oil for a healthy heart,Triple DHA Enhancement -Supplemental level of DHA for improved cats memory, Healthy Skin and Coat - The combination of Biotin, Zinc and Omega 3 and 6 fatty acids for a healthy skin and shiny coat,Vision Nourishing - Taurine supplement for healthy eyesight.\r\n', 'https://res.cloudinary.com/dpjhzyge9/image/upload/v1728917785/SmartheartKittenChixFishEgg_Milk1_1kg_jpg_ojyldk.webp', 'Cat Food', 0, 52, 370.00),
(7, 'Supero Raw Dog Food 600g and 630g', 'Supero Raw Feeding Benefits:\r\nCleaner Teeth And Fresher Breath\r\nBetter Weight Central Improved Digestion\r\nReduction of Allergy Symptoms\r\nBetter Reproductive Health \r\nHarder, Smaller & Less Smelly Stools \r\nMore energy And Stamina \r\nOVERALL HEALTHIER DOG', 'https://www.petcultureph.com/cdn/shop/files/Supero4s.png?v=1695106406&width=600', 'Dog Food', 0, 20, 160.00),
(8, 'Heartfull Pouch 100g Dog Wet Food', 'A Heartfull meal is a healthy meal!\r\n\r\nHeartfull Chicken Chunks Flavor in Gravy Pouch for Puppy is a made in Thailand wet food that will fill their bowls with love and joy but also provide them with essential nutrition from an early age.', 'https://www.petcultureph.com/cdn/shop/files/Heartfull_Beef_Chunks_Flavor_in_Gravy_Pouch_100g_jpg.png?v=1714801493&width=600', 'Dog Food', 0, 20, 45.00),
(9, 'Dentalight Nutri Diner Dog Treats 90g', 'The extra longer-lasting, highly digestible formula is perfect for dogs who love to chew.\r\nNatural Protein-filled Dog Treats\r\nGrain-free Dog Food Supplement\r\nNatural Ingredients for Pets\r\nDental Chews with long-lasting formula and recipe\r\nDelightfully Chewy - helps to clean teeth and promote gum health\r\nLong Lasting Dental Chews', 'https://www.petcultureph.com/cdn/shop/files/4_5NutriDinerTastyChickenFlavourx2pcs90g_JPG.png?v=1725010178&width=600', 'Dog Treats', 0, 55, 80.00),
(10, 'Alps Pureness Natural Canned Food 400g', 'Dogs thrive on quality protein and healthy fats, which is why our Alps NaturalÂ® Pureness Canned promises an easy to digest meal with an irresistible taste. It is a special recipe that contains essential nutrients of vitamins and minerals to provide a complete and balanced diet for your dog.\r\n\r\nThe natural omega-3 oil helps promote a healthy skin and silky coat, it is also suitable as a delicious topping to enhance the flavour of dry food.', 'https://www.petcultureph.com/cdn/shop/files/AlpsPurenessSalmon400g.png?v=1694156782&width=600', 'Dog Food', 0, 60, 84.00),
(11, 'Jerhigh Treats Stick 60g', 'JerHigh Stick, the pioneer of the first Terpene scented dog treats in Asia, which are 2 new formulas that are ready to add value to dogs in the morning and before bed. ', 'https://www.petcultureph.com/cdn/shop/files/JerhighTreatsMorning-TimeStick.png?v=1700019440&width=600', 'Dog Treats', 0, 45, 90.00),
(12, 'Dentastix 7 day Pack', 'PEDIGREEÂ® Dentastixâ„¢ treat is No.1 dog dental treat which proves to reduce tartar build up and helps clean teeth. Make this essential dental chew a part of your dog\'s daily routine & maintain their oral health', 'https://www.petcultureph.com/cdn/shop/files/menueditor_item_9760aa941a444b7cb0433e17d6854063_1647242567533405320_jpeg.png?v=1708433125&width=600', 'Dog Treats', 0, 34, 183.00),
(13, 'Train & Reward Dog Treats', 'Train & Reward Available Natural Dog Chew \r\n360 cleaning action Customized shape to enhance cleaning action of teeth and gums. Premium product made from quality ingredients Soft and chewy texture', 'https://www.petcultureph.com/cdn/shop/files/natural_dog_chew_Milk.png?v=1695108109&width=600', 'Dog Treats', 0, 24, 120.00),
(14, 'Pet Plus Doggie Biscuits 80g & 200g', '100% All Natural Formula - Round Shape Treats\r\nGreat tasting and nutritious dog treats for your pets to enjoy\r\nAvailable in different great flavors and shapes\r\nMix Flavors: Milk, Cheese, Melon, Vegetable\r\nMade in Thailand', 'https://www.petcultureph.com/cdn/shop/files/dogie200g.png?v=1720235956&width=713', 'Dog Treats', 0, 23, 140.00),
(15, 'Vetcore+ Nature\'s Advance Tick & Fleas 250ml', 'Vet Core + Nature\'s Advance Tick (Garapata) and Fleas (Pulgas) Spray 250ml from camstoreâ€¢ Kills Ticks, Fleas, Flea Larvae & Flea Eggsâ€¢ Repels Mosquitoes â€¢ For Home and Dogs', 'https://www.petcultureph.com/cdn/shop/files/Vetcore_Nature_sAdvanceTick_Fleas250ml_jpg.png?v=1715252717&width=493', 'Dog Supplies', 0, 27, 340.00),
(16, 'Cooling Mat', 'ã€High Quality Materialã€‘: It is made of soft polyester material with refined stitching. Our dog pet mat mattress with a breathable fabric will keep your pet comfortable. Our durable material is scratch and claw resistant and water resistant, it\'s suitable for all seasons.', 'https://www.petcultureph.com/cdn/shop/files/PetCoolingMat.png?v=1714126839&width=600', 'Dog Supplies', 0, 23, 180.00),
(17, 'Dog & Cat Anti Tick Mite Flea Collar', 'Type: Pet Collar\r\nColor: Grey\r\nQuantity: 1Pc\r\nMaterial: Rubber\r\nFeatures: Adjustable, Soft, Pet Health\r\nLength: Dog Collarï¼š50cm', 'https://www.petcultureph.com/cdn/shop/files/DogCollarCatCollarPetCollarAntiTickMiteFleaCollarforPetKittenPuppyLastingProtection.png?v=1716715560&width=600', 'Dog Supplies', 0, 60, 60.00),
(18, 'Pampered Pooch Dog Shampoo 1000ml', 'Pampered Pooch Dog Shampoo\r\nwith Aloe Vera and natural Conditioner\r\nDogs of All Breeds\r\nFor Pets Age 6 Weeks and Up\r\nGroom your pets the organic way! Has vitamin rich Aloe vera which makes coat longer and thicker. Has conditioner that hair manageable', 'https://www.petcultureph.com/cdn/shop/files/PamperedPoochShampooSweetScent1000ml.png?v=1716714641&width=600', 'Dog Supplies', 0, 55, 455.00),
(19, 'Dog Supplies High-End Fashion Pet Winter Warm Port', 'The pet bag is made of high-quality 600D Oxford fabric, with high density and durability. It is equipped with PU leather handles and shoulder straps for easy daily use.', 'https://www.petcultureph.com/cdn/shop/files/DogSuppliesHigh-EndFashionPetWinterWarmPortablePuppyBagSeat.png?v=1725934425&width=600', 'Dog Supplies', 0, 45, 1.00),
(20, 'Feline Gourmet Cat Wet Food 400g', 'Pet Plus Feline Gourmet wet food has the essential nutrients your cat needs for a healthy development. It contains high quality protein and minerals to help build a strong immune system, loaded with omega 3 and omega 6 fatty acid from the fresh tuna which promotes healthy skin and shiny coat.', 'https://www.petcultureph.com/cdn/shop/products/felinegourmetsardineschicken_prawn.png?v=1694073278&width=493', 'Cat Food', 0, 67, 84.00),
(21, 'Aozi Cat Can Wet Food 430g', 'Made of high quality ingredients with no preservatives,\r\nonly Pure fresh meat for Naturally Balanced Nutrition\r\nNo Artificial Flavoring\r\nNo Coloring\r\nNo GMO', 'https://www.petcultureph.com/cdn/shop/files/AoziCanCatFoodBeef430g_JPG.png?v=1725328333&width=493', 'Cat Food', 0, 67, 88.00),
(22, 'Aozi Cat Food Natural Organic', 'PURE NATURAL ORGANIC CAT FOOD \r\n20KG \r\n-GRAIN FREE , NO MSG, NO GMO\r\n-MADE FROM REAL FRESH SALMON\r\n-LESS SALT LESS BURDEN TO KIDNEY AND LIVER\r\n-WITH SPINACH AND EGG\r\n-WITH OMEGA 3 & 6\r\n-GOOD FOR PICKY EATERS \r\n-GOOD FOR DIGESTION \r\n-ALL LIFE STAGE\r\n-BALANCE DIET FOR YOUR CAT\'S NEEDS', 'https://www.petcultureph.com/cdn/shop/files/AoziCatFoodNaturalOrganic2_5kg_jpg.png?v=1694157925&width=493', 'Cat Food', 0, 33, 705.00),
(23, 'Sheba Wet Cat Food 85g', 'SHEBA knows that cat owners love cats for their independent spirits, personalities and discerning palates. Thatâ€™s why each and every SHEBA recipe has real beef, poultry or seafood for an irresistible taste cats love. All of their recipes are formulated without corn, wheat, soy, or artificial flavors. ', 'https://www.petcultureph.com/cdn/shop/files/ShebaTuna_SnapperInGravy_jpg.png?v=1695029478&width=493', 'Cat Food', 0, 34, 74.00),
(24, 'KitCat Purr Puree 4 x 15g Grain-Free Cat Food Topp', 'Kit Cat Purr Puree cat treats are created by nutritionists who are cat lovers and are made with the goodness of carefully selected natural ingredients. This recipe contains a smooth blend of tuna & scallop, with no added colors or preservatives and is perfect for cats of all life stages. Grain-free, delicious and 100% natural - this will be the most irresistible and ideal treat your cat will crave.\r\n', 'https://www.petcultureph.com/cdn/shop/files/PurrPureeTuna_Fiber_jpg.png?v=1694952180&width=493', 'Cat Treats', 0, 66, 118.00),
(25, 'CIAO Cat Treats', 'Ciao Churu in Jelly Cat Treats Japanâ€™s no. 1 best selling cat treats, Ciao Churu is a tasty liquid snack that helps replenish fluid loss in your catsâ€™ body. It also contains green tea extracts with anti-odour properties. Available in 10 delicious flavours, your finicky cats gotta love it! Comes in 15g x 4 sachets Liquid snack to help replenish fluid loss in your kittyâ€™s body Great for finicky cats! Japanâ€™s No. 1 selling cat treats Contains green tea extracts Anti-odour properties Suitable for all life stages', 'https://www.petcultureph.com/cdn/shop/files/SC-71_jpg.png?v=1694587516&width=493', 'Cat Treats', 0, 63, 110.00),
(26, 'KitCat Breath Bites 60g', 'Cleaning your catâ€™s teeth has never been easier or more delicious with Kit Cat Breath Bites. Bursting with the tasty flavors your cat will love, these crunchy treats are specially designed to help keep your catâ€™s teeth clean by reducing plaque and tartar when fed daily.', 'https://www.petcultureph.com/cdn/shop/files/BreathBitesLamb.png?v=1694073700&width=493', 'Cat Treats', 0, 84, 67.00),
(27, 'Flavorex Super Premium Cat Treats 75g', 'Give as treat for your cats and not as a meal replacement. Please see feeding guide for the appropriate number of pieces depending on cat\'s weight.', 'https://www.petcultureph.com/cdn/shop/files/Flavorex_Chicken_Biscuits_jpg.png?v=1714803503&width=493', 'Cat Treats', 0, 45, 84.00),
(28, 'Temptations Cat Treats 75g', 'TEMPTATIONSâ„¢ Treats for Cats are crunchy on the outside with an irresistibly soft, meaty center.\r\n\r\nA shake of the bag is all it takes to make your cat come running!', 'https://www.petcultureph.com/cdn/shop/files/TemptationTemptinTuna_jpg.png?v=1695106898&width=713', 'Cat Treats', 0, 76, 125.00),
(29, 'Cat 3 tier Interactive Roller Toy Success', 'Cat 3 tier Interactive Roller Toy Success', 'https://www.petcultureph.com/cdn/shop/files/3tier2.png?v=1712814541&width=493', 'Cat Supplies', 0, 45, 367.00),
(30, '2 in 1 Cat Interactive Toy', '2 in 1 Cat Interactive Toy', 'https://www.petcultureph.com/cdn/shop/files/2in1CatInteractiveToy.png?v=1712814638&width=493', 'Cat Supplies', 0, 29, 329.00),
(31, 'Toothbrush With Finger Brush 3pc Set', 'Type: three sets of pet teeth\r\nFeatures: convenient, Comfortableï¼Œsimple, convenient and durable\r\nSize Detailsï¼štoothbrush 22CM\r\nFinger toothbrush 6CM\r\n100% brand new and high quality\r\nDental hygiene is vital to a pet?Ë‰s overall health.\r\nIt can promote the health of pets and make the pets more refreshing and healthy\r\nGreat to use to brush any dog, puppy, cat or kitten\'s teeth and massage their gums.', 'https://www.petcultureph.com/cdn/shop/files/S36216bfd1c06437180d86ba2bab792b2c_jpg_640x640Q90_jpg__jpg.png?v=1713673970&width=493', 'Cat Supplies', 0, 34, 180.00),
(32, 'Cat Litter Box Small', 'Cat Litter Box Small', 'https://www.petcultureph.com/cdn/shop/files/menueditor_item_a5171c01e0df4e638f819fefa873f1d9_1705993470526269832.png?v=1708175094&width=493', 'Cat Supplies', 0, 23, 245.00),
(33, 'Pet Story Potty Training Spray 50ml', 'Type: Pet Defecation inducer\r\nFeatures: practical,cat and dog general-purpose productï¼Œsafe and odorless, and free of pollution\r\nCapacity:50 ml', 'https://www.petcultureph.com/cdn/shop/files/PottySpray.png?v=1717677101&width=493', 'Cat Supplies', 0, 15, 150.00),
(34, 'freestyle 1.35m Aquarium Fish Tank Vacuum Siphon G', 'Aquarium Fish Tank Vacuum Siphon Gravel Suction Pipe Filter Cleaner Water Change Pump', 'https://www.petcultureph.com/cdn/shop/files/FreestyleaquariumfishtankVacuumsiphonGravelCleaner.png?v=1693811086&width=713', 'Fish', 0, 34, 165.00),
(35, 'Fish Plastic Cup', 'Weight: 20 grams\r\nColor: Multiple colors available\r\nMaterial: PP\r\nSize: 7*8cm\r\n\r\nNotes: Due to the light and screen setting difference, the items color may be slightly different from the pictures. Please allow slight dimension difference due to different manual measurement.', 'https://www.petcultureph.com/cdn/shop/files/BettaFishPlasticCup_JPG.png?v=1693815058&width=493', 'Fish', 0, 15, 100.00),
(36, 'Betta Fish Tank Stackable Cube Tanks', 'The mini cube aquarium is not only a betta jellyfish fish tank, but also can be used as a feeding cage for small reptiles turtles, feeding box for small ornamental plants, and a feeding pool for seaweed and small corals.', 'https://www.petcultureph.com/cdn/shop/files/250283299_max_jpg.png?v=1693811953&width=493', 'Fish', 0, 15, 200.00),
(37, 'Aquarium Fish Net', 'Great for removing small floating debris and performing general aquarium maintenance.', 'https://www.petcultureph.com/cdn/shop/files/fishnet.JPG-1.png?v=1693811773&width=493', 'Fish', 0, 15, 100.00),
(38, 'Okiko Fish Food', 'Feeding Guide: Feed your fish 2 to 3 times a day; the amount of each feeding should be eaten up within 3 minutes.\r\nGuarantees:\r\nCrude Protein: max.51%\r\nCrude Fat: max.5%\r\nCrude Fiber: min. 3%\r\nCrude Ash: min. 12%\r\nMoisture: min. 10%', 'https://www.petcultureph.com/cdn/shop/files/OkikoHeadUp20g.png?v=1693810525&width=493', 'Fish', 0, 15, 135.00),
(39, 'Pet Adjustable Muzzle', 'Features:\r\n1:Made of polyester material and breathable,soft, comfortable\r\n2:The length and size is adjustable\r\n3:Convenient to Put ON or Put OFF', 'https://www.petcultureph.com/cdn/shop/files/HAPPYPAWSPET_DogMouthCoverPetAdjustableMuzzleSoftNylonMaskAntiBarkBreathable_jpg.png?v=1704803989&width=493', 'Small Pet', 0, 21, 150.00),
(40, 'Pet Silicon Rain Shoes', 'Pet Silicon Rain Shoes', 'https://www.petcultureph.com/cdn/shop/files/siliconshoesblack_JPG.png?v=1695019847&width=493', 'Small Pet', 0, 17, 300.00),
(41, 'Carabao Horn', 'Can be use as Teether for Dogs and Treats.\r\n100% Natural and Safe for your Pet.\r\nKeep your dog\'s teeth pearly white and breath smelling fresh due to the reduction in plaque.\r\nTheyâ€™ll also last a long time because theyâ€™re extremely durable.\r\nHorns are polished to give a nice shining glow that can be used for a variety of uses.\r\nTechnical use like handle of Knives, Bolos & Interior Designing.', 'https://www.petcultureph.com/cdn/shop/files/SmallCarabaoHorn.png?v=1694503399&width=493', 'Small Pet', 0, 30, 150.00),
(42, 'Baby Boo Pet Diaper', 'Introducing our Baby Boo Male Wrap\r\n\r\n\r\nWith a perfect blend of comfort, protection, and convenience. These diapers are specially designed to keep your little one happy and dry all day long. 360 degrees leak protection:\r\nSay goodbye to those pesky leaks and hello to worry-free days! Our Baby Boo Diapers feature 360 degrees leak protection. Ensuring that no matter how active your fur baby is.\r\nYou can trust in their reliable performance.', 'https://www.petcultureph.com/cdn/shop/files/Baby_Boo_Male_Small_5b519906-9287-4c51-9e12-dc94c306206a.png?v=1714806806&width=493', 'Small Pet', 0, 30, 176.00),
(43, 'Feeding Kit Syringe For Puppy Kitten Small Animals', 'Ideal for controlled feeding of dogs, cats, and other animals. Can also be used for feeding baby animals that have not yet begun to eat on their own. Easy-to-use aid for feeding formula, the water of medications. Made in tough polystyrene. Washable reusable. Contains 2 teats that may be sterilized.', 'https://www.petcultureph.com/cdn/shop/files/Feedingkit.png?v=1694685770&width=493', 'Small Pet', 0, 66, 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Firstname` text NOT NULL,
  `Lastname` text NOT NULL,
  `Phone_Num` varchar(11) NOT NULL,
  `Phase` text NOT NULL,
  `Barangay` text NOT NULL,
  `Municipality` text NOT NULL,
  `Account_DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Username`, `Email`, `Password`, `Firstname`, `Lastname`, `Phone_Num`, `Phase`, `Barangay`, `Municipality`, `Account_DateCreated`) VALUES
(5, 'RodienJillian', 'rodiengorg@gmail.com', '$2y$10$SwhJs8QEuqoVZFa79pwOW.u9z5N.NiqCTM72Q26K7oBf3QwBOaaua', 'Rodien', 'Ellorando', '09272830230', 'Blk. 1, Lot 16, Woodbridge', 'Poblacion', 'Pandi', '2024-10-11 23:16:19'),
(6, 'Zeldrickqt', 'zeldrickjoaquin@gmail.com', '$2y$10$E5RWX8zPGcEgqII8avbn3eNINMeBrmAqzfVE3G9CBUKRMAUg8gBcu', 'Zeldrick Jesus', 'Delos Santos', '09477030508', '27 E. Rodriguez St.', 'Poblacion', 'Pandi', '2024-10-12 11:14:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_Id`),
  ADD KEY `cart_ibfk_1` (`User_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`Address_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`Order_ItemId`),
  ADD KEY `Order_Id` (`Order_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username_2` (`Username`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_Id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `Address_Id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `Order_ItemId` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Product_Id`) REFERENCES `products` (`Product_Id`);

--
-- Constraints for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD CONSTRAINT `delivery_address_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`Order_Id`) REFERENCES `orders` (`Order_Id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`Product_Id`) REFERENCES `products` (`Product_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
