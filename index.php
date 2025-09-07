<?php 

$counter = 1;
$symbols = ['A', 'B', 'C'];
$spinsArray = [];
$total = 0;

// Iterate 10 spins
while ($counter <= 10 and $total < 500) {

  $spin = '';

  // Iterate symbol list to build a "spin"
  for ($i = 0; $i < 3; $i++) {

    // Pulls random array key from $symbols
    $key = array_rand($symbols, 1);

    // Assign array key to value
    $value = match ($key) {
      0 => 'A',
      1 => 'B',
      2 => 'C',
      default => ''
    };

    $spin .= $value;
  }

  $roundTotal = match ($spin) {
    // 3 Identical symbols
    'AAA', 'BBB', 'CCC' => 100,
    // 2 Identical Symbols and one different
    'AAB', 'ABA', 'BAA',
    'ABB', 'BBA', 'BAB',
    'BCC', 'CBC', 'CCB',
    'ACC', 'CAC', 'CCA' => 50,
    // No points otherwise
    default => 0
  };

  $total = $total + $roundTotal;
  $spinsArray[] = "$spin Payoff $roundTotal";

  $counter++;
}

foreach ($spinsArray as $value) {
  echo $value . "\n";
}

echo "Game over. Total winnings: $$total\n";
?>