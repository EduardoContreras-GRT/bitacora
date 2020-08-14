
//$conn = new connect();
//$data = ["table" => "Participantes",    
//    "data" => [
//        "Email" => "eduardo.contreras@grt.mx",
//        "PrimerNombre" => "Jesús",
//        "SegundoNombre" => "Eduardo",
//        "ApellidoPaterno" => "Contreras",
//        "ApellidoMaterno" => "López",
//        "EmailConfirmado" => "eduardo.contreras@grt.mx",
//        "Ciudad" => "Toluca",
//        "CodigoPostal" => "50000",
//        "Referencia" => "COLJ901216",
//        "Facturacion" => "Sí",
//        "Telefono" => "7224449049",
//        "idEstatusParticipante" => "1"
//    ]
//];
//$conn->insert($data);
$data = ["table" => "Participantes",
    "idValues" => [
        "idField" => "IdParticipante",
        "idValue" => "12",
    ],
    "data" => [
        "Email" => "eduardo.contreras@grt.mx",
        "PrimerNombre" => "Jesús",
        "SegundoNombre" => "Eduardo",
        "ApellidoPaterno" => "Contreras",
        "ApellidoMaterno" => "López",
        "EmailConfirmado" => "eduardo.contreras@grt.mx",
        "Ciudad" => "Toluca",
        "CodigoPostal" => "50000",
        "Referencia" => "COLJ901216",
        "Facturacion" => "Sí",
        "Telefono" => "7224449049",
        "idEstatusParticipante" => "1"
    ]
];
$conn->update($data);
//$data = ["table" => "Participantes",
//    "idValues" => [
//        "idField" => "IdParticipante",
//        "idValue" => "12",
//    ]
//];
//
//$conn->delete($data);

$data = [
    "table" => "Participantes",
    "fields" => "Email, PrimerNombre, SegundoNombre, ApellidoPaterno,
        ApellidoMaterno, EmailConfirmado, 
        Ciudad, CodigoPostal, Referencia, 
        Facturacion, Telefono, idEstatusParticipante",
    "where" => "IdParticipante = 1"
];

//$conn->select($data);


//-----------


/*
$data = ["table" => "Participantes",    
    "data" => [
        "Email" => "rocio.lopez@grt.mx",
        "PrimerNombre" => "Rocio",
        "SegundoNombre" => "",
        "ApellidoPaterno" => "Pérez",
        "ApellidoMaterno" => "López",
        "EmailConfirmado" => "rocio.lopez@grt.mx",
        "Ciudad" => "Toluca",
        "CodigoPostal" => "50100",
        "Referencia" => "RPS1232",
        "Facturacion" => "Sí",
        "Telefono" => "722340983",
        "IdEstatusParticipante" => "1",
        "IdEvento" => "1",
        "IdEmpleado" => "1",
        "Activo" => "S"
    ], 
    "pk" => "IdParticipante"
];

echo $cnn->insert($data);


$data = [
    "table" => "Participantes",
    "fields" => "*",
    "where" => ""
];
 echo $cnn->select($data);

 $data = ["table" => "Participantes",
    "idValues" => [
        "idField" => "IdParticipante",
        "idValue" => "1",
    ],
    "data" => [
        "Facturacion" => "Sí"        
    ]
];
echo $cnn->update($data);

$data = ["table" => "Participantes",
    "idValues" => [
        "idField" => "IdParticiante",
        "idValue" => "1",
    ]
];

echo $cnn->delete($data);*/
