
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(150) NOT NULL,
  `salary` decimal(10,0) NOT NULL
)

--
-- Tablo döküm verisi `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `email`, `salary`) VALUES
(1, 'cengizefe', 'korkmazer', 'c@hotmail.com', 900),
(2, 'ogün', 'baysal', 'o@gmail.com', 1000),
(3, 'ali', 'yilmaz', 'a@gmail.com', 1000),
(4, 'furkan', 'tortop', 'f@gmail.com', 1000),
(5, 'bedirhan', 'aksoy', 'b@gmail.com', 1000),
(6, 'atakan', 'kurt', 'ak@gmail.com', 1000);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Tablo için indeksler `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;


SELECT first_name, last_name FROM employee;


UPDATE employee SET salary = 900 WHERE email = 'c@hotmail.com';



DELETE FROM employee WHERE email='a@gmail.com';



-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `department`
--
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
)



ALTER TABLE department ADD fk_employee INT;

ALTER TABLE department ADD FOREIGN KEY (fk_employee) REFERENCES employee(employee_id);




BEGIN TRANSACTION;
BEGIN TRY

  UPDATE employee SET salary = 2000 WHERE employee_id = 5;

  COMMIT TRANSACTION;
END TRY

BEGIN CATCH

  ROLLBACK TRANSACTION;
  PRINT "Error";
END CATCH;
  

