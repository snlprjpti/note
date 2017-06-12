@extends('main')

@section('content')
    <div class="row">
    
                <strong>Select Faculty: </strong>
                
                     <h3>Faculty:  {{$faculty->name}}</h3> 
                 
                        <h2>
                           <a href="{{route('front.subject',$subject->id)}}">{{$subject->name}}</a>
 
                        </h2>  
                        </div>

@endsection
    
@section('sidebarfaculty')
    
       @foreach($faculties as $faculty)
    <ul>
        <li> 
        <a href="{{route('front.faculty',$faculty->id)}}">{{$faculty->name}}</a>
        </li>
        @endforeach
    </ul>
    
    
@endsection
@section('sidebarsubject')
    
    @foreach($subjects as $subject)
    <ul>
        <li> 
        <a href="{{route('front.subject',$subject->id)}}">{{$subject->name}}</a>
        </li>
        @endforeach
    </ul>
    
@endsection




