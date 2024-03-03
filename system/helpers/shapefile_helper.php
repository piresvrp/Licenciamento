<?php

function extractZip($file, $destinationPath)
{

    if (!file_exists($destinationPath)) {
		mkdir($destinationPath, 0775, true);
    }

    $zip = new ZipArchive;
    $res = $zip->open($file);
    if ($res === true) {
        $zip->extractTo($destinationPath);
        $zip->close();
    }
}

//Shapefile
function returnFileName($path, $ext)
{
    $files = scandir($path);
    $fileName = '';
    foreach ($files as $file) {
        if (strlen(str_replace('.', '', $file)) != 0 && pathinfo($path . $file, PATHINFO_EXTENSION) == $ext) {
            $fileName = $file;
        }
    }

    return $fileName;
}

function removeDir($path)
{
    if (file_exists($path) === false) {
        return;
    }
    if (is_file($path)) {
        unlink($path);
        return;
    }

    $files = scandir($path);

    foreach ($files as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $fullPath = $path . '/' . $item;

        if (is_dir($fullPath)) {
            removeDir($fullPath);
        }

        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }

    rmdir($path);
}

function returnFilePathByExtension($path, $ext)
{
    $directorys = new RecursiveDirectoryIterator($path);

    foreach (new RecursiveIteratorIterator($directorys) as $directory) {
	
        if ($directory->isFile() && $directory->getExtension() == $ext) {
			return $directory->getPathname();
		}
	}
}

function dd($value)
{
    echo "<pre>";
    print_r($value);
    exit;
}
