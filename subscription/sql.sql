USE news;
CREATE TABLE subscriber (
 `id` INT(5) AUTO_INCREMENT PRIMARY KEY,
   `email` VARCHAR(25) NOT NULL
 );

 CREATE TABLE subscription (
   `id` INT(5) AUTO_INCREMENT PRIMARY KEY,
   `subscriber_id` INT(5)
 );
 ALTER TABLE subscription
     DROP FOREIGN KEY fk_subscriber;
 ALTER TABLE subscription
     ADD CONSTRAINT fk_subscriber
     FOREIGN KEY (`subscriber_id`)
       REFERENCES subscriber (`id`)
       ON UPDATE CASCADE
       ON DELETE CASCADE;

SELECT sb.email FROM subscription sbs
INNER JOIN subscriber sb on sb.id = sbs.subscriber_id
WHERE sb.email = 'test.ru';