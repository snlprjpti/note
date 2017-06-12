@extends('main')
@section('content')
    
            <h1>NOTES</h1>
                        @forelse($notes->chunk(10) as $chunk)
                            @foreach($chunk as $note)

                                <div class="col-md-3"><br>
                                        <a href="">
                                                 <iframe src="{{url('files')}}" height="50%" width="50%" ></iframe>                                 
                                                  <h5><b>{{$note->name}}</b>
                                            </h5>
                                        </a>
                                            {{$note->description}}<br>
                                            <button> <a href="files/{{$note->file}}" download="{{$note->file}}"> <i class="glyphicon glyphicon-download-alt"></i></button> </a>  <br><br>
                                  

                                </div>
                                @endforeach
                               
                                @empty
                                <h3>No Notes</h3>
                            @endforelse                
    

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



