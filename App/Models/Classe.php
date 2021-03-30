<?php

namespace App\Models;

use MF\Model\Model;

class Classe extends Model
{

    protected $idClass;
    protected $fk_id_shift;
    protected $fk_id_classroom;
    protected $fk_id_course;
    protected $fk_id_school_term;
    protected $fk_id_ballot;
    protected $fk_id_series;


    public function insertClass()
    {

        $query = "INSERT INTO turma (fk_id_turno, fk_id_sala, fk_id_periodo_letivo, fk_id_cedula, fk_id_curso, fk_id_serie) 
        VALUES (:fk_id_shift, :fk_id_classroom,:fk_id_school_term, :fk_id_ballot, :fk_id_course , :fk_id_series);";

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_shift', $this->__get('fk_id_shift'));
        $stmt->bindValue(':fk_id_classroom', $this->__get('fk_id_classroom'));
        $stmt->bindValue(':fk_id_course', $this->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));
        $stmt->bindValue(':fk_id_ballot', $this->__get('fk_id_ballot'));
        $stmt->bindValue(':fk_id_series', $this->__get('fk_id_series'));

        $stmt->execute();
    }


    public function updateClass()
    {
        $query = 'UPDATE turma SET fk_id_turno = :fk_id_shift , fk_id_sala = :fk_id_classroom , fk_id_curso = :fk_id_course , fk_id_periodo_letivo = :fk_id_school_term , fk_id_cedula = :fk_id_ballot , fk_id_serie = :fk_id_series WHERE id_turma = :idClass;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':fk_id_shift', $this->__get('fk_id_shift'));
        $stmt->bindValue(':fk_id_classroom', $this->__get('fk_id_classroom'));
        $stmt->bindValue(':fk_id_course', $this->__get('fk_id_course'));
        $stmt->bindValue(':fk_id_school_term', $this->__get('fk_id_school_term'));
        $stmt->bindValue(':fk_id_ballot', $this->__get('fk_id_ballot'));
        $stmt->bindValue(':fk_id_series', $this->__get('fk_id_series'));
        $stmt->bindValue(':idClass', $this->__get('idClass'));

        $stmt->execute();
    }


    public function availableShift()
    {

        return $this->speedingUp(
            "SELECT turno.id_turno AS option_value , turno.nome_turno AS option_text FROM turno;"
        );
    }


    public function availableBallot()
    {

        return $this->speedingUp(
            "SELECT cedula_turma.id_cedula_turma AS option_value , cedula_turma.cedula AS option_text FROM cedula_turma;"
        );
    }


    public function availableSeries()
    {

        return $this->speedingUp(
            "SELECT serie.id_serie AS option_value , serie.sigla AS option_text FROM serie;"
        );
    }


    public function checkClass()
    {
        $stmt = $this->db->prepare("SELECT * FROM turma WHERE turma.fk_id_sala = :fk_id_classroom and turma.fk_id_turno = :fk_id_shift;");
        $stmt->bindValue(':fk_id_classroom', $this->__get('fk_id_classroom'));
        $stmt->bindValue(':fk_id_shift', $this->__get('fk_id_shift'));
        $stmt->execute();

        $stmt2 = $this->db->prepare("SELECT * FROM turma WHERE turma.fk_id_serie = :fk_id_series and turma.fk_id_cedula = :fk_id_ballot;");
        $stmt2->bindValue(':fk_id_series', $this->__get('fk_id_series'));
        $stmt2->bindValue(':fk_id_ballot', $this->__get('fk_id_ballot'));
        $stmt2->execute();

        return $situation = [
            [count($stmt->fetchAll(\PDO::FETCH_ASSOC))],
            [count($stmt2->fetchAll(\PDO::FETCH_ASSOC))]
        ];
    }

    public function listClass()
    {
        return $this->speedingUp(
            "SELECT turma.id_turma as id_class , serie.sigla AS series_acronym , cedula_turma.cedula AS ballot , curso.sigla AS course , turno.nome_turno AS shift , numero_sala_aula.numero_sala_aula AS classroom_number , periodo_disponivel.ano_letivo AS school_term from turma LEFT JOIN cedula_turma ON(turma.fk_id_cedula = cedula_turma.id_cedula_turma) LEFT JOIN curso ON(turma.fk_id_curso = curso.id_curso) LEFT JOIN serie ON(turma.fk_id_serie = serie.id_serie) LEFT JOIN turno ON(turma.fk_id_turno = turno.id_turno)LEFT JOIN sala ON(turma.fk_id_sala = sala.fk_id_numero_sala) LEFT JOIN numero_sala_aula ON(sala.fk_id_numero_sala = numero_sala_aula.id_numero_sala_aula) LEFT JOIN periodo_letivo ON(turma.fk_id_periodo_letivo = periodo_letivo.id_ano_letivo) LEFT JOIN periodo_disponivel ON(periodo_letivo.fk_id_ano_letivo = periodo_disponivel.id_periodo_disponivel) LEFT JOIN situacao_periodo_letivo on(periodo_letivo.fk_id_situacao_periodo_letivo = situacao_periodo_letivo.id_situacao_periodo_letivo) WHERE situacao_periodo_letivo.id_situacao_periodo_letivo = 1"
        );
    }
}
