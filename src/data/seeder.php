<?php

$users = [
  ['id' => 1, 'name' => 'Petras', 'email' => 'petras@petras.com', 'pass' => md5('123')],
  ['id' => 2, 'name' => 'Ona', 'email' => 'ona@ona.com', 'pass' => md5('321')],
  ['id' => 3, 'name' => 'Jonas', 'email' => 'jonas@jonas.com', 'pass' => md5('456')],  ['id' => 4, 'name' => 'Kristina', 'email' => 'crislayn@yahoo.com', 'pass' => md5('322')]
];

file_put_contents(__DIR__.'/users.json', json_encode($users));

$accounts =[
  ["id"=>1,"Nr"=>"LT389831264841950509","vardas"=>"Kristina","pavarde"=>"Leonaviciute","AK"=>"48303221110","likutis"=>220], ["id"=>2,"Nr"=>"LT671790387303538382","vardas"=>"Jonas","pavarde"=>"Kelmickis","AK"=>"38303220111","likutis"=>100],  ["id"=>3,"Nr"=>"LT880122196052850748","vardas"=>"Mantas","pavarde"=>"Stanauskas","AK"=>"38803031234","likutis"=>90], ["id"=>4,"Nr"=>"LT732214032914362024","vardas"=>"Jolanta","pavarde"=>"Linkyte","AK"=>"39007171147","likutis"=>50], ["id"=>5,"Nr"=>"LT204256723410725009","vardas"=>"Petras","pavarde"=>"Stanauskas","AK"=> "36406028344","likutis"=>50]
]; 


file_put_contents(__DIR__.'/accounts.json', json_encode($accounts));