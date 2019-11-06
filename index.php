<?php

define( 'INCLUDE_DIR', dirname( __FILE__ ) . '/src/' );

$rules = array(
    'toft/index'=> "/toft",
    'home/index'=> "/"
);

$uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
$uri = '/' . trim( str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/' );
$uri = urldecode( $uri );


foreach ( $rules as $action => $rule ) {
    if ( preg_match( '~^'.$rule.'$~i', $uri, $params ) ) {
        /* now you know the action and parameters so you can 
         * include appropriate template file ( or proceed in some other way )
         */
        
        include( INCLUDE_DIR . $action . '.php' );

        // exit to avoid the 404 message 
        exit();
    }
}


include( INCLUDE_DIR . '404.php' );
?>