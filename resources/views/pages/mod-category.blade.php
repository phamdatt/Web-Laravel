
<?php
use App\Models\Category;
?>
@php
$listcategory1 = Category::where(['status'=>1,'parentid'=>0])->orderBy('orders','desc')->get();
@endphp
@if(count($listcategory1))
<ul>
@foreach($listcategory1 as $cat1)
    @php 
    $listcategory2 = Category::where(['status'=>1,'parentid'=>$cat1->id])->orderBy('orders','desc')->get();

    @endphp
        <li>
            <a href="{{$cat1->slug}}">{{$cat1->name}}</a>
            @if(count($listcategory2))
            <ul class="sub-menu">
            @foreach($listcategory2 as $cat2)
                <li><a href="{{$cat2->slug}}">{{$cat2->name}}</a></li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
    @endif
