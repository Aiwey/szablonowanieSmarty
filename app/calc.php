<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów

function getParams(&$x,&$typ,&$procent,&$kwota){
	$x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
	$typ = isset($_REQUEST ['typPodatku']) ? $_REQUEST ['typPodatku'] : null;
	$procent = isset($_REQUEST ['procent']) ? $_REQUEST ['procent'] : null;
	$kwota = $x;
	
}


//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$x,&$typ,&$procent,&$kwota,&$messages){
// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($x) && isset($typ) && isset($procent))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
	return false;
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $x == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $typ== "") {
	$messages [] = 'Nie wybrano rodzaju kalkulacji';
}

if (count ($messages ) !=0) return false;

	// sprawdzenie, czy $x i $procent są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Kwota wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $procent )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	
	if (count ( $messages ) != 0) return false;
	else return true;

}

function process(&$x,&$typ,&$procent,&$kwota,&$messages,&$result,&$kwotaVat){
	global $role;

	
	//konwersja parametrów na int
	$x = intval($x);
	$procent = intval($procent);
	
	//wykonanie operacji
	switch ($typ) {
		case 'brutto-netto' :
			$result = round(($x / (1+$procent/100)),2);
			$kwotaVat = round(($x-$result),2);
			break;
		case 'netto-brutto' :
			$result = round(($x*(1+$procent/100)),2);
			$kwotaVat = round(($result - $x),2);
			break;
		default :
			$result = $x *$procent;
			break;
	}
}
//definicja zmiennych kontrolera
$x = null;
$typ = null;
$procent = null;
$messages = array();
$result = null;
$kwota = null;
$kwotaVat = null;
//pobierz parametry i wykonaj zadanie jeżeli wszystko wporzonsiu
getParams($x,$typ,$procent,$kwota);
if(validate($x,$typ,$procent,$kwota,$messages) ) { // jeżeli brak błędów to
	process($x,$typ,$procent,$kwota,$messages,$result,$kwotaVat);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne 
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';