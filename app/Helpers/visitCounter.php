<?php

if (!function_exists('visitCounter')) {
    function visitCounter($filePath = 'visits.txt')
    {
        $path = storage_path($filePath);

        // Si no existe el archivo, lo creamos con valor 0
        if (!file_exists($path)) {
            file_put_contents($path, 0);
        }

        // Leer visitas
        $visits = (int) file_get_contents($path);

        // Aumentar en 1
        $visits++;

        // Guardar de nuevo
        file_put_contents($path, $visits);

        return $visits;
    }
}
