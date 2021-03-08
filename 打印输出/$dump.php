<?php

$dump = function ($var){
    echo '<pre>';//Thisisforcorrecthandlingofnewlines
    ob_start();
    var_dump($var);
    $a = ob_get_contents();
    ob_end_clean();
    echo htmlspecialchars($a,ENT_QUOTES);//EscapeeveryHTMLspecialchars(especially>and<)
    echo '</pre>';
};
