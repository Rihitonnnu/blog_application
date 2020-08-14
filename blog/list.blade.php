  
  @extends('layout')
  @section('title','ブログ一覧')
  @section('content')  
    <div class="row">
     <div class="col-md-8 col-md-offset-2">
      <h2>ブログ記事一覧</h2>
      @if (session('err_msg'))
      <p class="text-danger">
        {{session('err_msg')}}
      </p>
      @endif  
      <table class="table table-striped">
          <tr>
              <th>number</th>
              <th>title</th>
              <th>date</th>
              <th>operate</th>
                           
            
          </tr>
          @foreach($blogs as $blog)

          <tr>
              <td>{{$blog->id}}</td>
              <td><a href="/blog/{{ $blog->id}}">{{ $blog->title}}</a></td>
              <td>{{ $blog->updated_at}}</td>
              <td><a href="/blog/edit/{{$blog->id}}" class="btn btn-primary btn-sm">編集</a></td>
              <td>
              <form action="/delete/{{$blog->id}}" method="POST">
              {{ csrf_field()}}
              <input type="submit" value="削除" class="btn btn-danger btn-am btn-dell">
              </form>
              </td>
              
          </tr>
          @endforeach
      </table>
     </div>
    </div>
  @endsection

  @section('script')
  <script>
  $(function(){
  $(".btn-dell").click(function(){
  if(confirm("本当に削除しますか？")){
  //そのままsubmit（削除）
  }else{
  //cancel
  return false;
  }
  });
  });
  </script>
@endsection