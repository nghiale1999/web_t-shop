@extends('member.layout.app')

@section('content')
<div class="blog bg-light">
    <div class="container mt-5">
        
        <div class="row blog-nb">
            @foreach ($data as $bv)
            <div class="col-md-4">
                <a href="{{url('member/baiviet-chitiet/'.$bv->id)}}">
                    <img src="{{asset('upload/'.$bv->hinh)}}" style="width: 100%;height: 250px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius: 5px;">
                </a>
                <div class="discribe">
                     
                     <h4 class="mt-3"><a href="{{url('member/baiviet-chitiet/'.$bv->id)}}">{{$bv->tieude}}</a></h4>
                     <div class="post-meta align-items-center text-left clearfix mb-2">
                         <span>&nbsp;&nbsp;{{$bv->created_at}} </span>
                     </div>
                     
                     <p><a style="color: red;" href="{{url('member/baiviet-chitiet/'.$bv->id)}}">Read More</a></p>
                 </div> 
             </div>
            @endforeach
            
            
              
           

        </div>
        {{ $data->links() }}
    </div>
</div>


@endsection



   