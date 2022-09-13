<?php

class District extends Model
{

    // Lấy quận/huyện theo thành phố/tỉnh trong database
    public function getDistrictByProvinceName($province_name)
    {
        $sql = "SELECT d.* FROM provinces p, districts d WHERE d.provinces_id = p.id AND p.name = :province_name ;";
        $this->prepareQuery($sql);
        $this->bindData(':province_name', $province_name);
        $districts = $this->getAllResult();
        return $districts;
    }

    

}
