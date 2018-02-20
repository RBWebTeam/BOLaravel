@extends('include.master')
@section('content')
 




 <?php 
  $arrayCategories = array();
 foreach ($pro as $key => $row) {
 
 
  $arrayCategories[$row->id] = array("parent_id" => $row->parent_id, "name" =>                       
  $row->name,"id" => $row->id); 


    }

 
 function createTreeView($array, $currentParent, $currLevel = 0, $prevLevel = -1) {
 echo " <ul class='menu'> "; 
foreach ($array as $categoryId => $category) {

if ($currentParent == $category['parent_id']) {                       
    if ($currLevel > $prevLevel) echo " <ul class='sub-menu'> "; 

    if ($currLevel == $prevLevel) echo " </li> ";

    echo '<li> <label  >'.$category['name'].'</label> ';

    if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

    $currLevel++; 

    createTreeView ($array, $categoryId, $currLevel, $prevLevel);

    $currLevel--;               
    }   

}

if ($currLevel == $prevLevel) echo " </li>  </ul> ";


 echo "</ul> "; 

}   




?>
 
<?php
if(count($pro)!=0){
 
createTreeView($arrayCategories, 0);  
 
} ?>
 

@endsection




 
 </style>