<?php
        //Mit Server verbinden und Datenbank auswaehlen
        $database = mysqli_connect("localhost", "raspberry", "seminarfach2020") or die("Connection failed: " . mysqli_error($database));
        $db_selected = mysqli_select_db($database, "seminarfach");
          
        if (!$db_selected)
            $sql = 'CREATE DATABASE seminarfach';

        
        $database->set_charset("utf8");
        
        $sql = "* FROM articles";
        $result = $database->query($sql);

        if(empty($result)) 
        {
            $sql = "CREATE TABLE articles (
                      ID int(11) AUTO_INCREMENT,
                      topTenWords varchar(100) NOT NULL,
                      inputLen int(11) NOT NULL,
                      outputLen int(11) NOT NULL,
                      duplicateWords int(11) NOT NULL,
                      charRate int(3) NOT NULL,
                      PRIMARY KEY  (ID)
                      )";
                      echo "wa";
            $result = $databse->query($sql);
            echo "rum";
        }

        $final_result = [];

        if ($result->num_rows > 0) 
        {
            $rowNr = 1;echo "3";
            while($row = mysqli_fetch_assoc($result)) 
            {
                $final_result[$rowNr] = $row;
                $rowNr += 1;echo "4";
            }
        }
        else 
        {
            echo "0 results";
        }
