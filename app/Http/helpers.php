<?php

function formatMoney($money)
{
    return '&#8364;' . ' ' . number_format($money, 2, ',', '.');
}


function formatDate($date)
{
    return date('d-m-Y H:i:s', strtotime($date));
}

function formatDateOnly($date)
{
    return date('d-m-Y', strtotime($date));
}


function radio($name, $id, $value, $options = [])
{

    $optAttr = '';
    $optVal = '';

    if (!is_null($options)) {
        foreach ($options as $att => $val) {
            $optAttr = $att;
            $optVal = $val;
        }
    }

    return '<input type="radio" name="' . $name . '"' . ' ' . 'id="' . $id . '"' . ' ' . 'value="' . $value . '"' . ' ' . $optAttr . '="' . $optVal . '"' . Input::old("'. $name. '") . '>';
}


function getRoles()
{
    $roles = [
        '3' => 'User',
        '5' => 'Stagair',
        '1' => 'Administrator',
        '2' => 'Moderator',
        '4' => 'Sales'

    ];

    return $roles;
}

function getRolesLevel()
{
    $level = [
        '5' => '5',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'

    ];

    return $level;
}


function getYearSelectie()
{
    $aJaar = [
        Date('Y') => Date('Y'),
        Date('Y') + 1 => Date('Y') + 1
    ];

    return $aJaar;
}


/**
 * @return array
 */
function getContractType()
{
    $aContractType = ['Selecteer keuze..',
        'verkopen_van_contr. d.m.v. Sales' => 'Verkopen van contracten d.m.v. Sales',
        'project_imtech' => 'Project Imtech',
        'verdikking_bestaande_contracten' => 'Verdikking van de bestaande contracten',
        'grote_project_bedrijf' => 'Via het grote projecten bedrijf',
        'tenders_landelijk' => 'Tenders landelijk',
        'tenders_lokaal' => 'Tenders lokaal',
    ];

    return $aContractType;
}


/**
 * @param array $chk_val
 * @param string $optID
 * @return string
 */
function makeCheckBox($chk_val = [], $name)
{
    $chkBox = [];

    foreach ($chk_val as $chk) {
        $sCheckbox = "<label>" .
            Form::checkbox($name, $chk, old($name), ['style'=>'margin-right: 20px;', 'class'=>'input-control'])

            . " " . $chk . "</label>";

        array_push($chkBox, $sCheckbox);
    }

    return $chkBox;
}

function checkBoxPermissions($chk_val = [], $name)
{
    $chkBox = [];

    foreach ($chk_val as $chk) {
        $sCheckbox = "<label>" .
            Form::checkbox($name, $chk, old($name))

            . " " . $chk . "</label>";

        array_push($chkBox, $sCheckbox);
    }

    return $chkBox;
}

function editChckBox($chk_val = [], $items = [], $name)
{
    // $kick = $items;

    $chkBox = [];

    foreach ($chk_val as $chk) {

        $sCheckbox = "";

        if (in_array($chk, $items)) {
            $sCheckbox =
                // Form::hidden($name, 0) . "<br/>"
                "<label>" .
                "<input name='" . $name . "' type='checkbox' value='" . $chk . "' checked >"
                . " " . $chk . "</label>";
        } else {
            $sCheckbox =
                // Form::hidden($name, 0) . "<br/>"
                "<label>" .
                "<input name='" . $name . "' type='checkbox' value='" . $chk . "' >"
                . " " . $chk . "</label>";
        }

        // Form::checkbox($name, $chk, ['checked' => 'false'])

        array_push($chkBox, $sCheckbox);
    }

    return $chkBox;

}


/**
 * @param $name
 * @param $id
 * @param string $opt_div
 * @return string
 */
function makeRadio($name, $id, $opt_div = '', $custName1 = '', $custName2 = '')
{
    $jaVal = ($custName1 == '') ? "Ja" : $custName1;

    $neeVal = ($custName2 == '') ? "Nee" : $custName2;

    // if ($custName1 == '') {
    //     $jaVal = 'Ja';
    // }
    // else{}


    if (!$opt_div == '') {

        $radioBtn = '<label class="radio-inline control-label">' .
            Form::radio($name, 'ja', Input::old($name), ['onclick' => 'showDiv("ja", "' . $opt_div . '")', 'id' => $id . '_ja', 'class' => 'pull-right radio'])
            . $jaVal . '</label>' .
            '<label class="radio-inline control-label">' .
            Form::radio($name, 'nee', Input::old($name), ['onclick' => 'showDiv("nee", "' . $opt_div . '")', 'id' => $id . '_nee', 'class' => 'radio'])
            . $neeVal . '</label>';
//
//                    <input type="radio"  name="' . $name .'" id="'. $id .'_ja" value="ja"  onclick="showDiv(\'ja\', \''.$opt_div. '\')"> Ja
//                </label>
//                <label class="radio-inline">
//                    <input type="radio" name="'.$name . '" id="'. $id .'_nee" value="nee" onclick="showDiv(\'nee\', \''.$opt_div .'\')"> Nee
//                </label>';
    } else {
        $radioBtn = $radioBtn = '<label class="radio-inline">' .
            Form::radio($name, 'ja', Input::old($name), ['id' => $id . '_ja', 'class' => 'pull-right radio'])
            . $jaVal . '</label>' .
            '<label class="radio-inline">' .
            Form::radio($name, 'nee', Input::old($name), ['id' => $id . '_nee', 'class' => 'radio'])
            . $neeVal . '</label>';


//            '<label class="radio-inline">
//                    <input type="radio"  class="pull-right" name="' . $name .'" id="'. $id .'_ja" value="nee"> Ja
//                </label>
//                <label class="radio-inline">
//                    <input type="radio" name="'.$name . '" id="'. $id .'_nee" value="nee"> Nee
//                </label>';
    }

    return $radioBtn;

}

function highlight($text, $words) {
    preg_match_all('~\w+~', $words, $m);
    if(!$m)
        return $text;
    $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
    return preg_replace($re, '<span style="background-color:#FFB930;">$0</span>', $text);
}


//function highlight( $content, $word, $color ) {
//    $replace = '<span style="background-color: ' . $color . ';">' . $word . '</span>'; // create replacement
//    $content = str_replace( $word, $replace, $content ); // replace content
//
//    return $content; // return highlighted data
//}

function dumpComments($comments, $view = 'comment.comment_partial.comment')
{
    $commentList = '';
    foreach ($comments as $comment)
    {
        $commentList .= view('comment', compact('comment'));
    }
    return $commentList;
}
