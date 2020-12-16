<?php 
class Product {
    function fetchParentCategory($conn){
        $sql = "SELECT * FROM `tbl_product` WHERE `id` = 1 AND 	`prod_parent_id` = 1 ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($data = $result->fetch_assoc()) {
                $arr[] = $data;
            }
            return $arr;
        }
        return false;
    }

    function addCategory($cname, $link, $pid,$conn){
        $sql = "INSERT INTO `tbl_product` (`prod_name`, `link`, `prod_parent_id`, `prod_launch_date`, `prod_available`) VALUES ('$cname', '$link', '$pid', NOW(), 1) ";
        if ($conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    function fetchCategory($conn)
    {
        $row['data'] = array();
        $sql = "SELECT * FROM `tbl_product` WHERE `id` <> 1 ";
        $result = $conn->query($sql);
        $i = 1;
        while ($data = $result->fetch_assoc()) {
            $row['data'][] = array($i++, $data['prod_parent_id'], $data['prod_name'], $data['link'], $data['prod_available'], $data['prod_launch_date'], "<a class='btn btn-danger text-light'>Delete</a><button type='button' class='btn btn btn-outline-success actioncategory' data-toggle='modal' data-target='#modal-form' data-action='edit' data-id='".$data['id']."'>Edit</button>" );
        }
        echo json_encode($row);
    }

    function fetchCategorynav($conn)
    {
        $row = array();
        $sql = "SELECT * FROM `tbl_product` WHERE `prod_available` = 1 AND `prod_parent_id` = 1 ";
        $result = $conn->query($sql);
        //while ($data = $result->fetch_assoc()) {
        return $result;
            
        }
        // echo $row;
    
    function fetchCategoryCatpage($id,$conn)
    {
        $row = array();
        $sql = "SELECT * FROM `tbl_product` WHERE `id` = '$id' ";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data;
            
    }
        // echo $row;
    
    function  fetchprodDescription($id,$conn)
    {
        $arr = array();
        $sql = "SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id` WHERE `tbl_product`.`prod_parent_id` = '$id' ";

        $result = $conn->query($sql);
        while ($data = $result->fetch_assoc()) 
        {
            $arr[] = $data;
        }
        return $arr;
    }

    function addProduct($productCategory, $productName, $pageUrl, $monthlyPrice, $annualPrice, $sku, $webSpace, $freeDomain, $bandwidth, $LTSupport, $mailbox, $conn)
    {
        $productDesc = array(
            'webSpace'=>$webSpace,
            'bandwidth'=>$bandwidth,
            'freeDomain'=>$freeDomain,
            'LTSupport'=>$LTSupport,
            'mailbox'=>$mailbox
        );

        $jsonProductDesc = json_encode($productDesc);

        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`)
        VALUES ('$productCategory', '$productName', '$pageUrl', '1', NOW())";

        if ($conn->query($sql) === true) {
            $last_id = $conn->insert_id; // last id
            // $msg = $last_id;
            $sql = "INSERT INTO `tbl_product_description` (`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$last_id', '$jsonProductDesc', '$monthlyPrice', '$annualPrice', '$sku')";

            if ($conn->query($sql) === true) {
                $msg = "Product Added Successfully !";
            } else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
            }
            
        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
            // $msg = "error";
        }


        return $msg;
    }
}



?>