-- Create a scheduled event to run every day
DELIMITER //

-- DROP EVENT update_payment_status_event;

CREATE EVENT update_payment_status_event
ON SCHEDULE EVERY 1 DAY
DO
BEGIN
    UPDATE customer
    SET isPaid = 'Unpaid'
    WHERE Date_due < CURDATE() AND isPaid = 'Paid';
END;
//

DELIMITER //

-- DROP TRIGGER update_isPaid_status;

CREATE TRIGGER update_isPaid_status
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    UPDATE customer
    SET isPaid = 'Paid'
    WHERE Customer_id = NEW.Customer_id  -- Assuming you have a customer_id linking the two tables
      AND Date_due >= NEW.`Date`;
END;
//

DELIMITER ;


DELIMITER ;

-- DROP TRIGGER update_ate_due;

DELIMITER //

CREATE TRIGGER update_Date_due
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    DECLARE days_to_add INT;

    -- Assuming you have a customer_id linking the two tables
    DECLARE membership_type VARCHAR(255);

    -- Get the membership type for the customer
    SELECT Customer_plan INTO membership_type
    FROM customer
    WHERE Customer_ID = NEW.Customer_ID;

    -- Determine the number of days to add based on the membership type
    CASE
        WHEN membership_type = 'Monthly' THEN
            SET days_to_add = 30;
        WHEN membership_type = 'Trimonthly' THEN
            SET days_to_add = 90;
        WHEN membership_type = 'Yearly' THEN
            SET days_to_add = 365;
        ELSE
            SET days_to_add = 0; -- Default to 0 days if membership type is not recognized
    END CASE;

    -- Update Date_due based on the membership type
    UPDATE customer
    SET Date_due = DATE_ADD(NEW.`Date`, INTERVAL days_to_add DAY)
    WHERE Customer_ID = NEW.Customer_ID
      AND Date_due >= NEW.`Date`;
END;
//

DELIMITER ;
