<?php
function debugToConsole($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
function convertTime($dec)
{
    // start by converting to seconds
    $seconds = ($dec * 3600);
    // we're given hours, so let's get those the easy way
    $hours = floor($dec);
    // since we've "calculated" hours, let's remove them from the seconds variable
    $seconds -= $hours * 3600;
    // calculate minutes left
    $minutes = floor($seconds / 60);
    // remove those from seconds as well
    $seconds -= $minutes * 60;
    // return the time formatted HH:MM:SS
    return lz($hours).":".lz($minutes);
}
function lz($num)
{
    return (strlen($num) < 2) ? "0{$num}" : $num;
}
function calculateTotalSpan($element)
{
    $total = 0;
    foreach ($element['sessions'] as $session) {
        $span = $session['span'];
        $total += $span;
    }
    return $total;
};

function renderTableHeader($largest_span){
    $string = '';
    for ($i = 0; $i < ($largest_span/30); $i++) {
        $string = $string. '<th class="w-5 h-10 bg-base-200">' . convertTime((($i + 17) / 2)) . '</th>';
    }
    return $string;
}

function renderTableRows($timetable, $largest_span, $timetable_span){
    $string = '';
    foreach($timetable as $index=>$day){
        $sessions = $day['sessions'];
        $row = '';
        foreach($sessions as $session){
            $row  = $row.'
            <td colspan="'.($session['span']/30).'" class="w-5 h-10 '.$session['course'].'">
                <p class="font-bold">'.$session['course'].'</p>
                <p>'.$session['type'].'</p>
            </td>';
        }
        for($i=0; $i < ($largest_span-$timetable_span[$index])/30; $i++){
            $row = $row.'<td class="w-5 h-10"></td>';
        }
    $string = $string. '<tr>
        <th class="w-10 bg-base-200">'.$day['day'].'</th>
        '.$row.'
    </tr>';
    }
    return $string;
}

function renderTable($timetable){
    $timetable_span = array_map('calculateTotalSpan', $timetable);
    $sorted_span = $timetable_span;
    rsort($sorted_span);
    $largest_span = $sorted_span[0];
    echo '<!-- START TIMETABLE -->
    <table class="w-full table table-compact timetable">
        <tbody>
            <tr>
                <th class="w-5 h-10"></th>
                '.renderTableHeader($largest_span).'
            </tr>
            '.renderTableRows($timetable, $largest_span, $timetable_span).'

        </tbody>
    </table>
    <!-- END TIMETABLE -->';
}
?>
