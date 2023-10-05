<?php
    DEFINE("CAMPOSFORM",array("nom"=>["patron"=>"/.*/","size"=>"60","pal"=>"Nombre","patronUser"=>"Cualquier caracter alfanumerico"],
                              "ape"=> ["patron"=>"/.*/","size"=>"30","pal"=>"Apellidos","patronUser"=>"Cualquier caracter alfanumerico"],
                              "DNI"=> ["patron"=>"/[0-9]{8}[TRWAGMYFPDXBNJZSQVHJCKE]/","size"=>"9","pal"=>"DNI","patronUser"=>"8 numeros y una letra"],
                              "mail"=> ["patron"=>"/^[a-zA-Z0-9.]+@educa\.madrid\.org$/","size"=>"40","pal"=>"Correo Electronico","patronUser"=>"debe ser con el dominio de educamadrid"],
                              "fecNac"=> ["patron"=>"/[0-9]{2}-[0-9]{2}-[0-9]{4}/","size"=>"10","pal"=>"Fecha Nacimiento","patronUser"=>"dd-MM-yyyy"],
                              "TelFijo"=> ["patron"=>"/[0-9]{9}/","size"=>"9","pal"=>"Telefono Fijo","patronUser"=>"9 digitos"],
                              "TelMovil"=> ["patron"=>"/(\+34)[0-9]{9}/","size"=>"10","pal"=>"Telefono Movil","patronUser"=>"(+34)9 digitos"],
                              "pwd"=> ["patron"=>"/^(?=.*[a-z])(?=.*[^a-zA-Z0-9])[^0-9]{8,}$/","size"=>"9","pal"=>"Contraseña","patronUser"=>"8 caracteres alfanumericos, al menos una minuscula y un caracter especial"]));
?>