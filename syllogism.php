<style>
body{
background-color: #333;
color: #ccc;
padding: 30px;
}

#tabelli{
	width: 60%;
	text-align: center;

}
#tabelli td{
	border: 1px solid #ccc;
	padding: 10px;
}

</style>
<body>
<?php

// alterar p/ mudar idioma
// SE FOR MODIFICAR, APENAS TRADUZA; NÃO TROQUE AS STRINGS UMA PELA OUTRA, VAI DAR RUIM

$todo = "Todo"; 	 // Translate this to "All"
$algum = "Algum"; 	 // Translate this to "Some"
$nenhum  = "Nenhum"; // Translate this to "No"
$e = "é"; 			 // Translate this to "is"
$n_e = "não é"; 	 // Translate this to "is not"

$P = "P"; // termo maior (major term)
$M = "M"; // termo médio (middle term)
$S = "S"; // termo menor (minor term)

# =================================================================

function modos($n=3, $forma = array('A','E','I','O')) { // gera todos os modos possiveis
    if ($n > 0) {
      $tmp_set = array();
      $res = modos($n-1, $forma);
      foreach ($res as $ce) {
          foreach ($forma as $e) {
             array_push($tmp_set, $ce . $e);
          }
       }
       return $tmp_set;
    }else {
        return array('');
    }
	// o retorno é um array com todas as combinações entre A, E, I e O com 3 caracteres (64 combinações)
}

function check($modo){ // verifica se o modo das proposiçoes é A, E, I ou O e se tem 3 proposiçoes
	//desnecessário se não for receber dados do usuário
	$forma = array('A','E','I','O');
	if(strlen($modo) !== 3){
		die("Erro no modo do silogismo.");
	}
	for($i=0;$i<strlen($modo);$i++){
		if(!in_array($modo[$i], $forma)){
			die("Modo de silogismo não identificado.");
		}
	}
}

function figura1($modo){ 	//por exemplo AEE
	global $todo;
	global $algum;
	global $nenhum;
	global $e;
	global $n_e;
	global $M;
	global $P;
	global $S;

	# Primeira figura
	# 
	# M - P
	# S - M
	# S - P
	
	check($modo);
	
	$silog = array();

	switch($modo[0]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$M." ".$e." ".$P);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$M." ".$e." ".$P);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$M." ".$e." ".$P);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$M." ".$n_e." ".$P);
			break;
	}
	
	
	// =======
	
		switch($modo[1]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$S." ".$e." ".$M);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$S." ".$e." ".$M);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$S." ".$e." ".$M);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$S." ".$n_e." ".$M);
			break;
	}
	
	
	// ========
	
		switch($modo[2]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$S." ".$e." ".$P);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$S." ".$e." ".$P);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$S." ".$e." ".$P);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$S." ".$n_e." ".$P);
			break;
	}

	return $silog;
}

function figura2($modo){ 	//por exemplo AEE
	global $todo;
	global $algum;
	global $nenhum;
	global $e;
	global $n_e;
	global $M;
	global $P;
	global $S;

	# Primeira figura
	# 
	# P - M
	# S - M
	# S - P
	
	check($modo);
	
	$silog = array();

	switch($modo[0]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$P." ".$e." ".$M);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$P." ".$e." ".$M);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$P." ".$e." ".$M);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$P." ".$n_e." ".$M);
			break;
	}
	
	
	// =======
	
		switch($modo[1]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$S." ".$e." ".$M);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$S." ".$e." ".$M);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$S." ".$e." ".$M);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$S." ".$n_e." ".$M);
			break;
	}
	
	
	// ========
	
		switch($modo[2]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$S." ".$e." ".$P);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$S." ".$e." ".$P);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$S." ".$e." ".$P);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$S." ".$n_e." ".$P);
			break;
	}

	return $silog;
}

function figura3($modo){ 	//por exemplo AEE
	global $todo;
	global $algum;
	global $nenhum;
	global $e;
	global $n_e;
	global $M;
	global $P;
	global $S;

	# Primeira figura
	# 
	# M - P
	# M - S
	# S - P
	
	check($modo);
	
	$silog = array();

	switch($modo[0]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$M." ".$e." ".$P);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$M." ".$e." ".$P);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$M." ".$e." ".$P);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$M." ".$n_e." ".$P);
			break;
	}
	
	
	// =======
	
		switch($modo[1]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$M." ".$e." ".$S);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$M." ".$e." ".$S);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$M." ".$e." ".$S);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$M." ".$n_e." ".$S);
			break;
	}
	
	
	// ========
	
		switch($modo[2]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$S." ".$e." ".$P);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$S." ".$e." ".$P);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$S." ".$e." ".$P);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$S." ".$n_e." ".$P);
			break;
	}

	return $silog;
}

function figura4($modo){ 	//por exemplo AEE
	global $todo;
	global $algum;
	global $nenhum;
	global $e;
	global $n_e;
	global $M;
	global $P;
	global $S;

	# Primeira figura
	# 
	# P - M
	# M - S
	# S - P
	
	check($modo);
	
	$silog = array();

	switch($modo[0]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$P." ".$e." ".$M);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$P." ".$e." ".$M);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$P." ".$e." ".$M);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$P." ".$n_e." ".$M);
			break;
	}
	
	
	// =======
	
		switch($modo[1]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$M." ".$e." ".$S);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$M." ".$e." ".$S);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$M." ".$e." ".$S);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$M." ".$n_e." ".$S);
			break;
	}
	
	
	// ========
	
		switch($modo[2]){
		case "A": // Todo A é B
			array_push($silog, $todo." ".$S." ".$e." ".$P);
			break;
		case "E": // Nenhum A é B
			array_push($silog, $nenhum." ".$S." ".$e." ".$P);
			break;
		case "I": // Algum A é B
			array_push($silog, $algum." ".$S." ".$e." ".$P);
			break;
		case "O": // Algum A não é B
			array_push($silog, $algum." ".$S." ".$n_e." ".$P);
			break;
	}

	return $silog;
}

function silogismo($modoFigura){
	global $todo;
	global $algum;
	global $nenhum;
	global $e;
	global $n_e;

	$modo = substr($modoFigura, 0, 3);
	$figura = substr($modoFigura, -1);
	
	# ========= check ========
	$figs = array("1", "2", "3", "4");
	if(strlen($modoFigura) !== 5){ // o tamanho do $modoFigura ".$e." sempre 5, pq ".$e." da forma EAE-2, por exemplo
		die("Erro no modo ou figura");
	}
	check($modo); // verifica se o modo ".$e." tipo EAE, AAA, IIA, etc. (3 chars)
	if(!in_array($figura, $figs)){ // verifica se a figura ".$e." 1, 2, 3 ou 4
		die("Erro na figura");
	}
	# =========================
	
	switch($figura){ //verifica a figura do silogismo e salva o resultado pra retornar
		case "1":
			$ret = figura1($modo);
			break;
		case "2":
			$ret = figura2($modo);
			break;
		case "3":
			$ret = figura3($modo);
			break;
		case "4":
			$ret = figura4($modo);
			break;
	}
	$arg = "";
	foreach($ret as $prop){ //transforma o resultado (que é um array c/ 3 proposiçoes em string)
		$arg .= $prop."<br>";
	}
	return $arg; // string contendo premissa maior <br> premissa menor <br> conclusao
}

echo "<table id='tabelli'>  
  <tr>
    <th>Primeira figura</th>
    <th>Segunda figura</th> 
    <th>Terceira figura</th>
	<th>Quarta figura</th>
  </tr>";

foreach(modos() as $tipo){ // gera a tabela;  como são 64 modos e 4 figuras, o total são 256 silogismos 
	echo "<tr>";
	for($i=1;$i<=4;$i++){
		echo "<td>".$tipo."-".$i."<br>".silogismo($tipo."-".$i)."</td>";
	}
	echo "</tr>";
}
	


echo "</table>";

?>

</body>
