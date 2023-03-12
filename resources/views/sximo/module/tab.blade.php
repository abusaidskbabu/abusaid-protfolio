<div class="toolbar-nav">
    <div class="btn-group">
         <a href="{{ url('sximo/module')}}" class="btn  btn-sm">  close </a>
        <a href="javascript:;"  onclick="SximoConfirmDelete('{{ url('sximo/module/destroy/'.$row->module_id)}}')" class="btn  btn-sm"> delete </a>
        @if(isset($type) && ( $type !='blank' or $type !='core'))
        <a href="javascript://ajax" onclick="SximoModal('{{ URL::to('sximo/module/build/'.$module_name)}}','Rebuild Module ')" class="btn  btn-sm">  rebuild </a>
        @endif
       
    




    </div>
</div>
<div class="p-2">
<ul class="nav nav-tabs">
  <li class="nav-item " ><a class="nav-link  @if($active == 'config') active @endif" href="{{ URL::to('sximo/module/config/'.$module_name)}}"> Info</a></li>
 
  @if(isset($type) && $type =='blank')

  @else
       <li class="nav-item active" >
        <a href="{{ URL::to('sximo/module/sql/'.$module_name)}}" class="nav-link  @if($active == 'sql') active @endif"> SQL</a></li>
        <li class="nav-item" >
        <a href="{{ URL::to('sximo/module/table/'.$module_name)}}" class="nav-link  @if($active == 'table') active @endif"> Table</a></li>
        <li class="nav-item"  >
        <a href="{{ URL::to('sximo/module/form/'.$module_name)}}" class="nav-link @if($active == 'form' or $active == 'subform') class="active" @endif"> Form</a></li>
        <li class="nav-item"  >
        <a href="{{ URL::to('sximo/module/sub/'.$module_name)}}" class="nav-link @if($active == 'sub'  ) active @endif"> Master Detail</a></li>
        @endif
        <li class="nav-item" >
        <a href="{{ URL::to('sximo/module/permission/'.$module_name)}}" class="nav-link  @if($active == 'permission') active @endif"> Permission</a></li>
        @if($type !='core' )
        <li class="nav-item" >
        <a href="{{ URL::to('sximo/module/source/'.$module_name)}}" class="nav-link  @if($active == 'source') active @endif"> Codes </a></li>
    @endif

  </li>

  
  
</ul>
</div>