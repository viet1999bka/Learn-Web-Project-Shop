<?php

class Province extends Model
{

    // Lấy tất cả thành phố/tỉnh trong database
    public function getAllProvince()
    {
        $sql = "SELECT * FROM provinces;";
        $this->prepareQuery($sql);
        $provinces = $this->getAllResult();
        return $provinces;
    }

    

}
