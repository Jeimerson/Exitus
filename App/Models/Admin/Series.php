<?php

namespace App\Models\Admin;

use MF\Model\Model;

class Series extends Model
{

    /**
     * Esse método retorna todas as series. Entretanto, ele deve ser usado para peencher a tag select na View.
     * 
     * @return array
     */
    public function listForSelect()
    {

        return $this->speedingUp(
            "SELECT serie.id_serie AS option_value , serie.sigla AS option_text FROM serie"
        );
    }
}
