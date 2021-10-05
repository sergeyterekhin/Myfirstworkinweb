-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2021 г., 05:31
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fishingsitebase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `ID_Customer` int(11) NOT NULL,
  `phonenumber` varchar(40) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Midlname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`ID_Customer`, `phonenumber`, `UserName`, `Surname`, `Midlname`, `password`) VALUES
(24, '+79537819272', 'Евгения', 'Ганюшкина', 'Юрьевна', '12345678'),
(25, '+79137964071', 'Сергей', 'Терехин', 'Олегович', '3321953419');

-- --------------------------------------------------------

--
-- Структура таблицы `ordercustomer`
--

CREATE TABLE `ordercustomer` (
  `ID_ordercustomer` int(255) NOT NULL,
  `ID_customer2` int(255) NOT NULL,
  `ID_product2` int(255) NOT NULL,
  `Quantity` int(40) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `idforzakaz` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ordercustomer`
--

INSERT INTO `ordercustomer` (`ID_ordercustomer`, `ID_customer2`, `ID_product2`, `Quantity`, `Date`, `idforzakaz`) VALUES
(31, 25, 2, 1, 'May 23, 2021, 9:54 pm', '25681746'),
(32, 25, 1, 1, 'May 23, 2021, 9:54 pm', '25741625'),
(33, 25, 3, 1, 'May 23, 2021, 9:54 pm', '25209132'),
(34, 25, 5, 1, 'May 23, 2021, 9:54 pm', '25860593'),
(35, 25, 4, 1, 'May 23, 2021, 9:54 pm', '25639945'),
(37, 25, 2, 1, 'May 23, 2021, 9:59 pm', '25589784');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `ID_Product` int(255) NOT NULL,
  `ID_Categoriy` int(40) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Cost` varchar(40) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `DlinaSl` int(255) DEFAULT NULL,
  `DlinaRab` int(255) DEFAULT NULL,
  `Ves` int(255) DEFAULT NULL,
  `Material` varchar(255) DEFAULT NULL,
  `Firma` varchar(255) DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`ID_Product`, `ID_Categoriy`, `Name`, `Cost`, `Picture`, `Description`, `DlinaSl`, `DlinaRab`, `Ves`, `Material`, `Firma`, `Model`) VALUES
(1, 1, 'СПИННИНГ SILVER STREAM URAGAN SPECIAL 702H 2,1М', '2280.00', '1.jpg', 'Серия выполнена по технологии комбинации материалов IM4-IM6, что является большим достоинством с учетом невысокой цены спиннинга. Удилище обладает удобной конфигурацией рукоятки и классическим катушкодержателем. В отличие от старого поколения, спиннинг укомплектован кольцами ALCONITE, обладающими близкими к SiC характеристиками и находящимися на предыдущей ступени в классификации FUJI.\r\n\r\nСерия выпускается 8 лет и зарекомендовала себя как недорогое удилище, обладающее большой надежностью и универсальностью. Серия собрала в себе все лучшее в современном подходе к спиннингу и в то же время обладает невысокой ценой, позволяющей любому любителю рыбалки на спиннинг ловить очень хорошим удилищем за разумные деньги.', 110, 210, 2, 'Плохой', 'SILVER STREAM', 'URAGAN SPECIAL 702H'),
(2, 1, 'Спиннинг Salmo Blaster Spin 20 2, 40 5-20 грамм', '792.00', '2.jpg', 'Недорогие спиннинговые удилища из композита. Удилища выполнены в современном дизайне с разнесённой рукояткой, и будут хорошим выбором для начинающих рыболовов. ? Материал бланка удилища - композит\r\n? Строй бланка средне - быстрый\r\n? Класс спиннинга M\r\n? Конструкция штекерная\r\n? Соединение колен типа IN STEEK\r\nКольца пропускные:\r\n- со вставками SIC\r\nРукоятка:\r\n- EVA\r\n- разнесенная\r\nКатушкодержатель:\r\n- винтового типа', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Спиннинг Salmo Elite Micro Jig 10 2,13м 2-10гр', '2582.00', '3.jpg', 'Elite MICRO JIG 10 2.13 - это спиннинговое удилище быстрого строя для ловли на маленькие джиг-приманки класса лайт. Бланки этого спиннинга для микроджига сделаны из графита IM7. Спиннинг Салмо элит микроджиг 2 13 очень и очень легкий, менее ста грамм. Звонкий и чувствительный бланк даст почувствовать все, что происходит с приманкой. \r\n\r\nФурнитура высокого класса, включая облегченные пропускные кольца со вставками SIC и катушкодержатель Fuji DPS.\r\n\r\nОтличная балансировка в сочетании с минимальным весом абсолютно не нагружают руку и ловить спиннинг ультралайт Salmo Elite MICRO JIG 10 2.13 можно хоть целый день! Особо чувствительная графитовая вершинка имеет цельную конструкцию и сигнализирует даже о слабых поклевках. Рукоятка из материала EVA (ЭВА) не выскальзывает из рук и за нее приятно держаться на холоде.\r\n\r\nКупить спиннинг Салмо элит микроджиг 10 2.13 можно в кредит, заполнив простую форму.', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'Mifine WOLF Carbon, от 1 гр до 7гр, 210см', '1234.00', '3.jpg', 'Спиннинговое удилище WOLF Carbon - это бюджетный и надежный \"ультралайтовый\" спиннинг, который подойдет для любителей ловли на блесны, воблеры и микро-джиг. Можно с успехом ловить ловли окуня, голавля и конечно форель.\r\n\r\nСтрой: средне-быстрый\r\n\r\nТест 1-7 гр\r\n\r\nДлина 210 см', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'KAIDA SPIRADO, от 60 гр до 150гр, 360см', '3330.00', '4.jpg', 'Это практичный, стойкий к воздействиям инструмент ловли. Рукоятка данной модели удилища комбинированная, из пробки и неопрена. Бланк изготовлен из композитного материала, неприхотливого, правда немного тяжеловатого, зато с совсем небольшой ценой. Удилище имеет винтового типа катушкодержатель, поставляется в текстильном чехле.Характеристики\r\n\r\nПроизводитель Kaida\r\n\r\nКатушкодержатель Винтовой\r\n\r\nМодель Spirado\r\n\r\nКол-во колец 12\r\n\r\nКол-во хлыстиков 3\r\n\r\nТест хлыстиков 60 г, 100 г, 120 г.\r\n\r\nЦвет Черный', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `сategory`
--

CREATE TABLE `сategory` (
  `ID_category` int(40) NOT NULL,
  `Categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `сategory`
--

INSERT INTO `сategory` (`ID_category`, `Categoria`) VALUES
(1, 'Spining'),
(2, 'fishingrod');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Customer`),
  ADD KEY `ID_Customer` (`ID_Customer`);

--
-- Индексы таблицы `ordercustomer`
--
ALTER TABLE `ordercustomer`
  ADD PRIMARY KEY (`ID_ordercustomer`),
  ADD KEY `ID_customer2` (`ID_customer2`),
  ADD KEY `ID_product2` (`ID_product2`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_Product`),
  ADD KEY `ID_Product` (`ID_Product`),
  ADD KEY `ID_Categoriy` (`ID_Categoriy`);

--
-- Индексы таблицы `сategory`
--
ALTER TABLE `сategory`
  ADD PRIMARY KEY (`ID_category`),
  ADD KEY `ID_category` (`ID_category`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `ordercustomer`
--
ALTER TABLE `ordercustomer`
  MODIFY `ID_ordercustomer` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `ID_Product` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `сategory`
--
ALTER TABLE `сategory`
  MODIFY `ID_category` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ordercustomer`
--
ALTER TABLE `ordercustomer`
  ADD CONSTRAINT `ordercustomer_ibfk_1` FOREIGN KEY (`ID_customer2`) REFERENCES `customer` (`ID_Customer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ordercustomer_ibfk_2` FOREIGN KEY (`ID_product2`) REFERENCES `product` (`ID_Product`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ID_Categoriy`) REFERENCES `сategory` (`ID_category`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
