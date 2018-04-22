<?php

//mdecrypt_generic版
function encrypt_cbc($str,$iv,$encryptKey)
{
    $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, $iv);
    mcrypt_generic_init($module, $encryptKey, $iv);
    //加上以下三行，可以与encrypt_openssl得到一致的加密结果，但是加密结果用mdecrypt_generic解密与decrypt_openssl结果不一致
    $block = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $pad = $block - (strlen($str) % $block);
    $str .= str_repeat(chr($pad), $pad);

    $encrypted = mcrypt_generic($module, $str);
    return base64_encode($encrypted);
}

//mdecrypt_generic版解密
function decrypt_cbc($str,$iv,$encryptKey)
{
    $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, $iv);
    mcrypt_generic_init($module, $encryptKey, $iv);
    return mdecrypt_generic($module, base64_decode($str));
}

//mcrypt_encrypt版加密
function encrypt_hezuo($str,$localIV,$encryptKey)
{
    //加上以下三行，可以与encrypt_openssl得到一致的加密结果，但是加密结果用mcrypt_decrypt解密与decrypt_openssl结果不一致
    $block = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $pad = $block - (strlen($str) % $block);
    $str .= str_repeat(chr($pad), $pad);

    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $encryptKey, $str, MCRYPT_MODE_CBC, $localIV));
}

//mcrypt_decrypt版解密
function decrypt_hezuo($str,$localIV,$encryptKey)
{
    return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $encryptKey, base64_decode($str), MCRYPT_MODE_CBC, $localIV);
}

//encrypt_openssl新版加密
function encrypt_openssl($str,$localIV,$encryptKey)
{
    return openssl_encrypt($str, 'AES-128-CBC',$encryptKey,0,$localIV);
}
//decrypt_openssl新版解密
function decrypt_openssl($str,$localIV,$encryptKey)
{
    return openssl_decrypt($str, 'AES-128-CBC', $encryptKey, 0, $localIV);
}