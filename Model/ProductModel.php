<?php
 
    namespace Model;

    class ProductModel extends BaseModel
    {
        function __construct() {}

        function getAllProducts() {
            try {
                $cxn = parent::connectToDB();

                $handle = $cxn->prepare('SELECT * FROM Product');
                $handle->execute();

                $result = $handle->fetch(\PDO::FETCH_OBJ);

                return $result;
            } catch (\PDOException $ex) {
			print($ex->getMessage());
		    }

            
        }
    }
