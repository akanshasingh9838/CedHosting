<?php 
class Product{
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


}
?>