@extends('layouts.app')
@section('content')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
</head>
 <div class='option'  align="center">
        <form method="post" action="" id="updateClass" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p><input type="hidden" class="id" value="" name="id"></p>
            <label>Заголовок<input type="text" name="title_edit" class="form-control"></label>
            <label>Дата новости<input type="date" name="news_date_edit" class="form-control"></label>           
            <label>Текст новости<textarea class="form-control" rows='23' name="content_edit"></textarea></label>
            <label>Изображение<input type="file" name="photo_edit" class="form-control" style="display: none;"></label>
            <input type="submit"  value="Пересохранить" class="btn btn-primary">
        </form>
        <p><input type="button" class="subm no btn btn-primary" value="Отмена"></p>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.no').click(function () {
            $('.option').fadeOut('slow');
        });
        $('.showForm').click(function (e) {
            $('.option').fadeIn('slow');
            $('.option').css({
                'top': e.pageY,
                'left': e.pageX
            });
            $('input.id').val($(this).attr('id'));
            $('input[name="title_edit"]').val($(this).children('td.title').text());
            $('input[name="news_date_edit"]').val($(this).children('td.date').text());
            $('textarea[name="content_edit"]').val($(this).children('td.content').text());
            $('input[name="photo_edit"]').val($(this).children('td.photo').text());
        });
    });
</script>

                @foreach($event->comments as $comment)
                <div id="comments" class="comments-area">
                    <div class="comment_list comment-list">
                        <div class="comment byuser comment-author-adminschool bypostauthor even thread-even depth-1" id="comment-7">
                            <div class="avatar clear">
                                <div class="avatar-image pull-left">
                                    <img alt=''
                                         src='http://2.gravatar.com/avatar/5a338e41aca0e2e1d4b43bae120eec90?s=50&#038;d=mm&#038;r=g'
                                         srcset='http://2.gravatar.com/avatar/5a338e41aca0e2e1d4b43bae120eec90?s=100&#038;d=mm&#038;r=g 2x'
                                         class='avatar avatar-50 photo' height='50' width='50'/>
                                </div>
                                <div class="avatar-body pull-left">
                                    <h6 class="avatar-name">{{$comment->user->name}} {{$comment->user->surname}}</h6>
                                    <p class="avatar-time">Дата публикации: {{$comment->created_at->format('d.m.Y в H.m')}}</p>
                                </div>
                            </div>
                            <div class="copy clear">
                                <p>{{$comment->comment}}</p>
                            </div>
                            @if (Auth::user() || Auth::user() == $comment->user)
                            <a style="float:right" onclick="return confirmDeleteComment();" href="{{route('deleteComment',$comment->id)}}" class="more-link button">Удалить комментарий</a>
                            @endif
                        </div><!-- #comment-## -->
                    </div><!-- .comment-list -->
                    @endforeach

                    @if (!Auth::guest())
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title">Оставить комментарий</h3>
                        <form action="{{route('commvent')}}" method="post" id="commentform" class="comment-form" novalidate>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="event_id" value="{{$event->id}}">
                                {{--<p class="comment-notes">
                            <span id="email-notes">Ваш адрес электронной почты не будет опубликован.</span> Обязательные для заполнения поля отмечены <span class="required">*</span>
                                </p>--}}
                            <p class="comment-form-comment">
                                <label for="comment">Комментарий</label>
                                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
                            </p>                                
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Опубликовать комментарий"/>
                                <input type='hidden' name='comment_post_ID' value='{{$event->id}}' id='comment_post_ID'/>
                                <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>
                            </p>
                            {{ csrf_field() }}
                        </form>
                    </div><!-- #respond -->
                    @endif                      
                </div><!-- #comments -->
            </main><!-- #main -->        
        </div><!-- #primary -->                
    </div>
	
	<script>
	
	$(document).ready(function($){
		$('#commentform').on('click','#submit',function(e){
			e.preventDefault();
			var $comParent= $(this);
			var action = $comParent.find('.submit').val();
			$('.wrap_result').
			css('color','green').
			text('Сохранение комментарияэ').
			fadeIn(500,function(){
				$.ajax({
					url:$('#commentform').attr('action'),
					data:$comParent.serialize() + '&action=' + action,
					headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					type:'POST',
					dataType:'JSON',
					success:function(html){
						
					},
					error:function(){
						
					}
				});
			});
		});
	});
	</script>
>

public function store(Request $request) {
        echo json_encode(['hello'=>'world']);
    }	
	
	
	public function storee(Request $request) {
        $data=$request->all;
		 $data['event_id'] = $request->event_id;
		 $data['user_id'] = $request->user_id;
		  $data['comment'] = $request->comment;
		   
		   $comment = new Comment($data);
		   if($user){
			   $comment->user_id = $user->id;
		   }
		   $event=Event::find($data['event_id']);
		   $event->comments()->save($comment);
    }	
@endsection