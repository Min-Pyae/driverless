<?php 

    include('./connect.php');


    // USERS TABLE

    // QUERY FOR DROPING USERS TABLE
    $queryDropUsers = "DROP TABLE users";
    $queryDropUsersResult = mysqli_query($Connect_DB, $queryDropUsers);

    if ($queryDropUsersResult) {
        echo "Users Table Droped Successfully!" . "<br/>";
    }
    // END OF QUERY FOR DROPING USERS TABLE

    // QUERY FOR CREATING USERS TABLE
    $queryCreateUsers = "CREATE TABLE users
                        (
                            UserID int AUTO_INCREMENT PRIMARY KEY,
                            UserName varchar(50),
                            Email varchar(100),
                            Password varchar(100),
                            DateOfBirth date,
                            Address text,
                            PostCode varchar(50)
                        )";
    $queryCreateUsersResult = mysqli_query($Connect_DB, $queryCreateUsers);

    if ($queryCreateUsersResult) {
        echo "Users Table Created Successfully"  . "<br/><br/>";
    }
    // END OF QUERY FOR CREATING USERS TABLE

    // END OF USERS TABLE



    // ADMINS TABLE

    // QUERY FOR DROPING ADMINS TABLE
    $queryDropAdmins = "DROP TABLE admins";
    $queryDropAdminsResult = mysqli_query($Connect_DB, $queryDropAdmins);

    if ($queryDropAdminsResult) {
        echo "Admins Table Droped Successfully!"  . "<br/>";
    }
    // END OF QUERY FOR DROPING ADMINS TABLE

    // QUERY FOR CREATING ADMINS TABLE
    $queryCreateAdmins = "CREATE TABLE admins
                        (
                            AdminID int AUTO_INCREMENT PRIMARY KEY,
                            AdminName varchar(50),
                            Email varchar(100),
                            Password varchar(100),
                            PhoneNumber varchar(50)
                        )";
    $queryCreateAdminsResult = mysqli_query($Connect_DB, $queryCreateAdmins);

    if ($queryCreateAdminsResult) {
        echo "Admins Table Created Successfully!"  . "<br/><br/>";
    }
    // END OF QUERY FOR CREATING ADMINS TABLE

    // END OF ADMINS TABLE



    // VEHICLES TABLE

    // QUERY FOR DROPING VEHICLES TABLE
    $queryDropVehicles = "DROP TABLE vehicles";
    $queryDropVehiclesResult = mysqli_query($Connect_DB, $queryDropVehicles);

    if ($queryDropVehiclesResult) {
        echo "Vehicles Table Droped Successfully!"  . "<br/>";
    }
    // END OF QUERY FOR DROPING VEHICLES TABLE

    // QUERY FOR CREATING VEHICLES TABLE
    $queryCreateVehicles = "CREATE TABLE vehicles
                            (
                                VehicleID int AUTO_INCREMENT PRIMARY KEY,
                                VehicleName varchar(50),
                                VehicleModel varchar(50),
                                VehicleType varchar(50),
                                Year varchar(10),
                                Description text,
                                UnitPrice varchar(100),
                                PromotionPrice varchar(100),
                                VehicleImage text
                            )";
    $queryCreateVehiclesResult = mysqli_query($Connect_DB, $queryCreateVehicles);

    if ($queryCreateVehiclesResult) {
        echo "Vehicles Table Created Successfully!"  . "<br/><br/>";
    }
    // END OF QUERY FOR CREATING VEHICLES TABLE

    // END OF VEHICLES TABLE



    // CONTACT TABLE

    // QUERY FOR DROPING CONTACT TABLE
    $queryDropContact = "DROP TABLE contact";
    $queryDropContactResult = mysqli_query($Connect_DB, $queryDropContact);

    if ($queryDropContactResult) {
        echo "Contact Table Droped Successfully!"  . "<br/>";
    }
    // END OF QUERY FOR DROPING CONTACT TABLE

    // QUERY FOR CREATING CONTACT TABLE
    $queryCreateContact = "CREATE TABLE contact
                        (
                            ContactID int AUTO_INCREMENT PRIMARY KEY,
                            UserID int,
                            Email varchar(100),
                            Subject varchar(100),
                            Message text,
                            FOREIGN KEY (UserID) REFERENCES users(UserID) 
                            ON DELETE NO ACTION
                            ON UPDATE CASCADE
                        )";
    $queryCreateContactResult = mysqli_query($Connect_DB, $queryCreateContact);

    if ($queryCreateContactResult) {
        echo "Contact Table Created Successfully!"  . "<br/><br/>";
    }
    // END OF QUERY FOR CREATING CONTACT TABLE

    // END OF CONTACT TABLE



    // ANSWER TABLE

    // QUERY FOR DROPING ANSWER TABLE
    $queryDropAnswerFAQ = "DROP TABLE answer";
    $queryDropAnswerFAQResult = mysqli_query($Connect_DB, $queryDropAnswerFAQ);

    if ($queryDropAnswerFAQResult) {
        echo "Answer Table Droped Successfully!"  . "<br/>";
    }
    // END OF QUERY FOR DROPING ANSWER TABLE

    // QUERY FOR CREATING ANSWER TABLE
    $queryCreateAnswer = "CREATE TABLE answer
                        (
                            AnswerID int AUTO_INCREMENT PRIMARY KEY,
                            Answer varchar(100),
                            AdminID int,
                            ContactID int,
                            FOREIGN KEY (AdminID) REFERENCES admins(AdminID)
                            ON DELETE NO ACTION
                            ON UPDATE CASCADE, 
                            FOREIGN KEY (ContactID) REFERENCES contact(ContactID) 
                            ON DELETE NO ACTION
                            ON UPDATE CASCADE
                        )";
    $queryCreateAnswerResult = mysqli_query($Connect_DB, $queryCreateAnswer);

    if ($queryCreateAnswerResult) {
        echo "Answer Table Created Successfully!"  . "<br/><br/>";
    }
    // END OF QUERY FOR CREATING ANSWER TABLE

    // END OF ANSWER TABLE
?>