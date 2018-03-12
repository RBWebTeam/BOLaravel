<div class="scrolling">
    <nav id="sidebar" style="display:none;">
<?php 
 use App\Http\Controllers\InitialController; $cl=new InitialController();
$arrayCategories = array();
    foreach ($user_right_group as $key => $row) {
       $arrayCategories[$row->id] = array("parent_id" => $row->parent_id, "name" =>                       
         $row->name,"id" => $row->id);   
    } ?>
<ul class="nav nav-list" style="overflow: hidden; width: auto; height: 95%;">                       
<?php foreach ($user_right_group as $key => $current) { 
        $second_level=$cl->chield_id($current->id,$current->menu_group_id);  ?>
                     
                        <li><label class="tree-toggle nav-header">
                        @if($current->url_link=="#")
                        <a href="#"><?php echo $current->name; ?></a>
                        @else
                             <a href="{{url('')}}/{{$current->url_link}}"><?php echo $current->name; ?> &nbsp;</a>
                        @endif


                        </label>
                           
                            <ul class="nav-list tree">
                            <?php foreach($second_level as $key =>$second_row ){?>  
                              
                                <li><label class="tree-toggle nav-header"> @if($second_row->url_link=="#")<a href="#" ><?php  echo  $second_row->name; ?></a>
                                 @else
                                 <a href="{{url('')}}/{{$second_row->url_link}}" ><?php  echo  $second_row->name; ?></a>
                                @endif
                                </label>
                                  
                                     <ul class="nav-list tree">
                                   <?php 
                                     $third_level=$cl->chield_id($second_row->id,$second_row->menu_group_id); 
                                  
                                   foreach($third_level as $key =>$third_row ){?>    
                                        <li>@if($second_row->url_link=="#")<a href="#"><?php  echo  $third_row->name; ?></a> @else
                                             <a href="{{url('')}}/{{$third_row->url_link}}"><?php  echo  $third_row->name; ?></a>

                                          @endif


                                        </li>
                      
                                      <?php } ?>
                                       </ul>
                                </li>

                           
                            <?php } ?>
                             </ul>
                        </li>

 <?php    }     ?>
                
    </ul>
     </nav>
     </div>
<script type="text/javascript" src="{{url('javascripts/jquery.min.js')}}"></script>
 <script type='text/javascript'>
        
        $(document).ready(function() {
        
            $('.tree-toggle').click(function () {
    $(this).parent().children('ul.tree').toggle(200);
});
$(function(){
$('.tree-toggle').parent().children('ul.tree').toggle(200);
})
        
        });
        
        </script>