<?php
Theo Jack Ma, con người thua cuộc và thất bại là bởi bốn lý do sau đây:

1. Không nhìn thấy cơ hội

2. Xem nhẹ cơ hội

3. Thiếu hiểu biết

4. Hành động chậm

//Có tham vọng là sống một cuộc đời với lý tưởng to lớn và hoàn thành mục tiêu vĩ đại. Trên đời này chỉ có những việc không dám nghĩ, không dám làm chứ không có chuyện gì là không thể làm được. Khát vọng của bạn lớn thế nào thì tương lai của bạn rộng mở thế đó!
http://harvesthq.github.io/chosen/
    
http://stackoverflow.com/questions/2954879/how-session-works
    http://stackoverflow.com/questions/1535697/how-do-php-sessions-work-not-how-are-they-used
    http://www.bennadel.com/blog/70-sql-query-order-of-operations.htm
    http://stackoverflow.com/questions/4596467/order-of-execution-of-the-query
    
    http://www.sqlviet.com/blog/left-join-voi-menh-de-where
    
    http://vnexpress.net/tin-tuc/goc-nhin/kinh-doanh-kieu-viet-nam-3156586.html
    http://kinhdoanh.vnexpress.net/tin-tuc/tien-cua-toi/nhan-vien-phuc-vu-sai-gon-kiem-hon-chuc-trieu-moi-thang-3161968.html
    
    SELECT 
  * , (SELECT C_NAME FROM t_user WHERE t_user.`PK_USER` = a.`FK_TEACHER_USER` ) AS C_TEACHER_NAME 
FROM
  `t_announce` a 
  INNER JOIN `t_user` u 
    ON (a.`FK_PARENT_USER` = u.`PK_USER`)
  INNER JOIN `t_class` c
   ON (c.`PK_CLASS` = a.`FK_CLASS`)
  
  
 SELECT 
  * 
FROM
  `t_announce` a 
  INNER JOIN `t_user` u 
    ON (a.`FK_PARENT_USER` = u.`PK_USER`)
  INNER JOIN  `t_user` u1
    ON (a.`FK_TEACHER_USER` =u1.`PK_USER`)
  INNER JOIN `t_class` c
   ON (c.`PK_CLASS` = a.`FK_CLASS`)
  
        
        
        http://www.mysqltutorial.org/mysql-subquery/
    
    
    
    he simplist way to convert one date format into another is to use strtotime() with date(). strtotime() will convert the date into a Unix Timestamp. That Unix Timestamp can then be passed to date() to convert it to the new format.

$timestamp = strtotime('2008-07-01T22:35:17.02');
$new_date_format = date('Y-m-d H:i:s', $timestamp);
Or as a one-liner:

$new_date_format = date('Y-m-d H:i:s', strtotime('2008-07-01T22:35:17.02'));
Keep in mind that strtotime() requires the date to be in a valid format. Failure to provide a valid format will result in strtotime() returning false which will cause your date to be 1969-12-31.

Using DateTime()

As of PHP 5.2, PHP offered the DateTime() class which offers us more powerful tools for working with dates (and time). We can rewrite the above code using DateTime() as so:

$date = new DateTime('2008-07-01T22:35:17.02');
$new_date_format = $date->format('Y-m-d H:i:s');
Working with Unix timestamps

date() takes a Unix timeatamp as its second parameter and returns a formatted date for you:

$new_date_format = date('Y-m-d H:i:s', '1234567890');
DateTime() works with Unix timestamps by adding an @ before the timestamp:

$date = new DateTime('@1234567890');
$new_date_format = $date->format('Y-m-d H:i:s');
Working with non-standard and ambiguous date formats

Unfortunately not all dates that a developer has to work with are in a standard format. Fortunately PHP 5.3 provided us with a solution for that. DateTime::createFromFormat() allows us to tell PHP what format a date string is in so it can be successfully parsed into a DateTime object for further manipulation.

$date = DateTime::createFromFormat('F-d-Y h:i A', 'April-18-1973 9:48 AM');
$new_date_format = $date->format('Y-m-d H:i:s');
In PHP 5.4 we gained the ability to do class member access on instantiation has been added which allows us to turn our DateTime() code into a one-liner:

$new_date_format = (new DateTime('2008-07-01T22:35:17.02'))->format('Y-m-d H:i:s');
Unfortunately this does not work with DateTime::createFromFormat() yet.
    