@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-3" >
    <a href="{{route('tags.create')}}" class="btn btn-primary ">Add Tags</a>
    </div>

    <div class="card">
        <div class="card-header">Tags</div>

        <div class="card-body">
            @if ($tags->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <th>Name</th>
                    <th>Posts Count</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->name}}
                            </td>
                        <td>{{ $tag->posts->count()}}</td>
                            <td>
                            <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary btn-sm" >Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" 
                            onclick="displayModalForm({{$tag}})"
                            data-toggle="modal" data-target="#deleteModal">Delete</a>
                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h5>No Tags to Show</h5>
            @endif
        </div>
    </div>

    <!--DELETE Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" id="deleteForm">
            @csrf
            @method('DELETE')    
            <div class="modal-body">
            <p>Are you sure you want to delete Tag??</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Category</button>
            </div>
        </form>    
      </div>
    </div>
  </div>
  {{-- END OF DELETE MODAL --}}
@endsection

@section('page-level-scripts')
  <script type="text/javascript">
        function displayModalForm($tag){
            var url = '/tags/'+ $tag.id; 
            $('#deleteForm').attr('action',url);
        }
        
    </script>

@endsection