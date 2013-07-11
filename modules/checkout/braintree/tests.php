<?php

require_once 'lib/Braintree.php';

Braintree_Configuration::environment('production');
Braintree_Configuration::merchantId('4xz7szfhdwq9jxnq');
Braintree_Configuration::publicKey('jb2xwjw3kc522hzv');
Braintree_Configuration::privateKey('5xg5j9yycwspzhhj');


// BELOW FINDS AND DISPLAYS THE IDS FOR TRANSACTIONS THAT HAVE BEEN SUBMITTED FOR SETTLEMENT
//$collection = Braintree_Transaction::search(array(
//  Braintree_TransactionSearch::status()->in(
//    array(
//      Braintree_Transaction::AUTHORIZED,
//    )
//  )
//));
//
//?><pre><? 
//foreach($collection as $key => $value) {
//    print "$key => $value\n";
//}
//
// ?></pre><?


//BELOW FINDS AND DISPLAYS THE IDS FOR TRANSACTIONS THAT ARE A CERTAIN DOLLAR AMOUNT
//$collection = Braintree_Transaction::search(array(
//  Braintree_TransactionSearch::amount()->between('58.99', '58.99')
//));
//
//?><pre><? 
//foreach($collection as $key => $value) {
//    print "$key => $value\n";
//}
//
// ?></pre><?

//BELOW DISPLAYS INFORMATION FOR A CERTAIN ID
//$transaction = Braintree_Transaction::find('kdj4v2');
//
//?><pre><? 
// print_r($transaction);
//
// ?></pre><?

//BELOW FINDS AND DISPLAYS THE IDS FOR TRANSACTIONS THAT STATUS REFUNDED
//$collection = Braintree_Transaction::search(array(
//  Braintree_TransactionSearch::refund()->is(True)
//));
//
//?><pre><? 
//foreach($collection as $key => $value) {
//    print "$key => $value\n";
//}
//
// ?></pre><?


// BELOW REFUNDS AN ORDER
$result = Braintree_Transaction::refund("kdj4v2", "52.50");
 	if ($result->success) {
 	  ?><pre><? print_r($result); ?></pre><?
 	} else {
 	  print_r($result->errors);
 	}


// BELOW SUBMITS FOR SETTLEMENT
//$collection = Braintree_Transaction::search(array(
//  Braintree_TransactionSearch::status()->in(
//	array(
//	  Braintree_Transaction::AUTHORIZED,
//	)
//  )
//));
//for($i=0; $i<count($collection->_ids); $i++) {
//  $result = Braintree_Transaction::submitForSettlement($collection->_ids[$i]);
//  if ($result->success) {
//	echo "Massive Success! <br />";
//	$total += $collection->_ids[$i]->amount;
//	echo $total . "<br />";
//  } else {
//	print_r($submitResult->errors);
//  }
//}

?>

