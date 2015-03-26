<?php
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
    