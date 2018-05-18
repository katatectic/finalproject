@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="contact_area">
                    <div >
                        <form enctype="multipart/form-data" action="{{route('addSlider')}}" class="contact_form" method="POST" >
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Название</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" placeholder="Название слайдера" name="title" value="{{ old('title') }}"  autofocus>
                                    <span style="color:red">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-md-4 control-label">Фотография</label>
                                <div class="col-md-6">
                                    <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}"  autofocus>
                                    <span style="color:red">{{ $errors->first('photo') }}</span>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Краткое описание</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="description" rows='23' name="description" placeholder="Краткое описание" autofocus>{{ old('description') }}</textarea>
                                    <span style="color:red">{{ $errors->first('description') }}</span>
                                </div>
                            </div>
                            <input type="submit" value="Отправьте вашу заявку">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>