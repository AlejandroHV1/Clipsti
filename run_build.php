<?php
$output = [];
$return_var = 0;
$npm_path = '/usr/local/bin/npm'; // Cambia esto a la ruta correcta de npm
exec("$npm_path run build 2>&1", $output, $return_var);

echo '<pre>';
print_r($output);
echo '</pre>';
echo 'Código de retorno: ' . $return_var;
?>


