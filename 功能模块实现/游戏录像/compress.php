<?php

function deCompressVideoRecord($vr_string): array
{
    $res = [];
    if(!empty($vr_string)) {
        $vr_str = deCompressString($vr_string, true);
        $vr_arr = json_decode($vr_str, true);
        if(!empty($vr_arr)) {
            foreach ($vr_arr as $v) {
                $res[] = [
                    'act' => $v[0] ?? null,
                    'id' => $v[1] ?? null,
                    'time' => $v[2] ?? null,
                ];
            }
        }
    }
    return $res;
}


function deCompressString($string, bool $is_base64 = false): string
{
    $res = '';
    if (!empty($string)) {
        if ($is_base64) {
            $string = base64_decode($string);
        }
        if (!empty($string)) {
            $res = gzuncompress($string);
        }
    }
    return (string)$res;
}


$video_str = 'eJxNkckNAzEIABtCiPuoJUr/bQQvXimWPyOuMf58CIQgkJXY/QvDPNjkEfqgGDSKVeVG5zIWhV9W4EKfY5suczE6nTfeoIrSfOtFQR0zUra9gzaq1QbBBMvC5cEAS6yQOmI8Yn84bcAJ0+nRtrECN+xm74cTvFCodZENgtA0KZbrcFvFLU8IRslXkw86dfQ+Iw6nUeQft1beZ06+IAvx5ufBZuF9yQzTiUZutR5UKt3iPhiVd9SYGhprb/TBpmp9ax2ZXq+ZG1jaZu+gxgjW/csRGasKjrd12nzWpN+NZiBpy0EZ6TorIYp3B9WzspLDPs2aR1PuT7NDB6pLxBXrxqzZ6Pf7A1qcgfw=';

$args = $argv;
if(isset($args[1])){
	$video_str = $args[1];
}
// 输出参数列表
// var_dump($args);

$ret = deCompressVideoRecord($video_str);

// var_dump($ret);
print_r($ret);

// php base64_gzcompress.php eJxNkckNAzEIABtCiPuoJUr/bQQvXimWPyOuMf58CIQgkJXY/QvDPNjkEfqgGDSKVeVG5zIWhV9W4EKfY5suczE6nTfeoIrSfOtFQR0zUra9gzaq1QbBBMvC5cEAS6yQOmI8Yn84bcAJ0+nRtrECN+xm74cTvFCodZENgtA0KZbrcFvFLU8IRslXkw86dfQ+Iw6nUeQft1beZ06+IAvx5ufBZuF9yQzTiUZutR5UKt3iPhiVd9SYGhprb/TBpmp9ax2ZXq+ZG1jaZu+gxgjW/csRGasKjrd12nzWpN+NZiBpy0EZ6TorIYp3B9WzspLDPs2aR1PuT7NDB6pLxBXrxqzZ6Pf7A1qcgfw=

// ➜  php git:(main) ✗ php base64_gzcompress.php eJyLjjbTMdAxiI0FAAvdAl8=
// Array
// (
//     [0] => Array
//         (
//             [act] => 6
//             [id] => 0
//             [time] => 0
//         )

// )
// ➜  php git:(main) ✗ 