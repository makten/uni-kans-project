<?php
/**
 * Created by PhpStorm.
 * User: Hafiz
 * Date: 10/12/2015
 * Time: 13:19
 */

namespace App\Library;


use Illuminate\Support\Facades\Mail;

class Emailer
{


    /**
     * @param $welkeProject
     * @param $wie
     * @param $klant
     * @param $projectleider
     * @param $personsnummer
     */
    public function sendEmail($emailBag = [])
    {

        // $mailBag = [
        //      "indiener" => $persoon->mpers_voornaam,
        //      "email" => $persoon->mpers_email,
        //      "uitvoerende" => $uitvoerende->mpers_voornaam. ' '. $uitvoerende->mpers_achternaam,
        //      "status" => $verstuur->inrichten_statusen,
        //      "contractNaam" => $verstuur->contractNaam,
        //  ];
        // $emailBag['email']
        Mail::send('email.contract_email', ['data' => $emailBag], function ($message) use ($emailBag) {
            $message->to('hafizmakten@gmail.com', $emailBag['indiener'])->subject('Het contract' . ' ' . $emailBag['contractNaam'] . ' is ' . $emailBag['status']);
        });

    }

    /*
     * Een email sender voor projectadministratie
     * email van projectadministratie
     */
    /**
     * @param $project
     * @param $termijn
     */
    public function sendMutatieEmail($emailBag)
    {
        Mail::send('email.mutatie_email', ['data' => $emailBag], function ($message) use ($emailBag) {
            $message->to('hafizmakten@gmail.com', $emailBag['indiener'])->subject('De mutatie op het contract:' . ' ' . $emailBag['contractnummer'] . ' is ' . $emailBag['status']);
        });

    }


    /*
     * Een email sender voor projectadministratie
     * email van projectadministratie
     */
    /**
     * @param $project
     * @param $termijn
     */
    public function sendRegieEmail($emailBag)
    {
        Mail::send('email.regie_email', ['data' => $emailBag], function ($message) use ($emailBag) {
            $message->to('hafizmakten@gmail.com', $emailBag['indiener'])->subject('De inrichting van het regiecontract:' . ' ' . $emailBag['contractNaam'] . ' is ' . $emailBag['status']);
        });

    }
}