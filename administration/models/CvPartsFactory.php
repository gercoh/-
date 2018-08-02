<?php

namespace administration\models;

/**
 * Class CvPartsFactory
 * @package administration\models
 */
class CvPartsFactory extends \application\models\cv\CvPartsFactory
{
    /**
     * @param array $data
     * @return int
     */


    /**
     * @param array $data
     * @return int
     */
    public function updateExperience($data)
    {
        return $this->dataModel->set(parent::PART_EXPERIENCE, $data);
    }

    /**
     * @param array $data
     * @return int
     */


    /**
     * @param array $data
     * @return int
     */
    public function updatePersonal($data)
    {
        return $this->dataModel->set(parent::PART_PERSONAL, $data);
    }

    /**

}
