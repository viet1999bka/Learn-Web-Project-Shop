<?php

class Ward extends Model
{

    // Lấy phường/xã theo quận/huyện trong database
    public function getWardByDistrictName($district_name)
    {
        $sql = "SELECT w.* FROM wards w,districts d WHERE w.districts_id = d.id AND d.name = :district_name ;";
        $this->prepareQuery($sql);
        $this->bindData(':district_name', $district_name);
        $wards = $this->getAllResult();
        return $wards;
    }

    

}