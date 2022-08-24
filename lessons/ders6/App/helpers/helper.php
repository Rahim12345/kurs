<?php


function view( $name , $data = [] )
{
//    $file = APP_VIEW_PATH . str_replace('.',DIRECTORY_SEPARATOR , $name) . '.php';
//
//    if( ! file_exists($file) )
//        throw new \Exception('File not found');
//
//    extract($data);
//    ob_start();
//    include $file;
//    return ob_get_clean();

    $master = file_get_contents(APP_VIEW_PATH . 'template/master.blade.php');

    $view = file_get_contents(APP_VIEW_PATH .    'users/users.blade.php');

    $pattern = "/@section\('content'\)((\n?)+(.*?)(\n?)+)@endsection/m";
    preg_match_all($pattern,$view , $matches);


    if(isset($matches[2][0]))
    {
        $master = str_replace("@yield('content')" , $matches[2][0] , $master);
    }

    file_put_contents(APP_VIEW_PATH . 'example.php' , $master);

    extract($data);
    ob_start();
    include APP_VIEW_PATH . 'example.php';
    $result =  ob_get_clean();


    return $result;




}

function requireToVariable($file){
    ob_start();
    require($file);
    return ob_get_clean();
}