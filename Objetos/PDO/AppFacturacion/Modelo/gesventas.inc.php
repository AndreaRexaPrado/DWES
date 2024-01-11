<?php
    //Constantes que se usaran en toda la app
    //Datos para la conexion
    DEFINE("HOST","localhost:3308");
    DEFINE("DBNAME","gesventa");
    DEFINE("CHARSET","utf8");
    DEFINE("USER","root");
    DEFINE("PWD","1234");
    DEFINE("N","\n");
    DEFINE("MAXUDS",10);
    //Operaciones para el filtrado segun el campo
    DEFINE("OPER",array("cod"=>"=","pvp"=>"<=","existencias"=>">="));
    //Idiomas
    DEFINE("IDIOMAS",array("ES"=>"Español","ENG"=>"English","FR"=>"Français","DE"=>"Deutsch"));
    //Traducciones de todos los mensajes
    DEFINE("LANG",array("ES"=>array("tit1"=>"BIENVENIDO A LA TIENDA",
                                    "legUsr"=>"Informacion del usuario:",
                                    "msgIdent"=> "Identifícate para acceder a todas las funcionalidades",
                                    "legFil"=>"Filtros",
                                    "botFil"=>"Buscar",
                                    "legContPri"=>"Contenido principal:",
                                    "titulos"=>array("cod"=>"Codigo","nom_prod"=>"Nombre producto","pvp"=>"Precio venta publico","prov"=>"Codigo provedor","imagen"=>"Imagen","existencias"=>"Stock"),
                                    "user"=>"Usuario",
                                    "pass"=>"Contraseña",
                                    "userNoVal"=>"ERROR USER NO VALIDO O NO EXISTE",
                                    "trad"=>"Traducir",
                                    "seleIdio"=>"Selecciona un idioma: ",
                                    "btnCarr"=>"Carrito",
                                    "msgCarritoVacio"=>"No se han encontrado productos en el carrito",
                                    "continuar"=>"Atras",
                                    "msgProdVacio"=>"No se han encontrado productos con los filtros introducidos",
                                    "btnAniadir"=>"Añadir",
                                    "titulosCarrito"=>array("cod"=>"Codigo","nom_prod"=>"Nombre producto","pvp"=>"Precio venta publico","imagen"=>"Imagen","existencias"=>"Stock"),
                                    "uds"=>"Unidades",
                                    "subtotal"=>"Subtotal",
                                    "btnTramitar"=>"Tramitar pedido",
                                    "total"=>"Total pedido"),

                        "ENG"=>array("tit1"=>"WELCOME TO THE STORE",
                                    "legUsr"=>"User information:",
                                    "msgIdent"=> "Sign in to access all features",
                                    "legFil"=>"Filters",
                                    "botFil"=>"Search",
                                    "legContPri"=>"Main content:",
                                    "titulos"=>array("cod"=>"Code","nom_prod"=>"Product name","pvp"=>"Retail price","prov"=>"Provider code","imagen"=>"Image","existencias"=>"Stock"),
                                    "user"=>"User",
                                    "pass"=>"Password",
                                    "userNoVal"=>"ERROR USER INVALID OR DOES NOT EXIST",
                                    "trad"=>"Translate",
                                    "seleIdio"=>"Select a language: ",
                                    "btnCarr"=>"Trolley",
                                    "msgCarritoVacio"=>"No products found in the cart",
                                    "continuar"=>"Back",
                                    "msgProdVacio"=>"No products have been found with the filters entered",
                                    "btnAniadir"=>"Add",
                                    "titulosCarrito"=>array("cod"=>"Code","nom_prod"=>"Product name","pvp"=>"Retail price","imagen"=>"Image","existencias"=>"Stock"),
                                    "uds"=>"Units",
                                    "subtotal"=>"Subtotal",
                                    "btnTramitar"=>"Checkout",
                                    "total"=>"Total order"),

                        "FR"=>array("tit1"=>"BIENVENUE AU MAGASIN",
                                    "legUsr"=>"Informations de l'utilisateur:",
                                    "msgIdent"=> "Connectez-vous pour accéder à toutes les fonctionnalités",
                                    "legFil"=>"Filtres",
                                    "botFil"=>"Chercher",
                                    "legContPri"=>"Contenu principal::",
                                    "titulos"=>array("cod"=>"Code","nom_prod"=>"Nom du produit","pvp"=>"Prix ​​en détail","prov"=>"Code fournisseur","imagen"=>"Image","existencias"=>"Stock"),
                                    "user"=>"Utilisateur",
                                    "pass"=>"Mot de passe",
                                    "userNoVal"=>"ERREUR UTILISATEUR INVALIDE OU N'EXISTE PAS",
                                    "trad"=>"Traduire",
                                    "seleIdio"=>"Sélectionnez une langue: ",
                                    "btnCarr"=>"Chariot",
                                    "msgCarritoVacio"=>"Aucun produit trouvé dans le panier",
                                    "continuar"=>"Derrière",
                                    "msgProdVacio"=>"Aucun produit n'a été trouvé avec les filtres saisis",
                                    "btnAniadir"=>"Ajouter",
                                    "titulosCarrito"=>array("cod"=>"Code","nom_prod"=>"Nom du produit","pvp"=>"Prix ​​en détail","imagen"=>"Image","existencias"=>"Stock"),
                                    "uds"=>"Unités",
                                    "subtotal"=>"Subtotal",
                                    "btnTramitar"=>"Vérifier",
                                    "total"=>"Commande totale"),

                        "DE"=>array("tit1"=>"WILLKOMMEN IM SHOP",
                                    "legUsr"=>"Nutzerinformation:",
                                    "msgIdent"=> "Melden Sie sich an, um auf alle Funktionen zuzugreifen",
                                    "legFil"=>"Filter",
                                    "botFil"=>"Suche",
                                    "legContPri"=>"Hauptinhalt:",
                                    "titulos"=>array("cod"=>"Code","nom_prod"=>"Produktname","pvp"=>"Endverbraucherpreis","prov"=>"Lieferantencode","imagen"=>"Bild","existencias"=>"Aktie"),
                                    "user"=>"Benutzer",
                                    "pass"=>"Passwort",
                                    "userNoVal"=>"FEHLER BENUTZER UNGÜLTIG ODER NICHT EXISTIERT",
                                    "trad"=>"Übersetzen",
                                    "seleIdio"=>"Wähle eine Sprache: ",
                                    "btnCarr"=>"Wagen",
                                    "msgCarritoVacio"=>"Im Warenkorb wurden keine Produkte gefunden",
                                    "continuar"=>"Zurück",
                                    "msgProdVacio"=>"Mit den eingegebenen Filtern wurden keine Produkte gefunden",
                                    "btnAniadir"=>"Hinzufügen",
                                    "titulosCarrito"=>array("cod"=>"Code","nom_prod"=>"Produktname","pvp"=>"Endverbraucherpreis","imagen"=>"Bild","existencias"=>"Aktie"),
                                    "uds"=>"Unité",
                                    "subtotal"=>"Zwischensumme",
                                    "btnTramitar"=>"Kasse",
                                    "total"=>"Gesamtbestellung")                
                        ));

    
   
