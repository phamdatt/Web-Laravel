@php
use App\Models\Menu;
$menu1 = Menu::where(['status'=>1,'parentid'=>0])->orderBy('create_at','asc')->get();
@endphp 
<ul>
@foreach($menu1 as $mn1)
    @php 
    $menu2 = Menu::where(['status'=>1,'parentid'=>$mn1->id,'position'=>'mainmenu'])->orderBy('create_at','desc')->get();
    @endphp
    @if(count($menu2))
    <li>
        <a href="{{$mn1->link}}">{{$mn1->name}}</a>
               <ul class="sub-menu">
               @foreach($menu2 as $mn2)
                   <li><a href="{{$mn2->link}}">{{$mn2->name}}</a></li>
                   @endforeach
               </ul>
    </li>
    @else
            <li>
               <a href="{{$mn1->link}}">{{$mn1->name}}</a>
               
           </li>
    @endif
           @endforeach
       </ul>

