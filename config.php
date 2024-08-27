<?php
$message_code = array(
    '0'=>'None',
    '1'=>'This email is being used by a user',
    '2'=>'User successfully registered',
    '3'=>'logged',
    '4'=>'Email not found',
    '5'=>'Incorrect password'
);

//registration section
function user_registration($email, $username, $password, $name, $country, $favfood, $favplace, $telefono, $favartist, $favcolor, $image) {
    global $message_code;
    $data_path = file_get_contents('data.json');
    $data = json_decode($data_path, true);
    $status = '0';

    foreach ($data as $item){
        if($item['email'] == $email){
            $status = '1';
        }
    }

    if(!$status == '1'){
        $data[] = array(
            "email"     => $email,
            "username"  => $username,
            "name"  => $name,
            "country"  => $country,
            "favfood"  => $favfood,
            "favplace"  => $favplace,
            "telefono"  => $telefono,
            "favartist"  => $favartist,
            "favcolor"  => $favcolor,
            "image"  => $image,
            "password"  => $password

        );
        $data = json_encode($data);
        file_put_contents('data.json', $data);
        $status = '2';
    }
    return $status;
}


//login section
function login($email, $password)
{
    global $message_code;
    $data_path = file_get_contents('data.json');
    $data = json_decode($data_path, true);
    $status = '0';
    foreach ($data as $item) {
        if ($email == $item['email']) {
            if ($password == $item['password']) {
                if (!session_id()) {
                    session_start();
                }
                $_SESSION['email'] = $email;
                header("Location:home.php");
                $status = '3';
            } else {
                $status = '5';
            }
            break;
        } else {
            $status = '4';
        }
    }
    return $status;
}


function user_info($email)
{
    global $message_code;
    $data_path = file_get_contents('data.json');
    $data = json_decode($data_path, true);
    $user_data = false;

    foreach ($data as $item) {
        if ($email == $item['email']) {
            $user_data = array(
                "email" => $item['email'],
                "username" => $item['username'],
                "name" => $item['name'],
                "telefono" => $item['telefono'],
                "country" => $item['country'],
                "favfood" => $item['favfood'],
                "favplace" => $item['favplace'],
                "favartist" => $item['favartist'],
                "favcolor" => $item['favcolor']
            );
        }
    }
        return $user_data;
}
?>