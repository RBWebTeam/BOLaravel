@extends('include.master')
 @section('content')
 <style type="text/css">
 .main-header{
 	position: relative;
    height: 48px;
    background: #009ee3;
    left: 0;
    right: 0;
 }
 .header-middle{
 	float: left;
    width: 80%;
    color: #fff;
    margin-top: 4px;
    padding: 8px 0 0 0;
    text-align: center;
    font-size: 18px;
    }
 </style>
 <div class="container-fluid white-bg">
 <header class="main-header">
        <div class="header-middle text-center" style="width:100%;">HEALTH CHECK-UP PLAN</div>
    </header>
   @if(isset($respon))
   @foreach($respon as $val)

   <table>
   	<tr>
   		<td>
   			{{$val->Name}}
   			<?php echo"<br/>";?>
   			<?php echo"<br/>";?>
   			<?php foreach ($val->ParamDetails as $key => $value) {
   				echo $value."<br/>";
   			} ?>
   	
   		
   		</td>
   	</tr>
   </table>
 @endforeach
   @endif
</div>

  @endsection