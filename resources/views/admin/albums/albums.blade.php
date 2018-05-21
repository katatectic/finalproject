@extends('layouts.admin')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Альбомы</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Всего альбомов: {{$albumsCount}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('album.create')}}" class="btn btn-success">Добавить альбом</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				
                <tr>
                  <th>Название</th>
                  <th>Краткое описание</th>
                  <th>Изображение</th>
                </tr>
                </thead>
                <tbody>
				 @foreach($albums as $album)
                <tr>
                  <td>{{$album->name}}</td>
                  <td>{{$album->description}}</td>
                  <td>
                    <img src="{{asset('images/albums/'.$album->cover_image)}}" alt="" width="100">
                  </td>
                  <td>
					<a href="{{route('album.edit', ['id' => $album->id ] ) }}" class="fa fa-pencil"></a>
					<a href="{{route('album.destroy',$album->id)}}" onclick="return confirm('Удалить альбом?')" class="fa fa-remove"></a>
					</td>
                </tr>
				@endforeach
                </tfoot>
              </table>
			  
            </div>
			{{$albums->links()}}
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection  