<?php
    define( 'CIPHER', 'AES_128_ECB' ); // Burası girdiğiniz anahtarın şifreleneceği algoritma // This is the algorithm where the key you entered will be encrypted
    define( 'KEY', 'deneme_123456' ); // Buraya şifrelemek istediğiniz anahtarı giriniz. // Enter the key you want to encrypt here

    function encrypt( $data )
    {
        return openssl_encrypt( $data, CIPHER, KEY ); // Burası anahtarınız ve algoritmaya göre şifreleme yapar // This is your key and it encrypts by algorithm.
    }

    function decrypt( $data )
    {
        return openssl_decrypt( $data, CIPHER, KEY ); // Burası şifrelemeyi çözer // Here decrypts the encrypts
    }

    function tag( $text )
    {
        $pattern = [];
        $news = [];
        $pattern[0] = '/@([0-9a-zA-Z-_]+)/';
        $pattern[1] = '/#([0-9a-zA-Z-_]+)/';
        $news[0] = '<a href="$1"><b>@\1</b></a>';
        $news[1] = '<a href="hashtag/$1"><b>#\1</b></a>';

        return preg_replace( $pattern, $news, $text );
    } // Burası sosyal medyalardaki gibi etiketleme yapar. // This place tags like on social media

    function url( $url_length = null )
    {
        $wonk = '';
        $letters = 'ABCDEFGHIJKLMNOPRSTUVYZXWQabcdefghijklmnoprstuvyzxwq1234567890';

        for($i=1; $i <= $url_length; $i++)
        {
            $wonk .= mb_substr( $letters,mt_rand(0,mb_strlen($letters)-1),1 );
        }

        return $wonk;
    } // Burası rastgele bir kod oluşturur. // Here is create random codes.

    function sef( $seo )
    {
        $seo = mb_strtolower( $seo, 'UTF-8' );
        $seo = str_replace(
            [
                'ı', 'ö', 'ç', 'ğ', 'ü', 'ş'
            ],
            [
                'i', 'o', 'c', 'g', 'u', 's'
            ],
            $seo
        );
        $seo = preg_replace( '/[^a-z0-9]/', '-', '$seo' );
        $seo = preg_replace( '/-+/', '-', $seo );

        return trim( $seo, '-' );
    } // Burası basit bir sef url oluşturur. // Here is create basic a sef url.

    function formControl( $value )
    {
        return strip_tags(trim(htmlspecialchars( $_POST[$value] ))); // Burası basit bir şekilde form verisini kontrol eder. // Burası form verilerini kontrol eder
    }

    function setCookie( $cookieName, $cookieArray, $cookieTime )
    {
        return setcookie( $cookieName, $cookieArray, $cookieTime, '/' ); // Burası cookie oluşturur // Here is create a cookie.
    }

    function createSession( $array = [] )
    {
        if( count( $array ) != 0 )
        {
            foreach( $array as $key => $value )
            {
                $_SESSION[$key] = $value; // Burası session oluşturur. // Here is create a session.
            }
        }
    }
?>