<?php

class AppointmentServices
{
    private ?AppointmentDAO $dao = null;

    public function __construct(AppointmentDAO $dao)
    {
        $this->dao = $dao;
    }

    public function getAllAppointments(): mixed
    {
        return $this->dao->getAllAppointments();
    }
}