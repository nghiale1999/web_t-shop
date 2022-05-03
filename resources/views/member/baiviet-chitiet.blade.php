@extends('member.layout.app')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{$data->tieude}}</h2>
    <img style="width: 100%; height: 550px;" src="{{asset('upload/'.$data->hinh)}}">
   
    
    <p class="mt-5">{{$data->noidung}}</p>
    <div class="pt-5">
        <h3 class="mb-5">Comments</h3>
        <ul class="comment-list">
            @foreach ($comment as $cm)
                @if ($cm->id_bl == 0)
                <li class="comment">
                    <div class="vcard">
                        <img src="{{asset('upload/'.$cm->anh_users)}}">
                    </div>
                    <div class="comment-body">
                        <h3>{{$cm->ten_users}}</h3>
                        <div class="meta">{{$cm->created_at}}</div>
                        <p>{{$cm->noidung}}</p>
                        <a href="#form" id="{{$cm->id}}" class="reply rounded">Reply</a>
                    </div>
                </li>
                @endif
                @foreach ($comment as $cmc)
                    @if ($cm->id == $cmc->id_bl)
                        <li class="comment ml-5">
                            <div class="vcard">
                                <img src="{{asset('upload/'.$cm->anh_users)}}">
                            </div>
                            <div class="comment-body">
                                <h3>{{$cm->ten_users}}</h3>
                                <div class="meta">{{$cm->created_at}}</div>
                                <p>{{$cm->noidung}}</p>
                            </div>
                        </li>
                    @endif
                @endforeach
            @endforeach
        
            
            
            
        </ul>



        <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form action="" id="form" class="p-5 bg-light" method="POST">
                @csrf
                <input type="hidden" class="cmt_con" name="id_cmt">
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="comment" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn-comment">
                </div>
            </form>
        </div>
        
@endsection
@section('script')

<script>

		$(document).ready(function(){
            $('a.reply').click(function () {              
                var id_cmt = $(this).attr('id');
                          
               $('input.cmt_con').val(id_cmt);
            })

		})

</script>

@endsection